<?php

class User extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->model('Mproduct');
		$this->load->library("session");
		$this->load->library('cart');
	}

	public function index(){
		$data['menu']=$this->Mcrud->get_all_data('menu')->result();
		$data['vmakanan']=$this->Mcrud->get_view('vmakanan')->result();
		$data['vminuman']=$this->Mcrud->get_view('vminuman')->result();
		$this->template->load('layout_user','user/home',$data);
	}

	public function menu(){
		$data['menu']=$this->Mcrud->get_all_data('menu')->result();
		$data['vmakanan']=$this->Mcrud->get_view('vmakanan')->result();
		$data['vminuman']=$this->Mcrud->get_view('vminuman')->result();
		$this->template->load('layout_user','user/menu',$data);
	}

	public function about(){
		$this->template->load('layout_user','user/about');
	}

	public function cart(){
		redirect('cart');
	}

	public function addToCart($id){
        $product = $this->Mproduct->getRows($id);

        $data = array(
            'id'    => $product['idMenu'],
            'qty'    => 1,
            'price'    => $product['harga'],
            'name'    => $product['namaMenu'],
            'image' => $product['gambar']
        );
        $this->cart->insert($data);

        redirect('cart/',$data);
    }

	public function checkout(){
        redirect('checkout/');
	}
}

