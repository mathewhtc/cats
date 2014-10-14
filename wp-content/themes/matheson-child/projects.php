<?php
/*
Template Name: Projects
 */
get_header();
?>
<ul>
  

<header id="archive-header">
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
      <div class="row">
        <div class="col-md-6">
          <div class="widget widget-menu">
            <h3 class="widget-title">Active</h3>
            <?php get_template_part( 'content', 'active' ); ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="widget widget-menu">
            <h3 class="widget-title">Completed</h3>
            <?php get_template_part( 'content', 'archived' ); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
