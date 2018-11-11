<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_data','data');
        $this->load->model('M_kalangan_terbatas','data_kalangan_terbatas');
        $this->load->helper('url');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function lihat()
    {
        $this->load->view('input_out');
    }



    public function lihat_isiberita()
    {
    	 //************************************** cekjpnn ************************************************
    	 $url 		=$this->input->get('url');
    	$data['url']=$url;
    	     if(strpos(strtolower($url),strtolower("jpnn"))!=FALSE)
          {
           $isiSatuan= $this->data->tampil_isi_berita($url);
          $data['berita']=$isiSatuan[0];
           $data['media']="jpnn";
          }
          else{
          	$data['url']=$url;
          	 $data['media'] = "lain";
          }
    	      //************************************** LOGIN ************************************************
      if ($this->session->userdata('logged')<>1)
          $data['status_login']="LOGIN"; //belom login
      else
          $data['status_login']=$this->session->userdata('username');

       $this->load->view('view_berita',$data);

    }

    //view sosmed
    public function sosmed()
    {
      //************************************** LOGIN ************************************************
      if ($this->session->userdata('logged')<>1)
          $data['status_login']="LOGIN"; //belom login
      else{
        	$data['status_login'] = $this->session->userdata('username');
          $data['hak_akses']    = $this->session->userdata('hak_akses');
      }
      //************************************** LOGIN ************************************************
      //******************************* TAMPIL DATA TOPIK *******************************************
      $data['topik'] = $this->data->tampil_topik_twitter();
      //******************************* TAMPIL DATA TOPIK *******************************************
      //******************************* TAMPIL DATA TWITTER *****************************************
      $q 		=$this->input->get('q');
      $id = $this->input->get('id');
      if($q != NULL & $id != NULL)
      {
        $data['sosmed'] = $this->data->tampil_data_sosmed($id);
      }else {
        $id = $this->data->topik_twitter_1();
        foreach ($id as $id_topik) {
          $id =  $id_topik['id'];
        }
        $data['sosmed'] = $this->data->tampil_data_sosmed($id);
      }
//      $data['sosmed'] = $this->data->tampil_data_sosmed()
        //******************************* TAMPIL DATA TWITTER *****************************************

        $this->load->view('view_sosmed',$data);
    }

    public function tambah_berita()
    {
      $judul = $this->input->post('judul');
      $tanggal = $this->input->post('tanggal');
      $isi = $this->input->post('isi');
      $penulis = $this->input->post('penulis');
      $url = $this->input->post('url');
      $data['berita'] = array( 'judul' => $judul, 'tanggal' => $tanggal, 'isi' => $isi, 'penulis' => $penulis, 'url' => $url);
      $this->data->tambah_data($data);

      redirect('data/lihat');
    }

  public function index()
  {
    date_default_timezone_set("Asia/Jakarta");
    $timenow = date("H:i:s");
    $time_8  = date("H:i:s", mktime(8,0,0));
    $time_11 = date("H:i:s", mktime(11,0,0));
    $time_16 = date("H:i:s", mktime(16,0,0));
    $datetimemax; $datetimemin;
    $data = $id_key = $name_key = array();
    $topTema = $whereKatakunciTema = array(); $n_topTema=0;



        //<!--cek waktu sekarang masuk ke kategori 8 / 11/ 16-->

/*
    if($timenow >= $time_8 && $timenow < $time_11 )
    {   //mulai dari jam 8/ 16:00-8:00
        $datetimemax = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("11:00:00"));
        $datetimemin = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("08:00:00"));
    }
    elseif ($timenow >= $time_11 && $timenow < $time_16 )
    { //mulai dari jam 11 / 08:00 - 11:00
        $datetimemax = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("16:00:00"));
        $datetimemin = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("11:00:00"));
    }
    else
    { //mulai dari jam 16 / 11:00-16:00
        $datetimemax = date("Y-m-d",strtotime("tomorrow"))." ".date("H:i:s",strtotime("08:00:00"));
        $datetimemin = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("16:00:00"));
    }

    for($i=0; $i<13; $i++)
    {
        if(strpos($datetimemax,"08:00:00")!==FALSE)
        {
          $datetimemax_next = strtotime("-16 hours", strtotime($datetimemax));
          $datetimemax      = date("Y-m-d H:i:s", $datetimemax_next);
          $datetimemin_next = strtotime("-5 hours", strtotime($datetimemin));
          $datetimemin      = date("Y-m-d H:i:s", $datetimemin_next);
        }
        elseif(strpos($datetimemax,"11:00:00")!==FALSE)
        {
            $datetimemax_next = strtotime("-3 hours", strtotime($datetimemax));
            $datetimemax      = date("Y-m-d H:i:s", $datetimemax_next);
            $datetimemin_next = strtotime("-16 hours", strtotime($datetimemin));
            $datetimemin      = date("Y-m-d H:i:s", $datetimemin_next);
        }
        elseif(strpos($datetimemax,"16:00:00")!==FALSE)
        {
            $datetimemax_next = strtotime("-5 hours", strtotime($datetimemax));
            $datetimemax      = date("Y-m-d H:i:s", $datetimemax_next);
            $datetimemin_next = strtotime("-3 hours", strtotime($datetimemin));
            $datetimemin      = date("Y-m-d H:i:s", $datetimemin_next);
        }        //*********************************  TOP ISSUE  ******************************************

        /* KODINGAN BARU */
        //* * * * * * PROSES MENCARI 10 TOP ISSUE HARI INI
        //ambil semua tema

/*
        $ambilTema = $this->data_kalangan_terbatas->tema();
        $arrayJumlah = array();
        //looping setiap tema
        if($i==0){
          foreach ($ambilTema as $dataTema)
          {
            //ambil katakunci dari setiap tema
            $ambilKatakunci = $this->data_kalangan_terbatas->daftar_katakunci($dataTema['id']);
            //buat klausa where untuk mencari katakunci pada berita
            $whereKatakunciTema[$n_topTema] = "(LOWER(isi) LIKE '%".$dataTema['tema']."%'";
            foreach ($ambilKatakunci as $dataKatakunci)
                $whereKatakunciTema[$n_topTema] = $whereKatakunciTema[$n_topTema]."OR LOWER(isi) LIKE '%".$dataKatakunci['katakunci']."%'";
            //end buat klausa where
            //ambil jumlah Tema yang terdapat di berita
            $max = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("23:59:59"));
            $min = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("00:00:00"));
            $ambilTopTema = $this->data->tampilTopIssue($max,$min,$whereKatakunciTema[$n_topTema].")");
            if($ambilTopTema != 0 && $n_topTema <= 10 ){
              $topTema[$n_topTema] = array( 'id_tema'    => $dataTema['id'],
                                            'tema'       => $dataTema['tema'],
                                            'total'      => $ambilTopTema,
                                            'nomor_urut' => $n_topTema);
              $n_topTema++;
            }elseif($ambilTopTema !=0) {
              //karena data di limit maka data data yang ditampilkan harus 10 terbesar.
              //cek apakah data selanjutnya lebih besar?
              $topTemaMin = 0;
              if($topTema[0]['total'] <= $ambilTopTema || $topTema[1]['total'] <= $ambilTopTema || $topTema[2]['total'] <= $ambilTopTema
                 || $topTema[3]['total'] <= $ambilTopTema || $topTema[4]['total'] <= $ambilTopTema || $topTema[5]['total'] <= $ambilTopTema
                 || $topTema[6]['total'] <= $ambilTopTema || $topTema[7]['total'] <= $ambilTopTema || $topTema[8]['total'] <= $ambilTopTema
                 || $topTema[9]['total'] <= $ambilTopTema || $topTema[10]['total'] <= $ambilTopTema)
              {
                    //jika data selanjutna lebih besar, maka cek daftar data sebelumnya yang paling kecil
                    for($limit=1; $limit<11;$limit++)
                    {
                        //cari total top person yang paling kecil
                        //data top person yang paling kecil akan digantikan dengan data yang baru yang lebih besar
                        if($topTema[$topTemaMin]['total'] > $topTema[$limit]['total']) $topTemaMin = $limit;
                    }
                    //perturan data top person dengan data baru yang lebih besar
                    $topTema[$topTemaMin] = array('id_tema'    => $dataTema['id'],
                                                  'tema'       => $dataTema['tema'],
                                                  'total'      => $ambilTopTema,
                                                  'nomor_urut' => $n_topTema);
               }
            }

          }
        }

//        echo "<pre>";print_r($topTema);echo "</pre>";
        //* * * * * * * * END PROSES MENCARI 10 TOP ISSUE HARI INI
        //* * * * * * * * PROSES MENCARI ISSUE ISSUE
        for($n=0; $n<count($topTema);$n++)
        {
          $row = $this->data->tampilTopIssue($datetimemax, $datetimemin, $whereKatakunciTema[$topTema[$n]['nomor_urut']].')');
          //echo $topTema[$n]['nomor_urut']." :  ".$topTema[$n]['total']."->".$row."<br/>";
          $arrayJumlah[$n] = array('jumlah' => $row,
                                   'id_katakunci'=> $topTema[$n]['id_tema'],
                                   'katakunci'   => $topTema[$n]['tema'],
                                   'waktu'  => $datetimemax);
        }
//        echo "<pre>";print_r($arrayJumlah);echo "</pre>";
        $data['issue'.$i] = $arrayJumlah;

/*
        for($n=0; $n<5; $n++)
        {
            $row = $this->data->tampilTopIssue($datetimemax,$datetimemin,$id_key[$n]);
          if(isset($row->jumlah_berita))
              $arrayJumlah[$n] = array('jumlah'       => $row->jumlah_berita,
                                       'id_katakunci' => $id_key[$n],
                                       'katakunci'    => $name_key[$n],
                                       'waktu'        => $datetimemax);
          elseif (!isset($row->jumlah_berita))
              $arrayJumlah[$n] = array( 'jumlah'      => 0,
                                        'id_katakunci'=> $id_key[$n],
                                        'katakunci'   => $name_key[$n],
                                        'waktu'       => $datetimemax);
        }
        $data['issue'.$i] = $arrayJumlah; //{issue1, issue2}   {issue1,issue2}
        //* * * * * * * * END PROSES MENCARI ISSUE ISSUE

*/
					/*KODINGAN LAMA*/
/*
        $topIssue = $arrayJumlah = array();
        if($i==0)
        {   //ambil top issue yang paling tinggi
          $max = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("23:59:59"));
          $min = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("00:00:00"));
            $topIssue = $this->data->tampilTopIssue($max,$min,0);
            $n = 0;
            foreach ($topIssue as $data_topNews) {
              $id_key[$n] = $data_topNews['id_katakunciberita'];
              $name_key[$n] = $data_topNews['name_key'];
              $n++;
            }
        }
        if(isset($id_key[0]) && isset($id_key[1]) && isset($id_key[2]) && isset($id_key[3]) && isset($id_key[4]))
        {
          for($n=0; $n<5; $n++)
          {
              $row = $this->data->tampilTopIssue($datetimemax,$datetimemin,$id_key[$n]);
            if(isset($row->jumlah_berita))
                $arrayJumlah[$n] = array('jumlah'       => $row->jumlah_berita,
                                         'id_katakunci' => $id_key[$n],
                                         'katakunci'    => $name_key[$n],
                                         'waktu'        => $datetimemax);
            elseif (!isset($row->jumlah_berita))
                $arrayJumlah[$n] = array( 'jumlah'      => 0,
                                          'id_katakunci'=> $id_key[$n],
                                          'katakunci'   => $name_key[$n],
                                          'waktu'       => $datetimemax);
          }
          $data['issue'.$i] = $arrayJumlah; //{issue1, issue2}   {issue1,issue2}
        }
        else
        {
          for($n=0;$n<13;$n++)
            $data['issue'.$n] = array();
        }
        //*********************************  TOP ISSUE  ******************************************


        //********************************** 3 TOP NEWS ******************************************
       // if($i==0)
        //   $data['listberita'] = $this->data->tampil_data_topNews($datetimemax,$datetimemin);
        //********************************** 3 TOP NEWS ******************************************
    }//tutup for
*/
//********************************** TOP ISSUE ONLINE MEDIA *******************************************    
if($timenow >= $time_8 && $timenow < $time_11 )
    {   //mulai dari jam 8/ 16:00-8:00
        $datetimemax = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("11:00:00"));
        $datetimemin = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("08:00:00"));
    }
    elseif ($timenow >= $time_11 && $timenow < $time_16 )
    { //mulai dari jam 11 / 08:00 - 11:00
        $datetimemax = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("16:00:00"));
        $datetimemin = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("11:00:00"));
    }
    else
    { //mulai dari jam 16 / 11:00-16:00
        $datetimemax = date("Y-m-d",strtotime("tomorrow"))." ".date("H:i:s",strtotime("08:00:00"));
        $datetimemin = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("16:00:00"));
    }

