//========================================================================
// INPUT VALUES: get id of input elements in HTML page (div, input text,...)
//========================================================================
function input_div(map_item, lat_item, long_item) {
	// id of div for map
	// id of text-input for lat value
	// id of text-input fot long value.
}

// ========================================================================
// INITALIZE: get input value from controller before initalizing HTML,
// get input value from element "map canvas", "directionsPanel", "geo_lat",
// "geo_long" in HTML page
// ========================================================================
// Variables for initialize.
var map; // i am karmi
var geocoder = new google.maps.Geocoder();
var marker;
var circle;
var infowindow;
var infowindow_shop = new google.maps.InfoWindow({
	maxWidth : 200
});
var zclient;
var newHTML ="";
// Variables for showShops.
var iterator = 0;
var markers = [];
var address = '';
var placeSearch;
var place;
var placeFrom;
var placeTo;
// Variable for show direction.
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer({
	preserveViewport : true
});
var legs = [];
var routes =[];
var routesArray =[];
var routesVe=[];
var pathroutebox;
var boxpolys = null;
var directions = null;
var routeBoxer = null;
var distance = null; // km
var markerTo;
var markerFrom;
var markerSearch;
var markersArray = [];
var marker;
var countplace =0;
var count=0;
var khoangcach='';

/**
 * Displays the map & is called when this page is initializing.
 */
function initialize(input_lat, input_lng, input_address, input_module,
		viewController) {
	
	 directionsDisplay = new google.maps.DirectionsRenderer();

	var default_coor = new google.maps.LatLng(input_lat, input_lng);
	// Create new Client
	zclient = new ZClient();
	
	if (input_address != null) {
		var address = input_address + ", Hồ Chí Minh, Việt Nam"; 
		geocoder.geocode({'address': address}, function(results, status) { 
		if (status == google.maps.GeocoderStatus.OK) { 
			zclient.location.latitude = results[0].geometry.location.lat();
			zclient.location.longitude = results[0].geometry.location.lng(); 
		}
	});
	}
	else { alert("Geocode was not successful for the following reason: " + status); 
	}
	if (input_address != null && input_address != "User") {
		default_coor = new google.maps.LatLng(zclient.location.latitude,
				zclient.location.longitude); 
		alert("Map loaded!");
		}
		// input_lat = default_coor.lat();
		// input_lng = default_coor.lng();
	var myOptions = {
		zoom : 15,
		center : default_coor,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("mm-map"), myOptions);
	// Modifying the mapTypeId dynamically
	map.setMapTypeId(google.maps.MapTypeId.ROADMAP);

	map.setTilt(45);
	map.setHeading(90);

	// Distance buttons
//	if (viewController) {
//		addDistanceController();
//	}

	// Locate the input shop first if input values are provided.
	if (zclient.location.latitude != 0 && zclient.location.longitude != 0 && input_address != null) {
		locate(zclient.location.latitude, zclient.location.longitude, input_address, input_module);
	}
	directionService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer({ map: map });
    directionsDisplay.setMap(map);
    
   
    
    
    //end 
}



