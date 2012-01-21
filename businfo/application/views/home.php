<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
    <script type="text/javascript" src="<?php echo base_url()?>public/js/TabMenu.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>public/css/MainStyle.css" media="all" />
</head>

<body class="template-5">
	<div id="WrapperClick" onclick="WrapperClick()">
		<div id="header_wrap">
			<!-- Tab main menu -->
			
			<ul id="bando_tab"">
				<li id="searchtab" class="active2" style="margin-left: 5px;">
				<a id="tloc" onclick="setMode(1); state(ChangeFunctionType, GLOBAL_SEARCH_FUNCTION);"> Tuyến Bus</a>
				</li>
				<li id="mymaptab" class="">
				<a id="tpers" onclick="setMode(2); state(ChangeFunctionType, GLOBAL_MYMAP_FUNCTION);"> Tìm Vị Trí</a>
				</li>
				<li id="findpathtab" class="">
				<a id="tdir" onclick="state(ChangeFunctionType, GLOBAL_FINDPATH_FUNCTION)"> Tìm Lộ Trình</a>
				</li>
				<img class="tab_img_end" src="<?php echo base_url()?>public/img/Skins/tab_img_end.png" alt="">
			</ul>
			<!-- End Tab Main menu -->
			
			
			<!--Logo-->
            <div id="logo">
                <a class="logo-old" href="/Maps/"></a>
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
	                        <input name="mapinput" type="text" class="SText keyboardInput" id="mapinput" value="Tìm tuyến bus..." onclick="this.focus(), this.select();" />
	                        <input class="SButton" type="submit" value="Tìm" onclick=""/>
                            <input type="hidden" id="mode" name="mode" value="route"/>
                            <input name="bound_lat" type="hidden" id="bound_lat"/>
                            <input name="bound_lng" type="hidden" id="bound_lng"/>
						</div>
					</div>
	                <div class="SRight"></div>
                </form>
                
                <script type="text/javascript">
                $('#frmSearch').submit(function() {
                	event.preventDefault();
                	markers = [];
                	var self = this;
                    if (document.getElementById('mode').value == "poi") {                    
                        geocodeAdd(document.getElementById('mapinput').value);
                    }
                    window.setTimeout(function() {
                        self.submit();
                        }, 100);
                });
                </script>
                
	            </div>
              
	            <!--  End Tab search -->
	            
				<!--  Tab Top menu -->
				<ul id="nav">
					<li class="navitem nav-first"><a id="nmap" href="">Bản Đồ</a></li>
					<li class="navitem"><a id="napi" href="">Liên Kết</a>
						<ul class="submenu1" style="width:135px">
							<li style="padding-top:4px" class="noLava topradius"><a href="">Sở GTCC TpHCM</a></li>
							<li class="noLava"><a href="">Buýt TpHCM</a></li>
							<li style="padding-bottom:4px" class="noLava botradius"><a href="">Bến Xe</a></li>
						</ul>
					</li>
					<li class="navitem"><a id="nmob" href="">Giới Thiệu</a></li>
					<li id="HelpMenu" class="navitem"><a id="nhelp" target="_blank" href="">Hướng Dẫn Sử Dụng</a>
						<ul class="submenu2" style="width:150px">
							<li style="padding-top:4px" class="noLava topradius"><a target="_blank" href="">Tìm Tuyến Bus</a></li>
							<li class="noLava"><a target="_blank" href="">Tìm Vị Trí</a></li>
							<li class="noLava"><a href="">Tìm Lộ Trình</a></li>
							<li class="noLava"><a target="_blank" href="">Tìm Dịch Vụ</a></li>
							<li style="padding-bottom:4px" class="noLava botradius"><a href="">Chức Năng Khác</a></li>
						</ul>
					</li>
					<li class="navitem"><a id="ncont" href="">Liên hệ</a></li>
				</ul>
				
				<!--  End Tab Top menu -->
			</div>
			
			<!--  End Tab Header -->
	         <div id="login">
				<div id="line2">
					<a id="Signup" class="line2reg" href="">Đăng ký</a>|
					<a id="Login" class="line2login" href="<?php echo base_url();?>application/views/login.php">Đăng nhập</a>
				</div>
			</div>
        </div>
        
        
         <div id="content_wrap">
         
         	<div id="leftpanel" class="LeftPanel">
         		<div id="searchtabdiv" class="tableft" >
         			<div id="searchresult_div" class="bodyLeftPanel padding">
						<div id="TablePlace">
							<span class="countPlace">Kết quả từ	<b>1-10</b>	trong số<b>27</b>cho</span>
							<span class="keyPlace"><b>đh cntt</b><span class="searchinwrap">
							<a><span onclick="LoadTree()">Xem</span></a>
							</span></span>
							<!-- Kết quả search theo tuyến xe  -->
							<div id="resultItem_1" class="resultItem resultItem-active" onmouseover="ResultEntryMouseOver(this)" onmouseout="ResultEntryMouseOut(this)">
								<a class="icon1-10 red">19<span class="icon1-10Hover"></span></a>
								<a class="resultTitle" onclick="ResultViewDetailCurrentLevel(1)">
								<b>Bến Thành - Bến Xe ĐHQG</b>	</a>
								<div class="Spacer"></div>
								<ul class="resultOptions">
									<li>
										<a onclick="">Thông tin</a>
									</li>
									<li>
										<a onclick="">Lộ trình đi</a>
									</li>
									<li>
										<a  onclick="">Lộ trình về</a>
									</li>
									<li>
										<a class="flnk" onclick="ResultSearchNearBy(1)">Tìm xung quanh</a>
									</li>
									<li>
										<a href="" style="font-weight:bold" target="_blank">Chi tiết</a>
									</li>
								</ul>
							</div>
							
							<div id="resultItem_1" class="resultItem" onmouseover="ResultEntryMouseOver(this)" onmouseout="ResultEntryMouseOut(this)">
								<a class="icon1-10 red">08<span class="icon1-10Hover"></span></a>
								<a class="resultTitle" onclick="ResultViewDetailCurrentLevel(1)">
								<b>Bến Xe Q8 - Bến Xe ĐHQG</b>	</a>
								<div class="Spacer"></div>
								<ul class="resultOptions">
									<li>
										<a onclick="">Thông tin</a>
									</li>
									<li>
										<a onclick="">Lộ trình đi</a>
									</li>
									<li>
										<a  onclick="">Lộ trình về</a>
									</li>
									<li>
										<a class="flnk" onclick="ResultSearchNearBy(1)">Tìm xung quanh</a>
									</li>
									<li>
										<a href="" style="font-weight:bold" target="_blank">Chi tiết</a>
									</li>
								</ul>
							</div>

								
						</div>
						
						<div class="kohailong"  > 
							<div id="fblnk" style="">
								<p>Bạn không hài lòng về kết quả tìm kiếm?</p>
									<ul>
										<li>
											<a onclick="Global.ShowFeedBackForm()">Gửi ý kiến của bạn.</a>
										</li>
										<li>
											<a onclick="loadAddPlaceFunc()">Thêm vị trí của bạn vào bản đồ.</a>
										</li>
									</ul>
							</div>
							<div id="fbForm" class="jForm" style="display: none" >
