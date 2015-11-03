<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package underscores
 */

?>

<?php /*
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_post_thumbnail('rula-team-image'); ?>
    <?php the_content(); ?>
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
        'after'  => '</div>',
      ) );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php underscores_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
*/ ?>

<style type="text/css">
  .single-rula-team .hero {
    position: relative;
    margin-bottom: 2.25em;
    max-width: 500px;
  }

  .single-rula-team .hero h1 {
    background: #323132;
    color: #F1F1F2;
    position: absolute;
    bottom: -0.75em;
    right: -0.75em;
    margin: 0;
    padding: 0.5em;
    line-height: 1;
  }

  @media screen and (min-width: 34.250em) {
    .single-rula-team .hero {
      margin-right: 3em;
      max-width: 50%;
      float: left;
    }
  }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="hero">
    <?php the_post_thumbnail('rula-team-image'); ?>
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </div>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
</article>