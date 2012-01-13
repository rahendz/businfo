<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Google Maps JavaScript API v3 Example: Place Search</title>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>

    <style type="text/css">
      #map {
        height: 400px;
        width: 600px;
        border: 1px solid #333;
        margin-top: 0.6em;
      }
    </style>

    <script type="text/javascript">
      var map;
      var infowindow;
      var pyrmont = new google.maps.LatLng(10.849765,106.77223);
      var sw = new google.maps.LatLng(10.85849,106.788801);
      var ne = new google.maps.LatLng(10.850487,106.753286);
      var da = new google.maps.LatLng(10.827637,106.717476);
      
      var bounds = new google.maps.LatLngBounds(ne,sw);
      var bounds2 = new google.maps.LatLngBounds(da,pyrmont);
      function initialize() {
        
        map = new google.maps.Map(document.getElementById('map'), {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: pyrmont,
          zoom: 15
        });
        var boxpolys = new google.maps.Rectangle({
            bounds: bounds,
            fillOpacity: 0,
            strokeOpacity: 1.0,
            strokeColor: '#000000',
            strokeWeight: 1,
            map: map
       });
        var boxpolys2 = new google.maps.Rectangle({
            bounds: bounds2,
            fillOpacity: 0,
            strokeOpacity: 1.0,
            strokeColor: '#000000',
            strokeWeight: 1,
            map: map
       });
      }
      function route() {
          for (var i=0;i<2;i++)
          {
              if(i==0)
              {
    	  var request = {
    	          bounds: bounds,
    	          name: ['hotel']
    	        };
              }
              if(i==1)
              {
                    
    	       
    	      request = {
    	    	          bounds: bounds2,
    	    	          name: ['hotel']
    	    	        };
              }
    	    	        infowindow = new google.maps.InfoWindow();
    	    	        var service = new google.maps.places.PlacesService(map);
    	    	        service.search(request, callback);
          }
        }

      function callback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map"></div>
    
    <div id="text">
      <pre>
var request = {
  location: new google.maps.LatLng(-33.8665433, 151.1956316),
  radius: 500,
  types: ['store']
};
      </pre>
      <input type="submit" onclick="route()"/>
  </body>

</html>
