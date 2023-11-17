<?php
class Mproduct extends CI_Model{
    function __construct() {
        $this->proTable = 'menu';
        $this->custTable = 'pemesan';
        $this->ordTable = 'pesanan';
        $this->ordItemsTable = 'detail_order';
    }
    public function getRows($id = 'idMenu'){
        $this->db->select('*');
        $this->db->from($this->proTable);
        if($id){
            $this->db->where('idMenu', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('namaMenu', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    public function getOrder($id){
        $this->db->select('o.*, c.nama, c.nomorMeja');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.idPemesan = o.idPemesan', 'left');
        $this->db->where('o.idOrder', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        $this->db->select('i.*, p.namaMenu, p.gambar, p.harga');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.idMenu = i.idMenu', 'left');
        $this->db->where('i.idOrder', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();

        return !empty($result)?$result:false;
    }
    public function insertCustomer($data){
        $insert = $this->db->insert($this->custTable, $data);
        return $insert?$this->db->insert_id():false;
    }
    public function insertOrder($data){
        if(!array_key_exists("tglOrder", $data)){
            $data['tglOrder'] = date("Y-m-d H:i:s");
        }
        $insert = $this->db->insert($this->ordTable, $data);
        return $insert?$this->db->insert_id():false;
    }
    public function insertOrderItems($data = array()) {
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);
        return $insert?true:false;
    }
}

