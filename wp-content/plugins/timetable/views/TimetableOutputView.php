<?php
/**
 * @file
 * Output view template.
 *
 * Available Variables:
 * - $weekday_names: Array of weekday names to be used in table output.
 * - $weekdays: Array of used weekdays based on user preference.
 * - $start_hours: Array of unique start hours.
 * - $classes: Multi-dimensional array in the structure of $classes[weekday][start_hour].
 */
?>

<table class="timetable-schedule">
	<tr>
		<th></th>
		<?php foreach ( $weekday_names as $weekday ): ?>
		<th><?php echo $weekday; ?></th>
		<?php endforeach; ?>
	</tr>
    <?php $i = 1; ?>
	<?php foreach ( $start_hours as $start_hour ): ?>
    
    	<?php $i = $i % 2; ?>
        
		<tr <?php if($i != 0){echo('class="zebra-up"');} else{echo('class="zebra-down"');};  ?> >
			<th class="timetable-hour-title"><?php echo $start_hour; ?></th>
			<?php foreach ( $weekdays as $weekday ): ?>
			<?php echo TimetableSchedule::model()->renderClassTd( $classes, $start_hour, $weekday ) ?>
  			<?php endforeach; ?>
		</tr>
     
     	<?php $i = $i + 1; ?>
     
	<?php endforeach; ?>
</table>