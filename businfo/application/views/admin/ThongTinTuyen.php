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
			<div id="messages"></div>
				<div class="content-header">
					<table cellspacing="0">
						<tbody>
							<tr>
								<td style="width:50%;">
									<h3 class="icon-head head-products">Thông Tin Các Tuyến Bus</h3>
								</td>
								<td class="a-right">
									<button id="ThemTuyenBus" class="scalable add" style=""  onclick="parent.location='../admin/ThemTuyenBus.php'" type="button">
									<span>Thêm Tuyến Bus</span>
								</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<p class="switcher">
					<label for="store_switcher">Bến đầu / cuối:</label>
					<select id="store_switcher" onchange="return switchStore(this);" name="store_switcher">
						<option value="">Tất cả các bến</option>
						<option value="1">ĐHQG TpHCM</option>
						<option value="3">Bến Thành</option>
						<option value="2">Bến xe Quận 8</option>
					</select>
				</p>
				
				<div id="TuyenBusGrid">
					<table class="actions" cellspacing="0">
						<tbody>
							<tr>
								<td class="pager">
									Trang:
									<img class="arrow" alt="Trang trước" src="http://localhost/businfo/businfo/public/img/login/pager_arrow_left_off.gif">
									<input class="input-text page" type="text" onkeypress="" value="1" name="page">
									<a onclick="" title="Trang sau" href="#">
										<img class="arrow" alt="Trang sau" src="http://localhost/businfo/businfo/public/img/login/pager_arrow_right.gif">
									</a>trong 6 trang
									<span class="separator">|</span>Xem
									<select onchange="productGridJsObject.loadByElement(this)" name="limit">
										<option selected="selected" value="20">20</option>
										<option value="30">30</option>
										<option value="50">50</option>
										<option value="100">100</option>
										<option value="200">200</option>
									</select>
									/trang
									<span class="separator">|</span>
									Tổng cộng: 1 tuyến được tìm thấy
									<span id="productGrid-total-count" class="no-display">1</span>
									
								</td>
								<td class="filter-actions a-right">
									<button id="Reset" class="scalable " style="" onclick="" type="button">
									<span>Phục Hồi</span>
									</button>
									<button id="Find" class="scalable task" style="" onclick="" type="button">
									<span>Tìm Kiếm</span>
									</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div id="productGrid_massaction">
					<table class="massaction" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td>
									<a onclick="return productGrid_massactionJsObject.selectAll()" href="#">Chọn Tất Cả</a>
									<span class="separator">|</span>
									<a onclick="return productGrid_massactionJsObject.unselectAll()" href="#">Bỏ Chọn Tất Cả</a>
									<span class="separator">|</span>
									<strong id="productGrid_massaction-count">0</strong>
									dòng đang được chọn
								</td>
								<td>
									<div class="right">
										<div class="entry-edit">
											<form id="productGrid_massaction-form" method="post" action="">
												<div>
												<input type="hidden" value="wNZRacjzjJXtr1EC" name="form_key">
												</div>
												<fieldset>
													<span class="field-row">
														<label>Công Cụ:</label>
														<select id="productGrid_massaction-select" class="required-entry select absolute-advice local-validation">
															<option value=""></option>
															<option value="delete">Xóa</option>
															<option value="attributes">Sửa Thông Tin</option>
														</select>
													</span>
													<span id="productGrid_massaction-form-hiddens" class="outer-span"></span>
													<span id="productGrid_massaction-form-additional" class="outer-span"> </span>
													<span class="field-row">
														<button id="Submit" class="scalable" style="" onclick="" type="button">
														<span>Tiến Hành</span>
														</button>
													</span>
												</fieldset>
											</form>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div class="grid">
					<div class="hor-scroll">
						<table id="productGrid_table" class="data" cellspacing="0" style="width:100%;">
							<colgroup>
							<col class="a-center" width="20">
							<col width="50">
							<col>
							<col width="120">
							<col width="120">
							<col width="180">
							<col width="250">
							<col width="250">
							<col width="70">
							
							</colgroup>
							<thead>
								<tr class="headings">
									<th>
										<span class="nobr">&nbsp;</span>
									</th>
									<th>
										<span class="nobr">
										<a class="sort-arrow-desc" title="asc" name="entity_id" href="#">
											<span class="sort-title">Mã Tuyến</span>
										</a>
										</span>
									</th>
									<th>
										<span class="nobr">
										<a class="not-sort" title="asc" name="name" href="#">
											<span class="sort-title">Tên Tuyến</span>
										</a>
										</span>
									</th>
									<th>
										<span class="nobr">
										<a class="not-sort" title="asc" name="type" href="#">
											<span class="sort-title">Bến Đầu</span>
										</a>
										</span>
									</th>
									<th>
										<span class="nobr">
										<a class="not-sort" title="asc" name="set_name" href="#">
											<span class="sort-title">Bến Cuối</span>
										</a>
										</span>
									</th>
								<th>
									<span class="nobr">
									<a class="not-sort" title="asc" name="sku" href="#">
										<span class="sort-title">Thông Tin Tuyến</span>
									</a>
									</span>
									</th>
								<th>
									<span class="nobr">
									<a class="not-sort" title="asc" name="price" href="#">
										<span class="sort-title">Lộ Trình Đi</span>
									</a>
									</span>
								</th>
								<th>
									<span class="nobr">
									<a class="not-sort" title="asc" name="qty" href="#">
										<span class="sort-title">Lộ Trình Về</span>
									</a>
									</span>
								</th>
								<th class=" no-link last">
									<span class="nobr">Công Cụ</span>
								</th>
							</tr>
							
							<tr class="filter">
								<th>
									<span class="head-massaction">
									</span>
								</th>
								<th>
									<div class="range">
										<div class="range-line">
											<span class="label">Từ:</span>
											<input id="" class="input-text no-changes" type="text" value="" name="entity_id[from]">
										</div>
										<div class="range-line">
											<span class="label">Đến : </span>
											<input id="" class="input-text no-changes" type="text" value="" name="entity_id[to]">
										</div>
									</div>
								</th>
								<th>
									<div class="field-100">
										<input id="productGrid_product_filter_name" class="input-text no-changes" type="text" value="" name="name">
									</div>
								</th>
								<th>
									<select id="productGrid_product_filter_type" class="no-changes" name="type">
										<option value=""></option>
										<option value="1">ĐHQG TpHCM</option>
										<option value="3">Bến Thành</option>
										<option value="2">Bến xe Quận 8</option>
									</select>
								</th>
								<th>
									<select id="productGrid_product_filter_set_name" class="no-changes" name="set_name">
										<option value=""></option>
										<option value="1">ĐHQG TpHCM</option>
										<option value="3">Bến Thành</option>
										<option value="2">Bến xe Quận 8</option>
									</select>
								</th>
								<th></th>
								<th></th>
								<th></th>
								<th class=" no-link last">&nbsp;</th>
							</tr>
						</thead>
						
						<tbody>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 19 </td>
								<td class=" "> Bến Thành - KCX Linh Trung - Đại học Quốc gia </td>
								<td class=" "> Bến Thành   </td>
								<td class=" "> Đại học Quốc gia </td>
								<td class=" "> Cự ly: 25,95 km <br/>TGHĐ: 05h00 -20h00 </td>
								<td class=" a-right "> Công trường Quách Thị Trang (trạm điều hành Sài Gòn)-Hàm Nghi-Tôn Đức Thắng-Hai Bà Trưng-Lê Duẩn-Đinh Tiên Hoàng-Nguyễn Thị Minh Khai-Xô Viết Nghệ Tĩnh-Quốc lộ 13-Quốc lộ 1A-(Trạm 2)-Quốc lộ 1A-Đường 621-(Ngã ba đường vào khu ký túc xá)-(Ngã ba đường vào Trường ĐH Quốc Tế)-(Ngã ba đường vào Trường ĐH Khoa học Tự nhiên)-Bến xe buýt A Khu đô thị ĐH Quốc gia TP.HCM; </td>
								<td class=" a-right "> Bến xe buýt A Khu đô thị ĐH Quốc gia TP.HCM (rẽ phải)-(Ngã ba đường vào Trường ĐH Khoa học Tự nhiên)-(Ngã ba đường vào Trường ĐH Quốc tế)-(Ngã ba đường vào khu ký túc xá)-Đường 621-Quốc lộ 1A-(Trạm 2)-Quốc lộ 1A-Quốc lộ 13-Đinh Bộ Lĩnh-Nguyễn Xí-Ung Văn Khiêm-D2-Điện Biên Phủ-Xô Viết Nghệ Tĩnh-Nguyễn Thị Minh Khai-Đinh Tiên Hoàng-Lê Duẩn-Hai Bà Trưng-Tôn Đức Thắng-Hàm Nghi-Công trường Quách Thị Trang (trạm điều hành Sài Gòn). </td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="http://demo-admin.magentocommerce.com/index.php/admin/catalog_product/edit/id/166/key/0b58cae109f5da951b60e98f83eb8f0b/">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class="a-center"> 08 </td>
								<td class=" "> Bến xe Quận 8 – Đại học Quốc gia</td>
								<td class=" "> Bến xe Quận 8   </td>
								<td class=" "> Đại học Quốc gia </td>
								<td class=" "> Cự ly: Cự ly: 33,85km<br/>TGHĐ: 04h40 -20h20 </td>
								<td class="a-right"> Bến xe Quận 8 - Quốc lộ 50 - cầu Nhị Thiên Đường - Tùng Thiện Vương - cầu Chà Và - Hải Thượng Lãn Ông - quay đầu Triệu Quang Phục - Hải Thượng Lãn Ông - Châu Văn Liêm - Hồng Bàng - Lý Thường Kiệt - Hoàng Văn Thụ -Phan Đăng Lưu - Bạch Đằng - Xô Viết Nghệ Tĩnh - Quốc lộ 13 - Kha Vạn Cân – Linh Đông – Tô Ngọc Vân - Võ Văn Ngân - Xa lộ Hà Nội - Quốc lộ 52 - Quốc lộ 1A - Đường 621 - (Ngã ba đường vào khu ký túc xá) - (Ngã ba đường vào Trường ĐH Quốc Tế) - (Ngã ba đường vào Trường ĐH Khoa Học Tự Nhiên) - Bến xe buýt A Khu ĐH Quốc Gia TP.HCM</td>
								<td class="a-right"> Bến xe buýt A Khu ĐH Quốc Gia TP.HCM (rẽ phải) - (Ngã ba đường vào Trường ĐH Khoa học Tự nhiên) - (Ngã ba đường vào Trường ĐH Quốc tế) - (Ngã ba đường vào khu ký túc xá) - Đường 621 - Quốc lộ 1A - Quốc lộ 52 - Võ Văn Ngân – Tô Ngọc Vân – Linh Đông - Kha Vạn Cân - Quốc lộ 13 - Đinh Bộ Lĩnh - Bạch Đằng - Phan Đăng Lưu - Hoàng Văn Thụ - Xuân Diệu - Xuân Hồng - Trường Chinh - Lý Thường Kiệt - Hồng Bàng - Châu Văn Liêm - cầu Chà Và - Cao Xuân Dục - Tùng Thiện Vương - cầu Nhị Thiên Đường - Quốc lộ 50 - Bến xe Quận 8</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
						</tbody>
					</table>
					
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
