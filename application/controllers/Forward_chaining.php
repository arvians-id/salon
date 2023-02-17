<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forward_Chaining extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_landing_page');
        $this->load->model('Gejala_model', 'gejala_m');
        $this->load->model('Perawatan_model', 'perawatan_m');
        $this->load->model('Solusi_model', 'solusi_m');
        $this->load->model('Rules_model', 'rules_m');
        $this->load->model('Riwayat_model', 'riwayat_m');
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }
    }
    public function data_riwayat()
    {
        $data = [
            'judul' => 'Data Gejala',
            'getRiwayat' => $this->db->get('tb_riwayat')->result_array(),
        ];

        $this->load->view('admin_header');
        $this->load->view('forward-chaining/admin_fc_riwayat', $data);
    }
    // GEJALA
    public function data_gejala()
    {
        $this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'required|max_length[20]|is_unique[tb_gejala.kode_gejala]');
        $this->form_validation->set_rules('gejala', 'Gejala', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Data Gejala',
                'getGejala' => $this->gejala_m->getGejala(),
                'getJenisPerawatan' => $this->db->get('tb_jenis_perawatan')->result_array(),
            ];
            $this->load->view('admin_header');
            $this->load->view('forward-chaining/admin_fc_gejala', $data);
        } else {
            $this->gejala_m->simpanGejala();
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
            redirect('forward_chaining/data_gejala');
        }
    }
    public function ubah_gejala($kode_gejala)
    {
        $this->form_validation->set_rules('gejala', 'Gejala', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Ubah Data Gejala',
                'getGejala' => $this->db->get_where('tb_gejala', ["kode_gejala" => $kode_gejala])->row_array(),
                'getJenisPerawatan' => $this->db->get('tb_jenis_perawatan')->result_array(),
            ];
            $this->load->view('admin_header');
            $this->load->view('forward-chaining/admin_fc_ubah-gejala', $data);
        } else {
            $this->gejala_m->ubahGejala($kode_gejala);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('forward_chaining/data_gejala');
        }
    }
    public function hapus_gejala($kode_gejala)
    {
        $this->db->delete('tb_gejala', ['kode_gejala' => $kode_gejala]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('forward_chaining/data_gejala');
    }
    // SOLUSI
    public function data_solusi()
    {
        $this->form_validation->set_rules('kode_solusi', 'Kode Solusi', 'required|max_length[20]|is_unique[tb_solusi.kode_solusi]');
        $this->form_validation->set_rules('judul', 'Kode Solusi', 'required|max_length[256]');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Data Solusi',
                'getSolusi' => $this->db->get('tb_solusi')->result_array(),
            ];
            $this->load->view('admin_header');
            $this->load->view('forward-chaining/admin_fc_solusi', $data);
        } else {
            $this->solusi_m->simpanSolusi();
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
            redirect('forward_chaining/data_solusi');
        }
    }
    public function ubah_solusi($kode_solusi)
    {
        $this->form_validation->set_rules('judul', 'Kode Solusi', 'required|max_length[256]');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Ubah Data Solusi',
                'getSolusi' => $this->db->get_where('tb_solusi', ["kode_solusi" => $kode_solusi])->row_array(),
            ];
            $this->load->view('admin_header');
            $this->load->view('forward-chaining/admin_fc_ubah-solusi', $data);
        } else {
            $this->solusi_m->ubahSolusi($kode_solusi);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('forward_chaining/data_solusi');
        }
    }
    public function hapus_solusi($kode_solusi)
    {
        $this->db->delete('tb_solusi', ['kode_solusi' => $kode_solusi]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('forward_chaining/data_solusi');
    }
    public function data_rules()
    {
        $this->form_validation->set_rules('kode_rules', 'Kode Rules', 'required|is_unique[tb_rules.kode_rules]');
        $this->form_validation->set_rules('kode_solusi_rules', 'Kode Solusi', 'required');
        $this->form_validation->set_rules('kode_gejala_rules[]', 'Kode Gejala', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Data Rules',
                'getSolusi' => $this->db->get('tb_solusi')->result_array(),
                'getGejala' => $this->db->get('tb_gejala')->result_array(),
                'getRules' => $this->db->get('tb_rules')->result_array()
            ];
            $this->load->view('admin_header');
            $this->load->view('forward-chaining/admin_fc_rules', $data);
        } else {
            $this->rules_m->simpanRules();
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('forward_chaining/data_rules');
        }
    }
    public function ubah_rules($kode_rules)
    {
        $this->form_validation->set_rules('kode_solusi_rules', 'Kode Solusi', 'required');
        $this->form_validation->set_rules('kode_gejala_rules[]', 'Kode Gejala', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Ubah Data Rules',
                'getRules' => $this->db->get_where('tb_rules', ["kode_rules" => $kode_rules])->row_array(),
                'getSolusi' => $this->db->get('tb_solusi')->result_array(),
                'getGejala' => $this->db->get('tb_gejala')->result_array(),
            ];
            $this->load->view('admin_header');
            $this->load->view('forward-chaining/admin_fc_ubah-rules', $data);
        } else {
            $this->rules_m->ubahRules($kode_rules);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('forward_chaining/data_rules');
        }
    }
    public function hapus_rules($kode_rules)
    {
        $this->db->delete('tb_rules', ['kode_rules' => $kode_rules]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('forward_chaining/data_rules');
    }
    // JENIS PERAWATAN
    public function data_jenis_perawatan()
    {
        $this->form_validation->set_rules('kode_jenis_perawatan', 'Kode Jenis Perawatan', 'required|is_unique[tb_jenis_perawatan.kode_jenis_perawatan]');
        $this->form_validation->set_rules('nama_jenis_perawatan', 'Nama Jenis Perawatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Data Jenis Perawatan',
                'getJenisPerawatan' => $this->db->get('tb_jenis_perawatan')->result_array(),
            ];
            $this->load->view('admin_header');
            $this->load->view('forward-chaining/admin_fc_perawatan', $data);
        } else {
            $this->perawatan_m->simpanPerawatan();
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('forward_chaining/data_jenis_perawatan');
        }
    }
    public function ubah_jenis_perawatan($kode_jenis_perawatan)
    {
        $this->form_validation->set_rules('nama_jenis_perawatan', 'Nama Jenis Perawatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Ubah Jenis Perawatan',
                'getJenisPerawatan' => $this->db->get_where('tb_jenis_perawatan', ['kode_jenis_perawatan' => $kode_jenis_perawatan])->row_array(),
            ];
            $this->load->view('admin_header');
            $this->load->view('forward-chaining/admin_fc_ubah-perawatan', $data);
        } else {
            $this->perawatan_m->ubahPerawatan($kode_jenis_perawatan);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('forward_chaining/data_jenis_perawatan');
        }
    }
    public function hapus_jenis_perawatan($kode_jenis_perawatan)
    {
        $this->db->delete('tb_jenis_perawatan', ['kode_jenis_perawatan' => $kode_jenis_perawatan]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('forward_chaining/data_jenis_perawatan');
    }
}
