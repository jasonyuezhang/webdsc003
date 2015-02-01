<?php
/**
 * Defines the TimetableOutputController class.
 */

class TimetableOutputController
{
  public static function timetableShortcodeCallback( $attr )
  {
    $output = '';
    $classroom = $attr['classroom'];
    $weekday_names = array();
    
    $use_short_day_names = ( get_option( 'timetable_short_day_names', 'yes' ) == 'yes' ) ? TRUE : FALSE;
    $weekdays = TimetableSchedule::model()->getWeekDaysArray();
    
    if ( ! $use_short_day_names )
      $weekday_names = $weekdays;
    else {
      $weekday_names = TimetableSchedule::model()->getWeekDaysArray( FALSE, TRUE );
    }
    
    /* Load multiple schedules each for a single classrooms */
    if ( isset( $classroom ) && ! empty( $classroom ) ) {
      $classes = TimetableSchedule::model()->getClassesMultiDimArray( $classroom );
      $start_hours = TimetableSchedule::model()->getStartHours( $classroom );
    }
    else {
      /* Load all classrooms in one schedule */
      $classes = TimetableSchedule::model()->getClassesMultiDimArray();
      $start_hours = TimetableSchedule::model()->getStartHours();
    }

    if ( ! $classes || ! $start_hours ) {
      $output = 'No Classes';
      return $output;
    }
    
    
    if ( isset( $attr['layout'] ) ) {
      if ( $attr['layout'] == 'vertical' ) {
        $view = TIMETABLE_PLUGIN_DIR . '/views/TimetableOutputView.php';
      }
      elseif ( $attr['layout'] == 'horizontal' ) {
        $view = TIMETABLE_PLUGIN_DIR . '/views/TimetableOutputHorizontalView.php';
      }
      elseif ( $attr['layout'] == 'list' ) {
        $view = TIMETABLE_PLUGIN_DIR . '/views/TimetableOutputListView.php';
      }
    }
    else {
      $view = TIMETABLE_PLUGIN_DIR . '/views/TimetableOutputView.php';
    }

    
    ob_start();
    include $view;
    
    $output .= ob_get_contents();
    ob_end_clean();
    
    return $output;
  }
}