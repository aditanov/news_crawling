<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crond_input extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      $this->load->model('M_input','data');
      $this->load->helper('url');
      date_default_timezone_set('Asia/Jakarta');
  }
/******************************************** FOLDER RSS **********************************************************/
public function sindoNews($url)
{
  $data= file_get_contents($url);
  $data= simplexml_load_string($data);
  $articles = array();
  foreach ($data->channel->item as $item) {
      $media = $item->children('http://search.yahoo.com/mrss/');
      $media = $item->children('http://search.yahoo.com/mrss/');
      $image = array();
      $url=(string)$item->link;
     	$isi=$this->bacaIsi($url,'<strong>','</div>','1',' <div id="content">');//isi
      foreach ($media->content[0]->attributes() as $key => $value) {
        $image[$key] = (string)$value;
      }

      $articles[]= array(
        'title'       => (string)$item->title,
        'link'        => $url,
        'date'        => (string)$item->pubDate,
        'creator'     => (string)$item->children('http://purl.org/dc/elements/1.1/'),
        'image'       => $image['url'],
        'isi'         => $isi,
        'location'       => NULL,
        'description' => (string)$item->description
       );
    }
    return $articles;
}

public function sindo()
{
	 $hasil=$this->sindoNews('http://nasional.sindonews.com/rss');
   foreach($hasil as $masuk){
   			$title       = $masuk['title'];
        $description = strip_tags($masuk['description']);
        $isi        = $masuk['isi'];
        $creator     = $masuk['creator'];
        $link        = $masuk['link'];
        $location    = $masuk['location'];
        $image       = $masuk['image'];
        $date        = $masuk['date'];
        $media       = "sindo";
        $id_kataKunciBerita = 0;
        $jumlah       = 0;
        //ambil keyword
        $getKeyword = $this->data->data_keyword();
        //cek kataKunci
        foreach ($getKeyword as $key) {
          if(strpos(strtolower($description),strtolower($key['katakunci']))!==FALSE || strpos(strtolower($title),strtolower($key['katakunci']))!==FALSE )
          {
            $id_kataKunciBerita = $key['id_katakunci_berita'];
            break;
          }
        }
        //data input berita
        $data = array('judul' => $title, 'isi' => $isi, 'penulis' => $creator, 'url' => $link, 'lokasi' => $location, 'gambar' => $image, 'id_katakunciberita' => $id_kataKunciBerita, 'waktu' => $date, 'media' => $media);
      $this->data->addBeritaRss($data,'berita3');

        echo $title; echo '<br>';
        echo $isi; echo '<br>';
        echo $creator; echo '<br>';
        echo $link; echo '<br>';
        echo $location; echo '<br>';
        echo $image; echo '<br>';
        echo $id_kataKunciBerita; echo '<br>';
        echo $date; echo '<br>';
        echo $media; echo '<br>';
 	}
}

public function tribunNews($link)
{
    $data= file_get_contents($link);
    $data= simplexml_load_string($data);//ada panahnya
    $articles = array();
    foreach ($data->channel->item as $item)
    {
      /*ambil gambar*/
      $media = $item->enclosure;
      $image = array();
      foreach ($media->attributes() as $key => $value)
      {
          $image[$key] = (string)$value;
      }
      /*ambil gambar*/
      /*kupas deskripsi agar tidak ada tagnya lagi*/
      $description = (string)$item->description;
      $image_description = current(explode(">", strtolower($description))).">";
      $description = str_replace($image_description, '', $description);
      /*kupas deskripsi agar tidak ada tagnya lagi*/

      $url=(string)$item->link;
      $isi=$this->bacaIsi($url,'<p>','</p>','','<div class="side-article txt-article" >');//isi
      $articles[]= array(
        'title'       => (string)$item->title,
        'link'        => $url,
        'date'        => (string)$item->pubDate,
        'description' => $isi,
        'image'       => $image['url']
       );
    }

   return $articles;
  //  print_r($articles);
}