$tertinggi=0;
    for($i=0; $i<13; $i++)
    {
        if(strpos($datetimemax,"08:00:00")!==FALSE)
        {
          $datetimemax_next = strtotime("-16 hours", strtotime($datetimemax));
          $datetimemax      = date("Y-m-d H:i:s", $datetimemax_next);
          $datetimemin_next = strtotime("-5 hours", strtotime($datetimemin));
          $datetimemin      = date("Y-m-d H:i:s", $datetimemin_next);
        }
        elseif(strpos($datetimemax,"11:00:00")!==FALSE)
        {
            $datetimemax_next = strtotime("-3 hours", strtotime($datetimemax));
            $datetimemax      = date("Y-m-d H:i:s", $datetimemax_next);
            $datetimemin_next = strtotime("-16 hours", strtotime($datetimemin));
            $datetimemin      = date("Y-m-d H:i:s", $datetimemin_next);
        }
        elseif(strpos($datetimemax,"16:00:00")!==FALSE)
        {
            $datetimemax_next = strtotime("-5 hours", strtotime($datetimemax));
            $datetimemax      = date("Y-m-d H:i:s", $datetimemax_next);
            $datetimemin_next = strtotime("-3 hours", strtotime($datetimemin));
            $datetimemin      = date("Y-m-d H:i:s", $datetimemin_next);
        }
		$timeMax[$i]=$datetimemax;
		$timeMin[$i]=$datetimemin;		
			 if($i==0)      
			 $data['listberita'] = $this->data->tampil_data_topNews($datetimemax,$datetimemin); 		 		 
 }
 
 $sql="SELECT distinct tema,id_tema, 
    	 	 sum(case when waktu BETWEEN '".$timeMin[0]."' AND '".$timeMax[0]."' then 1 else 0 end) as jam0,
         sum(case when waktu BETWEEN '".$timeMin[1]."' AND '".$timeMax[1]."' then 1 else 0 end) as jam1,
         sum(case when waktu BETWEEN '".$timeMin[2]."' AND '".$timeMax[2]."' then 1 else 0 end) as jam2,
				 sum(case when waktu BETWEEN '".$timeMin[3]."' AND '".$timeMax[3]."' then 1 else 0 end) as jam3,
 				 sum(case when waktu BETWEEN '".$timeMin[4]."' AND '".$timeMax[4]."' then 1 else 0 end) as jam4,
         sum(case when waktu BETWEEN '".$timeMin[5]."' AND '".$timeMax[5]."' then 1 else 0 end) as jam5,
         sum(case when waktu BETWEEN '".$timeMin[6]."' AND '".$timeMax[6]."' then 1 else 0 end) as jam6,
         sum(case when waktu BETWEEN '".$timeMin[7]."' AND '".$timeMax[7]."' then 1 else 0 end) as jam7,
         sum(case when waktu BETWEEN '".$timeMin[8]."' AND '".$timeMax[8]."' then 1 else 0 end) as jam8,
         sum(case when waktu BETWEEN '".$timeMin[9]."' AND '".$timeMax[9]."' then 1 else 0 end) as jam9,
         sum(case when waktu BETWEEN '".$timeMin[10]."' AND '".$timeMax[10]."' then 1 else 0 end) as jam10,
         sum(case when waktu BETWEEN '".$timeMin[11]."' AND '".$timeMax[11]."' then 1 else 0 end) as jam11,
         sum(case when waktu BETWEEN '".$timeMin[12]."' AND '".$timeMax[12]."' then 1 else 0 end) as jam12
         from berita3_katakunci
         join katakunci_join_tema on berita3_katakunci.id_katakunci = katakunci_join_tema.id_katakunci_berita
         join berita3 on berita3_katakunci.id_berita = berita3.id
         group by tema,id_tema";
	
		$select= $this->data->top_issue_online_media($sql);

