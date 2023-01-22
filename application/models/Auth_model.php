<?php
class Auth_model extends CI_Model {
        
        public function cekUser($username)
        {
                return $this->db->get_where('login_admin', ['username' => $username])->row_array();
        }
        public function cekPassword($username, $password)
        {
                return $this->db->get_where('login_admin', ['password' => $password,'username' => $username])->row_array();
        }
}