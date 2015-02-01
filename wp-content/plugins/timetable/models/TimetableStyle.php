<?php
/**
 * @file
 * Defines the TimetableStyle class
 */
class TimetableStyle
{
  /**
   * Generates the TIMETABLE dynamic CSS
   */
  public static function getDynamicCss()
  {
    $td_width = self::generateTdWidth();
    $base_class_color = get_option( 'timetable_base_class_color', 'ddffdd' );
    $secondary_class_color = get_option( 'timetable_secondary_class_color', 'ddddff' );
    $hover_class_color = get_option( 'timetable_hover_class_color', 'ffdddd' );
    $border_color = get_option( 'timetable_border_color', 'dddddd' );
    $headings_color = get_option( 'timetable_headings_color', '666666' );
    $heading_background_color = get_option( 'timetable_headings_background_color', 'eeeeee' );
    $text_color = get_option( 'timetable_text_color', '373737' );
    $background_color = get_option( 'timetable_background_color', 'ffffff' );
    $qtip_background_color = get_option( 'timetable_qtip_background', 'ffffff' );
    $links_color = get_option( 'timetable_links_color', '1982D1' );
    
    /* ------------- CSS ------------ */
    $dynamic_css =
    
<<<CSS
<style>
	table.timetable-schedule td {
		width: $td_width%;
	}
	table.timetable-schedule th,
	table.timetable-schedule td {
		border-color: #$border_color;
	}
	table.timetable-schedule th {
		color: #$headings_color;
	//	background-color: #$heading_background_color;
	}
	table.timetable-schedule td {
	  color: #$text_color;
	//	background-color: #$background_color;
	}
	td.timetable-schedule-cell.active,
	.timetable-active-div {
		background: #$base_class_color;
	}
	.timetable-active-div.even {
		background: #$secondary_class_color;
	}
	.timetable-class-details {
		background: #$hover_class_color;
		border-color: #$border_color;
	}
	.qtip-content {
		background: #$qtip_background_color !important;
	}
	.timetable-active-div a {
		color: #$links_color;
	}
</style>
CSS;
    
    /* ------------- END ------------ */
    
    return $dynamic_css;
  }
  
  /**
   * Generates the td width value based on the number of days setting.
   */
  private static function generateTdWidth()
  {
    $number_of_days = get_option( 'timetable_number_of_days', 7 );
    return floor( 90 / $number_of_days );
  }
}