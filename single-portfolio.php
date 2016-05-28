<?php get_header(); ?>
			
        <div class="contentWrap cf innerWrap">
        
        	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        	
        	<section id="gridPortfolio" class="cf">
	        	
	        	<div class="right">
	        		
	        		<h2 id="pageTitle"><?php the_title(); ?></h2>
	        		
	        		<ul class="pMeta">
	        			<li>Type: <?php the_field('potfolio_type'); ?></li>
						<li>Role: <?php the_field('portfolio_role'); ?></li>
						<li>Published: <?php the_field('portfolio_published'); ?></li>
	        		</ul>

	        		<?php if (get_field('portfolio_description')): ?>
	        		<div id="prortfolioInfo">
			        	<?php the_field('portfolio_description'); ?>
		        	</div><!-- prortfolioInfo -->
		        	<?php endif; ?>
		        	
		        	<div id="desktopButton" class="<?php the_field('potfolio_mobile_only'); ?>">
		        	
		        		<ul id="miniNav">
				        	<li><a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>" class="arrow fade fast"><i class="fa fa-long-arrow-left"></i></a></li>
				        	<li><a href="<?php echo site_url('/portfolio/'); ?>" class="blocks fade fast"><i class="fa fa-th"></i></a></li>
				        	<li><a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>" class="arrow fade fast"><i class="fa fa-long-arrow-right"></i></a></li>
			        	</ul>
		        	
			        	<?php if (get_field('portfolio_link_url')): ?>
			        	<div id="portfolioLink">
			        		<a href="<?php the_field('portfolio_link_url'); ?>" target="_blank" class="btn view fade">
				        		<span class="pLinkText"><?php the_field('portfolio_link_text'); ?></span>
				        		<i class="fa fa-angle-right"></i>
			        		</a>
			        	</div><!-- portfolioLink -->
			        	<?php endif; ?>
			        	
			        	<?php if (get_field('portfolio_no_link_text')): ?>
			        	<div id="portfolioNoLink">
			        		<p><?php the_field('portfolio_no_link_text'); ?></p>
			        	</div><!-- portfolioLink -->
			        	<?php endif; ?>
		        	
		        	</div><!-- desktopButton --> 
		        	
	        	</div><!-- right -->
	        	
	        	<div class="left">
	        		
	        		<ul id="showcase">
	        			<?php while(has_sub_field('portfolio_images')): ?>
						<li><img src="<?php the_sub_field('portfolio_image'); ?>" class="portfolioImg" alt="<?php the_title(); ?>"></li>
						<?php endwhile; ?>
		        	</ul>
		        	
		        	<div id="mobileButton" class="<?php the_field('potfolio_mobile_only'); ?>">
		        	
		        		<ul id="miniNav">
			        		<?php if ( !is_single( 'marvel-app-blog' ) ) : ?>
				        	<li><a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>" class="arrow fade fast"><i class="fa fa-long-arrow-left"></i></a></li>
				        	<?php endif; ?>
				        	<li><a href="<?php echo site_url('/portfolio/'); ?>" class="blocks fade fast"><i class="fa fa-th"></i></a></li>
				        	<li><a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>" class="arrow fade fast"><i class="fa fa-long-arrow-right"></i></a></li>
			        	</ul>
		        	
			        	<?php if (get_field('portfolio_link_url')): ?>
			        	<div id="portfolioLink">
			        		<a href="<?php the_field('portfolio_link_url'); ?>" target="_blank" class="btn view fade">
				        		<span class="pLinkText"><?php the_field('portfolio_link_text'); ?></span>
				        		<i class="fa fa-angle-right"></i>
			        		</a>
			        	</div><!-- portfolioLink -->
			        	<?php endif; ?>
			        	
			        	<?php if (get_field('portfolio_no_link_text')): ?>
			        	<div id="portfolioNoLink">
			        		<p><?php the_field('portfolio_no_link_text'); ?></p>
			        	</div><!-- portfolioLink -->
			        	<?php endif; ?>
		        	
		        	</div><!-- mobileButton -->
		        	
	        	</div><!-- left -->
	        	
        	</section>
        	
        	<?php endwhile; endif; ?>
        		        
        </div><!-- contentWrap -->

<?php get_footer(); ?>