<?php 
function projecttax_init() {
	// create a new taxonomy
	register_taxonomy(
		'project',
		'post',
		array(
			'hierarchal' => true,
			'label' => __( 'Project' ),
			'rewrite' => array( 'slug' => 'project' ),
			'query_var' => true,
			'capabilities' => array(
				'manage__terms' => 'edit_posts',
				'edit_terms' => 'manage_categories',
				'delete_terms' => 'manage_categories',
				'assign_terms' => 'edit_posts'
			)
		)
	);
}
add_action( 'init', 'projecttax_init' );
add_action( 'init', 'project_cpt' );

function project_cpt() {
register_post_type( 'project', array(
  'labels' => array(
    'name' => 'Projects',
    'singular_name' => 'Project',
   ),
  'description' => 'Projects',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' ),
  'taxonomies' => array('section')
));
}

add_action( 'init', 'photoshoot_cpt' );
function photoshoot_cpt() {
register_post_type( 'photoshoot', array(
  'labels' => array(
    'name' => 'Photoshoots',
    'singular_name' => 'Photoshoot',
   ),
  'description' => 'Photoshoots',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' )
));
}

add_action( 'init', 'test_cpt' );
function test_cpt() {
register_post_type( 'test', array(
  'labels' => array(
    'name' => 'Tests',
    'singular_name' => 'Tests',
   ),
  'description' => 'Tests',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' ),
  'taxonomies' => array('section', 'sprint')
));
}

add_action( 'init', 'analytics_cpt' );
function analytics_cpt() {
register_post_type( 'analytics', array(
  'labels' => array(
    'name' => 'Analytics Reports',
    'singular_name' => 'Analytics Report',
   ),
  'description' => 'Analytics Reports',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' ),
  'taxonomies' => array('section', 'country')
));
}

add_action( 'init', 'resource_cpt' );
function resource_cpt() {
register_post_type( 'resource', array(
  'labels' => array(
    'name' => 'Resources',
    'singular_name' => 'Resources',
   ),
  'description' => 'Resources',
  'public' => true,
  'supports' => array( 'title', 'editor', 'custom-fields' ),
));
}

// Register Custom Taxonomy
function custom_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Sprints', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Sprint', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Sprints', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'sprint', array( 'test' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy', 0 );

function custom_taxonomy2() {
	$labels = array(
		'name'                       => _x( 'Sections', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Section', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Sections', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'section', array( 'test', ' project' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy2', 0 );

function custom_taxonomy3() {
	$labels = array(
		'name'                       => _x( 'Countries', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Country', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Country', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'country', array( 'analytics' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy3', 0 );

function add_query_vars($aVars) {
	$aVars[] = "test-sort"; 
	$aVars[] = "post-id";
	$aVars[] = "post-meta-id";
	$aVars[] = "start-date";
	$aVars[] = "end-date";
	$aVars[] = "section";
	$aVars[] = "sprint";
	$aVars[] = "country";
    $aVars[] = "d";
	return $aVars;
}

// hook add_query_vars function into query_vars
add_filter('query_vars', 'add_query_vars');

function date_select($d, $section) {
    $selected[$d] = "selected='selected'";
    if($section != ''){
        $section_filter = '&section=' . $section;
    }
    echo '<select class="fltr" name="menu" onchange="window.document.location.href=this.options[this.selectedIndex].value;">	
			<option selected="selected">Select a date</option>
			<option value="index.php?start-date=' . date("Y-m-d", strtotime("-90 days")) . '&d=1' . $section_filter . '" ' . $selected[1] . '>Last 3 Months</option>
			<option value="index.php?start-date=' . date("Y-m-d", strtotime("-180 days")) . '&d=2' . $section_filter . '"  ' . $selected[2] .'>Last 6 Months</option>
			<option value="index.php?start-date=' . date("Y-m-d", strtotime("1-1-2014")) . '&end-date=' . date("Y-m-d", strtotime("31-12-2014")) . '&d=3' . $section_filter . '"  ' . $selected[3] . '>2014</option>
			<option value="index.php?start-date=' . date("Y-m-d", strtotime("1-1-2013")) . '&end-date=' . date("Y-m-d", strtotime("31-12-2013")) . '&d=4' . $section_filter . '"  ' . $selected[4] . '>2013</option>
			<option value="index.php?start-date=' . date('Y-m-d', strtotime('1-1-2012')) . '&end-date=' . date('Y-m-d', strtotime('31-12-2012')) . '&d=5' . $section_filter . '"  ' . $selected[5] . '>2012</option>
			<option value="index.php&d=6">All</option>
        </select>';
}
?>