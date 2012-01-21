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
	$str_html= str_replace('"', "'",$htmltext);
		
?>
<div id="ResultSearchBusStop">
	<span class="countPlace">
	<table id="ResultTableBusStop" width="280px">
		<tr>
			<td><b>Kết quả tìm:</b></td>	
			<td align="right"><a href="#" rel="<?php echo $str_html;?>" target="_self">Hiển Thị Tất Cả </a></td>
		</tr>
	</table>
	</span>
		<div id="fblnk" style="">
			<div id="SearchBusStopArroundPlaceResult" class="kohailong"> 
		
			<ul>
		<?php 	
		$i=1;
		foreach($queryTram as $row) 
			{		
		?>
			<li id="SearchBusStopResult<?php echo $i;?>">
				
					<!--<div id="direction1" class="direction-item">
				 <div id="resultBusStopArroundPlace<?php echo $i;?>" class="resultItem resultItem-active">
					 -->
					<a href="#" rel="<?php echo $row->geo_lat;?>,<?php echo $row->geo_long;?>, 
					<?php echo $row->tentram; ?><br />
					" target="_self"><span><?php echo $row->tentram; ?></span>
					</a>
					<!-- </div>
				</div> -->
			</li>
			<div class="Spacer"></div>
	
	<?php
		$i++;
		} 
	?>
			</ul>
		</div>
	</div>
</div>