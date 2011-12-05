<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Trang Quản Lý</title>
	<link rel="icon" href="" type="image/x-icon"/>
	<link rel="shortcut icon" href="" type="image/x-icon"/>
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/Reset_Text.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/Login.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/Menu.css" media="screen, projection"/>
	
	<script type="text/javascript" src="<?php echo base_url() ?>public/js/prototype.js"></script>

</head>

<body id="html-body"class=" adminhtml-dashboard-index">

	<div class="wrapper">
		<?php include("t_top_ad_home.php"); ?>
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
									<img class="arrow" alt="Trang trước" src="<?php echo base_url() ?>public/img/login/pager_arrow_left_off.gif">
									<input class="input-text page" type="text" onkeypress="" value="1" name="page">
									<a onclick="" title="Trang sau" href="#">
										<img class="arrow" alt="Trang sau" src="<?php echo base_url() ?>public/img/login/pager_arrow_right.gif">
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
			
							<thead>
								<tr Width="20" class="headings">
									<th >
										<span class="nobr">&nbsp;</span>
									</th>
									<th width="50">
										<span class="nobr">
										<a class="sort-arrow-desc" title="asc" name="entity_id" href="#">
											<span class="sort-title">Mã Trạm</span>
										</a>
										</span>
									</th>
									<th >
										<span class="nobr">
										<a class="not-sort" title="asc" name="name" href="#">
											<span class="sort-title">Tên Trạm</span>
										</a>
										</span>
									</th>
									<th width="240">
										<span class="nobr">
										<a class="not-sort" title="asc" name="type" href="#">
											<span class="sort-title">Tọa Độ</span>
										</a>
										</span>
									</th>
									<th width="250">
										<span class="nobr">
										<a class="not-sort" title="asc" name="set_name" href="#">
											<span class="sort-title">Địa Chỉ</span>
										</a>
										</span>
									</th>
								<th width="120">
									<span class="nobr">
									<a class="not-sort" title="asc" name="sku" href="#">
										<span class="sort-title">Các Tuyến Đi Qua</span>
									</a>
									</span>
									</th>
								<th class=" no-link last" width="70">
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
						<?php
						$i=1; 	
						foreach($query as $row) 
						{
							if($i %2 == 1)
							{
						?>
           					<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "><?php echo $row->matram;?></td>
								<td class=" "><?php echo $row->tentram;?></td>
								<td class=" "><?php echo $row->geo_lat ." - ". $row->geo_long;?> </td>
								<td class=" "> </td>
								<td class=" "> 08,19</td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
						<?php 
							}
							else 
							{
						?>
							<tr class="pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "><?php echo $row->matram;?></td>
								<td class=" "><?php echo $row->tentram;?></td>
								<td class=" "><?php echo $row->geo_lat ." - ". $row->geo_long;?> </td>
								<td class=" "> </td>
								<td class=" "><?php echo $row->tuyendiqua;?></td>
								<td class=" last">
									<a href="">Sửa</a>
								</td>
							</tr>
						<?php 
							}
							$i++;
						} 
						?>
						</tbody>
					</table>
					
				</div>
			</div>
		</div>			
				
		
		<?php include("t_bottom_ad_home.php"); ?>
	</div>


</body>
</html>
