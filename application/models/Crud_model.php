<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{

    function input_data($data,$table){
        return $this->db->insert($table,$data);
    }

    function hapus_data($where,$table){
        $this->db->where($where);
        return $this->db->delete($table);
    }
 
    function update_data($where,$data,$table){
        $this->db->where($where);
        return $this->db->update($table,$data);
    } 
    
}