public function tribun()
{
	 $hasil=$this->tribunNews('http://api.tribunnews.com/rss/nasional');
   foreach($hasil as $masuk){
   			$title       = $masuk['title'];
   			$link        = $masuk ['link'];
        $description = strip_tags($masuk ['description']);
        $creator     = "";
        $location    = "";
        $image       = $masuk['image'];
        $date1        = $masuk['date'];
        $media       = "tribun";
        $id_kataKunciBerita = 0;
        $jumlah       = 0;
        //ambil keyword

        $date=substr($date1,4,21);


        $getKeyword = $this->data->data_keyword();
        //cek kataKunci
        foreach ($getKeyword as $key) {
          if(strpos(strtolower($description),strtolower($key['katakunci']))!==FALSE || strpos(strtolower($title),strtolower($key['katakunci']))!==FALSE )
          {
            $id_kataKunciBerita = $key['id_katakunci_berita'];
            break;
          }
        }
        //data input berita
        $data = array('judul' => $title, 'isi' => $description, 'penulis' => $creator, 'url' => $link, 'lokasi' => $location, 'gambar' => $image, 'id_katakunciberita' => $id_kataKunciBerita, 'waktu' => $date, 'media' => $media);
      $this->data->addBeritaRss($data,'berita3');


   		   echo $title; echo '<br>';
        echo $description; echo '<br>';
        echo $creator; echo '<br>';
        echo $link; echo '<br>';
        echo $location; echo '<br>';
        echo $image; echo '<br>';
        echo $id_kataKunciBerita; echo '<br>';
        echo $date; echo '<br>';
        echo $media; echo '<br>';

   	}
}

public function republikaNews($url)
{
  $data= file_get_contents($url);
  $data= simplexml_load_string($data);
  $articles = array();
  foreach ($data->channel->item as $item) {
      $media = $item->children('http://search.yahoo.com/mrss/');
      $image = array();
      $url=(string)$item->link;
      $isi=$this->bacaIsi($url,'<p>','</p>','1',' <div class="content-detail">');//isi

      foreach ($media->content[0]->attributes() as $key => $value) {
        $image[$key] = (string)$value;
      }
      $articles[]= array(
        'title'       => (string)$item->title,
        'link'        => $url,
        'date'        => (string)$item->pubDate,
        'creator'     => (string)$item->children('http://purl.org/dc/elements/1.1/'),
        'image'       => $image['url'],
        'location'    => "",
        'isi'					=> $isi,
        'description' => (string)$item->description
       );
  }
  return $articles;
}

public function republika()
{
	 $hasil=$this->republikaNews('http://www.republika.co.id/rss/nasional');
   foreach($hasil as $masuk){
   			$title       = $masuk['title'];
   			$isi         = $masuk['isi'];
        $description = strip_tags($masuk['description']);
        $creator     = $masuk['creator'];
        $link        = $masuk['link'];
        $location    = $masuk['location'];;

        $image       = $masuk['image'];
        $date        = $masuk['date'];
        $media       = "republika";
        $id_kataKunciBerita = 0;
        $jumlah       = 0;
        //ambil keyword
        $getKeyword = $this->data->data_keyword();
        //cek kataKunci
        foreach ($getKeyword as $key) {
          if(strpos(strtolower($description),strtolower($key['katakunci']))!==FALSE || strpos(strtolower($title),strtolower($key['katakunci']))!==FALSE )
          {
            $id_kataKunciBerita = $key['id_katakunci_berita'];
            break;
          }
        }
        //data input berita
        $data = array('judul' => $title, 'isi' => $isi, 'penulis' => $creator, 'url' => $link, 'lokasi' => $location, 'gambar' => $image, 'id_katakunciberita' => $id_kataKunciBerita, 'waktu' => $date, 'media' => $media);
      $this->data->addBeritaRss($data,'berita3');

   	   echo $title; echo '<br>';
        echo $isi; echo '<br>';
        echo $creator; echo '<br>';
        echo $link; echo '<br>';
        echo $location; echo '<br>';
        echo $image; echo '<br>';
        echo $id_kataKunciBerita; echo '<br>';
        echo $date; echo '<br>';
        echo $media; echo '<br>';


   	}
}

