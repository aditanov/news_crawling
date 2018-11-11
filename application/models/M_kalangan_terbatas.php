<?php
class M_kalangan_terbatas extends CI_Model
{
    public function __construct()
    {
  		$this->load->database();
  		date_default_timezone_set('Asia/Jakarta');
  	}
///////////////////////////////////////////// TEMA ////////////////////////////////////////////////////////

    function tema()
    {
      $this->db->select('*');
      $this->db->from('tema_katakunci');
      $query=$this->db->get();
      return $query->result_array();
    }

    function judul_tema($id)
    {
      $this->db->select('*');
      $this->db->from('tema_katakunci');
      $this->db->where('id',$id);
      $query = $this->db->get();
      return $query->row();
    }

    function daftar_katakunci($id)
    {
      $this->db->select('*');
      $this->db->from('katakunci_berita');
      $this->db->where('id_tema',$id);
      $query = $this->db->get();
      return $query->result_array();
    }
//************************************** TAMBAH KEYWORD *********************************************
    function cek_keyword($where)
    {
      $this->db->select('*');
      $this->db->from('katakunci_berita');
      $this->db->where('katakunci',$where);
      $query = $this->db->get();
      return $query->row();
    }

    function db_tambah_keyword($data, $table)
    {
      $this->db->set($data);
      $this->db->insert($this->db->dbprefix.$table);
    }
//************************************* TAMBAH KEYWORD *********************************************
//************************************* HAPUS KEYWORD  *********************************************
    function hapus_keyword($where,$table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }
//************************************* HAPUS KEYWORD  *********************************************
//*************************************  EDIT KEYWORD  *********************************************
    //ambil keywordnya (text)
    function katakunci($where)
    {
      $this->db->select('*');
      $this->db->from('katakunci_berita');
      $this->db->where('id_katakunci_berita',$where);
      $query = $this->db->get();
      return $query->row();
    }

    //cek keywordnya di fungsi atas
    //update kata kuncinya
    function update_katakunci($data, $where, $table)
    {
      $this->db->where($where);
      $this->db->update($table,$data);
    }
    //function cek_keyword
//*************************************  EDIT KEYWORD  *********************************************
//*************************************** EDIT TEMA ***********************************************
  function cek_tema($where)
  {
    $this->db->select('*');
    $this->db->from('tema_katakunci');
    $this->db->where('tema',$where);
    $query = $this->db->get();
    return $query->row();
  }

  function update_tema($data,$where,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }
//*************************************** EDIT TEMA ***********************************************
//*************************************** HAPUS TEMA ***********************************************
  function hapus_tema($where,$table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
//*************************************** HAPUS TEMA ***********************************************
//*************************************** TAMBAH TEMA ***********************************************
  function db_tambah_tema($data,$table)
  {
    $this->db->set($data);
    $this->db->insert($this->db->dbprefix.$table);
  }
//*************************************** TAMBAH TEMA ***********************************************
///////////////////////////////////////////// TEMA ////////////////////////////////////////////////////////
///////////////////////////////////////////// PERSON ////////////////////////////////////////////////////////
  function person()
  {
    $this->db->select('*');
    $this->db->distinct();
    $this->db->from('person');
    $query = $this->db->get();
    return $query->result_array();
  }

  function judul_person($id)
  {
    $this->db->select('*');
    $this->db->from('person');
    $this->db->where('id_person',$id);
    $query = $this->db->get();
    return $query->row();
  }

  function daftar_aliasPerson($id)
  {
    $this->db->select('*');
    $this->db->from('alias_person');
    $this->db->where('id_person',$id);
    $query = $this->db->get();
    return $query->result_array();
  }

  function cek_person($person)
  {
    $this->db->select('*');
    $this->db->from('person');
    $this->db->where('person',$person);
    $query = $this->db->get();
    return $query->row();
  }

  function cek_alias($alias)
  {
    $this->db->select('*');
    $this->db->from('alias_person');
    $this->db->where('alias_person',$alias);
    $query = $this->db->get();
    return $query->row();
  }

  function alias($id) //digunakan untuk menampilkan alias_personya untuk di edit
  {
    $this->db->select('*');
    $this->db->from('alias_person');
    $this->db->where('id_alias_person',$id);
    $query = $this->db->get();
    return $query->row();
  }
  /************************************** TAMBAH PERSON *************************************************/
  function db_tambah_person($data,$table)
  {
    $this->db->set($data);
    $this->db->insert($this->db->dbprefix.$table);
  }
  /************************************** TAMBAH PERSON *************************************************/
  /*************************************** EDIT PERSON **************************************************/
  function update_person($data,$where,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  /************************************** EDIT PERSON ***************************************************/
  //************************************* HAPUS PERSON  *********************************************
  function hapus_person($where,$table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
  //************************************* HAPUS HAPUS  *********************************************
  /*********************************** TAMBAH ALIAS PERSON **********************************************/
  function db_tambah_alias($data,$table)
  {
    $this->db->set($data);
    $this->db->insert($this->db->dbprefix.$table);
  }
  /*********************************** TAMBAH ALIAS PERSON **********************************************/
  /*********************************** EDIT ALIAS PERSON **********************************************/
  function update_alias($data,$where,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  /*********************************** EDIT ALIAS PERSON **********************************************/
  //************************************* HAPUS ALIAS  *********************************************
  function hapus_alias($where,$table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
  //************************************* HAPUS ALIAS  *********************************************

///////////////////////////////////////////// PERSON ////////////////////////////////////////////////////////


}
