<?php
class M_mca extends CI_Model
{
    public function __construct()
    {
  		$this->load->database();
  		date_default_timezone_set('Asia/Jakarta');
  	}
/***************************************** TAMPIL LIST BERITA *****************************************************/
/*  DENGAN MENGGUNAKAN ID
    function tampil_berita($id_katakunci, $datemax, $datemin)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('id_katakunciberita', $id_katakunci);
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      $this->db->order_by('id','desc');
      $this->db->limit('3');
      $query=$this->db->get();
      return $query->result_array();
    }
*/
    function jumlah_berita($katakunci,$datemax,$datemin)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->like('LOWER(judul)',$katakunci,'both');
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      $query=$this->db->get()->num_rows();
      return $query;
    }

    function tampil_berita($katakunci, $datemax, $datemin, $limit, $offset)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->like('LOWER(judul)',$katakunci,'both');
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      //$this->db->order_by('id','desc');
      $this->db->limit($limit,$offset);
      $query=$this->db->get();
      return $query->result();
    }

    //******************** KETIKA KLIK LIHAT BERITA *******************************************
    function tampil_berita2($where, $datemax, $datemin,$limit,$offset)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      $this->db->where($where);
      $this->db->order_by('id','desc');
      $this->db->limit($limit,$offset);
      $query=$this->db->get();
      return $query->result();
    }

    // HITUNG JUMLAH BERITA
    function jumlah_berita2($where,$datemax,$datemin)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      $this->db->where($where);
      $query=$this->db->get()->num_rows();
      return $query;
    }
        // HITUNG JUMLAH BERITA
    //******************** KETIKA KLIK LIHAT BERITA *******************************************

/***************************************** TAMPIL LIST BERITA *****************************************************/
/***************************************** TAMPIL GRAFIK MEDIA *****************************************************/
    function tampil_sebaran_media($katakunci,$datemax,$datemin)
    {
      $this->db->select('media, COUNT(media) as total');
      $this->db->from('berita3');
      $this->db->like('LOWER(judul)',$katakunci,'both');
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      $this->db->group_by('media');
      $query  = $this->db->get();
      return $query->result_array();
    }

    //KETIKA DI KLIK LIHAT BERITA
    function tampil_sebaran_media2($where,$datemax,$datemin)
    {
      $this->db->select('media, COUNT(media) as total');
      $this->db->from('berita3');
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      $this->db->where($where);
      $this->db->group_by('media');
      $query  = $this->db->get();
      return $query->result_array();
    }
    //KETIKA DI KLIK LIHAT BERITa

/***************************************** TAMPIL GRAFIK MEDIA *****************************************************/

}
