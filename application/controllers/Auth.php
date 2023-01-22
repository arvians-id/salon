<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'auth_m');
	}

	public function index()
	{
		if ($this->session->userdata('id')) {
			redirect('admin_dashboard');
		}
		$this->load->view('login_adm');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cekUser = $this->auth_m->cekUser($username);
		$cekPassword = $this->auth_m->cekPassword($username, $password);
		if ($cekUser) {
			if ($cekPassword) {
				$data = [
					'id' => $cekUser['id'],
					'username' => $cekUser['username'],
				];
				$this->session->set_userdata($data);
				redirect('admin_dashboard');
			} else {
				echo "<script>
		 			alert('Password/username salah');
		 			window.location='" . site_url('Auth') . "';
		 		</script>";
			}
		} else {
			echo "<script>
			 			alert('Password/username salah');
			 			window.location='" . site_url('Auth') . "';
			 		</script>";;
		}
	}

	public function logout()
	{
		$data = array('id', 'username');
		$this->session->unset_userdata($data);
		redirect('auth');
	}
}