//*************mengubah array hasil hitung jumlah tema menjadi string***************// 	
for($m=0;count($select)>$m;$m++)
{

	$issue[$m]=null;
	for($a=0;13>$a;$a++)
	{
		$jam="jam".$a;
		$issue[$m]=  $select[$m][$jam].','.$issue[$m];
	}
	$issue[$m]='['.$issue[$m].']';
//echo $issue[$m];
}
$data['issue']=$issue;
//************* end mengubah array hasil hitung jumlah tema menjadi string***************// 	
//*************mengubah array waktu menjadi string***************// 		
$waktu=null;
	foreach($timeMax as $timeMax)
	{
					$waktu=  "'".$timeMax."',".$waktu;
	}
	$waktu='['.$waktu.']';
	$data['waktu']=$waktu;
	//echo $waktu;
//*************end mengubah array waktu menjadi string***************// 		
	
//*************mengubah array label menjadi string***************// 			
		$temaDropdown=array();
	$idtemaDropdown=array();
	$l=0;
	$label=null;
	foreach($select as $select)
	{
					$label=  "'".$select['tema']."',".$label;
					$temaDropdown[$l]=$select['tema'];
					$idtemaDropdown[$l]=$select['id_tema'];				
					$l++;
	}
	$label='['.$label.']';
	$data['label']=$label;
	$data['tema']=$temaDropdown;
	$data['id_tema']=$idtemaDropdown;
	//echo $label;
