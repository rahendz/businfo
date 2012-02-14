function shrinkMap()
{
	$(".LeftPanel").show();
	$(".splExpand").show();
		
	//$(".HideLeftPanel").addClass("ShowLeftPanel");
	//$(".mainmap").css("width","10px");
	document.getElementById('mainmap').style.width="74%";
	google.maps.event.trigger(map, 'resize');
	map.setZoom( map.getZoom() );
	//checkResize();
} 

function TabMenuClick(id)
{
	switch (id)
	{
	case 1:
		document.getElementById("divBus").style.display="block";
		document.getElementById("divPlace").style.display="none";
		document.getElementById("divRoute").style.display="none";
		document.getElementById("divBus").className = "";
		document.getElementById("divPlace").className = "hide";
		document.getElementById("divRoute").className = "hide";
		document.getElementById("aTabBus").className = "active";
		document.getElementById("aTabPlace").className = "";
		document.getElementById("aTabRoute").className = "";
		initialize(10.8230989, 106.6296638, 'User', '', false);
		break;
	case 2:
		document.getElementById("divBus").style.display="none";
		document.getElementById("divPlace").style.display="block";
		document.getElementById("divRoute").style.display="none";
		document.getElementById("divBus").className = "hide";
		document.getElementById("divPlace").className = "";
		document.getElementById("divRoute").className = "hide";
		document.getElementById("aTabBus").className = "";
		document.getElementById("aTabPlace").className = "active";
		document.getElementById("aTabRoute").className = "";
		initialize(10.8230989, 106.6296638, 'User', '', false);
		break;
	case 3:
		document.getElementById("divBus").style.display="none";
		document.getElementById("divPlace").style.display="none";
		document.getElementById("divRoute").style.display="block";
		document.getElementById("divBus").className = "hide";
		document.getElementById("divPlace").className = "hide";
		document.getElementById("divRoute").className = "";
		document.getElementById("aTabBus").className = "";
		document.getElementById("aTabPlace").className = "";
		document.getElementById("aTabRoute").className = "active";
		initialize(10.8230989, 106.6296638, 'User', '', false);
		break;
	}
}

var IdClick=1;

function HideDetailResult(count)
{
	for(i=0;i<count;i++)
	{
		document.getElementById("DetailResult"+i).style.display="none";
	}
}

function NonActiveResult(count)
{			
	for(i=0;i<count;i++)
	{
		document.getElementById("result"+i).className = "resultItem";
	}
	//document.getElementById("result1").className = "resultItem"; 
	//document.getElementById("result2").className = "resultItem";
}

function makeactive(route,count,tab,url) 
{	
	NonActiveResult(count);
	HideDetailResult(count);
	document.getElementById("result"+tab).className = "resultItem resultItem-active";
	IdClick=tab;
				 
	//callAHAH(url+ 'application/views/tabs2.php?route='+route, 'container', '<div style="position: absolute; top:40%; left:40%; overflow: hidden; width: 100%; height: 100%;"><img align="middle" src="http://localhost/businfo/public/img/ajax-loader.gif" /></div>', 'Error');
	//$(window).resize(function(){
	//$("container").css({'display':'block'});
	//$("mm-map").css({'width':'100%', 'height':'100%'});
	//callAHAH('http://localhost/businfo/application/views/tabs.php', 'container', '<div style="position: absolute; top:40%; left:40%; overflow: hidden; width: 100%; height: 100%;"><img align="middle" src="http://localhost/businfo/public/img/ajax-loader.gif" /></div>', 'Error');
	//initialize(10.770023,106.685461,'Nguyễn Thị Minh Khai, Bến Nghé, Hồ Chí Minh','',false);
	//alert('Changed!');
	//});
} 
function makeBusStopActive(count,tab)
{
	
	for(i=1;i<=count;i++)
	{
		document.getElementById("SearchBusStopResult"+i).className = "resultItem";
	}
	
	document.getElementById("SearchBusStopResult"+tab).className = "resultItem resultItem-active";
}

