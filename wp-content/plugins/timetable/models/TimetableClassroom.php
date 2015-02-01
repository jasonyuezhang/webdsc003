<?php

/**
 * @file
 * Defines the TimetableClassroom class.
 */
class TimetableClassroom extends TimetableActiveRecord
{
  public $_tableName;
  
  public function __construct()
  {
    $this->_tableName = $this->tableName();
  }
  
  /**
   * Returns an instance of the class.
   */
  public static function model()
  {
    return new TimetableClassroom();
  }
  
  private function tableName()
	{
		global $wpdb;
		return $wpdb->prefix . 'timetable2_classroom';
	}
}