//*************end mengubah array label menjadi string***************//



//********************************** END TOP ISSUE ONLINE MEDIA *******************************************    
    
    //********************************** SEBARAN BERITA *******************************************
  $max = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("23:59:59"));
    $min = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("00:00:00"));
    //$data['sebaran_berita'] = $this->data->tampil_sebaran_berita($max,$min);

      $lokasi = $this->data->tampil_sebaran_berita($max,$min);

//print_r($data['sebaran_berita']);
$geo=array();
//$jumlah=array();
//$id=array();
$l=0;

foreach($lokasi as $lokasi)
{
	if($lokasi['id_kabupaten']==0)
	{
	$geo[$l]['lokasi']=$lokasi['provinsi'];
	$geo[$l]['jumlah_berita']=$lokasi['hasil'];	
	$geo[$l]['id']=$lokasi['id_provinsi'];
		}
	else{
		$geo[$l]['lokasi']=$lokasi['kabupaten'];
		$geo[$l]['jumlah_berita']=$lokasi['hasil'];
		$geo[$l]['id']=$lokasi['id_kabupaten'];	
	}
$l++;
	}

 $data_id_berita="";
	$data_sebaran_berita = "";
	//$n=0;
foreach ($geo as $geo)
{
  $data_sebaran_berita = "['".$geo['lokasi']."', '".$geo['jumlah_berita']."'],".$data_sebaran_berita;
  $data_id_berita="['".$geo['id']."'],".$data_id_berita;
  //$n++;
}
$data_sebaran_berita = "[".$data_sebaran_berita."]";
$data_id_berita = "[".$data_id_berita."]";

//echo $data_sebaran_berita;
$data['data_sebaran_berita']=$data_sebaran_berita;
$data['data_id_berita']=$data_id_berita;

    //********************************** SEBARAN BERITA *******************************************
    //**********************************   TOP PERSON   *******************************************
