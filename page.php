<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="clearfix" role="main">

					<h1><?php the_title(); ?></h1>
	
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<?php the_content(); ?>
							
							<?php comments_template( '', true ); // Remove if you don't want comments ?>
							
						</article>
						
					<?php endwhile; ?>
					
					<?php else: ?>
					
						<article>							
							<h2><?php _e( 'Sorry, nothing to display.', 'airpress' ); ?></h2>							
						</article>
					
					<?php endif; ?>
			
				</div> <!-- main -->
    
				<?php get_sidebar(); ?>
    
			</div> <!-- content -->

<?php get_footer(); ?>