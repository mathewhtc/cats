<div class="vw-post-box-layout vw-post-box-layout-large-small-3-col">
	<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
	<div class="vw-post-box-layout-title-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="vw-post-box-layout-title"><?php echo do_shortcode( $title ); ?></h2>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<div class="row">
		<div class="col-sm-12 col-md-4">
			<?php if( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'templates/post-box/post-box-large', get_post_format() ); ?>
			<?php endif; ?>
		</div>
		<div class="col-sm-12 col-md-8">
			<div class="block-grid block-grid-xs-1 block-grid-sm-2 block-grid-md-2">

			<?php while( have_posts() ) : the_post(); ?>
				<div class="block-grid-item">
				<?php get_template_part( 'templates/post-box/post-box-small', get_post_format() ); ?>
				</div>
			<?php endwhile; ?>

			</div>
		</div>
	</div>
</div>