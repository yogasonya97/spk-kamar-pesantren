<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rank extends CI_Controller {

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

	}

	// PAGE
	public function index()
	{
		$data['title'] = 'Penilaian Kamar';
		$data['subtitle'] = 'Ranking';
		// $data['bulanIni'] = konversiBulan(date('F')).' '.date('Y');
		$this->tp->mobile('mobile/report/index', $data);
	}

	public function filterPerMonth() 
	{
		$filterBulan = $this->input->get('filterBulan');
		$filterTahun = $this->input->get('filterTahun');

		$data = $this->TrxPenilaiankamar_model->getRankKamarByMonthReport($filterBulan, $filterTahun);
		return $this->response->json($data);
	}


}

