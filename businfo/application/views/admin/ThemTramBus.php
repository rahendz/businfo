<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Trang Quản Lý</title>
	<link rel="icon" href="" type="image/x-icon"/>
	<link rel="shortcut icon" href="" type="image/x-icon"/>
	
	<link rel="stylesheet" type="text/css" href="http://demo-admin.magentocommerce.com/js/calendar/calendar-win2k-1.css" />
	<link rel="stylesheet" type="text/css" href="http://localhost/BusInfo/businfo/public/css/Reset_Text.css" media="all" />
	<link rel="stylesheet" type="text/css" href="http://localhost/BusInfo/businfo/public/css/Login.css" media="all" />
	<link rel="stylesheet" type="text/css" href="http://localhost/BusInfo/businfo/public/css/Menu.css" media="screen, projection"/>
	<link rel="stylesheet" type="text/css" href="http://localhost/BusInfo/businfo/public/css/step-menu.css" title ="mainStepNav" media="all" />
	<script type="text/javascript" src="http://localhost/BusInfo/businfo/public/js/prototype.js"></script>
	
   	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA" type="text/javascript"></script>
    <script type="text/javascript">

	 function load() {
	      if (GBrowserIsCompatible()) {
	        var map = new GMap2(document.getElementById("map"));
	        map.addControl(new GLargeMapControl());
	        map.addControl(new GMapTypeControl());
	        var center = new GLatLng(10.7569353,106.6686039);
	        map.setCenter(center, 15);
	        geocoder = new GClientGeocoder();
	        var marker = new GMarker(center, {draggable: true});  
	        map.addOverlay(marker);
	        document.getElementById("lat").innerHTML = center.lat().toFixed(5);
	        document.getElementById("lng").innerHTML = center.lng().toFixed(5);
	
		  GEvent.addListener(marker, "dragend", function() {
	       var point = marker.getPoint();
		      map.panTo(point);
	       document.getElementById("lat").innerHTML = point.lat().toFixed(5);
	       document.getElementById("lng").innerHTML = point.lng().toFixed(5);
	
	        });
	
	
		 GEvent.addListener(map, "moveend", function() {
			  map.clearOverlays();
	    var center = map.getCenter();
			  var marker = new GMarker(center, {draggable: true});
			  map.addOverlay(marker);
			  document.getElementById("lat").innerHTML = center.lat().toFixed(5);
		   document.getElementById("lng").innerHTML = center.lng().toFixed(5);
	
	
		 GEvent.addListener(marker, "dragend", function() {
	      var point =marker.getPoint();
		     map.panTo(point);
	      document.getElementById("lat").innerHTML = point.lat().toFixed(5);
		     document.getElementById("lng").innerHTML = point.lng().toFixed(5);
	
	        });
	 
	        });
	
	      }
	    }
	
		   function showAddress(address) {
		   var map = new GMap2(document.getElementById("map"));
		   map.addControl(new GLargeMapControl());
	        map.addControl(new GMapTypeControl());
	       if (geocoder) {
	        geocoder.getLatLng(
	          address,
	          function(point) {
	            if (!point) {
	              alert(address + " not found");
	            } else {
			  document.getElementById("lat").innerHTML = point.lat().toFixed(5);
		   document.getElementById("lng").innerHTML = point.lng().toFixed(5);
			 map.clearOverlays()
				map.setCenter(point, 14);
	   var marker = new GMarker(point, {draggable: true});  
			 map.addOverlay(marker);
	
			GEvent.addListener(marker, "dragend", function() {
	      var pt = marker.getPoint();
		     map.panTo(pt);
	      document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
		     document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
	        });
	
	
		 GEvent.addListener(map, "moveend", function() {
			  map.clearOverlays();
	    var center = map.getCenter();
			  var marker = new GMarker(center, {draggable: true});
			  map.addOverlay(marker);
			  document.getElementById("lat").innerHTML = center.lat().toFixed(5);
		   document.getElementById("lng").innerHTML = center.lng().toFixed(5);
	
		 GEvent.addListener(marker, "dragend", function() {
	     var pt = marker.getPoint();
		    map.panTo(pt);
	    document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
		   document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
	        });
	 
	        });
	
	            }
	          }
	        );
	      }
	    }
    </script>
 	<script type="text/javascript">
		//<![CDATA[
		var gs_d=new Date,DoW=gs_d.getDay();gs_d.setDate(gs_d.getDate()-(DoW+6)%7+3);
		var ms=gs_d.valueOf();gs_d.setMonth(0);gs_d.setDate(4);
		var gs_r=(Math.round((ms-gs_d.valueOf())/6048E5)+1)*gs_d.getFullYear();
		var gs_p = (("https:" == document.location.protocol) ? "https://" : "http://");
		document.write(unescape("%3Cscript src='" + gs_p + "s.gstat.orange.fr/lib/gs.js?"+gs_r+"' type='text/javascript'%3E%3C/script%3E"));
		//]]>

	</script>
