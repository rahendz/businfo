<?php
class demo extends CI_Controller {
	function demo() {
		
	}
	
	public function index() {
		$data['title'] = "Welcome Karmi!";
		$this->load->view('BusInfo_demo');
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