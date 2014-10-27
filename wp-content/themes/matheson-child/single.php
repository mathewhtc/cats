<?php
/**
 * The Template for displaying all single posts.
 *
 * @since 1.0.0
 */
get_header(); ?>

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
			<div id="primary" class="col-md-8">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>
                    
				<?php endwhile; // end of the loop. ?>
			</div>
            <div class="col-md-4">
				<?php get_sidebar(); ?>
            </div>
		</div>
	</div>

<?php get_footer(); ?>