function handle_clicks()
{
	$('#BusLoTrinhDi').live('click',function(){
		var stop_list = $(this).attr('rel');
		if (!stop_list) {
			return;
		} else {
			stop_list = stop_list.replace(/'/g, '"');
			input_json = stop_list;
		}
		stop_list = jQuery.parseJSON(input_json);
		ClearAll();
		var lotrinh = 1;
		ShowLoTrinh(stop_list,lotrinh);
			
	});
	
	$('#BusLoTrinhVe').live('click',function(){
		var stop_list = $(this).attr('rel');
		if (!stop_list) {
			return;
		} else {
			stop_list = stop_list.replace(/'/g, '"');
			input_json = stop_list;
		}
		stop_list = jQuery.parseJSON(input_json);
		ClearAll();
		var lotrinh = 2;
		ShowLoTrinh(stop_list,lotrinh);
			
	});
	$('#BusLoTrinhDiPlace').live('click',function(){
		var stop_list = $(this).attr('rel');
		if (!stop_list) {
			return;
		} else {
			stop_list = stop_list.replace(/'/g, '"');
			input_json = stop_list;
		}
		stop_list = jQuery.parseJSON(input_json);
		ClearAll();
		var lotrinh = 1;
		ShowLoTrinh(stop_list,lotrinh);
		markerSearch = new google.maps.Marker({
    		map: map
    	});
        
        var image = 'http://localhost/businfo/public/img/Skins/star_32.png';
        AddMarkerPlace(placeSearch,markerSearch,image);
	});
	
	$('#BusLoTrinhVePlace').live('click',function(){
		var stop_list = $(this).attr('rel');
		if (!stop_list) {
			return;
		} else {
			stop_list = stop_list.replace(/'/g, '"');
			input_json = stop_list;
		}
		stop_list = jQuery.parseJSON(input_json);
		ClearAll();
		var lotrinh = 2;
		ShowLoTrinh(stop_list,lotrinh);
		markerSearch = new google.maps.Marker({
    		map: map
    	});
            
        var image = 'http://localhost/businfo/public/img/Skins/star_32.png';
        AddMarkerPlace(placeSearch,markerSearch,image);
	});
	$('#SearchBusStopResultDetail a').live('click',function(){
		var coordString = $(this).attr('rel');
		var coordTitle = $(this).text();
		var coordArray = coordString.split(',');
		var update2Location = new google.maps.LatLng(coordArray[0],coordArray[1]);
		map.setCenter(update2Location);
		addBusStopArroundPlace(update2Location,coordTitle,coordArray[2]);
//  		$('#home-messages').text("Viewing: "+coordTitle);
	});
	$('#ResultTableBusStop tr td a').live('click',function(){
		
		var stop_list = $(this).attr('rel');
		
		var coordTitle = $(this).text();
		if (!stop_list) {
			// Convert JSON result to JS objects. (for testing)
			return;
			
		} else {
			stop_list = stop_list.replace(/'/g, '"');
			
			input_json = stop_list;
		}
		stop_list = jQuery.parseJSON(input_json);
		// Clear all old markers.
		clearMarkers();
		// Clear old guide & direction.
		directionsDisplay.setMap(null);
		//directionsDisplay.setMap(map);
		markers = new Array();

		// Add markers.
		try {
			for ( var i = 0; i < stop_list.length; i++) {
				obj = stop_list[i];
				addMarker(obj,2);
			}
		} catch (e) {
			alert(e.message);
		}
	});
	
	$('#ResultSearchBusPlaceDetail a').live('click',function(){
		var stop_list = $(this).attr('rel');
		//alert(stop_list);
		if (!stop_list) {
			// Convert JSON result to JS objects. (for testing)
			return;
		} else {
			stop_list = stop_list.replace(/'/g, '"');
			input_json = stop_list;
		}
		stop_list = jQuery.parseJSON(input_json);
		ClearAll();
		var lotrinh = 1;
		ShowLoTrinh(stop_list,lotrinh);
		markerSearch = new google.maps.Marker({
    		map: map
    	});
            
        var image = 'http://localhost/businfo/public/img/Skins/star_32.png';
        AddMarkerPlace(placeSearch,markerSearch,image);
        
	});
	
	$('#SearchPlaceArroundResultDetail a').live('click',function(){
		var coordString = $(this).attr('rel');
		coordString = coordString.replace('(', '');
		coordString = coordString.replace(')', '');
		var coordTitle = $(this).text();
		var coordArray = coordString.split(';');
		var LatLng = coordArray[0].split(',');
		
		//alert(LatLng[0]);
		var update2Location = new google.maps.LatLng(LatLng[0],LatLng[1]);
		map.setCenter(update2Location);
		addBusStopArroundPlace(update2Location,coordTitle,coordArray[1]);
//  		$('#home-messages').text("Viewing: "+coordTitle);
	});
	
	$('#ResultSearchRouteDetail ol li').live('click',function(){
		
		var coordString = $(this).attr('rel');
		//coordString = coordString.replace('(', '');
		var LatLng = coordString.split('_');
		//alert(LatLng[0]);
		var update2Location = new google.maps.LatLng(LatLng[0],LatLng[1]);
		map.setCenter(update2Location);
		map.setZoom(16);
		var image = 'http://localhost/businfo/public/img/Skins/blink1.gif';
		//var point = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
	    var marker = new google.maps.Marker({
	      map: map,
	      draggable: true,
	      position: update2Location
	    });
	    marker.setIcon(image);
			
		marker.setmap(map);
		
		
//  		$('#home-messages').text("Viewing: "+coordTitle);
	});
	
	$('#ResultSearchBusRouteDetail a').live('click',function(){
		var stop_list = $(this).attr('rel');
		//alert(stop_list);
		if (!stop_list) {
			// Convert JSON result to JS objects. (for testing)
			return;
		} else {
			stop_list = stop_list.replace(/'/g, '"');
			input_json = stop_list;
		}
		var StopListArray = stop_list.split('>');
		
		switch (StopListArray.length)
		{
		case 1:
			stop_list1= StopListArray[0];
			input_json= stop_list1;
			stop_list1 = jQuery.parseJSON(input_json);
			ClearAll();
			var lotrinh = 1;
			ShowLoTrinh(stop_list1,lotrinh);
			break;
		case 2:
			stop_list1= StopListArray[0];
			stop_list2= StopListArray[1];
			input_json= stop_list1;
			stop_list1 = jQuery.parseJSON(input_json);
			ClearAll();
			var lotrinh = 1;
			ShowLoTrinh(stop_list1,lotrinh);
			ClearRoute();
			input_json= stop_list2;
			stop_list2 = jQuery.parseJSON(input_json);
			var lotrinh = 2;
			ShowLoTrinh(stop_list2,lotrinh);
			break;
		case 3:
			stop_list1= StopListArray[0];
			stop_list2= StopListArray[1];
			stop_list3= StopListArray[2];
			input_json= stop_list1;
			stop_list1 = jQuery.parseJSON(input_json);
			ClearAll();
			var lotrinh = 1;
			ShowLoTrinh(stop_list1,lotrinh);
			ClearRoute();
			input_json= stop_list2;
			stop_list2 = jQuery.parseJSON(input_json);
			var lotrinh = 2;
			ShowLoTrinh(stop_list2,lotrinh);
			ClearRoute();
			input_json= stop_list3;
			stop_list3 = jQuery.parseJSON(input_json);
			var lotrinh = 3;
			ShowLoTrinh(stop_list3,lotrinh);
			break;
		}
		markerTo = new google.maps.Marker({
    		map: map
    	});
		markerFrom = new google.maps.Marker({
    		map: map
    	});
		markerTo.setMap(map);
	    markerFrom.setMap(map);
	    var image = 'http://localhost/businfo/public/img/Skins/icon_greenB.png';
	     AddMarkerPlace(placeTo,markerTo,image);
	     var image = 'http://localhost/businfo/public/img/Skins/icon_greenA.png';
	     AddMarkerPlace(placeFrom,markerFrom,image);
	     
	     infowindow.close(); 
	     map.setZoom(12);
       
	});
	
}


function addBusStopArroundPlace(m_position,m_title,m_infowindow) {
	image = 'http://localhost/businfo/public/img/Skins/icon_red.png';
	var marker_child = new google.maps.Marker({
	  	position: m_position,
	  	map: map,
		title: m_title
	});
	marker_child.setIcon(image);
	markers.push(marker_child);
  	var mark = markers.pop();
  	infowindow.close();
  	infowindow = new google.maps.InfoWindow({
		content : "<b>Tên: </b>" +  m_infowindow + "<br>"
				+ "<b>Tọa độ:</b> <br>" + m_position,
		maxWidth : 200
	});
	//google.maps.event.addListener(mark, 'click', function() {
		infowindow.open(map,mark);
	//});
	markers.push(mark);
}

function SearchMotorRoute() {
    // Clear any previous route boxes from the map
	
	clearBoxes();
    deleteOverlays();
	clearMarkers();
	//marker.setMap(null);
   
    // Convert the distance to box around the route from miles to km
    //distance = parseFloat(document.getElementById("distance").value) * 1.609344;
   var selectedMode = document.getElementById("Phuongtiendi").value;
   //alert(selectedMode);
    var request = {
      origin: document.getElementById("searchPathFrom").value,
      destination: document.getElementById("searchPathTo").value,
      //travelMode: google.maps.DirectionsTravelMode.DRIVING
      travelMode: google.maps.TravelMode[selectedMode]
    	//language:
    };
    markerTo.setMap(null);
    
    markerFrom.setMap(null);
    // Make the directions request
    directionService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsRenderer.setDirections(result);
        
        // Box around the overview path of the first route
        pathroutebox = result.routes[0].overview_path;
        
      }
      
        else {
        alert("Directions query failed: " + status);
      }
      

    });
  }

function SearchPlaceMotorRoute() {
    distance=0.02;
    var boxes = routeBoxer.box(pathroutebox, distance);
    
    //drawBoxes(boxes);
    
    
    
   for (var i = 0; i < boxes.length; i++) {
  		var bounds = boxes[i];
  		var request2 = {
           bounds: bounds,
  		  name: ['hotel']
          };
		
    infowindow = new google.maps.InfoWindow();
    
    var service = new google.maps.places.PlacesService(map);  
    service.search(request2, callback);
   }
}
function drawBoxes(boxes) {
    	
        boxpolys = new Array(boxes.length);
        for (var i = 0; i < boxes.length; i++) {
          boxpolys[i] = new google.maps.Rectangle({
            bounds: boxes[i],
            fillOpacity: 0,
            strokeOpacity: 1.0,
            strokeColor: '#000000',
            strokeWeight: 1,
            map: map
          });
         
        }
}

function shrinkMap2()
{
	$(".LeftPanel").show();
	$(".splExpand").show();
	
	//$(".HideLeftPanel").addClass("ShowLeftPanel");
	//$(".mainmap").css("width","10px");
	document.getElementById('mainmap').style.width="73%";
	google.maps.event.trigger(map, 'resize');
	map.setZoom( map.getZoom() );
	//checkResize();
	

} 
// Search place google maps
function EnterPlace(e) {
    if (e.keyCode == 13) {
    	initialize(10.8230989, 106.6296638, 'User', '', false);
    	
        return false;
    }
}

function searchplace()
{
	var bounds = new google.maps.LatLngBounds(
		new google.maps.LatLng(10.906133,106.411972),
		new google.maps.LatLng(10.398676,107.146683));
	var input = document.getElementById('searchPlaceField');
	var options = {
		bounds: bounds
	};
	var autocomplete = new google.maps.places.Autocomplete(input, options);
	
	autocomplete.bindTo('bounds', map);
	infowindow = new google.maps.InfoWindow();
	
	deleteOverlays();
	
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();
        markerSearch = new google.maps.Marker({
    		map: map
    	});
        deleteOverlays();
        shrinkMap2();
        document.getElementById("searchtabdiv").style.display="none";
        document.getElementById("mymaptabdiv").style.display="block";
        document.getElementById("findpathtabdiv").style.display="none";
        
        
        placeSearch = autocomplete.getPlace();
        var image = 'http://localhost/businfo/public/img/Skins/star_32.png';
        AddMarkerPlace(placeSearch,markerSearch,image);
        document.getElementById("SearchPlaceMenu").style.display="block";
        document.getElementById("ResultSearchPlace").style.display="block";
        document.getElementById("SearchPlaceDetail").style.display="none";
        document.getElementById("SearchPlaceBusStop").style.display="none";
        document.getElementById("SearchPlaceBusRoute").style.display="none";
        document.getElementById("SearchPlaceAround").style.display="none";
        document.getElementById("SearchBusPlaceResult").style.display="none";
        document.getElementById("SearchPlaceArroundResult").style.display="none";
        
        document.getElementById("SearchPlaceDetail").style.display="block";
        document.getElementById("SearchPlaceTittle").innerHTML = document.getElementById("searchPlaceField").value;
        document.getElementById("SearchPlaceAddress").innerHTML = "Địa chỉ: "+placeSearch.formatted_address;
        if(placeSearch.international_phone_number)
        {
        document.getElementById("SearchPlacePhone").innerHTML = "Điện thoại: "+ placeSearch.international_phone_number;
        }
        if( placeSearch.website)
        {
        document.getElementById("SearchPlaceWebsite").innerHTML = "Website: "+ placeSearch.website;
        }
        document.getElementById("SearchPlaceLnglat").innerHTML = "Tọa độ: "+ placeSearch.geometry.location ;
      });
}
function AddMarkerPlace(place,marker,image)
{
	if (place.geometry.viewport) 
    {
    	map.fitBounds(place.geometry.viewport);
    } 
    else 
    {
    	map.setCenter(place.geometry.location);
    	map.setZoom(16);
    }
    /*
    var image = new google.maps.MarkerImage(
        place.icon,
        new google.maps.Size(71, 71),
        new google.maps.Point(0, 0),
        new google.maps.Point(17, 34),
        new google.maps.Size(35, 35));
    */
    //var image = 'http://localhost/businfo/public/img/Skins/point-1.gif';
    marker.setIcon(image);
    marker.setPosition(place.geometry.location);
    
    if (place.address_components) {
      address = [(place.address_components[0] &&
                  place.address_components[0].short_name || ''),
                 (place.address_components[1] &&
                  place.address_components[1].short_name || ''),
                 (place.address_components[2] &&
                  place.address_components[2].short_name || '')
                ].join(' ');
    }

    infowindow.setContent('<div><strong>'+ place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
    

}
function searchpath()
{
	var defaultBounds = new google.maps.LatLngBounds(
		new google.maps.LatLng(10.906133,106.411972),
		new google.maps.LatLng(10.398676,107.146683));
	var input1 = document.getElementById('searchPathFrom');
	var input2 = document.getElementById('searchPathTo');
	var options = {
		bounds: defaultBounds
	};
	var autocompleteFrom = new google.maps.places.Autocomplete(input1, options);
	var autocompleteTo = new google.maps.places.Autocomplete(input2, options);
	
	autocompleteFrom.bindTo('bounds', map);
	autocompleteTo.bindTo('bounds', map);
	infowindow = new google.maps.InfoWindow();
	
	
	google.maps.event.addListener(autocompleteFrom, 'place_changed', function() {
        infowindow.close();
        markerFrom = new google.maps.Marker({
    		map: map
    	});
        placeFrom = autocompleteFrom.getPlace();
        var image = 'http://localhost/businfo/public/img/Skins/icon_greenA.png';
        AddMarkerPlace(placeFrom,markerFrom,image);
        
        //markersArray.push(markerFrom);
        
     });
	google.maps.event.addListener(autocompleteTo, 'place_changed', function() {
        infowindow.close();
        markerTo = new google.maps.Marker({
    		map: map
    	});
        placeTo = autocompleteTo.getPlace();
        var image = 'http://localhost/businfo/public/img/Skins/icon_greenB.png';
        AddMarkerPlace(placeTo,markerTo,image);
       
        //markersArray.push(markerTo);
        
     });
}

function SearchPOIArroundRoute()
{
	document.getElementById("SearchPlaceArroundBusResult").style.display="block";
	distance=document.getElementById("RadiusSearchPlaceAroundBus").value/1000;
	//alert(distance);
	deleteOverlays();
	clearMarkersArray();
	newHTML="";
	markersArray=new Array();
	countplace=0;
	count=1;
	//alert(routesArray.length);
	for (var route =0; route <(routesArray.length); route++)
	{
		//alert(route);
		routes= routesArray[route];
		var boxes = routeBoxer.box(routes[0].overview_path, distance);
	    
		for (var i = 0; i < boxes.length; i++)
		{
			var bounds = boxes[i];
			var request2 = {
				bounds: bounds,
				name: document.getElementById("ServiceSearchPlaceAroundBus").value
				};
			var service = new google.maps.places.PlacesService(map);
			service.search(request2, CountResultPOIPlaceArroundBus);
		}
		//alert(countplace);
	}

	newHTML="<div id=\"ResultSearchBusStop\"><span class=\"countPlace\">"+
	"<table id=\"ResultTableBusStop\" width=\"295px\">"+
	"<tr><td><b>Kết quả tìm:</b></td></tr></table></span></div>";

	if(countplace==0)
	{
		newHTML = newHTML +"<div id=\"fblnk\" style=\"\">"+
		"<div id=\"SearchPlaceArroundPlaceResult\" class=\"kohailong\">"+ 
		"<ul><li id=\"SearchBusStopResult-1\">Không tìm thấy địa điểm nào phù hợp với điều kiện tìm kiếm</li>"+
		"</ul></div></div>";
		document.getElementById('SearchPlaceArroundBusResult').innerHTML = newHTML;	
	}
	else
	{
		for (var route =0; route <(routesArray.length); route++)
		{
			
			routes= routesArray[route];
			var boxes = routeBoxer.box(routes[0].overview_path, distance);
		    
			for (var i = 0; i < boxes.length; i++)
			{
				var bounds = boxes[i];
				var request2 = {
					bounds: bounds,
					name: document.getElementById("ServiceSearchPlaceAroundBus").value
					};
				var service = new google.maps.places.PlacesService(map);
				service.search(request2, callbackPOIPlaceArroundBus);
			}
			//alert(countplace);
		}
	}
	
}

function SearchPOIArroundPlace()
{	
	document.getElementById("SearchPlaceArroundResult").style.display="block";
	var request = {
		location:  placeSearch.geometry.location ,
		    radius: document.getElementById("RadiusSearchPlaceAround").value,
		    name: document.getElementById("ServiceSearchPlaceAround").value
		  };
	deleteOverlays();
	clearMarkersArray();
	newHTML="";
	markersArray=new Array();
	var service = new google.maps.places.PlacesService(map);
		  service.search(request, callbackPOIPlace);
		  
}

function CountResultPOIPlaceArroundBus(results,status)
{
	countplace=countplace + results.length;
}
function callbackPOIPlaceArroundBus(results, status) {
	
	if (status == google.maps.places.PlacesServiceStatus.OK) {

		
		for (var i = 0; i < results.length; i++) 
		{
			createMarkerPOIPlace(results[i],count,countplace);
		}
		
	}
	
}

function callbackPOIPlace(results, status) {
	if (results.length==0)
		{
		newHTML="<div id=\"fblnk\" style=\"\">"+
		"<div id=\"SearchPlaceArroundPlaceResult\" class=\"kohailong\">"+ 
		"<ul><li id=\"SearchBusStopResult-1\">Không tìm thấy địa điểm nào phù hợp với điều kiện tìm kiếm</li>"+
		"</ul></div></div>";
		//alert(newHTML);
		}
	
	if (status == google.maps.places.PlacesServiceStatus.OK) {
		/*newHTML ="<div id=\"fblnk\" style=\" \">"+
		"<div id=\"SearchPlaceArroundResultDetail\" class=\"kohailong\">"+
		"<ul>";*/
		newHTML="<div id=\"ResultSearchBusStop\"><span class=\"countPlace\">"+
				"<table id=\"ResultTableBusStop\" width=\"295px\">"+
				"<tr><td><b>Kết quả tìm:</b></td></tr></table></span></div>";
		var count= results.length;
		for (var i = 0; i < results.length; i++) 
		{
			createMarkerPOIPlace(results[i],i+1,count);
		}
	}
	document.getElementById('SearchPlaceArroundResult').innerHTML = newHTML;
}
function createMarkerPOIPlace(place,i,countplace) {
    var placeLoc = place.geometry.location;
    var countexist=0;
    for (var j = 0; j < markersArray.length; j++)
    {
    	if (placeLoc.lat() === markersArray[j].position.lat() && placeLoc.lng() === markersArray[j].position.lng())
    		{
    		countexist++;
    		return;
    		}
    }
    if(countexist==0)
    	{
    	
    	//alert(count);
    	  var image = 'http://localhost/businfo/public/img/Skins/icon_red.png';
    var marker = new google.maps.Marker({
      map: map,
      position: place.geometry.location
    });
    marker.setIcon(image);
    markersArray.push(marker);
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
        map.setZoom(16);
        map.setcenter(marker.getPosition());
        
      });
    newHTML= newHTML +
    		"<div class=\"Spacer\"></div>"+
    		"<div id=\"SearchPlaceArroundResult"+i+"\" class=\"resultItem\" style=\"height: 30px; width: 305px;\">"+
    		"<div id=\"SearchPlaceArroundResultDetail\">"+
			"<div class=\"pin1-10 btns large red\"><a>"+i+"</a></div>"+
			"<a class=\"resultTitle\" style=\"width: 255px;\" rel=\""+place.geometry.location +";"+place.name +
			"<br> <b>Địa chỉ: </b>"+ place.formatted_address +
			"<br> <b>Điện thoại: </b>"+ place.formatted_phone_number +
			"\" onclick=\"makePlaceArroundActive("+countplace+","+count+")\" target=\"_self\">"+
			"<span>"+ place.name+ "</span></a>"+
			"<div class=\"Spacer\"></div></div></div>";
    count= count+1;
    	}
    document.getElementById('SearchPlaceArroundBusResult').innerHTML = newHTML;	
  }

function callback(results, status) {
	if (status == google.maps.places.PlacesServiceStatus.OK) {
    	/*newHTML ="<div id=\"fblnk\" style=\" \">"+
		"<div id=\"SearchPlaceArroundResultDetail\" class=\"kohailong\">"+
		"<ul>";*/
		
      for (var i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
      /*newHTML=newHTML + "</ul></div></div>";
      //alert(newHTML);
      document.getElementById('SearchPlaceArroundResult').innerHTML = newHTML;*/  
    }
  }
function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
      map: map,
      position: place.geometry.location
    });
    markersArray.push(marker);
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
      });
