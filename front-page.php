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
    <main id="main" class="site-main clear" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(['content-section', 'blurb']); ?>>
          <header class="entry-header">
            <h2>DM.. (z)ee?</h2>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <?php the_content(); ?>
          </div><!-- .entry-content -->

          <footer class="entry-footer">
            <?php edit_post_link( esc_html__( 'Edit', 'underscores' ), '<span class="edit-link">', '</span>' ); ?>
          </footer><!-- .entry-footer -->
        </article><!-- #post-## -->

      <?php endwhile; // End of the loop. ?>

      <article class="content-section events">
        <header class="entry-header">
          <h2>Upcoming Events</h2>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <ul>
            <li>
              Web Programming Intro<br>
              September 18th @ 9pm
            </li>
            <li>
              Web Programming Intro<br>
              September 18th @ 9pm
            </li>
            <li>
              Web Programming Intro<br>
              September 18th @ 9pm
            </li>
            <li>
              Web Programming Intro<br>
              September 18th @ 9pm
            </li>
          </ul>
        </div><!-- .entry-content -->
      </article>
      
      <article class="content-section hours">
        <header class="entry-header">
          <h2>Hours</h2>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <ul>
            <li>Monday: 10am - 5pm</li>
            <li>Tuesday: 10am - 5pm</li>
            <li>Wednesday: 10am - 5pm</li>
            <li>Thursday: 10am - 5pm</li>
            <li>Friday: 10am - 5pm</li>
            <li>Saturday: 10am - 5pm</li>
            <li>Sunday: 10am - 5pm</li>
          </ul>
        </div><!-- .entry-content -->
      </article>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