public function Ambillokasi($isi,$awal,$akhir){
    $isi1=explode($awal, $isi);
    $isi2=explode($akhir, $isi1[1]);
    $hasil=$isi2[0];
    return $hasil;
}

public function okezoneNews($url)
{
  $data= file_get_contents($url);
  $data= simplexml_load_string($data);
  $articles = array();
  foreach ($data->channel->item as $item) {
    /*ambil gambar*/
    //$media = $item->children('http://search.yahoo.com/mrss/');
    //$image = $item->image->url;
    //$image = array();
  //  foreach ($media->content[0]->attributes() as $key => $value) {
  //    $image[$key] = (string)$value;
  //  }
    /*ambil gambar*/
    $url        = (string)$item->link;;
		$isi=$this->bacaIsi($url,'<div id="contentx" class="dtlnews">',' </div>','1','<div class="detnews">');//isi
    $lokasi=$this->Ambillokasi($isi,'<strong>','</strong>');//gambar

      $articles[]= array(
        'title'       => (string)$item->title,
        'link'        => $url,
        'creator'     => "",
        'date'        => (string)$item->pubDate,
        'image'       => (string)$item->image->url,
        'location'        => $lokasi,
        'description' => $isi
       );
    }
    return $articles;
}

public function okezone()
{
	 $hasil=$this->okezoneNews('http://sindikasi.okezone.com/index.php/rss/1/RSS2.0');
   foreach($hasil as $masuk){
   			$title       = $masuk['title'];
        $description =  strip_tags($masuk['description']);
        $creator     = $masuk['creator'];
        $link        = $masuk['link'];
        $location    = $masuk['location'];
        $image       = $masuk['image'];
        $date        = $masuk['date'];
        $media       = "okezone";
        $id_kataKunciBerita = 0;
        $jumlah       = 0;
        //ambil keyword
        $getKeyword = $this->data->data_keyword();
        //cek kataKunci
        foreach ($getKeyword as $key) {

          if(strpos(strtolower($description),strtolower($key['katakunci']))!==FALSE || strpos(strtolower($title),strtolower($key['katakunci']))!==FALSE )
          {
            $id_kataKunciBerita = $key['id_katakunci_berita'];
            break;
          }
        }
        //data input berita
        $data = array('judul' => $title, 'isi' => $description, 'penulis' => $creator, 'url' => $link, 'lokasi' => $location, 'gambar' => $image, 'id_katakunciberita' => $id_kataKunciBerita, 'waktu' => $date,'media' => $media);
      $this->data->addBeritaRss($data,'berita3');

     echo $title; echo '<br>';
        echo $description; echo '<br>';
        echo $creator; echo '<br>';
        echo $link; echo '<br>';
        echo $location; echo '<br>';
        echo $image; echo '<br>';
        echo $id_kataKunciBerita; echo '<br>';
        echo $date; echo '<br>';
        echo $media; echo '<br>';
   	}
}


public function jpnnNews($link)
{
  $data= file_get_contents($link);
  $data= simplexml_load_string($data);

  $articles = array();

  foreach ($data->channel->item as $item)
  {
      /*ambil gambar*/
      $media = $item->enclosure;
      $image = array();
      foreach ($media->attributes() as $key => $value) {
          $image[$key] = (string)$value;
      }
      /*ambil gambar*/

      $articles[]= array(
        'title'       => (string)$item->title,
        'link'        => (string)$item->link,
        'date'        => (string)$item->pubDate,
        'image'       => $image['url'],
        'creator'       => "",
        'location'    => "",
        'description' => (string)$item->description
       );
  }
  return $articles;
}


