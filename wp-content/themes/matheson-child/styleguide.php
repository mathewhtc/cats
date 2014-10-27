<?php
/*
Template Name: Style User Guide
 */
get_header();

if(is_page('re-style-guide')){ $whichguide = 're'; } else if (is_page('style-guide')) { $whichguide = 'htc'; }
?>
        <div class="container title-container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">The HTC Digital Style Guide lives here.</h1><!-- .page-title -->
                </div>
            </div>
        </div>
	</header>		
	
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 guide-nav-container">
                <?php //wp_nav_menu( array( 'theme_location' => 'styleguide-menu', 'container_class' => 'guide-nav' ) ); ?>
                	<div class="guide-switcher">
                    	<a href="/style-guide"<?php if($whichguide == 'htc') { ?> class="active"<?php } ?>>HTC Guide</a>
                        <a href="/re-style-guide"<?php if($whichguide == 're') { ?> class="active"<?php } ?>>RE Guide</a>
                    </div>
                	<div class="guide-nav">
                    <?php if($whichguide == 'htc') { ?>
                    <ul id="menu-style-guide-menu">
                    	<li class="active"><span class="activeitem"></span>Brand</li>
                        <li><a href="#">Messaging</a>
                        	<ul>
                                <li><a href="#">Product Messaging</a></li>
                                <li><a href="#">Marketing &amp; Brand Messaging</a></li>
                                <li><a href="#">Social &amp; Blogs</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Logos</a>
                        	<ul>
                            	<li><a href="#">Brand</a></li>
                                <li><a href="#">Devices</a></li>
                                <li><a href="#">Other</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Colors</a></li>
                        <li><a href="#">Typography</a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Iconography</a></li>
                        <li><a href="#">Layouts &amp; the Grid</a>
                        	<ul>
                            	<li><a href="#">Responsive Layouts</a></li>
                                <li><a href="#">Chrome</a></li>
                                <li><a href="#">Homepage</a></li>
                                <li><a href="#">Product Detail Page</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Buttons &amp; CTAs</a></li>
                        <li><a href="#">Emails</a></li>
                        <li><a href="#">Web Image Production</a></li>
                    </ul>
                    <?php } ?>
                    <?php if($whichguide == 're') { ?>
                    <ul id="menu-style-guide-menu">
                    	<li class="active"><span class="activeitem"></span>Brand</li>
                        <li><a href="#">Messaging</a></li>
                        <li><a href="#">Logos</a>
                        	<ul>
                            	<li><a href="#">The Mark</a></li>
                                <li><a href="#">Circle Pattern</a></li>
                                <li><a href="#">Examples</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Colors</a></li>
                        <li><a href="#">Typography</a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Iconography</a></li>
                        <li><a href="#">Buttons &amp; CTAs</a></li>
                        <li><a href="#">Emails</a></li>
                    </ul>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-md-9" id="guide-content">
                <?php while ( have_posts() ) : the_post(); ?>
                	<div class="post-content">
	                	<?php the_content(); ?>
                    </div>
                    <div class="post-nav">
                        <?php /*<div class="guide-btn">
                        	<a href="#" class="prev">Previous <strong></strong></a>
                        </div>*/ ?>
                        <div class="guide-btn" style="float:right;">
                        	<a href="#" class="next">Next <strong>Messaging</strong></a>
                        </div>
                        
                <?php endwhile; ?>
                </div>
            </div>
        </div>

<?php get_footer(); ?>	