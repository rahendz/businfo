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
		$temp['php_array'] = "";
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

	    $route = $_POST['mapinput'];

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
   		
   		$this->load->view("home", $temp);
   	}
   	
}