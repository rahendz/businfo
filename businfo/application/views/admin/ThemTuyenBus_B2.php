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
	<script src="http://maps.google.com/maps?indexing=false&amp;file=api&amp;v=2&amp;indexing=false&amp;key=ABQIAAAA0HPcSVWJKlo5kHbW_wY_zBRDVj_Q1DBcSaFa2U8I4KZQmgQPfRSW9G2WwDzuXZvqgS8WskdXWEpd6g" type="text/javascript"></script>
	<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;indexing=false&amp;key=ABQIAAAA0HPcSVWJKlo5kHbW_wY_zBRDVj_Q1DBcSaFa2U8I4KZQmgQPfRSW9G2WwDzuXZvqgS8WskdXWEpd6g" type="text/javascript"></script>
	
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
							<li class="lastDone"><a title=""><em>Bước 1: Thông Tin Tuyến Bus</em><span> </span></a></li>
							<li class="current"><a title=""><em>Bước 2: Xác Định Lộ Trình Đi</em><span></span></a></li>
							<li><a title=""><em>Bước 3: Trạm Bus Lộ Trình Đi</em><span></span></a></li>
							<li><a title=""><em>Bước  4: Xác Định Lộ Trình Về</em><span></span></a></li>
							<li class="mainStepNavNoBg"><a title=""><em>Bước 5: Trạm Bus Lộ Trình Về</em> <span></span></a></li>
						</ul>
					</div>
				</div>
				
				<div class="clearfloat">&nbsp;</div>
				<div class="columns ">
					<div id="page:left" class="side-col">
						<h3>Lộ Trình Đi</h3>
					</div>
					<div id="content" class="main-col">
						<div class="main-col-inner">
						<form id="frmInsertTuyenBusB2" action="<?php echo base_url();?>home/ThemTuyenBusB3/" enctype="multipart/form-data"  method="post">
							<div id="product_info_tabs_group_4_content" style="">
								<div class="entry-edit">
									<div class="entry-edit-head">
										<h4 class="icon-head head-edit-form fieldset-legend">Lộ Trình Đi Của Tuyến Bus</h4>
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
<script type="text/javascript">
    if (GBrowserIsCompatible()) {

  var map = new GMap2(document.getElementById("mm-map"));
  map.setCenter(new GLatLng(10.7569353, 106.6686039),13)
  map.addControl(new GLargeMapControl());
  map.addControl(new GMapTypeControl());
  var dirn = new GDirections();

  var firstpoint = true;
  var gmarkers = [];
  var gpolys = [];
  var dist = 0;


  GEvent.addListener(map, "click", function(overlay,point) {
    // == When the user clicks on a the map, get directiobns from that point to itself ==
    if (!overlay) {
      if (firstpoint) {
        dirn.loadFromWaypoints([point.toUrlValue(6),point.toUrlValue(6)],{getPolyline:true});
      } else {
        dirn.loadFromWaypoints([gmarkers[gmarkers.length-1].getPoint(),point.toUrlValue(6)],{getPolyline:true});
      }
    }
  });

  // == when the load event completes, plot the point on the street ==
  GEvent.addListener(dirn,"load", function() {
    // snap to last vertex in the polyline
    var n = dirn.getPolyline().getVertexCount();
    var p=dirn.getPolyline().getVertex(n-1);
    var marker=new GMarker(p);
    map.addOverlay(marker);
    // store the details
    gmarkers.push(marker);
    if (!firstpoint) {
      map.addOverlay(dirn.getPolyline());
      gpolys.push(dirn.getPolyline());
      dist += dirn.getPolyline().Distance();
      document.getElementById("distance").innerHTML="Path length: "+(dist/1000).toFixed(2)+" km. "+(dist/1609.344).toFixed(2)+" miles.";
    }
    firstpoint = false;
  });

  GEvent.addListener(dirn,"error", function() {
    GLog.write("Failed: "+dirn.getStatus().code);
  });

}
else {
  alert("Sorry, the Google Maps API is not compatible with this browser");
}
    </script>

</body>
</html>
