<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

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

		// if ($this->session->userdata('validate') != true && $this->session->userdata('role') != 'Kurir') {
		// 	redirect(base_url() . 'login');
		// } else if ($this->session->userdata('validate') == true && $this->session->userdata('role') != 'Kurir'){
		// 	redirect(base_url() . 'error');
		// }
		if ($this->session->userdata('validate') ==true) {
			$this->id_user = $this->session->userdata('user_id');
		}

		$this->load->model('crud_model');
		$this->load->model('pelanggan_model');
		$this->load->model('dashboard_model');
		$this->getSession = $this->session->userdata;
	}

	public function index()
	{
		if ($this->session->has_userdata('validate')) {
			redirect(base_url() . 'kurir/dashboard');
		}else {
			$this->load->view('kurir/layouts/header.php');
			$this->load->view('kurir/login.php');
			$this->load->view('kurir/layouts/footer.php');
		}
		
	}

	public function dashboard()
	{
		if ($this->session->has_userdata('validate')) {
			// die($this->id_user);
			$data['pesananMasuk'] = $this->dashboard_model->getDataTotalPesananMasukKurir($this->id_user)->result_array();
			$data['pesananSelesai'] = $this->dashboard_model->getDataTotalPesananSelesaiKurir($this->id_user)->result_array();
			// $data['getInformasi']= $this->db->get('informasi')->result_array();
			$this->load->view('kurir/layouts/sub-header.php');
			$this->load->view('kurir/dashboard.php');
			$this->load->view('kurir/layouts/sub-footer.php');
		}else {
			redirect(base_url() . 'kurir/login');
		}
	}

	public function order_laundry()
	{
		if ($this->session->has_userdata('validate')) {
			$id_user_kurir = $this->getSession['user_id'];
			$data['id_user'] = $this->getSession['user_id'];
			$data['getOrderLaundry'] = $this->order_model->getOrderByIdUserKurir($id_user_kurir);
			$this->load->view('kurir/layouts/sub-header.php');
			$this->load->view('kurir/order_laundry/index.php',$data);
			$this->load->view('kurir/layouts/sub-footer.php');
		}else {
			redirect(base_url() . 'kurir/login');
		}
	}

	public function detail_order($id_order)
	{
		if ($this->session->has_userdata('validate')) {
			$data['id_order'] = $id_order;
			$data['getDetailOrderLaundry'] = $this->order_model->getOrderDetailByIdOrder($id_order);
			$getOrderByIdOrder = $this->order_model->getListOrderById($id_order);
			$data['namaPelanggan'] = $getOrderByIdOrder->nama_pelanggan;
			$id_user_pelanggan = $getOrderByIdOrder->id_user_pelanggan;
			$data['akumulasi'] = $this->order_model->getBeratOrderByIdUserPelanggan($id_user_pelanggan)->row();
			
			$this->load->view('kurir/layouts/sub-header.php');
			$this->load->view('kurir/order_laundry/detail_order.php',$data);
			$this->load->view('kurir/layouts/sub-footer.php');
		}else {
			redirect(base_url() . 'kurir/login');
		}
	}

	public function form_order($id_order)
	{
		if ($this->session->has_userdata('validate')) {
			$data['id_order'] = $id_order;
			$data['allJenis_Laundry'] = $this->db->get('master_jenis_laundry')->result_array();
			$data['dataOrderByIdOrder'] = $this->order_model->getListOrderById($id_order);
			$getDataOrder = $this->order_model->getOrderDetailByIdOrder($id_order);
			foreach ($getDataOrder as $get)
			{
				$id_user_pelanggans = $get['id_user_pelanggan'];
			}
			$data['id_user_pelanggan'] = $id_user_pelanggans;
			$this->load->view('kurir/layouts/sub-header.php');
			$this->load->view('kurir/order_laundry/form_order.php',$data);
			$this->load->view('kurir/layouts/sub-footer.php');
		}else {
			redirect(base_url() . 'kurir/login');
		}
	}

	public function getAllJenisLaundry()
	{
		$allJenis_Laundry = $this->db->get('master_jenis_laundry')->result_array();
		echo json_encode($allJenis_Laundry); 
	}

	public function getBeratLaundryUserPelanggan($id_user_pelanggan)
	{
		$data = $this->order_model->getBeratOrderByIdUserPelanggan($id_user_pelanggan)->result_array();
		echo json_encode($data);
	}

	public function getPositionAuto() 
	{
		if ($this->session->has_userdata('validate')) {
			$long_kurir = $this->input->post('long');
			$lat_kurir = $this->input->post('lat');
			$getSession = $this->session->userdata;
			$id_user = $getSession['user_id'];

			$dataPostDataMasterKurir = array(
				'id_user_kurir' => $id_user,
				'lat_kurir' => $lat_kurir,
				'long_kurir' => $long_kurir, 
			);

			$whereMasterKurir = array('id_user_kurir' => $id_user);

			$checkDataMasterKurir = $this->db->get_where('master_kurir',['id_user_kurir'=>$id_user,])->num_rows();

			if ($checkDataMasterKurir != 0) {
				$this->crud_model->update_data($whereMasterKurir,$dataPostDataMasterKurir,'master_kurir');
			}else {
				$this->crud_model->input_data($dataPostDataMasterKurir,'master_kurir');	
			}

			echo json_encode("Berhasil Get Lokasi Otomatis");
		}else {
			redirect(base_url() . 'kurir/login');
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

	public function deleteDetailsOrder($id_order)
	{
		
	}

	public function menu_main()
	{
		// $this->load->view('pelanggan/layouts/header.php');
		$this->load->view('kurir/layouts/menu-main.php');
		// $this->load->view('pelanggan/layouts/footer.php');
	}

	public function menu_footer()
	{
		// $this->load->view('pelanggan/layouts/header.php');
		$this->load->view('kurir/layouts/menu-footer.php');
		// $this->load->view('pelanggan/layouts/footer.php');
	}

	public function getPositionPelangganByIdOrder($id_order) 
	{
		if ($this->session->has_userdata('validate')) {
			$dataLokasiPelanggan = $this->pelanggan_model->getDataPelangganPositionByIdOrder($id_order)->result_array();
			echo json_encode($dataLokasiPelanggan);
		}else {
			redirect(base_url() . 'kurir/login');
		}
	}

	public function getDataOrderDetail($id_order)
	{
		$data['data'] = $this->order_model->getListOrderDetail($id_order);
		// $jsonResponse = array('msg' => $data);
		echo json_encode($data); 
	}

	public function getHargaJenisLaundry($id_jenis_laundry)
	{
		$where = array('id_jenis_laundry' => $id_jenis_laundry);
		$dataResult = $this->db->get_where('master_jenis_laundry',$where)->row();
		echo json_encode($dataResult); 
	}

	public function deleteDetailOrder($id_order,$idDetailOrder)
	{
		$whereDetailOrder = array('id_detail_order'=>$idDetailOrder);
		$execDelete = $this->crud_model->hapus_data($whereDetailOrder,'detail_order_laundry');
		
		$where = array('id_order'=>$id_order);
		$getDataTotalHarga = $this->db->query("SELECT SUM(total_harga) as jml_total_harga FROM `detail_order_laundry` WHERE id_order = '".$id_order."'")->row();
		
		$total_bayar = $getDataTotalHarga->jml_total_harga;
		
		$dataUpdateOrder = array(
			'total_bayar' => $total_bayar, 
		);
		
		$execUpdate = $this->crud_model->update_data($where,$dataUpdateOrder,'order_laundry');
		
		$jsonResponse = array('status'=>"Berhasil",'msg'=>'Berhasil Hapus Detail Order');
		
		echo json_encode($jsonResponse);
		
	}

	public function dashboardKurir()
	{
		if ($this->session->has_userdata('validate')) {
			
			$data['pesananMasuk'] = $this->dashboard_model->getDataTotalPesananMasukKurir($this->id_user)->result_array();
			$data['pesananSelesai'] = $this->dashboard_model->getDataTotalPesananSelesaiKurir($this->id_user)->result_array();
			echo json_encode($data);
		}else {
			redirect(base_url() . 'kurir/login');
		}
	}

	

}

