<?php
/*
Plugin Name: Timetable
Plugin URI: http://jaredsdias.com/timetable
Description: Timetable generates a weekly schedule of classes. It provides you with an easy way to manage and update the schedule as well as the classes and instructors database.
Version: 1.0
Author: Jared S Dias
Author URI: http://jaredsdias.com
License: GPL2

Copyright 2013  Jared S Dias  (email : contact@jaredsdias.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

/* This version does not use late static binding and can work on PHP 5.2 and higher */

/*
 * Define constants
 */
define('TIMETABLE_VERSION', '1.0.0');

if ( ! defined( 'TIMETABLE_PLUGIN_BASENAME' ) )
	define( 'TIMETABLE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

if ( ! defined( 'TIMETABLE_PLUGIN_NAME' ) )
	define( 'TIMETABLE_PLUGIN_NAME', trim( dirname( TIMETABLE_PLUGIN_BASENAME ), '/' ) );

if ( ! defined( 'TIMETABLE_PLUGIN_DIR' ) )
	define( 'TIMETABLE_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . TIMETABLE_PLUGIN_NAME );

if ( ! defined( 'TIMETABLE_PLUGIN_URL' ) )
	define( 'TIMETABLE_PLUGIN_URL', WP_PLUGIN_URL . '/' . TIMETABLE_PLUGIN_NAME );

require_once TIMETABLE_PLUGIN_DIR . '/includes/TimetableApp.php';

TimetableApp::init();