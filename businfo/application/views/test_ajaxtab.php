<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script language="javascript">


</script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
    var haight = new google.maps.LatLng(37.7699298, -122.4469157);
    var oceanBeach = new google.maps.LatLng(37.7683909618184, -122.51089453697205);
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
	var map;            
      function initialize() {
    	  var myOptions = {
    			    zoom: 14,
    			    mapTypeId: google.maps.MapTypeId.ROADMAP,
    			    center: haight
    			  };

    	  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    	  directionsDisplay.setMap(map);
    	}

    	function calcRoute() {
    	  var selectedMode = document.getElementById("modeaaaaa").value;
    	  var request = {
    	      origin: haight,
    	      destination: oceanBeach,
    	      // Note that Javascript allows us to access the constant
    	      // using square brackets and a string value as its
    	      // "property."
    	      travelMode: google.maps.DirectionsTravelMode.DRIVING
    	  };
    	  directionsService.route(request, function(response, status) {
    	    if (status == google.maps.DirectionsStatus.OK) {
        	    alert("long");
    	      directionsDisplay.setDirections(response);
    	    }
    	 
          
          else {
          alert("Directions query failed: " + status);
        }
        
    	  });
      } 
    </script>

  </head>
  <body onload="initialize()">

<div>
<strong>Mode of Travel: </strong>
<select id="modeaaaaa" onchange="calcRoute();">
  <option value="DRIVING">Driving</option>
  <option value="WALKING">Walking</option>
  <option value="BICYCLING">Bicycling</option>

</select>
</div>
    <div id="map_canvas" ></div>

    
  </body>
</html>

