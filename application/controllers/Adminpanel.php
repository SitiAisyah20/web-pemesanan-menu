<?php 

class Adminpanel extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->library("session");
	}
	
	public function dashboard()
	{
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		redirect('menu');
	}

	public function index() {
		$this->load->view('form_login');
	}
}
?>

