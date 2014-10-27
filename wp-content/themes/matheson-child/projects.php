<?php
/*
Template Name: Projects
 */
get_header();
?>
         <div class="container title-container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title"><?php echo the_title();?></h1><!-- .page-title -->
                </div>
            </div>
        </div>
	</header>

<main id="content">
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <ul class="time-sorter">
        <li>Filter:</li>
        <?php $date_range =  array('after' => date('Y-m-d', strtotime('-90 days')));
			$query = array ('post_type' => 'project', 'date_query' => $date_range);
			query_posts($query);
			if ( have_posts() ): ?>
        <li><a href="index.php?start-date=<?php echo date('Y-m-d', strtotime('-90 days'));?>">Last 3 Months</a></li>
		<?php endif; wp_reset_query(); ?>
        
        <?php $date_range =  array('after' => date('Y-m-d', strtotime('-180 days')));
			$query = array ('post_type' => 'project', 'date_query' => $date_range);
			query_posts($query);
			if ( have_posts() ): ?>
        <li><a href="index.php?start-date=<?php echo date('Y-m-d', strtotime('-180 days'));?>">Last 6 Months</a></li>
		<?php endif; wp_reset_query(); ?>
        
        <?php $date_range =  array('after' => date('Y-m-d', strtotime('1-1-2014')), 'before' => date('Y-m-d', strtotime('31-12-2014')));
			$query = array ('post_type' => 'project', 'date_query' => $date_range);
			query_posts($query);
			if ( have_posts() ): ?>
        <li><a href="index.php?start-date=<?php echo date('Y-m-d', strtotime('1-1-2014'));?>&end-date=<?php echo date('Y-m-d', strtotime('31-12-2014'));?>">2014</a></li>
		<?php endif; wp_reset_query(); ?>
        
        <?php $date_range =  array('after' => date('Y-m-d', strtotime('1-1-2013')), 'before' => date('Y-m-d', strtotime('31-12-2013')));
			$query = array ('post_type' => 'project', 'date_query' => $date_range);
			query_posts($query);
			if ( have_posts() ): ?>
        <li><a href="index.php?start-date=<?php echo date('Y-m-d', strtotime('1-1-2013'));?>&end-date=<?php echo date('Y-m-d', strtotime('31-12-2013'));?>">2013</a></li>
		<?php endif; wp_reset_query(); ?>
        
        <?php $date_range =  array('after' => date('Y-m-d', strtotime('1-1-2012')), 'before' => date('Y-m-d', strtotime('31-12-2012')));
			$query = array ('post_type' => 'project', 'date_query' => $date_range);
			query_posts($query);
			if ( have_posts() ): ?>
        <li><a href="index.php?start-date=<?php echo date('Y-m-d', strtotime('1-1-2012'));?>&end-date=<?php echo date('Y-m-d', strtotime('31-12-2012'));?>">2012</a></li>
		<?php endif; wp_reset_query(); ?>
        
        <li><a href="index.php">All</a></li>
      </ul>
<?php
	
	if(isset($wp_query->query_vars['start-date']) ) {
		$start_date = $wp_query->query_vars['start-date']; 
	}
	// End Date
	if(isset($wp_query->query_vars['end-date']) ) {
		$end_date = $wp_query->query_vars['end-date']; 
	}
	$date_range =  array( 'after' => $start_date, 'before' => $end_date);
	
	$args = array ( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'date', 'date_query' => $date_range);  
	if ($_POST['select'] == 'alphadown') { $args = array ( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title', 'date_query' => $date_range);  }
	if ($_POST['select'] == 'alphaup') { $args = array ( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'title', 'date_query' => $date_range);  }
	if ($_POST['select'] == 'newest') { $args = array ( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'date', 'date_query' => $date_range); }
	if ($_POST['select'] == 'oldest') { $args = array ( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'date', 'date_query' => $date_range);  }
	?>
 
 
<form method="post" id="photos-order">
  Sort results by:
  <select name="select" onchange='this.form.submit()'>
    <option value="newest"<?php selected( $_POST['select'],'newest', 1 ); ?>>Newest</option>
    <option value="oldest"<?php selected( $_POST['select'], 'oldest', 1 ); ?>>Oldest</option>
    <option value="alphadown"<?php selected( $_POST['select'],'alphadown', 1 ); ?>>A-Z</option>
    <option value="alphaup"<?php selected( $_POST['select'],'alphaup', 1 ); ?>>Z-A</option>
  </select>
</form>
<?php query_posts( $args );
	if ( have_posts() ) : ?>
  			<ul class="projects">
    <?php while ( have_posts() ) : the_post(); ?>
              <li>
				<?php
                $desktopPrev = get_field('desktop_psd_image_preview');
                $mobilePrev = get_field('mobile_psd_image_preview');
                if( !empty($desktopPrev) ){
                    // thumbnail
                    $dsize = 'large';
                    $dthumb = $desktopPrev['sizes'][ $dsize ]; ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb"><img src="<?php echo $dthumb; ?>" alt="<?php the_title(); ?>" /></a>
                <?php } else if( !empty($mobilePrev) ) {
                    // thumbnail
                    $msize = 'large';
                    $mthumb = $mobilePrev['sizes'][ $msize ]; ?>    
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb"><img src="<?php echo $mthumb; ?>" alt="<?php the_title(); ?>" /></a>
                <?php } else { ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb default"></a>
                <?php } ?>
                                        
                <?php  $meta_values = get_post_meta( $post->ID, 'status', true); ?>
                <span class="status" title="active"><?php echo $meta_values; ?></span>
                <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                <p>TAGS: <span class="cat">
                <?php $posttags = get_the_terms($post->ID, 'section');
                $count=0;
                if ($posttags) {
                    foreach($posttags as $tag) {
                        $count++;
                        if (1 == $count) {
                        ?>
                        <a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
                        <?php } else { ?>
                        &nbsp;/&nbsp;<a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
                        <?php
                        }
                    }
                }?>
                </span></p>
                </li>
      <?php endwhile; ?>
            </ul>
<?php endif; wp_reset_query(); ?>

        
      
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
