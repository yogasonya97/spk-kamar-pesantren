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
		$data = $this->MasterKamar_model->getListDataKamar()->result();
        $this->response->json($data);
	}

	public function entryNilai()
	{

		$data['title'] = 'Penilaian Kamar';
		$data['subtitle'] = 'Entry nilai';
		$kamarId = $this->uri->segment(4);
		$data['detailKamar'] = $this->MasterKamar_model->getDetailKamarByWhere(['kamarId' => $kamarId])->row();		
		$data['kriteria'] = $this->MasterKriteria_model->getListDataKriteria()->result();	

		$this->tp->mobile('mobile/clients/nilai/entry', $data);

	}
	

}

