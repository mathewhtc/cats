<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();
?>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h1 class="entry-title"><?php the_title(); ?></h1>

						    <div class="entry-content">
							    <?php the_content(); ?>
						    </div><!-- .entry-content -->
					</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; ?>
			</div>
            <div class="col-md-4">
			<?php get_sidebar(); ?>
            </div>
		</div>
	</div>

<?php get_footer(); ?>