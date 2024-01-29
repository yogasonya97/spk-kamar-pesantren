<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('validate') != true && $this->session->userdata('role') != 'Admin') {
			redirect(base_url() . 'login');
		} else if ($this->session->userdata('validate') == true && $this->session->userdata('role') != 'Admin'){
			redirect(base_url() . 'error');
		}

		$this->load->model('order_model');
		$this->load->model('kurir_model');
		$this->load->model('pelanggan_model');
		$this->load->model('crud_model');
		$this->load->model('jadwal_model');
		$this->load->model('dashboard_model');
	}

	// PAGE
	public function index()
	{
		$getSession = $this->session->userdata;
		$data['role'] = $getSession['role'];
		$data['page'] = "Dashboard";
		$data['jumlahPelanggan'] = $this->dashboard_model->getCountPelanggan()->row();
		$data['jumlahTotalPelanggan'] = $this->dashboard_model->getCountTotalPelanggan()->row();
		$data['masterPelanggan'] = $this->dashboard_model->getDataPelanggan()->result_array();
		$data['dataPelangganOrderTerbanyak'] = $this->dashboard_model->getDataPelangganOrderTerbanyak()->result_array();
		$data['dataPelangganOrderTerbanyakPerWilayah'] = $this->dashboard_model->getDataPesananPelangganPerWilayah()->result_array();
		$dataBerat = [];
		foreach($data['masterPelanggan'] as $key => $val){
			$dataBerat[] = $this->order_model->getBeratOrderByIdUserPelanggan($val['id_user'])->result_array();
		}
		$data['beratLaundry'] = $dataBerat;
		$this->load->view('admin/layouts/header.php',$data);
		$this->load->view('admin/layouts/side_bar.php',$data);
		$this->load->view('admin/dashboard.php',$data);
		$this->load->view('admin/layouts/footer.php');
		
	}

	public function jadwal()
	{
		$getSession = $this->session->userdata;
		$data['role'] = $getSession['role'];
		$data['page'] = "Jadwal Laundry";
		$data['dataJadwal'] = $this->jadwal_model->listJadwal()->result_array();
		$this->load->view('admin/layouts/header.php',$data);
		$this->load->view('admin/layouts/side_bar.php',$data);
		$this->load->view('admin/jadwal/index.php',$data);
		$this->load->view('admin/layouts/footer.php');
	}

	public function administrasi_order($status_order=null)
	{
		
		$getSession = $this->session->userdata;
		$data['role'] = $getSession['role'];
		$data['page'] = "Administrasi Order Laundry";
		if ($status_order=="Selesai"){
			$data['filterStatus'] ="Selesai";
			$data['getListOrder'] = $this->order_model->getListOrderSelesai();
		}else {
			$data['filterStatus'] ="Belum Selesai";
			$data['getListOrder'] = $this->order_model->getListOrder();
		}
		$this->load->view('admin/layouts/header.php',$data);
		$this->load->view('admin/layouts/side_bar.php',$data);
		$this->load->view('admin/administrasi_order/form_buat_invoice.php');
		$this->load->view('admin/administrasi_order/form_tambah.php');
		$this->load->view('admin/administrasi_order/index.php',$data);
		$this->load->view('admin/administrasi_order/form_kurir.php');
		$this->load->view('admin/administrasi_order/modal_rincian.php');
		$this->load->view('admin/administrasi_order/form_status.php');
		$this->load->view('admin/layouts/footer.php');
		
	}

	public function master_kurir()
	{
		$getSession = $this->session->userdata;
		$data['role'] = $getSession['role'];
		$data['page'] = "Data Master Kurir";
		$data['masterKurir'] = $this->db->get_where('user', ['level_user'=>'Kurir',])->result_array();
		$this->load->view('admin/layouts/header.php',$data);
		$this->load->view('admin/layouts/side_bar.php',$data);
		$this->load->view('admin/master_kurir/index.php',$data);
		$this->load->view('admin/master_kurir/tambah.php',$data);
		$this->load->view('admin/master_kurir/update.php',$data);
		$this->load->view('admin/layouts/footer.php');	
	}

	public function master_pelanggan()
	{
		$getSession = $this->session->userdata;
		$data['role'] = $getSession['role'];
		$data['page'] = "Data Master Pelanggan";
		$data['masterPelanggan'] = $this->db->get_where('user', ['level_user'=>'Pelanggan',])->result_array();
		$this->load->view('admin/layouts/header.php',$data);
		$this->load->view('admin/layouts/side_bar.php',$data);
		$this->load->view('admin/master_pelanggan/index.php',$data);
		// $this->load->view('admin/master_pelanggan/tambah.php',$data);
		// $this->load->view('admin/master_pelanggan/update.php',$data);
		$this->load->view('admin/layouts/footer.php');	
	}

	public function master_jenis_laundry()
	{
		$getSession = $this->session->userdata;
		$data['role'] = $getSession['role'];
		$data['page'] = "Data Master Jenis Laundry";
		$data['masterJenisLaundry'] = $this->db->get('master_jenis_laundry')->result_array();
		$this->load->view('admin/layouts/header.php',$data);
		$this->load->view('admin/layouts/side_bar.php',$data);
		$this->load->view('admin/master_jenis_laundry/index.php',$data);
		$this->load->view('admin/master_jenis_laundry/tambah.php',$data);
		$this->load->view('admin/master_jenis_laundry/update.php',$data);
		$this->load->view('admin/layouts/footer.php');	
	}

	public function master_status_order()
	{
		$getSession = $this->session->userdata;
		$data['role'] = $getSession['role'];
		$data['page'] = "Data Master Status Order";
		$data['masterStatusOrder'] = $this->db->get('master_status_order')->result_array();
		$this->load->view('admin/layouts/header.php',$data);
		$this->load->view('admin/layouts/side_bar.php',$data);
		$this->load->view('admin/master_status_order/index.php',$data);
		$this->load->view('admin/master_status_order/tambah.php',$data);
		$this->load->view('admin/master_status_order/update.php',$data);
		$this->load->view('admin/layouts/footer.php');	
	}

	public function print_order($id_order)
	{
		$data['dataOrder'] = $this->order_model->getOrderDetailByIdOrder($id_order);
		foreach($data['dataOrder'] as $order){
			$id_user_pelanggan = $order['id_user_pelanggan'];
		}
		$data['beratLaundry'] = $this->order_model->getBeratOrderByIdUserPelanggan($id_user_pelanggan)->row();
		$data['listOrderDetail'] = $this->order_model->getListOrderDetail($id_order);
		// print_r($data);
		$this->load->view('admin/administrasi_order/print_order.php',$data);
	}

	public function getBeratLaundryUserPelanggan($id_user_pelanggan)
	{
		$data = $this->order_model->getBeratOrderByIdUserPelanggan($id_user_pelanggan)->result_array();
		echo json_encode($data);
	}

	// API Response JSON
	public function filterDateTotalPendapatanToday($first_date)
	{
		// $first_date = $this->input->post('firstDate');
		// die($first_date);
		// $second_date = $this->input->post('secondDate');
		$data = $this->dashboard_model->getTotalPendapatanToday($first_date)->row();
		echo json_encode($data);
	}

	public function totalPendapatanAll()
	{
		$data = $this->dashboard_model->getTotalPendapatanAll()->row();
		echo json_encode($data);
	}

	public function filterDateTotalPesananSelesaiToday($first_date)
	{
		// $first_date = $this->input->post('firstDate');
		// die($first_date);
		// $second_date = $this->input->post('secondDate');
		$data = $this->dashboard_model->getTotalPesananSelesaiToday($first_date)->row();
		echo json_encode($data);
	}


	public function totalPesananSelesaiAll()
	{
		$data = $this->dashboard_model->getTotalPesananSelesaiAll()->row();
		echo json_encode($data);
	}

	public function tambahInvoice()
	{
		$getSession = $this->session->userdata;
		$id_user = $getSession['user_id'];
		$countNumrows = $this->order_model->getCountOrderLaundry();
		$id_order = date('Y').rand().$countNumrows;
		// die($id_order);
		$jenis_order = $this->input->post('jenis_order');
		
		$dataPost = array(
			'id_order' => $id_order,
			'id_user_pelanggan' => $id_user,
			'jenis_order' => $jenis_order,
			'tgl_order' => date('Y-m-d'), 
			'id_status_order' => 1,
		);

		$query = $this->db->insert('order_laundry', $dataPost);

		if ($query) {
			echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Tambah Invoice"]);
		} else {
			echo json_encode(["status"=>"Gagal","msg"=>"Gagal Tambah Invoice"]);
		}	
	}

	public function tambahOrderDetails()
	{
		$id_order = $this->input->post('id_order');

		$dataInsertOrderDetails = array(
			'id_order' => $id_order,
			'id_jenis_laundry' => $this->input->post('id_jenis_laundry'),
			'berat_laundry' => $this->input->post('berat_laundry'),
			'total_harga' => $this->input->post('total_harga'), 
		);

		$orderDetailsInsert = $this->crud_model->input_data($dataInsertOrderDetails,'detail_order_laundry');

		$getDataTotalHarga = $this->db->query("SELECT SUM(total_harga) as jml_total_harga FROM `detail_order_laundry` WHERE id_order = '".$id_order."'")->row();

		$total_bayar = $getDataTotalHarga->jml_total_harga;

		$dataUpdateOrder = array(
			'total_bayar' => $total_bayar, 
		);

		$where = array('id_order' => $id_order,);
		
		$this->crud_model->update_data($where,$dataUpdateOrder,'order_laundry');

		echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Tambah Order"]);
	}

	public function tambahMasterKurir()
	{
		
		$getSession = $this->session->userdata;
		$data['role'] = $getSession['role'];

		$no_ktp = $this->input->post('no_ktp');
		$email = $this->input->post('email');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$alamat = $this->input->post('alamat');
		$no_telpon = $this->input->post('no_telpon');

		$password = md5('123456');

		$dataPost = array(
			'email' => $email,
			'nama_lengkap' => $nama_lengkap,
			'alamat' => $alamat, 
			'no_ktp' => $no_ktp,
			'no_telpon' => $no_telpon,
			'password' => $password,
			'status_akun' => 0,
			'level_user' => 'Kurir',
		);

		$query = $this->db->insert('user', $dataPost);

		if ($query) {
			echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Tambah Kurir"]);
		} else {
			echo json_encode(["status"=>"Gagal","msg"=>"Gagal Tambah Kurir"]);
		}	
	}

	public function updateOrderKurir()
	{
		$id_order = $this->input->post('id_order');
		$id_user_kurir = $this->input->post('id_user_kurir');
		// die($id_user_kurir);
		$dataUpdateOrder = array(
			'id_user_kurir' => $id_user_kurir, 
		);

		$where = array('id_order' => $id_order);
		
		$this->crud_model->update_data($where, $dataUpdateOrder,'order_laundry');

		// if ($exec) {
			echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Pilih Kurir"]);
		// }else {
		// 	echo json_encode(["status"=>"Gagal","msg"=>"Gagal Pilih Kurir"]);
		// }
	}

	public function updateStatusOrder()
	{
		$id_order = $this->input->post('id_order');
		$id_status_order = $this->input->post('id_status_order');
		// die($id_user_kurir);
		$dataUpdateOrder = array(
			'id_status_order' => $id_status_order, 
		);
		$where = array('id_order' => $id_order);
		$this->crud_model->update_data($where, $dataUpdateOrder,'order_laundry');
		// if ($exec) {
		echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Ubah Status"]);
		// }else {
		// 	echo json_encode(["status"=>"Gagal","msg"=>"Gagal Pilih Kurir"]);
		// }
	}

	public function getDataOrder()
	{
		$data = $this->order_model->getListOrder();
		$jsonResponse = array('msg' => 'Berhasil', 'data' => $data );
		echo json_encode($jsonResponse); 
	}

	public function getDataOrderDetail($id_order)
	{
		$dataOrderDetail = $this->order_model->getListOrderDetail($id_order);
		$jsonResponse = array('msg' => 'Berhasil', 'data' => $dataOrderDetail );
		echo json_encode($jsonResponse); 
	}

	public function getDataOrderByIdOrder($id_order) 
	{
		$data = $this->order_model->getListOrderById($id_order);
		$jsonResponse = array('msg' => 'Berhasil', 'data' => $data );
		echo json_encode($jsonResponse); 
	}

	public function getDataOrderSelesai()
	{
		$data = $this->order_model->getListOrderSelesai();
		echo json_encode($data); 
	}

	public function selectStatusOrder()
	{
		$data = $this->db->get('master_status_order')->result_array();
		echo json_encode($data); 
	}

	public function selectAllKurir()
	{
		$data = $this->kurir_model->getAllKurirData();
		echo json_encode($data); 
	}

	public function getAllJenisLaundry()
	{
		$allJenis_Laundry = $this->db->get('master_jenis_laundry')->result_array();
		echo json_encode($allJenis_Laundry); 
	}

	public function getHargaJenisLaundry($id_jenis_laundry)
	{
		$where = array('id_jenis_laundry' => $id_jenis_laundry);
		$dataResult = $this->db->get_where('master_jenis_laundry',$where)->row();
		echo json_encode($dataResult); 
	}

	public function deleteOrderByIdOrder($id_order)
	{
		$where = array('id_order' => $id_order);
		$this->crud_model->hapus_data($where,'order_laundry');
		$this->crud_model->hapus_data($where,'detail_order_laundry');
		$jsonResponse = array('msg' => 'Berhasil', 'data' => '' );
		echo json_encode($jsonResponse);
	}

	public function getDataMasterJenisLaundry($id_jenis_laundry)
	{
		$data = $this->db->get_where('master_jenis_laundry', ['id_jenis_laundry'=>$id_jenis_laundry,])->result_array();
		echo json_encode($data);
	}

	public function tambahJenisLaundry()
	{
		
		$nama_jenis_laundry = $this->input->post('nama_jenis_laundry');
		$harga_laundry_kg = $this->input->post('harga_laundry_kg');
		
		$dataPost = array(
			'nama_jenis_laundry' => $nama_jenis_laundry,
			'harga_laundry_kg' => $harga_laundry_kg,
		);

		$this->crud_model->input_data($dataPost,'master_jenis_laundry');
		
		echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Tambah Jenis Laundry"]);
		
	}

	public function updateJenisLaundry()
	{
		$id_jenis_laundry = $this->input->post('id_jenis_laundry');
		$nama_jenis_laundry = $this->input->post('nama_jenis_laundry');
		$harga_laundry_kg = $this->input->post('harga_laundry_kg');
		
		$dataPost = array(
			'nama_jenis_laundry' => $nama_jenis_laundry,
			'harga_laundry_kg' => $harga_laundry_kg,
		);
		$where = array('id_jenis_laundry'=>$id_jenis_laundry);
		$this->crud_model->update_data($where,$dataPost,'master_jenis_laundry');
		
		echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Ubah Jenis Laundry"]);
		
	}

	public function deleteJenisLaundry($id_jenis_laundry)
	{
		$where = array('id_jenis_laundry' => $id_jenis_laundry);
		$this->crud_model->hapus_data($where,'master_jenis_laundry');
		$jsonResponse = array('status' => 'Berhasil', 'msg' => 'Berhasil Hapus Data' );
		echo json_encode($jsonResponse);
	}

	public function getDataMasterStatusOrder($id_status_order)
	{
		$data = $this->db->get_where('master_status_order', ['id_status_order'=>$id_status_order,])->result_array();
		echo json_encode($data);
	}

	public function tambahStatusOrder()
	{
		
		$nama_status_order = $this->input->post('nama_status_order');
		
		$dataPost = array(
			'nama_status_order' => $nama_status_order,
		);

		$this->crud_model->input_data($dataPost,'master_status_order');
		
		echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Tambah Status Order"]);
		
	}

	public function updateMasterStatusOrder()
	{
		$id_status_order = $this->input->post('id_status_order');
		$nama_status_order = $this->input->post('nama_status_order');
		
		$dataPost = array(
			'nama_status_order' => $nama_status_order,
		);
		$where = array('id_status_order'=>$id_status_order);
		$this->crud_model->update_data($where,$dataPost,'master_status_order');
		
		echo json_encode(["status"=>"Berhasil","msg"=>"Berhasil Ubah Status Order"]);
		
	}

	public function deleteStatusOrder($id_status_order)
	{
		$where = array('id_status_order' => $id_status_order);
		$this->crud_model->hapus_data($where,'master_status_order');
		$jsonResponse = array('status' => 'Berhasil', 'msg' => 'Berhasil Hapus Data Status Order' );
		echo json_encode($jsonResponse);
	}

	public function deleteMasterKurir($id_user)
	{
		$whereUser = array('id_user' => $id_user);
		$this->crud_model->hapus_data($whereUser,'user');
		$whereMasterKurir = array('id_user_kurir' => $id_user);
		$this->crud_model->hapus_data($whereMasterKurir,'master_kurir');
		$jsonResponse = array('status' => 'Berhasil', 'msg' => 'Berhasil Hapus Akun Kurir' );
		echo json_encode($jsonResponse);
	}

	public function deleteMasterPelanggan($id_user)
	{
		$whereUser = array('id_user' => $id_user);
		$this->crud_model->hapus_data($whereUser,'user');
		$whereMasterPelanggan = array('id_user_pelanggan' => $id_user);
		$this->crud_model->hapus_data($whereMasterPelanggan,'master_pelanggan');
		$jsonResponse = array('status' => 'Berhasil', 'msg' => 'Berhasil Hapus Akun Pelanggan' );
		echo json_encode($jsonResponse);
	}

	public function prosesJadwal($id_order)
	{
		$where = array('id_order' => $id_order);
		$data = array('id_status_order' => 2);
		$this->crud_model->update_data($where,$data,'order_laundry');
		$jsonResponse = array('status' => 'Berhasil', 'msg' => 'Berhasil Memproses Order Laundry' );
		echo json_encode($jsonResponse);
	}

	public function selesaiJadwal($id_order)
	{
		$where = array('id_order' => $id_order);
		$data = array('id_status_order' => 3);
		$this->crud_model->update_data($where,$data,'order_laundry');
		$jsonResponse = array('status' => 'Berhasil', 'msg' => 'Berhasil Menyelesaikan Order Laundry' );
		echo json_encode($jsonResponse);
	}


}

