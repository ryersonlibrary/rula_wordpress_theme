<?php
/**
 * Template part for displaying a team member. 
 * This partial must be called in the context of a loop
 */
?>

<div class="card">
  <header class="card-header">
    <?php the_title(); ?>
  </header>
  <div class="card-content">
    <?php the_post_thumbnail('rula-team-image'); ?>
  </div>
  <div class="card-content">
    <?php the_content(); ?>
  </div>
</div>
