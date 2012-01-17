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
		$temp['init_lat'] = 10.8230989;
		$temp['init_long'] = 106.6296638;
		$temp['init_add'] = "'User'";
		$temp['htmltext'] = "";
		$this->load->view("home",$temp);
	}

	public function login(){
		$temp['title']="BusInfo for Hochiminh";
		 
		$this->load->view("home/demo",$temp);

	}
	public function layout2(){
		$temp['title']="BusInfo for Hochiminh";

		$this->load->view("admin/home",$temp);
	}

	public function search(){
		//$tabinput = 2;
		if (isset($_POST['mode']))
			{
				$tabinput = $_POST['mode'];
			}
			else $tabinput = "route";
		if ($tabinput == "route") { // MODE : Tim lo trinh
			//$temp['init_lat'] = 10.770023;
			//$temp['init_long'] = 106.685461;
			//$temp['init_add'] = "'Nguyễn Thị Minh Khai, Bến Nghé, Hồ Chí Minh'";
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
			 
			$this->load->view("home", $temp);
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
			//$options = array('mode' => 'search', 'min_lat' => '10.775044', 'min_lng' => '106.665325', 'max_lat' => '10.78411', 'max_lng' => '106.751043');
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
}