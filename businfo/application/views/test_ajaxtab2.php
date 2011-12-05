<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Head1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="BusInfo For HCM City" name="keywords">
	<title><?php echo $title;?></title>
	
    <script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/googlemap.js"></script>
    <script type="text/javascript">
    try {
        $(document).ready(function(){initialize(<?php echo $init_lat; ?>, <?php echo $init_long; ?>, <?php echo $init_add?>, '', false);});
      	<?php echo $htmltext; ?>
    } catch (e) {
        alert (e.message);  //this executes if jQuery isn't loaded // '<php echo $php_array;?>'
    }
    </script>
    
   <script type="text/javascript">
			function callAHAH(url, pageElement, callMessage, errorMessage) 
			{ 
				document.getElementById(pageElement).innerHTML = callMessage; 
				try 
				{ 
					req = new XMLHttpRequest(); /* e.g. Firefox */ 
				} 
				catch(e) 
				{ 
					try 
					{ 
						req = new ActiveXObject("Msxml2.XMLHTTP"); /* some versions IE */ 
					} 
					catch (e) 
					{ 
						try 
						{ 
							req = new ActiveXObject("Microsoft.XMLHTTP"); /* some versions IE */ 
						} 
						catch (E) 
						{ 
							req = false; 
						} 
					} 
				} 
				req.onreadystatechange = function() 
				{
					responseAHAH(pageElement, errorMessage);
				}; 
				req.open("GET",url,true); 
				req.send(null); 
			} 

			
			function responseAHAH(pageElement, errorMessage) 
			{ 
				var output = '';
				if(req.readyState == 4) 
				{ 
					if(req.status == 200) 
					{ 
						output = req.responseText; 
						document.getElementById(pageElement).innerHTML = parseScript(output); 
					} 
					else 
					{ 
						document.getElementById(pageElement).innerHTML = errorMessage+"\n"+output; 
					} 
				} 
			}
			
			function parseScript(_source)
			{
					var source = _source;
					var scripts = new Array();
			 
					// Strip out tags
					while(source.indexOf("<script") > -1 || source.indexOf("</script") > -1) {
						var s = source.indexOf("<script");
						var s_e = source.indexOf(">", s);
						var e = source.indexOf("</script", s);
						var e_e = source.indexOf(">", e);
			 
						// Add to scripts array
						scripts.push(source.substring(s_e+1, e));
						// Strip from source
						source = source.substring(0, s) + source.substring(e_e+1);
					}
			 
					// Loop through every script collected and eval it
					for(var i=0; i<scripts.length; i++) {
						try {
							eval(scripts[i]);
						}
						catch(ex) {
							// do what you want here when a script fails
						}
					}
					// Return the cleaned source
					return source;
			}
				 
		</script>
		<script type="text/javascript"> 
			var IdClick=1;
			function HideDetailResult()
			{
				document.getElementById("DetailResult1").style.display="none";
				document.getElementById("DetailResult2").style.display="none";
			}

			function NonActiveResult()
			{
				document.getElementById("result1").className = "resultItem"; 
				document.getElementById("result2").className = "resultItem";
			}
			function makeactive(route,tab,url) 
			{
				IdClick=tab;
				NonActiveResult();
				document.getElementById("result"+tab).className = "resultItem resultItem-active"; 
				HideDetailResult();				 
				//callAHAH(url+ 'application/views/tabs2.php?route='+route, 'container', '<div style="position: absolute; top:40%; left:40%; overflow: hidden; width: 100%; height: 100%;"><img align="middle" src="http://localhost/businfo/public/img/ajax-loader.gif" /></div>', 'Error');
				
				//$(window).resize(function(){
					//$("container").css({'display':'block'});
					//$("mm-map").css({'width':'100%', 'height':'100%'});
					callAHAH('http://localhost/businfo/application/views/tabs.php', 'container', '<div style="position: absolute; top:40%; left:40%; overflow: hidden; width: 100%; height: 100%;"><img align="middle" src="http://localhost/businfo/public/img/ajax-loader.gif" /></div>', 'Error');
					//initialize(10.770023,106.685461,'Nguyễn Thị Minh Khai, Bến Nghé, Hồ Chí Minh','',false);

					//alert('Changed!');
					//});
				 
			} 
			 		 
			function makeactive2(id,route,t,url) 
			{ 
				HideDetailResult();
				if(IdClick!=id)
				{	
					makeactive(route,id,url);
				}
				else
				{
					document.getElementById("DetailResult"+id).style.display="block";
					callAHAH(url+'home/TuyenBusDetail?route='+route+'&id='+t, 'DetailResult'+id, '<table ><tr height="100px"><td width="300px" align="center"><h3 style="color:green;"><img align="middle" src="http://localhost/businfo/public/img/loading.gif" /> </br> Đang xử lý... </h3></td></tr></table>', 'Error');
				}
			} 

			
		 </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/TabMenu.js"></script>
      
    <style type="text/css">
		.DetailResult
		{
			padding-top: 80px;
			padding-left: 10px;
		}
		
	</style>
	
	<!-- Begin JavaScript -->
		<script type="text/javascript" src="javascripts/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="javascripts/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="javascripts/jquery.coda-slider-2.0.js"></script>
		 <script type="text/javascript">
			$().ready(function() {
				$('#coda-slider-1').codaSlider();
			});
		 </script>
	<!-- End JavaScript -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>public/css/MainStyle.css" media="all" />
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
							<div id="result<?php echo 1;?>" class="resultItem resultItem-active">
								<a class="icon1-10 red" onclick="makeactive(19,1,'<?php echo base_url()?>')"> <?php echo $row->matuyen; ?><span class="icon1-10Hover"></span></a>
								<a class="resultTitle" onclick="makeactive(19,1,'<?php echo base_url()?>')">
								<b><?php echo $row->tentuyen; ?></b>	</a>
								<div class="Spacer"></div>
								<ul  class="resultOptions">
									<li onclick="makeactive2(1,19,0,'<?php echo base_url()?>')">
										<a class="" id ="t19_0">X</a>
									</li>
									<li onclick="makeactive2(1,19,1,'<?php echo base_url()?>')">
										<a class="" id ="t19_1">Thông tin</a>
									</li>
									<li onclick="makeactive2(1,19,2,'<?php echo base_url()?>')">
										<a class="" id ="t19_2">Lộ trình đi</a>
									</li>
									<li onclick="makeactive2(1,19,3,'<?php echo base_url()?>')">
										<a class="" id ="t19_3">Lộ trình về</a>
									</li>
									<li onclick="makeactive2(1,19,4,'<?php echo base_url()?>')">
										<a class="" id ="t19_4">Tìm xung quanh</a>
									</li>
									<li>
										<a href="" target="_blank">Chi tiết</a>
									</li>
								</ul>
							</div>
														
							<div id="DetailResult<?php echo 1;?>" class="DetailResult" ></div>
							
	<!-- Kết quả thứ 2 -->							
							<div id="result<?php echo 2;?>" class="resultItem">
								<a class="icon1-10 red" onclick="makeactive(8,2,'<?php echo base_url()?>')"> <?php echo $row->matuyen; ?><span class="icon1-10Hover"></span></a>
								<a class="resultTitle" onclick="makeactive(8,2,'<?php echo base_url()?>')">
								<b><?php echo $row->tentuyen; ?></b>	</a>
								<div class="Spacer"></div>
								<ul  class="resultOptions">
									<li onclick="makeactive2(2,8,0,'<?php echo base_url()?>')">
										<a class="" id ="t8_0">X</a>
									</li>
									<li onclick="makeactive2(2,8,1,'<?php echo base_url()?>')">
										<a class="" id ="t8_1">Thông tin</a>
									</li>
									<li onclick="makeactive2(2,8,2,'<?php echo base_url()?>')">
										<a class="" id ="t8_2">Lộ trình đi</a>
									</li>
									<li onclick="makeactive2(2,8,3,'<?php echo base_url()?>')">
										<a class="" id ="t8_3">Lộ trình về</a>
									</li>
									<li onclick="makeactive2(2,8,4,'<?php echo base_url()?>')">
										<a class="" id ="t8_4">Tìm xung quanh</a>
									</li>
									<li>
										<a href="" target="_blank">Chi tiết</a>
									</li>
								</ul>
							</div>
							<div id="DetailResult<?php echo 2;?>" class="DetailResult"></div>
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
				
				<div id="findpathtabdiv" class="tableft" style="display: none;">
					
					<div id="topLeftPathResult" class="topLeftPanel" >
						<span id="FindPathStatus" class="FindPathStatus"></span>
						<a id="clearPathResultText" class="link clearPathResult" style="display: none" onclick="state(ClearPathResult)" title="XÃ³a káº¿t quáº£"> Xóa kết quả</a>
						
						<a id="printDirection" class="link printDirection" onclick="PrintResult()" title="In lộ trình"> In Lộ Trình</a>
						<div id="tdvehicle" class="link" style="display: none; z-index: 806;"> </div>
					</div>
					<div id="findpath_div" class="bodyLeftPanel" >
						<div id="listDirection">
							<div id="dirInputTemplate" style="display: none; z-index: 800;">
								<div id="direction$section$" class="direction-item" style="z-index: 798;">
									<div class="swrap-timduong" style="z-index: 796;">
										<span class="a-z">$order$</span>
										<input class="boxtimduong timduong-default" type="text" value="Nhập vào vị trí, địa chỉ, tọa độ..." onblur="OnblurTextBoxAB(this)" onfocus="OnforcusTextBoxAB(this)" onkeydown="return SearchPlaceEnter(event,$section$)">
										<a class="del-timduong" onclick="state(ClickRemovePlaceButton, this)" style="display: none">Xóa</a>
										<a id="btnSearchPlace$section$" class="btn-timduong" onclick="doSearchPlace($section$)">Tìm</a>
									</div>
									<div id="guide$section$" class="direction-guide" style="z-index: 794;"> </div>
								</div>
							</div>
							<div id="direction0" class="direction-item" style="z-index: 792;">
								<div class="swrap-timduong" style="z-index: 790;">
									<span class="a-z">a</span>
									<input class="boxtimduong timduong-default" type="text" value="Nhập vào vị trí, địa chỉ, tọa độ..." onblur="OnblurTextBoxAB(this)" onfocus="OnforcusTextBoxAB(this)" onkeydown="return SearchPlaceEnter(event,0)">
									<a class="del-timduong" onclick="state(ClickRemovePlaceButton, this)" style="display: none">Xóa</a>
									<a id="btnSearchPlace0" class="btn-timduong" onclick="doSearchPlace(0)">Tìm</a>
								</div>
								<div id="guide0" class="direction-guide" style="z-index: 788;"> </div>
							</div>
							<div id="direction1" class="direction-item" style="z-index: 786;">
								<div class="swrap-timduong" style="z-index: 784;">
									<span class="a-z">b</span>
									<input class="boxtimduong timduong-default" type="text" value="Nhập vào vị trí, địa chỉ, tọa độ..." onblur="OnblurTextBoxAB(this)" onfocus="OnforcusTextBoxAB(this)" onkeydown="return SearchPlaceEnter(event,1)">
									<a class="del-timduong" onclick="state(ClickRemovePlaceButton, this)" style="display: none">Xóa</a>
									<a id="btnSearchPlace1" class="btn-timduong" onclick="doSearchPlace(1)">Tìm</a>
								</div>
								<div id="guide1" class="direction-guide" style="z-index: 782;"> </div>
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
