<?php
class m_data extends CI_Model
{
    public function __construct()	{
  		$this->load->database();
  		date_default_timezone_set('Asia/Jakarta');
  	}
///////////////////////////////////////////// DASHBOARD ///////////////////////////////////////////////////////////////////////////////////////////
/*********************************** 10 TOP ISSUE + TOP NEWS ******************************************************************/
    //**** TAMPILKAN TOP KEYWORD
    public function topKeyword()
    {
      $query = $this->db->query('SELECT id_katakunci_berita, katakunci, jumlah_backup
                                  FROM katakunci_berita
                                  GROUP BY id_katakunci_berita, katakunci
                                  ORDER BY jumlah_backup DESC
                                  LIMIT 5'
                                );
      return $query->result_array();
    }

    /**** TAMPILKAN DATA TOP ISSUE**/
    public function tampilTopIssue($datetimemax,$datetimemin,$whereKatakunciTema)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('waktu >=', $datetimemin);
      $this->db->where('waktu <=', $datetimemax);
      $this->db->where($whereKatakunciTema);
      $query = $this->db->count_all_results();
      return $query;

      /* KODINGAN BARU*/


      /* KODINGAN LAMA */
      /*$query;
      //LIMIT 5 karena data yang akan diambil ada 5
      if($id_key == 0)
        $query = $this->db->query("SELECT berita3.id_katakunciberita as id_katakunciberita, count(berita3.id_katakunciberita) as jumlah_berita, katakunci_berita.katakunci as name_key
                                   FROM berita3 INNER JOIN katakunci_berita ON berita3.id_katakunciberita = katakunci_berita.id_katakunci_berita
                                   WHERE berita3.id_katakunciberita is NOT NULL AND waktu BETWEEN '".$datetimemin."' AND '".$datetimemax."'
                                   GROUP BY berita3.id_katakunciberita, katakunci_berita.katakunci
                                   ORDER BY jumlah_berita DESC
                                   LIMIT 5
                                  ")->result_array();
      else
        $query = $this->db->query("SELECT id_katakunciberita, count(id_katakunciberita) as jumlah_berita
                                   FROM berita3
                                   WHERE id_katakunciberita = ".$id_key." AND waktu BETWEEN '".$datetimemin."' AND '".$datetimemax."'
                                   GROUP BY id_katakunciberita
                                   LIMIT 1
                                  ")->row();
      return $query;*/
    }

    /**** TAMPIL TOP NEWS**/
    public function tampil_data_topNews($datetimemax,$datetimemin)
    {
      $query = $this->db->query("SELECT distinct on(waktu) judul,isi,waktu, gambar, url 
                                 FROM berita3
                                 WHERE waktu BETWEEN '".$datetimemin."' AND '".$datetimemax."'
                                 ORDER BY waktu desc
                                 LIMIT 3
                                ");
      return $query->result_array();
    }

/*********************************** TOP ISSUE + TOP NEWS ******************************************************************/
/*************************************** SEBARAN BERITA ********************************************************************/
  /* 
    public function tampil_sebaran_berita($max,$min)
    {
      $query = $this->db->query("SELECT lokasi, count(lokasi) as jumlah_berita
                                 FROM berita3
                                 WHERE lokasi != '' AND waktu BETWEEN '".$min."' AND '".$max."'
                                 GROUP BY lokasi");
      return $query->result_array();
 	
    }
   */ 
    public function tampil_sebaran_berita($max,$min)
    {
      $query = $this->db->query("SELECT id_kabupaten,berita_lokasi.id_provinsi,provinsi.nama as provinsi ,kabupaten.nama as kabupaten, count(id_berita) as hasil
                                 from berita_lokasi
                                 join provinsi on berita_lokasi.id_provinsi = provinsi.id
                                 join berita3 on berita_lokasi.id_berita = berita3.id
                                 join kabupaten on berita_lokasi.id_kabupaten = kabupaten.id
                                 where berita3.waktu between '".$min."' and '".$max."' 
                                 group by id_kabupaten,berita_lokasi.id_provinsi,provinsi.nama,kabupaten.nama
                                 ");
      return $query->result_array();
 	
    }

/*************************************** SEBARAN BERITA ********************************************************************/
/***************************************** TOP PERSON **********************************************************************/
    public function tampil_TopPerson($max,$min,$WhereAliasPerson)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('waktu >=', $min);
      $this->db->where('waktu <=', $max);
      $this->db->where($WhereAliasPerson);
      $query = $this->db->count_all_results();
      return $query;
    }


public function tampil_TopPersonWorldcloud($WhereAliasPerson)
    {

      $query = $this->db->query($WhereAliasPerson);
      return $query->result_array();
    }

public function tampil_isuWorldcloud($WhereAliasPerson)
    {

      $query = $this->db->query($WhereAliasPerson);
      return $query->result_array();
    }

    function tampil_berita_hari_ini($max,$min)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->where('waktu >=', $min);
      $this->db->where('waktu <=', $max);
      $query = $this->db->get();
      return $query->result_array();
    }


    function tampil_isi_berita($url){
      $link=$url;

      $query = $this->db->query(" SELECT *
                                  FROM berita3
                                  WHERE url ='".$link."'
                               ");

           return $query->result_array();

    }
/***************************************** TOP PERSON **********************************************************************/
///////////////////////////////////////////// DASHBOARD ///////////////////////////////////////////////////////////////////////////////////////////

/*********************************** twitter******************************************************************/
    //menampilkan sosmed
    function tampil_data_sosmed($id){
     //return $this->db->get('berita1');
          $this->db->select('*');
          $this->db->from('social_media');
          $this->db->where('id_topik_twitter',$id);
          $query=$this->db->get();
          return $query->result_array();
    }

    function tampil_topik_twitter()
    {
        $this->db->select('*');
        $this->db->from('topik_twitter');
        $this->db->order_by('nama','asc');
        $query=$this->db->get();
        return $query->result_array();
    }
    function topik_twitter_1()
    {
        $this->db->select('*');
        $this->db->from('topik_twitter');
        $this->db->order_by('nama','asc');
        $this->db->limit(1);
        $query=$this->db->get();
        return $query->result_array();
    }

function ambilakun(){
          $this->db->select('*');
          $this->db->from('tblakun');
          $query=$this->db->get();
          return $query;
   }

   function tampil_data_sosmed_perakun($data){
     		$url= $data['url'] ;
          $this->db->select('*');
          $this->db->where('ketakun',$url);
          $this->db->from('socialMedia');
          $query=$this->db->get();
          return $query;
    }
/*********************************** twitter******************************************************************/

//////////////////////////////////////// MAPS LIST BERITA /////////////////////////////////////////////////////
/*********************************** MAPS LIST BERITA *********************************************************/
    /*   function jumlah_maps_listberita($lokasi,$datemax,$datemin)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->like('LOWER(lokasi)',$lokasi,'both');
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      $query=$this->db->get()->num_rows();
      return $query;
    }

    function maps_listberita($lokasi,$datemax,$datemin,$limit,$offset)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      $this->db->like('LOWER(lokasi)',$lokasi,'both');
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
      $this->db->limit($limit,$offset);
      $query = $this->db->get();
      return $query->result_array();
    }
 */
 
 function jumlah_maps_listberita($lokasi,$datemax,$datemin)
    {
$query = $this->db->query("SELECT judul
								          from berita_lokasi	
								          join provinsi on berita_lokasi.id_provinsi = provinsi.id
								          join berita3 on berita_lokasi.id_berita = berita3.id
								          join kabupaten on berita_lokasi.id_kabupaten = kabupaten.id
								          where berita3.waktu between '".$datemin."' and '".$datemax."' 
								          and kabupaten.id = '".$lokasi."' or provinsi.id='".$lokasi."'
								          ");
			
      //$query=$this->db->get()->num_rows();
      return $query->num_rows();
  

    }

    function maps_listberita($lokasi,$datemax,$datemin,$limit,$offset)
    {
			
$query = $this->db->query("			          
                          SELECT *
                          from berita_lokasi
                          join provinsi on berita_lokasi.id_provinsi = provinsi.id
                          join berita3 on berita_lokasi.id_berita = berita3.id
                          join kabupaten on berita_lokasi.id_kabupaten = kabupaten.id
                          where berita3.waktu between '".$datemin."' and '".$datemax."' 
								          and kabupaten.id = '".$lokasi."' or provinsi.id='".$lokasi."'								          
                          limit '".$limit."' offset '".$offset."' 
								          ");

								          
//								          echo $query;
			
			
      return $query->result_array();
  
  /*     $this->db->select('*');
      $this->db->from('berita_lokasi');
      $this->db->join('provinsi', 'berita_lokasi.id_berita = provinsi.id');
      $this->db->join('berita3', 'berita_lokasi.id_provinsi = berita3.id');
      $this->db->join('kabupaten', 'berita_lokasi.id_kabupaten = kabupaten.id');
      
      $this->db->where('waktu >=', $datemin);
      $this->db->where('waktu <=', $datemax);
     $this->db->where('kabupaten.nama', $lokasi);
      $this->db->or_where('provinsi.nama', $lokasi);
      $this->db->limit($limit,$offset);
      $query = $this->db->get();
      return $query->result_array();
*/
    }
 
/*********************************** MAPS LIST BERITA ********************************************************/
//////////////////////////////////////// MAPS LIST BERITA /////////////////////////////////////////////////////

    function tambah_data($data,$table)
    {
      $data = array(
              'judul' => $this->input->post('judul'),
              'tanggal' => $this->input->post('tanggal'),
              'isi' => $this->input->post('isi'),
              'penulis' => $this->input->post('penulis'),
              'url' => $this->input->post('url')
            );

      $this->db->set($data);
      $this->db->insert($this->db->dbprefix.'berita3');
    }

    function m_delete($data,$where,$table)
    {
      $this->db->where($where);
      $this->db->update($table,$data);
    }

/**** TAMPILKAN DATA PROGRAM PEMERITAH**/


    function tampil_isi_program_prioritas(){


      $query = $this->db->query(" SELECT tema_program
                                  FROM program_prioritas
                               ");

           return $query->result_array();

    }


    function m_programprioritas($datetimemax,$datetimemin,$whereKatakunciTema)
    {
      $this->db->select('*');
      $this->db->from('berita3');
      //$this->db->where('waktu >=', $datetimemin);
      //$this->db->where('waktu <=', $datetimemax);
      $this->db->like('isi',$whereKatakunciTema);
       $query = $this->db->count_all_results();
      return $query;
    }

/*
    function media_program_prioritas(){

     $isi="select * from program_prioritas";

      $query = $this->db->query($isi)->result_array();
     //return $query->result_array();


		$string= "SELECT media, COUNT( * ) AS total_muncul FROM berita3 where isi ilike '%".$query[0]['tema_program']."%'";

	for($i=1;10>$i;$i++){

		$nambah=$query[$i]['tema_program'];
		$nambah2='\'%'.$nambah.'%\'';

     $string=$string.' or isi ilike '.$nambah2;
	}

	$stringfix= $string.' GROUP BY media';
   //echo $stringfix;
      $query = $this->db->query($stringfix)->result_array();

   //echo $query[2]['media'];
   //echo $query[2]['total_muncul'];

    return $query;
    }
*/

   function media_program_prioritas($bulanKemarin,$now){
		$query="SELECT media,count(id_berita) as total_muncul
						from berita_programprioritas
						join program_prioritas on berita_programprioritas.id_program = program_prioritas.id_tema_program
						join berita3 on berita_programprioritas.id_berita = berita3.id
						WHERE  berita3.waktu BETWEEN '".$bulanKemarin."' AND '".$now."'
						group by media
						order by total_muncul desc";
      $query = $this->db->query($query);
                                

      return $query->result_array();
    }




/*********************************** end query top issue online media ********************************************************/
/*
  public function top_issue_online_media($datetimemax,$datetimemin)
    {
      $query = $this->db->query("SELECT distinct id_tema,tema,count(id_katakunci) as hasil
																from berita3_katakunci
																join katakunci_join_tema on berita3_katakunci.id_katakunci = katakunci_join_tema.id_katakunci_berita
																join berita3 on berita3_katakunci.id_berita = berita3.id
																WHERE  berita3.waktu BETWEEN '".$datetimemin."' AND '".$datetimemax."'
																group by id_tema,tema
																order by id_tema
                                ");


      return $query->result_array();

  }*/
    public function top_issue_online_media($sql)
    {

      $query = $this->db->query($sql);
                                

      return $query->result_array();
  }
/*********************************** end query top issue online media ********************************************************/


/*********************************** query top person worldcloud ********************************************************/
  public function top_person_wordcloud($query)
    {
      $query = $this->db->query($query);

      return $query->result_array();

  }

/*********************************** end query top person worldcloud ********************************************************/


/*********************************** query program prioritas ********************************************************/
  public function program_prioritas($query)
    {
      $query = $this->db->query($query);

      return $query->result_array();

  }

/*********************************** end query top person worldcloud ********************************************************/


  }

?>
