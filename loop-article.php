			<section id="post-<?php the_ID(); ?>" <?php post_class('feed-item'); ?>>
	        	<h1 class="feed-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
	        	<p class="excerpt"><?php the_field('article_excerpt', $post->ID); ?></p>
	        	<ul class="feed-meta cf">
	        		<li><?php echo get_the_date(); ?></li>
	        		<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Full article &#10142;</a></li>
	        	</ul>
        	</section><!-- blogFeed -->