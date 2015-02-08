<?php

get_header();

if (function_exists('bcn_display')) {
    echo '<div class="my_box3_breadcrumb"><div class="padd10">';
    bcn_display();
    echo '</div></div><div class="clear10"></div>';
} ?>

    <div class="clear10"></div>

    <div id="content">

        <div class="box-title">

            <?php if (is_day()) : ?>
                <?php printf(__('Daily Blog Archives: %s', 'PricerrTheme'), '<span>' . get_the_date() . '</span>'); ?>
            <?php elseif (is_month()) : ?>
                <?php printf(__('Monthly Blog Archives: %s', 'PricerrTheme'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'PricerrTheme')) . '</span>'); ?>
            <?php
            elseif (is_year()) : ?>
                <?php printf(__('Yearly Blog Archives: %s', 'PricerrTheme'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'PricerrTheme')) . '</span>'); ?>
            <?php
            else : ?>
                <?php _e('Blog Archives', 'PricerrTheme'); ?>
            <?php endif; ?>

        </div>
        <div class="box-content clear post-content">
            <?php if (have_posts()) while (have_posts()) : the_post(); ?>

                <?php PricerrTheme_get_post_blog(); ?>

            <?php endwhile; // end of the loop. ?>

        </div>
    </div>

    <div id="right-sidebar">
        <!-- archive.php -->
        <ul class="xoxo">
            <?php dynamic_sidebar('other-page-area'); ?>
        </ul>
    </div>

<?php get_footer(); ?>