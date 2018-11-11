<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth_model extends CI_Model {

//    untuk mengcek jumlah username dan password yang sesuai
    function login($email,$password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

//    untuk mengambil data hasil login
    function data_login($email,$password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get('user')->row();
    }

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
