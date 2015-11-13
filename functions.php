<?php
/**
 * underscores functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package underscores
 */

if ( ! function_exists( 'underscores_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function underscores_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on underscores, use a find and replace
	 * to change 'underscores' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'underscores', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Eventbrite API plugin (https://wordpress.org/plugins/eventbrite-api/)
	add_theme_support( 'eventbrite' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'underscores' ),
		'topbar' => esc_html__( 'Topbar Menu', 'underscores' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'underscores_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // underscores_setup
add_action( 'after_setup_theme', 'underscores_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function underscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'underscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'underscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function underscores_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'underscores' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'underscores_widgets_init' );


if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Underscore.
 *
 */
function underscores_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Oswald:700,300';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Lato:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function underscores_scripts() {
	wp_enqueue_style( 'underscores-fonts', underscores_fonts_url(), array(), null );

	wp_enqueue_style( 'underscores-style', get_stylesheet_uri() );

	wp_enqueue_style( 'custom-widget-css', get_template_directory_uri() . '/css/custom_widgets.css' );

	// Include special styles for the "/team" templates
	if ( is_post_type_archive('rula-team') ) { wp_enqueue_style( 'rula-team-css', get_template_directory_uri() . '/css/rula-team.css' ); }
	if ( get_post_type() == 'rula-team' ) { wp_enqueue_style( 'rula-team-css', get_template_directory_uri() . '/css/rula-team.css' ); }

	wp_enqueue_script( 'underscores-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'underscores-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'underscores_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom Post type for displaying Team members!
 * Should break this into it's own plugin!
 * Commented out to reduce bloat
 */
// Define Custom Post Type
function rula_team_post_type() {
	$rula_post_type_settings = array(
		'labels' => array(
			'name' => __('Team Members', 'rula-team'),
			'singular_name' => __('Team Member', 'rula-team'),
			'add_new' => __('Add new', 'rula-team'),
			'add_new_item' => __('Add new team member', 'rula-team'),
			'edit' => __('Edit', 'rula-team'),
			'edit_item' => __('Edit team member', 'rula-team'),
			'new_item' => __('New team member', 'rula-team'),
			'view' => __('View team member', 'rula-team'),
			'view_item' => __('View team member', 'rula-team'),
			'search_items' => __('Search team members', 'rula-team'),
			'not_found' => __('No team members found', 'rula-team'),
			'not_found_in_trash' => __('No team members found in Trash', 'rula-team')
		),
		'description' => 'Custom post type to add team members to site',
		'public' => true,
		'menu_icon' => 'dashicons-groups',
		'hierarchical' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'team'),
		'supports' => array(
			'title',
			'thumbnail',
			'editor',
			'custom-fields',
			'page-attributes'
		),
		'can_export' => true
	);
	register_post_type('rula-team', $rula_post_type_settings);
}
add_action('init', 'rula_team_post_type');
// Set profile image max size
add_image_size('rula-team-image', 768, 768, false);
