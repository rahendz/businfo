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
		$this->load->view("test_ajaxtab2",$temp);
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
			
			$htmltext = "$(document).ready(function(){showStops('" . json_encode($rows1) . "', '" . json_encode($rows2) . "')});";
			
			$temp['htmltext'] = $htmltext;
			
			$this->load->model("TuyenBusModel");
			$options2 = array('matuyen' => $route);
			$temp['queryTuyen'] = $this->TuyenBusModel->getTuyenBus($options2);
			$this->load->view("test_ajaxtab2", $temp);
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
   		$temp['query1'] = $this->TuyenBusModel->getTuyenBus($options);
   	
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
   		$dt['tramdau'] = $this->input->post('tramdau');
   		$dt['tramcuoi'] = $this->input->post('tramcuoi');
		$dt['tgvanhanh'] = $this->input->post('tgvh');
   		$dt['tggccao'] = $this->input->post('tggccao');
   		$dt['tggcthap'] = $this->input->post('tggcthap');
   		$dt['tongchuyen'] = $this->input->post('tongchuyen');
   		$this->TuyenBusModel->saveTuyenBus($dt);
   		
	 	$this->load->view("admin/ThemTuyenBus_B2",$temp);  
    }
    
	public function ThemTuyenBusB3(){
		$route = null;
   		//$route = "19";
   		
   		$temp['route'] = $route;
   		//$limit = "10";
   		
   		$temp['title']="BusInfo for Hochiminh";
   		//$temp['tuyendiqua'] = $route;
   		
   		$this->load->model("TramBusModel");
   		$options = array('tuyendiqua' => $route);
   		//, 'limit' => $limit);
   		$rows = $this->TramBusModel->getTramBus($options);
   		//echo count($res);
   		
		//$rows = pg_fetch_all($res);
		$temp['php_array'] = json_encode($rows);
   		$temp['title']="BusInfo for Hochiminh";
	 	$this->load->view("admin/ThemTuyenBus_B3",$temp);  
    }
	public function ThemTuyenBusB4(){
		
   		$temp['title']="BusInfo for Hochiminh";
	 	$this->load->view("admin/ThemTuyenBus_B4",$temp);  
    }
	public function ThemTuyenBusB5(){
		$route = null;
   		//$route = "19";
   		
   		$temp['route'] = $route;
   		//$limit = "10";
   		
   		$temp['title']="BusInfo for Hochiminh";
   		//$temp['tuyendiqua'] = $route;
   		
   		$this->load->model("TramBusModel");
   		$options = array('tuyendiqua' => $route);
   		//, 'limit' => $limit);
   		$rows = $this->TramBusModel->getTramBus($options);
   		//echo count($res);
   		
		//$rows = pg_fetch_all($res);
		$temp['php_array'] = json_encode($rows);
   		$temp['title']="BusInfo for Hochiminh";
	 	$this->load->view("admin/ThemTuyenBus_B5",$temp);  
    }
}