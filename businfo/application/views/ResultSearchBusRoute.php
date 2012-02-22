<div id="ResultSearchBusRoute">
	<span class="countPlace">
	<table id="ResultTableBusRoute" width="295px">
		<tr>
			<td><b>Kết quả tìm:</b></td>	
		</tr>
	</table>
	</span>
		</div>
<?php

	//echo $htmlHuongDanDi;
	$HuongDanDiArray= explode(";", $htmlHuongDanDi);
	$str_htmlChuoiCacTram= str_replace('"', "'",$htmlChuoiCacTram);
	$ChuoiCacTramArray= explode(";",$str_htmlChuoiCacTram);
	//echo $$htmlChuoiCacTram;
	//$str_htmlDi= str_replace('"', "'",$htmlLoTrinhDi);
	//$str_htmlVe= str_replace('"', "'",$htmlLoTrinhVe);
	//if($htmlBus =="")
	if($htmlHuongDanDi=="")
	{
	?>
	<div id="fblnk" style="">
			<div id="SearchBusStopArroundPlaceResult" class="kohailong"> 
		
			<ul>
			<li id="SearchBusStopResult-1">Không tìm thấy tuyến buýt nào phù hợp với điều kiện tìm kiếm</li>
			</ul>
		</div>
	</div>	
	<?php 
	}
	else
	{
		//$BusArray = explode("%", $htmlBus);
	
//	$LoTrinhDiArray= explode("%", $str_htmlDi);
	//$LoTrinhVeArray= explode("%", $str_htmlVe);
	//echo $LoTrinhDiArray[0];
	$countResult=0;
	for ($i=0; $i<count($HuongDanDiArray);$i++)
	{
		//$BusArrayDetail = explode(";", $BusArray[$i]);
		if ($HuongDanDiArray[$i]!="")
		{
			$countResult++;
		$HuongDanQuangDuong= explode("#", $HuongDanDiArray[$i]);
		$QuangDuong=explode("-",$HuongDanQuangDuong[1]);
		$TongQuangDuong=$QuangDuong[0]/1000;
		$ThoiGian=$QuangDuong[1];
		$HuongDanDiArrayDetail = explode(">", $HuongDanQuangDuong[0]);
		//$ChuoiCacTramArrayDetail = explode(">", $ChuoiCacTramArray[$i]);
		$TuyenBus="";
		$CountTuyenBus=0;
		for ($h=0; $h<count($HuongDanDiArrayDetail);$h++)
		{
			$BusInfo=explode("-", $HuongDanDiArrayDetail[$h]);
			//$BusDiOrVe= explode("&", $BusInfo[0]);
			$temp=0;
			
			for($t=0;$t<$h;$t++)
			{
				$BusInfo1=explode("-", $HuongDanDiArrayDetail[$t]);
				//$BusDiOrVe1= explode("&", $BusInfo1[0]);
				if($BusInfo[0]==$BusInfo1[0])
					$temp++;
			}
			if($temp==0)
			{
				//echo $BusDiOrVe[0];
				if($CountTuyenBus==0)
				{
					$BusDiOrVe= explode("&", $BusInfo[0]);
					if($BusDiOrVe[1]=="Di")
						$TuyenBus.=$BusDiOrVe[0]." Lượt đi";
					else
						$TuyenBus.=$BusDiOrVe[0]." Lượt về";
					$CountTuyenBus++;
				}
				else 
				{
					$BusDiOrVe= explode("&", $BusInfo[0]);
					if($BusDiOrVe[1]=="Di")
						$TuyenBus.=" - ".$BusDiOrVe[0]." Lượt đi";
					else
						$TuyenBus.=" - ".$BusDiOrVe[0]." Lượt về";
				}
				
			} 
		}
		
?>
		<div id="result<?php echo $countResult;?>" class="resultItem">
			<div id="ResultSearchBusRouteDetail">
				<div class="pin1-10 btns large red"><a><?php echo $countResult;?></a></div>
				
				<!--  <a class="resultTitle" rel="<?php echo $LoTrinhDiArray[$i];?>" onclick="makeactive(<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,<?php echo $countResult?>,'<?php echo base_url()?>')" target="_self">
				Tuyến xe buýt số <?php echo $TuyenBus; //$BusArrayDetail[0];?></a>
				-->
				<a class="resultTitle" rel="<?php echo $ChuoiCacTramArray[$countResult-1];?>" onclick="makeRouteBusActive(100,<?php echo $countResult;?>)" target="_self">
					<table>
						<tr>
						<td width="220px" rowspan=2>Tuyến xe buýt số <?php echo $TuyenBus; ?></td>
						<td align="center"><span class="time" ><?php echo $ThoiGian;?></span></td>
						</tr>
						<tr>
						<td>phút</td>
						</tr>
					</table>
					
				
				</a>
				<div class="Spacer"></div>
			</div>
		</div>	
		
			<div id="guide<?php echo $countResult;?>" class="direction-guide">
				<span class="options background">
					<a class="expand" onclick="CloseDirection(this)">Ẩn</a>
					<!--  
					<a class="s-service" onclick="ShowSearchNearByShortestPath(this)">Tìm dịch vụ trên đoạn này</a>
					-->
				</span>
				<div id="ResultSearchRouteDetail">
				<ol class="stepsList" style="display: none;">
				<?php 
				$count=0;
				for ($k=0;$k<count($HuongDanDiArrayDetail);$k++)
				{
					$BusInfoArray=explode("-", $HuongDanDiArrayDetail[$k]);
					$BusDiOrVeArray=explode("&", $BusInfoArray[0]);
					$SttTramArray=explode("%", $BusInfoArray[1]);
					// 2 tuyến trạm giao
					if((count($HuongDanDiArrayDetail)%2!=0)&&($k==(count($HuongDanDiArrayDetail)-1)))
						{
							//$BusDiOrVeArray=explode("&", $BusInfoArray[0]);
							?>
							<li id="106.80578453_10.87072958" class="StepList" onmouseout="OutDirectionGuide(this)" onmouseover="OverDirectionGuide(this,0, 3)" onclick="GetRoadFromShortestPath(this,0)">
							<a><?php $count++; echo $count?></a>
							<span class="instruction">
								<span>Đón xe buýt có mã số
									<span class="instructionKeyword" style="color:red;font-size: 14px;">		
										<?php echo $BusDiOrVeArray[0];?>
									</span>
									<br>
									<span> Tên tuyến
									<?php 
										$queryTuyen = $this->db->query("select * from tuyenbus where matuyen=". $BusDiOrVeArray[0]);
										$ret=$queryTuyen->row(0);
									?> 
									<span class="instructionKeyword"><?php echo  $ret->tentuyen;?></span>
									</span>								
									<br>
									<span> Theo hướng
										<span class="instructionKeyword"><?php If($BusDiOrVeArray[1]=="Di") echo "Lượt đi"; else echo "Lượt về";?></span>
									</span>
								</span>
							</span>
							<span class="distance"></span>
						</li>
						<?php
							$queryTram = $this->db->query("select * from trambus where matram=". $SttTramArray[0]);
							$retTram=$queryTram->row(0); 
						?>
						<li rel="<?php echo $retTram->geo_lat.'_'.$retTram->geo_long;?>" class="StepList" onmouseout="OutDirectionGuide(this)" onmouseover="OverDirectionGuide(this,0, 3)" onclick="GetRoadFromShortestPath(this,0)">
							<a><?php $count++; echo $count;?></a>
							<span class="instruction">
								<span>Xuống các trạm 
								<?php 
									for ($t=0; $t<count($SttTramArray);$t++)
									{
										$query = $this->db->query("select * from trambus where matram=". $SttTramArray[$t]);
										$ret=$query->row(0);
								?>
									<span class="instructionKeyword"><?php if($t!=0)echo ", "; echo $ret->tentram;?></span>
								<?php
									} 
								?>
								</span>
							</span>
							<span class="distance">  </span>
						</li>
							<?php
							break;
							 
						}
						
					$count++;
					if($k %2==0)
					{
						$queryTram = $this->db->query("select * from trambus where matram=". $SttTramArray[0]);
						$retTram=$queryTram->row(0);
					?>
						
						<li  rel="<?php echo $retTram->geo_lat.'_'.$retTram->geo_long;?>" class="StepList" onmouseout="OutDirectionGuide(this)" onmouseover="OverDirectionGuide(this,0, 3)" onclick="">
							<a><?php echo $count?></a>
							<span class="instruction">
								<span>Đi tới các trạm 
								<?php 
									for ($t=0; $t<count($SttTramArray);$t++)
									{
										$query = $this->db->query("select * from trambus where matram=". $SttTramArray[$t]);
										$ret=$query->row(0);
								?>
									<span class="instructionKeyword"><?php if($t!=0)echo ", "; echo $ret->tentram;?></span>
								<?php
									} 
								?>
								</span>
							</span>
							<span class="distance">  </span>
						</li>
						<li id="106.80578453_10.87072958" class="StepList" onmouseout="OutDirectionGuide(this)" onmouseover="OverDirectionGuide(this,0, 3)" onclick="GetRoadFromShortestPath(this,0)">
							<a><?php $count++; echo $count?></a>
							<span class="instruction">
								<span>Đón xe buýt có mã số
									<span class="instructionKeyword" style="color:red;font-size: 14px;">		
										<?php echo $BusDiOrVeArray[0];?>
									</span>
									<br>
									<span> Tên tuyến
									<?php 
										$queryTuyen = $this->db->query("select * from tuyenbus where matuyen=". $BusDiOrVeArray[0]);
										$ret=$queryTuyen->row(0);
									?> 
									<span class="instructionKeyword"><?php echo  $ret->tentuyen;?></span>								
									</span>
									<br>
									<span> Theo hướng
										<span class="instructionKeyword"><?php If($BusDiOrVeArray[1]=="Di") echo "Lượt đi"; else echo "Lượt về"; ?></span>
									</span>
								</span>
							</span>
							<span class="distance">  </span>
						</li>
					<?php
					}
					else
				{
						
						$BusInfoArray=explode("-", $HuongDanDiArrayDetail[$k]);
						$SttTramArray=explode("%", $BusInfoArray[1]);
						$queryTram = $this->db->query("select * from trambus where matram=". $SttTramArray[0]);
						$retTram=$queryTram->row(0);
					?>
					
						
						<li rel="<?php echo $retTram->geo_lat.'_'.$retTram->geo_long;?>" class="StepList" onmouseout="OutDirectionGuide(this)" onmouseover="OverDirectionGuide(this,0, 3)" onclick="GetRoadFromShortestPath(this,0)">
							<a><?php echo $count?></a>
							<span class="instruction">
								<span>Xuống các trạm 
								<?php 
									for ($t=0; $t<count($SttTramArray);$t++)
									{
										$query = $this->db->query("select * from trambus where matram=". $SttTramArray[$t]);
										$ret=$query->row(0);
								?>
									<span class="instructionKeyword"><?php if($t!=0)echo ", "; echo $ret->tentram;?></span>
								<?php
									} 
								?>
								</span>
							</span>
							<span class="distance">  </span>
						</li>
						
					<?php
					}
				} 
				?>
				</ol>
				<div class="summary" style="display: none;">
					Chiều dài:<b><?php echo $TongQuangDuong;?></b>km
				</div>										
			</div>		
		</div>
			
			
			
				
			
<?php 
	}
	}
	}	
?>
