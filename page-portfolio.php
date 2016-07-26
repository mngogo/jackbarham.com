<?php
    /* Template Name: Portfolio */
    get_header();
?>

    <section class="layout-section layout-wide">

        <ul class="grid-3 cf">
            <?php $pageID = get_the_ID(); $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => -1 ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php get_template_part('loop','portfolio'); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>

    </section>

<?php get_footer(); ?>