<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawatan_model extends CI_Model
{
    public function simpanPerawatan()
    {
        $data = [
            'kode_jenis_perawatan' => $this->input->post('kode_jenis_perawatan'),
            'nama_jenis_perawatan' => $this->input->post('nama_jenis_perawatan'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        $this->db->insert('tb_jenis_perawatan', $data);
    }
    public function ubahPerawatan($kode_jenis_perawatan)
    {
        $data = [
            'nama_jenis_perawatan' => $this->input->post('nama_jenis_perawatan'),
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        $this->db->where('kode_jenis_perawatan', $kode_jenis_perawatan);
        $this->db->update('tb_jenis_perawatan', $data);
    }
}
