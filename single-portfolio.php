<?php get_header(); ?>

    <section class="layout-section layout-wide">

        <div class="portfolio cf">

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <div class="portfolio-copy">
                <h1 class="portfolio-title"><?php the_title(); ?></h1>
                <div class="portfolio-description">
                    <?php the_field('portfolio_description'); ?>
                </div>
                <ul class="portfolio-meta">
                    <li><span>Type:</span> <?php the_field('potfolio_type'); ?></li>
                    <li><span>Role:</span> <?php the_field('portfolio_role'); ?></li>
                    <li><span>Published:</span> <?php the_field('portfolio_published'); ?></li>
                </ul>
            </div>

            <div class="portfolio-showcase">
                <ul class="portfolio-images">
                    <?php while(has_sub_field('portfolio_images')): ?>
                        <li><img src="<?php the_sub_field('portfolio_image'); ?>" alt="<?php the_title(); ?>"></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <?php endwhile; endif; ?>

        </div>

    </section>

<?php get_footer(); ?>