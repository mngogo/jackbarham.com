<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="clearfix" role="main">

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail(); // Fullsize image for the single post ?>
							</a>
						<?php endif; ?>
						
						<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
						
						<span class="date"><?php the_date(); ?></span>
						<span class="time"><?php the_time(); ?></span>
						<span class="author"><?php _e( 'Published by', 'airpress' ); ?> <?php the_author_posts_link(); ?></span>
						<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'airpress' ), __( '1 Comment', 'airpress' ), __( '% Comments', 'airpress' )); ?></span>
						
						<?php the_content(); ?>
			
						<?php the_tags( __( 'Tags: ', 'airpress' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
			
						<p><?php _e( 'Categorised in: ', 'airpress' ); the_category(', '); // Separated by commas ?></p>
			
						<p><?php _e( 'This post was written by ', 'airpress' ); the_author(); ?></p>
						
						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
			
						<?php comments_template(); ?>
						
					</article> <!-- post -->
					
				<?php endwhile; ?>
				
				<?php else: ?>
				
					<article>	
						<h1><?php _e( 'Sorry, nothing to display.', 'airpess' ); ?></h1>
					</article>
				
				<?php endif; ?>
			
				</div> <!-- main -->
    
				<?php get_sidebar(); ?>
    
			</div> <!-- content -->

<?php get_footer(); ?>