<?php
class Auth_model_pelanggan extends CI_Model {
        
        public function cekUser($username)
        {
                return $this->db->get_where('login_pelanggan', ['username' => $username])->row_array();
        }
        public function cekPassword($username, $password)
        {
                return $this->db->get_where('login_pelanggan', ['password' => $password,'username' => $username])->row_array();
        }
}