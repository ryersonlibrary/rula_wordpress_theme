<?php
/**
 * Ninja Forms customization
 *
 * Custom stuff for RULA :D
 */

// Register custom sidebar for ninja forms :D
function ninja_forms_register_sidebar_rula_google_sheets(){
  $args = array(
    'name' => __( 'RULA Google Sheets', 'ninja-forms' ),
    'page' => 'ninja-forms', 
    'tab' => 'builder',
    'display_function' => 'ninja_forms_sidebar_display_fields'
  );
  ninja_forms_register_sidebar('rula_google_sheets', $args);
}
add_action('admin_init', 'ninja_forms_register_sidebar_rula_google_sheets');

// Add custom fields 
function register_ninja_form_fields() {
  $google_sheet_id = array(
    'name' => 'Google Sheet ID',
    'display_function' => 'display_google_sheet_id',
    'sidebar' => 'rula_google_sheets',
    'display_label' => false,
    'display_wrap' => false
  );
  
  if ( function_exists( 'ninja_forms_register_field' ) ) {
    ninja_forms_register_field('_google_sheet_id', $google_sheet_id);
  }
}
add_action( 'init', 'register_ninja_form_fields' );

function display_google_sheet_id( $field_id, $data ) {
  global $post;

  if ( isset( $data['my_value']) ) {
    $my_value = $data['my_value'];
  } else {
    $my_value = get_post_meta($post->ID, 'google_sheet_id', true);
  }

  echo "<input type=\"hidden\" name=\"_google_sheet_id\" value=\"{$my_value}\">";
}

function array_remove_blank($var) {
  return ( count($var) > 0 );
}

function update_google_sheet() {
  global $ninja_forms_processing;

  // Check if there is a google sheet associated with this form/page
  $google_sheet_id = trim( $ninja_forms_processing->get_extra_value('_google_sheet_id') );

  if ( !empty($google_sheet_id) ) {
    $sheet_columns = array('name', 'email', 'status', 'program', 'notes', 'extranotes');

    $all_fields = array_filter( $ninja_forms_processing->get_all_fields() ) ; // this removes blank lines 

    // HACKYHACKYPASTETESTING
    // Include some required files :D
    include_once ( get_template_directory() . "/lib/google-api-php-client/examples/templates/base.php");
    require_once ( get_template_directory() . '/lib/google-api-php-client/src/Google/autoload.php' );

    // include the credz :)
    include_once ( get_template_directory() . "/_private/google_sheets_credentials.php");
    $key_path = get_template_directory() . '/_private/gsapi_key.p12';

    // Set up the service account
    if (strpos($gsapi_client_id, "googleusercontent") == false
        || !strlen($gsapi_email_address)
        || !strlen($key_path)) {
      echo missingServiceAccountDetailsWarning();
      exit;
    }

    $client = new Google_Client();
    $client->setApplicationName("Sheets API"); // This can be whatever! :)
    $service = new Google_Service_Drive($client);

    /************************************************
      If we have an access token, we can carry on.
      Otherwise, we'll get one with the help of an
      assertion credential. In other examples the list
      of scopes was managed by the Client, but here
      we have to list them manually. We also supply
      the service account
     ************************************************/
    if (isset($_SESSION['service_token'])) {
      $client->setAccessToken($_SESSION['service_token']);
    }
    $key = file_get_contents($key_path);
    $cred = new Google_Auth_AssertionCredentials(
        $gsapi_email_address,
        array('https://www.googleapis.com/auth/drive','https://spreadsheets.google.com/feeds'),
        $key
    );
    $client->setAssertionCredentials($cred);
    if ($client->getAuth()->isAccessTokenExpired()) {
      $client->getAuth()->refreshTokenWithAssertion($cred);
    }
    $_SESSION['service_token'] = $client->getAccessToken();
    // Get access token for spreadsheets API calls
    $resultArray = json_decode($_SESSION['service_token']);
    $accessToken = $resultArray->access_token;

    $url = "https://spreadsheets.google.com/feeds/list/$google_sheet_id/od6/private/full";
    $method = 'POST';
    $headers = array("Authorization" => "Bearer $accessToken", 'Content-Type' => 'application/atom+xml');
    $postBody = '<entry xmlns="http://www.w3.org/2005/Atom" xmlns:gsx="http://schemas.google.com/spreadsheets/2006/extended">';
    // Append date :)
    date_default_timezone_set ( 'America/Toronto' );
    $date = date("F j, Y, g:i a");
    $postBody .= "<gsx:date>{$date}</gsx:date>";
      // Get all the user submitted values
      if( is_array( $all_fields ) ){ // Make sure $all_fields is an array.
        // Loop through each of our submitted values.
        $count = 0;
        foreach( $all_fields as $field_id => $user_value ){
          $postBody .= "<gsx:{$sheet_columns[$count]}>";
          $postBody .= $user_value;
          $postBody .= "</gsx:{$sheet_columns[$count]}>";
          $count += 1;
        }
      }
    $postBody .= '</entry>';

    $req = new Google_Http_Request($url, $method, $headers, $postBody);
    $curl = new Google_IO_Curl($client);
    $results = $curl->executeRequest($req);
    // END HACKYHACKYPASTETESTING
  }  
}

function ninja_forms_rula_post_process() {
  add_action( 'ninja_forms_post_process', 'update_google_sheet' );
}
add_action( 'init', 'ninja_forms_rula_post_process' );