/*    $n_topPerson = 0;
    $topPerson = array();
    //ambil seluruh daftar top person
    $ambilperson = $this->data_kalangan_terbatas->person();
    //looping setiap person
    foreach($ambilperson as $dataperson)
    {//looping
      //ambil alias dari setiap person
      $ambilAlias =$this->data_kalangan_terbatas->daftar_aliasPerson($dataperson['id_person']);
      //buat klausa where untuk mencari person pada berita
      //variable daftarAliasPerson berisi nama person dan aliasnya
      $WhereAliasPerson = "";
      $WhereAliasPerson ="(LOWER(isi) LIKE '%".$dataperson['person']."%'";
      foreach ($ambilAlias as $dataAlias)
        $WhereAliasPerson = $WhereAliasPerson."OR LOWER(isi) LIKE '%".$dataAlias['alias_person']."%'";
      //end buat klausa where
      //ambil jumlah person yang terdapat di berita
      $ambilTopPerson = $this->data->tampil_TopPerson($max,$min,$WhereAliasPerson.")");
      //limit top person hanya 10 data
      if($ambilTopPerson != 0 && $n_topPerson <= 10 )
        $topPerson[$n_topPerson] = array( 'person' => $dataperson['person'],
                                          'total'  => $ambilTopPerson);
      elseif($ambilTopPerson !=0) {
        //karena data di limit maka data data yang ditampilkan harus 10 terbesar.
        //cek apakah data selanjutnya lebih besar?
        $topPersonMin = 0;
        if($topPerson[0]['total'] <= $ambilTopPerson || $topPerson[1]['total'] <= $ambilTopPerson || $topPerson[2]['total'] <= $ambilTopPerson
          || $topPerson[3]['total'] <= $ambilTopPerson || $topPerson[4]['total'] <= $ambilTopPerson || $topPerson[5]['total'] <= $ambilTopPerson
          || $topPerson[6]['total'] <= $ambilTopPerson || $topPerson[7]['total'] <= $ambilTopPerson || $topPerson[8]['total'] <= $ambilTopPerson
          || $topPerson[9]['total'] <= $ambilTopPerson)
        {
          //jika data selanjutna lebih besar, maka cek daftar data sebelumnya yang paling kecil
          for($limit=1; $limit<10;$limit++)
          {
            //cari total top person yang paling kecil
            //data top person yang paling kecil akan digantikan dengan data yang baru yang lebih besar
            if($topPerson[$topPersonMin]['total'] > $topPerson[$limit]['total']) $topPersonMin = $limit;
          }
          //perturan data top person dengan data baru yang lebih besar
          $topPerson[$topPersonMin] = array('person' => $dataperson['person'],
                                            'total' => $ambilTopPerson);
        }
      }
      $n_topPerson++;
    }
    //tampilkan ke dashboard
*/
    //**********************************   TAMPIL TOP PERSON WORDCLOUD PENULIS   *******************************************

