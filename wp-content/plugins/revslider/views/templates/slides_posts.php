<div class="wrap settings_wrap">
    <div class="title_line">
        <div id="icon-options-general" class="icon32"></div>
        <div class="view_title"><?php _e("Edit Slides", REVSLIDER_TEXTDOMAIN) ?>
            : <?php echo $slider->getTitle() ?></div>
    </div>
    <div
        class="vert_sap"></div>        <?php _e("The slides are posts that taken from multiple sources.", REVSLIDER_TEXTDOMAIN) ?>
    &nbsp;                <?php if ($showSortBy == true): ?>            <?php _e("Sort by", REVSLIDER_TEXTDOMAIN) ?>: <?php echo $selectSortBy ?> &nbsp;
        <span class="hor_sap"></span>        <?php endif ?>                <?php echo $linkNewPost ?>        <span
        id="slides_top_loader" class="slides_posts_loader"
        style="display:none;"><?php _e("Updating Sorting...", REVSLIDER_TEXTDOMAIN) ?></span>

    <div class="vert_sap"></div>
    <div
        class="sliders_list_container">            <?php require self::getPathTemplate("slides_list_posts"); ?>        </div>
    <div class="vert_sap_medium"></div>
    <div class="list_slides_bottom">            <?php echo $linkNewPost ?>            <a
            class="button-primary revyellow" href='<?php echo self::getViewUrl(RevSliderAdmin::VIEW_SLIDERS); ?>'><i
                class="revicon-cancel"></i><?php _e("Close", REVSLIDER_TEXTDOMAIN) ?></a> <a
            href="<?php echo $linksSliderSettings ?>" class="button-primary revgreen"><i
                class="revicon-cog"></i><?php _e("Slider Settings", REVSLIDER_TEXTDOMAIN) ?></a></div>
</div>
<script
    type="text/javascript">        var g_messageDeleteSlide = "<?php _e("Delete this post?",REVSLIDER_TEXTDOMAIN)?>";
    var g_messageChangeImage = "<?php _e("Select Slide Image",REVSLIDER_TEXTDOMAIN)?>";
    jQuery(document).ready(function () {
        RevSliderAdmin.initSlidesListViewPosts("<?php echo $sliderID?>");
    });            </script>