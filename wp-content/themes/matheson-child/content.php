<?php
$bavotasan_theme_options = bavotasan_theme_options();
$format = get_post_format();
?>

<article id="post-<?php the_ID(); ?>">
  <?php
				$desktopPSD = get_field('link_to_desktop_psd', get_the_ID());
				$mobilePSD = get_field('link_to_mobile_psd', get_the_ID());
				$desktopPrev = get_field('desktop_psd_image_preview', get_the_ID());
				$mobilePrev = get_field('mobile_psd_image_preview', get_the_ID());
				$copydeck = get_field('link_to_copy_doc', get_the_ID());
				$messagingframework = get_field('messaging_framework', get_the_ID());
				$wireframes = get_field('wireframes', get_the_ID());
				$prototypes = get_field('prototypes', get_the_ID());
				
			

$desktopPrev = get_field('desktop_psd_image_preview');
$mobilePrev = get_field('mobile_psd_image_preview');

if( !empty($desktopPrev) ): 

	// vars
	$durl = $desktopPrev['url'];
	if($desktopPrev['caption']){
		$dcaption = $desktopPrev['caption'];
	} else{
			$dcaption = "Desktop";
	}
	$dtitle = $desktopPrev['title'];
	$dalt = $desktopPrev['alt'];
	
	// thumbnail
	$dsize = 'large';
	$dthumb = $desktopPrev['sizes'][ $dsize ];
	$dwidth = $desktopPrev['sizes'][ $dsize . '-width' ];
	$dheight = $desktopPrev['sizes'][ $dsize . '-height' ];

	

	endif;
	
if( !empty($mobilePrev) ): 

	// vars
	$murl = $mobilePrev['url'];
	if($mobilePrev['caption']){
		$mcaption = $mobilePrev['caption'];
	} else{
			$mcaption = "Mobile";
	}
	$mtitle = $mobilePrev['title'];
	$malt = $mobilePrev['alt'];

	// thumbnail
	$msize = 'large';
	$mthumb = $mobilePrev['sizes'][ $msize ];
	$mwidth = $mobilePrev['sizes'][ $msize . '-width' ];
	$mheight = $mobilePrev['sizes'][ $msize . '-height' ];

	

	endif; ?>
				
	<div class="row">
    	<div class="col-md-12">
		<?php if(!empty($wireframes) || !empty($prototypes)){ ?>
            <ul class="psd-links">
            	<li><h4 class="widget-title">User Experience:</h4></li>
            <?php if($wireframes != ''){ ?>
                <li><a href="<?php echo $wireframes; ?>">Wireframes</a></li>
            <?php } ?>
            <?php if($prototypes != ''){ ?>
                <li><?php echo $prototypes; ?></li>
            <?php } ?>
            </ul>
        <?php } ?>
        <?php if(!empty($desktopPSD) || !empty($mobilePSD)){ ?>
            <ul class="psd-links">
                <li><h4 class="widget-title">Design Files:</h4></li>
            <?php if($desktopPSD != ''){ ?>
                <li><a href="<?php echo $desktopPSD; ?>">Desktop</a></li>
                <?php } if($mobilePSD !=''){  ?>
                <li><a href="<?php echo $mobilePSD; ?>">Mobile</a></li>
            <?php } ?>
            </ul>
        <?php } ?>
		<?php if(!empty($copydeck) || !empty($messagingframework)){ ?>
            <ul class="psd-links">
            	<li><h4 class="widget-title">Messaging:</h4></li>
            <?php if($copydeck != ''){ ?>
                <li><a href="<?php echo $copydeck; ?>">Copy Deck</a></li>
            <?php } ?>
            <?php if($messagingframework != ''){ ?>
                <li><a href="<?php echo $messagingframework; ?>">Messaging Framework</a></li>
            <?php } ?>
            </ul>
        <?php } ?>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="entry-content row">
            	<div class="col-md-8">
    
			<?php if(!empty($desktopPSD)): ?>
                <a href="<?php echo $durl; ?>" title="<?php echo $dtitle; ?>">
                    <img src="<?php echo $dthumb; ?>" alt="<?php echo $dalt; ?>" width="<?php echo $dwidth; ?>" height="<?php echo $dheight; ?>" />
                </a>
			<?php else: ?>
            	
			<?php endif; ?>
            	</div>
        		<div class="col-md-4">
    		<?php if(!empty($mobilePrev)): ?>
                <a href="<?php echo $murl; ?>" title="<?php echo $mtitle; ?>">
                    <img src="<?php echo $mthumb; ?>" alt="<?php echo $malt; ?>" width="<?php echo $mwidth; ?>" height="<?php echo $mheight; ?>" />
                </a>
			<?php endif; ?>
            	</div>
			<?php the_content(); ?>
            </div>
        </div>
    </div>
</article>
<!-- #post-<?php the_ID(); ?> -->