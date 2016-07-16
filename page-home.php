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

        <?php $posts = get_field('featured_items'); ?>
        <ul class="grid-3 block-preview cf">
            <?php foreach($posts as $post): ?>
                <li class="block-item">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_field('portfolio_thumbnail'); ?>" alt="<?php the_title(); ?>">
                    <span class="block-background">
                        <span class="block-info">
                            <h1 class="title-medium title-medium--clean"><?php the_title(); ?></h1>
                            <p><?php the_field('potfolio_type'); ?></p>
                        </span>
                    </span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>

    </section>

    <section class="layout-section layout-copy">

        <header class="layout-header">
            <h2>Activity feed</h2>
        </header>

        <?php $pageID = get_the_ID(); $loop = new WP_Query( array('post_type' => 'activity', 'posts_per_page' => 5)); ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php get_template_part('loop', 'activity'); ?>
        <?php endwhile; wp_reset_postdata(); ?>

    </section>

<?php get_footer(); ?>