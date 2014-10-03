<?php

/*

Template Name: Home

 */

get_header();

?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
    	<a href="#" class="cta showcase-mgn"><strong>/ Featured Project:</strong> RE Camera</a>
    </div>
    <div class="col-md-4">
      <div class="widget widget-menu"> <a href="/style-guide" class="cta style-guide-cta">View our Style Guide</a> <a href="#" class="cta lifestyle-images-cta">Lifestyle Image Selects</a> </div>
    </div>
  </div>
</div>
<div class="container">
<div class="row">
  <div class="col-md-4">
    <div class="widget widget-menu projects-list">
      <h3 class="widget-title">/ Active Projects</h3>
      <?php query_posts(array ( 'post_type' => 'project', 'posts_per_page' => 10 ) ); ?>
      <ul>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
          <?php $status = get_post_meta(get_the_ID(), 'status');
				if($status == "active") {
					echo '<i class="fa fa-pencil" title="active"></i>';
				} else {
					echo '<i class="fa fa-archive" title="final"></i>';
			} ?>
          <p><span class="cat">
            <?php $posttags = get_the_terms($post->ID, 'section');//print_r($posttags); exit();
				$count=0;
					if ($posttags) {
  						foreach($posttags as $tag) {
   						 $count++;
    							if (1 == $count) {
      							?>
            <a href="/section/?section=<?php echo $tag->term_id;?>">/ <?php echo $tag->name;?></a>
            <?php
    							}
  						}
			} ?>
            </span></p>
          <h5><a href="<?php the_permalink() ?>">
            <?php the_title(); ?>
            </a></h5>
          <p><span class="updated">Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</span></p>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; wp_reset_query(); ?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget widget-menu projects-list">
      <h3 class="widget-title">/ User Research Reports</h3>
      <?php query_posts(array ( 'post_type' => 'test', 'posts_per_page' => 10 ) ); ?>
      <ul>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
          <?php 
                            $status = get_post_meta(get_the_ID(), 'status');
                                    if($status == "active") {
                                        echo '<i class="fa fa-eye" title="active"></i>';
                                    } else {
                                        echo '<i class="fa fa-check-square" title="final"></i>';
                                } ?>
          <p><span class="cat">
            <?php $posttags = get_the_terms($post->ID, 'section');
				$count=0;
					if ($posttags) {
  						foreach($posttags as $tag) {
   						 $count++;
    							if (1 == $count) {
      							?>
            <a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
            <?php
    							}
  						}
			} ?>
            </span></p>
          <h5><a href="/detail/?post-id=<?php echo $post->ID;?>">
            <?php the_title(); ?>
            </a></h5>
          <p><span class="updated">Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</span></p>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; wp_reset_query(); ?>
    </div>
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
