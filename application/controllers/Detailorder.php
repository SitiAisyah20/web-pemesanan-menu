<?php

class Detailorder extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->library("session");
	}

	public function index(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}

		$data['detailorder']=$this->Mcrud->get_view('vdetailorder')->result();
		$this->template->load('layout_admin','admin/detailorder/index', $data);
	}

}

