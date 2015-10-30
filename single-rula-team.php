<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores
 */

// Add no-sidebar to body class when using this template
// Is this the best way to acheive this?
function add_body_class( $classes ) {
   $classes[] = 'no-sidebar';
   return $classes;
}
add_filter( 'body_class', 'add_body_class' );

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'rula-partials/team', 'single' ); ?>

    <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
