<?php 
  $post_ancestors = get_post_ancestors( $post );
  $root_ancestor = array_pop( $post_ancestors );

  $list_pages_options = array(
    'title_li' => null,
    'child_of' => $root_ancestor
  );
?>
<div id="secondary" class="widget-area" role="complementary">
  <aside id="pages" class="widget">
    <h3 class="widget-title"><?php echo get_the_title( $root_ancestor ); ?></h3>
    <ul>
       <?php wp_list_pages( $list_pages_options ); ?> 
    </ul>
  </aside>
</div><!-- #secondary .widget-area -->