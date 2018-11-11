<?php
class M_export_excel extends CI_Model
{
    public function __construct()
    {
  		$this->load->database();
  		date_default_timezone_set('Asia/Jakarta');
  	}





    function tampil_data()
    {
      $this->db->select('*');
      $this->db->from('user');
      $query = $this->db->get()->result();
      return $query;
    }
}
