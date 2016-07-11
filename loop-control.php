<div class="<?php the_field('potfolio_mobile_only'); ?>">

    <?php if (get_field('portfolio_link_url')): ?>
        <a href="<?php the_field('portfolio_link_url'); ?>" target="_blank" class="button">
            <span><?php the_field('portfolio_link_text'); ?></span>
            <i class="fa fa-angle-right"></i>
        </a>
    <?php endif; ?>

    <?php if (get_field('portfolio_no_link_text')): ?>
        <span class="portfolio-nolink"><?php the_field('portfolio_no_link_text'); ?></span>
    <?php endif; ?>

</div>