public function jpnn()
{
	 $hasil=$this->jpnnNews('http://www.jpnn.com/index.php?mib=rss&id=215');
   foreach($hasil as $masuk){
   			$title       = $masuk['title'];
        $description = strip_tags($masuk['description']);
        $creator     = $masuk['creator'];
        $link        = $masuk['link'];
        $location    = $masuk['location'];
        $image       = $masuk['image'];
        $date        = $masuk['date'];
        $media       = "jpnn";
        $id_kataKunciBerita = 0;
        $jumlah       = 0;
        //ambil keyword
        $getKeyword = $this->data->data_keyword();
        //cek kataKunci
        foreach ($getKeyword as $key) {
          if(strpos(strtolower($description),strtolower($key['katakunci']))!==FALSE || strpos(strtolower($title),strtolower($key['katakunci']))!==FALSE )
          {
            $id_kataKunciBerita = $key['id_katakunci_berita'];
            break;
          }
        }
        //data input berita
        $data = array('judul' => $title, 'isi' => $description, 'penulis' => $creator, 'url' => $link, 'lokasi' => $location, 'gambar' => $image, 'id_katakunciberita' => $id_kataKunciBerita, 'waktu' => $date, 'media' => $media);
        $this->data->addBeritaRss($data,'berita3');

     echo $title; echo '<br>';
        echo $description; echo '<br>';
        echo $creator; echo '<br>';
        echo $link; echo '<br>';
        echo $location; echo '<br>';
        echo $image; echo '<br>';
        echo $id_kataKunciBerita; echo '<br>';
        echo $date; echo '<br>';
        echo $media; echo '<br>';

   	}
}


public function detikNews($link)
{
    $data= file_get_contents($link);
    $data= simplexml_load_string($data);//ada panahnya
    $articles = array();
    foreach ($data->channel->item as $item)
    {
      /*ambil gambar*/
      $media = $item->enclosure;
      $image = array();
      foreach ($media->attributes() as $key => $value)
      {
          $image[$key] = (string)$value;
      }
      /*ambil gambar*/
      /*kupas deskripsi agar tidak ada tagnya lagi*/
      $description = (string)$item->description;
      $image_description = current(explode(">", strtolower($description))).">";
      $description = str_replace($image_description, '', $description);
      /*kupas deskripsi agar tidak ada tagnya lagi*/

      $articles[]= array(
        'title'       => (string)$item->title,
        'link'        => (string)$item->link,
        'date'        => (string)$item->pubDate,
        'creator'      => "",
        'location'      => "",
        'description' => $description,
        'image'       => $image['url']
       );
    }
   return $articles;
}

public function detik()
{
	 $hasil=$this->detikNews('http://rss.detik.com');
   foreach($hasil as $masuk){
   			$title       = $masuk['title'];
        $description = $masuk['description'];
        $creator     = $masuk['creator'];
        $link        = $masuk['link'];
        $location    = $masuk['location'];
        $image       = $masuk['image'];
        $date        = $masuk['date'];
        $media       = "detik";

        $id_kataKunciBerita = 0;
        $jumlah       = 0;
        //ambil keyword
        $getKeyword = $this->data->data_keyword();
        //cek kataKunci
        foreach ($getKeyword as $key) {
          if(strpos(strtolower($description),strtolower($key['katakunci']))!==FALSE || strpos(strtolower($title),strtolower($key['katakunci']))!==FALSE )
          {
            $id_kataKunciBerita = $key['id_katakunci_berita'];
            break;
          }
        }
        //data input berita
        $data = array('judul' => $title, 'isi' => $description, 'penulis' => $creator, 'url' => $link, 'lokasi' => $location, 'gambar' => $image, 'id_katakunciberita' => $id_kataKunciBerita, 'waktu' => $date, 'media' => $media);
        $this->data->addBeritaRss($data,'berita3');

     echo $title; echo '<br>';
        echo $description; echo '<br>';
        echo $creator; echo '<br>';
        echo $link; echo '<br>';
        echo $location; echo '<br>';
        echo $image; echo '<br>';
        echo $id_kataKunciBerita; echo '<br>';
        echo $date; echo '<br>';
        echo $media; echo '<br>';


   	}
}


