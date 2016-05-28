<?php 
	
	/*
	Template Name: Portfolio
	*/
	
	get_header(); 
	
?>
			
        <div class="contentWrap cf innerWrap">
        	
        	<header class="sectionHeader">
		        	<h2>Portfolio</h2>
	        	</header><!-- sectionHeader -->
        
			<ul id="imgGrid3">
				<?php $pageID = get_the_ID(); $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => -1 ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php get_template_part('loop','portfolio'); ?>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
        		        
        </div><!-- contentWrap -->

<?php get_footer(); ?>