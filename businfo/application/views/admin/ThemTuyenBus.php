<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Trang Quản Lý</title>
	<link rel="icon" href="" type="image/x-icon"/>
	<link rel="shortcut icon" href="" type="image/x-icon"/>
	
	<link rel="stylesheet" type="text/css" href="http://demo-admin.magentocommerce.com/js/calendar/calendar-win2k-1.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/Reset_Text.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/Login.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/Menu.css" media="screen, projection"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/step-menu.css" title ="mainStepNav" media="all" />
	<script type="text/javascript" src="<?php echo base_url() ?>public/js/prototype.js"></script>

</head>

<body id="html-body"class=" adminhtml-dashboard-index">
	<div class="wrapper">
		<?php include("t_top_ad_home.php"); ?>
		
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
							<form id="frmInsertTuyenBus" action="<?php echo base_url();?>home/ThemTuyenBusB2/" enctype="multipart/form-data"  method="post">
								<table class="form-list" cellspacing="0">
									<tbody>
										<tr>
											<td class="label">
												<label for="id">Mã Tuyến:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="id" class=" required-entry input-text required-entry" type="text" value="" name="matuyen">
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="name">Tên Tuyến:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="name" class=" required-entry input-text required-entry" type="text" value="" name="tentuyen">
											</td>
										</tr>
										<!--
										<tr>
											<td class="label">
												<label for="BenDau">Bến Đầu:
													<span class="required">*</span>
												</label>
											</td>
											 
											<td class="value">
												<select id="BenDau" class=" required-entry required-entry select" name="tramdau">
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
												<select id="BenCuoi" class=" required-entry required-entry select" name="tramcuoi">
													<option selected="selected" value="">-- Chọn --</option>
													<option value="1">ĐHQG TpHCM</option>
													<option value="2">Bến Thành</option>
													<option value="3">Bến xe Quận 8</option>
												</select>
											</td>
										</tr>
										 -->
										<tr>
											<td class="label">
												<label for="info">Thời gian vận hành:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="tgvh" class=" required-entry input-text required-entry" type="text" value="" name="tgvh">
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="info">Thời gian giãn cách cao điểm:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="tggccao" class=" required-entry input-text required-entry" type="text" value="" name="tggccao">
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="info">Thời gian giãn cách thấp điểm:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="tggcthap" class=" required-entry input-text required-entry" type="text" value="" name="tggcthap">
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="info">Tổng chuyến:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<input id="tongchuyen" class=" required-entry input-text required-entry" type="text" value="" name="tongchuyen">
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="LoTrinhDi">Lộ Trình Đi:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<textarea id="lotrinhdi" class=" textarea" cols="15" rows="2" name="lotrinhdi"></textarea>
											</td>
										</tr>
										<tr>
											<td class="label">
												<label for="LoTrinhVe">Lộ Trình Đi:
													<span class="required">*</span>
												</label>
											</td>
											<td class="value">
												<textarea id="lotrinhve" class=" textarea" cols="15" rows="2" name="lotrinhve"></textarea>
											</td>
										</tr>
										<tr>
											<td class="label" colspan="2" align="center">
												<div class="form-buttons" style="float: Left">
													<button id="Reset" class="scalable add" style="" onclick="" type="button">
														<span>Hủy</span>
													</button>
													<button id="Save" class="scalable add" style="" onclick="" type="submit">
														<span>Lưu và Tiếp Tục</span>
													</button>
												</div>
											</td>
											
										</tr>
									</tbody>
								</table>
							</form>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<?php include("t_bottom_ad_home.php"); ?>
	</div>


</body>
</html>
