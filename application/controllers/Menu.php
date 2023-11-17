<?php
class Menu extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->library('session');
		$this->load->library('upload');
	}
	public function index(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$data = $this->Mcrud->get_all_data('menu')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $o){
	                $data['menu'][$i] = array(
	                    'idMenu' => $o->idMenu,
	                    'namakat' => $this->Mcrud->get_detail('kategori','idkat',$o->idkat,'namakat'),
	                    'namaMenu' => $o->namaMenu,
	                    'harga' => $o->harga,
	                    'deskripsi' => $o->deskripsi,
	                    'gambar' => $o->gambar
	                );
	                $data['menu'][$i] = (object)$data['menu'][$i];
	                $i++;
	            }
	        }else{
	        	$data['menu']=array();
	        }
		$this->template->load('layout_admin','admin/menu/index', $data);
	}
	public function add(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$data['kategori']=$this->Mcrud->get_all_data('kategori')->result();
    	$this->template->load('layout_admin','admin/menu/form_add',$data);
	}
	public function save(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$data = $this->input->post();
		$target_dir = "./uploads/";
        $extension  = pathinfo( $_FILES["gambar"]["name"], PATHINFO_EXTENSION );
        $target_name = $data['namaMenu']."-gambar.".$extension;
        $_FILES["gambar"]["name"] = $target_name;
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

        $data['gambar'] = $target_name;
        $status = $this->Mcrud->insert('menu', $data);

        if($status != NULL ){
                redirect('menu');
            } else {
                redirect('menu');
            }
	}
	public function getid($id){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$dataWhere=array('idMenu'=>$id);
		$result = $this->Mcrud->get_by_id('menu', $dataWhere)->row_object();
        $data['menu'] = array(
        	'idMenu' => $result->idMenu,
        	'namakat' => $this->Mcrud->get_detail('kategori','idkat',$result->idkat,'namakat'),
        	'namaMenu' => $result->namaMenu,
        	'gambar' => $result->gambar,
        	'harga' => $result->harga,
        	'deskripsi' => $result->deskripsi
        );
        $data['menu'] = (object)$data['menu'];
		$data['kategori']=$this->Mcrud->get_all_data('kategori')->result();
		$this->template->load('layout_admin','admin/menu/form_edit', $data);
	}
	public function edit(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$id = $this->input->post('idMenu');
		$data = $this->input->post();
		$target_dir = "./uploads/";
        $extension  = pathinfo( $_FILES["gambar"]["name"], PATHINFO_EXTENSION );
        $target_name = $data['namaMenu']."-gambar.".$extension;
        $_FILES["gambar"]["name"] = $target_name;
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
        $data['gambar'] = $target_name;
        $this->Mcrud->updatee('menu', $data, 'idMenu', $id);   
        redirect('menu');
	}
	public function delete($id){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}
		$dataDelete=array('idMenu'=>$id);
		$this->Mcrud->delete($dataDelete,'menu');
		$this->session->set_flashdata('success', 'Produk berhasil dihapus');
		$this->session->set_flashdata('error', 'Produk gagal dihapus');
		redirect('menu');
	}
}

