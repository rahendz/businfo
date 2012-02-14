<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Head1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="BusInfo For HCM City" name="keywords">
	<title><?php echo $title;?></title>
	
	<!-- CSS -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>public/css/MainStyle.css" media="all" />
	
	
	<!-- JAVASCRIPT -->
    <script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=ja"></script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=true&libraries=places&language=vi"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi?key={APIKEY}"></script>
	<script type="text/javascript">	google.load("jquery", "1.4.2");	</script>
				
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/googlemap.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/TabResults.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/RouteBox.js"></script>
    
    <script type="text/javascript">
    try {
        $(document).ready(function(){
            initialize(<?php echo $init_lat; ?>, <?php echo $init_long; ?>, <?php echo $init_add?>, '', false);
            handle_clicks();
        });
      	<?php echo $htmltext;
      		   
      	?>
    } catch (e) {
        alert (e.message);  //this executes if jQuery isn't loaded // '<php echo $php_array;?>'
    }
    </script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jsAjax.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/js/TabMenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jsTabMenu.js"></script>
    
	 <script type="text/javascript">
		$().ready(function() {
		$('#coda-slider-1').codaSlider();
		});
	</script>

</head>

<body class="template-5">
	<div class="page_tc ie6"></div>
	<div class="page_cl ie6">
	<div class="page_cr ie6">
	<div id="page_inner" class="page_inner" >
		<div id="WrapperClick" onclick="WrapperClick()">
			
<!-- HEADER -->			
			<div id="header_wrap">

					          
			 	<div class="headerbox">
					<div class="header_inner">
						
						<div class="tab_header">
							<ul id="mbox_tab" class="tab_fbox">
								<li id="aTabBus" class="active">
									<a  class="fpoint ie6" onclick="TabMenuClick(1)">Tuyến Buýt</a>
								</li>
								<li id="aTabPlace" class="">
									<a  class="fpoint ie6" onclick="TabMenuClick(2)">Địa Điểm</a>
								</li>
								<li id="aTabRoute" class="">
									<a  class="fpoint ie6" onclick="TabMenuClick(3)">Tìm Lộ Trình</a>
								</li>
							</ul>
						</div>
						<div class="bgbox fpoint">
							<div class="bgbox_l"></div>
							<div class="bgbox_c">
							</div>
							<div class="bgbox_c2"></div>
							<div class="bgbox_r"></div>
							<!--Logo-->
						    <div id="logo"><a class="logo-old" href="home"></a></div>
						    <!--End logo-->
				
						    <div id="divMapDirect" class="bgbox_inner" style="display: block;">
								<div id="divBus" class="" style="display: block;">
									<div id="search">
										<form id="frmSearch" action="<?php echo base_url();?>home/search/" method="post">
											<div class="SIcon"></div>
											<div class="SLeft"></div>
											<div class="SCenter">
												<div class="SBox">
													<div class="SBoxLeft"></div>
													<input name="mapinput" type="text" class="SText keyboardInput" id="mapinput" value="Tìm tuyến bus..." onclick="this.focus(), this.select();" />
													<input class="SButton" type="submit" value="Tìm" onclick="" />
													<!-- <input type="hidden" id="mode" name="mode" value="search"/> -->
												</div>
											</div>
											<div class="SRight"></div>
										</form>
									</div>
									<!--  End Tab search -->
								</div>
								<div id="divPlace" class="hide" style="display: none;">
									<div id="searchPlace">
										<div class="SIcon2"></div>
										<div class="SLeft"></div>
										<div class="SCenter">
											<div class="SBox">
												<div class="SBoxLeft"></div>
												<input name="searchPlaceField" type="text" class="SText keyboardInput" id="searchPlaceField" value="Nhập vào vị trí, địa chỉ, tọa độ..." onclick="this.focus(), this.select();" onkeypress="return EnterPlace(event)" />
												<input class="SButton" id="btnSearchPlace0" type="submit" value="Tìm" onclick="" />
												<!-- <input type="hidden" id="mode" name="mode" value="search"/> -->
											</div>
										</div>
										<div class="SRight"></div>										
									</div>
									
								</div>
								<div id="divRoute" class="hide" style="display: none;">
									<div id="searchRoute">
										<!-- <div id="listDirection"> -->
										<div id="direction0" class="direction-item">
											<div class="swrap-timduong">
												<span class="a-z">a</span>
												<input class="boxtimduong timduong-default" id="searchPathFrom" type="text" value="Nhập vào vị trí, địa chỉ, tọa độ..." onclick="this.value = ''">
											</div>
										</div>
										<div id="direction1" class="direction-item">
											<div class="swrap-timduong">
												<span class="a-z">b</span>
												<input class="boxtimduong timduong-default" id="searchPathTo" type="text" value="Nhập vào vị trí, địa chỉ, tọa độ..." onclick="this.value = ''">
											</div>
										</div>	
												
										<input id="btnSearchRoute" class="SButton" type="submit" value="Tìm" onclick="SearchComplexRoute()" />
										<div id="btnThamSo" class="fbox_r"></div>
									</div>
								</div>
							</div>
							<div id="login">
				<div id="line2">
					<a id="Signup" class="line2reg" href="">Đăng Ký</a>|
					<a id="Login" class="line2login" href="<?php echo base_url();?>home/login">Đăng Nhập</a>
				</div>
			</div>
							<div class="curve_box">
								<div class="curve_box_l"></div>
								<div class="curve_box_r"></div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
