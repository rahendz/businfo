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
		
		case '3': 
			echo '<div class="kohailong"  > 
							<div id="fblnk" style="">
								<p>Lộ trình về</p>
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

		case '4': default:
			echo '<div class="kohailong"  > 
							<div id="fblnk" >
								<p>Tìm dịch vụ xung quanh</p>
									<ul>
										<li style="padding: 0 30px 5px;">
											<div id="direction1" class="direction-item" style="width: 100px;">
												<span>Dịch vụ:</span>
												<input class="boxtimduong timduong-default" style="top:0px; width: 150px;" type="text" value="Nhập vào loại dịch vụ...">
											</div> 
										</li>
										<div class="Spacer"></div>
										<li>
											<div id="direction1" class="direction-item" >
												<span>Bán kính:</span>
												<input class="boxtimduong timduong-default" style="top:0px; width: 150px;" type="text" value="500">
											</div> 
										</li>
									</ul>
							</div>
						</div>';
			break;
	}
?>