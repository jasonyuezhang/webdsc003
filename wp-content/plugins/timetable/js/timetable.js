(function ($) {
  
	$(document).ready(function() {
		// Fix IE7 z-index issue
		if ($('html#ie7').length > 0) {
			var numberOfTd = ( $('.timetable-schedule td div').length + 10);
			
			$('.timetable-schedule td div').each(function() {
				$(this).css('z-index', numberOfTd);
				numberOfTd--;
			});
		}

		
		// Apply Hover Intent
		$('.timetable-active-div').hoverIntent(timetableOver, timetableOut);
		
		// Apply qTip
		$('a.timetable-qtip').each(function() {
			$(this).qtip({
				content: {
					text: $(this).attr('name')
				},
				show: {
				   delay: 0,
				   when: {
					   event: 'mousedown'
				   },
				   effect: {
					   length: 0
				   }
				},
	
				hide: { 
					delay: 300,
					when: {
						event: 'mouseout'
					}
				},
				position: {
					corner: {
						target: 'bottomMiddle',
						tooltip: 'topMiddle'
					}
				}
			});
		})
	});
	
	// Hover intent over callback function
	function timetableOver() {
		$(this).children('.timetable-class-details').fadeIn(200);
	}
	
	// Hover intet out callback function
	function timetableOut() {
		$(this).children('.timetable-class-details').hide();
	}

  
}) (jQuery);