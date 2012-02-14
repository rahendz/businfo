<?php
class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");

		//$this->load->library("my_layout"); // Nạp thư viện layout
		//$this-> my_layout->setLayout("bluesky/layout"); // load file layout chính (view/layout/frontend.php)
	}
	public function index(){
		$temp['title']="BusInfo for Hochiminh";
		$temp['mode'] = "index";
		$temp['res'] = "0";
		$temp['init_lat'] = 10.8230989;
		$temp['init_long'] = 106.6296638;
		$temp['init_add'] = "'User'";
		$temp['htmltext'] = "";
		
		$this->load->view("test_ajaxtab3",$temp);
	}

/*	public function login(){
		$temp['title']="BusInfo for Hochiminh";
		 
		$this->load->view("home/demo",$temp);

	}*/
	public function layout2(){
		$temp['title']="BusInfo for Hochiminh";

		$this->load->view("admin/home",$temp);
	}

	public function search(){
		//$tabinput = 2;
		/*if (isset($_POST['mode']))
			{
				$tabinput = $_POST['mode'];
			}
			else $tabinput = "route";*/
		$tabinput="route";
		//echo $tabinput;
		if ($tabinput == "route") { // MODE : Tim lo trinh
			//$temp['init_lat'] = 10.770023;
			//$temp['init_long'] = 106.685461;
			//$temp['init_add'] = "'Nguyễn Thị Minh Khai, Bến Nghé, Hồ Chí Minh'";
			$temp['res'] = "1";
			$temp['mode'] = "index";
			
			$temp['init_lat'] = 10.8230989;
			$temp['init_long'] = 106.6296638;
			$temp['init_add'] = "'User'";
			// Search tuyến
			if (isset($_POST['mapinput']))
			{
				$route = $_POST['mapinput'];
			}
			else $route = "19";
			 
			$temp['route'] = $route;
			//$limit = "10";
			 
			$temp['title']="BusInfo for Hochiminh";
			//$temp['tuyendiqua'] = $route;
			 
			$this->load->model("LoTrinhDiModel");
			$this->load->model("LoTrinhVeModel");
			$options = array('matuyen' => $route);
			//, 'limit' => $limit);
			$rows1 = $this->LoTrinhDiModel->getLoTrinh_WithLatLong($options);
			$rows2 = $this->LoTrinhVeModel->getLoTrinh_WithLatLong($options);
			//echo count($res);
			$stt=count($rows1)/2;
			$htmltext = "$(document).ready(function(){showStops('" . json_encode($rows1) . "', '" . json_encode($rows2) . "',$stt)});";
			
			$temp['htmltext'] = $htmltext;
			//echo $htmltext;
			$temp['htmlLoTrinhDi']=json_encode($rows1);
			$temp['htmlLoTrinhVe']=json_encode($rows2);
			$this->load->model("TuyenBusModel");
			$options2 = array('matuyen' => $route);
			$temp['queryTuyen'] = $this->TuyenBusModel->getTuyenBus($options2);
			$this->load->view("test_ajaxtab3", $temp);
		}
		else if ($tabinput == "poi") { // MODE : Tim tram xung quanh 1 địa chỉ
			//Bounds : 10.792744,106.670325) - (10.79411,106.671043
				// Search tuyến
			if (isset($_POST['mapinput']))
			{
				$add = "'" . $_POST['mapinput'] . "'";
			}
			else $add = "'Hồ Chí Minh, Việt Nam'";
			
			$temp['b_top_lat'] = $_POST['bound_lat'] + 0.0085;
			$temp['b_top_lng'] = $_POST['bound_lng'] + 0.0085;
			$temp['b_bot_lat'] = $_POST['bound_lat'] - 0.0085;
			$temp['b_bot_lng'] = $_POST['bound_lng'] - 0.0085;
			
			$temp['title']="BusInfo for Hochiminh";
			//$temp['init_lat'] = 10.781023;
			//$temp['init_long'] = 106.696461;
			$temp['init_lat'] = 10.770023;
			$temp['init_long'] = 106.685461;
			//$temp['init_add'] = "'6,14, Nguyễn Thị Minh Khai, Bến Nghé, Hồ Chí Minh'";
			$temp['init_add'] = $add;
			$htmltext = "$(document).ready(function(){geocodeAdd(" . $temp['init_add'] . ");});";
			
			$this->load->model("TramBusModel");
			$options = array('mode' => 'search', 'min_lat' => $temp['b_bot_lat'], 'min_lng' => $temp['b_bot_lng'], 'max_lat' => $temp['b_top_lat'], 'max_lng' => $temp['b_top_lng']);
			$rows = $this->TramBusModel->getTramBus($options);
			
			$htmltext .= "$(document).ready(function(){showStops2('" . json_encode($rows) . "')});";
			$temp['htmltext'] = $htmltext;
			
			$this->load->view("home", $temp);
		}
		else if ($tabinput == "dir") {
            $temp['init_add'] = "'User'";
            // Search tuyến
            if (isset($_POST['mapinput']))
            {
                $query = $_POST['mapinput'];
            }
            else $query = "";
            $limit = 1; // select top 1
             
            //$temp['query'] = $query;
             
            $temp['title']="BusInfo for Hochiminh";
            //$temp['tuyendiqua'] = $route;
             
            $this->load->model("TramBusModel");
            $options = array('tentram' => $route, 'limit' => $limit);
            //, 'limit' => $limit);
            $rows = $this->TramBusModel->getTramBus($options);
            $trambus = json_encode($rows);
		    foreach($trambus as $key => $value)
            {
                if ($key == "geo_lat") {
                $temp['init_lat'] = $value;                
                } else if ($key == "geo_long") {
                $temp['init_long'] = $value;
                } 
            }
            //$temp['init_lat'] = 10.8230989;
            //$temp['init_long'] = 106.6296638;
            $temp['init_add'] = "' . $query . '";
            
            $htmltext = "$(document).ready(function(){showStops('" . json_encode($rows1) . "', '" . json_encode($rows2) . "')});";

            $temp['htmltext'] = $htmltext;
             
            $this->load->view("home", $temp);
		}
	}
	
	
	
	    
	public function TuyenBusDetail(){
   		parse_str($_SERVER['QUERY_STRING'],$_GET); //converts query string into global GET array variable   		
   		$temp['id']= $_GET['id'];
		$temp['route']= $_GET['route'];
		$this->load->model("TuyenBusModel");
		$options = array('matuyen' => $temp['route']);
		$temp['queryTuyen'] = $this->TuyenBusModel->getTuyenBus($options);
			
   		$this->load->view("tab_DetailResultTuyen", $temp);
   	}
   	
	
	 public function login(){
	 	$temp['title']="BusInfo for Hochiminh";
	 	$this->load->view("login",$temp);

	 }
    
	public function ad_home(){
	 	$temp['title']="BusInfo for Hochiminh";
	 	$this->load->view("admin/ad_home",$temp);  
    }
    
	public function ThemTramBus(){
	 	$temp['title']="BusInfo for Hochiminh";
	 	$this->load->view("admin/ThemTramBus",$temp);  
    }
	public function InSertTramBus(){
		
		$matram = $_POST['ma'];
   		$temp['matram'] = $matram;
   		$temp['title']="BusInfo for Hochiminh";
		$this->load->model("TramBusModel");
   		$dt['matram'] = $this->input->post('ma');
   		$dt['tentram'] = $this->input->post('ten');
   		$dt['geo_long'] = $this->input->post('lng');
   		$dt['geo_lat'] = $this->input->post('lat');
		
   		$this->TramBusModel->saveTramBus($dt);
   		
   		$this->load->view("admin/ThemTramBus",$temp);  
    }
    public function ThongTinTram(){
        $route = "";
        $temp['route'] = $route;
   		//$limit = "10";
   		
   		$temp['title']="BusInfo for Hochiminh";
   		//$temp['tuyendiqua'] = $route;
   		
   		$this->load->model("TramBusModel");
   		$options = array('tuyendiqua' => $route);
   
   		$temp['query'] = $this->TramBusModel->getTramBus($options);
   		$this->load->view("admin/ThongTinTram", $temp);
   	}
   	
	public function ThongTinTuyen(){
        $route = null;
        $temp['route'] = $route;
   		//$limit = "10";
   		
   		$temp['title']="BusInfo for Hochiminh";
   		//$temp['tuyendiqua'] = $route;
   		
   		$this->load->model("TuyenBusModel");
   		$options = array('matuyen' => $route);
   		$temp['query1'] = $this->db->query("select * from tuyenbus");
   	
   		$this->load->view("admin/ThongTinTuyen", $temp);
	}
	
	public function UpdateChuyenBuyt($DiOrVe)
	{
		$queryChuyenDi=$this->db->query("select * from luot".$DiOrVe." where tinhtrang=0");
   		if($queryChuyenDi->num_rows()>0)
   		{
	   		foreach($queryChuyenDi->result() as $ChuyenDi)
	   		{
	   			$queryXeBus=$this->db->query("select * from xebus where maxe=".$ChuyenDi->maxe);
	   			$Xebus=$queryXeBus->row(0);
	   			$TuyenBus=$Xebus->matuyen;
	   			//Tìm thời gian vận hành
				$queryTuyen= $this->db->query("select tgvanhanh from tuyenbus where matuyen =".$TuyenBus);
				$Tuyen=$queryTuyen->row(0);
				$TGVanHanh=$Tuyen->tgvanhanh;
				
				$queryXeBus= $this->db->query("Select *,((DATE_PART('day', now()::timestamp - thoigianxuatben::timestamp) * 24 +". 
               		" DATE_PART('hour', now()::timestamp - thoigianxuatben::timestamp)) * 60 +".
               		" DATE_PART('minute', now()::timestamp - thoigianxuatben::timestamp)) as thoigian". 
					" from luot".$DiOrVe.
					" where tinhtrang=0". 
					" and ((DATE_PART('day', now()::timestamp - thoigianxuatben::timestamp) * 24 +". 
               		" DATE_PART('hour', now()::timestamp - thoigianxuatben::timestamp)) * 60 +".
               		" DATE_PART('minute', now()::timestamp - thoigianxuatben::timestamp) >= ".$TGVanHanh.")".
        			" and tinhtrang=0 and maxe=".$ChuyenDi->maxe );
				if($queryXeBus->num_rows()>0)
				{
					//echo 	$ChuyenDi->maxe;
					If($DiOrVe=='di')
					{
						$bendo=1;	
						$luot_id=$ChuyenDi->luotdi_id;
					}
					else
					{
						$bendo=0;
						$luot_id=$ChuyenDi->luotve_id;
					} 
					$queryUpdateXeBus=$this->db->query("update xebus set bendo='".$bendo."' where maxe=".$ChuyenDi->maxe);
					$queryUpdateLuotDi=$this->db->query("update luot".$DiOrVe." set tinhtrang=1".
						 " where luot".$DiOrVe."_id=".$luot_id);
				}
	   		}
   		}
   		
	}
	
	public function ThongTinXeBuyt(){
           		
   		$temp['title']="BusInfo for Hochiminh";
   		//$temp['tuyendiqua'] = $route;
   		
   		
   		$this->load->model("TuyenBusModel");
   		$this->UpdateChuyenBuyt('di');
   		$this->UpdateChuyenBuyt('ve');
   		$temp['query1'] = $this->db->query("select * from xebus order by maxe");
   		
   		$this->load->view("admin/ThongTinXeBuyt", $temp);
	}
	
	public function TimThongTinMaTuyen(){
        $route = $_POST['matuyen'];
        $temp['route'] = $route;
   		//$limit = "10";
   		
   		$temp['title']="BusInfo for Hochiminh";
   		//$temp['tuyendiqua'] = $route;
   		
   		$this->load->model("TuyenBusModel");
   		$options = array('matuyen' => $route);
   		$temp['query1'] = $this->db->query("select * from tuyenbus where matuyen=".$route);
   	
   		$this->load->view("admin/ThongTinTuyen", $temp);
	}
	public function TimThongTinTenTuyen(){
        $route = $_POST['tentuyen'];
		//$route= strtoupper($route);
        //$temp['tentuyen'] = $route;
   		//$limit = "10";
   		
   		$temp['title']="BusInfo for Hochiminh";
   		//$temp['tuyendiqua'] = $route;
   		
   		$this->load->model("TuyenBusModel");
   		$options = array('matuyen' => $route);
   		$temp['query1'] = $this->db->query("select * from tuyenbus where tentuyen like '%".$route."%'");
   	
   		$this->load->view("admin/ThongTinTuyen", $temp);
	}
	public function ThemTuyenBus(){
	 	$temp['title']="BusInfo for Hochiminh";
	 	$this->load->view("admin/ThemTuyenBus",$temp);  
    }

	public function ThemTuyenBusB2(){
		
		$matuyen = $_POST['matuyen'];
   		$temp['matuyen'] = $matuyen;
   		$temp['title']="BusInfo for Hochiminh";
		$this->load->model("TuyenBusModel");
   		$dt['matuyen'] = $this->input->post('matuyen');
   		$dt['tentuyen'] = $this->input->post('tentuyen');
   		//$dt['tramdau'] = $this->input->post('tramdau');
   		//$dt['tramcuoi'] = $this->input->post('tramcuoi');
		$dt['tgvanhanh'] = $this->input->post('tgvh');
   		$dt['tggccao'] = $this->input->post('tggccao');
   		$dt['tggcthap'] = $this->input->post('tggcthap');
   		$dt['tongchuyen'] = $this->input->post('tongchuyen');
   		$dt['lotrinhdi'] = $this->input->post('lotrinhdi');
   		$dt['lotrinhve'] = $this->input->post('lotrinhve');
   		$QUERYINSERT=$this->db->query("insert into tuyenbus (matuyen, tentuyen,tgvanhanh,tggccao,tggcthap,tongchuyen,lotrinhdi,lotrinhve)".
 						" values (".$dt['matuyen'].", '".$dt['tentuyen']."','"
   						.$dt['tgvanhanh']."','".$dt['tggccao']."','".$dt['tggcthap']."',".$dt['tongchuyen'].",'".$dt['lotrinhdi']."','".$dt['lotrinhve']."')");
   		//$this->TuyenBusModel->saveTuyenBus($dt);
   		
	 	$this->load->view("admin/ThemTuyenBus_B2",$temp);  
    }
    public function ThemTuyen()
    {
    	$temp['title']="BusInfo for Hochiminh";
		$this->load->model("TramBusModel");
    	$file_path= $_FILES['danhsach']['tmp_name'];
    	$temp['file_path']=$file_path;
    	//echo $file_path;
    	//$content=$this->import_gv_array($file_path);
    	//$this->import_gv_array_from_string($content);
    	if ($_FILES['danhsach']['error'] > 0) 
    	{
  			echo "Error: " . $_FILES['danhsach']['error'] . "<br />"; 
 		}
 		else
 		{
 			$querydel = $this->db->query("DELETE FROM TEMP_TUYENBUS");

 			if (($handle = fopen($_FILES['danhsach']['tmp_name'], "r")) !== FALSE) 
 			{
 				$ctr = 1; // used to exclude the CSV header
 				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
 				{
 					if ($ctr > 1)
 						$QUERYINSERT=$this->db->query("insert into temp_tuyenbus (stttram, tentram,geo_lat,geo_long)".
 						" values (".$data[0].", '".$data[1]."',".$data[2].",".$data[3].")");
 						
 						//echo $data[1]."-".$data[2]."-".$data[3];
 					else  $ctr++;
 				}
 				fclose($handle);
 			}
 			/*
 			$queryTemp_TuyenBus= $this->db->query("select * from Temp_TuyenBus");
 			if ($queryTemp_TuyenBus->num_rows()>0)
 			{
 				foreach ($queryTemp_TuyenBus->result() as $LoTrinh)
 				{
 					$geo_lat= $LoTrinh->geo_lat;
 					$geo_long= $LoTrinh->geo_long;
 					$queryTramBus= $this->db->query("select * from trambus where ".
 					"(sqrt(power(geo_long-".$geo_long.",2)+ power(geo_lat-".$geo_lat.",2)))<0.0000000000007");
 					if ($queryTramBus->num_rows()>0)
 					{	
 						echo 1;
 						
 					}
 					else 
 					{
 						$queryIDTram=$this->db->query("select max (matram) as idmax from trambus");
 						$IDTram= $queryIDTram->row(0);
 						$matram = $IDTram->idmax + 1;
 						$tentram= $LoTrinh->tentram;
   						$QUERYINSERTTRAM=$this->db->query("insert into trambus (matram, tentram,geo_lat,geo_long)".
 						" values (".$matram.", '".$tentram."',".$geo_lat.",".$geo_long.")");
   						
   						
 					}
 					
 				}
 			}*/
 		}   	
    	$this->load->view("admin/test_import",$temp);
    }
	public function ThemTuyenBusB3(){
		
		$route = $_POST['matuyen'];		  		
   		$temp['route'] = $route;
   		
   		$temp['title']="BusInfo for Hochiminh";
   		$temp['init_lat'] = 10.8230989;
		$temp['init_long'] = 106.6296638;
		$temp['init_add'] = "'User'";
		$temp['htmltext'] = "";
		
		$this->load->model("TramBusModel");
    	$file_path= $_FILES['danhsach']['tmp_name'];
    	$temp['file_path']=$file_path;
    	//echo $file_path;
    	//$content=$this->import_gv_array($file_path);
    	//$this->import_gv_array_from_string($content);
    	if ($_FILES['danhsach']['error'] > 0) 
    	{
  			echo "Error: " . $_FILES['danhsach']['error'] . "<br />"; 
 		}
 		else
 		{
 			$querydel = $this->db->query("DELETE FROM TEMP_TUYENBUS");

 			if (($handle = fopen($_FILES['danhsach']['tmp_name'], "r")) !== FALSE) 
 			{
 				$ctr = 1; // used to exclude the CSV header
 				while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) 
 				{
 					if ($ctr > 1)
 						$QUERYINSERT=$this->db->query("insert into temp_tuyenbus (stttram, tentram,geo_lat,geo_long)".
 						" values (".$data[0].", N'".$data[1]."',".$data[2].",".$data[3].")");
 						
 						//echo $data[1]."-".$data[2]."-".$data[3];
 					else  $ctr++;
 				}
 				fclose($handle);
 				
 				$queryTemp_TuyenBus= $this->db->query("select * from Temp_TuyenBus");
 				$rows1 = $queryTemp_TuyenBus->result();
			//echo json_encode(($rows1))
				$stt=count($rows1)/2;
				$htmltext = "$(document).ready(function(){showStopsAdmin('" . json_encode($rows1) . "', 1,2)});";
				//$htmltext = "$(document).ready(function(){showStops2('" . json_encode($rows1) . "')});";
			
				$temp['htmltext'] = $htmltext;
				$temp['TramBus']=$rows1;
			
 			}
 		}
		
	 	$this->load->view("admin/ThemTuyenBus_B3",$temp);  
    }
	public function ThemTuyenBusB4()
	{
		$strkhoangcach= $_POST['khoangcach'];
		$khoangcachArray=explode("-", $strkhoangcach);
		$route = $_POST['matuyen'];		  		
   		$temp['route'] = $route;
   		
   		$temp['title']="BusInfo for Hochiminh";
   		
   		$queryTemp_TuyenBus= $this->db->query("select * from Temp_TuyenBus");
 			if ($queryTemp_TuyenBus->num_rows()>0)
 			{
 				$count=1;
 				foreach ($queryTemp_TuyenBus->result() as $LoTrinh)
 				{
 					$geo_lat= $LoTrinh->geo_lat;
 					$geo_long= $LoTrinh->geo_long;
 					$queryTramBus= $this->db->query("select * from trambus where ".
 					"(sqrt(power(geo_long-".$geo_long.",2)+ power(geo_lat-".$geo_lat.",2)))<0.0000000000007");
 					//Nếu đã tồn tại trạm
 					if ($queryTramBus->num_rows()>0)
 					{	
 						$IDTram=$queryTramBus->row(0);
 						$matram=$IDTram->matram;
 						$tuyendiqua=$IDTram->tuyendiqua;
 						$tuyen= explode(",", $tuyendiqua);
 						$tuyenexist=0;
 						for ($i=0; $i<count($tuyen);$i++)
 						{
 							if($route==$tuyen[$i])
 								$tuyenexist++;
 						}
 						if($tuyenexist==0)
 						{
 							$tuyendiqua.=",".$route;
 							$queryUpdateTramBus=$this->db->query("update trambus set tuyendiqua='".$tuyendiqua."' where matram=".$matram);
 						}	
 					}
 					//Chưa tồn tại
 					else 
 					{
 						$queryIDTram=$this->db->query("select max (matram) as idmax from trambus");
 						$IDTram= $queryIDTram->row(0);
 						$matram = $IDTram->idmax + 1;
 						$tentram= $LoTrinh->tentram;
   						$QUERYINSERTTRAM=$this->db->query("insert into trambus (matram, tentram,tuyendiqua,geo_lat,geo_long)".
 						" values (".$matram.", '".$tentram."','".$route."',".$geo_lat.",".$geo_long.")");
   					}
 					if($count<10) $lotrinhdi_id=$route."0".$count;
 					else $lotrinhdi_id=$route.$count;
 					
 					$distance=$khoangcachArray[$count-1];
 					
 					//echo $distance;
 					$QUERYINSERT=$this->db->query("insert into lotrinhdi (lotrinhdi_id, matuyen,stttram,matram,khoangcach)".
 						" values ('".$lotrinhdi_id."', ".$route.",".$count.",".$matram.",".$distance.")");
 					$count++;
 				}
 			}
   		
	 	$this->load->view("admin/ThemTuyenBus_B4",$temp);  
    }
	public function ThemTuyenBusB5(){
		$route = null;
		$route = $_POST['matuyen'];		  		
   		$temp['route'] = $route;
   		
   		$temp['title']="BusInfo for Hochiminh";
   		$temp['init_lat'] = 10.8230989;
		$temp['init_long'] = 106.6296638;
		$temp['init_add'] = "'User'";
		$temp['htmltext'] = "";
		
		$this->load->model("TramBusModel");
    	$file_path= $_FILES['danhsach']['tmp_name'];
    	$temp['file_path']=$file_path;
    	//echo $file_path;
    	//$content=$this->import_gv_array($file_path);
    	//$this->import_gv_array_from_string($content);
    	if ($_FILES['danhsach']['error'] > 0) 
    	{
  			echo "Error: " . $_FILES['danhsach']['error'] . "<br />"; 
 		}
 		else
 		{
 			$querydel = $this->db->query("DELETE FROM TEMP_TUYENBUS");

 			if (($handle = fopen($_FILES['danhsach']['tmp_name'], "r")) !== FALSE) 
 			{
 				$ctr = 1; // used to exclude the CSV header
 				while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) 
 				{
 					if ($ctr > 1)
 						$QUERYINSERT=$this->db->query("insert into temp_tuyenbus (stttram, tentram,geo_lat,geo_long)".
 						" values (".$data[0].", N'".$data[1]."',".$data[2].",".$data[3].")");
 						
 						//echo $data[1]."-".$data[2]."-".$data[3];
 					else  $ctr++;
 				}
 				fclose($handle);
 				
 				$queryTemp_TuyenBus= $this->db->query("select * from Temp_TuyenBus");
 				$rows1 = $queryTemp_TuyenBus->result();
			//echo json_encode(($rows1))
				$stt=count($rows1)/2;
				$htmltext = "$(document).ready(function(){showStopsAdmin('" . json_encode($rows1) . "', 2,2)});";
				//$htmltext = "$(document).ready(function(){showStops2('" . json_encode($rows1) . "')});";
			
				$temp['htmltext'] = $htmltext;
				$temp['TramBus']=$rows1;
			
 			}
 		}
	 	$this->load->view("admin/ThemTuyenBus_B5",$temp);  
    }
    
    
	public function ThemTuyenBusB6()
	{
		$strkhoangcach= $_POST['khoangcach'];
		$khoangcachArray=explode("-", $strkhoangcach);
		$route = $_POST['matuyen'];		  		
   		$temp['route'] = $route;
   		
   		$temp['title']="BusInfo for Hochiminh";
   		
   		$queryTemp_TuyenBus= $this->db->query("select * from Temp_TuyenBus");
 			if ($queryTemp_TuyenBus->num_rows()>0)
 			{
 				$count=1;
 				foreach ($queryTemp_TuyenBus->result() as $LoTrinh)
 				{
 					$geo_lat= $LoTrinh->geo_lat;
 					$geo_long= $LoTrinh->geo_long;
 					$queryTramBus= $this->db->query("select * from trambus where ".
 					"(sqrt(power(geo_long-".$geo_long.",2)+ power(geo_lat-".$geo_lat.",2)))<0.0000000000007");
 					//Nếu đã tồn tại trạm
 					if ($queryTramBus->num_rows()>0)
 					{	
 						$IDTram=$queryTramBus->row(0);
 						$matram=$IDTram->matram;
 						$tuyendiqua=$IDTram->tuyendiqua;
 						$tuyen= explode(",", $tuyendiqua);
 						$tuyenexist=0;
 						for ($i=0; $i<count($tuyen);$i++)
 						{
 							if($route==$tuyen[$i])
 								$tuyenexist++;
 						}
 						if($tuyenexist==0)
 						{
 							$tuyendiqua.=",".$route;
 							$queryUpdateTramBus=$this->db->query("update trambus set tuyendiqua='".$tuyendiqua."' where matram=".$matram);
 						}
 					}
 					//Chưa tồn tại
 					else 
 					{
 						$queryIDTram=$this->db->query("select max (matram) as idmax from trambus");
 						$IDTram= $queryIDTram->row(0);
 						$matram = $IDTram->idmax + 1;
 						$tentram= $LoTrinh->tentram;
   						$QUERYINSERTTRAM=$this->db->query("insert into trambus (matram, tentram,tuyendiqua,geo_lat,geo_long)".
 						" values (".$matram.", '".$tentram."','".$route."',".$geo_lat.",".$geo_long.")");
   					}
 					if($count<10) $lotrinhve_id=$route."0".$count;
 					else $lotrinhve_id=$route.$count;
 					
 					$distance=$khoangcachArray[$count-1];
 					
 					//echo $distance;
 					$QUERYINSERT=$this->db->query("insert into lotrinhve (lotrinhve_id, matuyen,stttram,matram,khoangcach)".
 						" values ('".$lotrinhve_id."', ".$route.",".$count.",".$matram.",".$distance.")");
 					$count++;
 				}
 			}
   		$route = null;
        
   		$temp['title']="BusInfo for Hochiminh";
   		   		
   		$this->load->model("TuyenBusModel");
   		$options = array('matuyen' => $route);
   		//$temp['query1'] = $this->TuyenBusModel->getTuyenBus($options);
   		$temp['query1'] = $this->db->query("select * from tuyenbus");
   	
   		$this->load->view("admin/ThongTinTuyen", $temp);
	 	//$this->load->view("admin/ThemTuyenBus_B4",$temp);  
    }
}