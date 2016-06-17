<?php
    /* Template Name: About */
    get_header(); 
?>

        <section class="layout-section layout-copy">
        	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php while (has_sub_field('about_content')): ?>
        		<section class="feed-item">
	        		<h2 class="feed-title"><?php the_sub_field('about_section_title'); ?></h2>
	        		<?php the_sub_field('about_section_text'); ?>
        		</section><!-- aboutSection -->
	        	<?php endwhile; ?>
        	</article><!-- blogFeed -->
        	<?php endwhile; endif; ?>
        </section>

<?php get_footer(); ?>