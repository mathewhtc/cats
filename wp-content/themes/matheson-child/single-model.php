<?php

/*

Single Post Template: [For Model Single Post]

*/

?>
<?php get_header(); ?>

         <div class="container title-container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title"><a href="/photoshoots/models/">Models</a><?php echo the_title();?></h1><!-- .page-title -->
                </div>
            </div>
        </div>
	</header>

<main id="content">
<div class="container">
  <div class="row">
    <div id="primary" class="col-md-12">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'content', get_post_type() ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
