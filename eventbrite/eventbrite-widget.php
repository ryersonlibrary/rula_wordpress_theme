<?php
/**
 * Template part for displaying an eventbrite widget on the homepage
 */
?>

<?php
  $events = array_slice( eventbrite_get_events()->events, 0, 5 );
?>

<article class="content-section events">
  <header class="entry-header">
    <h2>Upcoming Events</h2>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <ul>
    <?php if ( count($events) > 0 ) : ?>
      <?php foreach($events as $event) : ?>
        <?php 
          $event_name = $event->post_title;
          $event_start = esc_html( mysql2date( 'F j Y @ g:i A', $event->start->local ) )
        ?>
        <li><?php echo "{$event_name}<br>{$event_start}" ?></li>
      <?php endforeach; ?>
    <?php else : ?>
      <li>No upcoming events!</li>
    <?php endif ?>
    </ul>
  </div><!-- .entry-content -->
</article>