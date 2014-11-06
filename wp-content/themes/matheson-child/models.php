<?php
/*
Template Name: Models
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
        <p class="back"><a href="/photoshoots/">&lt; Back to Photoshoots</a></p>
	</header>

<main id="content">
<div class="container">
  <div class="row">
    <div class="col-md-12">
<?php
	
	if(isset($wp_query->query_vars['start-date']) ) {
		$start_date = $wp_query->query_vars['start-date']; 
	}
	// End Date
	if(isset($wp_query->query_vars['end-date']) ) {
		$end_date = $wp_query->query_vars['end-date']; 
	}
	$date_range =  array( 'after' => $start_date, 'before' => $end_date);
	
	$args = array ( 'post_type' => 'model', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title', 'date_query' => $date_range);  
	if ($_POST['select'] == 'alphadown') { $args = array ( 'post_type' => 'model', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title', 'date_query' => $date_range);  }
	if ($_POST['select'] == 'alphaup') { $args = array ( 'post_type' => 'model', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'title', 'date_query' => $date_range);  }
	?>
 
 
<form method="post" id="photos-order">
  Sort results by:
  <select name="select" onchange='this.form.submit()'>
    <option value="alphadown"<?php selected( $_POST['select'],'alphadown', 1 ); ?>>A-Z</option>
    <option value="alphaup"<?php selected( $_POST['select'],'alphaup', 1 ); ?>>Z-A</option>
  </select>
</form>
<?php query_posts( $args );
	if ( have_posts() ) : ?>
  			<ul class="models">
    <?php while ( have_posts() ) : the_post(); ?>
              <li>
				<?php
                $photo = get_field('photo_1');
                if( !empty($photo) ){ ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb" style="background-image:url(<?php echo $photo; ?>)"><span><?php the_title(); ?></span></a>
                <?php } else { ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb default"><span><?php the_title(); ?></span></a>
                <?php } ?>
                </li>
      <?php endwhile; ?>
            </ul>
<?php endif; wp_reset_query(); ?>

        
      
    </div>
  </div>
</div>
<?php get_footer(); ?>
