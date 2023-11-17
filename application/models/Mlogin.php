<?php 
class Mlogin extends CI_Model{

	public function cek_login($u, $p){
		$q=$this->db->get_where('admin', array('username'=>$u, 'password'=>$p));
		return $q;
	}
}
?>