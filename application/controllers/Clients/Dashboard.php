<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['title'] = 'Assalammualaikum, wr,wb';
		$data['subtitle'] = $this->session->userdata('nama');
		$data['totalClient'] = $this->Users_model->getTotalClient();
		$data['totalKamar'] = $this->MasterKamar_model->getTotalKamar();
		$data['bulanIni'] = konversiBulan(date('F')).' '.date('Y');
		$this->tp->mobile('mobile/clients/index', $data);
	}

	public function getRankKamarPerMonth() 
	{
		$data = $this->TrxPenilaianKamar_model->getRankKamarByYear();
		return $this->response->json($data);
	}
	

}

