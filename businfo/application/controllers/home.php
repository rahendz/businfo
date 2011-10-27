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
		$this->load->view("guest/home",$temp);
	}
	
	 public function layout1(){
        $temp['title']="BusInfo for Hochiminh";
       
		$this->load->view("guest/home",$temp);
	   
    }
    public function layout2(){
        $temp['title']="BusInfo for Hochiminh";
      
		$this->load->view("guest/home",$temp);
   	}
}