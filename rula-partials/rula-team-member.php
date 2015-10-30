<?php
/**
 * Template part for displaying a team member. 
 * This partial must be called in the context of a loop
 */
?>

<a href="<?php the_permalink(); ?>" class="card">
  <header class="card-header">
    <?php the_title(); ?>
  </header>
  <div class="card-content">
    <?php the_post_thumbnail('rula-team-image'); ?>
  </div>
</a>
