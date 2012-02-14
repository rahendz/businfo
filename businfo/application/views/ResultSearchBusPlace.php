<?php
	
	$str_htmlDi= str_replace('"', "'",$htmlLoTrinhDi);
	$str_htmlVe= str_replace('"', "'",$htmlLoTrinhVe);
?>
	<div id="ResultSearchBus">
	<span class="countPlace">
	<table id="ResultTableBus" width="295px">
		<tr>
			<td><b>Kết quả tìm:</b></td>	
		</tr>
	</table>
	</span>
		</div>
	<?php 
	if($htmlBus =="")
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
		$BusArray = explode("%", $htmlBus);
	
	$LoTrinhDiArray= explode("%", $str_htmlDi);
	$LoTrinhVeArray= explode("%", $str_htmlVe);
	//echo $LoTrinhDiArray[0];
	
	for ($i=0; $i<count($BusArray);$i++)
	{
		$BusArrayDetail = explode(";", $BusArray[$i]);
		
?>
		<div id="result<?php echo $i;?>" class="resultItem">
		<div id="ResultSearchBusPlaceDetail">
			<a class="icon1-10 red" rel="<?php echo $LoTrinhDiArray[$i];?>" onclick="makeactive(<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,<?php echo $i?>,'<?php echo base_url()?>')" target="_self"> <?php echo $BusArrayDetail[0]; ?><span class="icon1-10Hover"></span></a>
				<a class="resultTitle" rel="<?php echo $LoTrinhDiArray[$i];?>" onclick="makeactive(<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,<?php echo $i?>,'<?php echo base_url()?>')" target="_self">
				<b><?php echo $BusArrayDetail[1] ?></b>	</a>
				<div class="Spacer"></div>
				<ul  class="resultOptions">
					<li onclick="makeactivemenu(<?php echo $i?>,<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,0,'<?php echo base_url()?>')">
						<a class="" id ="t19_0">X</a>
					</li>
					<li onclick="makeactivemenu(<?php echo $i?>,<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,1,'<?php echo base_url()?>')">
						<a class="" id ="t19_1">Thông tin</a>
					</li>
					<li id="BusLoTrinhDiPlace" rel="<?php echo $LoTrinhDiArray[$i];?>" onclick="makeactivemenu(<?php echo $i?>,<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,2,'<?php echo base_url()?>')" target="_self">
						<a class="" id ="t19_2">Lộ trình đi</a>
					</li>
				 <li id="BusLoTrinhVePlace" rel="<?php echo $LoTrinhVeArray[$i];?>" onclick="makeactivemenu(<?php echo $i?>,<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,3,'<?php echo base_url()?>')" target="_self">
						<a class="" id ="t19_3">Lộ trình về</a>
					</li>
				
				<!--	<li onclick="makeactivemenu(<?php echo $i?>,<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,4,'<?php echo base_url()?>')">
						<a class="" id ="t19_4">Tìm xung quanh</a>
					</li>-->
					<li>
						<a href="" target="_blank">Chi tiết</a>
					</li>
				</ul>
				</div>
			</div>
			
			<div id="DetailResult<?php echo $i;?>" class="DetailResult" ></div>
														
			
<?php 
	}
	
	}	
?>