function makePlaceArroundActive(count,tab)
{
	
	
	for(i=1;i<=count;i++)
	{
		if(i==tab)
			document.getElementById("SearchPlaceArroundResult"+tab).className = "resultItem resultItem-active";
		else
			document.getElementById("SearchPlaceArroundResult"+i).className = "resultItem";
	}
	
	
}

function makeRouteBusActive(count,tab)
{
	
	//CloseDirection();
	for(i=1;i<count;i++)
	{
		if(i==tab)
			document.getElementById("result"+tab).className = "resultItem resultItem-active";
		else
			document.getElementById("result"+i).className = "resultItem";
	}
	
	
}

function makeactivemenu(id,route,count,t,url) 
{ 
	if (count >1)
	HideDetailResult(count);
	if( id ==-1)
	{
		document.getElementById("DetailResult"+id).style.display="block";
		callAHAH(url+'home/TuyenBusDetail?route='+route+'&id='+t, 'DetailResult'+id, '<table ><tr height="100px"><td width="300px" align="center"><h3 style="color:green;"><img align="middle" src="http://localhost/businfo/public/img/loading.gif" /> </br> Đang xử lý... </h3></td></tr></table>', 'Error');
	}
	else
	{
		if(IdClick!=id)
		{	
			makeactive(route,count,id,url);
		}
		else
		{
			document.getElementById("DetailResult"+id).style.display="block";
			callAHAH(url+'home/TuyenBusDetail?route='+route+'&id='+t, 'DetailResult'+id, '<table ><tr height="100px"><td width="300px" align="center"><h3 style="color:green;"><img align="middle" src="http://localhost/businfo/public/img/loading.gif" /> </br> Đang xử lý... </h3></td></tr></table>', 'Error');
		}
	}	
} 

function SearchPlaceMenu(id)
{
	switch (id)
	{
	case 1:
		document.getElementById("SearchPlaceBusStop").style.display="none";
		document.getElementById("SearchPlaceBusStopResult").style.display="none";
		document.getElementById("SearchPlaceBusRoute").style.display="none";
		document.getElementById("SearchBusPlaceResult").style.display="none";
		document.getElementById("SearchPlaceAround").style.display="none";
		document.getElementById("SearchPlaceDetail").style.display="block";
		break;	
	case 2:
		document.getElementById("SearchPlaceDetail").style.display="none";
		document.getElementById("SearchPlaceBusStop").style.display="block";
		document.getElementById("SearchPlaceBusRoute").style.display="none";
		document.getElementById("SearchBusPlaceResult").style.display="none";
		document.getElementById("SearchPlaceAround").style.display="none";
		break;
	case 3:
		document.getElementById("SearchPlaceDetail").style.display="none";
		document.getElementById("SearchPlaceBusStop").style.display="none";
		document.getElementById("SearchPlaceBusStopResult").style.display="none";
		document.getElementById("SearchPlaceBusRoute").style.display="block";
		document.getElementById("SearchPlaceAround").style.display="none";
		break;
	case 4:
		document.getElementById("SearchPlaceDetail").style.display="none";
		document.getElementById("SearchPlaceBusStop").style.display="none";
		document.getElementById("SearchPlaceBusStopResult").style.display="none";
		document.getElementById("SearchPlaceBusRoute").style.display="none";
		document.getElementById("SearchBusPlaceResult").style.display="none";
		document.getElementById("SearchPlaceAround").style.display="block";
		break;
	}
}

function DelResultSearchPlace()
{
	document.getElementById("listDirection").style.display="block";
	document.getElementById("directionSearchPlace").style.display="block";
	document.getElementById("searchPlaceField").value="Nhập vào vị trí, địa chỉ, tọa độ...";
	document.getElementById("ResultSearchPlace").style.display="none";
	document.getElementById("SearchPlaceMenu").style.display="none";
	document.getElementById("SearchPlaceDetail").style.display="none";
	document.getElementById("SearchPlaceBusStop").style.display="none";
	document.getElementById("SearchPlaceBusStopResult").style.display="none";
	document.getElementById("SearchPlaceBusRoute").style.display="none";
	document.getElementById("SearchBusPlaceResult").style.display="none";
	document.getElementById("SearchPlaceAround").style.display="none";
	document.getElementById("SearchPlaceArroundResult").style.display="none"
}