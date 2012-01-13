<!DOCTYPE html>
<html>
  <head>
    <title>Google Maps JavaScript API v3 Example: Places Autocomplete</title>
    <script src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places"
      type="text/javascript"></script>

    <style type="text/css">
      body {
        font-family: sans-serif;
        font-size: 14px;
      }
      #map_canvas {
        height: 400px;
        width: 600px;
        margin-top: 0.6em;
      }
    </style>

    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(10.849765,106.77223),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'),
          mapOptions);


        var defaultBounds = new google.maps.LatLngBounds(
        		  new google.maps.LatLng(10.906133,106.411972),
        		  new google.maps.LatLng(10.398676,107.146683));
        var boxpolys = new google.maps.Rectangle({
            bounds: defaultBounds,
            fillOpacity: 0,
            strokeOpacity: 1.0,
            strokeColor: '#000000',
            strokeWeight: 1,
            map: map
       });
        var input = document.getElementById('searchTextField');
        		var options = {
        		  bounds: defaultBounds
        		};

       
       
        var autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }

          var image = new google.maps.MarkerImage(
              place.icon,
              new google.maps.Size(71, 71),
              new google.maps.Point(0, 0),
              new google.maps.Point(17, 34),
              new google.maps.Size(35, 35));
          marker.setIcon(image);
          marker.setPosition(place.geometry.location);

          var address = '';
          if (place.address_components) {
            address = [(place.address_components[0] &&
                        place.address_components[0].short_name || ''),
                       (place.address_components[1] &&
                        place.address_components[1].short_name || ''),
                       (place.address_components[2] &&
                        place.address_components[2].short_name || '')
                      ].join(' ');
          }
		var lnglat='';
		lnglat=place.location;
          infowindow.setContent('<div><strong>'+place.geometry.location +  place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
       
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  </head>
  <body>
    <div>
      <input id="searchTextField" type="text" size="50">
     
    </div>
    <div id="map_canvas"></div>
  </body>
</html>
