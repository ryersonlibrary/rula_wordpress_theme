<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package underscores
 */

get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <?php the_content(); ?>
          </div><!-- .entry-content -->

          <footer class="entry-footer">
            <?php edit_post_link( esc_html__( 'Edit', 'underscores' ), '<span class="edit-link">', '</span>' ); ?>
          </footer><!-- .entry-footer -->
        </article><!-- #post-## -->

      <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

  <div id="workshops" class="content-area">
    <article>
      <header class="entry-header">
        <h1 class="entry-title">Workshops</h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <p>Content about workshops</p>
      </div><!-- .entry-content -->
    </article>
  </div>

  <div id="team" class="content-area">
    <article>
      <header class="entry-header">
        <h1 class="entry-title">The DME Team</h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <?php the_rula_team() ?>
      </div><!-- .entry-content -->
    </article>
  </div>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
