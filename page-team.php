<?php
/**
 * Template Name: Team Bios Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
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
    <main id="main" class="site-main clear" role="main">
      <?php while ( have_posts() ) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(array('content-section', 'blurb')); ?>>
          <header class="entry-header">
            <h1><?php the_title(); ?></h1>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <?php the_content(); ?>
          </div><!-- .entry-content -->

          <div class="rula-team-container clear">
            <?php // Set up loop context for custom post type 'rula-team'
              $team_loop = new WP_Query( 
                array(
                  'post_type' => 'rula-team'
                ) 
              );
              while ( $team_loop->have_posts() ) {
                $team_loop->the_post();
                get_template_part( 'rula-partials/rula', 'team-member' );
              } 

              wp_reset_query(); // Give the context back to the default post.
            ?>
          </div>

          <footer class="entry-footer">
            <?php edit_post_link( esc_html__( 'Edit', 'underscores' ), '<span class="edit-link">', '</span>' ); ?>
          </footer><!-- .entry-footer -->
        </article><!-- #post-## -->

      <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->    
    
  </div><!-- #primary -->
  
<?php get_footer(); ?>
