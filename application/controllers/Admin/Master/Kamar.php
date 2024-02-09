<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use application\Services\My_service;
class Kamar extends CI_Controller {

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
	private $serviceTrxPenilaianKamar;
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('validate') && $this->session->userdata('role') != '1') {
			redirect(base_url() . 'login');
		} else if ($this->session->userdata('validate') ==true) {
			$this->id_user = $this->session->userdata('user_id');
		}
		$this->load->model('MasterKamar_model');
		$this->load->model('TrxPenilaianKamar_model');
		$this->load->model('Users_model');
	}

	// PAGE
	public function index()
	{
        $data['title'] = 'Data Kamar';
        $data['subtitle'] = 'Daftar Seluruh Kamar';
        $data['buttonAct'] = [
			'add' => $this->session->userdata('role') == '1',
			'edit' => $this->session->userdata('role') == '1',
			'delete' => $this->session->userdata('role') == '1'
		];
        // $data['totalClient'] = $this->Users_model->getTotalClient();
		// dd($data);
		$this->tp->mobile('mobile/admin/master/kamar/index', $data);
        $this->load->view('mobile/admin/master/kamar/modalActKamar',$data);
	}

    public function getListDataKamar()
    {
        $data = $this->MasterKamar_model->getListDataKamar()->result();
        $this->response->json($data);
    }

    public function save()
    {
        $typeForm = $this->input->post('typeForm');
		$idKamar = $this->input->post('kamarId');
		$checkDuplicate = $this->MasterKamar_model->getDetailKamarByWhere([
			'namaKamar' => $this->input->post('namaKamar')
		]);

		$res = $checkDuplicate->row();

		if ($typeForm == 'add' && $res) {
			return $this->response->json(failResponse('Data Sudah Ada'));
		}

        $params = [
            'namaAsrama' => $this->input->post('namaAsrama'),
            'namaKamar' => $this->input->post('namaKamar'),
            'aliasKamar' => $this->input->post('aliasKamar'),
            'namaPembina' => $this->input->post('namaPembina')
        ];

        if ($typeForm == 'add') {
            $res = $this->Crud_model->input_data($params, 'master_kamar');
        } else {
			$whereUpdate = ['kamarId' => $idKamar];
            $res = $this->Crud_model->update_data($whereUpdate, $params, 'master_kamar');
        }

        return $this->response->json($res);
    }

	public function delete()
	{
		$idKamar = $this->input->get('kamarId');
		$res = $this->Crud_model->hapus_data(['kamarId' => $idKamar], 'master_kamar');
		$this->response->json($res);
	}

}

