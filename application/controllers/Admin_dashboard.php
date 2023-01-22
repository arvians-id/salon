<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_landing_page');
		if (!$this->session->userdata('id')) {
			redirect('auth');
		}
	}
	public function index()
	{
		$this->load->view('admin_header');
		$this->load->view('admin_dashboard');
	}
	public function reservasi()
	{
		$data['reservasi'] = $this->Model_landing_page->ambildatareservasi();

		$this->load->view('admin_header');
		$this->load->view('admin_list_reservasi', $data);
	}
	public function hapusreservasi($id)
	{
		$this->Model_landing_page->hapusdatareservasi($id);
		redirect('admin_dashboard/reservasi');
	}
	public function list_akun()
	{
		$data['list_akun'] = $this->Model_landing_page->ambildatalistakun();

		$this->load->view('admin_header');
		$this->load->view('admin_list_akunpelanggan', $data);
	}
}