/*    $id_person = strtolower($this->input->get('id_person'));
    $person = strtolower($this->input->get('id_person'));
    $topPerson = array();
    //ambil seluruh daftar top person
    $ambilperson = $this->data_kalangan_terbatas->person();
    $data['persondropdown']=$ambilperson;
    if ($id_person==NULL && $person == NULL){
			$id_person=$ambilperson[0]['id_person'];
			$person=$ambilperson[0]['person'];
		}else{
			$id_person=$id_person;
			$person=$person;
		}
    //looping setiap person
    $WhereAliasPerson = "select penulis, count(*)as frek from berita3 where media ilike '%sindo%' or media ilike '%republika%' ";
  	//looping
      //ambil alias dari setiap person
      $ambilAlias =$this->data_kalangan_terbatas->daftar_aliasPerson($id_person);
      $WhereAliasPerson =$WhereAliasPerson."or isi ILIKE '%".$person."%'";
      foreach ($ambilAlias as $dataAlias){
        $WhereAliasPerson = $WhereAliasPerson." or isi ILIKE '%".$dataAlias['alias_person']."%'";
      }
  //$ambilTopPerson = $this->data->tampil_TopPersonWorldcloud($WhereAliasPerson." ORDER by count(*) DESC");
  	//echo $ambilTopPerson[2]['penulis'];
  $WhereAliasPerson = $WhereAliasPerson." group by penulis ORDER by count(*) DESC";
  $ambilTopPerson = $this->data->tampil_TopPersonWorldcloud($WhereAliasPerson);
  $data['person']=$ambilTopPerson ;
  	//echo $ambilTopPerson[2]['penulis'];
  		//echo $WhereAliasPerson;
*/

 $id_person=$this->input->get('id_person');
    $now = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("23:59:59"));
    $bulanKemarin = date("Y-m-d", strtotime("-1 month"))." ".date("H:i:s", strtotime("00:00:00"));
    if($id_person==NULL)
    {
    $query="SELECT penulis,count(penulis) as hasil
						from berita_aliasperson
						join alias_person_join_person on berita_aliasperson.id_alias = alias_person_join_person.id_alias_person
						join berita3 on berita_aliasperson.id_berita = berita3.id
						WHERE  berita3.waktu BETWEEN '".$bulanKemarin."' AND '".$now."'
						group by penulis
						order by hasil desc";
    }
    else
    {
    $query="SELECT penulis,count(penulis) as hasil
		        from berita_aliasperson
		        join alias_person_join_person on berita_aliasperson.id_alias = alias_person_join_person.id_alias_person
		        join berita3 on berita_aliasperson.id_berita = berita3.id
						WHERE  berita3.waktu BETWEEN '".$bulanKemarin."' AND '".$now."'
						and id_person = '".$id_person."'
						group by penulis
						order by hasil desc";
    }
 		$person= $this->data->top_person_wordcloud($query);
	  $data['person']=$person ;

    $ambilperson = $this->data_kalangan_terbatas->person();
    $data['persondropdown']=$ambilperson;


    //**********************************  END TAMPIL TOP PERSON WORDCLOUD   *******************************************

    //**********************************   TAMPIL TOP ISUE WORDCLOUD KATA JUDUL  *******************************************
    /*
    $id_tema = strtolower($this->input->get('id_tema'));
    $tema = strtolower($this->input->get('tema'));
    //ambil seluruh daftar top person
     $ambilTema = $this->data_kalangan_terbatas->tema();
     $data['temaWordcloud']=$ambilTema;
    if ($id_tema==NULL && $tema == NULL){
			$id_tema=$ambilTema[0]['id'];
			$tema=$ambilTema[0]['tema'];
		}else{
			$id_tema=$id_tema;
			$tema=$tema;
		}
    //echo $ambilTema[0]['tema'];
    $ambilKatakunci = $this->data_kalangan_terbatas->daftar_katakunci($id_tema);
     //echo $ambilKatakunci[0]['katakunci'];
    $WhereKatakunci = "select judul from berita3 where ";
      $WhereKatakunci =$WhereKatakunci."isi ILIKE '%".$tema."%'";
      foreach ($ambilKatakunci as $katakunci)
      {
        $WhereKatakunci = $WhereKatakunci." or isi ILIKE '%".$katakunci['katakunci']."%'";
      }
//echo $WhereKatakunci;
  $ambil_isuWorldcloud = $this->data->tampil_isuWorldcloud($WhereKatakunci);
      //echo $ambil_isuWorldcloud[0]['judul'];
			$str = NULL;
			foreach($ambil_isuWorldcloud as $judul)
			{
				$str=$str." ".$judul['judul'];
			}
//echo $str;
$string = strtolower($str);
$wordfreq = array_count_values(str_word_count($string, 1, '0'));
//print_r($word);
$hasil=array();
$n=0;
foreach ($wordfreq as $key => $value)
{ //echo $key . ':' . $value . "\n";
$hitung[$n] = array('jumlah' => $value, 'kata' => $key);
	$n++;
	}
foreach ($hitung as $param => $row) {
    $jumlah[$param]  = $row['jumlah'];
    $kata[$param] = $row['kata'];
}
array_multisort($jumlah, SORT_DESC, $hitung);
$x=0;
$katadoang=array();
	foreach ($hitung as $param => $row){
	$katadoang[$x]=$row['kata'];
	$x++;
		}
//echo $katadoang[0];
$a2=array("serta","di","ini","itu","dia","mereka","akan","dengan","ke","kembali","untuk","com","dari","tak","tidak","dan","atau","tetapi","melainkan","padahal","sedangkan","yang","agar","supaya","biar","biarpun","jika","kalau","jikalau","asalkan","bila","manakala","sejak","semenjak","sedari","sewaktu","tatkala","ketika","sementara","begitu","seraya","selagi","selama","serta","sambil","demi","setelah","sesudah","sebelum","sehabis","selesai","seusai","hingga","sampai","andaikan","seandainya","umpamanya","sekiranya","biar","biarpun","walau","sekali","sungguh,kendati","seakan-akan","seolah-olah","sebagaimana","seperti","sebagai","laksana","ibarat","daripada","alih-alih","sebab,karena","oleh karena","oleh sebab","sehingga","sampai","maka,dengan","tanpa,bahwa");
$isuWord=array_diff($katadoang,$a2);
$data['isuWordcloud']=$isuWord ;
//print_r($isuWord);
*/
$id_tema=$this->input->get('id_tema');    
    $now = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("23:59:59"));
    $bulanKemarin = date("Y-m-d", strtotime("-1 month"))." ".date("H:i:s", strtotime("00:00:00"));
    if($id_tema==NULL)
    {
$WhereKatakunci="SELECT judul
						from berita3_katakunci
						join katakunci_join_tema on berita3_katakunci.id_katakunci = katakunci_join_tema.id_katakunci_berita
						join berita3 on berita3_katakunci.id_berita = berita3.id
						WHERE  berita3.waktu BETWEEN '".$bulanKemarin."' AND '".$now."'
						";
    }
    else
    {
$WhereKatakunci="SELECT judul
						from berita3_katakunci
						join katakunci_join_tema on berita3_katakunci.id_katakunci = katakunci_join_tema.id_katakunci_berita
						join berita3 on berita3_katakunci.id_berita = berita3.id
						WHERE  berita3.waktu BETWEEN '".$bulanKemarin."' AND '".$now."'
						and id_tema ='".$id_tema."'";
    }
   $ambil_isuWorldcloud = $this->data->tampil_isuWorldcloud($WhereKatakunci);

