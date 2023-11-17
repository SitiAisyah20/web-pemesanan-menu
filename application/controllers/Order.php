<?php

class Order extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->library("session");
	}

	public function index(){
		if(empty($this->session->userdata('username'))){
			redirect('adminpanel');
		}

        $data = $this->Mcrud->get_all_data('pesanan')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $o){
	                $data['pesanan'][$i] = array(
	                    'idOrder' => $o->idOrder,
	                    'nama' => $this->Mcrud->get_detail('pemesan','idPemesan',$o->idPemesan,'nama'),
                        'nomorMeja' => $this->Mcrud->get_detail('pemesan','idPemesan',$o->idPemesan,'nomorMeja'),
						'tglOrder' => $o->tglOrder,
                        'total' => $o->total
	                );
	                $data['pesanan'][$i] = (object)$data['pesanan'][$i];
	                $i++;
	            }
	        }else{
	        	$data['pesanan']=array();
	        }
		$this->template->load('layout_admin','admin/pesanan/index', $data);
	}
}

