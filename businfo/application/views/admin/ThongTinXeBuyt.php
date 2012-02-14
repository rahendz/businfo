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
									<h3 class="icon-head head-products">Thông tin các xe buýt</h3>
								</td>
								<td class="a-right">
									<button id="ThemTuyenBus" class="scalable add" style=""  onclick="parent.location='../admin/ThemTuyenBus.php'" type="button">
									<span>Thêm Tuyến Buýt</span>
								</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
						
				<div id="TuyenBusGrid">
					<table class="actions" cellspacing="0">
						<tbody>
							<tr>
								<td class="pager">
									Trang:
									<img class="arrow" alt="Trang trÆ°á»›c" src="http://localhost/businfo/public/img/login/pager_arrow_left_off.gif">
									<input class="input-text page" type="text" onkeypress="" value="1" name="page">
									<a onclick="" title="Trang sau" href="#">
										<img class="arrow" alt="Trang sau" src="http://localhost/businfo/public/img/login/pager_arrow_right.gif">
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
								<tr class="headings">
									<th width="20">
										<span class="nobr">&nbsp;</span>
									</th>
									<th width="50">
										<span class="nobr">
										<a class="sort-arrow-desc" title="asc" name="entity_id" href="#">
											<span class="sort-title">Mã Xe Buýt</span>
										</a>
										</span>
									</th>
									<th>
										<span class="nobr">
										<a class="not-sort" title="asc" name="name" href="#">
											<span class="sort-title">Biển số Xe</span>
										</a>
										</span>
									</th>
									<!-- 
									<th width="120">
										<span class="nobr">
										<a class="not-sort" title="asc" name="type" href="#">
											<span class="sort-title">Bến Đầu</span>
										</a>
										</span>
									</th>
									<th width="120">
										<span class="nobr">
										<a class="not-sort" title="asc" name="set_name" href="#">
											<span class="sort-title">Bến Cuối</span>
										</a>
										</span>
									</th>
									 -->
								<th width="150">
									<span class="nobr">
									<a class="not-sort" title="asc" name="sku" href="#">
										<span class="sort-title">Tuyến Hoạt Động</span>
									</a>
									</span>
									</th>
								<th width="150">
									<span class="nobr">
									<a class="not-sort" title="asc" name="sku" href="#">
										<span class="sort-title">Thời gian Xuất Bến</span>
									</a>
									</span>
								</th>
								<th width="150">
									<span class="nobr">
									<a class="not-sort" title="asc" name="price" href="#">
										<span class="sort-title">Tài Xế</span>
									</a>
									</span>
								</th>
								<th width="150">
									<span class="nobr">
									<a class="not-sort" title="asc" name="qty" href="#">
										<span class="sort-title">Tiếp Viên</span>
									</a>
									</span>
								</th>
								<th width="150">
									<span class="nobr">
									<a class="not-sort" title="asc" name="price" href="#">
										<span class="sort-title">Nơi Đỗ Hiện Tại</span>
									</a>
									</span>
								</th>
								<th width="150">
									<span class="nobr">
									<a class="not-sort" title="asc" name="qty" href="#">
										<span class="sort-title">Tình Trạng</span>
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
								<form id="frmSearchMaTuyen" action="<?php echo base_url();?>home/" enctype="multipart/form-data"  method="post"> 
									<div class="field-100">
										<input id="matuyen" class="input-text no-changes" type="text" value="" name="matuyen">								
									</div>
								</form>
								</th>
								<th>
								<form id="frmSearchTenTuyen" action="<?php echo base_url();?>home/" enctype="multipart/form-data"  method="post">
									<div class="field-100">
										<input id="tentuyen" class="input-text no-changes" type="text" value="" name="tentuyen">
									</div>
								</form>
								</th>
						<!-- 		<th>
									<select id="productGrid_product_filter_type" class="no-changes" name="type">
										<option value=""></option>
										<option value="1">ĐHQG TpHCM</option>
										<option value="3">Bến Thành</option>
										<option value="2">Bến Xe Quận 8</option>
									</select>
								</th>
								<th>
									<select id="productGrid_product_filter_set_name" class="no-changes" name="set_name">
										<option value=""></option>
										<option value="1">ĐHQG TpHCM</option>
										<option value="3">Bến Thành</option>
										<option value="2">Bến Xe Quận 8</option>
									</select>
								</th>
								 -->
								 <th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th class=" no-link last">&nbsp;</th>
							</tr>
						</thead>
						
						<tbody>
						<?php 	
						$i=1;
						if(count($query1->result())==0)
						{
						?>
							<tr class="even pointer" title="">
								<td class="a-center " colspan="6">
									Không tìm thấy xe buýt nào thỏa yêu cầu
								</td>
							</tr>
						<?php 
						}
						foreach($query1->result() as $row) 
						{
							$queryChuyenDi=$this->db->query("select * from luotdi where maxe=".$row->maxe.
								" and tinhtrang=0");
							$queryChuyenVe=$this->db->query("select * from luotve where maxe=".$row->maxe.
								" and tinhtrang=0");
							$countChuyenDi= $queryChuyenDi->num_rows();
							$countChuyenVe= $queryChuyenVe->num_rows();
							if($countChuyenDi>0)
								$ChuyenDi=$queryChuyenDi->row(0);
							if($countChuyenVe)
								$ChuyenVe=$queryChuyenVe->row(0);
							if($i %2 == 1)
							{	
						?>
							<tr class="even pointer" title="">
								<td class="a-center ">
									<input class="massaction-checkbox" type="checkbox" value="19" name="product">
								</td>
								<td class=" a-center "> <?php echo $row->maxe; ?> </td>
								<td class=" "><?php echo $row->biensoxe; ?></td>
								<td class=" "><?php echo $row->matuyen; ?></td>
								<td class=" a-left "> 
									<?php
										if($countChuyenDi>0)echo $ChuyenDi->thoigianxuatben;
										if($countChuyenVe>0)echo $ChuyenVe->thoigianxuatben;
									?>
								 </td>
								<td class=" "><?php echo $row->taixe; ?>  </td>
															
								<td class=" a-left ">  <?php echo $row->soatve;?></td>
								<td class=" a-left "> <?php if($row->bendo ==1) echo "Trạm cuối"; else echo "Trạm đầu";  ?></td>
								<td class=" a-left "> 
									<?php
										if(($countChuyenDi>0)||($countChuyenVe>0))echo "Đang chạy";
										else echo "Đang chờ"; 
									?>
								</td>
								<td class=" last">
									<?php
										if(($countChuyenDi>0)||($countChuyenVe>0));
										else { 
									?>
									<a href="">Xuất bến</a>
									<?php }?>
									
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
								<td class=" a-center "> <?php echo $row->maxe; ?> </td>
								<td class=" "><?php echo $row->biensoxe; ?></td>						
								<td class=" "><?php echo $row->matuyen; ?></td>
								<td class=" a-left "> 
									<?php
										if($countChuyenDi>0)echo $ChuyenDi->thoigianxuatben;
										if($countChuyenVe>0)echo $ChuyenVe->thoigianxuatben;
									?>
								 </td>
								<td class=" "><?php echo $row->taixe; ?>  </td>
															
								<td class=" a-left ">  <?php echo $row->soatve;?></td>
								<td class=" a-left "> <?php if($row->bendo ==1) echo "Trạm cuối"; else echo "Trạm đầu";  ?></td>
								
								<td class=" a-left "> 
									<?php
										if(($countChuyenDi>0)||($countChuyenVe>0))echo "Đang chạy";
										else echo "Đang chờ"; 
									?>
								</td>
								<td class=" last">
									<?php
										if(($countChuyenDi>0)||($countChuyenVe>0));
										else { 
									?>
									<a href="">Xuất bến</a>
									<?php }?>
									
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
