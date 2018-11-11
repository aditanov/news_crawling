<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_rss extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      $this->config->load('media_online');
      $this->load->library('readability/Readability');
      $this->load->model('M_input');
      $this->load->model('M_kalangan_terbatas','data_kalangan_terbatas');
      $this->load->helper('url');
      date_default_timezone_set('Asia/Jakarta');
  }

  function pecah_kolom_waktu()
  {
      $daftar_berita =  $this->M_input->berita();
      foreach ($daftar_berita as $berita)
      {
        $tgl = $berita['waktu'];
        //end ganti format tanggal
        $tahun = date("Y", strtotime($tgl));
        $bulan = date("m", strtotime($tgl));
        $tanggal = date("d", strtotime($tgl));
        $jam = date("H", strtotime($tgl));
        $data_update = array('tahun' => $tahun, 'bulan' => $bulan, 'tanggal' => $tanggal, 'jam' => $jam);
        $this->M_input->update_data($data_update, array('id' => $berita['id']),'berita3' );//data, where, table
      }
  }

  function coba(){
    echo "coba";
    $arr_rss_url = $this->M_input->ambilMedia(10,10);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media1()
  {
    $arr_rss_url = $this->M_input->ambilMedia(1,20);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media2()
  {
    $arr_rss_url = $this->M_input->ambilMedia(21,40);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media3()
  {
    $arr_rss_url = $this->M_input->ambilMedia(41,60);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media4()
  {
    $arr_rss_url = $this->M_input->ambilMedia(61,80);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media5()
  {
    $arr_rss_url = $this->M_input->ambilMedia(81,100);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media6()
  {
    $arr_rss_url = $this->M_input->ambilMedia(101,120);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media7()
  {
    $arr_rss_url = $this->M_input->ambilMedia(121,140);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media8()
  {
    $arr_rss_url = $this->M_input->ambilMedia(141,160);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media9()
  {
    $arr_rss_url = $this->M_input->ambilMedia(161,180);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media10()
  {
    $arr_rss_url = $this->M_input->ambilMedia(181,200);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media11()
  {
    $arr_rss_url = $this->M_input->ambilMedia(201,220);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media12()
  {
    $arr_rss_url = $this->M_input->ambilMedia(221,240);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media13()
  {
    $arr_rss_url = $this->M_input->ambilMedia(241, 260);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media14()
  {
    $arr_rss_url = $this->M_input->ambilMedia(261,280);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media15()
  {
    $arr_rss_url = $this->M_input->ambilMedia(281, 300);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media16()
  {
    $arr_rss_url = $this->M_input->ambilMedia(301,320);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media17()
  {
    $arr_rss_url = $this->M_input->ambilMedia(321,340);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media18()
  {
    $arr_rss_url = $this->M_input->ambilMedia(341,360);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media19()
  {
    $arr_rss_url = $this->M_input->ambilMedia(361,380);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media20()
  {
    $arr_rss_url = $this->M_input->ambilMedia(381,400);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media21()
  {
    $arr_rss_url = $this->M_input->ambilMedia(401,420);
    $this->getRssFull($arr_rss_url);
  }

  function daftar_media22()
  {
    $arr_rss_url = $this->M_input->ambilMedia(421,440);
    $this->getRssFull($arr_rss_url);
  }

/*
  tidak digunakan karena memanggil semua media online sekaligus
  function daftar_media30()
  {
    $banyak_media_online = $this->M_input->daftar_media_online();//434
    $media_online_per_halaman = 50;
    $totalhalaman = ceil($banyak_media_online / $media_online_per_halaman);
    foreach(range(1, $totalhalaman) as $halaman)
    {
      $mulai_media_online = ($halaman - 1) * $media_online_per_halaman;
      $tampil_media_online = $this->M_input->ambil_media_online($media_online_per_halaman, $mulai_media_online);
      //$tampil_media_online == $arr_rss_url
     $this->getRssFull($tampil_media_online);
      //note : tapi hal ini dilakukan 1 per satu tidak sekaligus, jika satu persatu maka berita tidak
      //       diambil semua
    }
  }
*/

  function getRssFull($arr_rss_url)
  {
      $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
      $context = stream_context_create($opts);
/*
foreach ($id_berita as $id){
 $id[id]
}
*/
      foreach ($arr_rss_url as $url) {
        if ($url['cek']=='f') continue;
          print '== ['. $url['nama']."] ==\n";
          $str = file_get_contents($url['url'],false,$context);
          if (!$str) continue;
          if($url['ambil_data'] == "rss")
          { // ambil dari rss
            $xml = simplexml_load_string($str , 'SimpleXMLElement', LIBXML_NOCDATA);//$xml = simplexml_load_string($str, 'SimpleXMLElement', LIBXML_NOCDATA);
            $items = $xml->channel->item;
          }else if ($url['ambil_data'] == "idx")
          { // ambil dari idx
            $str = strip_tags($str, '<a>');
            $items = $this->AmbilIndeks($url['nama'], $str);
  	      }else continue;
          echo "<pre>";print_r($items);echo "</pre>";
          foreach ($items as $item)
                $this->AmbilBerita($url['kode'],$url['nama'], $url['isi'], $url['ambil_data'], $url['penulis'], $url['gambar'], $item);
      }
      /*
      taging tidak di lakukan sekarang di postgre karena analisis dilakukan pada hadoop
      $this->tagging_katakunci(false);//simpan tagging yang belum ada tagging
      $this->tagging_alias(false);
      $this->tagging_program(true); //tagging program dilakukan 2 kali karena tidak ada crud program.
      $this->tagging_program(false);
      $this->lokasi_berita(false);
      */
  }

  function AmbilIndeks($kode, $str)
  {
    $item = array(); $str2=$str;
    $tag = $this->config->item('media')[$kode]['tag_link'];

    for($i=0; $i<count($tag);$i++ ){
      $str=$str2;
      while(strpos($str,$tag[$i]) == true){
        $data = new stdClass(); $data->link = '';
        $delete = current(explode($tag[$i],$str)).''.$this->config->item('media')[$kode]['delete_link'];
        $end = $this->config->item('media')[$kode]['end_link'];
        $str = str_replace($delete,'',$str);
        $data->link = current(explode($end,$str));//link
        $delete = current(explode('>',$str)).'>';
        $str = str_replace($delete,'',$str);
        $data->title = current(explode('</a>',$str));//title
        if(strrpos($data->title, 'news.php')>0 || strrpos($data->title,'/')>0 || strpos($data->title,'comment')>0)
          $data->title="";
        $data->title = strip_tags($data->title);
        if(strlen($data->title)>5 && strlen($data->link)>5 && str_word_count($data->title) > 3 && strrpos($data->title,'...')==0 )
          $item[] = $data;
      }//end while
    }//end for
    return $item;
  }

  function AmbilBerita($id_media, $kode, $kodeisi, $via, $kodepenulis, $kodegambar, $rss)
  {
    global $PRG_PATH; $text; $id;
    //beriawalan
    if(isset($this->config->item('media')[$kode]['awalan_link']))
      $rss->link = $this->config->item('media')[$kode]['awalan_link'].''.$rss->link;
    elseif(isset($this->config->item('media')[$kode]['replace_awalan_link'])){
      $find = $this->config->item('media')[$kode]['replace_awalan_link']['find'];
      $replace = $this->config->item('media')[$kode]['replace_awalan_link']['replace'];
      $rss->link=str_replace($find,$replace,$rss->link);
    }

    //id berita
    if(isset($this->config->item('media')[$kode]['id_berita_via']) && $this->config->item('media')[$kode]['id_berita_via'] == 'link')
       $id = $id_media."-".call_user_func(array($this,$this->config->item('media')[$kode]['id_berita_method']),$rss->link);
    elseif(isset($this->config->item('media')[$kode]['id_berita_via']) && $this->config->item('media')[$kode]['id_berita_via'] == 'guid')
       $id = $id_media."-".call_user_func(array($this,$this->config->item('media')[$kode]['id_berita_method']),$rss->guid);
    elseif(isset($this->config->item('media')[$kode]['id_berita_via']) && $this->config->item('media')[$kode]['id_berita_via'] == 'image')
       $id = $id_media."-".call_user_func(array($this,$this->config->item('media')[$kode]['id_berita_method']),$rss->enclosure->attributes()['url']);
    elseif(isset($this->config->item('media')[$kode]['id_berita_via']) && $this->config->item('media')[$kode]['id_berita_via'] == 'id')
       $id = $id_media."-".call_user_func(array($this,$this->config->item('media')[$kode]['id_berita_method']),$id_media);
    echo "id : ".$id.'<br/><br/>';

    //cek duplikat
      //if($a == "tidak") return; jika duplikat
    //cek end duplikat
    $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
    $context = stream_context_create($opts);
    //$media = $kode;
    $htmlidx = $tgl ='';
    if($via == "idx")
       $htmlidx = file_get_contents($rss->link,false,$context);


    //waktu berita
    date_default_timezone_set("Asia/Jakarta");

    if($kode == "kompas" || $kode == "kompas-regional" || $kode == "kompas-megapolitan"){
      $delete = '<div class="kcm-date msmall grey">';
      $end  = '</div>';
    }elseif($kode == "jawapos"){
      $delete = '<div class="time-publiser-by">';
      $end = '</div>';
    }elseif ($kode == "koransindo") {
      $tgl = $this->ambildata($htmlidx, '<div class="newsdetails">','</div>');
      $delete = '<div class="newsdate">';
      $end = '</div>';
    }elseif ($kode == "rmol") {
      $delete = '<div class="newsDate">';
      $end = '</div>';
    }elseif ($kode == "malutpos" || $kode == "gatra" || $kode == "koranrakyat") {
      $delete = '<span class="itemDateCreated">';
      $end = '</span>';
    }elseif ($kode == "radarbojonegoro") {
      $delete = '<div class="page-header">';
      $end = '</div>';
    }elseif ($kode == "radarsorong") {
      $delete = '<div class="dateTxt">';
      $end = '</div>';
    }elseif ($kode == "analisa") {
      $delete = '<p class="dateNews">';
      $end = '</p>';
    }elseif ($kode == "harianandalas") {
      $delete = '<time datetime="';
      $end = '"';
    }elseif ($kode == "bantenraya") {
      $delete = '<span class="created">';
      $end = '</span>';
    }elseif ($kode == "bolavaganza") {
      $delete ='<div class="article__date">';
      $end = '</div>';
    }elseif ($kode =="detakjakarta") {
      $delete = "</div><div class='breadcrumbs'>";
      $end ='</div>';
    }elseif ($kode == "elshinta") {
      $delete = '<h3>';
      $end = '</h3>';
    }elseif ($kode == "goaceh") {
      $delete = '<div class="time" >';
      $end ='</div>';
    }elseif ($kode == "jatimpos"){
      $delete = '<dd class="modified">';
      $end = '</dd>';
    }elseif ($kode == "arah") {
      $delete = '<time datetime="';
      $end = '"';
    }elseif ($kode == "balikpapantv") {
      $delete = '<small style="color:#00AEEF;">';
      $end = '</small>';
    }elseif ($kode == "jurnalnasional") {
      $delete = '<div style="color:#717577">';
      $end = '</div>';
    }elseif($kode == "jurnalparlemen"){
      $delete = '<td align="right">';
      $end = '</td>';
    }elseif ($kode == "kabarbanten") {
      $tgl = $this->ambildata($htmlidx, '<div class="post-title">','</div>');
      $delete = '<small class="green">';
      $end = '</small>';
    }elseif ($kode == "kbr") {
      $delete = '<p class="post-time">';
      $end = '</p>';
    }elseif ($kode == "metrojambi" ) {
      $delete = '<div class="datehour">';
      $end = '</div>';
    }elseif ($kode == "modusaceh") {
      $delete = '<i class="fa fa-clock-o"></i> ';
      $end = '</time>';
    }elseif ($kode == "nusabali") {
      $delete = '<span class="month pull-left" itemprop="datePublished">';
      $end = '</span>';
    }elseif ($kode == "papuaposnabire") {
      $delete = '<dd class="published">';
      $end = '</dd>';
    }elseif ($kode == "radarbandung") {
      $delete = '<span class="date_deskrip">';
      $end = '</span>';
    }elseif ($kode == "radarbangka") {
      $delete = '<div class="content-info">';
      $end = '</div>';
    }elseif ($kode == "radarmadura" || $kode == "radarsolo" || $kode == "radarsurabaya" || $kode == "radartulungagungjawapos"){
      $tgl = $this->ambildata($htmlidx, '<div class="page-header">','</div>');
      $delete = '<div>';
      $end = '</div>';
    }elseif ($kode == "radartegal") {
      $delete = '<span class="uk-article-meta uk-margin-top"> ';
      $end = '</span>';
    }elseif ($kode == "riaugreen") {
      $delete = '<div style="float:none; margin-bottom:8px;" class="date-time">';
      $end = '</div>';
    }elseif($kode == "sinarindonesiabaru"){
      $delete = '<div style="float:left; width:250px;" class="date">';
      $end = '</div>';
    }elseif($kode == "sinartani"){
      $delete = '<div class="desc">';
      $end = '</div>';
    }elseif ($kode == "sorotkeadilan") {
      $delete = '<p style="color:#999999">';
      $end = '</p>';
    }elseif ($kode == "suarakarya") {
      $delete = '<a class="padd-ver-5 btn-default-color inblock" href="/" data-reactid="45">';
      $end = '</a>';
    }elseif ($kode == "sumbarsatu") {
      $delete = '<span class="date" style="padding-left: 10px;">';
      $end = '</span>';
    }elseif ($kode == "sumbawabaratpos") {
      $delete = '<span class="meta-date">';
      $end = '</span>';
    }elseif ($kode == "swaramanado") {
      $delete = '<span class="postdate">';
      $end = '</span>';
    }elseif ($kode == "wartasumatera") {
      $tgl = $this->ambildata($htmlidx, '<span style="float:none; width:380px; font-size:12px; font-weight:bold; text-align:right; padding-top:3px;">', '</span>');
      $delete = '(';
      $end = ')';
    }elseif($kode == "wartabuana"){
      $tgl = $this->ambildata($htmlidx, '<span class="keterangan">', '</span>');
      $delete = '|';
      $end = '|';
    }elseif ($kode == "buserkriminal") {
      $delete = '<span  class="date updated" itemprop="datePublished" content="">';
      $end = '</span>';
    }elseif($kode == "lomboksatu"){
      $delete = '<dd class="create">';
      $end = '</dd>';
    }elseif($kode == "indopos" || $kode == "beritajatim" || $kode == "covesia")
      $tgl = date("Y-m-d H:i:s");
    elseif ($kode == "batamtoday")
      $tgl = date("Y-m-d", strtotime($rss->pubDate))." ".date("H:i:s", strtotime("now"));
    elseif($kode == "chip")
      $tgl = date("Y-m-d H:i:s", strtotime($rss->pubdate));
    else
      $tgl = date("Y-m-d H:i:s", strtotime($rss->pubDate));


    //ganti format tanggal
    if($via == 'idx'){
echo "stringk".$kode;
      if($kode == "kabarbanten" || $kode == "radarmadura" || $kode == "radarsolo" || $kode == "radarsurabaya" ||
         $kode == "radartulungagungjawapos" || $kode == "wartasumatera" || $kode == "wartabuana" || $kode == "koransindo")
        $tgl = $this->ambildata($tgl, $delete,$end);//data gambar dan penulis
      else
        $tgl = $this->ambildata($htmlidx, $delete,$end);//data gambar dan penulis

      //hapus tag html
      if($kode == "jawapos" || $kode == "gatra" || $kode == "kbr" || $kode == "radartegal" || $kode == "sinartani" )
        $tgl = strip_tags($tgl);//data gambar dan penulis
      elseif ($kode == "rmol")
        $tgl = strip_tags($tgl,'<p>');
      elseif ($kode == "radarbojonegoro")
        $tgl = $this->ambildata($tgl, '<div>','</div>');
      elseif($kode == "jurnalnasional"){
        $cut_tgl = explode("|",$tgl);
        $tgl = $cut_tgl[1];
      }

      //end hapus tag html
      $cut_tgl = explode(" ",$tgl);//jadi array, index 0 hari 1 tanggal 2 bulan 3 tahun 4 | 5 jam 6 timezone
      echo "tgl:".$tgl;print_r($cut_tgl);
      //ubah bulan

      if ($kode == "koransindo")
        $tgl = date("Y-m-d", strtotime($cut_tgl[1]))." ".date("H:i:s", strtotime("10:00:00"));
      elseif($kode != 'harianandalas' && $kode !="jatimpos" && $kode != 'arah' && $kode != 'balikpapantv'){
        $bulan = strtolower($cut_tgl[2]);
        if($kode == "analisa" || $kode == "detakjakarta" || $kode == "modusaceh" || $kode == "radartegal")
          $bulan = strtolower($cut_tgl[3]);
        elseif($kode == "metrojambi" || $kode == "sorotkeadilan" || $kode == "lomboksatu")
          $bulan = strtolower($cut_tgl[4]);
        elseif($kode == "radarbandung" || $kode == "wartasumatera")
          $bulan = strtolower($cut_tgl[1]);
        elseif($kode == "radarbangka")
          $bulan = strtolower($cut_tgl[12]);

        echo "bulan".$bulan."kode".$kode;
        if($bulan== "januari") $bulan = "Jan";
        elseif($bulan== "februari") $bulan = "Feb";
        elseif($bulan== "maret") $bulan = "Mar";
        elseif($bulan== "april") $bulan = "Apr";
        elseif($bulan== "mei") $bulan = "May";
        elseif($bulan== "juni") $bulan = "Jun";
        elseif($bulan== "juli") $bulan = "Jul";
        elseif($bulan== "agustus") $bulan = "Aug";
        elseif($bulan== "september") $bulan = "Sep";
        elseif($bulan== "oktober") $bulan = "Oct";
        elseif($bulan== "september") $bulan = "Sep";
        elseif($bulan== "november") $bulan = "Nov";
        elseif($bulan== "desember") $bulan = "Dec";
      }
      //end ubah bulan
      if($kode == "jawapos" || $kode == "radarbojonegoro" || $kode == "elshinta" || $kode =="gatra" || $kode == "goaceh" ||
         $kode == "jurnalparlemen" || $kode == "koranrakyat" || $kode == "papuaposnabire" || $kode == "radarmadura" || $kode == "radarsolo" ||
         $kode == "radarsurabaya" || $kode == "radartulungagungjawapos")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[1]." ".$bulan." ".$cut_tgl[3]." ".$cut_tgl[4]));
      elseif ($kode == "malutpos")
        $tgl = date("Y-m-d", strtotime($cut_tgl[6]." ".$cut_tgl[5]." ".$cut_tgl[7]))." ".date("H:i:s", strtotime("now"));
      elseif ($kode == "analisa")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[2]." ".$bulan." ".$cut_tgl[4]." ".$cut_tgl[7]));
      elseif ($kode == "harianandalas")
        $tgl = date("Y-m-d H:i:s", strtotime(str_replace('T',' ',$tgl)));
      elseif ($kode == "detakjakarta" || $kode == "radartegal")
        $tgl = date("Y-m-d", strtotime($cut_tgl[2]." ".$bulan." ".$cut_tgl[4]))." ".date("H:i:s", strtotime("now"));
      elseif ($kode == "jatimpos")
        $tgl = date("Y-m-d", strtotime(str_replace('.','-',$cut_tgl[15])))." ".date("H:i:s", strtotime("now"));
      elseif($kode == "arah")
        $tgl = date("Y-m-d", strtotime($cut_tgl[0]))." ".date("H:i:s", strtotime($cut_tgl[1]));
      elseif ($kode == "balikpapantv" || $kode == "swaramanado")
        $tgl = date("Y-m-d", strtotime(str_replace('/','-',$cut_tgl[0])))." ".date("H:i:s", strtotime("now"));
      elseif ($kode == "sumbarsatu")
        $tgl = date("Y-m-d", strtotime(str_replace('/','-',$cut_tgl[1])))." ".date("H:i:s", strtotime($cut_tgl[2]));
      elseif ($kode == "jurnalnasional" || $kode == "kbr")
        $tgl = date("Y-m-d", strtotime(str_replace('/','-',$cut_tgl[2])))." ".date("H:i:s", strtotime($cut_tgl[3]));
      elseif ($kode == "kabarbanten")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[0]." ".$cut_tgl[1]." ".$cut_tgl[2]." ".$cut_tgl[4]));
      elseif ($kode == "metrojambi")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[3]." ".$bulan." ".$cut_tgl[5]." ".$cut_tgl[7]));
      elseif ($kode == "lomboksatu")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[3]." ".$bulan." ".$cut_tgl[5]." ".$cut_tgl[6]));
      elseif ($kode == "modusaceh")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[2]." ".$bulan." ".$cut_tgl[4]." ".$cut_tgl[0]));
      elseif ($kode == "nusabali" || $kode == "suarakarya")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[0]." ".$cut_tgl[1]." ".$cut_tgl[2]." ".$cut_tgl[3]));
      elseif($kode == "radarbandung")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[0]." ".$bulan." ".str_replace(',','',$cut_tgl[2])." ".$cut_tgl[3]));
      elseif($kode == "radarbangka")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[11]." ".$bulan." ".$cut_tgl[13]." ".$cut_tgl[14]));
      elseif ($kode == "sinartani")
        $tgl = date("Y-m-d", strtotime($cut_tgl[4]))." ".date("H:i:s", strtotime($cut_tgl[0]));
      elseif ($kode == "sorotkeadilan")
        $tgl = date("Y-m-d", strtotime($cut_tgl[3]." ".$bulan." ".$cut_tgl[5]))." ".date("H:i:s", strtotime("now"));
      elseif ($kode == "sumbawabaratpos" || $kode == "buserkriminal" )
        $tgl = date("Y-m-d", strtotime(str_replace(',','',$cut_tgl[1])." ".$cut_tgl[0]." ".str_replace('by','',$cut_tgl[2])))." ".date("H:i:s", strtotime("now"));
      elseif($kode == "wartasumatera")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[0]." ".$bulan." ".$cut_tgl[2]." ".$cut_tgl[4]));
      elseif($kode != "koransindo" || $kode == "radarsorong" || $kode == "bantenraya")
        $tgl = date("Y-m-d H:i:s", strtotime($cut_tgl[1]." ".$bulan." ".$cut_tgl[3]." ".$cut_tgl[5]));
    }
    //end ganti format tanggal
    $tahun = date("Y", strtotime($tgl));
    $bulan = date("m", strtotime($tgl));
    $tanggal = date("d", strtotime($tgl));
    $jam = date("H", strtotime($tgl));


    //end waktu

    //judul
    $title = strip_tags($rss->title);
    //end judul

    //url
    if($kode == "batamtoday"){
      $rss->link = str_replace('detail_berita.php?id=','berita',$rss->link).str_replace(' ','-',$title);
    }
    //end url

    $berita_id = str_replace(" ","",$kode."".$title.".".$tgl);

    // cek sudah ada di cache --
    $file = './temp/'. $berita_id. '.html';
    if (file_exists($file)) $html = file_get_contents($file,false,$context);
    else {
      $html = file_get_contents($rss->link,false,$context);//1 halaman yang sesuai urlnya
      if (!$html) return;
      $html = $this->IntRapiHtml($html);
    }

    //$kode = $media;
    //isi berita
    if($kodeisi == '1')
      $text = strip_tags($rss->children('http://purl.org/rss/1.0/modules/content/'));
    elseif($kodeisi == '2')
      $text = strip_tags($rss->description);
    else{
      $readability = new Readability($html, $rss->link);
      $readability->lightClean = false;
      if (!$readability->init()) return;
      $text = $this->IntRapiHtml($readability->getContent()->innerHTML);
    }

    if($kode == "sindonews" || $kode == "kupangpos"){
      $delete = current(explode("</p>", $text))."</p>";
      $text = str_replace($delete,'',$text);
    }elseif($kode == "ambonexpres"){
      $delete = current(explode("<p><strong>", $text));
      $text = str_replace($delete,'',$text);
    }elseif($kode == "paluexpress") {
      $delete = current(explode("</p>", $text));
      $text = str_replace($delete,'',$text);
    }elseif ($kode == "tempo") {
      $delete = current(explode("</div>",$text));
      $text = str_replace($delete, '', $text);
    }elseif ($kode == "koransindo") {
      $delete = explode("</p>",$text);
      $text = str_replace($delete[0].'</p>'.$delete[1].'</p>','',$text);
      $text = str_replace('Tweet ','',strip_tags($text));
    }elseif ($kode == "analisa") {
      $delete = current(explode("</p>",$text));
      $text = str_replace($delete,'',$text);
    }elseif ($kode == "bandarlampungnews" || $kode == "bolavaganza") {
      $delete = current(explode('<p><strong>',$text));
      $text = str_replace($delete,'',$text);
    }elseif ($kode == "bantenraya") {
      $delete = current(explode('</span>',$text));
      $text = str_replace($delete, '',$text);
    }elseif ($kode == "borneonews") {
      $delete = current(explode('<b>',$text));
      $text = str_replace($delete, '',$text);
    }elseif ($kode == "jatimpos") {
      $delete = current(explode('JATIMPOS.CO/',$text)).'JATIMPOS.CO/';
      $text = str_replace($delete, '',$text);
    }
    $text = strip_tags($text);
    //end isi berita

    //penulis berita
    //$kode= $media;
    $penulis = "anonim";//okezone
    if($kodepenulis == '1')
          $penulis = strip_tags($rss->children('http://purl.org/dc/elements/1.1/'));
    elseif($kodepenulis == '2'){
          $penulis = strip_tags($rss->author);
          $penulis = str_replace('antarafoto/','',$penulis);
    }elseif ($kodepenulis == '3') {
      if($kode == "lampungpos") {
            $penulis = current(explode("penulis",strtolower($text)))."penulis";
            $penulis = str_replace(strtolower($penulis),'',strtolower($text));
            $penulis = current(explode("editor",$penulis));
            $penulis = substr($penulis, 3);
      }elseif($kode == "kompas" || $kode == "kompas-regional" || $kode == "kompas-megapolitan")
        $penulis = $this->ambildata($htmlidx, 'Penulis</td><td>: ','</td>');//data gambar dan penulis
      elseif ($kode == "tempo") {
        $penulis = explode(".",$text);
        $penulis = end($penulis);
      }elseif ($kode == "rmol")
        $penulis = $this->ambildata($htmlidx, "<b>LAPORAN</b>:", "</p>");
      elseif ($kode == "bolavaganza")
        $penulis = $this->ambildata($htmlidx, '<li><span>Penulis</span>: ', '</li>');
      elseif ($kode == "arah")
        $penulis = $this->ambildata($text, 'Penulis:', 'Arah');
      elseif ($kode == "kbr")
        $penulis = $this->ambildata($htmlidx, '<i>Oleh :</i> ', '</h3>');
      elseif($kode == "metrojambi")
        $penulis = $this->ambildata($htmlidx, 'Penulis: <b><i>', '</i>');
      elseif ($kode == "sinartani") {
        $penulis = $this->ambildata($htmlidx, '<div class="desc">', '</div>');
        $penulis = $this->ambildata($penulis, 'Penulis : ', '</a>');
      }elseif ($kode == "suarakarya") {
        $penulis = $this->ambildata($htmlidx, '<div class="media-right media-middle" data-reactid="143">', '</div>');
        $penulis = $this->ambildata($penulis, '<strong class="color-primary" data-reactid="146">', '</strong>');
      }elseif($kode == "wartabuana"){
        $penulis = $this->ambildata($htmlidx, '<span class="keterangan">', '</span>');
        $penulis = $this->ambildata($penulis,'','|');
      }
    }


    $penulis = strip_tags($penulis);
    if(str_word_count($penulis)>5 || strlen($penulis)<2) $penulis ='anonim';
    //end penulis

    //gambar berita
    $gambar="";
    if($kodegambar == '1')
       $gambar = $rss->image->url;
    elseif(($kodegambar == '2')&& $rss->enclosure) {
      $gambar = $rss->enclosure->attributes();
      $gambar = $gambar['url'];
    }elseif($kodegambar == '3'){
      $gambar = $rss->children('http://search.yahoo.com/mrss/')->content[0]->attributes();
      $gambar = $gambar['url'];
    }elseif (($kodegambar == '4') && $rss->children('http://search.yahoo.com/mrss/')->content[1]) {
      $gambar = $rss->children('http://search.yahoo.com/mrss/')->content[1]->attributes();
      $gambar = $gambar['url'];
    }elseif ($kodegambar == '5') {
      $htmlidx = $rss->children('http://purl.org/rss/1.0/modules/content/');
      $gambar = $this->ambildata($htmlidx,'src="','"');
    }elseif($kodegambar == '6'){
      $gambar = current(explode('src="',$rss->description)).'src="';
      $gambar = str_replace($gambar,'',$rss->description);
      $gambar = current(explode('"',$gambar));
    }elseif($kodegambar == '7'){
      $gambar = current(explode("src='",$rss->description))."src='";
      $gambar = str_replace($gambar,'',$rss->description);
      $gambar = current(explode("'",$gambar));
    }elseif ($kodegambar == '8') {
      $gambar = $rss->description;
      $gambar = str_replace('<img src=','',$gambar);
      $gambar = current(explode(' ',$gambar));
    }elseif($kodegambar == '0'){
        if ($kode == "kompas" || $kode == "kompas-regional" || $kode =="kompas-megapolitan")
          $gambar = $this->ambildata($htmlidx, '<img data-width="780px" data-aligment=""  src="', '"');
        elseif ($kode == "jawapos")
          $gambar = $this->ambildata($htmlidx, '<img class="img-responsive" src="', '"');
        elseif($kode == "rmol")
          $gambar = $this->ambildata($htmlidx, '<div class="wp-caption aligncenter"><a href="', '"');
        elseif ($kode == "malutpos" || $kode == "koranrakyat") {
          $gambar = $this->ambildata($htmlidx, '<span class="itemImage">', '<span>');
          $gambar = "http://portal.malutpost.co.id".$this->ambildata($gambar, '<img src="', '"');
        }elseif($kode == "radarbojonegoro")
          $gambar = $this->ambildata($htmlidx, 'img-thumbnailx" src="','"')[0];
        elseif ($kode == 'radarsorong')
          $gambar = $this->ambildata($htmlidx, '<img width="1000" height="606" alt="" src="', '"');
        elseif ($kode == "analisa") {
          $gambar = $this->ambildata($htmlidx,'<div class="image mainImage">','</div>');
          $gambar = $this->ambildata($gambar,'src="','"');
        }elseif ($kode == "harianandalas") {
          $gambar = $this->ambildata($htmlidx,'<span class="easy_img_caption"','</span>');
          $gambar = 'http://harianandalas.com'.$this->ambildata($gambar, 'src="','"');
        }elseif ($kode == "bantenraya")
          $gambar = 'http://bantenraya.com'.$this->ambildata($htmlidx,'<img class="caption" src="','"');
        elseif ($kode == "bolavaganza")
          $gambar = 'http://bantenraya.com'.$this->ambildata($htmlidx,'<div class="photo__item"> <img src="','"');
        elseif ($kode=="detakjakarta")
          $gambar = 'http://bantenraya.com'.$this->ambildata($htmlidx,"<img width='320' src='","'");
        elseif ($kode =="elshinta")
          $gambar = $this->ambildata($htmlidx,'<img id="bigimg" src="','"');
        elseif ($kode == "gatra"){
          $gambar = $this->ambildata($htmlidx,'<img class="pull-left"','/>');
          $gambar = $this->ambildata($gambar,'src="','"');
        }elseif ($kode == "goaceh") {
          $gambar = $this->ambildata($htmlidx,'<td><img src="','"');
          $gambar = $this->ambildata($gambar,'src="','"');
        }elseif ($kode == "jatimpos") {
          $gambar = $this->ambildata($htmlidx,'<div class="img-fulltext pull-right">','</div>');
          $gambar = 'http://www.jatimpos.co'.$this->ambildata($gambar,'src="','"');
        }elseif ($kode == "arah"){
          $gambar = $this->ambildata($htmlidx,'<figure>','</figure>');
          $gambar = $this->ambildata($gambar,'src="','"');
        }elseif ($kode == "jurnalnasional") {
          $gambar = $this->ambildata($htmlidx, '<div class="m">','</div>');
          $gambar = $this->ambildata($gambar, 'src="','"');
        }elseif ($kode == "jurnalparlemen")
          $gambar = $this->ambildata($htmlidx,'h6><img src="','"');
        elseif($kode == "kbr"){
          $gambar = $this->ambildata($htmlidx,'<div class="post-main-image">','</div>');
          $gambar = $this->ambildata($gambar,'src="','"');
        }elseif($kode == "metrojambi"){
          $gambar = $this->ambildata($htmlidx, '<div class="panel-block left">', '</div>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif($kode == "modusaceh") {
          $gambar = $this->ambildata($htmlidx, '<figure>', '</figure>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif ($kode == "nusabali"){
          $gambar = $this->ambildata($htmlidx, "<li itemprop='image' itemscope='itemscope' itemtype='https://schema.org/ImageObject'>", '</li>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif ($kode == "radarbandung") {
          $gambar = $this->ambildata($htmlidx, '<div id="gbr_detail">', '</div>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif($kode == "radarbangka"){
          $gambar = $this->ambildata($htmlidx, '<div class="thumbDetail">','</div>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif($kode == "radarmadura" || $kode == "radarsolo" || $kode == "radarsurabaya" || $kode == "radartulungagungjawapos" ){
          $gambar = $this->ambildata($htmlidx, '<div style="position:relative;width:100%; height:auto;">', '</div>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif ($kode == "riaugreen") {
          $gambar = $this->ambildata($htmlidx, '<div style="width:auto;">', '</div>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif ($kode == "sinarindonesiabaru") {
          $gambar = $this->ambildata($htmlidx, '<div class="img_details">', '</div>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif ($kode == "sorotkeadilan")
          $gambar = $this->ambildata($htmlidx, '<div class="span8"> <img src="', '"');
        elseif($kode == "suarakarya"){
          $gambar = $this->ambildata($htmlidx, '<p data-reactid="97">', '</p>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif ($kode == "sumbarsatu")
          $gambar = $this->ambildata($htmlidx, '<img class="img-responsive" src="', '"');
        elseif($kode == "swaramanado")
          $gambar = $this->ambildata($htmlidx, '<img class="size-medium wp-image-48086 alignleft" src="', '"');
        elseif($kode == "wartasumatera"){
          $gambar = $this->ambildata($htmlidx, '<div id="news-list-detail">','</div>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif($kode == "wartabuana"){
          $gambar = $this->ambildata($htmlidx, '<div class="isi_berita">', '</div>');
          $gambar = $this->ambildata($gambar, 'src="', '"');
        }elseif($kode == "buserkriminal")
          $gambar = $this->ambildata($htmlidx, '<img class=" size-medium wp-image-9795 alignleft" src="','"');
      }

    if(strpos($gambar,' ') == true && $kode != "radarbojonegoro" && $kode != 'radarsorong' && $kode != "bantenraya" &&
      $kode != "radarmadura" && $kode != "radarsolo" && $kode != "wartabuana" && $kode != "detakbanten")
      $gambar="";
    //if(strrpos($gambar,' ') > 0) $gambar="";
    //end gambar


    //bagian baca juga:
    $bag_baca_juga = array();
//    $bag_baca_juga = array('(Baca','Baca juga','BACA JUGA:', 'Respon Anda', 'The post', 'Posting', 'Penulis',
//                          'Incoming search terms', 'Posting','Related');//baca -> detik okezone
    if($kode == "ambonexpres" || $kode == "paluexpress") $bag_baca_juga = array('BACA JUGA:');//baca -> detik okezone
    if($kode == "koransindo") $bag_baca_juga = array();
    //$bag_baca_juga = array('Incoming search terms');
    //hapus bagian baca juga:
//    if($kode != "ambonexpres"){
    for($i = 0; $i< count($bag_baca_juga); $i++){
      while(strpos(strtolower($text),strtolower($bag_baca_juga[$i]))){
        $baca_juga = current(explode($bag_baca_juga[$i], $text)); //ambil text sebelum kata baca juga. cth jakarta  - .... .hingga bertemu dengan kata (Baca juga)
        $baca_juga = str_replace($baca_juga,'', $text); //hapus text sebelum kata baca juga. cth (baca juga:  ...)
        if($i==0) $baca_juga = current(explode(")", $baca_juga)).")";
        if($i==2) $baca_juga = current(explode(".",$baca_juga)).".";
        $text = str_replace($baca_juga,'', $text);
      }
    }
//  }
    //end hapus bagian baca juga:

  if(strpos($text,'���') != true || str_word_count($text) > 3){
    echo "<br/><br/>221///////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br/><br/>";
    //echo "<br/>id : <br/>".$id;
    echo "<br/>judul : <br/>".$id;
    echo "<br/>judul : <br/>".$title;
    echo "<br/>isi : <br/>".$text;
    echo "<br/><br/>penulis : <br/>".$penulis;
    echo "<br/>url : <br/>".$rss->link;
    echo "<br/>gambar : <br/>".$gambar;
    echo "<br/>waktu : <br/>".$tgl;
    echo "<br/>media : <br/>".$id_media;
    echo "<br/>tahun : <br/>".$tahun;
    echo "<br/>bulan : <br/>".$bulan;
    echo "<br/>tanggal : <br/>".$tanggal;
    echo "<br/>jam : <br/>".$jam;
    echo "<br/><br/>///////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br/><br/>";

    //sebelum simpan. cek dulu. jika judul, link, isi, dan  tanggal kosong maka jangan di input
    $dataInsert = array('id' => $id, 'judul' => $title, 'isi' => $text, 'penulis' => $penulis, 'url' => $rss->link, 'gambar' => $gambar,
                        'waktu' => $tgl, 'id_media' => $id_media, 'tahun' => $tahun, 'bulan' => $bulan, 'tanggal' => $tanggal,
                        'jam' => $jam);
    $this->M_input->add_data($id, $dataInsert,'berita3');
/*    $this->M_input->add_data('berita3', $id, $title, $text, $penulis,
                              $rss->link, $gambar, $tgl, $id_media, $tahun,
                              $bulan, $tanggal, $jam);*/
    }
  }

  //***************************************** proses tagging ***************************************************
  function tagging_katakunci($tag_katakunci)
  {
    $daftar_katakunci = $this->M_input->ambil_katakunci();
    foreach ($daftar_katakunci as $katakunci)
    {
      $daftar_berita = $this->M_input->ambil_berita_katakunci($tag_katakunci,"LOWER(isi) LIKE '%".$katakunci['katakunci']."%'
                                    OR LOWER(judul) LIKE '%".$katakunci['katakunci']."%'");
      foreach ($daftar_berita as $berita)
      {
        $cek_berita3_katakunci = $this->M_input->cek_berita3_katakunci($berita['id'],$katakunci['id_katakunci_berita']);
        if($cek_berita3_katakunci >= 1) continue;
        $dataInsert = array('id_berita' => $berita['id'], 'id_katakunci' => $katakunci['id_katakunci_berita']);
        $this->M_input->insert_data($dataInsert, 'berita3_katakunci');
        $this->M_input->update_data(array('tag_katakunci' => true), array('id' => $berita['id']),'berita3' );//data, where, table
      }
    }
  }
  //note : proses tagging ini sama seperti proses tagging pada fungsi C_kalangan_terbatas->tagging_katakunci

  function tagging_alias($tag_alias)
  {
    $daftar_alias = $this->M_input->ambil_alias();
    foreach ($daftar_alias as $alias)
    {
      $daftar_berita = $this->M_input->ambil_berita_alias($tag_alias,"LOWER(isi) LIKE '%".$alias['alias_person']."%'
                                    OR LOWER(judul) LIKE '%".$alias['alias_person']."%'");
      foreach ($daftar_berita as $berita)
      {
        $cek_berita3_alias = $this->M_input->cek_berita3_alias($berita['id'],$alias['id_alias_person']);
        if($cek_berita3_alias >= 1) continue;
        $dataInsert = array('id_berita' => $berita['id'], 'id_alias' => $alias['id_alias_person']);
        $this->M_input->insert_data($dataInsert, 'berita_aliasperson');
        $this->M_input->update_data(array('tag_alias' => true), array('id' => $berita['id'])  ,'berita3' );//data, where, table
      }
    }
  }
  //note : proses tagging ini sama seperti proses tagging pada fungsi get_rss->tagging_alias

  function tagging_program($tag_program)
  {
    $daftar_program = $this->M_input->ambil_program();
    foreach ($daftar_program as $program)
    {
      $daftar_berita = $this->M_input->ambil_berita_program($tag_program,"LOWER(isi) LIKE '%".$program['tema_program']."%'
                                    OR LOWER(judul) LIKE '%".$program['tema_program']."%'");
      foreach ($daftar_berita as $berita)
      {
        $cek_berita_program = $this->M_input->cek_berita_program($berita['id'],$program['id_tema_program']);
        if($cek_berita_program >= 1) continue;
        $dataInsert = array('id_berita' => $berita['id'], 'id_program' => $program['id_tema_program']);
        $this->M_input->insert_data($dataInsert, 'berita_programprioritas');
        $this->M_input->update_data(array('tag_program' => true), array('id' => $berita['id'])  ,'berita3' );//data, where, table
      }
    }
  }
  //note: tagging dilakukan dengan memanggil key untuk tagging dan di cocokkan dengan berita pada database
  //      jika proses pengambilan dilakukan terlebih dahulu maka akan terjadi error karena pada isi / judul
  //      berita bisa terdapat ' dan "

  function lokasi_berita($tag_lokasi)
  {
    $daftar_berita = $this->M_input->daftar_berita($tag_lokasi);
    $daftar_kabupaten = $this->M_input->daftar_kabupaten();
    foreach ($daftar_berita as $berita)
    {
      $id_kabupaten = $id_provinsi = 0;
      foreach ($daftar_kabupaten as $kabupaten)
      {
        if(strrpos(strtolower($berita['isi']),strtolower(' '.$kabupaten['nama'].' ')) !== false)
        {
          $id_provinsi = $kabupaten['id_provinsi'];
          $id_kabupaten = $kabupaten['id'];
          $dataInsert = array('id_berita' => $berita['id'], 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabupaten);
          $this->M_input->insert_data($dataInsert, 'berita_lokasi');
          $this->M_input->update_data(array('tag_lokasi' => true), array('id' => $berita['id'])  ,'berita3' );//data, where, table
          break;
        }
      }

      if($id_provinsi != 0) continue;

      $daftar_provinsi = $this->M_input->daftar_provinsi();
      foreach ($daftar_provinsi as $provinsi)
      {
        if(strrpos(strtolower($berita['isi']),strtolower(' '.$provinsi['nama'].' ')) !== false)
        {
          $id_provinsi = $provinsi['id'];
          $dataInsert = array('id_berita' => $berita['id'], 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabupaten);
          $this->M_input->insert_data($dataInsert, 'berita_lokasi');
          $this->M_input->update_data(array('tag_lokasi' => true), array('id' => $berita['id'])  ,'berita3' );//data, where, table
          break;
        }
      }
    } //end foreach daftar berita
  //end fungsi
  }

  //***************************************** proses tagging ***************************************************
  //************************************** proses ambil id berita **********************************************
  function id_berita_method_A($id)
  { //$id merupakan url/guid
    $id = explode('/',$id);
    $id = $id[count($id)-2]; //id baru judul // guid
    return $id;
  }

  function id_berita_method_B($id)
  {
    $id = explode('/',$id); // guid
    $id = $id[4];
    return $id;
  }

  function id_berita_method_C($id)
  {
    $id = explode('/',$id); // guid
    $id = end($id);
    return $id;
  }

  function id_berita_method_D($id)
  {
    $id = explode(' ',$id); //guid
    $id = $id[0];
    return $id;
  }

  function id_berita_method_E($id)
  {
    $id = explode('-',$id); //guid
    $id = end($id);
    return $id;
  }

  function id_berita_method_F($id)
  {
    $id = explode('/',$id);
    $id = explode('-',end($id)); //guid
    $id = $id[0];
    return $id;
  }

  function id_berita_method_G($id)
  {
    $id = explode('/',$id); //guid
    $id = str_replace("?p=",'',end($id));
    return $id;
  }

  function id_berita_method_H($id)
  {
    $id = explode('/',$id);
    $id = $id[count($id)-3];
    return $id;
  }

  function id_berita_method_I($id)
  {
    $id = explode('/',$id);
    $id = explode('-',end($id)); //link
    $id = $id[1];
    return $id;
  }

  function id_berita_method_J($id)
  {
    $id = explode('/',$id);
    $id = explode('-',end($id)); //link
    $id = end($id);
    return $id;
  }

  function id_berita_method_K($id)
  {
    $id = explode('/',$id); //link
    $id = str_replace("news.php?r=",'',end($id));
    $id = str_replace("detail_berita.php?id=",'',$id);
    $id = str_replace("&n=",'',$id);
    $id = str_replace('-','',$id);
    $id = str_replace('&date=','',$id);
    return $id;
  }

  function id_berita_method_L($id)
  {
    $id = explode('/',$id);
    $id = $id[count($id)-4]; //id baru judul // guid
    return $id;
  }

  function id_berita_method_M($id)
  {
    $id = explode('/',$id);
    $id = $id[count($id)-5]; //id baru judul // guid
    return $id;
  }

  function id_berita_method_N($id)
  {
    $id = explode('/',$id);
    $id = explode('&',end($id)); // guid
    $id = explode('-',end($id));
    $id = str_replace('i=','',$id[0]);
    return $id;
  }

  function id_berita_method_O($id)
  {
    $id = explode('/',$id);
    $id = explode('.',end($id));
    $id = $id[1];
    return $id;
  }

  function id_berita_method_P($id)
  {
    $id = explode('/',$id);
    $id = explode('.',end($id));
    $id = $id[1];
    return $id;
  }

  function id_berita_method_Q($id)
  {
    $id = explode('/', $id);
    $id = explode('=',end($id));
    $id = current(explode(' ',end($id)));
    $id = $id;
    return $id;
  }
  function id_berita_method_R($id){
    $id = explode('_',$id);
    $id = explode('.',end($id));
    $id = $id[0];
    return $id;
  }

  function id_berita_method_S($id){
    $query_berita = $this->M_input->ambil_id_terakhir($id);
    $id = 0;
    foreach ($query_berita as $id_berita)
    {
     $id= explode('-',$id_berita['id']);
     $id= end($id);
    }
    return $id+1;
  }

  //************************************** proses ambil id berita **********************************************


  function ambildata($html, $delete, $end)
  {
    //fungsi yang digunakan untuk mengambil penulis dan gambar
    $data ="";
    if(strrpos($html,$delete) >0){
      echo "<br>stringambildata<br>";
      $delete = current(explode($delete,$html)).''.$delete;
      $html = str_replace($delete,'',$html);
//  echo "s<br>gambar : <br>".$data;
      $data = current(explode($end,$html));
//  echo "<br>gambar : <br>".$data;
    }
    return $data;
  }

  function IntRapiHtml($str)
  {
    // Note: PHP Readability expects UTF-8 encoded content.
    $conf = array('wrap'=>0, 'tab-size'=>2, 'output-html'=>true,
    'show-body-only'=>true, 'vertical-space'=>true); //, 'newline'=>'LF');
    $tidy = tidy_parse_string($str, $conf, 'utf8');
    $tidy->cleanRepair();
    return $tidy->value;
  }

}
?>
