<?php

/*

Single Post Template: [For Project Single Post]

*/

?>
<?php get_header(); ?>

         <div class="container title-container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title"><a href="/projects/">Projects</a><?php echo the_title();?></h1><!-- .page-title -->
                    <div class="entry-meta">
					<?php $posttags = get_the_terms($post->ID, 'section');
                    $count=0;
                    if ($posttags) { ?>
                    <span class="tags">
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
                </div>
            </div>
        </div>
	</header>

<main id="content">
<div class="container">
  <div class="row">
    <div id="primary" class="col-md-12">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'content', get_post_format() ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
