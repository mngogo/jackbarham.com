<?php
	/* Template Name: Home */
	get_header(); 
?>

    <section class="layout-section">
        <h1 class="hero-title">Digitial product <br/>designer &amp; developer</h1>
    </section>

    <section class="layout-section layout-wide">
        <header class="layout-header">
            <h2>Featured work</h2>
        </header>
        <?php $posts = get_field('featured_items'); $count = "featured0"; if ($posts): ?>
            <ul class="grid-3 cf">
                <?php foreach($posts as $post): $count++ ?>
                    <?php setup_postdata($post); ?>
                    <li class="<?php echo $count; ?> block-item">
                        <a href="<?php the_permalink(); ?>" class="fade touchHover">
                            <img src="<?php the_field('portfolio_thumbnail'); ?>" alt="<?php the_title(); ?>" class="pImg fade">
                        <span class="block-background">
                            <span class="block-info">
                                <h1><?php the_title(); ?></h1>
                                <p><?php the_field('potfolio_type'); ?></p>
                            </span>
                        </span>
                        </a>
                    </li>

                <?php endforeach; ?>
            </ul>
            <?php wp_reset_postdata(); endif; ?>
    </section><!-- featured -->

    <section class="layout-section layout-copy">
        <header class="layout-header">
            <h2>Activity feed</h2>
        </header><!-- sectionHeader -->
        <?php $pageID = get_the_ID(); $loop = new WP_Query( array( 'post_type' => 'articles', 'posts_per_page' => 3 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php get_template_part('loop','article'); ?>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>

<?php get_footer(); ?>