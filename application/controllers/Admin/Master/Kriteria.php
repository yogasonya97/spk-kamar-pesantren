<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kriteria extends CI_Controller {

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

		if (!$this->session->userdata('validate') && $this->session->userdata('role') != '1') {
			redirect(base_url() . 'login');
		} else if ($this->session->userdata('validate') && $this->session->userdata('role') != '1'){
			redirect(base_url() . 'error-403_override');
		}
		if ($this->session->userdata('validate') ==true) {
			$this->id_user = $this->session->userdata('user_id');
		}
		$this->load->model('MasterKriteria_model');
	}

	// PAGE
	public function index()
	{
        $data['title'] = 'Data Kriteria';
        $data['subtitle'] = 'Daftar Seluruh Kriteria';
		$data['total'] = '';
		$this->tp->mobile('mobile/admin/master/kriteria/index', $data);
        $this->load->view('mobile/admin/master/kriteria/modalActKriteria',$data);
	}

    public function getListDataKriteria()
    {
        $data = $this->MasterKriteria_model->getListDataKriteria()->result();
        $this->response->json($data);
    }

    public function save()
    {
        $typeForm = $this->input->post('typeForm');
		$idKriteria = $this->input->post('kriteriaId');

		$checkDuplicate = $this->MasterKriteria_model->getDetailKriteriaByWhere([
			'kodeKriteria' => $this->input->post('kodeKriteria')
		]);

		$res = $checkDuplicate->row();

		if ($typeForm == 'add' && $res) {
			return $this->response->json(failResponse('Data Sudah Ada'));
		}

        $params = [
            'kodeKriteria' => $this->input->post('kodeKriteria'),
            'namaKriteria' => $this->input->post('namaKriteria'),
        ];

        if ($typeForm == 'add') {
            $res = $this->Crud_model->input_data($params, 'master_kriteria');
        } else {
			$whereUpdate = ['kriteriaId' => $idKriteria];
            $res = $this->Crud_model->update_data($whereUpdate, $params, 'master_kriteria');
        }

        return $this->response->json($res);
    }

	public function delete()
	{
		$idKriteria = $this->input->get('kriteriaId');
		$res = $this->Crud_model->hapus_data(['kriteriaId' => $idKriteria], 'master_kriteria');
		$this->response->json($res);
	}

}

