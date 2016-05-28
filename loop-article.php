			<section id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	        	<h1 class="blogTitle feed"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
	        	<p class="excerpt"><?php the_field('article_excerpt', $post->ID); ?></p>
	        	<ul class="meta cf">
	        		<li class="metaDate"><?php the_date(); ?></li>
	        		<li class="metaMore last"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Full article &#10142;</a></li>
	        	</ul>
        	</section><!-- blogFeed -->