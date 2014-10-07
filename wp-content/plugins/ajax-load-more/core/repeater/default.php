<li>
                    	<?php 
                            echo '<i class="fa fa-file-text" title="complete"></i>';
			    //$project = get_the_term_list($post->ID, 'project');
                        ?>
                        <p><span class="cat"><?php $posttags = get_the_terms($post->ID, 'section');
				$count=0;
					if ($posttags) {
  						foreach($posttags as $tag) {
   						 $count++;
    							if (1 == $count) {
      							?><a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a><?php
    							} else { ?>,&nbsp;<a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a><?php }
  						}
			} ?></span></p>
                        <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                        <p><span class="updated">Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</span></p>
                        </li>