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
		// if ($this->session->userdata('validate') ==true) {
		// 	$this->id_user = $this->session->userdata('user_id');
		// }

		$this->load->model('crud_model');
		// $this->load->model('dashboard_model');
		// $this->getSession = $this->session->userdata;
	}

	public function index()
	{
		// if ($this->session->has_userdata('validate')) {
		// 	redirect(base_url() . 'kurir/dashboard');
		// }else {
		// 	$this->load->view('kurir/layouts/header.php');
		// 	$this->load->view('kurir/login.php');
		// 	$this->load->view('kurir/layouts/footer.php');
		// }
		$this->tp->mobile('mobile/clients/index');
	}
	

}

