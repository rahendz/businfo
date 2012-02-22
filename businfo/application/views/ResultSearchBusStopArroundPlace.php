<?php
	
	$str_html= str_replace('"', "'",$htmltext);
		
?>
<div id="ResultSearchBusStop">
	<span class="countPlace">
	<table id="ResultTableBusStop" width="295px">
		<tr>
			<td><b>Kết quả tìm:</b><p id="mindistance"></p></td>	
			<td align="right"><a href="#" rel="<?php echo $str_html;?>" target="_self">Hiển Thị Tất Cả </a></td>
		</tr>
	</table>
	</span>
		</div>
		<?php
		if ($htmltext=="false")
		{
			?>
			<div id="fblnk" style="">
			<div id="SearchBusStopArroundPlaceResult" class="kohailong"> 
		
			<ul>
			<li id="SearchBusStopResult-1">Không tìm thấy trạm buýt nào phù hợp với điều kiện tìm kiếm</li>
			</ul>
		</div>
	</div>
			<?php 
		}
		else 
		{
			?>
			<div class="Spacer"></div>
			<div id="SearchBusStopRS"></div>
			<?php 
			/*
			$i=1;
			$count= count($queryTram);
			foreach($queryTram as $row) 
			{		
			?>
			<!-- 
				<li id="SearchBusStopResult<?php echo $i;?>">
					
						
						<a href="#" rel="<?php echo $row->geo_lat;?>,<?php echo $row->geo_long;?>, 
						<?php echo $row->tentram; ?><br />
						" target="_self"><span><?php echo $row->tentram; ?></span>
						</a>
						
				</li>
				 -->
				<div class="Spacer"></div>
				
				<div id="SearchBusStopResult<?php echo $i;?>" class="resultItem" style="height: 30px; width: 295px;">
					<div id="SearchBusStopResultDetail">
					<p id="mindistance<?php echo $k=$i-1;?> "></p>
						<div class="pin1-10 btns large red"><a><?php echo $i;?></a></div>
						<a class="resultTitle" style="width: 255px;" rel="<?php echo $row->geo_lat;?>,<?php echo $row->geo_long;?>, 
						<?php echo $row->tentram;?>" onclick="makeBusStopActive(<?php echo $count;?>,<?php  echo $i;?>)" target="_self">
						<?php echo $row->tentram; ?>	</a>
						
						<div class="Spacer"></div>
					</div>
				</div>
		
		<?php
			//$i++;
			//} */
		}
	?>
			
