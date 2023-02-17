<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Landing_page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Model_landing_page');
		$this->load->model('Riwayat_model', 'riwayat_m');
		$this->load->model('Gejala_model', 'gejala_m');
	}
	public function index()
	{
		$this->form_validation->set_rules('kode_jenis_perawatan', 'Kode Jenis Perawatan', 'required');
		$this->form_validation->set_rules('jawaban[]', 'Kode Keluhan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'user' => $this->db->get_where('login_pelanggan', ['email' => $this->session->userdata('email')])->row_array(),
				'jenis_perawatan' => $this->db->get('tb_jenis_perawatan')->result_array(),
			];

			$this->load->view('header', $data);
			$this->load->view('landing_page', $data);
			$this->load->view('footer');
		} else {
			$kode_riwayat = [
				'kode_riwayat' => $this->riwayat_m->simpanRiwayat(),
			];
			$this->session->set_userdata($kode_riwayat);
			$this->session->set_flashdata('success', 'Data keluhan/pengaduan berhasil disimpan, silahkan cek hasilnya dibawah ini.');
			redirect('landing_page/result');
		}
	}
	public function reservasi()
	{
		$data['user'] = $this->db->get_where('login_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('perawatan', 'Perawatan', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');

		if ($this->form_validation->run() == FALSE) {
			redirect('landing_page');
		} else {
			$this->Model_landing_page->tambahReservasi();
			$this->session->set_flashdata('message', 'ditambah');
			redirect('landing_page');
		}
	}
	public function result()
	{
		$kode_riwayat = $this->session->userdata('kode_riwayat');
		if ($kode_riwayat) {
			$data = [
				'judul' => 'Hasil Pengaduan/Keluhan Pelanggan',
				'getSolusi' => $this->riwayat_m->getForwardChaining($kode_riwayat),
				'getJawaban' => $this->riwayat_m->getJawaban($kode_riwayat),
				'getFalseGejala' => $this->gejala_m->getFalseGejala($kode_riwayat),
				'getRiwayat' => $this->riwayat_m->getRiwayatRelation($kode_riwayat)
			];
			if ($data['getSolusi'] != "Kode solusi tidak ditemukan") {
				$dataUpdate = [
					'kode_riwayat' => $kode_riwayat,
					'kode_solusi' => $data['getSolusi']['kode_solusi'],
				];
				$this->riwayat_m->updateRiwayat($dataUpdate);
			}
			// $this->session->unset_userdata('kode_riwayat');
			$this->load->view('result_header', $data);
			$this->load->view('result', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('error', 'Sesi anda berakhir atau anda belum mengisi form pengaduan/keluhan');
			redirect('home/keluhan');
		}
	}
	public function getGejala($kode_jenis_perawatan)
	{
		$data = $this->db->get_where('tb_gejala', ['kode_jenis_perawatan' => $kode_jenis_perawatan])->result_array();
		echo json_encode($data);
	}
}
