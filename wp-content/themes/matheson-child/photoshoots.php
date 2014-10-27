<?php

/*

Template Name: Photoshoots

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
	<?php $args = array ( 'post_type' => 'photoshoot', 'posts_per_page' => 10, 'order' => 'DESC', 'orderby' => 'date');
  
  
  
  if ($_POST['select'] == 'alphadown') { $args = array ( 'post_type' => 'photoshoot', 'posts_per_page' => 10, 'order' => 'ASC', 'orderby' => 'title');  }
  if ($_POST['select'] == 'alphaup') { $args = array ( 'post_type' => 'photoshoot', 'posts_per_page' => 10, 'order' => 'DESC', 'orderby' => 'title');  }
  if ($_POST['select'] == 'newest') { $args = array ( 'post_type' => 'photoshoot', 'posts_per_page' => 10, 'order' => 'DESC', 'orderby' => 'date'); }
  if ($_POST['select'] == 'oldest') { $args = array ( 'post_type' => 'photoshoot', 'posts_per_page' => 10, 'order' => 'ASC', 'orderby' => 'date');  }
?>
 
 
<form method="post" id="photos-order">
  Sort photoshoots by:
  <select name="select" onchange='this.form.submit()'>
    <option value="newest"<?php selected( $_POST['select'],'newest', 1 ); ?>>Newest</option>
    <option value="oldest"<?php selected( $_POST['select'], 'oldest', 1 ); ?>>Oldest</option>
    <option value="alphadown"<?php selected( $_POST['select'],'alphadown', 1 ); ?>>A-Z</option>
    <option value="alphaup"<?php selected( $_POST['select'],'alphaup', 1 ); ?>>Z-A</option>
  </select>
</form>
 
      <?php query_posts( $args ); ?>
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
          <h5>Final Selects</h5>
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
