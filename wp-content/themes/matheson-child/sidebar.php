<?php
/**
 * The first/left sidebar widgetized area.
 *
 * If no active widgets in sidebar, default login widget will appear.
 *
 * @since 1.0.0
 */
?>
<?php if(!is_front_page() ): ?>
    <div class="sidebar-menu">
        <a href="/photoshoots" class="cta photos-cta">Photoshoots</a>
    	<a href="/style-guide" class="cta style-guide-cta">Style Guide</a>
    	<a href="https://drive.google.com/folderview?id=0B9tXm7YUBs5ocFc4N090VWNmcGs&usp=drive_web" class="cta iconography-cta" target="_blank">Iconography</a>
    </div>
<?php endif; ?>
<div class="htc-sidebar">
<?php $query = array ('post_type' => array( 'project', 'photoshoot', 'test'), 'order' => 'DESC', 'orderby' => 'date'); ?>
<?php query_posts( $query ); ?>
      <?php if ( have_posts() ) : ?>
      <h3>Recent Activity</h3>
      <ul class="recent-list">
      <?php while ( have_posts() ) : the_post(); ?>
      	<li>
			<span class="post-type <?php echo get_post_type(); ?>"><?php echo get_post_type(); ?></span>
			<a href="<?php the_permalink()?>"><?php the_title(); ?></a>
            <small>Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</small>
        </li>
      <?php endwhile; ?>
      </ul>
      <?php endif; wp_reset_query(); ?>
      
<?php dynamic_sidebar( 'sidebar' ) ?>
</div>

