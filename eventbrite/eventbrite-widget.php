<?php
/**
 * Template part for displaying an eventbrite widget on the homepage
 */
?>

<style type="text/css">
  /* Events stuff, make this more extensible */
  .events ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  .events ul li {
    background: rgba(91,194,244,0.05);
    border: 2px solid rgb(91,194,244);
  }
  .events ul li + li {
    margin-top: 0.5em;
  }
  .events li > a {
    display: block;
    padding: 0.5em 1em;
    width: 100%;
    height: 100%;
    text-decoration: none;
  }
</style>

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
          $event_start = esc_html( mysql2date( 'F j Y @ g:i A', $event->start->local ) );
          $event_url = $event->url;
        ?>
        <li><a href="<?php echo $event_url ?>"><?php echo "{$event_name}<br>{$event_start}" ?></a></li>
      <?php endforeach; ?>
    <?php else : ?>
      <li>No upcoming events!</li>
    <?php endif ?>
    </ul>
  </div><!-- .entry-content -->
</article>