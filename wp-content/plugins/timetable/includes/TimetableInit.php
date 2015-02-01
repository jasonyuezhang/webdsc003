<?php
/**
 * @file
 * Defines the initializer class for TIMETABLE
 */

class TimetableInit
{
  /**
  * Handles the version checking and update procedures.
  */
  public static function timetableVersion()
  {
    global $wpdb;
    $version = get_option( 'timetable_version' );
    
    $sql = "SHOW TABLES IN `" . $wpdb->dbname . "` LIKE '" . $wpdb->prefix . "timetable2%'";
    $tables = $wpdb->query( $sql );
  
    if ( $tables == 0 ) {
      // Pre 2.0
      TimetableDb::createTimetable2Tables();
      
      $sql = "SHOW TABLES IN `" . $wpdb->dbname . "` LIKE '" . $wpdb->prefix . "timetable\_%'";
      $tables = $wpdb->query( $sql );
      
      if ( $tables == 0 ) {
        // Fresh installation 
      }
      else {
        // 1.x installation
        TimetableDb::migrateOldData();
        
        // TODO: Remove v1.x tables when upgrading from 2.0 to 2.x
        // TimetableDb::dropOldTimetableTables();
      }
      
      // Update version
      update_option( 'timetable_version', TIMETABLE_VERSION);
    } 
    
    if ( $version < TIMETABLE_VERSION) {
      // Older post 2.0 version - Run update procedures if necessary 
      
      /* 
       * [UPDATE PROCEDURES] 
       */
      
      update_option( 'timetable_version', TIMETABLE_VERSION);
    }
  }
  
  /* Runs timetable_version() when TIMETABLE is activated */
  public static function wcActivate()
  {
    self::timetable_version();
  }
  
  /* wp_head callback for injecting dynamic css to header */
  public static function timetable_get_dynamic_css()
  {
    if ( ! is_admin() )
      echo TimetableStyle::getDynamicCss();
  }
  
  public static function timetableLoadPluginTextdomain()
  {
    load_plugin_textdomain( 'weekly-class-schedule', false, 'weekly-class-schedule/languages' );
  }
  
  public static function loadClasses()
  {
    /* Load Application Classes */
    require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableDb.php';
    require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableAdmin.php';
    require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableOptions.php';
    require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableHtml.php';
    require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableTime.php';
    require_once TIMETABLE_PLUGIN_DIR . '/includes/ITimetableForm.php';
    
    /* Load Base Classes */
    require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableActiveRecord.php';
    require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableForm.php';
  
    /* Load Models */
    require_once TIMETABLE_PLUGIN_DIR . '/models/TimetableSchedule.php';
    require_once TIMETABLE_PLUGIN_DIR . '/models/TimetableClass.php';
    require_once TIMETABLE_PLUGIN_DIR . '/models/TimetableInstructor.php';
    require_once TIMETABLE_PLUGIN_DIR . '/models/TimetableClassroom.php';
    require_once TIMETABLE_PLUGIN_DIR . '/models/TimetableStyle.php';
    require_once TIMETABLE_PLUGIN_DIR . '/models/TimetableTodayClassesWidget.php';
    require_once TIMETABLE_PLUGIN_DIR . '/models/TimetableIOS.php';
    
    /* Load controllers */
    require_once TIMETABLE_PLUGIN_DIR . '/controllers/TimetableController.php';
    require_once TIMETABLE_PLUGIN_DIR . '/controllers/TimetableOutputController.php';
  }
  
  public static function addShortcode()
  {
    add_shortcode( 'timetable', array( 'TimetableOutputController', 'timetableShortcodeCallback' ) );
  }
  
  /**
  * Load TIMETABLE's non-admin styles and scripts.
  */
  public static function queueStylesAndScripts()
  {
    /* Load styles */
    wp_register_style( 'timetable_stylesheet', TIMETABLE_PLUGIN_URL . '/css/timetable.css' );
    wp_enqueue_style( 'timetable_stylesheet' );
  
    /* Register jQuery */
    wp_enqueue_script( 'jquery' );
  
    /* Load TIMETABLE script */
    wp_register_script( 'timetable', TIMETABLE_PLUGIN_URL . '/js/timetable.js', array('jquery') );
    wp_enqueue_script( 'timetable' );
  
    /* Load hover intent */
    wp_register_script( 'timetable_hoverintent', TIMETABLE_PLUGIN_URL . '/plugins/hoverintent/jquery.hoverIntent.minified.js', array('jquery') );
    wp_enqueue_script( 'timetable_hoverintent' );
    
    /* Load qTip */
    wp_register_script( 'timetable_qtip', TIMETABLE_PLUGIN_URL . '/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js', array('jquery') );
    wp_enqueue_script( 'timetable_qtip' );
  }
}