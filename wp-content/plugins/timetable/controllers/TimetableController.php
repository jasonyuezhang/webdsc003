<?php
/**
 * @file
 * Defines the base TimetableController class.
 */
class TimetableController
{
  protected $_base_name;
  
  function __construct( $base_name )
  {
    $this->_base_name = $base_name;
  }
  
  /**
   * Renders a view
   * 
   * @param string $view
   * @param array $data
   */
  public function render( $view, $data = array(), $type = 'item' )
  {
    extract( $data );
    $model = 'Timetable' . ucwords( $this->_base_name );
    
    require_once TIMETABLE_PLUGIN_DIR . '/views/' . $view . 'View.php';
    
    if ( isset( $_GET['timetableop'] ) && isset( $_GET['timetableid'] ) ) {
      $op = $_GET['timetableop'];
      $id = ( is_numeric( $_GET['timetableid'] ) ) ? $_GET['timetableid'] : NULL;
      
      if ( $id !== NULL ) {
        if ( $type == 'item' )
          $this->renderItemEditForm( $model, $id );
        elseif ( $type == 'schedule' ) 
          $this->renderScheduleEditForm( $model, $id );
      } 
      else {
        die( __( 'Bad request', 'weekly-class-schedule' ) );
      }
    } 
    else {
      if ( $type == 'item' )
        $this->renderItemForm( $model, $data );
      elseif ( $type == 'schedule' )  
        $this->renderScheduleForm( $model, $data );
    }
  }
  
  /**
   * Renders a form
   * 
   * @param string $model
   * @param array $data
   */
  public function renderItemForm( $model, $data = array() )
  {
    /* Process form */
    if ( isset( $_POST['add_item'] ) ) {
      $op = 'add_item';
    } 
    elseif ( isset( $_POST['delete_items'] ) ){
      $op = 'delete_items';
    } 
    
    if ( isset( $op ) ) {
      TimetableForm::processForm( 'TimetableItem', $model, $op );
      unset( $_POST );
      
      $instance = new $model();
      $data['items'] = $instance->getCols( array( 
        'id',
      	$this->_base_name . '_name', 
      	$this->_base_name . '_description' 
      ) );
      self::renderItemForm( $model, $data );
    }
    
    /* Create view vars */
    $data['edit_url'] = TimetableApp::getBaseUrl()  . '&timetableop=edit';
    
    extract( $data );
    
    echo "<form action='' method='post' id='$model' name='$model'>";
    
    require_once TIMETABLE_PLUGIN_DIR . '/views/TimetableItemForm.php';
    
    wp_nonce_field( $model ); 
    echo '</form>';
  }
  
  /**
   * Renders the TIMETABLE Item edit form
   * 
   * @param string $model
   * @param int $id
   * 	The item id
   */
  public function renderItemEditForm( $model, $id )
  {
    /* Process form */
    if ( isset( $_POST['save_item'] ) ) {
      $op = 'save_item';
    }
    
    if ( isset( $op ) ) {
      TimetableForm::processForm( 'TimetableItem', $model, $op, $id );
      unset( $_POST );
    }
    
    /* Create view vars */
    $instance = new $model();
    $item = $instance->getById( $id );
    $attr_name = $this->_base_name . '_name';
    $attr_desc = $this->_base_name . '_description';
    $item_name = stripslashes( $item->$attr_name );
    $item_description = stripslashes( $item->$attr_desc ); 
    
    echo "<form action='' method='post' id='$model' name='$model'>";
    
    require_once TIMETABLE_PLUGIN_DIR . '/views/TimetableItemEditForm.php';
    
    wp_nonce_field( $model ); 
    echo '</form>';
  }
  
  /**
   * Returns the schedule edit form.
   * 
   * @param string $model
   * @param array $data
   */
  public function renderScheduleForm( $model, $data = array() )
  {
    /* Process form */
    if ( isset( $_POST['add_item'] ) ) {
      $op = 'add_item';
    }
    elseif ( isset( $_POST['delete_items'] ) ){
      $op = 'delete_items';
    }
    
    if ( isset( $op ) ) {
      TimetableForm::processForm( 'TimetableSchedule', $model, $op );
      $data['post'] = $_POST;
      unset( $_POST );
    
      self::renderScheduleForm( $model, $data );
    }
    
    /* Create view vars */
    $data['edit_url'] = TimetableApp::getBaseUrl()  . '&timetableop=edit';
    $data['classes'] = TimetableClass::model()->getCols( array( 'id', 'class_name' ), TRUE );
    $data['instructors'] = TimetableInstructor::model()->getCols( array( 'id', 'instructor_name' ), TRUE );
    $data['classrooms'] = TimetableClassroom::model()->getCols( array( 'id', 'classroom_name' ), TRUE );
    $data['weekdays_array'] = TimetableSchedule::model()->getWeekDaysArray( TRUE );
    $data['weekdays'] = ( is_array( TimetableSchedule::model()->getDbSortedWeekdays() ) ? TimetableSchedule::model()->getDbSortedWeekdays() : array() );
    $data['visibility'] = TimetableSchedule::model()->getVisibilityOptions();
    
    $data['items'] = TimetableSchedule::model()->getAllRecords( array( 'start_hour', 'ASC' ) );
  
    extract( $data );
  
    /* Generate form */
    echo "<form action='' method='post' id='$model' name='$model'>";
  
    require_once TIMETABLE_PLUGIN_DIR . '/views/TimetableScheduleForm.php';
      
    wp_nonce_field( $model );
    echo '</form>';
  }
  
  /**
   * Renders the TIMETABLE Schedule entry edit form
   *
   * @param string $model
   * @param int $id
   * 	The item id
   */
  public function renderScheduleEditForm( $model, $id )
  {
    /* Process form */
    if ( isset( $_POST['save_item'] ) ) {
      $op = 'save_item';
    }
    
    if ( isset( $op ) ) {
      TimetableForm::processForm( 'TimetableSchedule', $model, $op, $id );
      unset( $_POST );
    }
    
    /* Create view vars */
    $data['classes'] = TimetableClass::model()->getCols( array( 'id', 'class_name' ), TRUE );
    $data['instructors'] = TimetableInstructor::model()->getCols( array( 'id', 'instructor_name' ), TRUE );
    $data['classrooms'] = TimetableClassroom::model()->getCols( array( 'id', 'classroom_name' ), TRUE );
    $data['weekdays_array'] = TimetableSchedule::model()->getWeekDaysArray( TRUE );
    $data['weekdays'] = array_unique( TimetableSchedule::model()->getCol( 'weekday' ) );
    $data['visibility'] = TimetableSchedule::model()->getVisibilityOptions();
    
    $instance = new $model();
    $data['entry'] = $instance->getById( $id );
    
    extract( $data );
    
    echo "<form action='' method='post' id='$model' name='$model'>";
        
    require_once TIMETABLE_PLUGIN_DIR . '/views/TimetableScheduleEditForm.php';
        
    wp_nonce_field( $model );
    echo '</form>';
  }
}