//print_r($ambil_isuWorldcloud);
//  echo $WhereKatakunci;
    
			$str = NULL;			
			foreach($ambil_isuWorldcloud as $judul)
			{
				$str=$str." ".$judul['judul'];
			}
//echo $str;
$string = strtolower($str);
$wordfreq = array_count_values(str_word_count($string, 1, '0'));
//print_r($word);
$hasil=array();
$n=0;
foreach ($wordfreq as $key => $value)
{ //echo $key . ':' . $value . "\n";
$hitung[$n] = array('jumlah' => $value, 'kata' => $key);
	$n++;
	}
foreach ($hitung as $param => $row) {
    $jumlah[$param]  = $row['jumlah'];
    $kata[$param] = $row['kata'];
}
array_multisort($jumlah, SORT_DESC, $hitung);
$x=0;
$katadoang=array();
	foreach ($hitung as $param => $row){
	$katadoang[$x]=$row['kata'];
	$x++;
		}
//echo $katadoang[0];
$a2=array("serta","di","ini","itu","dia","mereka","akan","dengan","ke","kembali","untuk","com","dari","tak","tidak","dan","atau","tetapi","melainkan","padahal","sedangkan","yang","agar","supaya","biar","biarpun","jika","kalau","jikalau","asalkan","bila","manakala","sejak","semenjak","sedari","sewaktu","tatkala","ketika","sementara","begitu","seraya","selagi","selama","serta","sambil","demi","setelah","sesudah","sebelum","sehabis","selesai","seusai","hingga","sampai","andaikan","seandainya","umpamanya","sekiranya","biar","biarpun","walau","sekali","sungguh,kendati","seakan-akan","seolah-olah","sebagaimana","seperti","sebagai","laksana","ibarat","daripada","alih-alih","sebab,karena","oleh karena","oleh sebab","sehingga","sampai","maka,dengan","tanpa,bahwa");
$isuWord=array_diff($katadoang,$a2);

$q=0;
foreach($isuWord as $isuWord)
{
$kata_teratas[$q]=$isuWord;	
if ($q++ == 30) 
    break 1;
//$q++;
}
$data['Tema_wordcloud']=$temaDropdown;
$data['isuWordcloud']=$kata_teratas;
//**********************************   END TAMPIL TOP ISUE WORDCLOUD KATA  *******************************************

    //**********************************   program prioritas   *******************************************
/*
    $ambilTema = $this->data-> tampil_isi_program_prioritas();
					//echo $ambilTopTema[0]['tema_program'];
    $n=0;
    $total=0;
    foreach($ambilTema as $tema){

    		$program[$n]=$tema['tema_program'];
    	$hitungTema[$n] = $this->data-> m_programprioritas(NULL,NULL,$tema['tema_program']);
		$total=$total+$hitungTema[$n];
					//echo $hitungTema[$n]; echo '</br>';
    		//echo $n;
    		$n++;
    }
    $data['total'] = $total;
     $data['hitungtema'] = $hitungTema;
			$data['program'] = $program;
*/

    $query="SELECT distinct tema_program ,id_program,count(id_berita) as hasil
						from berita_programprioritas
						join program_prioritas on berita_programprioritas.id_program = program_prioritas.id_tema_program
						join berita3 on berita_programprioritas.id_berita = berita3.id
						group by tema_program,id_program
						order by id_program";

 	  	$prioritas= $this->data->program_prioritas($query);
     $data['p_prioritas'] = $prioritas;

// 		print_r($program_prioritas);

 		$total =0;
 		foreach($prioritas as $prioritas)
 		{
 			$total=$total+$prioritas['hasil'];
 			}

    $data['total'] = $total;

