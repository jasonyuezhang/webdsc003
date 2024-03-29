<script type="text/javascript">
jQuery(document).ready(function($){
    $.fn.extend({
        fitness_google_map: function(options) {
 
            var defaults = {
                //google_api: 'AIzaSyDs8JCxbOANzW9db8UG1LLNDmSq4DUNv4w',
                location: '',
				zoom: 4,
            };

            var options = $.extend(defaults, options);
         
            return this.each(function() {
			  var o = options;
			  var obj = $(this); 
			  
			  var obj_id = obj.attr("id");

			  var wait = setInterval(function() {
				  if( $("#" + obj_id).is(":visible") ) {
					  clearInterval(wait);
					  // This piece of code will be executed
					  var obj_class = obj.attr("class");
					  var geocoder;
					  var map;
					  geocoder = new google.maps.Geocoder();
					  //alert("usao2")
					  var latlng = new google.maps.LatLng(40, 40); // starting default location
					  
					  var customColor = [
						{
						  featureType: "all",
						  stylers: [
							{ "hue": "#F96E5B" }
						  ]
						},
					  ];
					  
					  var myOptions = {
						zoom: o.zoom,
						styles: customColor,
						center: latlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						zoomControl: true,
						zoomControlOptions: {
						  style: google.maps.ZoomControlStyle.DEFAULT
					  },
						scaleControl: true,
					  }
					  map = new google.maps.Map(document.getElementById(obj_id), myOptions);						
					  var address = o.location;
					  geocoder.geocode( { 'address': address}, function(results, status) {	  
								
						  if (status == google.maps.GeocoderStatus.OK) {
							  map.setCenter(results[0].geometry.location);
							  var marker = new google.maps.Marker({
								  map: map,
								  position: results[0].geometry.location
							  });
						  } else {
							  alert("Geocode was not successful for the following reason: " + status);
						  }
			
					  });		  
					  
				  }
			  }, 200);

 
            }); // return this.each
        }
    });
});
</script>