<?php
/**
 * Main TIMETABLE application class
 */

abstract class TimetableApp
{
  /**
   * Initialize application
   */
  public static function init()
  {
    require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableInit.php';
    
    /* Check version and run update procedures as necessary */
    add_action( 'init', array( 'TimetableInit', 'timetableVersion' ) );
    
    /* Register activation hook */
    register_activation_hook( __FILE__, array( 'TimetableInit', 'timetableActivate' ) );
    
    /* I18n */
    add_action( 'init', array( 'TimetableInit', 'timetableLoadPluginTextdomain' ) );
    
    /* Load classes */
    TimetableInit::loadClasses();
    
    /* Launch admin interface */
    if ( is_admin() )
      TimetableAdmin::init();
    else
      add_action('wp_enqueue_scripts', array( 'TimetableApp', 'enqueue_front_end_scripts' ) );
    
    /* Add shortcode */
    TimetableInit::addShortcode();
    
    /* Call wp_head hook for injecting our custom CSS */
    add_action('wp_head', array( 'TimetableInit', 'timetable_get_dynamic_css' ) );
    
    /* Register widgets */
    add_action( 'widgets_init', create_function( '', 'register_widget( "TimetableTodayClassesWidget" );' ) );
  }
  
  public static function enqueue_front_end_scripts()
  {
    TimetableInit::queueStylesAndScripts();
  }
  
  /**
   * Returns the current URL.
   */
  public static function getBaseUrl()
  {
    $server = esc_url( $_SERVER[SERVER_NAME] );
    $uri = esc_url( $_SERVER[REQUEST_URI] );
    
    $url = $server . $uri; 
    
    return $url;
  }
}