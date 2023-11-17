<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->library("session");
	}
	public function index(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$data['kategori']=$this->Mcrud->get_all_data('kategori')->result();
		$this->template->load('layout_admin','admin/kategori/index', $data);
	}
	public function add(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$this->template->load('layout_admin','admin/kategori/form_add');
	}
	public function save(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$namaKategori=$this->input->post('namaKategori');
		$dataInsert=array('namakat'=>$namaKategori);
		$this->Mcrud->insert('kategori', $dataInsert);
		$this->session->set_flashdata('success', 'Kategori berhasil ditambah');
		$this->session->set_flashdata('error', 'Kategori gagal ditambah');
		redirect('kategori');
	}
	public function getid($id){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$dataWhere=array('idkat'=>$id);
		$data['kategori']=$this->Mcrud->get_by_id('kategori',$dataWhere)->row_object();
		$this->template->load('layout_admin','admin/kategori/form_edit', $data);
	}
	public function edit(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$id=$this->input->post('id');
		$namaKategori=$this->input->post('namaKategori');
		$dataUpdate=array('namakat'=>$namaKategori);
		$this->Mcrud->update('kategori', $dataUpdate, 'idkat', $id);
		$this->session->set_flashdata('success', 'Kategori berhasil diedit');
		$this->session->set_flashdata('error', 'Kategori gagal diedit');
		redirect('kategori');
	}
	public function delete($id){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$dataDelete=array('idkat'=>$id);
		$this->Mcrud->delete($dataDelete,'kategori');
		$this->session->set_flashdata('success', 'Kategori berhasil dihapus');
		$this->session->set_flashdata('error', 'Kategori gagal dihapus');
		redirect('kategori');
	}
}