/*
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.setContent(place.name,place.types);
      infowindow.open(map, this);
    });*/
    /*var mark = markersArray.pop();
    infowindow.close();
  	infowindow = new google.maps.InfoWindow({
		content : "<b>Tên: </b>" +  place.name + "<br>"
				+ "<b>Địa chỉ:</b>" + place.formatted_address,
		maxWidth : 200
	});
	google.maps.event.addListener(mark, 'click', function() {
		infowindow.open(map,mark);
	});
	
	markersArray.push(mark);*/
    /*
    newHTML = newHTML + 
    		"<li id=\"SearchArroundResult>\">"+
			"<a href=\"#\" rel=\""+place.geometry.location +";"+place.name +
			"<br> <b>Địa chỉ: </b>"+ place.formatted_address +
			"<br> <b>Điện thoại: </b>"+ place.formatted_phone_number +
			"\" target=\"_self\"><span>"+ place.name+ "</span>"+
			"</a> </li>	<div class=\"Spacer\"></div>";
    */
    

  }

function deleteOverlays() 
{	 
	if (markers.length > 0) 
	{	
		for (i = 0; i < markers.length; i++) 
		{
			markers[i].setMap(null);
		}
		markers.length = 0;
	}
}
function clearBoxes() 
{
	if (boxpolys != null) 
	{
		for (var i = 0; i < boxpolys.length; i++) 
		{
			boxpolys[i].setMap(null);
		}
	}
	boxpolys = null;
	
}
/**
 * Locate the input shop
 */
