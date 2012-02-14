<?php
	$p = $_GET["id"];
	$row = $queryTuyen;

	switch($p) {
		case '0':
			echo '';
			break;
		
		case '1':
			echo	'<div class="kohailong"  > 
						<div id="fblnk" style="">
							<p>Thông tin tuyến buýt</p>
							<ul>
								<li>
									Thời gian vận hành: ';echo $row->tgvanhanh; echo ' 
								</li>
								<li>
									Tổng chuyến: ';echo $row->tongchuyen; echo ' chuyến/ngày
								</li>
								<li>
									Thời gian giãn cách: ';echo $row->tggcthap .' - '. $row->tggccao; echo '
								</li>
							</ul>
						</div>
					</div>';
			break;
		
		case '2':
			echo '<div class="kohailong"  > 
							<div id="fblnk" style="">
								<p>Lộ trình đi</p>
									<ul>
										<li>
											';echo $row->lotrinhdi; echo ' 
										</li>
									</ul>
							</div>
						</div>';
			break;
		
		case '3': 
			echo '<div class="kohailong"  > 
							<div id="fblnk" style="">
								<p>Lộ trình về</p>
									<ul>
										<li>
											';echo $row->lotrinhve; echo ' 
										</li>
									</ul>
							</div>
						</div>';
			break;

		case '4': default:
			echo '<div class="kohailong"  > 
							<div id="fblnk" >
								<p>Tìm dịch vụ xung quanh</p>
									<ul>
										<li style="padding: 0 30px 5px;">
											<div id="direction0" class="direction-item2" style="width: 100px;">
												<span>Dịch vụ:</span>
												<input id="ServiceSearchPlaceAroundBus" class="boxtimduong timduong-default" style="top:0px; left:60px; width: 150px;" type="text" value="Nhập vào loại dịch vụ...">
											</div> 
										</li>
										<div class="Spacer"></div>
										<li>
											<div id="direction0" class="direction-item2" >
												<span>Bán kính:</span>
												<input id="RadiusSearchPlaceAroundBus" class="boxtimduong timduong-default" style="top:0px;left:60px; width: 150px;" type="text" value="500">
												<span class="keyPlace" style="width:40px; padding: 0 100px 8px;"><span class="searchinwrap">
													<a><span onclick="SearchPOIArroundRoute()">Tìm</span></a>
												</span></span>
											</div> 
										</li>
									</ul>
							</div>
						</div>
						<div id="SearchPlaceArroundBusResult" ></div>';
			break;
	}
?>