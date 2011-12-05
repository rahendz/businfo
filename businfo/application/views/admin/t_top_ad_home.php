<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Trang Quản Lý</title>
	<link rel="icon" href="" type="image/x-icon"/>
	<link rel="shortcut icon" href="" type="image/x-icon"/>
	
	<link rel="stylesheet" type="text/css" href="http://demo-admin.magentocommerce.com/js/calendar/calendar-win2k-1.css" />
	<link rel="stylesheet" type="text/css" href="http://localhost/businfo/public/css/Reset_Text.css" media="all" />
	<link rel="stylesheet" type="text/css" href="http://localhost/businfo/public/css/Login.css" media="all" />
	<link rel="stylesheet" type="text/css" href="http://localhost/businfo/public/css/Menu.css" media="screen, projection"/>
	
	<script type="text/javascript" src="http://localhost/businfo/public/js/prototype.js"></script>
	
	<script language="javascript">

// Created by: Lee Underwood :: http://javascript.internet.com/

function displayDate() {
  var now = new Date();
  var today = now.getDate();
  var month = now.getMonth();
    var monthName = new Array(12)
      monthName[0]=" 1 ";
      monthName[1]=" 2 ";
      monthName[2]=" 3 ";
      monthName[3]=" 4 ";
      monthName[4]=" 5 ";
      monthName[5]=" 6 ";
      monthName[6]=" 7 ";
      monthName[7]=" 8 ";
      monthName[8]=" 9 ";
      monthName[9]=" 10 ";
      monthName[10]=" 11 ";
      monthName[11]=" 12 ";
  var year = now.getFullYear();

  document.write("Ngày " + today + " tháng" + monthName[month]+ " năm "+year);
}
</script>
</head>

<body id="html-body"class=" adminhtml-dashboard-index">
	
	
		<div class="header">
	    	<div class="header-top">
				<a href="">
					<img class="logo" alt="BusInfo Logo" src="http://localhost/businfo/public/img/skins/logo.png">
				</a>
				<div class="header-right">
				<p class="super">Đăng nhập với quyền Admin
					<span class="separator">|</span>
					<script type="text/javascript">displayDate();</script>
					
					<span class="separator">|</span>
					<a class="link-logout" href="../login.php">Đăng Xuất</a>
				</p>
				</div>
			</div>
		    <div class="clear"></div>
		    
		    <div class="nav-bar">
		    	<ul id="nav">
				  	<li class=" active level0"> 
				  		<a href="<?php echo base_url()?>home/ad_home" class="active"><span>Trang Chủ</span></a>
				    </li>
				    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="  parent level0"> 
				    	<a href="#" onclick="return false" class=""><span>Tuyến Buýt</span></a>
				    	<ul >
					        <li class=" level1"> 
					        	<a href="<?php echo base_url()?>home/ThongTinTuyen" class=""><span>Thông Tin Tuyến Buýt</span></a>
					        </li>
					        <li class="  level1"> 
					        	<a href="<?php echo base_url()?>home/ThemTuyenBus" class=""><span>Thêm Tuyến Buýt</span></a>
					        </li>
					        <li class="  level1"> 
					        	<a href="" class=""><span>Sửa Thông Tin Tuyến Buýt</span>
							</li>
						</ul>
					</li>
					<li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="  parent level0"> 
						<a href="#" onclick="return false" class=""><span>Trạm Buýt</span></a>
						<ul >
							<li class="  level1"> 
								<a href="<?php echo base_url()?>home/ThongTinTram"  class=""><span>Thông Tin Trạm Buýt</span></a>
							</li>
							<li class="  level1"> 
								<a href="<?php echo base_url()?>home/ThemTramBus"  class=""><span>Thêm Trạm Buýt</span></a>
							</li>
							<li class="  last level1"> 
								<a href=""  class=""><span>Sửa Thông Tin Trạm Buýt</span></a>
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
				
				<a id="page-help-link" href="">Hướng Dẫn</a>
				<script type="text/javascript">$('page-help-link').target = 'magento_page_help'</script>
			</div>
		</div>
		
		

</body>
</html>
