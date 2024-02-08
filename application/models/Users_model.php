<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{   
    public function getAllUserData()
    {
        $this->db->select('email, fullName, levelUser AS role');
        return $this->db->from('users');
    }

    public function getUserDataById($id)
    {
        $this->db->select('email, fullName, levelUser AS role');
        $this->db->from('users');
        return  $this->db->where('userId', $id);
    }

    public function getTotalClient()
    {
        $this->db->from('users');
        $this->db->where('levelUser', '2');
        return $this->db->count_all_results();
    }
}