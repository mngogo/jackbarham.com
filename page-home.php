<?php

	/*
	Template Name: Home
	*/

	get_header();

?>

    <section class="hero">
        <h1 class="hero-title">Digitial product <br/>designer &amp; developer</h1>
    </section>

    <section id="featured-work">

        <header class="layout-header">
            <h2><?php the_field('portfolio_feed'); ?></h2>
        </header><!-- sectionHeader -->

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

    </section><!-- featuredWork -->

<?php get_footer(); ?>