<?php

class Model_landing_page extends CI_Model
{
	public function tambahReservasi()
	{
		$data = [
			'name' => $this->input->post('name'),
			'perawatan' => $this->input->post('perawatan'),
			'tanggal' => $this->input->post('tanggal'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone')
		];

		$this->db->insert('tb_reservasi', $data);
	}

	public function ambildatareservasi()
	{
		$query = "SELECT * FROM tb_reservasi ORDER BY id DESC";
		return $this->db->query($query)->result_array();
	}

	public function hapusdatareservasi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_reservasi');
	}

	public function ambildatalistakun()
	{
		$query = "SELECT * FROM login_pelanggan ORDER BY id DESC";
		return $this->db->query($query)->result_array();
	}
}
