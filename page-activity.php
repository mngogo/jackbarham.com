<?php

	/*
	Template Name: Activity
	*/

	get_header();

?>

        <div class="contentWrap cf blogWrap">

        	<header class="sectionHeader">
	        	<h2>Activity feed</h2>
        	</header><!-- sectionHeader -->

        	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

        	<article id="post-<?php the_ID(); ?>" <?php post_class('post full-post'); ?>>

				<?php while (has_sub_field('about_content')): ?>
        		<section class="aboutSection">
	        		<h2 class="aboutTitle"><?php the_sub_field('about_section_title'); ?></h2>
	        		<?php the_sub_field('about_section_text'); ?>
        		</section><!-- aboutSection -->
	        	<?php endwhile; ?>

        	</article>

        	<?php endwhile; endif; ?>

        </div><!-- contentWrap -->

<?php get_footer(); ?>