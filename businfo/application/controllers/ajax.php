<?php

class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function ajax_SearchStopBusArroundPlace($id)
	{
	 	$temp['title']="BusInfo for Hochiminh";
		
		//$temp['x'] = $_POST['bound_top_lat'];
		//$temp['init_lat'] = 10.781023;
		//$temp['init_long'] = 106.696461;
		$temp['init_lat'] = 10.770023;
		$temp['init_long'] = 106.685461;
		$temp['init_add'] = "'6,14, Nguyễn Thị Minh Khai, Bến Nghé, Hồ Chí Minh'";
		//$temp['init_add'] = "'Đại học Công nghệ Thông tin'";
		//$htmltext = "$(document).ready(function(){geocodeAdd(" . $temp['init_add'] . ");});";
		//$htmltext .= "$(document).ready(function(){document.getElementById('bound_top_lat').value);});";

		$this->load->model("TramBusModel");
		$options = array('mode' => 'search', 'min_lat' => '10.775044', 'min_lng' => '106.665325', 'max_lat' => '10.78411', 'max_lng' => '106.751043');
		$rows = $this->TramBusModel->getTramBus($options);
		
		
		$htmltext= json_encode($rows);
		$temp['htmltext'] = $htmltext;
		$temp['queryTram'] = $this->TramBusModel->getTramBus($options);
		
		$this->load->view("ResultSearchBusStopArroundPlace",$temp);
	
	}
	
	public function ajax_SearchBusPlace($id)
	{
	 	$temp['title']="BusInfo for Hochiminh";
		
		//$temp['x'] = $_POST['bound_top_lat'];
		//$temp['init_lat'] = 10.781023;
		//$temp['init_long'] = 106.696461;
		$temp['init_lat'] = 10.770023;
		$temp['init_long'] = 106.685461;
		$temp['init_add'] = "'6,14, Nguyễn Thị Minh Khai, Bến Nghé, Hồ Chí Minh'";
		//$temp['init_add'] = "'Đại học Công nghệ Thông tin'";
		//$htmltext = "$(document).ready(function(){geocodeAdd(" . $temp['init_add'] . ");});";
		//$htmltext .= "$(document).ready(function(){document.getElementById('bound_top_lat').value);});";

		$this->load->model("TramBusModel");
		$this->load->model("TuyenBusModel");
		$this->load->model("LoTrinhDiModel");
		$this->load->model("LoTrinhVeModel");
		$options = array('mode' => 'search', 'min_lat' => '10.775044', 'min_lng' => '106.665325', 'max_lat' => '10.78411', 'max_lng' => '106.751043');
		$rows = $this->TramBusModel->getTramBus($options);
		
		
		$htmltext= json_encode($rows);
		$temp['htmltext'] = $htmltext;
		$temp['queryTram'] = $this->TramBusModel->getTramBus($options);
		
		$StrBus='';
		$i=0;
		foreach ($temp['queryTram'] as $item)
		{
			if($i==0)
			{
			$StrBus.= $item->tuyendiqua;
			}
			else 
			{
			$StrBus.=",". $item->tuyendiqua;
			}
			$i++;
		}
		//echo $StrBus;
		
		$BusArray = explode(",", $StrBus);
		$BusArray2;
		//echo count($BusArray);
		for($j=0;$j<count($BusArray);$j++)
		{
			
			$bus= $BusArray[$j];
			$count=1;
			//echo $bus;
			for ($k=$j+1;$k<count($BusArray);$k++)
			{
			if($BusArray[$k]==$bus)
			{	
				$count++;
				//unset($BusArray[$j]);
				//break;
			}	
			}
			if($count==1)
			{
				//echo $bus;
			$BusArray2[]=$bus;
			}
		}
		$htmlBus='';
		$htmlLoTrinhDi='';
		$htmlLoTrinhVe='';
		$i=0;
		for($h=0; $h<count($BusArray2);$h++)
		{
			//echo $BusArray2[$h];
			$route=$BusArray2[$h];
			
			$this->load->model("TuyenBusModel");
			$options2 = array('matuyen' => $route);
			$BusRows = $this->TuyenBusModel->getTuyenBus($options2);
			$rows1 = $this->LoTrinhDiModel->getLoTrinh_WithLatLong($options2);
			$rows2 = $this->LoTrinhVeModel->getLoTrinh_WithLatLong($options2);
			
			if ($i==0)
			{
				$htmlBus.= $BusRows->matuyen . ';'.$BusRows->tentuyen;
				$htmlLoTrinhDi.= json_encode($rows1);
				$htmlLoTrinhVe.= json_encode($rows2);
			}
			else
			{
				$htmlBus.='%'.$BusRows->matuyen . ';'.$BusRows->tentuyen;
				$htmlLoTrinhDi.= '%'.json_encode($rows1);
				$htmlLoTrinhVe.= '%'.json_encode($rows2);
			}
			$i++;
		}
		$temp['htmlBus'] = $htmlBus;
		$temp['htmlLoTrinhDi'] = $htmlLoTrinhDi;
		$temp['htmlLoTrinhVe'] = $htmlLoTrinhVe;
		
		$this->load->view("ResultSearchBusPlace",$temp);
	
	}

	
	public function ajax_SearchBusRoute($id)
	{
	 	$temp['title']="BusInfo for Hochiminh";
		
		//$temp['x'] = $_POST['bound_top_lat'];
		//$temp['init_lat'] = 10.781023;
		//$temp['init_long'] = 106.696461;
		
	 	
	 	//ĐIỂM 1:
		$temp['init_lat'] = 10.770023;
		$temp['init_long'] = 106.685461;
		$temp['init_add'] = "'6,14, Nguyễn Thị Minh Khai, Bến Nghé, Hồ Chí Minh'";
		//$temp['init_add'] = "'Đại học Công nghệ Thông tin'";
		//$htmltext = "$(document).ready(function(){geocodeAdd(" . $temp['init_add'] . ");});";
		//$htmltext .= "$(document).ready(function(){document.getElementById('bound_top_lat').value);});";

		$this->load->model("TramBusModel");
		$this->load->model("TuyenBusModel");
		$this->load->model("LoTrinhDiModel");
		$this->load->model("LoTrinhVeModel");
		$options = array('mode' => 'search', 'min_lat' => '10.775044', 'min_lng' => '106.665325', 'max_lat' => '10.78411', 'max_lng' => '106.751043');
		$rows = $this->TramBusModel->getTramBus($options);
		
		
		$htmltext= json_encode($rows);
		$temp['htmltext'] = $htmltext;
		$temp['queryTram'] = $this->TramBusModel->getTramBus($options);
		
		$StrBus='';
		$i=0;
		
		foreach ($temp['queryTram'] as $item)
		{
			//$options3 = array('matram' => $item->matram);
			//echo $item->matram;
			//$temp['queryLoTrinhDi'] = $this->LoTrinhDiModel->getLoTrinh($options3);
			
			$query = $this->db->query("select * from lotrinhdi where matram=". $item->matram);  
			
			
			if($query->num_rows()>0)
			{
  				foreach($query->result() as $LoTrinhDi)
  				{
					//echo $LoTrinhDi->matuyen;
					if($i==0)
						$StrBus.= $LoTrinhDi->matuyen;
					else 
						$StrBus.=",". $LoTrinhDi->matuyen;
					$i++;
				//	echo $StrBus;*/
				}
			}
		}
		//echo $StrBus;
		
		$BusArrayDiDiemDau = explode(",", $StrBus);
		$BusArrayDiDiemDauNew;
		//echo count($BusArray);
		for($j=0;$j<count($BusArrayDiDiemDau);$j++)
		{
			
			$bus= $BusArrayDiDiemDau[$j];
			
			$count=1;
			for ($k=$j+1;$k<count($BusArrayDiDiemDau);$k++)
			{
				if($BusArrayDiDiemDau[$k]==$bus)
				{	
					$count++;
				}	
			}
			if($count==1)
			{
			//echo $bus;
			$BusArrayDiDiemDauNew[]=$bus;
			}
		}
		
		//ĐIỂM 2
		/*10.848322,106.774158
		
		10.870038,106.797363
		10.862831,106.807727*/
		$temp['init_lat'] = 10.848322;
		$temp['init_long'] = 106.774158;
		$temp['init_add'] = "'Coopmart Q9'";
		$options5 = array('mode' => 'search', 'min_lat' => '10.862831', 'min_lng' => '106.807727', 'max_lat' => '10.870038', 'max_lng' => '106.797363');
		$rows = $this->TramBusModel->getTramBus($options5);
		
		$querytramcuoi= $query = $this->db->query("SELECT * FROM TRAMBUS WHERE GEO_LAT BETWEEN  10.862831 AND 10.870038
				AND GEO_LONG BETWEEN  106.797363 AND 106.807727");
		$htmltext= json_encode($rows);
		$temp['htmltext'] = $htmltext;
		//$temp['queryTramDiemCuoi'] = $this->TramBusModel->getTramBus($options5);
		
		$StrBus='';
		$i=0;
		//if(sizeof($temp['queryTramDiemCuoi'])>0)
		if($query->num_rows()>0)
		{
			//echo sizeof($temp['queryTramDiemCuoi']);
		//	foreach ($temp['queryTramDiemCuoi'] as $item2)
		
  			foreach($querytramcuoi->result() as $item2)
  			
		{
			//$options3 = array('matram' => $item->matram);
			
			//$temp['queryLoTrinhDi'] = $this->LoTrinhDiModel->getLoTrinh($options3);
			
			$query = $this->db->query("select * from lotrinhdi where matram=". $item2->matram);  
			
			
			if($query->num_rows()>0)
			{
  				foreach($query->result() as $LoTrinhDi)
  				{
					//echo $LoTrinhDi->matuyen;
					if($i==0)
						$StrBus.= $LoTrinhDi->matuyen;
					else 
						$StrBus.=",". $LoTrinhDi->matuyen;
					$i++;
				//	echo $StrBus;*/
				}
			}
		}
		}
		
		//echo $StrBus;
		
		$BusArrayDiDiemCuoi = explode(",", $StrBus);
		$BusArrayDiDiemCuoiNew;
		//echo count($BusArray);
		for($j=0;$j<count($BusArrayDiDiemCuoi);$j++)
		{
			
			$bus= $BusArrayDiDiemCuoi[$j];
			
			$count=1;
			for ($k=$j+1;$k<count($BusArrayDiDiemCuoi);$k++)
			{
				if($BusArrayDiDiemCuoi[$k]==$bus)
				{	
					$count++;
				}	
			}
			if($count==1)
			{
			//echo $bus;
			$BusArrayDiDiemCuoiNew[]=$bus;
			}
		}
		
		
		// Tìm tuyến chung lộ trình đi
	for($h=0; $h<count($BusArrayDiDiemDauNew);$h++)
		{
			echo $BusArrayDiDiemDauNew[$h]."^";
		
		}
		for($h=0; $h<count($BusArrayDiDiemCuoiNew);$h++)
		{
			echo $BusArrayDiDiemCuoiNew[$h].";";
		
		}
	$BusArrayChungLTDi;
	for($h=0; $h<count($BusArrayDiDiemDauNew);$h++)
		{
			$busdi=$BusArrayDiDiemDauNew[$h];
		for($j=0; $j<count($BusArrayDiDiemCuoiNew);$j++)
		{
			if($busdi==$BusArrayDiDiemCuoiNew[$j])
			{
				
			$BusArrayChungLTDi[]=$busdi;
			}
		
		}
	}
	
		// LỘ TRÌNH
		$htmlBus='';
		$htmlLoTrinhDi='';
		$htmlLoTrinhVe='';
		$i=0;
		
		echo"==>";
		for($h=0; $h<count($BusArrayChungLTDi);$h++)
		{
			echo $BusArrayChungLTDi[$h];
			$route=$BusArrayChungLTDi[$h];
			
			$this->load->model("TuyenBusModel");
			$options2 = array('matuyen' => $route);
			$BusRows = $this->TuyenBusModel->getTuyenBus($options2);
			$rows1 = $this->LoTrinhDiModel->getLoTrinh_WithLatLong($options2);
			$rows2 = $this->LoTrinhVeModel->getLoTrinh_WithLatLong($options2);
			
			if ($i==0)
			{
				$htmlBus.= $BusRows->matuyen . ';'.$BusRows->tentuyen;
				$htmlLoTrinhDi.= json_encode($rows1);
				$htmlLoTrinhVe.= json_encode($rows2);
			}
			else
			{
				$htmlBus.='%'.$BusRows->matuyen . ';'.$BusRows->tentuyen;
				$htmlLoTrinhDi.= '%'.json_encode($rows1);
				$htmlLoTrinhVe.= '%'.json_encode($rows2);
			}
			$i++;
		}
		$temp['htmlBus'] = $htmlBus;
		$temp['htmlLoTrinhDi'] = $htmlLoTrinhDi;
		$temp['htmlLoTrinhVe'] = $htmlLoTrinhVe;
		
		$this->load->view("ResultSearchBusPlace",$temp);
	
	}
}
?>