public function oto()
{
  	$hasil['isi']=$this->detikNews('http://rss.detik.com');
    //$hasil['isi']=$this->bacaisi('http://www.jpnn.com/index.php?mib=rss&id=215','&gt;','- &lt;','2','<description> </description>');

/*    foreach($hasil as $masuk){
    		$title       = $masuk['title'];
        $link        = $masuk['link'];
        $date        = $masuk['date'];
        //$creator     = $hasil[0]'creator'];
        $image       = $masuk['image'];
        $description = $masuk['description'];
      $data = array('judul' => $title, 'isi' => $link, 'penulis' => $date, 'url' => $description, 'lokasi' => $date);
      $this->data->addBeritaRss($data,'nyoba');
  }*/


    $this->load->view('tes',$hasil);
}

//------------------------------------------------kompas------------------------------------------------

public function bacaHTML($url)
{
    // inisialisasi CURL
    $data = curl_init();
    // setting CURL
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_URL, $url);
    // menjalankan CURL untuk membaca isi file
    $hasil = curl_exec($data);
    curl_close($data);
    return $hasil;
}

public function bacaIsi($url,$awal,$akhir,$index,$bagian)
{
    $data = file_get_contents($url);
    $isi = explode($awal, $data);
    //$isi2=explode($akhir, $isi[$index]);
    //$hasil=$isi2[0];
    $jumdata= count($isi);// kalo tanpa div div. langsung p
    $hasil='';

    if($awal == '<p>'){
        //$jumdata = count($isi);
        for($i=1; $i<=$jumdata-1;$i++)
        {
          $isi2=explode($akhir, $isi[$i]);
          $hasil2=$isi2[0];
          $hasil=  $hasil." ".$hasil2;
        }
    /*}elseif ($awal == '<td>' && $bagian == '<br/>Penulis : <br/>') {
        $isi2=explode($akhir, $isi[2]);
        $hasil=$isi2[0];
    }elseif ($awal == '<td>' && $bagian == '<br/>Editor : <br/>') {
        $isi2=explode($akhir, $isi[4]);
        $hasil=$isi2[0];*/
    }else {
        $isi2=explode($akhir, $isi[$index]);
        $hasil=$isi2[0];
    }
    $bagian;
    $hasil = preg_replace('/href=\'/','',$hasil);
        $hasil = preg_replace('/href=/','',$hasil);
        $regex = '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@';
        //echo $string;
        $hasil= preg_replace($regex,'',$hasil);
        $hasil= preg_replace("/'/",'',$hasil);
    return $hasil;
}

public function gambar($url,$awal,$akhir)
{
    //$url='http://nasional.kompas.com/read/2016/10/10/08215091/mui.minta.masyarakat.tidak.terprovokasi.selama.pilkada.dki';
    $data=file_get_contents($url);
    //echo $data;

    //$awal='<meta property="og:image" content="';
    //$akhir='" />';

    $isi=explode($awal, $data);
    $isi2=explode($akhir, $isi[1]);

    $hasil=$isi2[0];

    return $hasil;
}



