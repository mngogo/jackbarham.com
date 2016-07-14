			<section <?php post_class('feed-item'); ?>>
                <?php if (have_rows('activity_link')): while (have_rows('activity_link')): the_row(); if (get_row_layout() == 'activity_external_link'): ?>
                    <h1 class="title-medium"><a href="<?php the_sub_field('activity_external_url') ?>" target="_blank"><?php the_title(); ?></a></h1>
                <?php elseif (get_row_layout() == 'activity_internal_page'): ?>
                    <h1 class="title-medium"><a href="<?php the_sub_field('activity_link_page') ?>"><?php the_title(); ?></a></h1>
                <?php endif; endwhile; endif; ?>
	        	<p class="excerpt"><?php the_field('activity_description'); ?></p>
	        	<ul class="feed-meta cf">
	        		<li><?php echo get_the_date(); ?></li>
	        		<li><?php the_field('activity_type'); ?></li>
                    <?php if (have_rows('activity_link')): while (have_rows('activity_link')): the_row(); if (get_row_layout() == 'activity_external_link'): ?>
                        <li><a href="<?php the_sub_field('activity_external_url') ?>" title="<?php the_title_attribute(); ?>"><?php the_field('activity_cta_text'); ?></a></li>
                    <?php elseif (get_row_layout() == 'activity_internal_page'): ?>
                        <li><a href="<?php the_sub_field('activity_link_page') ?>" title="<?php the_title_attribute(); ?>"><?php the_field('activity_cta_text'); ?></a></li>
                    <?php endif; endwhile; endif; ?>
	        	</ul>
        	</section><!-- blogFeed -->