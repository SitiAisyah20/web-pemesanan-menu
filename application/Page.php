<?php
class Page extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') !== TRUE){
			redirect('login');
		}
		$this->load->model('M_login');
		$this->load->helper('html');
		$this->load->library('form_validation');
	}
	public function index(){
		//user
		if($this->session->userdata('level')=='1'){
			$this->load->view('home');
		}else{
			echo "Akses ditolak!";
		}
	}
	public function menu(){
		//user
		if($this->session->userdata('level')=='1'){
			$this->load->view('menu');
		}else{
			echo "Akses ditolak!";
		}
	}
	public function about(){
		//user
		if($this->session->userdata('level')==='1'){
			$this->load->view('about');
		}else{
			echo "Akses ditolak!";
		}
	}
	public function book(){
		//user
		if($this->session->userdata('level')==='1'){
			$this->load->view('book');
		}else{
			echo "Akses ditolak!";
		}
	}
	public function admin(){
		//user
		if($this->session->userdata('level')==='2'){
			$this->load->view('admin');
		}else{
			echo "Akses ditolak!";
			// echo $this->session->level;
			// echo $this->session->name;
		}
	}
	public function tambah_menu(){
		// $this->load->model('M_login');
		//user
		if($this->session->userdata('level')==='2'){
			$this->load->view('tambah_menu');
		}else{
			echo "Akses ditolak!";
			// echo $this->session->level;
			// echo $this->session->name;
		}
	}
	public function aksi_simpan(){
		// $this->load->model('M_login');
		$nameMenu=$this->input->post('namamenu');
		$desc=$this->input->post('deskripsi');
		$price=$this->input->post('harga');
		$amount=$this->input->post('jumlah');
		$price=$this->input->post('harga');
		$data=array(
			'namamenu' => $nameMenu,
			'deskripsi' => $desc,
			'harga' => $price,
			'jumlah' => $amount
		);
		$this->M_login->insert_menu($data);
		if($this->db->affected_rows()){
			redirect('page');
		}else{
			redirect('page/tambah_menu');
		}
		$config['upload_path']		='./uploads/';
		$config['allowed_types']	='gif|jpg|png';
		$config['max_size']			=100;
		$config['max_width']		=1024;
		$config['max_height']		=768;

		$this->load->library('upload', $config);

		if(! $this->upload->do_upload('berkas')){
			$error=array('error' => $this->upload->display_errors());
			$this->load->view('tambah_menu', $error);
		}else{
			$data=array('upload_data' => $this->upload->data());
			$this->load->view('tambah_menu', $data);
		}
	}
	public function upload_file(){
		$this->load->model('M_login');
		$this->load->view('tambah_menu', array('error' => ' '));
	}

	public function aksi_upload(){
		$this->load->model('M_login');
		$config['upload_path']		='./uploads/';
		$config['allowed_types']	='gif|jpg|png';
		$config['max_size']			=100;
		$config['max_width']		=1024;
		$config['max_height']		=768;

		$this->load->library('upload', $config);

		if(! $this->upload->do_upload('berkas')){
			$error=array('error' => $this->upload->display_errors());
			$this->load->view('tambah_menu', $error);
		}else{
			$data=array('upload_data' => $this->upload->data());
			$this->load->view('tambah_menu', $data);
		}
	}
}
?>