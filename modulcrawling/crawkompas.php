<?php

/*
 * PHP PGSQL - How to insert rows into PostgreSQL table
 */

// Connecting, selecting database
$dbconn = pg_connect("host=127.0.0.1 dbname=simonas user=pgdbuser password=pgdbpass")
        or die('Could not connect: ' . pg_last_error());

// Closing connection
//pg_close($dbconn);
?>

<?php
function bacaHTML($url){
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

//mengambil data dari kompas
$bacaHTML = bacaHTML("http://www.kompas.com");
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

function bacaIsi($url,$awal,$akhir,$index,$bagian){
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


$judul='';$tanggal='';$isi='';$penulis='';
if(strpos($url,'nasional.kompas') || strpos($url,'regional.kompas') || strpos($url,'megapolitan.kompas') ||
  strpos($url,'internasional.kompas') || strpos($url,'olahraga.kompas') || strpos($url,'sains.kompas') || strpos($url,'bisniskeuangan.kompas')
  || strpos($url,'bola.kompas') || strpos($url,'tekno.kompas') || strpos($url,'properti.kompas') || strpos($url,'edukasi.kompas')){ //bagian entertainment
    //judul
    $judul=bacaIsi($url,'<h2>','</h2>','1','<br/>Judul : <br/>');//Judul
    //tanggal
    if(strpos($url,'tekno.kompas') || strpos($url,'properti.kompas')  || strpos($url,'biz.kompas'))
        $tanggal=bacaIsi($url,'<div id="content" class="kcm-date msmall grey mb2">','</div>','1','<br/>Tanggal : <br/>');//tanggal
    else
        $tanggal=bacaIsi($url,'<div class="kcm-date msmall grey">','</div>','1','<br/>Tanggal : <br/>');//tanggal
    //bacaIsi($url,'');//gambar
  $isi=bacaIsi($url,'<p>','</p>','','<br/>Isi : <br/>');//isi
    $penulis=bacaIsi($url,'<table class="grey">','</table>','1','<br/>Penulis, Editor dan Sumber : <br/>');//penulis, editor dan sumber
}elseif (strpos($url,'biz.kompas')) {
  $judul=bacaIsi($url,'<h2>','</h2>','1','<br/>Judul : <br/>');//Judul
    //tanggal
    $tanggal=bacaIsi($url,'<div class="grey small mb2">','</div>','1','<br/>Tanggal : <br/>');//tanggal
    //bacaIsi($url,'');//gambar
  $isi=bacaIsi($url,'<p>','</p>','','<br/>Isi : <br/>');//isi
    $penulis="Null";


}elseif(strpos($url,'health.kompas')){
     //judul
    $judul=bacaIsi($url,'<h2>','</h2>','1','<br/>Judul : <br/>');//Judul
    //tanggal
    $tanggal=bacaIsi($url,'<div id="content" class="kcm-date msmall grey mb2">','</div>','1','<br/>Tanggal : <br/>');//tanggal
  $isi=bacaIsi($url,'<div class="kcm-read-text">','</div>','1','<br/>Isi : <br/>');//isi
    $penulis=bacaIsi($url,'<table class="grey">','</table>','1','<br/>Penulis, Editor dan Sumber : <br/>');//penulis, editor dan sumber
}elseif(strpos($url,'female.kompas')){
    //judul
    $judul=bacaIsi($url,'<h2 class="text-pink">','</h2>','1','<br/>Judul : <br/>');//Judul
    //tanggal
    $tanggal=bacaIsi($url,'<div id="content" class="kcm-date msmall grey mb2">','</div>','1','<br/>Tanggal : <br/>');//tanggal
    //bacaIsi($url,'');//gambar
  $isi=bacaIsi($url,'<p>','</p>','','<br/>Isi : <br/>');//isi
    $penulis=bacaIsi($url,'<table class="grey">','</table>','1','<br/>Penulis, Editor dan Sumber : <br/>');//penulis, editor dan sumber
}elseif (strpos($url,'inside.kompas')) {
    $judul=bacaIsi($url,'<a href="#">','</a>','1','<br/>Judul : <br/>');
    $tanggal=bacaIsi($url,'<h5>','</5>','1','<br/>Tanggal : <br/>');
    $isi=bacaIsi($url,'<p>','</p>','','<br />Isi : <br />');
    $penulis=bacaIsi($url,'<div class="boxPembaca">','</div>','1','<br/>Penulis, Editor dan Sumber : <br/>');
}elseif(strpos($url,'otomotif.kompas')){//bagian otomotif. oke. tinggal gambar
    $judul=bacaIsi($url,'<h1>','</h1>','2','<br />judul : <br />');//judul. oke
    $tanggal=bacaIsi($url,'<div id="content" class="kcm-date msmall grey mb2">','</div>','1','<br />Tanggal : <br />'); //tanggal
    //bacaIsi($url,'<img','>','1','<br />Gambar : <br />');//gambar belom oke
    $isi=bacaIsi($url,'<p>','</p>','','<br />Isi : <br />'); //isi
    $penulis=bacaIsi($url,'<div class="penulis-editor">','</div>','1','<br/>Penulis, Editor dan Sumber : <br/>');//penulis, editor dan sumber
  //  bacaIsi($url,'<td>','</td>','2','<br/>Penulis : <br/>');//penulis
  //  bacaIsi($url,'<td>','</td>','4','<br/>Editor : <br/>');//Editor
}else {
   $judul=$tanggal=$isi=$penulis='NULL';
}
    /*$isi = preg_replace('/href=\'/','',$isi);
        $isi = preg_replace('/href=/','',$isi);
        $regex = '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@';
        //echo $string;
        $isi= preg_replace($regex,'',$isi);
        $isi= preg_replace("/'/",'',$isi);*/


//echo $judul;
//echo $tanggal;
//echo $isi ;
//echo $tanggal;
//echo $url

$query = "INSERT INTO berita1(judul, tanggal, isi, penulis, url) VALUES('" . $judul . "', '" . $tanggal . "', '" . $isi . "', '" . $penulis . "', '" . $url . "')";
        $result = pg_query($query);
        if (!$result) {
            $errormessage = pg_last_error();
            echo "Error with query: " . $errormessage;
            exit();
        }
        printf ("These values were inserted into the database - %s %s %s", $judul, $tanggal, $isi);
        pg_close();

?>


