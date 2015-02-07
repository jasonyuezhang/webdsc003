<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

get_header();

$PricerrTheme_adv_code_single_page_above_content = stripslashes(get_option('PricerrTheme_adv_code_single_page_above_content'));
if (!empty($PricerrTheme_adv_code_single_page_above_content)):

    echo '<div class="full_width_a_div">';
    echo $PricerrTheme_adv_code_single_page_above_content;
    echo '</div>';

endif;

if (function_exists('bcn_display')) {
    echo '<div class="my_box3_breadcrumb"><div class="padd10_a">';
    bcn_display();
    echo '</div></div>';
}

if (have_posts()): while (have_posts()) : the_post(); ?>
    <div id="content">
        <div class="box_title"><?php the_title(); ?></div>

        <?php the_content(); ?>
        <?php comments_template('', true); ?>

    </div>

<?php endwhile; ?>
<?php endif; ?>

    <!-- ################### -->

    <div id="right-sidebar">
        <!-- single.php -->
        <ul class="xoxo">
            <?php dynamic_sidebar('single-widget-area'); ?>
        </ul>
    </div>


<?php

get_footer();

?>