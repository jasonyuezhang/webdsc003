<?php
if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN'))
    exit();

$currentFile = __FILE__;
$currentFolder = dirname($currentFile);
require_once $currentFolder . '/inc_php/revslider_globals.class.php';

global $wpdb;
$tableSliders = $wpdb->prefix . GlobalsRevSlider::TABLE_SLIDERS_NAME;
$tableSlides = $wpdb->prefix . GlobalsRevSlider::TABLE_SLIDES_NAME;
$tableSettings = $wpdb->prefix . GlobalsRevSlider::TABLE_SETTINGS_NAME;
$tableCss = $wpdb->prefix . GlobalsRevSlider::TABLE_CSS_NAME;
$tableAnims = $wpdb->prefix . GlobalsRevSlider::TABLE_LAYER_ANIMS_NAME;

$wpdb->query("DROP TABLE $tableSliders");
$wpdb->query("DROP TABLE $tableSlides");
$wpdb->query("DROP TABLE $tableSettings");
$wpdb->query("DROP TABLE $tableCss");
$wpdb->query("DROP TABLE $tableAnims");


?>