	
	//========================================================================
	// INPUT VALUES: get id of input elements in HTML page (div, input text,...)
	//========================================================================
	function input_div(map_item, lat_item, long_item){ 
		// id of div for map
		// id of text-input for lat value 
		// id of text-input fot long value.
	}
	
	//========================================================================
	// INITALIZE: get input value from controller before initalizing HTML, 
	// get input value from element "map canvas", "directionsPanel", "geo_lat", "geo_long" in HTML page
	//========================================================================
	// Variables for initialize.
    var map; // i am karmi
	var geocoder = new google.maps.Geocoder();
	var marker;
	var circle;
	var infowindow;
	var infowindow_shop = new google.maps.InfoWindow({maxWidth: 200});
	var zclient;
	
	// Variables for showShops.    
    var iterator = 0;    	
	var markers = [];
	
	// Variable for show direction. 
	var directionsService = new google.maps.DirectionsService();
	var directionsDisplay = new google.maps.DirectionsRenderer({preserveViewport: true});
	
	/**
	* Displays the map & is called when this page is initializing.
	*/
	function initialize(input_lat, input_lng, input_address, input_module, viewController) {
		var default_coor = new google.maps.LatLng(10.75913978771365, 106.66536514282234);
		var myOptions = {
			zoom: 13,
			center: default_coor,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("mm-map"), myOptions);
		// Modifying the mapTypeId dynamically
		map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
		
		map.setTilt(45);
		map.setHeading(90);
		
		// Create new Client
		zclient = new ZClient();
		
		//Distance buttons
		if (viewController) {
			addDistanceController();
		}
		
		// Locate the input shop first if input values are provided.
		if (input_lat != null && input_lng != null && input_address != null) {		
			locate(input_lat, input_lng, input_address, input_module);
		}
		
		//showStops('');
	}
	
	/**
	* Locate the input shop
	*/
	function locate(input_lat, input_lng, input_address, input_module) {
	// Set marker.
		var input_loc = new google.maps.LatLng(input_lat, input_lng);
		
		// set center for map
		map.setCenter(input_loc);
		
		marker = new google.maps.Marker({
			map: map,
			position: input_loc,
			title: input_address,
			draggable: true,
		    animation: google.maps.Animation.DROP
		});
		
		// Create a infowindow for this marker
		infowindow = new google.maps.InfoWindow({  
			content: "<b>Vĩ độ:</b><br>" + input_lat + "<br>"
			       + "<b>Kinh độ:</b><br>" + input_lng,
			maxWidth: 200
		});
		
		// set lat/lng hidden in HTML & zclient variable
		var geoLatObj = document.getElementById("geo_lat");
		if (geoLatObj) geoLatObj.value = input_lat;
		var geoLongObj = document.getElementById("geo_long");
		if (geoLongObj) geoLongObj.value = input_lng;
		zclient.location.latitude = input_lat;
		zclient.location.longitude = input_lng;
				
		// Actions depend on the module.
		if (input_module == "location") {
			// set zoom for map
			map.setZoom(16);	
		} else //if (input_module == "search") 
			{
			circle = new google.maps.Circle({
				map: map,
				strokeColor: "#FFFF00",
				strokeOpacity: 0.8,
				strokeWeight: 1,
				fillColor: "#FFFF00",
				fillOpacity: 0.25,
				center: input_loc,
				radius: 5000
			});
			
			// set zoom for map
			map.setZoom(13);
		}
		
		// EVENT CLICK: Makes the marker bouncing when it is clicked.
		google.maps.event.addListener(marker, 'click', function() {
			if (marker.getAnimation() != null) {
				marker.setAnimation(null);
			} else {
				marker.setAnimation(google.maps.Animation.BOUNCE);
			}
		
			// Open infowindow when clicking marker.
			infowindow.open(map, marker);
		});
		
		// EVENT DRAGEND: Changes the value of address when user stop moving the marker.
		google.maps.event.addListener(marker, 'dragend', function() {
			//update();
			
			// Set center for circle
			if (input_module != "search") {
				circle.setCenter(marker.getPosition());
			}
		});
	}

	//========================================================================
	// LOCATE A SHOP: get input value from element "address", "geo_lat", "geo_long""geo_address" in HTML page
	//========================================================================
    /**
    * Locates the coordinate (longitude & latitude) of the address inputed by users.
    */
    function seeLocation(type) {
		var address;
		var loc;
    	if (type == 1 || type == 3){
    		address = document.getElementById("address").value 
    				  + ", TP.HCM";
    	} else if (type == 2){
    		address = document.getElementById("street").value 
    				  + ", phường " + document.getElementById("ward").value 
    				  + ", quận " + document.getElementById("dist").value 
    				  + ", TP.HCM";
    	}
    	geocoder.geocode( {'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				loc = results[0].geometry.location;
				
				// Set marker
				marker.setPosition(loc);
				marker.setTitle(address);
				
				// Set center for circle
				if (type == 3) {
					circle.setCenter(marker.getPosition());
				}
				
				// Call function update() to update information (suggested address, infowindow, circle,...).
				update();
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
    	});	
    }
    
    /**
    * Update information (suggested address, infowindow, circle,...) after search or dragend.
    */
    function update() {
		var geo_address; // this variable will contain the suggested address.
        var lat = parseFloat(marker.getPosition().lat());
        var lng = parseFloat(marker.getPosition().lng());
        var latlng = new google.maps.LatLng(lat, lng);
		
		// Set center for map
		map.setCenter(marker.getPosition());
		
		// Shows the relative address (text) of the coordinate inputed by users.
        geocoder.geocode({'latLng': latlng, 'language': "vi"}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					// set this value in textbox geo_address
					geo_address = results[0].formatted_address;
					var geoAddObj = document.getElementById("geo_address");
					if (geoAddObj) geoAddObj.value = geo_address;
					
					// set lat/lng hidden in HTML & zclient variable
					var geoLatObj = document.getElementById("geo_lat");
					if (geoLatObj) geoLatObj.value = lat;
					var geoLongObj = document.getElementById("geo_long");
					if (geoLongObj) geoLongObj.value = lng;
					zclient.location.latitude = lat;
					zclient.location.longitude = lng;
					
					// set content in infowindow.
					infowindow.setContent("<b>Vĩ độ:</b><br>" + lat + "<br>"
									    + "<b>Kinh độ:</b><br>" + lng + "<br>"
										+ "<b>Đ/c gợi ý:</b><br>" + geo_address);
				} else {
					alert("No results found");
				}
			} else {
				alert("Geocoder failed due to: " + status);
			}
        });
    }
    
	//========================================================================
	// SEARCH LIST OF SHOPS
	//========================================================================
    /**
    * Shows locations of all shops.
    */
    function showShops(shop_list) {
    	if(!shop_list){
		// Convert JSON result to JS objects. (for testing)
    		input_json = '[{"matram":"1","tentram":"Phở 24","DESCRIPTION":"Các loại phở thêm ngon, thương hiệu nổi tiếng","ADDRESS":"16 Lê Văn Sỹ, P. Tân Định, Q. Phú Nhuận","geo_lat":"10.7935931560974","geo_long":"106.69419521485","TYPE":"Quán ăn","ICON":""},'
						+ '{"matram":"3","tentram":"Vina Phở","DESCRIPTION":"Các loại phở thêm ngon,hương vị đậm đà","ADDRESS":"176 Lê Văn Sỹ, P. Tân Định, Q. Phú Nhuận","geo_lat":"10.8035931560974","geo_long":"106.70419521485","TYPE":"Quán  ăn","ICON":""},'
						+ '{"matram":"4","tentram":"Phở Thìn","DESCRIPTION":"Phở gia truyền Hà Nội","ADDRESS":"196 Lê Văn Sỹ, P. Tân Định, Q. Phú Nhuận","geo_lat":"10.8135931560974","geo_long":"106.71419521485","TYPE":"Quán ăn",  "ICON":""}]';
			shop_list = jQuery.parseJSON(input_json);
    	}
    	
    	// Clear all old markers.
        clearMarkers();
        // Clear old guide & direction.
		directionsDisplay.setMap(null);
		document.getElementById("directionsPanel").innerHTML = "";
		
		// Set zoom for map
		setZoom(zclient.search.distance);
		
        // Create new array of markers.
		markers = new Array();
		
		// Add markers.
        for (i = 0 ; i < shop_list.length ; i++) {
			obj = shop_list[i];
            addMarker(obj);
        }
				
		// Display all markers (one by one).
        /* iterator = 0;
        if (markers) {
            for (i in markers) {
            	setTimeout(function() {
            		markers[iterator].setMap(map);
                    markers[iterator].setAnimation(google.maps.Animation.DROP);
                    iterator++;
                }, i * 400);
            }
        } */
    }
    
    function showStops(stop_list) {
    	if(!stop_list){
		// Convert JSON result to JS objects. (for testing)
    		return;
    		//input_json = '[{"matram":"1","tentram":"Trạm 1","geo_lat":"10.7935931560974","geo_long":"106.69419521485"},'
						+ '{"matram":"3","tentram":"Trạm 2","geo_lat":"10.8035931560974","geo_long":"106.70419521485"},'
						+ '{"matram":"4","tentram":"Trạm 3","geo_lat":"10.8135931560974","geo_long":"106.71419521485"}]';
    	}
    	else {
    		input_json = stop_list;
    	}
    	stop_list = jQuery.parseJSON(input_json);
    	
    	// Clear all old markers.
        clearMarkers();
        // Clear old guide & direction.
		directionsDisplay.setMap(null);
		//document.getElementById("directionsPanel").innerHTML = "";
		
		// Set zoom for map
		//setZoom(zclient.search.distance);
		
        // Create new array of markers.
		markers = new Array();
		
		// Add markers.
		var i;
        for (i = 0 ; i < stop_list.length ; i++) {
			obj = stop_list[i];
            addMarker(obj);
        }
				
		// Display all markers (one by one).
        /* iterator = 0;
        if (markers) {
            for (i in markers) {
            	setTimeout(function() {
            		markers[iterator].setMap(map);
                    markers[iterator].setAnimation(google.maps.Animation.DROP);
                    iterator++;
                }, i * 400);
            }
        } */
    }
    
	/**
    * Add new marker into marker array.
    */
    function addMarker(obj) {
    	var coordinate = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
    	/*var shopCatObj= shopCat[obj.CATEGORY_matram];
    	var imageFile= "store.png";
    	if(shopCatObj.icon) {
    		imageFile=shopCatObj.icon;
    	}
        var iconFile= "/public/images/cat/"+ imageFile;*/
        // Create a new LatLng point for the marker.
        var marker_child = new google.maps.Marker({
            map: map,
			position: coordinate,
            title: obj.tentram,
            draggable: false
		});		
		obj.marker= marker_child;
		
		google.maps.event.addListener(marker_child, 'click', function() {
			// Set infowindow's content.
	        infowindow_shop.setContent("<b>" + obj.tentram + "</b");
			
			// Open infowindow
			infowindow_shop.open(map, marker_child);
			
			// Makes the marker bouncing when it is clicked.
			for (i in markers) {
                markers[i].setAnimation(null);
            }
			
			if (marker_child.getAnimation() != null) {
				marker_child.setAnimation(null);
			} else {
				marker_child.setAnimation(google.maps.Animation.BOUNCE);
			}
			
			// Show direction between user's location & shop's one.
			//showDirection(obj);
		});
        
        markers.push(marker_child);
    }
    
    /**
    * Deletes all markers in the array by removing references to them.
    */
    function clearMarkers() {
    	if (markers) {
    		var x;
    		for (x = 0 ; x < markers.length ; x++) {
    			markers[x].setMap(null);
            }
    	}
    }    
	
    //========================================================================
	// DIRECTION
	//========================================================================
	/**
     * Find the direction between 2 locations.
     */
    function showDirection(obj) {
    	var origin = new google.maps.LatLng(zclient.location.latitude, zclient.location.longitude);
    	var destination = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
        var request = {
            origin: origin, 
            destination: destination,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
		directionsDisplay.setMap(map);
		
        directionsService.route(request, function(response, status) {
        	if (status == google.maps.DirectionsStatus.OK) {
        		directionsDisplay.setDirections(response);
				var myRoute = response.routes[0].legs[0];
				
				// Show the guide of direction
				showGuide(obj, myRoute);
			}
        });
	}
	
	/**
     * Show guide of direction.
     */
	function showGuide(obj, myRoute) {
		var guide = "";
		
		guide += "<b>Đường đến cửa hàng " + obj.tentram + "</b>"
			+ "<br>Tổng khoảng cách : " + myRoute.distance.text
			+ "<br>Tổng thời gian: " + myRoute.duration.text;
		
		for (var i = 0; i < myRoute.steps.length; i++) {
			guide += "<br>" + (i+1) + ". " + myRoute.steps[i].instructions
				+ " (" + myRoute.steps[i].distance.text 
				+ " - " + myRoute.steps[i].duration.text + ")";
		}
		
		document.getElementById("directionsPanel").innerHTML = guide;
	}
    
	//========================================================================
	// BUTTON CONTROLLER ON MAP
	//========================================================================
	/**
     * Add Distance controller
     */
    function addDistanceController(){
    	var dControlDiv = document.createElement('DIV');
    	var dControl500 = new ZDistanceControl(dControlDiv, map, 0.5);
	    var dControl1 = new ZDistanceControl(dControlDiv, map, 1);
	    var dControl2 = new ZDistanceControl(dControlDiv, map, 2);
	    var dControl5 = new ZDistanceControl(dControlDiv, map, 5);
	    var dControl10 = new ZDistanceControl(dControlDiv, map, 10);
	    var dControl20 = new ZDistanceControl(dControlDiv, map, 20);

	    dControlDiv.index = 1;
	    map.controls[google.maps.ControlPosition.TOP_CENTER].push(dControlDiv);

    }
    function ZDistanceControl(controlDiv, map, distance) {
		// Set CSS styles for the DIV containing the control
		// Setting padding to 5 px will offset the control
		// from the edge of the map
		controlDiv.style.padding = '5px';
		controlDiv.style.textAlign='left';

		// Set CSS for the control border
		var controlUI = document.createElement('DIV');
		controlUI.style.backgroundColor = 'white';
		controlUI.style.borderStyle = 'solid';
		controlUI.style.borderWidth = '1px';
		controlUI.style.cursor = 'pointer';
		controlUI.style.textAlign = 'center';
		controlUI.className="left";
		controlUI.title = 'Click to change searching region !';
		controlDiv.appendChild(controlUI);

		// Set CSS for the control interior
		var controlText = document.createElement('DIV');
		controlText.style.fontFamily = 'Arial,sans-serif';
		controlText.style.fontSize = '12px';
		controlText.style.paddingLeft = '4px';
		controlText.style.paddingRight = '4px';
		var unit="km";
		if (distance < 1) {
			//distance = distance * 1000;
			unit="m";
		}
		controlText.innerHTML = distance + ' '+unit;
		controlUI.appendChild(controlText);

		// Setup the click event listeners: simply set the map to Chicago
		google.maps.event.addDomListener(controlUI, 'click', function() {
			// Set radius value for zclient variable
			zclient.search.distance = distance;
			
			// Set zoom for map
			setZoom(zclient.search.distance);
		});
	}
	
    function setZoom(distance) {
    	// Set radius for the circle around marker.
		circle.setRadius(distance * 1000);
		
    	if (distance == 0.5) {
			map.setZoom(16);
		} else if (distance == 1) {
			map.setZoom(15);
		} else if (distance == 2) {
			map.setZoom(14);
		} else if (distance == 5) {
			map.setZoom(13);
		} else if (distance == 10) {
			map.setZoom(12);
		} else if (distance == 20) {
			map.setZoom(11);
		}
    	
    	// Set center for map.
    	var userLocation = new google.maps.LatLng(zclient.location.latitude, zclient.location.longitude);
    	map.setCenter(userLocation);
    }
    
    /**
     * ZfindZ Client Object
     * @returns
     */
    function ZClient(){
    	var obj={
			location:{latitude:0.0, longitude:0.0},
			search:{distance:5.0, keyword:''}
    	};
    	return obj;
    }
