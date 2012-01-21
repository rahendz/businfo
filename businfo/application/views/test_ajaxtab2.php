<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Head1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="BusInfo For HCM City" name="keywords">
	<title><?php echo $title;?></title>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>public/css/MainStyle.css" media="all" />
	
    <script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=ja"></script>
     <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=true&libraries=places&language=vi"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi?key={APIKEY}"></script>
	<script type="text/javascript">
			google.load("jquery", "1.4.2");	  
	</script>
		 <style type="text/css">
      #directions-panel {
        height: 60%;
        float: right;
        width: 390px;
        overflow: auto;
      }
        #directions-panel {
          float: none;
          width: auto;
        }
      }
    </style>
		
		
		
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/googlemap.js"></script>
    <script type="text/javascript">
    try {
        $(document).ready(function(){
            initialize(<?php echo $init_lat; ?>, <?php echo $init_long; ?>, <?php echo $init_add?>, '', false);
            handle_clicks();
        });
      	<?php echo $htmltext; ?>
    } catch (e) {
        alert (e.message);  //this executes if jQuery isn't loaded // '<php echo $php_array;?>'
    }
    </script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/TabResults.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/RouteBox.js"></script>
		
	<script language="javascript">
		function createObject() {
		var request_type;
		var browser = navigator.appName;
		if(browser == "Microsoft Internet Explorer"){
		request_type = new ActiveXObject("Microsoft.XMLHTTP");
		}else{
		request_type = new XMLHttpRequest();
		}
		return request_type;
		}
		var http = createObject();
		
		function SearchStopBusArroundPlace()
		{
	    	var str = document.getElementById('RSearchBusStopAroundPlace').value;
	    	document.getElementById("SearchPlaceBusStopResult").style.display="none";
			http.open('get','http://localhost/businfo/index.php/ajax/ajax_SearchStopBusArroundPlace/'+str);
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
			if(selectedMode=="BUS")
			{
				//var str = document.getElementById('RSearchBusPlace').value;
		    	document.getElementById("directions-panel").style.display="none";
		    	document.getElementById("SearchBusPlaceResult").style.display="none";
		    	
				http.open('get','http://localhost/businfo/index.php/ajax/ajax_SearchBusRoute/'+1);
				http.onreadystatechange= SearchBusRouteProcess;
				http.send(null);
			}
			else
		    	//document.getElementById("directions-panel").style.display="none";
				document.getElementById("SearchBusPlaceResult").style.display="none";
				SearchMotorRoute();
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
	    	var str = document.getElementById('RSearchBusPlace').value;
	    	document.getElementById("SearchBusPlaceResult").style.display="none";
			http.open('get','http://localhost/businfo/index.php/ajax/ajax_SearchBusPlace/'+str);
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
	</script>
		
	<script type="text/javascript"> 
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
	</script>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/TabMenu.js"></script>

	<script type="text/javascript" src="javascripts/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="javascripts/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="javascripts/jquery.coda-slider-2.0.js"></script>
	 <script type="text/javascript">
		$().ready(function() {
		$('#coda-slider-1').codaSlider();
		});
	</script>

</head>

<body class="template-5">
	<div id="WrapperClick" onclick="WrapperClick()">
		<div id="header_wrap">
			<!-- Tab main menu -->
			
			<ul id="bando_tab"">
				<li id="searchtab" class="active2" style="margin-left: 5px;">
				<a id="tloc" onclick="state(ChangeFunctionType, GLOBAL_SEARCH_FUNCTION)"> Tuyến Buýt</a>
				</li>
				<li id="mymaptab" class="">
				<a id="tpers" onclick="state(ChangeFunctionType, GLOBAL_MYMAP_FUNCTION)"> Tìm Vị Trí</a>
				</li>
				<li id="findpathtab" class="">
				<a id="tdir" onclick="state(ChangeFunctionType, GLOBAL_FINDPATH_FUNCTION)"> Tìm Lộ Trình</a>
				</li>
				<img class="tab_img_end" src="<?php echo base_url()?>public/img/Skins/tab_img_end.png" alt="">
			</ul>
			<!-- End Tab Main menu -->
			
			
			<!--Logo-->
            <div id="logo">
                <a class="logo-old" href="home"></a>
            </div>
            <!--End logo-->
            
            
            <!-- Tab Header -->
            <div id="header">
           		
           		<!--  Tab Search -->
				<div id="search">
                <form id="frmSearch" action="<?php echo base_url();?>home/search/" method="post">
	            	<div class="SLeft"></div>
	                <div class="SCenter">
	                	<div class="SBox">
	                    	<div class="SBoxLeft">
	                    	</div>
	                        <input name="mapinput" type="text" class="SText keyboardInput" id="mapinput" value="Tìm tuyến bus..." onclick="this.value = ''" />

	                        <input class="SButton" type="submit" value="Tìm" onclick="" />
                            <input type="hidden" id="mode" name="mode" value="search"/>
                            <input type="hidden" id="bound_top_lat" value=""/>
                            <input type="hidden" id="bound_top_lng" value=""/>
                            <input type="hidden" id="bound_bot_lat" value=""/>
                            <input type="hidden" id="bound_bot_lng" value=""/>
						</div>
					</div>
	                <div class="SRight"></div>
                </form>
	            </div>
	            <!--  End Tab search -->
	            
				<!--  Tab Top menu -->
				<ul id="nav">
					<li class="navitem nav-first"><a id="nmap" href="">Bản Đồ</a></li>
					<li class="navitem"><a id="napi" href="">Liên Kết</a>
						<ul class="submenu1" style="width:135px">
							<li style="padding-top:4px" class="noLava topradius"><a href="">Sở GTCC TPHCM</a></li>
							<li class="noLava"><a href="">Buýt TpHCM</a></li>
							<li style="padding-bottom:4px" class="noLava botradius"><a href="">Bến Xe</a></li>
						</ul>
					</li>
					<li class="navitem"><a id="nmob" href="">Giới Thiệu</a></li>
					<li id="HelpMenu" class="navitem"><a id="nhelp" target="_blank" href="">Hướng Dẫn Sử Dụng</a>
						<ul class="submenu2" style="width:150px">
							<li style="padding-top:4px" class="noLava topradius"><a target="_blank" href="">Tìm Tuyến Buýt</a></li>
							<li class="noLava"><a target="_blank" href="">Tìm Vị Trí</a></li>
							<li class="noLava"><a href="">Tìm Lộ Trình</a></li>
							<li class="noLava"><a target="_blank" href="">Tìm Dịch Vụ</a></li>
							<li style="padding-bottom:4px" class="noLava botradius"><a href="">Chức Năng Khác</a></li>
						</ul>
					</li>
					<li class="navitem"><a id="ncont" href="">Liên Hệ</a></li>
				</ul>
				
				<!--  End Tab Top menu -->
			</div>
			
			<!--  End Tab Header -->
	         <div id="login">
				<div id="line2">
					<a id="Signup" class="line2reg" href="">Đăng Ký</a>|
					<a id="Login" class="line2login" href="<?php echo base_url();?>home/login">Đăng Nhập</a>
				</div>
			</div>
        </div>
      
        
        <div id="content_wrap">
         
         	<div id="leftpanel" class="LeftPanel">
         	
<!-- TAB TÌM TUYẾN BUS -->         	
         		<div id="searchtabdiv" class="tableft" >
         		
				<?php
         		if ($res == "1") 
         		{ 
         			$row = $queryTuyen;
				?>
         			<div id="searchresult_div" class="bodyLeftPanel padding">
         			
         			
						<div id="TablePlace">
							<span class="countPlace">Kết quả tìm	<b>1-10</b>	trong số <b>27</b>cho tuyến buýt số</span>
							<span class="keyPlace"><b><?php echo $route?></b><span class="searchinwrap">
							<a><span onclick="LoadTree()">Xem</span></a>
							</span></span>
							
	<!-- Kết quả search theo tuyến -->
		<!-- Kết quả thứ 1 -->
							<div id="result-1" class="resultItem resultItem-active">
								<a class="icon1-10 red" onclick="makeactive(<?php echo $row->matuyen;?>,1,-1,'<?php echo base_url()?>')"> <?php echo $row->matuyen; ?><span class="icon1-10Hover"></span></a>
								<a class="resultTitle" onclick="makeactive(<?php echo $row->matuyen;?>,1,-1,'<?php echo base_url()?>')">
								<b><?php echo $row->tentuyen; ?></b>	</a>
								<div class="Spacer"></div>
								<ul  class="resultOptions">
									<li onclick="makeactivemenu(-1,<?php echo $row->matuyen;?>,1,0,'<?php echo base_url()?>')">
										<a class="" id ="t19_0">X</a>
									</li>
									<li onclick="makeactivemenu(-1,<?php echo $row->matuyen;?>,1,1,'<?php echo base_url()?>')">
										<a class="" id ="t19_1">Thông tin</a>
									</li>
									<li onclick="makeactivemenu(-1,<?php echo $row->matuyen;?>,1,2,'<?php echo base_url()?>')">
										<a class="" id ="t19_2">Lộ trình đi</a>
									</li>
									<li onclick="makeactivemenu(-1,<?php echo $row->matuyen;?>,1,3,'<?php echo base_url()?>')">
										<a class="" id ="t19_3">Lộ trình về</a>
									</li>
									<li onclick="makeactivemenu(-1,<?php echo $row->matuyen;?>,1,4,'<?php echo base_url()?>')">
										<a class="" id ="t19_4">Tìm xung quanh</a>
									</li>
									<li>
										<a href="" target="_blank">Chi tiết</a>
									</li>
								</ul>
							</div>
														
							<div id="DetailResult-1" class="DetailResult" ></div>
												
						</div>
						
						<div class="kohailong"  > 
							<div id="fblnk" style="">
								<p>Bạn không hài lòng về kết quả tìm kiếm</p>
									<ul>
										<li>
											<a onclick="Global.ShowFeedBackForm()">Gửi ý kiến của bạn</a>
										</li>
										<li>
											<a onclick="loadAddPlaceFunc()">Thêm vị trí vào bản đồ.</a>
										</li>
									</ul>
							</div>
							<div id="fbForm" class="jForm" style="display: none" >
								<p>Gửi phản hồi</p>
								<span id="fberror" class="typevnmese">*Bạn vui lòng gõ tiếng Việt có dấu</span>
								<div>
									<label for="fbName">Họ tên</label>
									<input id="fbName" type="text" style="width:220px" name="fbName">
								</div>
								<div>
									<label for="fbEmail">Email:</label>
									<input id="fbEmail" type="text" style="width:220px" name="fbEmail">
								</div>
								<span>Ý kiến của bạn</span>
								<textarea id="fbContent" name="fbContent" cols="40" rows="6"></textarea>
								<a class="submit_wrap" onclick="Global.SendFeedBack('Ä‘h cntt |')">
									<span class="submit">Gửi phản hồi</span>
								</a>
								<a class="cancel_wrap" onclick="Global.HideFeedBackForm()">
									<span class="cancel">Hủy</span>
								</a>
							</div>
						</div>
						
						<ul class="resultPage" >
							<li><span>« Đầu</span></li>
							<li><span class="active_page">1</span></li>
							<li><a>Cuối »</a></li>
						</ul>
						
					</div>
					<?php
         			} 
					?>
				</div>
								
<!-- TAB TÌM VỊ TRÍ -->				
				<div id="mymaptabdiv" class="tableft" style="display: none;">
					
					<div id="findplace_div" class="bodyLeftPanel" >
						
						<div class="Spacer"></div>
						<div id="listDirection">
							<div id="direction0" class="direction-item">
								<div class="swrap-timduong">
									<span class="a-z">a</span>
									<input class="boxtimduong timduong-default" id="searchPlaceField" type="text" value="Nhập vào vị trí, địa chỉ, tọa độ..." onclick="this.value = ''">
									<a id="btnSearchPlace0" class="btn-timduong" onclick="">Tìm</a>
								</div>
							</div>
						</div>
						
						<div id="ResultSearchPlace" class="resultItem resultItem-active" style="display: none;">
							<a class="icon1-10 red"> <span class="icon1-10Hover"></span></a>
							<a class="resultTitle">
								<b id="SearchPlaceTittle"></b>	</a>
							<div class="Spacer"></div>
							<ul id="SearchPlaceMenu" class="resultOptions" style="display: none; padding: 4px 12px;">
								<li>
									<a onclick="SearchPlaceMenu(1)">Thông tin</a>
								</li>
								<li>
									<a onclick="SearchPlaceMenu(2)">Tìm trạm buýt</a>
								</li>
								<li>
									<a onclick="SearchPlaceMenu(3)">Tìm tuyến buýt</a>
								</li>
								<li>
									<a  onclick="SearchPlaceMenu(4)">Tìm dịch vụ</a>
								</li>
							</ul>
						</div>
							<div class="Spacer"></div>
							<div id="SearchPlaceDetail" class="kohailong" style="display: none;"  > 
								<div id="fblnk" style="">
									<p>Thông tin địa điểm</p>
									<ul>
										<li id="SearchPlaceAddress" ></li>
										<li id="SearchPlacePhone"></li>
										<li id="SearchPlaceWebsite"></li>
										<li id="SearchPlaceLnglat"></li>
									</ul>
								</div>
							</div>
							<div id="SearchPlaceBusStop" class="kohailong" style="display: none; width:350px"  > 
								<div id="fblnk" style="">
									<p>Tìm trạm buýt xung quanh</p>
									<ul>
										<li>
											<div id="direction1" class="direction-item">
												<span>Bán kính:</span>
												<input id="RSearchBusStopAroundPlace" name="RSearchBusStopAroundPlace" class="boxtimduong timduong-default" type="text" value="500" style="top:0px; width: 150px;">
												<span class="keyPlace" style="width:40px; padding: 0 100px 8px;"><span class="searchinwrap">
													<a><span onclick="SearchStopBusArroundPlace()">Tìm</span></a>
												</span></span>
											</div>								
										</li>
									</ul>
								</div>
								<div id="SearchPlaceBusStopResult" ></div>
							</div>
							<div id="SearchPlaceBusRoute" class="kohailong" style="display: none;"  > 
								<div id="fblnk" style="">
									<p>Tìm tuyến buýt xung quanh</p>
									<ul>
										<li>
											<div id="direction1" class="direction-item">
												<span>Bán kính:</span>
												<input id="RSearchBusPlace" name="RSearchBusPlace" class="boxtimduong timduong-default" type="text" value="500" style="top:0px; width: 150px;">
												<span class="keyPlace" style="width:40px; padding: 0 100px 8px;"><span class="searchinwrap">
													<a><span onclick="SearchBusPlace()">Tìm</span></a>
												</span></span>
											</div>
										</li>
									</ul>
								</div>
															
							</div>
							<div id="SearchBusPlaceResult" ></div>
							<div id="SearchPlaceAround" class="kohailong" style="display: none;"  > 
								<div id="fblnk" style="">
									<p>Tìm dịch vụ xung quanh</p>
									<ul>
										<li style="padding: 0 30px 5px;">
											<div class="direction-item">
												<span>Dịch vụ:</span>
												<input class="boxtimduong" id="ServiceSearchPlaceAround" type="text" value="Nhập vào loại dịch vụ (KFC,Hotel...)" style="top:0px; width: 120px;">
											</div>
										</li>
										<div class="Spacer"></div>
										<li>
											<div class="direction-item">
												<span>Bán kính (m):</span>
												<input class="boxtimduong" id="RadiusSearchPlaceAround" type="text" value="500" style="top:0px; width: 120px;" >
												<span class="keyPlace" style="width:40px; padding: 0 100px 8px;"><span class="searchinwrap">
													<a><span onclick="SearchPOIArroundPlace()">Tìm</span></a>
												</span></span>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div id="SearchPlaceArroundResult" ></div>
					</div>
				</div>
					
				
<!-- TAB TÌM LỘ TRÌNH -->				
				<div id="findpathtabdiv" class="tableft" style="display: none;">
					<!-- 
					<div id="topLeftPathResult" class="topLeftPanel" >
						<span id="FindPathStatus" class="FindPathStatus"></span>
						<a id="clearPathResultText" class="link clearPathResult" style="display: none" onclick="state(ClearPathResult)" title="XÃ³a káº¿t quáº£"> Xóa kết quả</a>
						
						<a id="printDirection" class="link printDirection" onclick="PrintResult()" title="In lộ trình"> In Lộ Trình</a>
						<div id="tdvehicle" class="link" style="display: none; z-index: 806;"> </div>
					</div>
					 -->
					<div id="findpath_div" class="bodyLeftPanel" >
						<div id="listDirection">
							
							<div id="direction0" class="direction-item">
								<div class="swrap-timduong">
									<span class="a-z">a</span>
									<input class="boxtimduong timduong-default" id="searchPathFrom" type="text" value="Nhập vào vị trí, địa chỉ, tọa độ..." onclick="this.value = ''">
									<a id="btnSearchPlace0" class="btn-timduong" onclick="">Tìm</a>
								</div>
							</div>
							<div id="direction0" class="direction-item">
								<div class="swrap-timduong">
									<span class="a-z">b</span>
									<input class="boxtimduong timduong-default" id="searchPathTo" type="text" value="Nhập vào vị trí, địa chỉ, tọa độ..." onclick="this.value = ''">
									<a id="btnSearchPlace0" class="btn-timduong" onclick="">Tìm</a>
								</div>
							</div>
							<span class="keyPlace" style="width:40px; padding: 0 100px 8px;"><span class="searchinwrap">
													<a><span onclick="SearchComplexRoute()">Tìm</span></a>
												</span></span>
						</div>
						
<div id="directions-panel"></div>
						<div id="directionoptions">
						<div>
<strong>Phương tiện di chuyển: </strong>
<select id="Phuongtiendi" onchange="SearchComplexRoute()">
  <option selected="selected" value="BUS">Xe buýt</option>
  <option value="DRIVING">Xe hơi</option>
  <option value="WALKING">Xe máy</option>
  <option value="BICYCLING">Xe máy</option>
</select>
<a onclick="SearchPlaceMotorRoute()">Tìm dịch vụ</a>
</div>
                        <div class="directionoptions">
                            
                            <ul class="phuongtiendichuyen">

                                <li><a title="Đi bộ" class="pedestrian">
                                    Đi bộ</a></li>
                                <li><a title="Xe máy" class="motor">
                                    Xe máy</a></li>
                                <li><a title="Ô tô" class="car car-enable">
                                    Ô tô</a></li>
                                <li><a title="Xe tải" class="lorry">

                                    Xe tải</a></li>
                                
                            </ul>
                        </div>
                     
                    </div>
						
					</div>
				</div>
			</div>
			
			<div id="centerSplit" class="splExpand" >
				<div class="topsp1Expand"> </div>
				<div class="botsp1Expand"> </div>
				<!-- <a id="moveicon" class="moveicon" onclick="moveIconClick()" ></a>
				-->
			</div>
			
			<div id="container" class="mainmap">
				<div id="mm-map" class="" style="position: absolute; overflow: hidden; left: 0pt; top: 0pt; width: 100%; height: 100%;"></div>
			</div>
			
			
		</div>
           
             
                   
	
	</div>

</body>
</html>
