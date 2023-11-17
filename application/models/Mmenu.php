<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Mmenu extends CI_Model
{

    function findAll()
    {
        return $this->db->get('product')->result();
    }

    function find($id)
    {
        return $this->db->where('id', $id)->get('product')->row();
    }

}