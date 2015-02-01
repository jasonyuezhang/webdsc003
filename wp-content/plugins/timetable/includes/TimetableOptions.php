<?php
/**
 * @file
 * Defines the TimetableOptions class.
 */

abstract class TimetableOptions
{
  /**
   * Display validation errors and confirmations in the options page.
   */
  public static function renderOptionsPage()
  {
    if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) {
      $settings = get_settings_errors();
      if ( ! empty( $settings) ) {
        foreach ( $settings as $value ) {
          TimetableHtml::show_wp_message( $value['message'], $value['type'] );
        }
      }
    }

    require_once TIMETABLE_PLUGIN_DIR . '/views/OptionsView.php';
  }

  /**
   * Validate a valid hex value
   *
   * @param string $value
   */
  public static function validateHexValue( $value ) {
    if ( preg_match( "/^[0-9a-fA-F]{6}$/", $value ) == 0 ) {
      add_settings_error( $key, 'timetable_base_color', __( 'Invalid color. Please use a valid hex value.', 'weekly-class-schedule' ), 'error' );
    }
    else {
      return $value;
    }
  }

  public static function timetable_options()
  {
    /* Add help/instructions section */
    add_settings_section(
      'timetable_instructions',
      __( 'Using the Timetable', 'weekly-class-schedule' ),
      array('TimetableOptions', 'instructions_section'),
      'timetable-options'
    );
    
    /* Add General Settings */
    add_settings_section(
      'timetable_general_settings',
      __( 'General Settings', 'weekly-class-schedule' ),
      array('TimetableOptions', 'general_settings_section'),
      'timetable-options'
    );

    $title = __( 'First day of week', 'weekly-class-schedule' );
    $desc = __( 'The day the schedule will start in', 'weekly-class-schedule' );

    add_settings_field(
    	'timetable_first_day_of_week',
    	"$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'first_day_of_week_field' ),
    	'timetable-options',
    	'timetable_general_settings'
    );

    $title = __( 'Number of days to display', 'weekly-class-schedule' );
    $desc = __( 'The number of days to display including the first day of the week.', 'weekly-class-schedule' );

    add_settings_field(
    	'timetable_number_of_days',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'number_of_days_field' ),
    	'timetable-options',
    	'timetable_general_settings'
    );

    $title = __( 'Enable 24-hour mode', 'weekly-class-schedule' );
    $desc = __( 'Enabling this will display all the hours in a 24-hour clock mode as opposed to 12-hour clock mode (AM/PM).', 'weekly-class-schedule' );

    add_settings_field(
    	'timetable_24_hour_mode',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'timetable_24_hour_mode_field' ),
      'timetable-options',
      'timetable_general_settings'
    );

    $title = __( 'Time Increments', 'weekly-class-schedule' );
    $desc = __( 'Only affects the schedule entry form, not the final output.', 'weekly-class-schedule' );

    add_settings_field(
      'timetable_time_increments',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'time_increments_field' ),
      'timetable-options',
      'timetable_general_settings'
    );

    $title = __( 'Detect classroom collisions', 'weekly-class-schedule' );
    $desc = __( 'Enabling this feature will prevent scheduling of multiple classes at the same classroom at the same time.', 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_detect_classroom_collisions',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'detect_classroom_collisions_field' ),
      'timetable-options',
      'timetable_general_settings'
    );
    
    $title = __( 'Detect instructor collisions', 'weekly-class-schedule' );
    $desc = __( 'Enabling this feature will prevent the scheduling of an instructor for multiple classes at the same.', 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_detect_instructor_collisions',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'detect_instructor_collisions_field' ),
      'timetable-options',
      'timetable_general_settings'
    );

    $title = __( 'Enable Timezones', 'weekly-class-schedule' );
    $desc = __( 'Enabling this will add a timezone field to the schedule entry form. The final time output will be calculated based upon the site/server settings.', 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_use_timezones',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'use_timezones_field' ),
      'timetable-options',
      'timetable_general_settings'
    );

    $title = __( 'Use short day names', 'weekly-class-schedule' );
    $desc = __( "Displays the first 3 letters of the weekday on the schedule. For example 'Mon' instead of 'Monday'.", 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_short_day_names',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'short_day_names_field' ),
        'timetable-options',
        'timetable_general_settings'
    );
    
    $title = __( 'Class Details Template', 'weekly-class-schedule' );
    $desc = __( 'Use placholders to design the way the class details appear in the schedule', 'weekly-class-schedule' ) . '<br/><br/>';
    $desc .= '<strong>' . __( 'Available placholders', 'weekly-class-schedule' ) . '</strong>';
    $desc .= ': [class], [instructor], [start hour], [end hour], [notes].';

    add_settings_field(
      'timetable_class_template',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'class_template_field' ),
      'timetable-options',
      'timetable_general_settings'
    );

    /* Register general settings */
    register_setting( 'timetable_options', 'timetable_first_day_of_week' );
    register_setting( 'timetable_options', 'timetable_number_of_days' );
    register_setting( 'timetable_options', 'timetable_24_hour_mode' );
    register_setting( 'timetable_options', 'timetable_time_increments' );
    register_setting( 'timetable_options', 'timetable_detect_classroom_collisions' );
    register_setting( 'timetable_options', 'timetable_detect_instructor_collisions' );
    register_setting( 'timetable_options', 'timetable_use_timezones' );
    register_setting( 'timetable_options', 'timetable_short_day_names' );
    register_setting( 'timetable_options', 'timetable_class_template' );

    /* Add Color Settings */
    add_settings_section(
      'timetable_appearance_settings',
      'Appearance Settings',
      array('TimetableOptions', 'appearance_settings_section'),
      'timetable-options'
    );

    $title = __( 'Base class color', 'weekly-class-schedule' );
    $desc = __( 'The default color for classes in the schedule.', 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_base_class_color',
    	"$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'base_class_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );

    $title = __( 'Alternate class color', 'weekly-class-schedule' );
    $desc = __( 'In case there are more than one class in the same cell, colors will alternate between this and the base color.', 'weekly-class-schedule' );
    add_settings_field(
      'timetable_secondary_class_color',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'secondary_class_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );

    $title = __( 'Class details box', 'weekly-class-schedule' );
    $desc = __( 'Color of the class details box which appears when hovering over a class.', 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_hover_class_color',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'hover_class_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );

    $title = __( 'Border color', 'weekly-class-schedule' );
    $desc = __( 'This color is used for all borders in the schedule output', 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_border_color',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'border_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );

    $title = __( 'Schedule headings color', 'weekly-class-schedule' );
    $desc = __( 'Text color of the schedule headings (weekdays, hours).', 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_headings_color',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'headings_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );
    
    $title = __( 'Schedule headings background', 'weekly-class-schedule' );
    $desc = __( 'Background color of the schedule headings (weekdays, hours).', 'weekly-class-schedule' );

    add_settings_field(
      'timetable_headings_background_color',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'headings_background_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );

    $title = __( 'Text color', 'weekly-class-schedule' );
    $desc = __( 'Text color of schedule entries/classes.', 'weekly-class-schedule' );
    
    add_settings_field(
      'timetable_text_color',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'text_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );

    $title = __( 'Background color', 'weekly-class-schedule' );
    $desc = __( 'Background color for the entire schedule.', 'weekly-class-schedule' );
    
    add_settings_field(
    	'timetable_background_color',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'background_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );

    $title = __( 'qTip background color', 'weekly-class-schedule' );
    $desc = __( 'Background color of the qTip pop-up box.', 'weekly-class-schedule' );
    
    add_settings_field(
    	'timetable_qtip_background',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'qtip_background_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );
    
    $title = __( 'Links color', 'weekly-class-schedule' );
    $desc = __( 'The color of the links which appear in the class details box', 'weekly-class-schedule' );
    
    add_settings_field(
    	'timetable_links_color',
      "$title:<br/><span class='description'>$desc</span>",
      array('TimetableOptions', 'links_color_field' ),
      'timetable-options',
      'timetable_appearance_settings'
    );

    /* Register appearance settings */
    register_setting( 'timetable_options', 'timetable_base_class_color', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_secondary_class_color', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_hover_class_color', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_border_color', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_headings_color', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_headings_background_color', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_text_color', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_background_color', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_qtip_background', array( 'TimetableOptions', 'validateHexValue' ) );
    register_setting( 'timetable_options', 'timetable_links_color', array( 'TimetableOptions', 'validateHexValue' ) );
  }

  /* Renders the instructions section */
  public static function instructions_section()
  {
    $help_text = __( 'To display all the classes in a single schedule, simply enter the shortcode <code>[timetable]</code> inside a page or a post.', 'weekly-class-schedule' ) . '<br/>';
    $help_text .= __( "The schedule layout is vertical by default but it's easy to switch to horizontal using the 'layout' attribute like this: <code>[timetable layout=horizontal]</code>. ", 'weekly-class-schedule' );
    $help_text .= __( "It's also possible to output the schedule as a list using the list layout: <code>[timetable layout=list]</code>. The list layout is better for mobile devices.", 'weekly-class-schedule' ) . '<br/>';
    $help_text .= __( 'In order to display a single classroom, use the classroom attribute like this: <code>[timetable classroom="Classroom A"]</code> Where "Classroom A" is the name of the classroom as it appears in the database.', 'weekly-class-schedule' ) . '<br/>';
    $help_text .= __( 'A finalized shortcode may look something like <code>[timetable classroom="Classroom A" layout=list]</code>.', 'weekly-class-schedule' );
    echo $help_text;
  }
  
  /* Render General Settings section */
  public static function general_settings_section()
  {
    /* Set default values */
    add_option( 'timetable_24_hour_mode', 'no' );
    add_option( 'timetable_detect_classroom_collisions', 'yes' );
    add_option( 'timetable_detect_instructor_collisions', 'yes' );
    add_option( 'timetable_use_timezones', 'yes' );
    add_option( 'timetable_short_day_names', 'no' );
    
    $template = "[class] with [instructor]\n[start hour] to [end hour]\n[notes]";
    add_option( 'timetable_class_template', $template );
  }

  /* Render first day of week field */
  public static function first_day_of_week_field()
  {
    $weekdays = TimetableSchedule::model()->generateWeekdays();
    echo TimetableHtml::generateSelectList( $weekdays, array( 'name' => 'timetable_first_day_of_week' ), TRUE, get_option( 'timetable_first_day_of_week', '0' ) );
  }

  /* Render number of days field */
  public static function number_of_days_field()
  {
    $number = array( 1, 2, 3, 4, 5, 6, 7 );
    echo TimetableHtml::generateSelectList( $number, array( 'name' => 'timetable_number_of_days' ), FALSE, get_option( 'timetable_number_of_days', 7 ) );
  }

  /* Render 24 hour mode field */
  public static function timetable_24_hour_mode_field()
  {
    $checked = ( get_option( 'timetable_24_hour_mode' ) == 'yes' ) ? 'checked="checked"' : '';
    echo "<input type='checkbox' $checked name='timetable_24_hour_mode' value='yes' /> Yes";
  }

  /* Render time increments field */
  public static function time_increments_field()
  {
    $incs = array( 5, 10, 15, 30 );
    echo TimetableHtml::generateSelectList( $incs, array( 'name' => 'timetable_time_increments' ), FALSE, get_option( 'timetable_time_increments', 15 ) ) . __( ' Minutes', 'weekly-class-schedule' );
  }

  /* Render detect classroom collisions field */
  public static function detect_classroom_collisions_field()
  {
    $checked = ( get_option( 'timetable_detect_classroom_collisions', 'yes' ) == 'yes' ) ? 'checked="checked"' : '';
    echo "<input type='checkbox' $checked name='timetable_detect_classroom_collisions' value='yes' /> Yes";
  }
  
  /* Render detect instructor collisions field */
  public static function detect_instructor_collisions_field()
  {
    $checked = ( get_option( 'timetable_detect_instructor_collisions', 'yes' ) == 'yes' ) ? 'checked="checked"' : '';
    echo "<input type='checkbox' $checked name='timetable_detect_instructor_collisions' value='yes' /> Yes";
  }

  public static function use_timezones_field()
  {
    $checked = ( get_option( 'timetable_use_timezones' ) == 'yes' ) ? 'checked="checked"' : '';
    echo "<input type='checkbox' $checked name='timetable_use_timezones' value='yes' /> Yes";
  }

  public static function short_day_names_field()
  {
    $checked = ( get_option( 'timetable_short_day_names' ) == 'yes' ) ? 'checked="checked"' : '';
    echo "<input type='checkbox' $checked name='timetable_short_day_names' value='yes' /> Yes";
  }

  public static function class_template_field()
  {
    $template = "[class] with [instructor]\n[start hour] to [end hour]\n[notes]";
    $default = get_option( 'timetable_class_template', $template );
    echo "<textarea name='timetable_class_template' cols='40' rows='6'>$default</textarea>";
  }

  /* --------------------------------------------------------------------------------- */

  /* Render Color Settings section */
  public static function appearance_settings_section()
  {
    /* Set default colors */
    add_option( 'timetable_base_class_color', '57ca8e' );
    add_option( 'timetable_secondary_class_color', 'ddddff' );
    add_option( 'timetable_hover_class_color', '57ca8e' );
    add_option( 'timetable_border_color', 'dddddd' );
    add_option( 'timetable_headings_color', '666666' );
    add_option( 'timetable_headings_background_color', 'eeeeee' );
    add_option( 'timetable_text_color', '373737' );
    add_option( 'timetable_background_color', 'ffffff' );
    add_option( 'timetable_qtip_background', 'ffffff' );
    add_option( 'timetable_links_color', 'ffffff' );
  }

  public static function base_class_color_field()
  {
    $default = get_option( 'timetable_base_class_color', '57ca8e' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_base_class_color' name='timetable_base_class_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_base_class_color'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: DDFFDD</span>';
  }

  public static function secondary_class_color_field()
  {
    $default = get_option( 'timetable_secondary_class_color', 'ddddff' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_secondary_class_color' name='timetable_secondary_class_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_secondary_class_color'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: DDDDFF</span>';
  }

  public static function hover_class_color_field()
  {
    $default = get_option( 'timetable_hover_class_color', '57ca8e' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_hover_class_color' name='timetable_hover_class_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_hover_class_color'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: FFDDDD</span>';
  }

  public static function border_color_field()
  {
    $default = get_option( 'timetable_border_color', 'dddddd' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_border_color' name='timetable_border_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_border_color'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: DDDDDD</span>';
  }

  public static function headings_color_field()
  {
    $default = get_option( 'timetable_headings_color', '666666' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_headings_color' name='timetable_headings_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_headings_color'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: 666666</span>';
  }

  public static function headings_background_color_field()
  {
    $default = get_option( 'timetable_headings_background_color', 'eeeeee' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_headings_background_color' name='timetable_headings_background_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_headings_background_color'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: EEEEEE</span>';
  }

  public static function text_color_field()
  {
    $default = get_option( 'timetable_text_color', '373737' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_text_color' name='timetable_text_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_text_color'>&nbsp</span>";
        echo '&nbsp; <span class="description">Default: 373737</span>';
  }

  public static function background_color_field()
  {
    $default = get_option( 'timetable_background_color', 'ffffff' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_background_color' name='timetable_background_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_background_color'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: FFFFFF</span>';
  }

  public static function qtip_background_field()
  {
    $default = get_option( 'timetable_qtip_background', 'ffffff' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_qtip_background' name='timetable_qtip_background' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_qtip_background'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: FFFFFF</span>';
  }
  
  public static function links_color_field()
  {
    $default = get_option( 'timetable_links_color', 'ffffff' );
    echo "<input type='text' class='timetable_colorpicker' id='timetable_links_color' name='timetable_links_color' value='$default' size='8'>";
    echo "<span style='background: #$default;' class='colorpicker-preview timetable_links_color'>&nbsp</span>";
    echo '&nbsp; <span class="description">Default: 1982D1</span>';
  }
}