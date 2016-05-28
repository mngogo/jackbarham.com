<?php 
	
	/*
	Template Name: Articles
	*/
	
	get_header(); 
	
?>
			
        <div class="contentWrap cf blogWrap">
        
        	<header class="sectionHeader">
	        	<h2>Articles</h2>
        	</header><!-- sectionHeader -->
        	
        	<?php $pageID = get_the_ID(); $loop = new WP_Query( array( 'post_type' => 'articles', 'posts_per_page' => -1 ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        	<?php get_template_part('loop','article'); ?>     	
        	<?php endwhile; wp_reset_postdata(); ?>
        		        
        </div><!-- contentWrap -->

<?php get_footer(); ?>