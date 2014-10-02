<?php

$bavotasan_theme_options = bavotasan_theme_options();

$format = get_post_format();

$featured_image = ( has_post_thumbnail() && 'excerpt' == $bavotasan_theme_options['excerpt_content'] ) ? 'featured-image' : 'no-featured-image';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $featured_image ); ?>>
  <?php
			    get_template_part( 'content', 'header' );
				$desktopPSD = get_field('link_to_desktop_psd', get_the_ID());
				$mobilePSD = get_field('link_to_mobile_psd', get_the_ID());
				$desktopPrev = get_field('desktop_psd_image_preview', get_the_ID());
				$mobilePrev = get_field('mobile_psd_image_preview', get_the_ID());
				
			

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
	$dsize = 'medium';
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
	$msize = 'medium';
	$mthumb = $mobilePrev['sizes'][ $msize ];
	$mwidth = $mobilePrev['sizes'][ $msize . '-width' ];
	$mheight = $mobilePrev['sizes'][ $msize . '-height' ];

	

	endif; ?>
				
				
				
				
<?php if(!empty($desktopPSD) || !empty($mobilePrev)){ ?>
  <div class="row">
    <div class="col-md-8">
      <div class="entry-content">
    
	<?php if(!empty($desktopPSD)):
        if( $dcaption ): ?>
		<div class="wp-caption">
	<?php endif; ?>
    
	<a href="<?php echo $durl; ?>" title="<?php echo $dtitle; ?>">
		<img src="<?php echo $dthumb; ?>" alt="<?php echo $dalt; ?>" width="<?php echo $dwidth; ?>" height="<?php echo $dheight; ?>" />
	</a>

	<?php if( $dcaption ): ?>
			<p class="wp-caption-text"><?php echo $dcaption; ?></p>
		</div>

	<?php endif;
        endif; ?>
        
    <?php if(!empty($mobilePrev)):
        if( $mcaption ): ?>

		<div class="wp-caption">

	<?php endif; ?>

	<a href="<?php echo $murl; ?>" title="<?php echo $mtitle; ?>">
		<img src="<?php echo $mthumb; ?>" alt="<?php echo $malt; ?>" width="<?php echo $mwidth; ?>" height="<?php echo $mheight; ?>" />
	</a>

	<?php if( $mcaption ): ?>
			<p class="wp-caption-text"><?php echo $mcaption; ?></p>
		</div>

	<?php endif; endif; ?>
        <?php the_content(); ?>
      </div>
      <!-- .entry-content --> 
      
    </div>
    <div class="col-md-4">
      <div class="psdlinks">
        <h4 class="widget-title">/ PSD Templates</h4>
        <ul class="psd-links">
          <?php if($desktopPSD != ''){ ?>
          <li><i class="fa fa-file"></i>
            <p><a href="<?php echo $desktopPSD; ?>">Desktop PSD</a></p>
          </li>
          <?php } if($mobilePSD !=''){  ?>
          <li><i class="fa fa-file"></i>
            <p><a href="<?php echo $mobilePSD; ?>">Mobile PSD</a></p>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <?php } else { ?>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <!-- .entry-content -->
  
  <?php } ?>
</article>
<!-- #post-<?php the_ID(); ?> -->