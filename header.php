<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'underscores' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php if ( get_header_image() ) : ?>
					<img class="site-header-image" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
				<?php else: ?>
					<img class="site-header-image" src="http://placehold.it/1200x300" width="1200" height="300" alt="">
				<?php endif; // End header image check. ?>

				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</p>
			</div><!-- .site-branding -->

			<div class="social-links">
				<ul>
					<?php if ( trim( get_theme_mod('rula-email', '' ) ) != '' ) : ?>
						<li><a href="mailto:<?php echo get_theme_mod('rula-email') ?>"><img src="<?php bloginfo('template_directory'); ?>/img/social-icons/32x32%20PNG/32-email.png"></a></li>
					<?php endif; ?>

					<?php if ( trim( get_theme_mod('rula-twitter', '' ) ) != '' ) : ?>
						<li><a href="https://twitter.com/<?php echo get_theme_mod('rula-twitter') ?>"><img src="<?php bloginfo('template_directory'); ?>/img/social-icons/32x32%20PNG/32-twitter.png"></a></li>
					<?php endif; ?>

					<?php if ( trim( get_theme_mod('rula-facebook', '' ) ) != '' ) : ?>
						<li><a href="https://facebook.com/<?php echo get_theme_mod('rula-facebook') ?>"><img src="<?php bloginfo('template_directory'); ?>/img/social-icons/32x32%20PNG/32-facebook.png"></a></li>
					<?php endif; ?>

					<?php if ( trim( get_theme_mod('rula-instagram', '' ) ) != '' ) : ?>
						<li><a href="https://instagram.com/<?php echo get_theme_mod('rula-instagram') ?>"><img src="<?php bloginfo('template_directory'); ?>/img/social-icons/32x32%20PNG/32-instagram.png"></a></li>
					<?php endif; ?>
				</ul>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'underscores' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

		</header><!-- #masthead -->

		<div id="content" class="site-content">
