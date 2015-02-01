<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

global $NHP_Options;
$options_theme = $NHP_Options->options;
$boxed_or_stretched = $options_theme['boxed_or_stretched'];
$layout = $boxed_or_stretched;
if (isset($_GET["layout"])) {
    if ($_GET["layout"] == "stretched") $layout = "stretched";
    if ($_GET["layout"] == "boxed") $layout = "boxed";
}

if ($layout == "stretched") {
    $page_template = get_page_template();
    $path = pathinfo($page_template);
    $page_template = $path['filename'];

    ?>
    <p id="back-top">
        <a href="#top"><span></span></a>
    </p>
    </div><!-- END .content-wrapper -->
<?php
}

global $wp;

if (is_home()):
    $PricerrTheme_adv_code_home_below_content = stripslashes(get_option('PricerrTheme_adv_code_home_below_content'));
    if (!empty($PricerrTheme_adv_code_home_below_content)):

        echo '<div class="full_width_a_div">';
        echo $PricerrTheme_adv_code_home_below_content;
        echo '</div>';

    endif;
endif;

//-----------------------------------

if ($wp->query_vars["post_type"] == "job"):
    $PricerrTheme_adv_code_job_page_below_content = stripslashes(get_option('PricerrTheme_adv_code_job_page_below_content'));
    if (!empty($PricerrTheme_adv_code_job_page_below_content)):

        echo '<div class="full_width_a_div">';
        echo $PricerrTheme_adv_code_job_page_below_content;
        echo '</div>';

    endif;
endif;

//-------------------------------------

if ((is_single() or is_page()) and $wp->query_vars["post_type"] == "post"):
    $PricerrTheme_adv_code_single_page_below_content = stripslashes(get_option('PricerrTheme_adv_code_single_page_below_content'));
    if (!empty($PricerrTheme_adv_code_single_page_below_content)):

        echo '<div class="full_width_a_div">';
        echo $PricerrTheme_adv_code_single_page_below_content;
        echo '</div>';

    endif;
endif;

//-------------------------------------

if (is_tax()):
    $PricerrTheme_adv_code_cat_page_below_content = stripslashes(get_option('PricerrTheme_adv_code_cat_page_below_content'));
    if (!empty($PricerrTheme_adv_code_cat_page_below_content)):

        echo '<div class="full_width_a_div">';
        echo $PricerrTheme_adv_code_cat_page_below_content;
        echo '</div>';

    endif;
endif;

//-----------------------------------

?>
</div> <!--END .wrapper -->

<?php
$PricerrTheme_enable_second_footer = get_option('PricerrTheme_enable_second_footer');
if ($PricerrTheme_enable_second_footer == "yes"):
    ?>

    <div id="stretch_footer_area">
        <div id="stretch_footer_area_inner">

            <?php

            echo '<div class="divider"></div>';
            //echo '<div class="padd10"><ul class="xoxo">';
            //dynamic_sidebar('footer-stretch-area');
            //echo '</ul></div>';

            ?>

        </div>
    </div>

<?php endif; ?>

<div id="footer"><!-- START FOOTER -->

<?php
$all_sidebars = wp_get_sidebars_widgets();
if (count($all_sidebars["Footer_01"]) > 0 || count($all_sidebars["Footer_02"]) > 0 || count($all_sidebars["Footer_03"]) > 0) { ?>
    <div id="footer-top" class="clear">
        <div class="control-size clear">
            <div class="one-third">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_01") ) : endif; ?>
            </div>
            <div class="one-third">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_02") ) : endif; ?>
            </div>
            <div class="one-third last">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_03") ) : endif;  ?>
            </div>
        </div>
    </div>
<?php } ?>

    <div id="footer-bottom" class="clear">
        <div class="control-size clear">
            <div class="one">
                <div class="one-half">
                    <?php echo $options_theme['footer_text']; ?>
                </div>

                <div class="one-half last">
                    <?php
                    wp_nav_menu( array( 'theme_location' => 'footer_menu' ,
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'menu-footer',
                        'fallback_cb' => 'footer_fallback'
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </div><!--END FOOTER-BOTTOM-->
</div><!-- END FOOTER -->
<?php

$PricerrTheme_enable_google_analytics = get_option('PricerrTheme_enable_google_analytics');
if ($PricerrTheme_enable_google_analytics == "yes"):
    echo stripslashes(get_option('PricerrTheme_analytics_code'));
endif;

//----------------

$PricerrTheme_enable_other_tracking = get_option('PricerrTheme_enable_other_tracking');
if ($PricerrTheme_enable_other_tracking == "yes"):
    echo stripslashes(get_option('PricerrTheme_other_tracking_code'));
endif;


?>
<?php wp_footer(); ?>
</div><!--END. all-wrapper-->
</body>
</html>