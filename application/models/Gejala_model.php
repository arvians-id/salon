<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{
	public function getGejala()
	{
		$this->db->select('*');
		$this->db->from('tb_gejala g');
		$this->db->join('tb_jenis_perawatan jp', 'g.kode_jenis_perawatan = jp.kode_jenis_perawatan');

		return $this->db->get()->result_array();
	}
	public function simpanGejala()
	{
		$data = [
			'kode_gejala' => $this->input->post('kode_gejala'),
			'kode_jenis_perawatan' => $this->input->post('kode_jenis_perawatan'),
			'gejala' => $this->input->post('gejala'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->insert('tb_gejala', $data);
	}
	public function ubahGejala($kode_gejala)
	{
		$data = [
			'kode_jenis_perawatan' => $this->input->post('kode_jenis_perawatan'),
			'gejala' => $this->input->post('gejala'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->where('kode_gejala', $kode_gejala);
		$this->db->update('tb_gejala', $data);
	}
	public function getFalseGejala($kode_riwayat)
	{
		$getRiwayat = $this->db->get_where('tb_riwayat', ['kode_riwayat' => $kode_riwayat])->row_array();
		$getGejala = $this->db->get('tb_gejala')->result_array();
		$arrJawaban = explode(',', $getRiwayat['jawaban']);

		$falseGejala = [];
		for ($i = 0; $i < count($getGejala); $i++) {
			if (!in_array($getGejala[$i]['kode_gejala'], $arrJawaban)) {
				$falseGejala[] = $getGejala[$i];
			}
		}

		return $falseGejala;
	}
}