function locate(input_lat, input_lng, input_address, center_flag) {
	// Set marker.
	var input_loc = new google.maps.LatLng(input_lat, input_lng);

	// set center for map
	if (!center_flag) map.setCenter(input_loc);
	
	try{
	marker = new google.maps.Marker({
		map : map,
		position : input_loc,
		title : input_address,
		draggable : false,
		animation : google.maps.Animation.DROP
	});

	// Create a infowindow for this marker
	infowindow = new google.maps.InfoWindow({
		content : "<b>Vĩ độ:</b><br>" + input_lat + "<br>"
				+ "<b>Kinh độ:</b><br>" + input_lng,
		maxWidth : 200
	});

	// set lat/lng hidden in HTML & zclient variable
	zclient.location.latitude = input_lat;
	zclient.location.longitude = input_lng;
	document.getElementById('bound_lat').value = input_lat;
	document.getElementById('bound_lng').value = input_lng;

	/*/ Actions depend on the module.
	if (input_module == "location") {
		// set zoom for map
		map.setZoom(16);
	} else // if (input_module == "search")
	{*/
		circle = new google.maps.Circle({
			map : map,
			strokeColor : "#FFFF00",
			strokeOpacity : 0.8,
			strokeWeight : 1,
			fillColor : "#FFFF00",
			fillOpacity : 0.25,
			center : input_loc,
			radius : 1000
		});
		
		// set zoom for map
		map.setZoom(15);
	//}

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
	}
	catch(e)
	{
		console.log("[locate] " + e.message);
	}

	// EVENT DRAGEND: Changes the value of address when user stop moving the
	// marker.
	/*
	 * google.maps.event.addListener(marker, 'dragend', function() { //update();
	 *  // Set center for circle if (input_module != "search") {
	 * circle.setCenter(marker.getPosition()); } });
	 */
}

