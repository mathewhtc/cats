<?php

/*

Template Name: Research

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
<?php if(isset($wp_query->query_vars['test-sort'])) { $test_sort = urldecode($wp_query->query_vars['test-sort']); } else{$test_sort = "content"; }?>
<main id="content">
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="user-container clearfix">
        <div class="researchtype-nav clearfix">
        	<?php if($test_sort == 'content'){ ?><span class="active">Content</span>
            <?php } else { ?><a href="/user-research/?test-sort=content">Content</a><?php } ?>
        	<?php if($test_sort == 'sprint'){ ?><span class="active">Sprint</span>
            <?php } else { ?><a href="/user-research/?test-sort=sprint">Sprint</a><?php } ?>
        </div>
        <div class="research-page">
<?php $args = array ('order' => 'DESC', 'orderby' => 'date');  
  if ($_POST['select'] == 'alphadown') { $args = array ( 'order' => 'ASC', 'orderby' => 'title');  }
  if ($_POST['select'] == 'alphaup') { $args = array ( 'order' => 'DESC', 'orderby' => 'title'); }
  if ($_POST['select'] == 'newest') { $args = array ( 'order' => 'DESC', 'orderby' => 'date'); }
  if ($_POST['select'] == 'oldest') { $args = array ( 'order' => 'ASC', 'orderby' => 'date');  }
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
          <?php 			
			if($test_sort == 'sprint'){
				$tax = 'sprint';
				$link = '/detail/?sprint=';
			}

if($test_sort == 'content'){
	$tax = 'section';
	$link = '/section/?section=';
}

$tags = get_terms($tax,$args);

$i=1; foreach ( $tags as $tag ) {
	query_posts(array ( 'post_type' => 'test', 'posts_per_page' => 20, $tax => $tag->slug ) );
		if( have_posts() ) {?>
          <div class="wdt-percent<?php if(is_float($i/2)){?> mgn2<?php } ?>">
            <ul>
              <li><h5><a href="<?php echo $link; echo $tag->term_id; ?>"><?php echo $tag->name;?></a></h5>
                <ol>
                  <?php while ( have_posts() ) { the_post(); ?>
                  	<li>
						<?php if($tax == 'sprint'){
							$posttags = get_the_terms($post->ID, 'section');
							$count=0;
							if ($posttags) {
								foreach($posttags as $tag) {
								$count++;
								if (1 == $count) { ?>
									<span class="cat"><a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a></span>
							<?php }
							}
						}
                    } ?>
                  <p><a href="/detail/?post-id=<?php echo get_the_ID();?>"><?php echo get_the_title(); ?></a></p>	</li>
                  <?php $post_meta = get_post_meta(get_the_ID());
				  } ?>
                </ol>
              </li>
            </ul>
          </div>
          <?php

		} wp_reset_query();  
		$i++;
	} ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
