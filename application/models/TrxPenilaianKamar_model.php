<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrxPenilaianKamar_model extends CI_Model
{   
    public function getNilaiKamarById($id)
    {
        $this->db->select('kamarId, kriteriaId, nilai, createdAt');
        $this->db->from('trx_penilaian_kamar');
        // $this->db->where("MONTH(createdAt) = MONTH(CURRENT_DATE())");
        return $this->db->where('kamarId', $id)->get();
    }
}