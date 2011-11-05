<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Trang Quản Lý</title>
	<link rel="icon" href="" type="image/x-icon"/>
	<link rel="shortcut icon" href="" type="image/x-icon"/>
	
	<link rel="stylesheet" type="text/css" href="http://demo-admin.magentocommerce.com/js/calendar/calendar-win2k-1.css" />
	<link rel="stylesheet" type="text/css" href="http://localhost/BusInfo/businfo/public/css/Reset_Text.css" media="all" />
	<link rel="stylesheet" type="text/css" href="http://localhost/BusInfo/businfo/public/css/Login.css" media="all" />
	<link rel="stylesheet" type="text/css" href="http://localhost/BusInfo/businfo/public/css/Menu.css" media="screen, projection"/>
	<link rel="stylesheet" type="text/css" href="http://localhost/BusInfo/businfo/public/css/step-menu.css" title ="mainStepNav" media="all" />
	<script type="text/javascript" src="http://localhost/BusInfo/businfo/public/js/prototype.js"></script>

</head>

<body id="html-body"class=" adminhtml-dashboard-index">
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
								<a href=""  class=""><span>Thêm Trạm Bus</span></a>
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
				
				<div class="dashboard-container">
					<div>
						<ul id="mainStepNav" class="fiveStep" style="width: 100%">
							<li class="current"><a title=""><em>Bước 1: Thông Tin Tuyến Bus</em><span> </span></a></li>
							<li><a title=""><em>Bước 2: Xác Định Lộ Trình Đi</em><span></span></a></li>
							<li><a title=""><em>Bước 3: Trạm Bus Lộ Trình Đi</em><span></span></a></li>
							<li><a title=""><em>Bước  4: Xác Định Lộ Trình Về</em><span></span></a></li>
							<li class="mainStepNavNoBg"><a title=""><em>Bước 5: Trạm Bus Lộ Trình Về</em> <span></span></a></li>
						</ul>
					</div>
				</div>
				
				<div class="clearfloat">&nbsp;</div>
					
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
												<label for="id">Mã Tuyến:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="id" class=" required-entry input-text required-entry" type="text" value="" name="MaTuyen">
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="name">Tên Tuyến:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="name" class=" required-entry input-text required-entry" type="text" value="" name="TenTuyen">
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="BenDau">Bến Đầu:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<select id="BenDau" class=" required-entry required-entry select" name="BenDau">
													<option selected="selected" value="">-- Chọn --</option>
													<option value="1">ĐHQG TpHCM</option>
													<option value="2">Bến Thành</option>
													<option value="3">Bến xe Quận 8</option>
												</select>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="BenCuoi">Bến Cuối:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<select id="BenCuoi" class=" required-entry required-entry select" name="BenCuoi">
													<option selected="selected" value="">-- Chọn --</option>
													<option value="1">ĐHQG TpHCM</option>
													<option value="2">Bến Thành</option>
													<option value="3">Bến xe Quận 8</option>
												</select>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="info">Thông Tin Tuyến:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<textarea id="meta_keyword" class=" textarea" cols="15" rows="2" name="ThongTinTuyen"></textarea>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="LoTrinhDi">Lộ Trình Đi:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<textarea id="meta_keyword" class=" textarea" cols="15" rows="2" name="LoTrinhDi"></textarea>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="LoTrinhVe">Lộ Trình Đi:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<textarea id="meta_keyword" class=" textarea" cols="15" rows="2" name="LoTrinhVe"></textarea>
											</td>
										</tr>
										<tr>
											<td class="label" colspan="2" align="center">
												<div class="form-buttons" style="float: Left">
													<button id="Reset" class="scalable add" style="" onclick="" type="button">
														<span>Hủy</span>
													</button>
													<button id="Save" class="scalable add" style="" onclick="parent.location='../admin/ThemTuyenBus_B2.php'" type="button">
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


</body>
</html>
