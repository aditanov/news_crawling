<?php
class m_input extends CI_Model
{
    public function __construct()
    {
  		$this->load->database();
  		date_default_timezone_set('Asia/Jakarta');
  	}

    //**************************************** TWITTER **************************************************************
    function topik_twitter($nama)
    {
        $this->db->where('nama', $nama);
        $query =  $this->db->get('topik_twitter');
        return $query->num_rows();
    }

    function sosial_media($id)
    {
        $this->db->where('id_tweet', $id);
        $query =  $this->db->get('social_media');
        return $query->num_rows();
    }

    function daftar_topik_twitter()
    {
      $this->db->select('*');
      $this->db->from('topik_twitter');
      $query = $this->db->get();
      return $query->result_array();
    }
    //**************************************** TWITTER **************************************************************
    //**************************************** ubah waktu ************************************************************
    function berita()
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('tahun is null');
      $this->db->order_by('id','asc');
      $query = $this->db->get();
      return $query->result_array();
    }

    //**************************************** ubah waktu ************************************************************
    //****************************************  paggination ***********************************************************
    function daftar_media_online()
    {
      $this->db->select('*');
      $this->db->from('media_online');
      $query = $this->db->count_all_results();
      return $query;
    }
    function ambil_media_online($limit, $offset)
    {
      $this->db->select('*');
      $this->db->from('media_online');
      $this->db->order_by('kode','asc');
      $this->db->limit($limit,$offset);
      $query = $this->db->get();
      return $query->result_array();
    }
    //****************************************  paggination ***********************************************************
    //***************************************** taging katakunci **********************************************************
    function ambil_berita_katakunci($tag_katakunci, $katakunci)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('tag_katakunci',$tag_katakunci);
      $this->db->where($katakunci);
      $query = $this->db->get();
      return $query->result_array();
    }

    function ambil_katakunci()
    {
      $query = $this->db->query('select * from katakunci_berita where id_tema in (select id from tema_katakunci)'
                               );
      return $query->result_array();
    }

    function cek_berita3_katakunci($id_berita, $id_katakunci)
    {
      //agar tidak terjadi duplikat
      $this->db->like('id_berita', $id_berita);
      $this->db->where('id_katakunci', $id_katakunci);
      $query =  $this->db->get('berita3_katakunci');
      return $query->num_rows();
    }

    //***************************************** taging katakunci **********************************************************
    //*************************************** taging alias person **********************************************************
    function ambil_alias()
    {
      $query = $this->db->query('select * from alias_person where id_person in (select id_person from person)');
      return $query->result_array();
    }

    function ambil_berita_alias($tag_alias, $alias)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('tag_alias',$tag_alias);
      $this->db->where($alias);
      $query = $this->db->get();
      return $query->result_array();
    }

    function cek_berita3_alias($id_berita, $id_alias)
    {
      //agar tidak terjadi duplikat
      $this->db->where('id_berita', $id_berita);
      $this->db->where('id_alias', $id_alias);
      $query =  $this->db->get('berita_aliasperson');
      return $query->num_rows();
    }

    //*************************************** taging alias person **********************************************************
    //*************************************** taging program prioritas **********************************************************
    function ambil_program()
    {
      $this->db->select('*');
      $this->db->from('program_prioritas');
      $query = $this->db->get();
      return $query->result_array();
    }

    function ambil_berita_program($tag_program, $program)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('tag_program',$tag_program);
      $this->db->where($program);
      $query = $this->db->get();
      return $query->result_array();
    }

    function cek_berita_program($id_berita, $id_program)
    {
      //agar tidak terjadi duplikat
      $this->db->where('id_berita', $id_berita);
      $this->db->where('id_program', $id_program);
      $query =  $this->db->get('berita_programprioritas');
      return $query->num_rows();
    }

    //*************************************** taging program prioritas **********************************************************
    //*************************************** taging lokasi **********************************************************
    function daftar_berita($tag_lokasi)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('tag_lokasi', $tag_lokasi);
      $query = $this->db->get();
      return $query->result_array();
    }

    function daftar_kabupaten()
    {
      $this->db->select('*');
      $this->db->from('kabupaten');
      $query = $this->db->get();
      return $query->result_array();
    }

    function daftar_provinsi()
    {
      $this->db->select('*');
      $this->db->from('provinsi');
      $query = $this->db->get();
      return $query->result_array();
    }

    //************************************ cari id provinsi **********************************************************
    function cari_data($id,$table)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where('id',$id);
      $query = $this->db->get();
      return $query->row();
    }
    //************************************ cari id provinsi **********************************************************
    //*************************************** taging lokasi **********************************************************
    /******************************************* simpan tag ***********************************/
    function update_data($data, $where, $table)
    {
      $this->db->where($where);
      $this->db->update($table,$data);
    }

    function insert_data($data,$table)
    {
      $this->db->set($data);
      $this->db->insert($this->db->dbprefix.$table);
    }

    function hapus_data($where,$table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }
    /**************************************** end simpan tag ***********************************/


/******************************************* KEYWORD ***********************************/
    //ambil data keyword
    function data_keyword()
    {
      $this->db->select('*');
      $this->db->from('katakunci_berita');
      $query=$this->db->get()->result_array();
      return $query;
    }
/******************************************* KEYWORD ***********************************/
/******************************************* INPUT BERITA RSS **********************************************************/
    //ambil daftar media onlie
    function ambilMedia($start_num, $end_num)
    {
      $this->db->select('*');
      $this->db->from('media_online');
      $this->db->where('kode <=', $end_num);
      $this->db->where('kode >=',$start_num);
      $this->db->order_by('kode','asc');
      //$this->db->limit(10);
      $query = $this->db->get();
      return $query->result_array();
    }
    //end ambil daftar media online

    //insert rss berita
    function cekBerita($url, $table)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where('url',$url);
      $query = $this->db->get();
      return $query->num_rows();
    }

    function add_data($id, $data, $table)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->like('id',$id);
      $query=$this->db->get();
      if ( $query->num_rows() == 0 )
      {
         $this->db->set($data);
         $this->db->insert($this->db->dbprefix.$table);
      }
/*        $this->db->set($data);
        $this->db->insert($this->db->dbprefix.$table);
*/
    }

    function m_coba($id,$data,$table){
	     $this->db->select('*');
       $this->db->from($table);
       $this->db->where('id',$id);
       $query=$this->db->get();
       if ( $query->num_rows() == 0 )
       {
          $this->db->set($data);
          $this->db->insert($this->db->dbprefix.$table);
       }
    }

    function ambil_id_terakhir($id){
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('id_media =', $id);
      $this->db->order_by('id','desc');
      $this->db->limit(1);
      $query = $this->db->get();
      return $query->result_array();
    }
/******************************************** INPUT BERITA RSS *********************************************************/

/******************************************** TWITTER  **************************************/
    function addSocialMedia($data,$table)
    {

       $isi= $data['isi'] ;

    	 $this->db->select('*');
          $this->db->from('socialMedia');
          $this->db->where('isi',$isi);
          $query=$this->db->get();
         if ( $query->num_rows() == 0 && $isi != NULL)

    	 {
      	$this->db->set($data);
          $this->db->insert($this->db->dbprefix.$table);
      }
    }

/******************************************** akun buat insert berdasarkan akun**************************************/
    function ambilakun(){
          $this->db->select('*');
          $this->db->from('tblakun');
          $query=$this->db->get();
          return $query;
   }


/******************************************** TWITTER **************************************/
}
