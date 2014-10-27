<?php
/**
 * The template for displaying article headers
 *
 * @since 1.0.6
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>
<div class="entry-meta">
    <?php $posttags = get_the_terms($post->ID, 'section');
	$count=0;
	if ($posttags) { ?>
    <span class="tags">Tags: 
		<?php foreach($posttags as $tag) {
			$count++;
			if (1 == $count) {
			?>
			<a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
			<?php } else { ?>
			&nbsp;/&nbsp;<a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
			<?php
			}
		} ?>
    </span>
	<?php } ?>
</div>