<p>Gửi phê bình</p>
<span id="fberror" class="typevnmese">*Bạn vui lòng gõ tiếng Việt có dấu</span>
<div>
<label for="fbName">Họ tên:</label>
<input id="fbName" type="text" style="width:220px" name="fbName">
</div>
<div>
<label for="fbEmail">Email:</label>
<input id="fbEmail" type="text" style="width:220px" name="fbEmail">
</div>
<span>Ý kiến của bạn</span>
<textarea id="fbContent" name="fbContent" cols="40" rows="6"></textarea>
<a class="submit_wrap" onclick="Global.SendFeedBack('đh cntt |')">
<span class="submit">Gửi phê bình</span>
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
				</div>
				
				<div id="findpathtabdiv" class="tableft" style="display: none;">
					
					<div id="topLeftPathResult" class="topLeftPanel" >
						<span id="FindPathStatus" class="FindPathStatus"></span>
						<a id="clearPathResultText" class="link clearPathResult" style="display: none" onclick="state(ClearPathResult)" title="Xóa kết quả"> Xóa kết quả</a>
						<a id="tdreverse" class="link tdreverse" onclick="FindReverseDirection()" title="Chiều ngược lại" style="display: none;"> Chiều ngược lại</a>
						<a id="printDirection" class="link printDirection" onclick="PrintResult()" title="In lộ trình"> In lộ trình</a>
						<div id="tdvehicle" class="link" style="display: none; z-index: 806;"> </div>
					</div>
					<div id="findpath_div" class="bodyLeftPanel" >
						<div id="listDirection">
							<div id="dirInputTemplate" style="display: none; z-index: 800;">
								<div id="direction$section$" class="direction-item" style="z-index: 798;">
									<div class="swrap-timduong" style="z-index: 796;">
										<span class="a-z">$order$</span>
										<input class="boxtimduong timduong-default" type="text" value="Nhập vào địa chỉ, doanh nghiệp..." onblur="OnblurTextBoxAB(this)" onfocus="OnforcusTextBoxAB(this)" onkeydown="return SearchPlaceEnter(event,$section$)">
										<a class="del-timduong" onclick="state(ClickRemovePlaceButton, this)" style="display: none">Xóa</a>
										<a id="btnSearchPlace$section$" class="btn-timduong" onclick="doSearchPlace($section$)">Tìm</a>
									</div>
									<div id="guide$section$" class="direction-guide" style="z-index: 794;"> </div>
								</div>
							</div>
							<div id="direction0" class="direction-item" style="z-index: 792;">
								<div class="swrap-timduong" style="z-index: 790;">
									<span class="a-z">a</span>
									<input class="boxtimduong timduong-default" type="text" value="Nhập vào địa chỉ, doanh nghiệp..." onblur="OnblurTextBoxAB(this)" onfocus="OnforcusTextBoxAB(this)" onkeydown="return SearchPlaceEnter(event,0)">
									<a class="del-timduong" onclick="state(ClickRemovePlaceButton, this)" style="display: none">Xóa</a>
									<a id="btnSearchPlace0" class="btn-timduong" onclick="doSearchPlace(0)">Tìm</a>
								</div>
								<div id="guide0" class="direction-guide" style="z-index: 788;"> </div>
							</div>
							<div id="direction1" class="direction-item" style="z-index: 786;">
								<div class="swrap-timduong" style="z-index: 784;">
									<span class="a-z">b</span>
									<input class="boxtimduong timduong-default" type="text" value="Nhập vào địa chỉ, doanh nghiệp..." onblur="OnblurTextBoxAB(this)" onfocus="OnforcusTextBoxAB(this)" onkeydown="return SearchPlaceEnter(event,1)">
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
