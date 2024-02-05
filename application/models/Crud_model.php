<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    function get_data($select, $table, $where = [])
    {
        $this->db->select($select);
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    function input_data($data,$table)
    {
        $this->db->insert($table,$data);
        if ($this->db->affected_rows() > 0) {
            $res = [
                'responseCode' => 1,
                'response' => 'Berhasil menambahkan data'
            ];
        } else {
            $res = [
                'responseCode' => 0,
                'response' => 'Gagal menambahkan data'
            ];
        }

        return $res;
    }

    function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {
            $res = [
                'responseCode' => 1,
                'response' => 'Berhasil menghapus data'
            ];
        } else {
            $res = [
                'responseCode' => 0,
                'response' => 'Gagal menghapus data atau data tidak ditemukan'
            ];
        }

        return $res;
    }
 
    function update_data($where,$data,$table)
    {
		// var_dump($where);
        $this->db->where($where);
        $this->db->update($table,$data);
        if ($this->db->affected_rows() > 0) {
            $res = [
                'responseCode' => 1,
                'response' => 'Berhasil merubah data'
            ];
        } else {
            $res = [
                'responseCode' => 0,
                'response' => 'Gagal merubah data atau data tidak berubah'
            ];
        }

        return $res;
    } 
    
}