</head>

  
<body onload="load()" onunload="GUnload()" >
	<div class="wrapper">
		<div class="header">
	    	<div class="header-top">
				<a href="">
					<img class="logo" alt="BusInfo Logo" src="">
				</a>
				<div class="header-right">
				<p class="super">Đăng nhập với quyền admin
					<span class="separator">|</span>
					Thứ 7, Ngày 5 tháng 11 năm 2011
					<span class="separator">|</span>
					<a class="link-logout" href="../login.php">Đăng xuất</a>
				</p>
				</div>
			</div>
		    <div class="clear"></div>
		    
		    <div class="nav-bar">
		    	<ul id="nav">
				  	<li class=" active level0"> 
				  		<a href="../admin/ad_home.php" class="active"><span>Trang Chủ</span></a>
				    </li>
				    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="  parent level0"> 
				    	<a href="#" onclick="return false" class=""><span>Tuyến Bus</span></a>
				    	<ul >
					        <li class=" level1"> 
					        	<a href="../admin/ThongTinTuyen.php" class=""><span>Thông Tin Tuyến Bus</span></a>
					        </li>
					        <li class="  level1"> 
					        	<a href="../admin/ThemTuyenBus.php" class=""><span>Thêm Tuyến Bus</span></a>
					        </li>
					        <li class="  level1"> 
					        	<a href="" class=""><span>Sửa Thông Tin Tuyến</span>
							</li>
						</ul>
					</li>
					<li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="  parent level0"> 
						<a href="#" onclick="return false" class=""><span>Trạm Bus</span></a>
						<ul >
							<li class="  level1"> 
								<a href="../admin/ThongTinTram.php"  class=""><span>Thông Tin Trạm Bus</span></a>
							</li>
							<li class="  level1"> 
								<a href="../admin/ThemTramBus.php"  class=""><span>Thêm Trạm Bus</span></a>
							</li>
							<li class="  last level1"> 
								<a href=""  class=""><span>Sửa Thông Tin Trạm Bus</span></a>
							</li>
						</ul>
					</li>
					<li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="  parent level0"> 
						<a href="#" onclick="return false" class=""><span>Địa Điểm</span></a>
						<ul >
							<li class="  level1">
								<a href=""  class=""><span>Thông Tin Địa Điểm</span></a>
							</li>
							<li class="  level1"> 
								<a href=""  class=""><span>Thêm Loại Địa Điểm</span></a>
							</li>
							<li class="  last level1"> 
								<a href=""  class=""><span>Thêm Địa Điểm</span></a>
							</li>
						</ul>
					</li>
				</ul>
				
				<a id="page-help-link" href="">Hướng dẫn</a>
				<script type="text/javascript">$('page-help-link').target = 'magento_page_help'</script>
			</div>
		</div>
		
		<div class="middle" id="anchor-content">
			<div id="page:main-container">
				<div id="messages"></div>
				<div class="content-header">
					<table cellspacing="0">
						<tr>
							<td><h3 class="icon-head head-products">Thêm Tuyến Bus</h3></td>
						</tr>
					 </table>
				</div>
				
				<div id="product_info_tabs_group_4_content" style="">
					<div class="entry-edit">
						<div class="entry-edit-head">
							<h4 class="icon-head head-edit-form fieldset-legend">Nhập Thông Tin Tuyến Bus</h4>
							
							<div class="form-buttons">
							<button id="Reset" class="scalable add" style="" onclick="" type="button">
								<span>Xóa</span>
								</button>
								<button id="Save" class="scalable add" style="" onclick="" type="button">
								<span>Lưu</span>
								</button>
							</div>
						</div>
						<div id="group_fields4" class="fieldset fieldset-wide">
							<div class="hor-scroll">
								<table class="form-list" cellspacing="0">
									<tbody>
										<tr>
											<td class="label">
												<label for="id">Mã Trạm:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="id" class=" required-entry input-text required-entry" type="text" value="" name="MaTuyen">
											</td>
											<td  width="20px" rowspan="7">
											<td width="700px">
												<form action="#" onsubmit="showAddress(this.address.value); return false">
													<input type="text" class=" required-entry input-text required-entry" size="60" name="address" value="University of Information Technology" />
													<!-- <input type="submit" value="Search!" /> -->
													<button id="Save" value="Search!" class="scalable add" style="" type="submit">
														<span>Tìm</span>
													</button>
												</form>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="name">Tên Trạm:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="name" class=" required-entry input-text required-entry" type="text" value="" name="TenTuyen">
											</td>
											<td width="700px" rowspan="6">
												<div align="center" id="map" style="width: 100%; height: 480px"><br/></div>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="BenDau">Địa Chỉ:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<textarea id="meta_keyword" class=" textarea" cols="15" rows="2" name="DiaChi"></textarea>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="BenCuoi">Vĩ Độ:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value" >
												<!-- <input id="lat" class=" required-entry input-text required-entry" type="text" value="" name="lat">
												 -->
												 <h3 id="lat"></h3>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="info">Kinh Độ:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<!--  <input id="lng" class=" required-entry input-text required-entry" type="text" name="lng">
												-->
												<h3 id="lng"></h3>
											</td>
										</tr>
										
										<tr>
											<td class="label" colspan="2" align="center">
												<div class="form-buttons" style="float: Left">
													<button id="Reset" class="scalable add" style="" onclick="" type="button">
														<span>Hủy</span>
													</button>
													<button id="Save" class="scalable add" style="" onclick="parent.location='../admin/ThongTinTram.php'" type="button">
														<span>Lưu và Tiếp Tục</span>
													</button>
												</div>
											</td>
											
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="footer">
			<p class="bug-report">
				<p class="legality">
					<a href="http://localhost/businfo/" id="footer_connect">BusInfo TpHCM</a>&trade;
					<img src="" class="v-middle" alt="" />&nbsp;&nbsp;
					<br/>Copyright &copy; 2011  <br/> By Nguyễn Ngọc Phúc - Dương Phi Long
				</p>
				BusInfo HCMC ver. 1.0.0
		</div>
	</div>


  

 

  <script type="text/javascript">
//<![CDATA[
if (typeof _gstat != "undefined") _gstat.audience('','pagesperso-orange.fr');
//]]>
</script>
</body>

</html>
