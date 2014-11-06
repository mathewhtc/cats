<?php
$bavotasan_theme_options = bavotasan_theme_options();
$format = get_post_format();
?>

<article id="post-<?php the_ID(); ?>">
<?php
				$photo1 = get_field('photo_1', get_the_ID());
				if($photo1): $pic_count = 1; endif;
				$photo2 = get_field('photo_2', get_the_ID());
				if($photo2): $pic_count++; endif;
				$photo3 = get_field('photo_3', get_the_ID());
				if($photo3): $pic_count++; endif;
				$photo4 = get_field('photo_4', get_the_ID());
				if($photo4): $pic_count++; endif;
				$contact = get_field('contact_info', get_the_ID());
				$sizes = get_field('size_info', get_the_ID());
				$notes = get_field('notes', get_the_ID());
				$photoshoots = get_field('photoshoots');

?>

    <div class="row">
    	<div class="col-md-3">
        <?php if($contact) { ?>
        	<div class="contact-info">
            	<h5>Contact Info</h5>
            <?php echo $contact; ?>
            </div>
        <?php } ?>
        <?php if($sizes) { ?>
        	<div class="size-info">
            	<h5>Sizes</h5>
            <?php echo $sizes; ?>
            </div>
        <?php } ?>
        <?php if($photoshoots) { ?>
        	<div class="photoshoots">
                <h5>Photoshoots</h5>
                <ul>
                <?php foreach( $photoshoots as $post): ?>
                    <?php setup_postdata($post); ?>
                    <li><?php the_title(); ?></li>
                <?php endforeach; ?>
                </ul>
            <?php wp_reset_postdata(); ?>
            </div>
        <?php } ?>
        <?php if($notes) { ?>
        	<div class="contact-info">
            	<h5>Notes</h5>
            <?php echo $notes; ?>
            </div>
        <?php } ?>
        </div>
    	<div class="col-md-9">
        	<?php if($photo1) { ?>
            	<img src="<?php echo $photo1; ?>" class="model-img <?php if($pic_count == 1): echo "imgfull"; else: echo "img1"; endif; ?>">
            <?php } ?>
        	<?php if($photo2) { ?>
            	<img src="<?php echo $photo2; ?>" class="model-img img2">
            <?php } ?>
        	<?php if($photo3) { ?>
            	<img src="<?php echo $photo3; ?>" class="model-img img3">
            <?php } ?>
        	<?php if($photo4) { ?>
            	<img src="<?php echo $photo4; ?>" class="model-img img4">
            <?php } ?>
        </div>
    </div>
</article>
<!-- #post-<?php the_ID(); ?> -->