public function kompas()
{
      //mengambil data dari kompas
      $bacaHTML = $this->bacaHTML("http://www.kompas.com");
      //membuat dom dokumen
      $dom = new DomDocument();
      //mengambil html dari kompas untuk di parse
      @$dom->loadHTML($bacaHTML);
      //nama class yang akan dicari
      $classname="latest__wrap";
      //mencari class memakai dom query
      $finder = new DomXPath($dom);
      $spaner = $finder->query("//*[contains(@class, '$classname')]");

      //mengambil data dari class yang pertama
      $span = $spaner->item(0);
      //dari class pertama mengambil 2 elemen yaitu a yang menyimpan judul dan link dan span yang menyimpan tanggal
      $link =  $span->getElementsByTagName('a');
      $tanggal = $span->getElementsByTagName('span');
      $no = 0;

      //persiapkan array untuk diambil datanya
      $data =array();
          $data[] = array(
              'link' => $link->item($no)->getAttribute('href'),
              );
     foreach($data as $val)
     {
        echo $val['link'];
     }
      $url=$val['link'];//http://otomotif.kompas.com/read/2016/10/09/185555215/ford.tambah.produksi.ranger.di.thailand
        //$url=http://nasional.kompas.com/read/2016/11/03/07264431/kapolri.tegaskan.polisi.tak.lindungi.ahok;

      $judul='';$tanggal='';$isi='';$penulis='';$lokasi='';
      if(strpos($url,'nasional.kompas') || strpos($url,'regional.kompas') || strpos($url,'megapolitan.kompas') ||
        strpos($url,'internasional.kompas') || strpos($url,'olahraga.kompas') || strpos($url,'sains.kompas') || strpos($url,'bisniskeuangan.kompas')
        || strpos($url,'bola.kompas') || strpos($url,'tekno.kompas') || strpos($url,'properti.kompas') || strpos($url,'edukasi.kompas')){ //bagian entertainment
          //judul
          $judul=$this->bacaIsi($url,'<h2>','</h2>','1','<br/>Judul : <br/>');//Judul
          //tanggal
          if(strpos($url,'tekno.kompas') || strpos($url,'properti.kompas')  || strpos($url,'biz.kompas'))
              $tanggal=$this->bacaIsi($url,'<div id="content" class="kcm-date msmall grey mb2">','</div>','1','<br/>Tanggal : <br/>');//tanggal
          else
              $tanggal=$this->bacaIsi($url,'<div class="kcm-date msmall grey">','</div>','1','<br/>Tanggal : <br/>');//tanggal
          //bacaIsi($url,'');//gambar
        $isi=$this->bacaIsi($url,'<p>','</p>','','<br/>Isi : <br/>');//isi
          $penulis=$this->bacaIsi($url,'<table class="grey">','</table>','1','<br/>Penulis, Editor dan Sumber : <br/>');//penulis, editor dan sumber
      }elseif (strpos($url,'biz.kompas')) {
        $judul=$this->bacaIsi($url,'<h2>','</h2>','1','<br/>Judul : <br/>');//Judul
          //tanggal
          $tanggal=$this->bacaIsi($url,'<div class="grey small mb2">','</div>','1','<br/>Tanggal : <br/>');//tanggal
          //bacaIsi($url,'');//gambar
        $isi=$this->bacaIsi($url,'<p>','</p>','','<br/>Isi : <br/>');//isi
          $penulis="Null";
      }elseif(strpos($url,'health.kompas')){
           //judul
          $judul=$this->bacaIsi($url,'<h2>','</h2>','1','<br/>Judul : <br/>');//Judul
          //tanggal
          $tanggal=$this->bacaIsi($url,'<div id="content" class="kcm-date msmall grey mb2">','</div>','1','<br/>Tanggal : <br/>');//tanggal
        $isi=$this->bacaIsi($url,'<div class="kcm-read-text">','</div>','1','<br/>Isi : <br/>');//isi
          $penulis=$this->bacaIsi($url,'<table class="grey">','</table>','1','<br/>Penulis, Editor dan Sumber : <br/>');//penulis, editor dan sumber
      }elseif(strpos($url,'female.kompas')){
          //judul
          $judul=$this->bacaIsi($url,'<h2 class="text-pink">','</h2>','1','<br/>Judul : <br/>');//Judul
          //tanggal
          $tanggal=$this->bacaIsi($url,'<div id="content" class="kcm-date msmall grey mb2">','</div>','1','<br/>Tanggal : <br/>');//tanggal
          //bacaIsi($url,'');//gambar
        $isi=$this->bacaIsi($url,'<p>','</p>','','<br/>Isi : <br/>');//isi
          $penulis=$this->bacaIsi($url,'<table class="grey">','</table>','1','<br/>Penulis, Editor dan Sumber : <br/>');//penulis, editor dan sumber
      }elseif (strpos($url,'inside.kompas')) {
          $judul=$this->bacaIsi($url,'<a href="#">','</a>','1','<br/>Judul : <br/>');
          $tanggal=$this->bacaIsi($url,'<h5>','</5>','1','<br/>Tanggal : <br/>');
          $isi=$this->bacaIsi($url,'<p>','</p>','','<br />Isi : <br />');
          $penulis=$this->bacaIsi($url,'<div class="boxPembaca">','</div>','1','<br/>Penulis, Editor dan Sumber : <br/>');
      }elseif(strpos($url,'otomotif.kompas')){//bagian otomotif. oke. tinggal gambar
          $judul=$this->bacaIsi($url,'<h1>','</h1>','2','<br />judul : <br />');//judul. oke
          $tanggal=$this->bacaIsi($url,'<div id="content" class="kcm-date msmall grey mb2">','</div>','1','<br />Tanggal : <br />'); //tanggal
          //bacaIsi($url,'<img','>','1','<br />Gambar : <br />');//gambar belom oke
          $isi=$this->bacaIsi($url,'<p>','</p>','','<br />Isi : <br />'); //isi
          $penulis=$this->bacaIsi($url,'<div class="penulis-editor">','</div>','1','<br/>Penulis, Editor dan Sumber : <br/>');//penulis, editor dan sumber
        //  bacaIsi($url,'<td>','</td>','2','<br/>Penulis : <br/>');//penulis
        //  bacaIsi($url,'<td>','</td>','4','<br/>Editor : <br/>');//Editor
      }else {
         $judul=$tanggal=$isi=$penulis='NULL';
      }

      /*cek lokasi*/
      if($isi != 'NULL'){
        //$berita = "<b> jakarta pusat,- KOMPAS.com</b> - Dua dari empat korban insiden mobil tertimbun longsor di Jalan Kolonel Masturi,
      	//			Desa Cikahuripan, Kecamatan Lembang, Kabupaten Bandung Barat, Jawa Barat, sudah bisa dievakuasi.";
      	$kompas = current(explode(",", strtolower($isi)));
      	if(strpos(strtolower($kompas),"kompas")==false){//jika tidak terdapat kata kompas
      		$lokasi = current(explode(",", $isi));

      	}else{
      	   $lokasi = '';
      	}
      }

$gambar=$this ->gambar($url,'<meta property="og:image" content="','" />');//gambar
if ($gambar == NULL){
	$gambar = "";
}
else{
	$gambar=$gambar;
}

$media			 = "kompas";
$waktu = date("Y-m-d H:i:s");

  $id_kataKunciBerita =0;
    	      $getKeyword = $this->data->data_keyword();
        //cek kataKunci
        foreach ($getKeyword as $key) {

          if(strpos(strtolower($isi),strtolower($key['katakunci']))!==FALSE || strpos(strtolower($judul),strtolower($key['katakunci']))!==FALSE )
          {
            $id_kataKunciBerita = $key['id_katakunci_berita'];
            break;
          }
        }
        //data input berita
        $data = array('judul' => $judul, 'isi' => strip_tags($isi), 'penulis' => strip_tags($penulis), 'url' => $url, 'lokasi' => strip_tags($lokasi), 'gambar' => $gambar, 'id_katakunciberita' => $id_kataKunciBerita, 'waktu' => $waktu, 'media' => $media);
      $this->data->addBeritaRss($data,'berita3');
    	//$hasil['isi']=$this->detikNews('http://rss.detik.com');
    //$this->load->view('tes',$hasil);
     echo $judul; echo '<br>';
        echo strip_tags($isi); echo '<br>';
        echo $penulis; echo '<br>';
        echo $url; echo '<br>';
        echo strip_tags($lokasi); echo '<br>';
        echo $gambar; echo '<br>';
        echo $id_kataKunciBerita; echo '<br>';
        echo $waktu; echo '<br>';
        echo $media; echo '<br>';



    }





          	//$hasil['isi']=$this->detikNews('http://rss.detik.com');
          //$this->load->view('tes',$hasil);
}
