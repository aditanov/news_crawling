<?php
class M_admin extends CI_Model
{
    public function __construct()
    {
  		$this->load->database();
  		date_default_timezone_set('Asia/Jakarta');
  	}

    function tampil_user($where)
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->join('hak_akses_user','user.keterangan = hak_akses_user.id_hak_akses','inner');
      $this->db->where('email <>',$where);
      $query=$this->db->get();
      return $query->result_array();
    }

    function update($data, $where, $table)
    {
      $this->db->where($where);
      $this->db->update($table,$data);
    }

//************************ ADD USER ******************
    function tampil_hak_akses()
    {
      $this->db->select('*');
      $this->db->from('hak_akses_user');
      $query = $this->db->get();
      return $query->result_array();
    }

    function cek_user($where)
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('email', $where);
      $query = $this->db->get();
      return $query->row();
    }

    function tambah_user($data,$table)
    {
      $this->db->set($data);
      $this->db->insert($this->db->dbprefix.$table);
    }

//************************ ADD USER ******************
//********************** DELETE USER *****************
    function hapus_user($where,$table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }
//********************** DELETE USER *****************
//******************* GANTI PASSWORD *****************
    //ADA FUNGSI CEK USER
    function ganti_password($data,$where,$table)
    {
      $this->db->where($where);
      $this->db->update($table,$data);
    }

//******************* GANTI PASSWORD *****************
}
