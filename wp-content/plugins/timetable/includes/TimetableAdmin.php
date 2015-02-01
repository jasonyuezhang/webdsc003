<?php
/**
 * @file
 * Defines the TIMETABLE Admin class
 */

abstract class TimetableAdmin
{
  public static function init()
  {
    /* Register admin menu action */
    add_action( 'admin_menu', array( 'TimetableAdmin', 'timetable_admin_callback' ) );
    add_action( 'admin_menu', array( 'TimetableOptions', 'timetable_options' ) );
    
    /* Load colorpicker */
    wp_register_style( 'timetable_colorpicker_stylesheet', TIMETABLE_PLUGIN_URL . '/plugins/colorpicker/css/colorpicker.css' );
    wp_enqueue_style( 'timetable_colorpicker_stylesheet' );
    wp_register_script( 'timetable_colorpicker', TIMETABLE_PLUGIN_URL . '/plugins/colorpicker/js/colorpicker.js' );
    wp_enqueue_script( 'timetable_colorpicker' );
    
    /* Load admin CSS and scripts */
    wp_register_style( 'timetable_admin_stylesheet', TIMETABLE_PLUGIN_URL . '/css/timetable_admin.css' );
    wp_enqueue_style( 'timetable_admin_stylesheet' );
    wp_register_script( 'timetable_admin_script', TIMETABLE_PLUGIN_URL . '/js/timetable_admin.js' );
    wp_enqueue_script( 'timetable_admin_script' );
  }
  
  /* Create menu items */
  public static function timetable_admin_callback() {
    $wc_schedule = __( 'Timetable', 'weekly-class-schedule' );
    $classes = __( 'Classes', 'weekly-class-schedule' );
    $instructors = __( 'Instructors', 'weekly-class-schedule' );
    $classrooms = __( 'Classrooms', 'weekly-class-schedule' );
    $options = __( 'Options', 'weekly-class-schedule' );
    
    add_menu_page( $wc_schedule, $wc_schedule, 'manage_options', 'timetable-schedule', array( 'TimetableAdmin', 'timetable_schedule_admin_page' ), TIMETABLE_PLUGIN_URL . '/images/favicon.ico' );
    add_submenu_page( 'timetable-schedule', $classes, $classes, 'manage_options', 'timetable-classes', array( 'TimetableAdmin', 'timetable_classes_admin_page' ) );
    add_submenu_page( 'timetable-schedule', $instructors, $instructors, 'manage_options', 'timetable-instructors', array( 'TimetableAdmin', 'timetable_instructors_admin_page' ) );
    add_submenu_page( 'timetable-schedule', $classrooms, $classrooms, 'manage_options', 'timetable-classrooms', array( 'TimetableAdmin', 'timetable_classrooms_admin_page' ) );
    add_submenu_page( 'timetable-schedule', $options, $options, 'manage_options', 'timetable-options', array( 'TimetableAdmin', 'timetable_admin_options_page' ) );
  }
  
  /* Schedule admin page */
  public static function timetable_schedule_admin_page() {
    $class_controller = new TimetableController( 'schedule' );
    $data['items'] = TimetableSchedule::model()->getCols( array( 'id' ) );
    $class_controller->render( 'ScheduleAdmin', $data, 'schedule' );
  }
  
  /* Class admin page */
  public static function timetable_classes_admin_page() {
    $class_controller = new TimetableController( 'class' );
    $data['items'] = TimetableClass::model()->getCols( array( 'id', 'class_name', 'class_description' ) );
    $class_controller->render( 'ClassAdmin', $data );
  }
  
  /* Instructor admin page */
  public static function timetable_instructors_admin_page() {
    $instructor_controller = new TimetableController( 'instructor' );
    $data['items'] = TimetableInstructor::model()->getCols( array( 'id', 'instructor_name', 'instructor_description' ) );
    $instructor_controller->render( 'InstructorAdmin', $data );
  }
  
  /* Classroom admin page */
  public static function timetable_classrooms_admin_page() {
    $classroom_controller = new TimetableController( 'classroom' );
    $data['items'] = TimetableClassroom::model()->getCols( array( 'id', 'classroom_name', 'classroom_description' ) );
    $classroom_controller->render( 'ClassroomAdmin', $data );
  }
  
  /* Options page */
  public static function timetable_admin_options_page() {
    TimetableOptions::renderOptionsPage();
  }
}