<?php
class demo extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
        
        //$this->load->library("my_layout"); // Nạp thư viện layout
        //$this-> my_layout->setLayout("bluesky/layout"); // load file layout chính (view/layout/frontend.php)
	}
	
	public function index() {
		//$data['title'] = "Welcome Karmi!";
		$this->load->view('demo');
	}
	
	function search() {
		$data['title'] = "Search result";
		$data['tuyendiqua'] = "19";
		
		//$this->load->model('trambus/models/TramBusModel');
    	//$this->TramBusModel->getTramBus(array('tuyendiqua' => $data['tuyendiqua']));
    	
		$this->load->view('BusInfo_demo', $data);
	}
}
?>