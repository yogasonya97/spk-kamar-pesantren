<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    public function get_data($select, $table, $where = [])
    {
        $this->db->select($select);
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            $res = successResponse('Berhasil menambahkan data');
        } else {
            $res = failResponse('Gagal menambahkan data');
        }
        return $res;
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {
            $res = successResponse('Berhasil menghapus data');
        } else {
            $res = failResponse('Gagal menghapus data atau data tidak ditemukan');
        }
        return $res;
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() > 0) {
            $res = successResponse('Berhasil merubah data');
        } else {
            $res = failResponse('Gagal merubah data atau data tidak berubah');
        }
        return $res;
    }

}
