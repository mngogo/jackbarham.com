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