// ========================================================================
// LOCATE A SHOP: get input value from element "address", "geo_lat",
// "geo_long""geo_address" in HTML page
// ========================================================================
/**
 * Locates the coordinate (longitude & latitude) of the address inputed by
 * users.
 */
function seeLocation(type) {
	var address;
	var loc;
	if (type == 1 || type == 3) {
		address = document.getElementById("address").value + ", TP.HCM";
	} else {// if (type == 2){
		address = document.getElementById("street").value + ", phường "
				+ document.getElementById("ward").value + ", quận "
				+ document.getElementById("dist").value + ", TP.HCM";
	}
	geocoder.geocode({
		'address' : address
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			loc = results[0].geometry.location;

			// Set marker
			marker.setPosition(loc);
			marker.setTitle(address);

			// Set center for circle
			if (type == 3) {
				circle.setCenter(marker.getPosition());
			}

			// Call function update() to update information (suggested address,
			// infowindow, circle,...).
			update();
		} else {
			alert("Geocode was not successful for the following reason: "
					+ status);
		}
	});
}

function geocodeAdd(input_address) {
	try {
		var address = input_address + ", Hồ Chí Minh, Việt Nam";
		geocoder
				.geocode(
						{
							'address' : address
						},
						function(results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								// loc = results[0].geometry.location;

								zclient.location.latitude = results[0].geometry.location
										.lat();
								zclient.location.longitude = results[0].geometry.location
										.lng();
								//console.log("[geocodeRslt] Old : " + document.getElementById('bound_lat').value + "," + document.getElementById('bound_lng').value);
								document.getElementById('bound_lat').value = zclient.location.latitude;
								document.getElementById('bound_lng').value = zclient.location.longitude;
								//console.log("[geocodeRslt] New : " + document.getElementById('bound_lat').value + "," + document.getElementById('bound_lng').value);
								locate(zclient.location.latitude, zclient.location.longitude, input_address, true);
								update();
							} else {
								console.log("[geocodeAdd] failed! " + status);
							}
						});
	} catch (e) {
		console.log("[geocodeAdd] " + e.message);
	}
}

