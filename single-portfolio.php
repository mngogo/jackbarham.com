<?php get_header(); ?>

    <section class="layout-section layout-wide">

        <div class="portfolio cf">

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <div class="portfolio-copy">

                <h1 class="feed-title"><?php the_title(); ?></h1>

                <div class="portfolio-description">
                    <?php the_field('portfolio_description'); ?>
                </div><!-- prortfolioInfo -->

                <ul class="portfolio-meta">
                    <li><span>Type:</span> <?php the_field('potfolio_type'); ?></li>
                    <li><span>Role:</span> <?php the_field('portfolio_role'); ?></li>
                    <li><span>Published:</span> <?php the_field('portfolio_published'); ?></li>
                </ul>

                <?php get_template_part('loop', 'control'); ?>

            </div><!-- portfolio-description -->

            <div class="portfolio-showcase">

                <ul class="portfolio-images">
                    <?php while(has_sub_field('portfolio_images')): ?>
                        <li><img src="<?php the_sub_field('portfolio_image'); ?>" alt="<?php the_title(); ?>"></li>
                    <?php endwhile; ?>
                </ul>

                <?php get_template_part('loop', 'control'); ?>

            </div>

            <?php endwhile; endif; ?>

        </div><!-- portfolio -->

    </section><!-- contentWrap -->

<?php get_footer(); ?>