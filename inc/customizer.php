<?php
/**
 * underscores Theme Customizer.
 *
 * @package underscores
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function underscores_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  // https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
  $sections = array(
    'rula-footer-settings' => array(
      'title' => 'Footer',
      'priority' => 120,
    )
  );

  // https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
  $settings = array(
    'rula-address' => array(
      'default' => '341 Yonge Street<br>Toronto, Ontario<br>Canada M5B 1S1',
      // TODO: somehow make it work better with postMessage transport
      // Using default refresh for now.
      'transport' => 'refresh' 
    ),
    'rula-email' => array(
      'default' => 'example@ryerson.ca',
      'transport' => 'postMessage'
    ),
    'rula-phone' => array(
      'default' => '416-979-5000',
      'transport' => 'postMessage'
    ),

    'rula-twitter' => array(
      'default' => 'RyersonU',
      'transport' => 'postMessage'
    ),
    'rula-facebook' => array(
      'default' => 'ryersonu',
      'transport' => 'postMessage'
    ),
    'rula-instagram' => array(
      'default' => 'rustudentlife',
      'transport' => 'postMessage'
    ),
    'rula-social' => array(
      'default' => true
    ),
  );

  // https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
  $controls = array(
    'rula-address' => array(
      'label' => 'Address',
      'section' => 'rula-footer-settings',
      'type' => 'textarea'
    ),
    'rula-email' => array(
      'label' => 'Email',
      'section' => 'rula-footer-settings',
      'type' => 'email'
    ),
    'rula-phone' => array(
      'label' => 'Phone Number',
      'section' => 'rula-footer-settings',
      'type' => 'text'
    ),
    'rula-twitter' => array(
      'label' => 'Twitter Account',
      'section' => 'rula-footer-settings',
      'type' => 'text'
    ),
    'rula-facebook' => array(
      'label' => 'Facebook Account',
      'section' => 'rula-footer-settings',
      'type' => 'text'
    ),
    'rula-instagram' => array(
      'label' => 'Instagram Account',
      'section' => 'rula-footer-settings',
      'type' => 'text'
    ),
    'rula-social' => array(
      'label' => 'Enable Social Section',
      'section' => 'rula-footer-settings',
      'type' => 'checkbox'
    ),
  );

  // Add our customizer sections
  foreach ($sections as $name => $args) {
    $wp_customize->add_section($name, $args);
  }

  // Register our settings
  foreach ($settings as $name => $args) {
    $wp_customize->add_setting($name, $args);
  }

  // Add our controls
  foreach ($controls as $name => $args) {
    $wp_customize->add_control($name, $args);
  }

}
add_action( 'customize_register', 'underscores_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function underscores_customize_preview_js() {
	wp_enqueue_script( 'underscores_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'underscores_customize_preview_js' );
