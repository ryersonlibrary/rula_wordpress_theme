<?php
/**
 * Template Name: Eventbrite Events
 */
get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      
      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page' ); ?>

        <?php
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
        ?>

      <?php endwhile; // End of the loop. ?>

      <?php
        // Set up and call our Eventbrite query.
        $events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
          'display_private' => true, // boolean
          // 'nopaging' => false,        // boolean
          // 'limit' => null,            // integer
          // 'organizer_id' => null,     // integer
          // 'p' => null,                // integer
          // 'post__not_in' => null,     // array of integers
          // 'venue_id' => null,         // integer
          // 'category_id' => null,      // integer
          // 'subcategory_id' => null,   // integer
          // 'format_id' => null,        // integer
        ) ) );
        if ( $events->have_posts() ) :
          while ( $events->have_posts() ) : $events->the_post(); ?>

            <article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
              <header class="entry-header">
                <?php the_post_thumbnail(); ?>

                <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

                <div class="entry-meta">
                  <?php eventbrite_event_meta(); ?>
                </div><!-- .entry-meta -->
              </header><!-- .entry-header -->

              <div class="entry-content">
                <?php eventbrite_ticket_form_widget(); ?>
              </div><!-- .entry-content -->

              <footer class="entry-footer">
                <?php eventbrite_edit_post_link( __( 'Edit', 'eventbrite_api' ), '<span class="edit-link">', '</span>' ); ?>
              </footer><!-- .entry-footer -->
            </article><!-- #post-## -->

          <?php endwhile;
          // Previous/next post navigation.
          eventbrite_paging_nav( $events );
        else :
          // If no content, include the "No posts found" template.
          get_template_part( 'content', 'none' );
        endif;
        // Return $post to its rightful owner.
        wp_reset_postdata();
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>