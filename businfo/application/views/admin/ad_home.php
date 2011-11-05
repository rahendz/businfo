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
			<div id="page:main-container">
				<div id="messages"></div>
				<div class="content-header">
					<table cellspacing="0">
						<tr>
							<td><h3 class="head-dashboard">Thống Kê</h3></td>
						</tr>
					 </table>
				</div>
				
				<div class="dashboard-container">
					
					<table cellspacing="25" width="100%">
						<tr>
							<td> 
								<div class="entry-edit">
									<div class="entry-edit-head"><h4>5 Tuyến bus được tìm gần đây nhất</h4></div>
									<fieldset class="np">
										<div class="grid np">
											<table cellspacing="0" style="border:0;" id="lastSearchGrid_table">
												<col width="40"/>
												<col width="250" />
												<col width="200" />
												<thead>
													<tr class="headings">
													<th class=" no-link"><span class="nobr">Mã Tuyến</span></th>
													<th class=" no-link"><span class="nobr">Tên Tuyến</span></th>
													<th class=" no-link last"><span class="nobr">Thông Tin Tuyến</span></th>
													</tr>
												</thead>
												<tbody>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
												</tbody>
											</table>
										</div>
									</fieldset>
								</div>
								
								<div class="entry-edit">
									<div class="entry-edit-head"><h4>5 Tuyến bus được tìm nhiều nhất</h4></div>
									<fieldset class="np">
										<div class="grid np">
											<table cellspacing="0" style="border:0;" id="lastSearchGrid_table">
												<col width="40"/>
												<col width="250" />
												<col width="200" />
												<thead>
													<tr class="headings">
													<th class=" no-link"><span class="nobr">Mã Tuyến</span></th>
													<th class=" no-link"><span class="nobr">Tên Tuyến</span></th>
													<th class=" no-link last"><span class="nobr">Thông Tin Tuyến</span></th>
													</tr>
												</thead>
												<tbody>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
												</tbody>
											</table>
										</div>
									</fieldset>
								</div> 
							</td>
							<td>
							<div class="entry-edit">
								<div class="entry-edit-head"><h4>10 Địa điểm được bình chọn nhiều nhất</h4></div>
									<p class="switcher"><label for="store_switcher">Loại địa điểm: </label>
										<select name="store_switcher" id="store_switcher" onchange="return switchStore(this);">
											<option value="">Tất cả</option>
												<optgroup label="Ăn uống"></optgroup>
												<optgroup label="Trường học"></optgroup>
												<optgroup label="Vui chơi - giải trí">
													<option value="1">&nbsp;&nbsp;&nbsp;&nbsp;Công viên</option>
													<option value="3">&nbsp;&nbsp;&nbsp;&nbsp;Nhà hát - Rạp phim</option>
													<option value="2">&nbsp;&nbsp;&nbsp;&nbsp;Khu du lịch</option>
												</optgroup>
										</select>
									</p>
									<script type="text/javascript">
									  function switchStore(obj){
									    var storeParam = obj.value ? 'store/'+obj.value + '/' : '';
									    if(obj.switchParams){
									      storeParam+= obj.switchParams;
									    }
									      setLocation('http://demo-admin.magentocommerce.com/index.php/admin/dashboard/index/key/ae6d62fc225266898d8a4f628530f24f/'+storeParam);
									    }
									</script>
									<fieldset class="np">
										<div class="grid np">
											<table cellspacing="0" style="border:0;" id="lastSearchGrid_table">
												<col width="40"/>
												<col width="250" />
												<col width="200" />
												<thead>
													<tr class="headings">
													<th class=" no-link"><span class="nobr">Tên Địa Điểm</span></th>
													<th class=" no-link"><span class="nobr">Địa Chỉ</span></th>
													<th class=" no-link last"><span class="nobr">Thông Tin</span></th>
													</tr>
												</thead>
												<tbody>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
													<tr title="">
														<td class=" ">19</td>
														<td class=" a-right ">Bến Thành - KCX Linh Trung - Đại học Quốc gia</td>
														<td class=" a-right last">Cự ly: 25,95 km </n>TGHĐ: 05h00 -20h00 </td>
													</tr>
												</tbody>
											</table>
										</div>
									</fieldset>
								</div>
		        			</td>
						</tr>
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
