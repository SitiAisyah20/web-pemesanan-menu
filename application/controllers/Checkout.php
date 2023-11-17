<?php
date_default_timezone_set('Asia/Jakarta');
class Checkout extends CI_Controller{
    function  __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->model('Mproduct');
        $this->load->model('Mcrud');
        $this->controller = 'checkout';
    }
    function index(){
        if($this->cart->total_items() <= 0){
            redirect('product/');
        }
        $custData = $data = array();
        $submit = $this->input->post('placeOrder');
        if(isset($submit)){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('nomorMeja', 'Nomor', 'required');
            $custData = array(
                'nama'     => strip_tags($this->input->post('name')),
                'nomorMeja'     => strip_tags($this->input->post('nomorMeja'))
            );
            if($this->form_validation->run() == true){
                $insert = $this->Mproduct->insertCustomer($custData);
                if($insert){
                    $order = $this->placeOrder($insert);
                    redirect($this->controller.'/orderSuccess/'.$order);
                }
            }
        }
        $data['custData'] = $custData;
        $data['cartItems'] = $this->cart->contents();
        $this->template->load('layout_user','user/checkout',$data);
    }
    function placeOrder($custID){
        $ordData = array(
            'idPemesan' => $custID,
            'total' => $this->cart->total()
        );
        $insertOrder = $this->Mproduct->insertOrder($ordData);
        if($insertOrder){
            $cartItems = $this->cart->contents();
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['idOrder']     = $insertOrder;
                $ordItemData[$i]['idMenu']     = $item['id'];
                $ordItemData[$i]['jmlOrder']     = $item['qty'];
                $ordItemData[$i]['subtotal']     = $item["subtotal"];
                $i++;
            }            
            if(!empty($ordItemData)){
                $insertOrderItems = $this->Mproduct->insertOrderItems($ordItemData);            
                if($insertOrderItems){
                    $this->cart->destroy();
                    return $insertOrder;
                }
            }
        }
        return false;
    }    
    function orderSuccess($ordID){
        $data['order'] = $this->Mproduct->getOrder($ordID);
        $this->template->load('layout_user','user/order_success',$data);
    }    
}

