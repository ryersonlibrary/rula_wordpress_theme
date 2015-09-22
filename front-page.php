<?php
/**
 * The template for the homepage
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package underscores
 */

get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main clear" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(array('content-section', 'blurb')); ?>>
          <header class="entry-header">
            <h2><?php the_title(); ?></h2>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <?php the_content(); ?>
          </div><!-- .entry-content -->

          <footer class="entry-footer">
            <?php edit_post_link( esc_html__( 'Edit', 'underscores' ), '<span class="edit-link">', '</span>' ); ?>
          </footer><!-- .entry-footer -->
        </article><!-- #post-## -->

      <?php endwhile; // End of the loop. ?>

      <?php //get_template_part( 'eventbrite/eventbrite', 'widget' ); ?>

      <?php get_template_part( 'rula-partials/rula', 'hours' ); ?>

      
    </main><!-- #main -->
    
    
  </div><!-- #primary -->
  
  <?php // get_template_part( 'rula-partials/rula', 'team' ); ?>

<?php get_footer(); ?>
