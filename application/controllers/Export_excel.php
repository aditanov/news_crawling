<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Export_excel extends CI_Controller {

  function __construct(){
        parent::__construct();
        $this->load->library('PHPExcel/PHPExcel');
        $this->load->model('M_export_excel','data_export_excel');
        $this->load->model('M_kalangan_terbatas','data_kalangan_terbatas');
        $this->load->model('M_data','data');
        $this->load->helper('url');
  }

  function export()
  {
    /////////////////////////////////// PROSES AMBIL DATA /////////////////////////////////////////
    date_default_timezone_set("Asia/Jakarta");
    $timenow = date("H:i:s");
    $time_8  = date("H:i:s", mktime(8,0,0));
    $time_11 = date("H:i:s", mktime(11,0,0));
    $time_16 = date("H:i:s", mktime(16,0,0));
    $datetimemax; $datetimemin; $issue0; $issue1; $issue2; $issue3; $issue4; $issue5; $issue6; $issue7;
    $issue8; $issue9; $issue10; $issue11; $issue12;
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

        //for($n=0; $n<count($topTema);$n++)
        for($n=0; $n<10; $n++)
        {
          if($n<count($topTema)){
            $row = $this->data->tampilTopIssue($datetimemax, $datetimemin, $whereKatakunciTema[$topTema[$n]['nomor_urut']].')');
            $arrayJumlah[$n] = array('jumlah' => $row,
                                     'id_katakunci'=> $topTema[$n]['id_tema'],
                                     'katakunci'   => $topTema[$n]['tema'],
                                     'waktu'  => $datetimemax);
          }else {
            $arrayJumlah[$n] = array('jumlah' => "-",
                                     'id_katakunci'=> "-",
                                     'katakunci'   => "-",
                                     'waktu'  => $datetimemax);
          }
        }
        ${'issue'.$i} = $arrayJumlah;
        //*********************************  TOP ISSUE  ******************************************
        //********************************** 3 TOP NEWS ******************************************
        //********************************** 3 TOP NEWS ******************************************
    }//tutup for

    //********************************** SEBARAN BERITA *******************************************
    //********************************** SEBARAN BERITA *******************************************
    //**********************************   TOP PERSON   *******************************************
    //**********************************   TOP PERSON   *******************************************

    $ambildata = $this->data_export_excel->tampil_data();

    /////////////////////////////////// END PROSES AMBIL DATA /////////////////////////////////////////
    if(count($ambildata)>0)
    {

      $objPHPExcel = new PHPExcel();
      // Set properties
      $objPHPExcel->getProperties()
                  ->setCreator("IKP-Kominfo") //creator
                  ->setTitle("Sistem Monitoring Nasional");  //file title
      //set page orientation
      $objPHPExcel->getActiveSheet()
                  ->getPageSetup()
                  ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
      $objPHPExcel->getActiveSheet()
                  ->getPageSetup()
                  ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
      //set grid
      $objPHPExcel->getActiveSheet()
                  ->setShowGridlines(true);
      //set margin
      $objPHPExcel->getActiveSheet()
                  ->getPageMargins()->setTop(0.25);
      $objPHPExcel->getActiveSheet()
                  ->getPageMargins()->setRight(0.1);
      $objPHPExcel->getActiveSheet()
                  ->getPageMargins()->setLeft(0.25);
      $objPHPExcel->getActiveSheet()
                  ->getPageMargins()->setBottom(0.1);



      $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
      $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

      $objget->setTitle('Sample Sheet'); //sheet title

      $objget->getStyle("B5:L6")->applyFromArray(
        array(
              'fill'      => array(
                                   'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                   'color' => array('rgb' => '00A8F0')),
              'font'      => array(
                                    'bold'  => true,
                                    'color' => array('rgb' => '000000')),
              'borders'   => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),
              'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
         )
      );
      /*************************************** HEADER ****************************************************/
      $objget->getStyle("B2:B3")->applyFromArray(
        array(
              'font'      => array(
                                    'bold'  => true,
                                    'size'  => 20,
                                    'color' => array('rgb' => '000000')),
              'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
         )
      );

      $objget->getStyle("B4:L4")->applyFromArray(
        array(
              'borders'=> array('top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM))
        )
      );

      $objset->mergeCells("B2:L2");
      $objset->mergeCells("B3:L3");
      $objset->setCellValue("B2","Kementerian Komunikasi dan Informatika");
      $objset->setCellValue("B3","Monitoring Issue");

      /************************************* end HEADER ****************************************************/
      /******************************** TABLE 1 TOP ISSUE ***********************************************/


      //table header
      $cols = array("B","C","D","E","F","G","H","I","J","K","L");

      // DATA HEADER
      $val = array("","1","2","3","4","5","6","7","8","9","10");

      for ($a=0;$a<11; $a++)
      {
        $objset->mergeCells("B5:B6");
        $objset->mergeCells("C5:L5");
        $objset->setCellValue($cols[$a].'6', $val[$a]);
        $objset->setCellValue("C5","Issue");

        //Setting lebar cell
        $objPHPExcel->getActiveSheet()->getColumnDimension($cols[$a])->setWidth(10); // NAMA

        $style = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,));
        $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
      }

      //coba

            /*
            Array ( [0] => Array ( [jumlah] => 4 [id_katakunci] => 2183 [katakunci] => perampokan dan pembunuhan di pulomas
            [waktu] => 2016-12-29 11:00:00 ) [1] => Array ( [jumlah] => 1 [id_katakunci] => 2192
            [katakunci] => Isu serbuan tenaga kerja china [waktu] => 2016-12-29 11:00:00 ) [2] => Array ( [jumlah] => 0
            [id_katakunci] => 2196 [katakunci] => Ledakan Tabung Gas di Cianjur [waktu] => 2016-12-29 11:00:00 )
            [3] => Array ( [jumlah] => 0 [id_katakunci] => 2208 [katakunci] => berita hoax [waktu] => 2016-12-29 11:00:00 )
            [4] => Array ( [jumlah] => 0 [id_katakunci] => 2202 [katakunci] => papua merdeka [waktu] => 2016-12-29 11:00:00 ))
            */

            $baris=7;
            for($i=0;$i<=12;$i++){
              $objset->setCellValue("B".$baris, ${"issue".$i}[0]['waktu']);
              $objset->setCellValue("C".$baris,${"issue".$i}[0]['jumlah']);
              $objset->setCellValue("D".$baris,${"issue".$i}[1]['jumlah']);
              $objset->setCellValue("E".$baris,${"issue".$i}[2]['jumlah']);
              $objset->setCellValue("F".$baris,${"issue".$i}[3]['jumlah']);
              $objset->setCellValue("G".$baris,${"issue".$i}[4]['jumlah']);
              $objset->setCellValue("H".$baris,${"issue".$i}[5]['jumlah']);
              $objset->setCellValue("I".$baris,${"issue".$i}[6]['jumlah']);
              $objset->setCellValue("J".$baris,${"issue".$i}[7]['jumlah']);
              $objset->setCellValue("K".$baris,${"issue".$i}[8]['jumlah']);
              $objset->setCellValue("L".$baris,${"issue".$i}[9]['jumlah']);
              $baris++;
            }
            $objget->getStyle("B7:L19")->applyFromArray(
                    array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));

      /*$baris=4;
      foreach ($ambildata as $frow)
      {
        //pemanggilan sesuaikan dengan nama kolom tabel
        $objset->setCellValue("B".$baris, $frow->email); //membaca data nama

        //Set number value
        $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');


        $objget->getStyle("B".$baris.":L".$baris)->applyFromArray(
                array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))
        );
        $baris++;
      }*/
      /******************************* END TABLE 1 TOP ISSUE ***********************************************/

      /*************************** TABLE 2 KETERANGAN TOP ISSUE ********************************************/
      //table header
      $cols = array("B","C");

      // DATA HEADER
      $val = array("Keterangan Issue :","");

      $objget->getStyle("B21")->applyFromArray(
        array(
              'font'=> array(
                            'bold'  => true,
                            'color' => array('rgb' => '000000')),
        )
      );


      for ($a=0;$a<2; $a++)
      {
        $objset->mergeCells("B21:G21");
        $objset->setCellValue($cols[$a].'21', $val[$a]);

        //Setting lebar cell
        $objPHPExcel->getActiveSheet()->getColumnDimension($cols[$a])->setWidth(10); // NAMA

        $style = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,));
        $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
      }

      $baris  = 22;
      foreach ($issue0 as $frow)
      {
        //pemanggilan sesuaikan dengan nama kolom tabel
        $objset->mergeCells("C".$baris.":G".$baris);
        $objset->setCellValue("B".$baris, "Issue".($baris-21)); //issue ke berapa
        $objset->setCellValue("C".$baris, $frow['katakunci']);
        //Set number value
        //$objPHPExcel->getActiveSheet()->getStyle('C21:C'.$baris)->getNumberFormat()->setFormatCode('0');
        $baris++;
      }
      //style table 2
      $objget->getStyle("B21:G".($baris-1))->applyFromArray(
        array(
              'borders'   => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),
        )
      );




      /*************************** TABLE 2 KETERANGAN TOP ISSUE ********************************************/
      $objPHPExcel->getActiveSheet()->setTitle('Monitoring Berita Online');

      $objPHPExcel->setActiveSheetIndex(0);
      $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");

      header('Content-Type: application/vnd.ms-excel'); //mime type
      header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
      header('Cache-Control: max-age=0'); //no cache

      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      $objWriter->setIncludeCharts(true);
      $objWriter->save('php://output');

    }else
      redirect('Excel');
  }

}
