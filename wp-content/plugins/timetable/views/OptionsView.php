<?php
/**
 * @file
 * Options form template.
 */
?>
<div id="timetable-options-form" class="wrap">
	<div class="icon32" id="icon-options-general"></div>
	<h2><?php _e('Timetable Options', 'weekly-class-schedule'); ?></h2>
	<form action="options.php" method="post">
		<?php do_settings_sections( 'timetable-options' ); ?>

		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes', 'weekly-class-schedule'); ?>" />
		</p>

	<?php settings_fields( 'timetable_options' ); ?>
	</form>
</div><!-- wrap -->