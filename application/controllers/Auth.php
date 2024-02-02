<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!$this->session->has_userdata('validate')) {
			return redirect(base_url() . 'login');
		}
		$getSession = $this->session->userdata;
		if($getSession[0]['role'] == '1') {
			return redirect(base_url() . 'admin');
		} else if($getSession[0]['role'] == '2') {
			return redirect(base_url() . 'client');
		}
	}

	public function login()
	{
		$this->load->view('mobile/auth/login');
	}

	public function aktivasi($id_user=null)
	{
		if ($this->session->has_userdata('validate')) {

			$getSession = $this->session->userdata;
			$role = $getSession['role'];

			if ($result->level_user == 'Admin') {
				redirect(base_url() . 'admin');
			} else if ($result->level_user == 'Kurir') {
				redirect(base_url() . 'admin');
			} else if ($result->level_user == 'Pelanggan') {
				redirect(base_url() . 'admin');
			}
			
		}else {
			$data['id_user'] = $id_user;
			if ($id_user==null) {
				echo "Halaman Tidak Bisa Di Akses!";
			} else {
				$this->load->view('auth/header.php');
				$this->load->view('auth/aktivasi.php',$data);
				$this->load->view('auth/footer.php');
			}
			
		}
	}

	public function sign()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$data = $this->db->get_where('users',[
			'email' => $email,
			'password' => $password,
		]);

		$result = $data->row();

		if (!$result) {
			$res = [
				'responseCode' => 0,
				'response' => 'Email atau password salah'
			];
			return $this->response->json($res);
		}
		
		$this->session->set_userdata([
			'user_id' => $result->userId,
			'email' => $email,
			'nama' => $result->fullName,
			'role' => $result->levelUser,
			'validate' => true
		]);

		$res = [
			'responseCode' => 1,
			'response' => 'Berhasil Login'
		];

		if ($result->levelUser == '1') {
			$res['role'] = '1';
			return $this->response->json($res);
		} else if ($result->levelUser == '2') {
			$res['role'] = '2';
			return $this->response->json($res);
		} 
		
	}

	public function ubahPassword()
	{
		if ($this->session->has_userdata('validate')) {
			$this->load->view('pelanggan/layouts/header.php');
			$this->load->view('auth/change_password.php');
			$this->load->view('pelanggan/layouts/footer.php');
		}else {
			redirect(base_url() . 'pelanggan/login');
		}
		
	}

	public function changePassword()
	{
		$getSession = $this->session->userdata;
		$userId = $getSession['user_id'];
		$role = $getSession['role'];
		$passwordOld = md5($this->input->post('passwordOld'));
		$password = md5($this->input->post('password'));

		$data = $this->db->get_where('user',[
			'id_user' => $userId,
			'password' => $passwordOld
		]);
		$result = $data->row();
		if($result==null){
			?>
				<script type="text/javascript">alert("Password Lama Salah");window.location.href="<?php echo base_url();?>auth/ubahPassword"</script>
			<?php
		}else {
			$updateData = array('password'=> $password);
			$this->db->where('id_user',$userId);
			$query = $this->db->update('user',$updateData);
			if ($role == "Kurir"){
				?>
					<script type="text/javascript">alert("Ubah Password Berhasil"); window.location.href="<?php echo base_url();?>kurir/dashboard"</script>
				<?php
			}else if ($role == "Pelanggan"){
				?>
					<script type="text/javascript">alert("Ubah Password Berhasil"); window.location.href="<?php echo base_url();?>pelanggan/dashboard"</script>
				<?php
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect(base_url() . 'login');
	}
	
}
