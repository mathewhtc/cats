<?php

/*

Template Name: Home

 */

get_header();

?>

	</header>
    
    <?php /*<div id="projects-popup" class="bubbles-popup">
    	<span class="close-btn">X</span>
        <div class="popup-content">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_projects.png" class="popup-icon" alt="Projects">
        <h3>Projects<a href="/projects" class="viewall-cta">View all</a></h3>
        <?php query_posts(array ( 'post_type' => 'project', 'showposts' => 4 ) ); ?>
                    <ul>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li><h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                        <?php
						$desktopPrev = get_field('desktop_psd_image_preview');
						$mobilePrev = get_field('mobile_psd_image_preview');
						if( !empty($desktopPrev) ){
							// thumbnail
							$dsize = 'large';
							$dthumb = $desktopPrev['sizes'][ $dsize ]; ?>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb"><img src="<?php echo $dthumb; ?>" alt="<?php the_title(); ?>" width="234" /></a>
						<?php } else if( !empty($mobilePrev) ) {
							// thumbnail
							$msize = 'large';
							$mthumb = $mobilePrev['sizes'][ $msize ]; ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb"><img src="<?php echo $mthumb; ?>" alt="<?php the_title(); ?>" width="234" /></a>
                        <?php } else { ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb default"></a>
                        <?php } ?>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php 
                    endif; wp_reset_query(); ?>
        </div>
    </div>
    <div id="research-popup" class="bubbles-popup">
    	<span class="close-btn">X</span>
        <div class="popup-content">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_research.png" class="popup-icon" alt="Research">
            <h3>Research<a href="/projects" class="viewall-cta">View all</a></h3>
            <div class="research-cats">
        	<?php $tax = 'section';
			$link = '/section/?section=';
			$tags = get_terms($tax);
			foreach ( $tags as $tag ) {
			query_posts(array ( 'post_type' => 'test', $tax => $tag->slug ) );
				if( have_posts() ) { ?>
					<span class="cat"><a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a></span>
			<?php }
			} wp_reset_query(); ?>
            </div>
        </div>
    </div>
    <div id="photos-popup" class="bubbles-popup">
    	<span class="close-btn">X</span>
        <div class="popup-content">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_photos.png" class="popup-icon" alt="Photos">
        	<h3>Photos<a href="/photoshoots" class="viewall-cta">View all</a></h3>
            <div class="photo-highlight">
            	<a href="/photoshoots#re" class="view-link">Get RE Photography</a>
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/photos_re.jpg" alt="RE Photos">
            </div>
        </div>
    </div>
    <div id="style-popup" class="bubbles-popup">
    	<span class="close-btn">X</span>
        <div class="popup-content">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_styleguide.png" class="popup-icon" alt="Style Guide">
        	<h3>Style Guides</h3>
            <a href="/style-guide" class="big-link">View the HTC Digital Style Guide</a>
        </div>
    </div>*/ ?>
    
    <main>
    	<section id="hero">
        	<div class="main-cta">
            	<a id="projects" class="bubbles" href="/projects/"><span>Projects</span></a>
                <a id="photos" class="bubbles" href="/photoshoots/"><span>Photos</span></a>
                <a id="style" class="bubbles" href="/style-guide/"><span>Style Guide</span></a>
                <a id="research" class="bubbles" href="/user-research/"><span>Research</span></a>
            </div>
            <div id="featured-project">
            	<a href="/projects/recamera-com">Featured <strong>View the RE Project</strong></a>
            </div>
            <video autoplay loop poster="<?php bloginfo('stylesheet_directory'); ?>/home_poster.jpg" id="bgvid">
                <source src="<?php bloginfo('stylesheet_directory'); ?>/video/homepage-video-final.webm" type="video/webm">
                <source src="<?php bloginfo('stylesheet_directory'); ?>/video/homepage-video-final.mp4" type="video/mp4">
            </video>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_arrowdown.png" class="down">
        </section>
    
    <section id="other">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 projects">
                	<h3>Projects<a href="/projects" class="viewall-cta">View all</a></h3>
					<?php query_posts(array ( 'post_type' => 'project', 'posts_per_page' => 5 ) ); ?>
                    <ul>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                        <?php
						$desktopPrev = get_field('desktop_psd_image_preview');
						$mobilePrev = get_field('mobile_psd_image_preview');
						if( !empty($desktopPrev) ){
							// thumbnail
							$dsize = 'large';
							$dthumb = $desktopPrev['sizes'][ $dsize ]; ?>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb"><img src="<?php echo $dthumb; ?>" alt="<?php the_title(); ?>" /></a>
						<?php } else if( !empty($mobilePrev) ) {
							// thumbnail
							$msize = 'large';
							$mthumb = $mobilePrev['sizes'][ $msize ]; ?>    
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb"><img src="<?php echo $mthumb; ?>" alt="<?php the_title(); ?>" /></a>
                        <?php } else { ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-thumb default"></a>
                        <?php } ?>
                                                
						<?php  $meta_values = get_post_meta( $post->ID, 'status', true); ?>
						<span class="status" title="active"><?php echo $meta_values; ?></span>
                        <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                        <p><span class="cat">
                        <?php $posttags = get_the_terms($post->ID, 'section');
                        $count=0;
                        if ($posttags) {
							foreach($posttags as $tag) {
								$count++;
								if (1 == $count) {
								?>
								<a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
								<?php } else { ?>
								&nbsp;/&nbsp;<a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
								<?php
								}
							}
						}?>
                        </span></p>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php 
                    endif; wp_reset_query(); ?>
                </div>
                <div class="col-md-5 col-md-offset-1 research">
                	<h3>Research<a href="/user-research" class="viewall-cta">View all</a></h3>
                    <div class="research-cats">
                <?php $tax = 'section';
				$link = '/section/?section=';
				$tags = get_terms($tax);
				foreach ( $tags as $tag ) {
				query_posts(array ( 'post_type' => 'test', $tax => $tag->slug ) );
					if( have_posts() ) { ?>
						<span class="cat"><a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a></span>
                <?php }
				} wp_reset_query(); ?>
                	</div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
