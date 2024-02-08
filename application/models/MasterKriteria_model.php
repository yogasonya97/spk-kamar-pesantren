<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterKriteria_model extends CI_Model
{   
    public function getListDataKriteria()
    {
        return $this->db->get('master_kriteria');
    }

    public function getDetailKriteriaByWhere(array $where)
    {
        return $this->db->get_where('master_kriteria', $where);
    }
}