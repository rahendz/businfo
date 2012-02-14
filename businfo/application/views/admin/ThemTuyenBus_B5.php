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
	
	<!-- JAVASCRIPT -->
    <script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=ja"></script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=true&libraries=places&language=vi"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi?key={APIKEY}"></script>
	<script type="text/javascript">	google.load("jquery", "1.4.2");	</script>
				
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/googlemapAdmin.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/TabResults.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/RouteBox.js"></script>
    
    <script type="text/javascript">
    try {
        $(document).ready(function(){
            initialize(<?php echo $init_lat; ?>, <?php echo $init_long; ?>, <?php echo $init_add?>, '', false);
            //handle_clicks();
        });
      	<?php echo $htmltext;
      		   
      	?>
    } catch (e) {
        alert (e.message);  //this executes if jQuery isn't loaded // '<php echo $php_array;?>'
    }
    </script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jsAjax.js"></script>
	
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jsTabMenu.js"></script>
    
	 <script type="text/javascript">
		$().ready(function() {
		$('#coda-slider-1').codaSlider();
		});
	</script>


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
						<ul id="mainStepNav" class="fiveStep">
							<li class="done"><a title=""><em>Bước 1: Thông Tin Tuyến Bus</em><span> </span></a></li>
							<li class="done"><a title=""><em>Bước 2: Xác Định Lộ Trình Đi</em><span></span></a></li>
							<li class="done"><a title=""><em>Bước 3: Trạm Bus Lộ Trình Đi</em><span></span></a></li>
							<li class="lastDone"><a title=""><em>Bước  4: Xác Định Lộ Trình Về</em><span></span></a></li>
							<li class="current" class="mainStepNavNoBg"><a title=""><em>Bước 5: Trạm Bus Lộ Trình Về</em> <span></span></a></li>
						</ul>
					</div>
				</div>
				
				<div class="clearfloat">&nbsp;</div>
				<div class="columns ">
					<div id="page:left" class="side-col">
						<h3>Các Trạm Bus Lộ Trình Bus Về Tuyến <?php echo $route;?></h3>
						<div id="guide1" class="direction-guide">
							<ol class="stepsList" style="display: block;">
							
							<?php 
							$i=0;
							foreach($TramBus as $row) 
							{
							?>
								<li id="resultTram<?php echo $i+1;?>" class="StepList" onmouseout="OutDirectionGuide(this)" onmouseover="OverDirectionGuide(this,0, 3)" onclick="GetRoadFromShortestPath(this,0)">
									<a><?php echo $row->stttram;?></a>
									<span class="instruction">
									<span><?php echo $row->tentram;?></span>
									<?php
										if($i==0)
										{ 
									?>
										<span class="distance" id="khoangcach0">0 m</span>
									<?php
										}
										else
										{ 
									?>
										<span class="distance" id="khoangcach<?php echo $i?>"></span>
										<?php 
										}
										?>
									</span>
								</li>
							<?php
								$i++;
							} 
							?>
							</ol>
						</div>
					</div>
					<div id="content" class="main-col">
						<div class="main-col-inner">
						<form id="frmInsertTuyenBusB5" action="<?php echo base_url();?>home/ThemTuyenBusB6/" enctype="multipart/form-data"  method="post">
							<div id="product_info_tabs_group_4_content" style="">
								<div class="entry-edit">
									<div class="entry-edit-head">
										<h4 class="icon-head head-edit-form fieldset-legend">Trạm Bus Của Lộ Trình Về Tuyến Bus</h4>
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
														<td>
															<input id="khoangcach" type="text" name="khoangcach" value="" style="display:none">
															<input id="matuyen" type="text" name="matuyen" value="<?php echo $route;?>" style="display:none">
														</td>
													</tr>
													
													<tr>
														<td>
															<div id="mm-map" class="" style="overflow: hidden;  width: 100%; height: 500px;"></div>
														</td>
													</tr>
													<tr height="10px" ><td></td></tr>
													<tr>
														<td class="label" align="center">
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
										</div>
									</div>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("t_bottom_ad_home.php"); ?>
	</div>


</body>
</html>
