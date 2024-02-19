<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterKamar_model extends CI_Model
{   
    public function getListDataKamar()
    {
        return $this->db->get('master_kamar');
    }

    public function getListDataKamarByJenisKamarUser()
    {
        $jenisKelamin = $this->session->userdata('jenisKelamin');

        return $this->db->get_where('master_kamar',['jenisKamar' => $jenisKelamin]);
    }

    public function getDetailKamarByWhere(array $where)
    {
        return $this->db->get_where('master_kamar', $where);
    }

    public function getTotalKamar()
    {
        return $this->db->count_all_results('master_kamar');
    }

}