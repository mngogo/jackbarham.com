<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="clearfix" role="main">
	
					<?php get_template_part('loop'); ?>
					
					<div id="pagination">
						<?php airpress_pagination(); ?>
					</div>
								
				</div> <!-- main -->
    
				<?php get_sidebar(); ?>
    
			</div> <!-- content -->

<?php get_footer(); ?>