<?php
/*
Template Name: Style User Guide
 */
get_header();
?>
	<header class="header-pos" id="archive-header" style="background-image:url(<?php header_image_url(); ?>);">
		
			<div class="container">

					<div class="row">
						<div class="col-sm-12">
							<h1 class="page-title"><?php echo the_title();?></h1><!-- .page-title -->
						</div>
					</div>

			</div>
	
	</header>		
			

	<div class="container">
		
		<div class="row">
				

				<div class="col-md-8">
					<div class="user-container clearfix">	
					
						<div class="wdt-percent"><a href="https://drive.google.com/file/d/0B87rXQuGl2epSVFaaUQ2NG1hbk0/edit?usp=sharing"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/thumb-re-style-guide.gif"  alt="RE Style Guide" /></a></div>
						<div class="wdt-percent mgn2"><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/thumb-htc-style-guide.gif"  alt="HTC Style Guide" /></a></div>

						<div class="wdt-percent"><a href="https://drive.google.com/open?id=0B9tXm7YUBs5ocFc4N090VWNmcGs&authuser=0"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/thumb-iconography.gif"  alt="Iconography" /></a></div>
						<div class="wdt-percent mgn2"><a href="https://drive.google.com/open?id=0B9tXm7YUBs5odVM0VUx6LVkyYjQ&authuser=0"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/thumb-logos.gif"  alt="Logos" /></a></div>
				
					</div>
				</div>

				<div class="col-md-4">
				
					<?php get_sidebar(); ?>

				</div>

		</div>
    </div>

<?php get_footer(); ?>	