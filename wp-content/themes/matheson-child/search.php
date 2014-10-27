<?php
/**
 * The template for displaying Search Results pages.
 *
 * @since 1.0.0
 */
get_header();
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
?>

         <div class="container title-container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title"><?php global $wp_query;
							    $num = $wp_query->found_posts; ?> Search Results for: <span><?php echo get_search_query() ?></span></h1><!-- .page-title -->
                </div>
            </div>
        </div>
	</header>

<main id="content">
<div class="container">
<div class="row">
    <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
          <?php
			
			if ($_POST['select'] == 'alphadown') {
				$order = 'ASC';
				$orderby = 'title';
			}
			if ($_POST['select'] == 'alphaup') {
				$order = 'DESC';
				$orderby = 'title';
			}
			if ($_POST['select'] == 'newest') {
				$order = 'DESC';
				$orderby = 'date';
			}
			if ($_POST['select'] == 'oldest') {
				$order = 'ASC';
				$orderby = 'date';
			}
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
            <div class="projects" style="margin-bottom:50px;">
              <h3 class="widget-title">Projects</h3>
              <?php query_posts( array_merge( array ( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => $order, 'orderby' => $orderby, 'section' => $term->slug), $search_query) ); ?>
              <ul>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
          </div>
          
          <?php query_posts(array_merge( array ( 'post_type' => 'test', 'posts_per_page' => -1, 'order' => $order, 'orderby' => $orderby, 'section' => $term->slug ), $search_query) ); ?>
          <div class="col-md-12">
            <div class="research" style="margin-bottom:50px;">
              <h3 class="widget-title">Research</h3>
              <?php if ( have_posts() ): ?>
              <ul>
                <?php while ( have_posts() ) : the_post(); ?>
                <li>
                  <h5><a href="/detail/?post-id=<?php echo $post->ID;?>"><?php the_title(); ?></a></h5>
                  <?php $sprints = get_the_terms($post->ID, 'sprint');
							$count=0;
							if ($sprints) {
								foreach($sprints as $tag) {
								$count++;
								if (1 == $count) { ?>
									<p class="sprint">Tested in <a href="/detail/?sprint=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a></p>
							<?php }
							}
						} ?>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php else: ?>
              <p>No user tests available for <span class="term-name"><?php echo $term->name; ?></span></p>
              <?php endif; ?>
            </div>
          </div>
      <?php wp_reset_query(); ?>
        
        
        
	  <?php query_posts(array_merge( array ( 'post_type' => 'analytics', 'posts_per_page' => -1, 'order' => $order, 'orderby' => $orderby, 'section' => $term->slug ), $search_query) ); ?>
          <div class="col-md-12">
            <div class="research" style="margin-bottom:50px;">
              <h3 class="widget-title">Analytics</h3>
              <?php if ( have_posts() ): ?>
              <ul>
                <?php while ( have_posts() ) : the_post(); ?>
                <li>
                  <h5><a href="/detail/?post-id=<?php echo $post->ID;?>"><?php the_title(); ?></a></h5>
                  <?php $regions = get_the_terms($post->ID, 'country');
							$count=0;
							if ($regions) { ?>
                            <p class="sprint">
								<?php foreach($regions as $tag) {
								$count++;
								if (1 == $count) { ?>
									<?php echo $tag->name;?>
							<?php } else { ?>
                            	&nbsp;/&nbsp;<?php echo $tag->name;?>
							<?php } } ?>
                            </p>
						<?php } ?>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php else: ?>
              <p>No analytics reports available for <span class="term-name"><?php echo get_search_query() ?></span></p>
              <?php endif; ?>
            </div>
          </div>
              <?php wp_reset_query(); ?>
        </div>
        
    </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
