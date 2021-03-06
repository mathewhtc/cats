<?php
/*
Template Name: Report
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
                    <h1 class="page-title"><?php the_title() ?></h1><!-- .page-title -->
                </div>
            </div>
        </div>
        <p class="back"><a href="/analytics-reports/">&lt; Back to Analytics Reports</a></p>
	</header>

<main id="content">
<div class="container report" id="ajax-container">
  <div class="row">
    <div class="col-md-12">
      <div class="user-container clearfix">
        <div class="clearfix">
          <?php $test_query = array ( 'post_type' => 'test', 'orderby'=> 'date', 'order'=> 'ASC', 'posts_per_page' => 10,  'sprint' => $term[0]->name); ?>
          <h2 class="top-heading"><span class="status">Tested <?php echo get_post_modified_time('M d Y', $post->ID); ?></span></h2>
        </div>
        <div class="content row" id="single-post-container">
          <div id="inner_post_content" class="col-md-8">
            <div id="finished-test">
            <?php if(get_field("summary", $post_id) != ""){ ?>
            <div class="summary">
                <?php echo get_field("summary", $post_id);?>
            </div>
            <?php } ?>
            </div>
            </div>
            <div class="col-md-4">
                <p class="download-link"><a href="<?php echo get_field("report_file", $post_id); ?>">Download Report</a></p>
                <ul class="posttags">
                    <li><?php $posttags = get_the_terms($post->ID, 'section');
                $count=0;
                if ($posttags) { ?>
                    <span class="cat">Topic<?php if(count($posttags) > 1) { echo 's'; } ?>: 
                <?php foreach($posttags as $tag) {
					$count++;
					if($count>1): echo '&nbsp;/&nbsp;'; endif; ?><a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
                <?php }
            } ?></span></li>
            <li><?php $posttags = get_the_terms($post->ID, 'country');
                $count=0;
                if ($posttags) { ?>
                    <span class="cat">Region<?php if(count($posttags) > 1) { echo 's'; } ?>: 
                <?php foreach($posttags as $tag) { $count++;
                    if($count>1): echo '&nbsp;/&nbsp;'; endif; ?>
                    <strong><?php echo $tag->name;?></strong>
                <?php } ?>
                </span>
            <?php } ?></li>
            </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
