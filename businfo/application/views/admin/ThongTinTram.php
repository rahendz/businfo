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
									<h3 class="icon-head head-products">Thông Tin Các Trạm Bus</h3>
								</td>
								<td class="a-right">
									<button id="ThemTuyenBus" class="scalable add" style="" onclick="parent.location='../admin/ThemTramBus.php'" type="button">
									<span>Thêm Trạm Bus</span>
								</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<p class="switcher">
				<!--  	<label for="store_switcher">Bến đầu / cuối:</label>
					<select id="store_switcher" onchange="return switchStore(this);" name="store_switcher">
						<option value="">Tất cả các bến</option>
						<option value="1">ĐHQG TpHCM</option>
						<option value="3">Bến Thành</option>
						<option value="2">Bến xe Quận 8</option>
					</select>
				-->
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
							<col width="250">
							<col width="200">
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
											<span class="sort-title">Mã Trạm</span>
										</a>
										</span>
									</th>
									<th>
										<span class="nobr">
										<a class="not-sort" title="asc" name="name" href="#">
											<span class="sort-title">Tên Trạm</span>
										</a>
										</span>
									</th>
									<th>
										<span class="nobr">
										<a class="not-sort" title="asc" name="type" href="#">
											<span class="sort-title">Tọa Độ</span>
										</a>
										</span>
									</th>
									<th>
										<span class="nobr">
										<a class="not-sort" title="asc" name="set_name" href="#">
											<span class="sort-title">Địa Chỉ</span>
										</a>
										</span>
									</th>
								<th>
									<span class="nobr">
									<a class="not-sort" title="asc" name="sku" href="#">
										<span class="sort-title">Các Tuyến Đi Qua</span>
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
									<div class="field-100">
										<input id="toado" class="input-text no-changes" type="text" value="" name="name">
									</div>
								</th>
								<th>
									<div class="field-100">
										<input id="diachi" class="input-text no-changes" type="text" value="" name="name">
									</div>
								</th>
								<th>
									<div class="field-100">
										<input id="tuyenbus" class="input-text no-changes" type="text" value="" name="name">
									</div>
								</th>
								<th class=" no-link last">&nbsp;</th>
							</tr>
						</thead>
						
						<tbody>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 1 </td>
								<td class=" "> Bến xe ĐHQG TpHCM </td>
								<td class=" "> 10.875871679728599,106.80093348026276  </td>
								<td class=" "> </td>
								<td class=" "> 08,19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 2 </td>
								<td class=" "> Suối Tiên </td>
								<td class=" "> 10.866126261141565,106.80206537246704  </td>
								<td class=" "> </td>
								<td class=" "> 08,19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 3 </td>
								<td class=" "> ĐH CNTT ĐHQG TpHCM</td>
								<td class=" "> 10.86901455745209,106.80390939116478 </td>
								<td class=" "> </td>
								<td class=" "> 08,19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 4 </td>
								<td class=" "> ĐH Nông Lâm </td>
								<td class=" "> 10.86769092307778,106.78854703903198  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 5 </td>
								<td class=" "> ĐH Kinh Tế Luật (Linh Xuân) </td>
								<td class=" "> 10.870122191257042,106.77631348371506  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 6 </td>
								<td class=" "> Khu CX Linh Trung I</td>
								<td class=" "> 10.872479685903402,106.76766067743301 </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 7 </td>
								<td class=" "> Khu CN Sóng Thần </td>
								<td class=" "> 10.874671217289244,106.74691379070282  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 8 </td>
								<td class=" "> Chợ Đầu Mối Thủ Đức</td>
								<td class=" "> 10.868317839194859,106.72970741987228  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 9</td>
								<td class=" "> Cầu Vượt Bình Phước</td>
								<td class=" "> 10.864111154140145,106.7257109284401 </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr> 
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 10 </td>
								<td class=" "> CA P.Hiệp Bình Phước </td>
								<td class=" "> 10.856316644907103,106.72258615493774  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 11 </td>
								<td class=" "> C.Ty Kinh Đô </td>
								<td class=" "> 10.838829625801347,106.71537101268768  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 12 </td>
								<td class=" "> ĐH Luật TpHCM -Chợ Bình Triệu I</td>
								<td class=" "> 10.830005053332693,106.7144563794136 </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 13 </td>
								<td class=" "> Ngã tư Bình Triệu </td>
								<td class=" "> 10.826851616655793,106.71470046043396  </td>
								<td class=" "> </td>
								<td class=" "> 08,19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 14 </td>
								<td class=" "> Bến xe Miền Đông </td>
								<td class=" "> 10.817177709119356,106.71175807714462  </td>
								<td class=" "> </td>
								<td class=" "> 08,19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 15 </td>
								<td class=" "> Nguyễn Xí</td>
								<td class=" "> 10.812424945211228,106.71060740947723 </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 16 </td>
								<td class=" "> Ung Văn Khiêm</td>
								<td class=" "> 10.80899864048627,106.71360075473785  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 17</td>
								<td class=" "> Cafe D2 </td>
								<td class=" "> 10.807355949952361,106.71596646308899  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 18 </td>
								<td class=" "> ĐH GTVT TpHCM</td>
								<td class=" "> 10.804808246929824,106.715607047081 </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 19 </td>
								<td class=" ">ĐH Kỹ Thuật Công Nghệ</td>
								<td class=" "> 10.801575504734686,106.71427130699158  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> 20 </td>
								<td class=" ">Hàng Xanh</td>
								<td class=" "> 10.800537,106.711143  </td>
								<td class=" "> </td>
								<td class=" "> 19</td>
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
