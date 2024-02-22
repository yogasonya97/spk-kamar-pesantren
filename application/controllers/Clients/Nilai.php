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
		$data['subtitle'] = 'Daftar seluruh kamar';
		$this->tp->mobile('mobile/clients/nilai/index', $data);
	}

	public function getListKamar() 
	{
		$data = $this->TrxPenilaianKamar_model->getListNilaiKamarByWeek();
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

	public function viewNilai($kamarId)
	{

		$data['title'] = 'Penilaian Kamar';
		$data['subtitle'] = 'View Nilai';
		$data['detailKamar'] = $this->MasterKamar_model->getDetailKamarByWhere(['kamarId' => $kamarId])->row();		
		$dataKriteria = $this->MasterKriteria_model->getListDataKriteria()->result();
		$data['kriteria'] = collect(collect($dataKriteria)->map(function ($v) use($kamarId) {
			$trxNilai = $this->TrxPenilaianKamar_model->getDataTrxByUserWhere([
				'userIdInput' => $this->session->userdata('user_id'),
				'kriteriaId' => $v->kriteriaId,
				'kamarId' => $kamarId
			])->row();
			$result = (object) [
				'kriteriaId' => $v->kriteriaId,
				'namaKriteria' => $v->namaKriteria,
				'kamarId' => $trxNilai->kamarId,
				'nilai' => $trxNilai->nilai,
				'notes' => $trxNilai->notes,
				'attachment' => $trxNilai->attachment,
				'createdAt' => $trxNilai->createdAt
			];
			return $result;
		}))->values();
		$data['totalScore'] = collect($data['kriteria'])->reduce(function ($i, $v) {
			return $i + $v->nilai;
		});
		$data['kamarId'] = $kamarId;

		$this->tp->mobile('mobile/clients/nilai/view', $data);

	}

	public function saveNilaiKamar()
	{
		$kamarId = $this->input->post('kamarId');
		$listNilaiArr = $this->input->post('nilai');
		$notes = $this->input->post('notes');


		$checkUserRole = $this->Users_model->validationUserRolePenilaiByUser($this->session->userdata('user_id'));
		if ($checkUserRole == 0) {
			return $this->response->json(failResponse('Anda tidak memiliki akses untuk Memberi Nilai pada kamar ini'));
		}

		$checkUserNilaiToday = $this->TrxPenilaianKamar_model->validationNilaiWeekEntry($kamarId);
		
		if (count($checkUserNilaiToday) > 0) {
			return $this->response->json(failResponse('Minggu ini anda Sudah Memberi Nilai pada kamar ini'));
		}

		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 10 * 1024 * 1024; // Max 10 MB size in kilobytes
		$config['file_name']  = date('Y') . '' . $kamarId . '' . $this->session->userdata('user_id');
	
		$this->load->library('upload', $config);
		
		$fileName = '';
		if (!$this->upload->do_upload('fileInput')) {
			return $this->response->json(failResponse($this->upload->display_errors()));
		} else {
		  	$uploadFile = $this->upload->data();
			$fileName = $uploadFile['file_name'];
		}
	
		foreach($listNilaiArr as $k => $v) {
			$params = [
				'userIdInput' => $this->session->userdata('user_id'),
				'kamarId' => $kamarId,
				'kriteriaId' => $k,
				'nilai' => $v,
				'notes' => $notes,
				'attachment' => $fileName
			];
			$this->Crud_model->input_data($params, 'trx_penilaian_kamar');
		}
		$res = successResponse('Berhasil merubah data');
	
		return $this->response->json($res);
	}
	
}

