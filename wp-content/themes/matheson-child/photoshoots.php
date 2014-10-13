<?php

/*

Template Name: Photoshoots

 */

get_header();

?>

<header class="header-pos" id="archive-header" style="background-image:url(<?php header_image_url(); ?>);">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="page-title"><?php echo the_title();?></h1>
        <!-- .page-title --> 
        
      </div>
    </div>
  </div>
</header>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php query_posts(array ( 'post_type' => 'photoshoot', 'posts_per_page' => 10 ) ); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="product-container clearfix">
        <?php $project = get_the_term_list($post->ID, 'photoshoot'); ?>
        <?php $post_meta = get_post_meta(get_the_ID());
			$image = get_field('image_1'); ?>
        <h2 class="top-heading">
          <?php the_title(); ?>
        </h2>
    <?php if(!empty($image)){?>
        <div class="featured-img-main"><img src="<?php echo $image; ?>" width="400" height="190" border="0"  /></div>
    <?php }?>
        
        <div class="photoshoot-links">
          <h2>Final Selects</h2>
          <ul>
      <?php if(isset($post_meta[link_to_google_drive_folder_lores][0]) && ( $post_meta[link_to_google_drive_folder_lores][0] != '')){?>
          <li><a href="<?php echo $post_meta[link_to_google_drive_folder_lores][0];?>" target="_blank">Lores Previews</a></li>
      <?php }?>
      <?php if(isset($post_meta[link_to_google_drive_folder_tiff][0]) && ( $post_meta[link_to_google_drive_folder_tiff][0] != '')){?>
          <li><a href="<?php echo $post_meta[link_to_google_drive_folder_tiff][0];?>" target="_blank">Hires TIFFs</a></li>
      <?php }?>
      <?php if(isset($post_meta[link_to_google_drive_folder_jpg][0]) && ( $post_meta[link_to_google_drive_folder_jpg][0] != '')){?>
          <li><a href="<?php echo $post_meta[link_to_google_drive_folder_jpg][0];?>" target="_blank">Hires JPGs</a></li>
      <?php }?>
      <?php if(isset($post_meta[link_to_production_brief][0]) && ( $post_meta[link_to_production_brief][0] != '')){?>
          <li><a href="<?php echo $post_meta[link_to_production_brief][0];?>" target="_blank">Production Brief</a></li>
      <?php }?>
      		</ul>
        </div>
      </div>
        <?php endwhile; ?>
      <?php endif; wp_reset_query(); ?>
    </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>
</div>
<?php get_footer(); ?>
