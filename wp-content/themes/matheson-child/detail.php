<?php
/*
Template Name: Detail
 */
get_header();

// Process query strings we feed in
if(isset($wp_query->query_vars['post-id'])) {
$post_id = urldecode($wp_query->query_vars['post-id']); 
if(!is_numeric($post_id)){
	$post_id = "";
}
}

if(isset($wp_query->query_vars['sprint'])) {
$sprint_id = urldecode($wp_query->query_vars['sprint']); 
if(!is_numeric($sprint_id)){
	$sprint_id = "";
}
}

//echo "sprint " . $sprint_id; exit();
$sprint_post = get_posts(array(
    'post_type' => 'test',
    'orderby'=> 'date', 
    'order'=> 'ASC',
    'posts_per_page' => 10, 
    'tax_query' => array(
        array(
        'taxonomy' => 'sprint',
        'field' => 'term_id',
        'terms' => $sprint_id)
    ))
);

if($sprint_id){
	$post = $sprint_post;
	//print_r($post);
	$post_id = $post[0]->ID;
}
else{
	$post = get_post($post_id);
}

$s_id = $post_id;
$meta_values = get_post_meta($post_id);
$term = wp_get_post_terms( $post_id, 'sprint', $args );

function getFiletype($filetocheck){
	$filetype = wp_check_filetype($filetocheck);
	return $filetype['ext']; // will output jpg
}
?>
         <div class="container title-container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title"><?php echo $term[0]->name;?></h1><!-- .page-title -->
                </div>
            </div>
        </div>
        <p class="back"><a href="/user-research/">&lt; Back to User Research</a></p>
	</header>

<main id="content">
<div class="container" id="ajax-container">
  <div class="row">
    <div class="col-md-12">
      <div class="user-container clearfix">
        <div class="clearfix">
          <?php $test_query = array ( 'post_type' => 'test', 'orderby'=> 'date', 'order'=> 'ASC', 'posts_per_page' => 10,  'sprint' => $term[0]->name); ?>
          <h2 class="top-heading"><span class="status"><?php echo get_field("upcoming/tested", $post_id);?><?php if(get_field("date_testing_was_performed", $post_id) != ""){ $date = new DateTime(get_field("date_testing_was_performed", $post_id)); echo '&nbsp;' . $date->format('F j, Y'); } ?></span><?php echo get_the_title($post_id);?></h2>
          	<select class="fltr" name="menu" onChange="loadContent(this.options[this.selectedIndex].value);">
            <?php query_posts($test_query ); 
			  if( have_posts() ) { while ( have_posts() ) { the_post();?>
                <option value="index.php?post-id=<?php echo get_the_id(); ?>" <?php if($s_id == get_the_id()){?>selected="selected"<?php }?>><?php echo get_the_title();?></option>
                <?php  }} ?>
              </select>
            </div>
            <div class="content" id="single-post-container">
              <div id="inner_post_content">
                <div id="finished-test">
                    <?php if(get_field("summary", $post_id) != ""){ ?>
                    <div class="summary">
                        <?php echo get_field("summary", $post_id);?>
                    </div>
                    <?php if(strpos(get_field("link_to_final_pdf_report", $post_id),'pdf') !== false) { ?>
                        <embed src="<?php echo get_field("link_to_final_pdf_report", $post_id) ?>" width="100%" height="900px">
                    <?php } } ?>
                    <?php if(strpos(get_field("link_to_final_pdf_report", $post_id),'pdf') !== false) { ?>
                        <p class="download-link"><a href="<?php echo get_field("link_to_final_pdf_report", $post_id); ?>" target="_blank">Download Final Report (PDF)</a></p>
                    <?php } ?>
                </div>
                
                <?php if(get_field("upload_file_1", $post_id) != ""){
                    if(getFiletype(get_field("upload_file_1", $post_id)) == 'jpg'){ ?>
                    <img src="<?php echo get_field("upload_file_1", $post_id) ?>" alt="<?php echo get_field("name_1", $post_id); ?>">
                <?php } else if(getFiletype(get_field("upload_file_1", $post_id)) == 'pdf'){ ?>
                    <embed src="<?php echo get_field("upload_file_1", $post_id) ?>" width="100%" height="800px">
                <?php }  } ?>
                
                <?php if(get_field("extra_file_field", $post_id) != ""){
                    if(getFiletype(get_field("extra_file_field", $post_id)) == 'jpg'){ ?>
                    <img src="<?php echo get_field("extra_file_field", $post_id) ?>" alt="<?php echo get_field("extra_file_field_label", $post_id); ?>">
                <?php } else if(getFiletype(get_field("extra_file_field", $post_id)) == 'pdf'){ ?>
                    <embed src="<?php echo get_field("extra_file_field", $post_id) ?>" width="100%" height="900px">
                <?php }  } ?>
                
                <?php if(get_field("test_url", $post_id) != ""){ ?>
                    <p><a href="<?php echo get_field("test_url", $post_id) ?>"><?php echo get_field("test_url_label", $post_id) ?></a></p>
                <?php } ?>
                
                <?php if(get_field("extra_url_field", $post_id) != ""){ ?>
                    <p><a href="<?php echo get_field("extra_url_field", $post_id) ?>"><?php echo get_field("extra_url_field_label", $post_id) ?></a></p>
                <?php } ?>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