/**
 * Update information (suggested address, infowindow, circle,...) after search
 * or dragend.
 */
function update() {
	var geo_address; // this variable will contain the suggested address.
	var lat = parseFloat(marker.getPosition().lat());
	var lng = parseFloat(marker.getPosition().lng());
	var latlng = new google.maps.LatLng(lat, lng);

	// Set center for map
	map.setCenter(marker.getPosition());

	// Shows the relative address (text) of the coordinate inputed by users.
	geocoder.geocode({
		'latLng' : latlng,
		'language' : "vi"
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			if (results[0]) {
				// set this value in textbox geo_address
				geo_address = results[0].formatted_address;
				/*var geoAddObj = document.getElementById("geo_address");
				if (geoAddObj)
					geoAddObj.value = geo_address;*/

				// set lat/lng hidden in HTML & zclient variable
				/*var geoLatObj = document.getElementById("geo_lat");
				if (geoLatObj)
					geoLatObj.value = lat;
				var geoLongObj = document.getElementById("geo_long");
				if (geoLongObj)
					geoLongObj.value = lng;*/
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

// ========================================================================
// SEARCH LIST OF STOPs
// ========================================================================

// stop_list1 for LoTrinhDi and stop_list2 for LoTrinhVe
function ClearRoute()
{
	//clearMarkers();
	//directionsDisplay.setMap(null);

	routes = new Array();
	routesVe= new Array();
	//markers = new Array();
	
	//initialize(10.8230989, 106.6296638, 'User', '', false);
	// Create new array of markers.
	//markers = new Array();
	markers_latlng = new Array();
}
function ClearAll()
{
	clearMarkers();
	directionsDisplay.setMap(null);

	routes = new Array();
	routesVe= new Array();
	markers = new Array();
	
	initialize(10.8230989, 106.6296638, 'User', '', false);
	// Create new array of markers.
	markers = new Array();
	markers_latlng = new Array();
}
function ShowLoTrinh(stop_list,lotrinh)
{
		// Add markers.
	
	processWaypoints(stop_list, lotrinh);
	
	directionsDisplay.setMap(map);
	
	//set center
	obj = stop_list[0];
	var point = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
	map.setCenter(point);
	map.setZoom(12);

}

function showStops(stop_list1, stop_list2,i) {
	if (!stop_list1) {
		// Convert JSON result to JS objects. (for testing)
		return;
		// input_json = '[{"matram":"1","tentram":"Trạm
		// 1","geo_lat":"10.7935931560974","geo_long":"106.69419521485"},'
		// + '{"matram":"3","tentram":"Trạm
		// 2","geo_lat":"10.8035931560974","geo_long":"106.70419521485"},'
		// + '{"matram":"4","tentram":"Trạm
		// 3","geo_lat":"10.8135931560974","geo_long":"106.71419521485"}]';
	} else {
		input_json = stop_list1;
	}
	shrinkMap2();
	stop_list1 = jQuery.parseJSON(input_json);
	

	// Clear all old markers.
	clearMarkers();
	// Clear old guide & direction.
	directionsDisplay.setMap(null);
	
	// Create new array of markers.
	markers = new Array();
	markers_latlng = new Array();

	// Add markers.
	ClearAll();
	var lotrinh = 1;
	//processWaypoints(stop_list2, lotrinhdi);
	ShowLoTrinh(stop_list1,lotrinh);
	ClearRoute();
	input_json = stop_list2;
	stop_list2 = jQuery.parseJSON(input_json);
	var lotrinh = 2;
	ShowLoTrinh(stop_list2,lotrinh);
	//processWaypoints(stop_list1, lotrinhdi);
	//clearMarkers();
		
	//Set center
	//alert(khoangcach);
	obj = stop_list1[i];
	var point = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
	map.setCenter(point);
	map.setZoom(12);

	markers = new Array();
	markers_latlng = new Array();
}


function showStopsAdmin(stop_list1,lotrinh,i) {
	
	if (!stop_list1) {
		
		// Convert JSON result to JS objects. (for testing)
		return;
		// input_json = '[{"matram":"1","tentram":"Trạm
		// 1","geo_lat":"10.7935931560974","geo_long":"106.69419521485"},'
		// + '{"matram":"3","tentram":"Trạm
		// 2","geo_lat":"10.8035931560974","geo_long":"106.70419521485"},'
		// + '{"matram":"4","tentram":"Trạm
		// 3","geo_lat":"10.8135931560974","geo_long":"106.71419521485"}]';
	} else {
		input_json = stop_list1;
	}
	

	stop_list1 = jQuery.parseJSON(input_json);
//	alert("long");
	
	// Clear all old markers.
	clearMarkers();
	// Clear old guide & direction.
	directionsDisplay.setMap(null);
	
	// Create new array of markers.
	markers = new Array();
	markers_latlng = new Array();
	count=0;
	khoangcach='0';
	// Add markers.
	//ClearAll();
	//var lotrinh = 1;
	//processWaypoints(stop_list2, lotrinhdi);
	ShowLoTrinh(stop_list1,lotrinh);
	//alert(khoangcach);
	obj = stop_list1[i];
	var point = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
	map.setCenter(point);
	map.setZoom(12);

	markers = new Array();
	markers_latlng = new Array();
	
	
	

}


// local search
function showStops2(stop_list) {
	if (!stop_list) {
		
		return;
		
	} else {
		input_json = stop_list;
	}
	stop_list = jQuery.parseJSON(input_json);

	// Clear all old markers.
	clearMarkers();
	// Clear old guide & direction.
	directionsDisplay.setMap(null);
	// document.getElementById("directionsPanel").innerHTML = "";

	// Set zoom for map
	// setZoom(zclient.search.distance);

	// Create new array of markers.
	markers = new Array();
	
	// Add markers.
	try {
		for ( var i = 0; i < stop_list.length; i++) {
			
			obj = stop_list[i];
			addMarker(obj,1);
		}
	} catch (e) {
		alert(e.message);
	}
	//alert("long");
}

function processWaypoints(list, lotrinhdi) {
	var i;
	
	routeArray= [];
	for (i = 0; i < list.length; i++) {
		
		obj = list[i];
		addMarker(obj,lotrinhdi);
		var point = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
		
		markers_latlng.push(point);
	}
	
	try {
		// Split waypoints into groups of 10
		for ( var idx1 = 0; idx1 < markers_latlng.length - 1; idx1 += 9) {
			
			var idx2 = Math.min(idx1 + 9, markers_latlng.length - 1);
			
			var waypts_slice = markers_latlng.slice(idx1 + 1, idx2);
			var waypts = new Array();
			
			for ( var pt = 0; pt < waypts_slice.length; pt++) {
				
				waypts.push({
					location : waypts_slice[pt],
					stopover : true
				});
				
			}
			
			var request = {
				origin : markers_latlng[idx1],
				destination : markers_latlng[idx2],
				travelMode : google.maps.DirectionsTravelMode.DRIVING,
				waypoints : waypts
			};
			
			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK)
				{
					
					parse(response, lotrinhdi);
				}
			});
			
		}
		

	} catch (e) {
		alert(e.message);
	}
}

/**
 * Add new marker into marker array.
 */
function addMarker(obj, lotrinh) {
	try {
		var coordinate = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
		//alert(obj.geo_long);
		/*
		 * var shopCatObj= shopCat[obj.CATEGORY_matram]; var imageFile=
		 * "store.png"; if(shopCatObj.icon) { imageFile=shopCatObj.icon; } var
		 * iconFile= "/public/images/cat/"+ imageFile;
		 */
		// Create a new LatLng point for the marker.
		switch (lotrinh)
		{
		case 1:
			var image = 'http://localhost/businfo/public/img/Skins/icon_blue.png';
			break;
		case 2:
			var image = 'http://localhost/businfo/public/img/Skins/icon_red.png';
			break;
		case 3:
			var image = 'http://localhost/businfo/public/img/Skins/icon_green.png';
			break;
		}
				
		var marker_child = new google.maps.Marker({
			map : map,
			position : coordinate,
			title : obj.tentram,
			draggable : false
		});
		marker_child.setIcon(image);
		obj.marker = marker_child;
		
		google.maps.event.addListener(marker_child, 'click', function() {
			// Set infowindow's content.
			infowindow_shop.setContent("<b>Trạm: " + obj.tentram + "</b");

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

			// showDirection(obj);
			// var marker_last = markers[markers.length - 1];
		});

		markers.push(marker_child);
		
	} catch (e) {
		alert(e.message);
	}
}

/**
 * Deletes all markers in the array by removing references to them.
 */
function clearMarkers() {
	if (markers) {
		var x;
		for (x = 0; x < markers.length; x++) {
			markers[x].setMap(null);
		}
		
	}
}
function clearMarkersArray() {
	if (markersArray) {
		var x;
		for (x = 0; x < markersArray.length; x++) {
			markersArray[x].setMap(null);
		}
		
	}
}
// ========================================================================
// DIRECTION
// ========================================================================
/**
 * Find the direction between 2 locations.
 */
function showDirection(obj) {
	var origin = new google.maps.LatLng(zclient.location.latitude,
			zclient.location.longitude);
	var destination = new google.maps.LatLng(obj.geo_lat, obj.geo_long);
	var request = {
		origin : origin,
		destination : destination,
		travelMode : google.maps.DirectionsTravelMode.DRIVING
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

	for ( var i = 0; i < myRoute.steps.length; i++) {
		guide += "<br>" + (i + 1) + ". " + myRoute.steps[i].instructions + " ("
				+ myRoute.steps[i].distance.text + " - "
				+ myRoute.steps[i].duration.text + ")";
	}

	document.getElementById("directionsPanel").innerHTML = guide;
}

// ========================================================================
// BUTTON CONTROLLER ON MAP
// ========================================================================
/**
 * Add Distance controller
 */
function addDistanceController() {
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
	controlDiv.style.textAlign = 'left';

	// Set CSS for the control border
	var controlUI = document.createElement('DIV');
	controlUI.style.backgroundColor = 'white';
	controlUI.style.borderStyle = 'solid';
	controlUI.style.borderWidth = '1px';
	controlUI.style.cursor = 'pointer';
	controlUI.style.textAlign = 'center';
	controlUI.className = "left";
	controlUI.title = 'Click to change searching region !';
	controlDiv.appendChild(controlUI);

	// Set CSS for the control interior
	var controlText = document.createElement('DIV');
	controlText.style.fontFamily = 'Arial,sans-serif';
	controlText.style.fontSize = '12px';
	controlText.style.paddingLeft = '4px';
	controlText.style.paddingRight = '4px';
	var unit = "km";
	if (distance < 1) {
		// distance = distance * 1000;
		unit = "m";
	}
	controlText.innerHTML = distance + ' ' + unit;
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
	var userLocation = new google.maps.LatLng(zclient.location.latitude,
			zclient.location.longitude);
	map.setCenter(userLocation);
}

/**
 * ZfindZ Client Object
 * 
 * @returns
 */
function ZClient() {
	obj = {
		location : {
			latitude : 0.0,
			longitude : 0.0
		},
		search : {
			distance : 5.0,
			keyword : ''
		},
		bound : {
			top_lat : 0.0,
			top_lng : 0.0,
			bot_lat : 0.0,
			bot_lng : 0.0
		}
	};
	return obj;
}

// ------------------------------------------------------------
// DIRECTION DISPLAY
// ------------------------------------------------------------
function parse(response, lotrinhdi) {
	try {
		if(lotrinhdi==1)
		{
			
			routes = response.routes;
			routesArray.push(routes); 
			//routesArray[0]=routes;
			//alert(routesArray.length);
			for ( var rte in routes) {
				//alert(rte);
				//if(count>10)lotrinhdi=2;
				add_leg_(routes[rte].overview_path, lotrinhdi);
				var legs = routes[rte].legs;
				//alert(legs.length);
				for(var i_leg = 0; i_leg < legs.length; i_leg++) 
				{ 
					Distance = legs[i_leg].distance.value;
					console.log(Distance + " - count : " + count);
					if (Distance != null && Distance > 0) {
						count++;
						document.getElementById("khoangcach"+count).innerHTML = Distance + " m";
						khoangcach=khoangcach + "-" + Distance;
						document.getElementById("khoangcach").value = khoangcach;
						//alert(khoangcach);
					}
					else {
						count--;
					}
				 //alert(Distance);
				  //this.overallTime += legs[leg].duration.value; }
				//alert( legs[leg].distance.value);
				}
			}
			
		}
		else
		{
			
			routesVe= response.routes;
			for ( var rte in routesVe) {
				// var legs = routes[rte].legs;
				add_leg_(routesVe[rte].overview_path, lotrinhdi);
				var legs = routesVe[rte].legs;
				//alert(legs.length);
				for(var i_leg = 0; i_leg < legs.length; i_leg++) 
				{ 
					Distance = legs[i_leg].distance.value;
					console.log(Distance + " - count : " + count);
					if (Distance != null && Distance > 0) {
						count++;
						document.getElementById("khoangcach"+count).innerHTML = Distance + " m";
						khoangcach=khoangcach + "-" + Distance;
						document.getElementById("khoangcach").value = khoangcach;
						//alert(khoangcach);
					}
					else {
						count--;
					}
				 //alert(Distance);
				  //this.overallTime += legs[leg].duration.value; }
				//alert( legs[leg].distance.value);
				}
			}
		}
		
		// Loop through all routes and append
		

		// Set zoom and center of map to fit all paths, and display directions.
		fit_route_();
		// this.create_stepbystep_(response, units);
	} catch (e) {
		console.log(e.message);
	}
};

function add_leg_(path, lotrinhdi) {
	var color;
	switch (lotrinhdi)
	{	
	case 1: 
		color = "#0000FF";
		break;
	case 2:
		color= "#D80909";
		break;
	case 3:
		color= "#8EC73F";
		break;
	}
		
	this.legs.push(new google.maps.Polyline({
		path : path,
		map : map,
		strokeColor : color,
		strokeOpacity : 1.0,
		strokeWeight : 3
	}));
};

function fit_route_() {
	// Go through all legs of route and fit plot.
	var latlngbounds = new google.maps.LatLngBounds();
	for ( var leg in legs) {
		path = legs[leg].getPath();
		
		for ( var i = 0; i < path.length; i++)
			latlngbounds.extend(path.getAt(i));
	}
	
	map.fitBounds(latlngbounds);
};