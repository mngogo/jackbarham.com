<?php
    /* Template Name: Activity */
    get_header();
?>

    <section class="layout-section layout-copy">

        <?php $pageID = get_the_ID(); $loop = new WP_Query( array( 'post_type' => 'activity', 'posts_per_page' => -1 ) ); ?>
        <?php while ($loop->have_posts() ) : $loop->the_post(); ?>
            <?php get_template_part('loop', 'activity'); ?>
        <?php endwhile; wp_reset_postdata(); ?>

    </section><!-- contentWrap -->

<?php get_footer(); ?>