<!-- CONTENT -->			
			<div id="content_wrap">
         
         		<div id="leftpanel" class="LeftPanel hide">
         	
				
				<!-- TAB TÌM TUYẾN BUS -->         	
         			<div id="searchtabdiv" class="tableft" >
		         		<?php
		         		if ($res == "1") 
		         		{ 
		         			$row = $queryTuyen;
						?>
		         		<div id="searchresult_div" class="bodyLeftPanel padding">
		         			<div id="TablePlace">
								<span class="countPlace">Kết quả tìm cho tuyến buýt số 
									<b style="color: #DD0000; font-size: 16px;font-weight: bold;"><?php echo $route;?></b>
								</span>
							
							
								<!-- Kết quả search theo tuyến -->
									
								<div id="result-1" class="resultItem resultItem-active">
								<?php
									$str_htmlDi= str_replace('"', "'",$htmlLoTrinhDi);
									$str_htmlVe= str_replace('"', "'",$htmlLoTrinhVe);
									 
								?>
									<a class="icon1-10 red" onclick="makeactive(<?php echo $row->matuyen;?>,1,-1,'<?php echo base_url()?>')"> <?php echo $row->matuyen; ?><span class="icon1-10Hover"></span></a>
									<a class="resultTitle" onclick="makeactive(<?php echo $row->matuyen;?>,1,-1,'<?php echo base_url()?>')">
										<b><?php echo $row->tentuyen; ?></b>	
									</a>
									<div class="Spacer"></div>
									<ul  class="resultOptions">
										<li onclick="expandMapLong()">
											<a class="" id ="t19_0">X</a>
										</li>
										<li onclick="makeactivemenu(-1,<?php echo $row->matuyen;?>,1,1,'<?php echo base_url()?>')">
											<a class="" id ="t19_1">Thông tin</a>
										</li>
										<li id="BusLoTrinhDi" rel="<?php echo $str_htmlDi;?>" onclick="makeactivemenu(-1,<?php echo $row->matuyen;?>,1,2,'<?php echo base_url()?>')">
											<a class="" id ="t19_2">Lộ trình đi</a>
										</li>
										<li id="BusLoTrinhVe" rel="<?php echo $str_htmlVe;?>" onclick="makeactivemenu(-1,<?php echo $row->matuyen;?>,1,3,'<?php echo base_url()?>')">
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
						<span class="countPlace">Kết quả tìm:</span>
						<div id="ResultSearchPlace" class="resultItem2 resultItem2-active" style="display: none;">
							<table><tr >
								<td width="30px"><img src="<?php echo base_url()?>/public/img/Skins/star_32.png"></img></td>
								<td width="300px">
									<a class="resultTitle2" id="SearchPlaceTittle"></a>
								</td>
								
							</tr></table>
						</div>
						
						<ul id="SearchPlaceMenu" class="resultOptions" style="display: none; width:290px; padding: 4px 30px;">
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
							<div id="SearchPlaceBusStop" class="kohailong" style="display: none; width:300px"  > 
								<div id="fblnk" style="">
									<p>Tìm trạm buýt xung quanh</p>
									<ul>
										<li>
											<div id="direction0" class="direction-item2">
												<span>Bán kính:</span>
												<input id="RSearchBusStopAroundPlace" name="RSearchBusStopAroundPlace" class="boxtimduong timduong-default" type="text" value="500" style="top:0px; left:60px; width: 150px;">
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
											<div id="direction0" class="direction-item2">
												<span>Bán kính:</span>
												<input id="RSearchBusPlace" name="RSearchBusPlace" class="boxtimduong timduong-default" type="text" value="500" style="top:0px; left:60px; width: 150px;">
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
											<div class="direction-item2">
												<span>Dịch vụ:</span>
												<input class="boxtimduong" id="ServiceSearchPlaceAround" type="text" value="Nhập vào loại dịch vụ (KFC,Hotel...)" style="top:0px; left:60px; width: 150px;">
											</div>
										</li>
										<div class="Spacer"></div>
										<li>
											<div class="direction-item2">
												<span>Bán kính:</span>
												<input class="boxtimduong" id="RadiusSearchPlaceAround" type="text" value="500" style="top:0px; left:60px; width: 150px;" >
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
					
					<div id="topLeftPathResult" class="topLeftPanel" >
						<div id="directionoptions" style="width:100%;">
							<div id="direction0" class="direction-item2" style="left:15px;">
							<table>
								<tr>
									<td width="125px">
										<strong>Bán kính:</strong>
										<input id="RSearchBusRoute" name="RSearchBusRoute" class="boxtimduong timduong-default" type="text" value="500" style="top:0px; left:60px; width: 50px;">
									</td>
									<td>
										<strong style="left:70px;">Phương tiện: </strong>
									<select id="Phuongtiendi" class="boxtimduong timduong-default" onchange="SearchComplexRoute()" style="top:0px; left:210px; width: 100px; height:25px;">
									<option selected="selected" value="BUS">Xe buýt     </option>
									<option value="DRIVING">Xe hơi     </option>
									<option value="WALKING">Đi bộ      </option>
								</select>
									</td>
								</tr>
							
							</table>
								
								
							</div>
								
								<!-- <a onclick="SearchPlaceMotorRoute()">Tìm dịch vụ</a>-->
											
                   		</div>
					</div>
					 
					<div id="findpath_div" class="bodyLeftPanel">					
						<div id="directions-panel"></div>
					</div>
					
				</div>
			</div>
			
			
			
			<div id="mainmap" class="mainmap">
				<div id="mm-map" class="" style="position: absolute; overflow: hidden; left: 0pt; top: 0pt; width: 100%; height: 100%;"></div>
			</div>
			
			
		</div>
           
		</div>
	</div>
	</div>
	</div>
			
			
</body>
</html>
