<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

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

		if (!$this->session->userdata('validate') && $this->session->userdata('role') != '2') {
			redirect(base_url() . 'login');
		} else if ($this->session->userdata('validate') && $this->session->userdata('role') != '2'){
			redirect(base_url() . 'error-403_override');
		}
		if ($this->session->userdata('validate') == true) {
			$this->id_user = $this->session->userdata('userId');
		}

		$this->load->model('crud_model');
	}

	public function index()
	{
		$data['title'] = 'Penilaian Kamar';
		$data['subtitle'] = 'Daftar seleruh kamar';
		$this->tp->mobile('mobile/clients/nilai/index', $data);
	}

	public function getListKamar() 
	{
		$data = $this->MasterKamar_model->getListDataKamarByJenisKamarUser()->result();
        $this->response->json($data);
	}

	public function entryNilai($kamarId)
	{

		$data['title'] = 'Penilaian Kamar';
		$data['subtitle'] = 'Entry nilai';
		// $kamarId = $this->uri->segment(4);
		$data['detailKamar'] = $this->MasterKamar_model->getDetailKamarByWhere(['kamarId' => $kamarId])->row();		
		$data['kriteria'] = $this->MasterKriteria_model->getListDataKriteria()->result();
		$data['kamarId'] = $kamarId;

		$this->tp->mobile('mobile/clients/nilai/entry', $data);

	}

	public function saveNilaiKamar()
	{
		$kamarId = $this->input->post('kamarId');
		$listNilaiArr = $this->input->post('nilai');
		$notes = $this->input->post('notes');
		$checkUserNilaiToday = $this->db->get_where('trx_penilaian_kamar', [
			"userIdInput" => $this->session->userdata('user_id'),
			"kamarId" => $kamarId,
			"DATE(createdAt)" => date('Y-m-d')
		])->result();
		if (count($checkUserNilaiToday) > 0) {
			return $this->response->json(failResponse('Hari ini anda Sudah Memberi Nilai pada kamar ini'));
		}
		foreach($listNilaiArr as $k => $v) {
			$params = [
				'userIdInput' => $this->session->userdata('user_id'),
				'kamarId' => $kamarId,
				'kriteriaId' => $k,
				'nilai' => $v,
				'notes' => $notes,
				'attachment' => ''
			];
			$this->Crud_model->input_data($params, 'trx_penilaian_kamar');
		}
		$res = successResponse('Berhasil merubah data');
	
		return $this->response->json($res);
	}

	public function uploadFileKeterangan() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 100; // Max size in kilobytes
	
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload('fileInput')) {
		  $error = array('error' => $this->upload->display_errors());
		  // Handle error, redirect atau tampilkan pesan kesalahan
		} else {
		  $data = array('upload_data' => $this->upload->data());
		  // File berhasil diunggah, lakukan apa yang diperlukan dengan data file yang diunggah
		}
	  }
	

}
