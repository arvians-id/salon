<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model_pelanggan', 'auth_m_p');
    }

    public function index()
    {
        if ($this->session->userdata('id')) {
            redirect('welcome');
        }
        $this->load->view('login_adm');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cekUser = $this->auth_m_p->cekUser($username);
        $cekPassword = $this->auth_m_p->cekPassword($username, $password);
        if ($cekUser) {
            if ($cekPassword) {
                $data = [
                    'id' => $cekUser['id'],
                    'username' => $cekUser['username'],
                    'email' => $cekUser['email'],
                    'name' => $cekUser['name']
                ];
                $this->session->set_userdata($data);
                redirect('');
            } else {
                echo "<script>
		 			alert('Password/username salah');
		 			window.location='" . site_url('landing_page') . "';
		 		</script>";
            }
        } else {
            echo "<script>
			 			alert('Password/username salah');
			 			window.location='" . site_url('landing_page') . "';
			 		</script>";;
        }
    }

    public function registration()
    {
        if ($this->session->userdata('username')) {
            redirect('auth_pelanggan');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[login_pelanggan.username]', [
            'is_unique' => 'Username ini sudah dipakai, silahkan coba username lain !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[login_pelanggan.email]', [
            'is_unique' => 'Email ini sudah dipakai, silahkan coba lagi !'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password tidak cocok !',
            'min_length' => 'Password terlalu pendek !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('header');
            $this->load->view('landing_page');
            $this->load->view('footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'password' => htmlspecialchars($this->input->post('password1', true)),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('login_pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Anda berhasil mendaftar, silahkan untuk login!
            </div>');
            redirect('');
        }
    }
    public function logout()
    {
        $data = array('id', 'username');
        $this->session->unset_userdata($data);
        redirect('');
    }
}
