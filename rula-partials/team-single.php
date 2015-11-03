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
    display: inline-block;
    position: relative;
    max-width: 48em;
    padding-right: 1.5em;
    padding-bottom: 1.5em;
    vertical-align: top
  }

  .single-rula-team .hero h1 {
    background: #323132;
    color: #F1F1F2;
    position: absolute;
    margin: 0;
    padding: 0.5em;
    line-height: 1;
    right: 0;
    bottom: 0;
    font-size: 1.5em;
  }

  .single-rula-team .entry-content {
    vertical-align: top;
    padding: 1em 0 0 0;
  }

  @media screen and (min-width: 48em) { 
    .single-rula-team .hero {
      max-width: 50%;
      display: inline-block;
    }

    .single-rula-team h1 {
      font-size: 2em;
    }

    .single-rula-team .entry-content {
      display: inline-block;
      max-width: 49%;
      padding: 0 1em 1em 1em;
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