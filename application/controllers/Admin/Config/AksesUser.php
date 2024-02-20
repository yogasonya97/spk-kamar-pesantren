<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AksesUser extends CI_Controller {

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
		$data['title'] = 'Konfigurasi';
		$data['subtitle'] = 'Akses User';
		// $data['bulanIni'] = konversiBulan(date('F')).' '.date('Y');
		$this->tp->mobile('mobile/admin/config/users/index', $data);
        $this->load->view('mobile/admin/config/users/modalActUsers',$data);
	}

    public function getListDataUsers()
    {
        $data = $this->Users_model->getAllUserWithoutAdmin()->result();
        return $this->response->json($data);
    }

    public function changeRole()
    {
        $params = [
            'levelUser' => $this->input->post('levelUser')
        ];
        $whereUpdate = ['userId' => $this->input->post('userId')];
        $res = $this->Crud_model->update_data($whereUpdate, $params, 'users');
        return $this->response->json($res);
    }

    public function deleteUsers()
    {
        $userId = $this->input->get('userId');
        $whereDelete = ['userId' => $userId];
        $deleteUsers = $this->Crud_model->hapus_data($whereDelete, 'users');
        if ($deleteUsers->responseCode != 1) {
            $res = failResponse('Gagal menghapus users');
            return $this->response->json($res);
        }
        $this->Crud_model->hapus_data(['userIdInput' => $userId], 'trx_penilaian_kamar');   
        return $this->response->json($deleteUsers);
    }
}