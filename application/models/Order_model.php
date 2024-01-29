<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{   
    public function getListOrder()
    {
        $query = "SELECT A.id_order, A.tgl_order, pelanggan.nama_lengkap as nama_pelanggan, kurir.nama_lengkap as nama_kurir, A.jenis_order, C.nama_status_order FROM order_laundry A 
        LEFT JOIN user pelanggan ON A.id_user_pelanggan = pelanggan.id_user
        LEFT JOIN user kurir ON A.id_user_kurir = kurir.id_user
        INNER JOIN master_status_order C ON A.id_status_order = C.id_status_order
        WHERE NOT C.nama_status_order = 'Selesai' ORDER BY A.tgl_order DESC";

        return $this->db->query($query)->result_array();
    }

    public function getListOrderSelesai()
    {
        $query = "SELECT A.id_order, A.tgl_order, pelanggan.nama_lengkap as nama_pelanggan, kurir.nama_lengkap as nama_kurir, A.jenis_order, C.nama_status_order FROM order_laundry A 
        LEFT JOIN user pelanggan ON A.id_user_pelanggan = pelanggan.id_user
        LEFT JOIN user kurir ON A.id_user_kurir = kurir.id_user
        INNER JOIN master_status_order C ON A.id_status_order = C.id_status_order
        WHERE C.nama_status_order = 'Selesai' ORDER BY A.tgl_order DESC";

        return $this->db->query($query)->result_array();
    }

public function getListOrderNumrRows($id_order)
{
    $query = "SELECT * FROM detail_order_laundry A 
        INNER JOIN order_laundry B ON A.id_order = B.id_order
        INNER JOIN master_jenis_laundry C ON A.id_jenis_laundry = C.id_jenis_laundry
        WHERE B.id_order = '".$id_order."'";

        return $this->db->query($query)->num_rows();
    }

    public function getCountOrderLaundry()
    {
        return $this->db->get('order_laundry')->num_rows();
    }

    // public function getListOrderDetail($id_order)
    // {
    //     $query = "SELECT * FROM detail_order_laundry A 
    //     INNER JOIN order_laundry B ON A.id_order = B.id_order
    //     INNER JOIN master_jenis_laundry C ON A.id_jenis_laundry = C.id_jenis_laundry
    //     WHERE B.id_order = '".$id_order."'";

    //     return $this->db->query($query)->result_array();
    // }

    public function getListOrderDetail($id_order)
    {
        $select = "*";
        $this->db->select($select);
        $this->db->from("detail_order_laundry A"); 
        $this->db->join('order_laundry B','A.id_order = B.id_order');
        $this->db->join('master_jenis_laundry C','A.id_jenis_laundry = C.id_jenis_laundry');
        $this->db->where('B.id_order',$id_order);

        return $this->db->get()->result_array();
    }

    public function getListOrderDetailTotal($id_order)
    {
        $query = "SELECT SUM(C.harga_laundry_kg) as total_bayar FROM detail_order_laundry A 
        INNER JOIN order_laundry B ON A.id_order = B.id_order
        INNER JOIN master_jenis_laundry C ON A.id_jenis_laundry = C.id_jenis_laundry
        WHERE B.id_order = '".$id_order."'";

        return $this->db->query($query)->row();
    }


    public function getListOrderById($id_order)
    {
        $select = "kurir.no_telpon as telp_kurir, kurir.nama_lengkap as nama_kurir, pelanggan.nama_lengkap as nama_pelanggan, stats.nama_status_order, A.tgl_order, A.jenis_order, A.total_bayar, A.id_user_kurir, A.id_user_pelanggan, A.id_status_order";
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('user kurir','A.id_user_kurir = kurir.id_user','left');
        $this->db->join('user pelanggan','A.id_user_pelanggan=pelanggan.id_user','left');
        $this->db->join('master_status_order stats','A.id_status_order=stats.id_status_order');
        $this->db->where('A.id_order',$id_order);
        $this->db->order_by('A.tgl_order','DESC');
        return $this->db->get()->row();
    }

    public function getOrderByIdUserPelanggan($id_user)
    {
        // $where = ['id_order' =>$id_order,];
        $select = 'A.id_order,A.tgl_order, B.nama_status_order';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B', 'A.id_status_order = B.id_status_order');
        // $this->db->join('master_status_order B','A.id_status_order',"=",'B.id_status_order');
        $this->db->where('A.id_user_pelanggan',$id_user);
        $this->db->where('B.nama_status_order !=','Selesai');
        $this->db->order_by('A.tgl_order','DESC');
       
        return $this->db->get();
    }

    public function getOrderDetailByIdOrder($id_order)
    {
        $select = "kurir.no_telpon as telp_kurir, kurir.nama_lengkap as nama_kurir, pelanggan.nama_lengkap as nama_pelanggan, stats.nama_status_order, A.tgl_order, A.jenis_order, A.total_bayar, A.id_user_kurir, A.id_user_pelanggan, A.id_status_order, A.id_order,lokasi_kurir.lat_kurir, lokasi_kurir.long_kurir,lokasi_pelanggan.lat_pelanggan, lokasi_pelanggan.long_pelanggan, pelanggan.no_telpon as telp_pelanggan";
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('user kurir', 'A.id_user_kurir=kurir.id_user','left');
        $this->db->join('master_kurir lokasi_kurir', 'kurir.id_user=lokasi_kurir.id_user_kurir','left');
        $this->db->join('user pelanggan', 'A.id_user_pelanggan=pelanggan.id_user','left');
        $this->db->join('master_pelanggan lokasi_pelanggan', 'pelanggan.id_user=lokasi_pelanggan.id_user_pelanggan','left');
        $this->db->join('master_status_order stats', 'A.id_status_order=stats.id_status_order'); 
        $this->db->where('A.id_order',$id_order);
        
        return $this->db->get()->result_array();
    }

    public function getOrderByIdUserKurir($id_user_kurir)
    {
        // $where = ['id_order' =>$id_order,];
        $select = 'A.id_order,A.tgl_order, B.nama_status_order';
        $this->db->select($select);
        $this->db->from('order_laundry A');
        $this->db->join('master_status_order B', 'A.id_status_order = B.id_status_order');
        // $this->db->join('master_status_order B','A.id_status_order',"=",'B.id_status_order');
        $this->db->where('A.id_user_kurir',$id_user_kurir);
        $this->db->where('B.nama_status_order !=','Selesai');
        $this->db->order_by('A.tgl_order','DESC');
        return $this->db->get();
    }

    public function getBeratOrderByIdUserPelanggan($id_user_pelanggan)
    {
        // $where = ['id_order' =>$id_order,];
        $select = "SUM(detail_orders.berat_laundry) as jml_berat";
        $this->db->select($select);
        $this->db->from('order_laundry orders');
        $this->db->join('detail_order_laundry detail_orders', 'orders.id_order = detail_orders.id_order');
        $this->db->join('master_status_order status', 'orders.id_status_order = status.id_status_order');
        // $this->db->join('master_status_order B','A.id_status_order',"=",'B.id_status_order');
        $this->db->where('orders.id_user_pelanggan',$id_user_pelanggan);
        $this->db->where('status.nama_status_order','Selesai');
       
        return $this->db->get();
    }

    public function countDataMenungguOrderByPelanggan($id_user_pelanggan)
    {
        // $where = ['id_order' =>$id_order,];
        // $select = 'COUNT(A.id_order) as jml_pesanan';
        // $this->db->select($select);
        // $this->db->from('order_laundry A');
        // $this->db->join('master_status_order B', 'A.id_status_order = B.id_status_order');
        // $this->db->where("A.id_user_pelanggan =='".$id_user_pelanggan."'");
        // $this->db->where("B.nama_status_order != 'Selesai'");
        // return $this->db->get();
        $query = "SELECT COUNT(A.id_order) AS jml_pesanan FROM order_laundry A INNER JOIN master_status_order B ON A.id_status_order=B.id_status_order WHERE A.id_user_pelanggan = '".$id_user_pelanggan."' AND B.nama_status_order != 'Selesai'";
        return $this->db->query($query);
    }

    public function countDataSelesaiOrderByPelanggan($id_user_pelanggan)
    {
        // $where = ['id_order' =>$id_order,];
        // $select = 'COUNT(A.id_order) as jml_pesanan';
        // $this->db->select($select);
        // $this->db->from('order_laundry A');
        // $this->db->join('master_status_order B', 'A.id_status_order = B.id_status_order');
        // $this->db->where("A.id_user_pelanggan =='".$id_user_pelanggan."'");
        // $this->db->where("B.nama_status_order == 'Selesai'");
        $query = "SELECT COUNT(A.id_order) AS jml_pesanan FROM order_laundry A INNER JOIN master_status_order B ON A.id_status_order=B.id_status_order WHERE A.id_user_pelanggan = '".$id_user_pelanggan."' AND B.nama_status_order = 'Selesai'";
        return $this->db->query($query);
    }
    

}
