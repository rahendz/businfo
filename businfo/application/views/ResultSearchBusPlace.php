<?php
	/*$array_lat="";
	$array_long="";
	$array_name="";
	$i=1; 	
	foreach($queryTram as $row) 
	{
		if($i==1)
		{
		$array_lat="[{".$row->geo_lat;
		$array_long=$row->geo_long;
		$array_name=$row->tentram;
		}
		else 
		{
		$array_lat=$array_lat.",".$row->geo_lat;
		$array_long= $array_long.",".$row->geo_long;
		$array_name=$array_name."%".$row->tentram;
		}
		$i++;	
	}*/	
	$str_htmlDi= str_replace('"', "'",$htmlLoTrinhDi);
	$str_htmlVe= str_replace('"', "'",$htmlLoTrinhVe);
	if($htmlBus =="")
	{
	?>
	<b>Không co tuyến</b>	
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
					<li rel="<?php echo $LoTrinhDiArray[$i];?>" onclick="makeactivemenu(<?php echo $i?>,<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,2,'<?php echo base_url()?>')" target="_self">
						<a class="" id ="t19_2">Lộ trình đi</a>
					</li>
					<li rel="<?php echo $LoTrinhVeArray[$i];?>" onclick="makeactivemenu(<?php echo $i?>,<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,3,'<?php echo base_url()?>')" target="_self">
						<a class="" id ="t19_3">Lộ trình về</a>
					</li>
					<li onclick="makeactivemenu(<?php echo $i?>,<?php echo $BusArrayDetail[0]; ?>,<?php echo count($BusArray);?>,4,'<?php echo base_url()?>')">
						<a class="" id ="t19_4">Tìm xung quanh</a>
					</li>
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
