<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function getDataPesananPelangganPerWilayah()
    {
        $query = "SELECT pelanggan.id_wilayah, count(ord_laundry.id_order)as jml_order, COUNT(wilayah.nama_wilayah) as jml_wilayah, wilayah.nama_wilayah  FROM order_laundry ord_laundry
        -- INNER JOIN detail_order_laundry dtl_laundry ON ord_laundry.id_order = dtl_laundry.id_order
        INNER JOIN user pelanggan ON ord_laundry.id_user_pelanggan = pelanggan.id_user
        INNER JOIN master_wilayah wilayah ON pelanggan.id_wilayah = wilayah.id_wilayah
        WHERE pelanggan.level_user = 'Pelanggan'
        GROUP BY pelanggan.id_wilayah
        ORDER BY jml_order DESC";
        return $this->db->query($query);
    }

    public function getDataPelangganOrderTerbanyak()
    {
        $select = 'ord_laundry.id_user_pelanggan, count(ord_laundry.id_order)as jml_order, pelanggan.nama_lengkap';
        $this->db->select($select);
        $this->db->from('order_laundry ord_laundry');
        // $this->db->join('detail_order_laundry detail_ord','ord_laundry.id_order=detail_ord.id_order');
        $this->db->join('user pelanggan','ord_laundry.id_user_pelanggan=pelanggan.id_user');
        $this->db->where('pelanggan.level_user','Pelanggan');
        $this->db->group_by('ord_laundry.id_user_pelanggan'); 
        $this->db->order_by('jml_order', 'desc');
        return $this->db->get();
    }

    public function getCountPelanggan(){
        $select = 'COUNT(id_user) AS jmlPelanggan';
        $this->db->select($select);
        $this->db->from('user');
        $this->db->where('level_user','Pelanggan');
        $this->db->where('status_akun','1');
        return $this->db->get();
    }

    public function getCountTotalPelanggan(){
        $select = 'COUNT(id_user) AS jmlTotalPelanggan';
        $this->db->select($select);
        $this->db->from('user');
        $this->db->where('level_user','Pelanggan');
        return $this->db->get();
    }

    public function getDataPelanggan(){
        $select = '*';
        $this->db->select($select);
        $this->db->from('user');
        $this->db->where('level_user','Pelanggan');
        $this->db->order_by('status_akun', 'desc');
  
        return $this->db->get();
    }

    public function getTotalPendapatanToday($first_date){
        $select = 'SUM(A.total_bayar) AS jmlPendapatan';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B','A.id_status_order=B.id_status_order');
        $this->db->where('A.tgl_order', $first_date);
        $this->db->where('B.nama_status_order','Selesai');
  
        return $this->db->get();
    }

    public function getTotalPesananSelesaiToday($first_date){
        $select = 'COUNT(A.id_order) AS jmlPesanan';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B','A.id_status_order=B.id_status_order');
        $this->db->where('A.tgl_order', $first_date);
        $this->db->where('B.nama_status_order','Selesai');
  
        return $this->db->get();
    }

    public function getTotalPendapatanBetween($first_date,$second_date){
        $select = 'SUM(total_bayar) AS jmlPendapatanToday';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B','A.id_status_order=B.id_status_order');
        $this->db->where('A.tgl_order >=', $first_date);
        $this->db->where('A.tgl_order <=', $second_date);
        $this->db->where('B.nama_status_order','Selesai');
        // $this->db->order_by('status_akun', 'desc');
  
        return $this->db->get();
    }

    public function getTotalPendapatanAll(){
        $select = 'SUM(total_bayar) AS jmlTotalPendapatan';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B','A.id_status_order=B.id_status_order');
        $this->db->where('B.nama_status_order','Selesai');
        // $this->db->order_by('status_akun', 'desc');
  
        return $this->db->get();
    }

    public function getTotalPesananSelesaiAll(){
        $select = 'COUNT(id_order) AS jmlTotalPesanan';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B','A.id_status_order=B.id_status_order');
        $this->db->where('B.nama_status_order','Selesai');
        // $this->db->order_by('status_akun', 'desc');
  
        return $this->db->get();
    }

    //Dashboard Kurir Start
    public function getDataTotalPesananMasukKurir($id_user_kurir){
        $select = 'COUNT(id_order) AS jmlTotalPesananMasuk';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B','A.id_status_order=B.id_status_order');
        $this->db->where('B.nama_status_order !=','Selesai');
        $this->db->where('A.id_user_kurir',$id_user_kurir);

        return $this->db->get();
    }

    public function getDataTotalPesananSelesaiKurir($id_user_kurir){
        $select = 'COUNT(id_order) AS jmlTotalPesananSelesai';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B','A.id_status_order=B.id_status_order');
        $this->db->where('B.nama_status_order','Selesai');
        $this->db->where('A.id_user_kurir',$id_user_kurir);

        return $this->db->get();
    }
    
}
