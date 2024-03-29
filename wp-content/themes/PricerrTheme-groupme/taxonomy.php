<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

global $query_string;
$my_order = PricerrTheme_get_current_order_by_thing();
$start_date_filter = PricerrTheme_get_start_date_filter();

if ($my_order == "instant") {
    $instant = array(
        'key' => 'instant',
        'value' => "0",
        'compare' => '=');
}

if ($my_order == "express") {
    $express = array(
        'key' => 'max_days',
        'value' => "1",
        'compare' => '=');

}

//******************************************************

if (!empty($start_date_filter)) {
    $start_date_array = array(
        'key' => 'start_date',
        'value' => $start_date_filter,
        //'type' => 'numeric',
        'compare' => '='
    );
}

$closed = array(
    'key' => 'closed',
    'value' => "0",
    //'type' => 'numeric',
    'compare' => '='
);

$prs_string_qu = wp_parse_args($query_string);
$prs_string_qu['meta_query'] = array($start_date_array, $closed, $instant, $express);
$prs_string_qu['posts_per_page'] = 20;

if ($my_order != "new") {

    $prs_string_qu['meta_key'] = "featured";
    $prs_string_qu['orderby'] = "meta_value_num";
    $prs_string_qu['order'] = "DESC";

}

if ($my_order == "views") {

    $prs_string_qu['meta_key'] = "views";
    $prs_string_qu['orderby'] = "meta_value_num";
    $prs_string_qu['order'] = "DESC";

}

if ($my_order == "popularity") {

    $prs_string_qu['meta_key'] = "likes";
    $prs_string_qu['orderby'] = "meta_value_num";
    $prs_string_qu['order'] = "DESC";

}

//

query_posts($prs_string_qu);

$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$term_title = $term->name;

//======================================================

get_header();

$PricerrTheme_adv_code_cat_page_above_content = stripslashes(get_option('PricerrTheme_adv_code_cat_page_above_content'));
if (!empty($PricerrTheme_adv_code_cat_page_above_content)):

    echo '<div class="full_width_a_div">';
    echo $PricerrTheme_adv_code_cat_page_above_content;
    echo '</div>';

endif;

//====================================================

?>

    <!--<div class="my_new_box_title"><?php
        //if (empty($term_title)) echo __("All Posted Groups", 'PricerrTheme');
        //else echo sprintf(__("Latest Posted Groups in %s", 'PricerrTheme'), $term_title);
        ?>
    </div>-->

<?php

if (function_exists('bcn_display')) {
    echo '<div class="my_box3_breadcrumb"><div class="padd10_a">';
    bcn_display();
    echo '</div></div>';
}

$term_id = $term->term_id;
$taxonomy_name = get_query_var('taxonomy');
$termchildren = get_term_children($term_id, $taxonomy_name);

if (count($termchildren) > 0): ?>
    <div class="sub_categories_maps">
        <div class="padd20">
            <?php

            foreach ($termchildren as $ch) {
                $trm = get_term_by('id', $ch, $taxonomy_name);

                echo '<div class="stuffb">';
                echo '<a href="' . get_term_link($ch, $taxonomy_name) . '">' . $trm->name . '</a>';
                echo '</div>';

            }
            ?>
        </div>
    </div>
<?php endif; ?>
    <div class="filter_jobs">
        <div class="padd5">
            <div class="col-sm-6 clear pleft0">
                <div class="filter_div"><?php _e("Sort by:", 'PricerrTheme'); ?></div>
                <ul id="filter_jobs_list">
                    <li>
                        <a href="<?php echo PricerrTheme_filter_switch_link_from_home_page('auto'); ?>" <?php echo($my_order == "auto" ? 'class="active_link"' : ""); ?>><?php _e("Auto", "PricerrTheme"); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo PricerrTheme_filter_switch_link_from_home_page('new'); ?>" <?php echo($my_order == "new" ? 'class="active_link"' : ""); ?>><?php _e("New", "PricerrTheme"); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo PricerrTheme_filter_switch_link_from_home_page('rating'); ?>" <?php echo($my_order == "rating" ? 'class="active_link"' : ""); ?>><?php _e("Rating", "PricerrTheme"); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo PricerrTheme_filter_switch_link_from_home_page('views'); ?>" <?php echo($my_order == "views" ? 'class="active_link"' : ""); ?>><?php _e("Views", "PricerrTheme"); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo PricerrTheme_filter_switch_link_from_home_page('express'); ?>"<?php echo($my_order == "express" ? 'class="active_link"' : ""); ?>><?php _e("Recent Lessons", "PricerrTheme"); ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 clear pleft0">
                <div class="filter_div"><?php _e("Start Date:", 'PricerrTheme'); ?></div>
                <div id="date_filter_jobs_list">
                    <div class="date-filter-container">
                        <input id="date-filter" type="button" value="<?php echo $start_date_filter; ?>">
                        <a id="filter-clear" href="<?php echo PricerrTheme_filter_change_start_date(""); ?>">&times;</a>
                        <a id="date-filter-search" href="<?php echo PricerrTheme_filter_change_start_date($start_date_filter); ?>">Search</a>
                    </div>
                </div>
            </div>
            <?php
            $view = PricerrTheme_get_current_view_grid_list();
            echo '<div class="switchers col-sm-2 clear pright0">';
            echo '<div class="switch-view-link-container">';
                if ($view != "grid") {
                    echo '<a href="' . PricerrTheme_switch_link_from_home_page('grid') . '" class="grid-jobs"></a>';
                    echo '<a href="' . PricerrTheme_switch_link_from_home_page('list') . '" class="list-jobs-selected"></a>';
                } else {
                    echo '<a href="' . PricerrTheme_switch_link_from_home_page('grid') . '" class="grid-jobs-selected"></a>';
                    echo '<a href="' . PricerrTheme_switch_link_from_home_page('list') . '" class="list-jobs"></a>';
                }
            echo '</div>';
            echo '<div class="filter_div switch-view-link">' . __('Switch View:', 'PricerrTheme') . '</div>';
            echo '</div>'; ?>
        </div>
    </div>
    <div id="content">
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <?php

            if ($view != "grid")
                PricerrTheme_get_post();
            else
                PricerrTheme_get_post_thumbs();
            ?>
        <?php
        endwhile;

            if (function_exists('wp_pagenavi')):
                wp_pagenavi(); endif;

        else:

            echo __('<h4 style="margin-top: 12px;">No group posted.</h4>', "PricerrTheme");

        endif;
        // Reset Post Data
        wp_reset_postdata();

        ?>
    </div>
<?php

//$opt = get_option('PricerrTheme_taxonomy_page_with_sdbr');
//if ($opt != "no"):

    ?>

    <!--<div id="right-sidebar">
        <ul class="xoxo">
            <?php //dynamic_sidebar('other-page-area'); ?>
        </ul>
    </div>-->


<?php
//endif;

get_footer();

?>