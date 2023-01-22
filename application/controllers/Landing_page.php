<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Landing_page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Model_landing_page');
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('login_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('perawatan', 'Perawatan', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('landing_page', $data);
			$this->load->view('footer');
		} else {
			$this->Model_landing_page->tambahReservasi();
			$this->session->set_flashdata('message', 'ditambah');
			redirect('landing_page');
		}
	}
}
