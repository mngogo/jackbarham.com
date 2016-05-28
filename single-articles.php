<?php get_header(); ?>
			
        <div class="contentWrap cf blogWrap">
        	
        	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        	
        	<article itemscope itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class('post full-post'); ?>>
        		<header id="post-header">
		        	<h1 class="blogTitle"><?php the_title(); ?></h1>
		        	<ul class="meta full cf">
		        		<li class="metaDate"><?php the_date(); ?></li>
		        		<li class="metaAuthor last">By <?php the_author(); ?></li>
		        	</ul>
        		</header>
	        	
	        	<?php the_content(); ?>
	        	
	        	<footer id="post-footer" class="cf">
	        		<ul id="shareSocial" class="cf">
	        			<li class="shareFirst">Share:</li>
		        		<li><a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo urlencode(the_permalink()); ?>&p[title]=<?php echo urlencode(the_title()); ?>&p[summary]=<?php echo urlencode(the_field('article_excerpt')); ?>" rel="nofollow" title="Share on Facebook" class="shareFace share"><i class="fa fa-facebook"></i>Facebook</a></li>
		        		<li><a href="http://twitter.com/share?text=<?php echo urlencode(the_title()); ?>&url=<?php echo urlencode(the_field('article_bitly_url')); ?>&via=JackBarham" rel="nofollow" title="Share on Twitter" class="shareTwit share"><i class="fa fa-twitter"></i>Twitter</a></li>
		        		<li><a rel="nofollow" href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink()); ?>" title="Share on Google+" class="shareGoog share"><i class="fa fa-google-plus"></i>Google+</a></li>
		        		<li><a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(the_permalink()); ?>&title=<?php echo urlencode(the_title()); ?>&summary=<?php echo urlencode(the_field('article_excerpt')); ?>&source=<?php echo urlencode(bloginfo('name')); ?>" title="Share on LinkedIn" class="shareLink share"><i class="fa fa-linkedin"></i>LinkedIn</a></li>
		        	</ul>
		        	<div class="followRight"><a href="https://twitter.com/JackBarham" class="twitter-follow-button" data-show-count="false">Follow @JackBarham</a></div>
	        	</footer>
	        	
        	</article><!-- blogFeed -->
        	
        	<?php comments_template(); ?>
        	
        	<?php endwhile; endif; ?>
        		        
        </div><!-- contentWrap -->

<?php get_footer(); ?>