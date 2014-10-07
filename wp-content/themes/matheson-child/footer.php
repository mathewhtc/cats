<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @since 1.0.0
 */
?>
	</main><!-- main -->

	<footer id="footer" role="contentinfo">
		<div id="footer-content" class="container">
			<div class="row">
				<div class="copyright col-lg-12">
					<span class="pull-left">Copyright &copy;<?php the_date('Y'); ?> <a href="http://htc.com" id="footer-link">HTC</a>. All Rights Reserved. </span>
                    <span class="pull-right"><a href="/about-the-team">About the Team</a></span>
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- #footer-content.container -->
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
function loadContent(post_link){
	jQuery("#ajax-container").html('<div class="loading"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ajax-loader.gif"></div>');
    jQuery("#ajax-container").load(post_link+" #ajax-container");
        return false;
}
   jQuery(document).ready(function(){
		
     });
</script>

</body>
</html>