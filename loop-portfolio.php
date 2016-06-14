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