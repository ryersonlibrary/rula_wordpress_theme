<?php
/**
 * Template part for displaying a single team member.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package underscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="hero">
    <?php the_post_thumbnail('rula-team-image'); ?>
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </div>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
</article>