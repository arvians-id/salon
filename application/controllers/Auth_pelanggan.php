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
                'is_active' => 0,
                'date_created' => time()
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('login_pelanggan', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat ! Anda berhasil mendaftar, silahkan untuk aktifasi akun !
            </div>');
            redirect('');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'vilarysalon@gmail.com',
            'smtp_pass' => 'vilarysalon123',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('vilarysalon@gmail.com', 'VILARY SALON & SPA');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link ini untuk verifikasi akun : <a href="' .
                base_url() . 'auth_pelanggan/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
        }
        //  else if ($type == 'forgot') {
        //     $this->email->subject('Reset Password');
        //     $this->email->message('Klik link ini untuk reset password : <a href="' .
        //         base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset ulang password</a>');
        // }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('login_pelanggan', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            // otomatis delete token
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('login_pelanggan');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    ' . $email . ' telah diaktifkan! silahkan login
                    </div>');
                    redirect('landing_page');
                } else {
                    $this->db->delete('login_pelanggan', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Aktivasi akun gagal! Token kadaluarsa
                    </div>');
                    redirect('landing_page');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi akun gagal! Token tidak valid
                </div>');
                redirect('landing_page');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi akun gagal! Email salah
            </div>');
            redirect('landing_page');
        }
    }

    public function logout()
    {
        $data = array('id', 'username');
        $this->session->unset_userdata($data);
        redirect('');
    }
}
