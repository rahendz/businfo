function createObject() 
{
	var request_type;
	var browser = navigator.appName;
	if(browser == "Microsoft Internet Explorer")
	{
		request_type = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		request_type = new XMLHttpRequest();
	}
	return request_type;
}


var http = createObject();
		
function SearchStopBusArroundPlace()
{
	var str = "radius=" + document.getElementById('RSearchBusStopAroundPlace').value;
	str += "&bound_lat=" + markerSearch.getPosition().lat() + "&bound_lng=" + markerSearch.getPosition().lng();
	document.getElementById("SearchPlaceBusStopResult").style.display="none";
	document.getElementById("SearchPlaceArroundResult").style.display="none";
	
	http.open('get','http://localhost/businfo/index.php/ajax/ajax_SearchStopBusArroundPlace/?'+str);
	http.onreadystatechange= SearchStopBusArroundPlaceProcess;
	http.send(null);
}
		
function SearchStopBusArroundPlaceProcess()
{
	try
	{
		if(http.readyState == 4 && http.status == 200)
		{
			result= http.responseText;
			document.getElementById("SearchPlaceBusStopResult").style.display="block";
			document.getElementById('SearchPlaceBusStopResult').innerHTML= result;
		}
	}
	catch(ex)
	{
		alert (ex.message);
	}
}

function SearchComplexRoute()
{
	var selectedMode = document.getElementById("Phuongtiendi").value;
	//selectedMode="BUS";
	if(selectedMode=="BUS")
	{
		ClearAll();
		var str = "radius=" + document.getElementById('RSearchBusRoute').value;
		//var str = "radius=500";
       	str += "&bound_lat_to=" + markerTo.getPosition().lat() + "&bound_lng_to=" + markerTo.getPosition().lng();
       	str += "&bound_lat_from=" + markerFrom.getPosition().lat() + "&bound_lng_from=" + markerFrom.getPosition().lng();
       	
       	shrinkMap2();
        document.getElementById("searchtabdiv").style.display="none";
        document.getElementById("mymaptabdiv").style.display="none";
        document.getElementById("findpathtabdiv").style.display="block";
        
       	document.getElementById("directions-panel").style.display="none";
		document.getElementById("SearchBusPlaceResult").style.display="none";
		//alert( str);
		http.open('get','http://localhost/businfo/index.php/ajax/ajax_SearchBusRoute/?'+str);
		http.onreadystatechange= SearchBusRouteProcess;
		http.send(null);
	}
	else
	{   	
		document.getElementById("directions-panel").style.display="block";
		document.getElementById('directions-panel').innerHTML= "";
		shrinkMap2();
		document.getElementById("searchtabdiv").style.display="none";
		document.getElementById("mymaptabdiv").style.display="none";
		document.getElementById("findpathtabdiv").style.display="block";
		
		document.getElementById("SearchBusPlaceResult").style.display="none";
		SearchMotorRoute();
	}
	}

function SearchBusRouteProcess()
{
	try
	{
		if(http.readyState == 4 && http.status == 200)
		{
			result= http.responseText;
			document.getElementById("directions-panel").style.display="block";
			document.getElementById('directions-panel').innerHTML= result;
		}
	}
	catch(ex)
	{
		alert (ex.message);
	}
}

function SearchBusPlace()
{
	var str = "radius=" + document.getElementById('RSearchBusPlace').value;
	str += "&bound_lat=" + markerSearch.getPosition().lat() + "&bound_lng=" + markerSearch.getPosition().lng();
	document.getElementById("SearchBusPlaceResult").style.display="none";
	http.open('get','http://localhost/businfo/index.php/ajax/ajax_SearchBusPlace/?'+str);
	http.onreadystatechange= SearchBusPlaceProcess;
	http.send(null);
}
		
function SearchBusPlaceProcess()
{
	try
	{
		if(http.readyState == 4 && http.status == 200)
		{
			result= http.responseText;
			document.getElementById("SearchBusPlaceResult").style.display="block";
			document.getElementById('SearchBusPlaceResult').innerHTML= result;
		}
	}
	catch(ex)
	{
		alert (ex.message);
	}
}
