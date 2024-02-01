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
		//proses
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
			$res[0] = [
				'responseCode' => 0,
				'response' => 'Akun tidak ditemukan'
			];
			return $this->response->json($res);
		}
		
			if ($result->status_akun == 0) {
				// redirect(base_url() . 'auth/aktivasi/'.$result->id_user);

				?>
				<script type="text/javascript">alert("Lakukan Aktivasi Akun."); window.location.href="<?php echo base_url();?>auth/aktivasi/<?php echo $result->id_user; ?>"</script>
				<?php
			} else if ($result->status_akun == 1) {
				if ($result->level_user == 'Kurir') {

				//check
					$this->session->set_userdata([
						'user_id' => $result->id_user,
						'email' => $username,
						'nama' => $result->nama_lengkap,
						'role' => $result->level_user,
						'status_akun' => $result->status_akun,
						'validate' => true
					]);

					?>
					<script type="text/javascript">alert("Login Berhasil."); window.location.href="<?php echo base_url();?>kurir"</script>
					<?php

				} else if ($result->level_user == 'Admin') {

				//check
					$this->session->set_userdata([
						'user_id' => $result->id_user,
						'email' => $username,
						'nama' => $result->nama_lengkap,
						'role' => $result->level_user,
						'status_akun' => $result->status_akun,
						'validate' => true
					]);

					?>
					<script type="text/javascript">alert("Login Berhasil."); window.location.href="<?php echo base_url();?>admin"</script>
					<?php

				} else if ($result->level_user == 'Pelanggan') {

				//check
					$this->session->set_userdata([
						'user_id' => $result->id_user,
						'email' => $username,
						'nama' => $result->nama_lengkap,
						'role' => $result->level_user,
						'status_akun' => $result->status_akun,
						'validate' => true
					]);

					?>
					<script type="text/javascript">alert("Login Berhasil."); window.location.href="<?php echo base_url();?>pelanggan/dashboard"</script>
					<?php

				}
			} 

		
	}

	public function aktivasiAkun($id_user)
	{
		$password = md5($this->input->post('password'));

		$data = $this->db->get_where('user',[
			'id_user' => $id_user,
		]);

		$result = $data->row();

		if ($result == null) {
			?>
			<script type="text/javascript">alert("Aktivasi Gagal."); window.location.href="<?php echo base_url();?>login"</script>
			<?php
		} else {
			$updateData = array('password' => $password, 'status_akun' => 1,);
			$this->db->where('id_user', $id_user);
			$query = $this->db->update('user', $updateData);
			if ($query) {
				if ($result->level_user == "Admin") {
					?>
					<script type="text/javascript">alert("Aktivasi Berhasil."); window.location.href="<?php echo base_url();?>login"</script>
					<?php
				}else if ($result->level_user == "Kurir"){
					?>
					<script type="text/javascript">alert("Aktivasi Berhasil."); window.location.href="<?php echo base_url();?>kurir"</script>
					<?php
				}else if ($result->level_user == "Pelanggan") {
					?>
					<script type="text/javascript">alert("Aktivasi Berhasil."); window.location.href="<?php echo base_url();?>pelanggan/login"</script>
					<?php
				}
				
			}
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
		$getSession = $this->session->userdata;
		if ($getSession['role']=="Admin") {
			$this->session->sess_destroy();
			redirect(base_url() . 'login' );
		}else if ($getSession['role']=="Pelanggan"){
			$this->session->sess_destroy();
			redirect(base_url() . 'pelanggan/login' );
		}else if ($getSession['role']=="Kurir") {
			$this->session->sess_destroy();
			redirect(base_url() . 'kurir' );
		}
		
	}
	
}