//**********************************   program prioritas   *******************************************



  //  $data['topPerson'] = $topPerson;
    //**********************************   TOP PERSON   *******************************************

    //************************************** LOGIN ************************************************
    if ($this->session->userdata('logged')<>1)
        $data['status_login']="LOGIN"; //belom login
    else{
      	$data['status_login'] = $this->session->userdata('username');
        $data['hak_akses']    = $this->session->userdata('hak_akses');
    }
    //************************************** LOGIN ************************************************

    //************************************** MEDIA PROGRAM PRIORITAS ************************************************
 	$data['media']=$this->data->media_program_prioritas($bulanKemarin,$now);
   //************************************** MEDIA PROGRAM PRIORITAS ************************************************

    $this->load->view('dashboard_baru',$data);
  }

  public function twit()
  {
    	$data2['akun'] = $this->data->ambilakun()->result();
      $data2['sosmed'] = $this->data->tampil_data_sosmed()->result();
      $this->load->view('twit',$data2);
  }

   public function twitter()
    {
    	//$data2['akun'] = $this->data->ambilakun()->result();
      //$data2['sosmed'] = $this->data->tampil_data_sosmed()->result();
      $this->load->view('medsos');
    }


  public function tamp()
  {
      $url= $this->input->get('url');
   		$data = array( 'url' => $url);

   		$data2['akun'] = $this->data->ambilakun()->result();
      $data2['sosmed'] =$this->data->tampil_data_sosmed_perakun($data)->result();

      $this->load->view('twit',$data2);
  }

  public function login()
  {
      $this->load->view('form_login');
  }

  public function maps_list_berita()
  {
    $lokasi = $this->input->get('l');
    date_default_timezone_set("Asia/Jakarta");
    $datemax = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("23:59:59"));
    $datemin = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("00:00:00"));
    //******************************** LOGIN ******************************************
    if ($this->session->userdata('logged')<>1)
        $data['status_login']="LOGIN"; //belom login
    else
        $data['status_login']=$this->session->userdata('username');
    //******************************** LOGIN ******************************************
    //******************************** BERITA ******************************************
    //hitung jumlah berita
    $jumlah_berita = $this->data->jumlah_maps_listberita($lokasi,$datemax,$datemin);

    $this->load->library('pagination');
    //$config['page_query_string'] = TRUE;
    $config['base_url']   = base_url().'index.php/data/maps_list_berita';
    //$config['suffix']     = '?l='.$lokasi;
    $config['reuse_query_string'] = TRUE;
    $config['total_rows'] = $jumlah_berita;
    $config['per_page']   = 5;

    //style
    $config['query_string_segment'] = 'start';

    $config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = 'Prev';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    //style

    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
   if($from==null)
   {
    $from=0;
   }
   else
   {
   	$from=$from;
   }
//echo $from;
    $data['berita'] = $this->data->maps_listberita($lokasi,$datemax,$datemin,$config['per_page'],$from);
 //  $hasil = $this->data->maps_listberita($lokasi,$datemax,$datemin,$config['per_page'],$from);
   
  // echo $datemax;
//   echo $datemin;
//   echo $jumlah_berita; 
//    echo $from;
    //******************************** BERITA ******************************************
    $this->load->view('maps_list_berita',$data);
  
// print_r($hasil);
  }
  public function delete()
  {
    $data = array('lokasi' => '');
    $where = array('id' => 1981);
    $this->data->m_delete($data, $where, 'berita3');
  }


  public function hitung()
  {

   // $index = strtolower($this->input->get('l'));

    //ambil seluruh daftar top person
     $ambilTema = $this->data_kalangan_terbatas->tema();
    //echo $ambilTema[0]['tema'];
    $ambilKatakunci = $this->data_kalangan_terbatas->daftar_katakunci($ambilTema[0]['id']);
     //echo $ambilKatakunci[0]['katakunci'];

    $WhereKatakunci = "select judul from berita3 where ";

      $WhereKatakunci =$WhereKatakunci."isi ILIKE '%".$ambilTema[0]['tema']."%'";
      foreach ($ambilKatakunci as $katakunci)
      {
        $WhereKatakunci = $WhereKatakunci." or isi ILIKE '%".$katakunci['katakunci']."%'";
      }

//echo $WhereKatakunci;

  $ambil_isuWorldcloud = $this->data->tampil_isuWorldcloud($WhereKatakunci);

      //echo $ambil_isuWorldcloud[0]['judul'];
			$str = NULL;
			foreach($ambil_isuWorldcloud as $judul)
			{
				$str=$str." ".$judul['judul'];
			}
//echo $str;

$string = strtolower($str);
$wordfreq = array_count_values(str_word_count($string, 1, '0'));

//print_r($word);


$hasil=array();
$n=0;
foreach ($wordfreq as $key => $value)
{ //echo $key . ':' . $value . "\n";
$hitung[$n] = array('jumlah' => $value, 'kata' => $key);
	$n++;
	}


foreach ($hitung as $param => $row) {
    $jumlah[$param]  = $row['jumlah'];
    $kata[$param] = $row['kata'];

}
array_multisort($jumlah, SORT_DESC, $hitung);

$x=0;
$katadoang=array();
	foreach ($hitung as $param => $row){
	$katadoang[$x]=$row['kata'];
	$x++;
		}
print_r($katadoang);
//echo $katadoang[0];


$a2=array("serta","di","ini","itu","dia","mereka","akan","dengan","ke","kembali","untuk","com","dari","tak","tidak","dan","atau","tetapi","melainkan","padahal","sedangkan","yang","agar","supaya","biar","biarpun","jika","kalau","jikalau","asalkan","bila","manakala","sejak","semenjak","sedari","sewaktu","tatkala","ketika","sementara","begitu","seraya","selagi","selama","serta","sambil","demi","setelah","sesudah","sebelum","sehabis","selesai","seusai","hingga","sampai","andaikan","seandainya","umpamanya","sekiranya","biar","biarpun","walau","sekali","sungguh,kendati","seakan-akan","seolah-olah","sebagaimana","seperti","sebagai","laksana","ibarat","daripada","alih-alih","sebab,karena","oleh karena","oleh sebab","sehingga","sampai","maka,dengan","tanpa,bahwa");

$isuWord=array_diff($katadoang,$a2);

	foreach ($result as $nilai){
	echo $nilai;echo '</br>';
		}

			}

}