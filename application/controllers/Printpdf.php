<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class printpdf extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_data','data');
        $this->load->model('M_kalangan_terbatas','data_kalangan_terbatas');
        $this->load->helper('url');
        date_default_timezone_set('Asia/Jakarta');
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
        }
        //*********************************  TOP ISSUE  ******************************************
        /* KODINGAN BARU */
        //* * * * * * PROSES MENCARI 10 TOP ISSUE HARI INI
        //ambil semua tema
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
            if($ambilTopTema != 0 && $n_topTema <= 10 )
              $topTema[$n_topTema] = array( 'id_tema'    => $dataTema['id'],
                                            'tema'       => $dataTema['tema'],
                                            'total'      => $ambilTopTema,
                                            'nomor_urut' => $n_topTema);
            elseif($ambilTopTema !=0) {
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
            $n_topTema++;

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
//echo $arrayJumlah[1]['jumlah'];

        //*********************************  TOP ISSUE  ******************************************
        //********************************** 3 TOP NEWS ******************************************
        if($i==0)
           $data['listberita'] = $this->data->tampil_data_topNews($datetimemax,$datetimemin);
        //********************************** 3 TOP NEWS ******************************************
    }//tutup for

    //********************************** SEBARAN BERITA *******************************************
    $max = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("23:59:59"));
    $min = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("00:00:00"));
    $data['sebaran_berita'] = $this->data->tampil_sebaran_berita($max,$min);
    //********************************** SEBARAN BERITA *******************************************
    //**********************************   TOP PERSON   *******************************************
    $n_topPerson = 0;
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
    $data['topPerson'] = $topPerson;
    //**********************************   TOP PERSON   *******************************************
    //************************************** LOGIN ************************************************
    if ($this->session->userdata('logged')<>1)
        $data['status_login']="LOGIN"; //belom login
    else
      	$data['status_login']=$this->session->userdata('username');
    //************************************** LOGIN ************************************************
      
    
    //$this->load->view('print',$data);
  ob_start();
	
		$this->load->view('printpdfview',$data);
		$html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');

		$pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15', array(7, 0, 7, 0));

		//$pdf = new HTML2PDF('L','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Top_Isue.pdf', 'D');  
    
      
    
  }



}
