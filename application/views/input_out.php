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

/*cek lokasi*/
if($isi != 'NULL'){
  //$berita = "<b> jakarta pusat,- KOMPAS.com</b> - Dua dari empat korban insiden mobil tertimbun longsor di Jalan Kolonel Masturi,
	//			Desa Cikahuripan, Kecamatan Lembang, Kabupaten Bandung Barat, Jawa Barat, sudah bisa dievakuasi.";
	$kompas = current(explode(",", strtolower($isi)));
	if(strpos(strtolower($kompas),"kompas")==false){//jika tidak terdapat kata kompas
		$lokasi = current(explode(",", $isi));
		echo $lokasi;
	}else{
		echo "kompas";
	}
}
    /*$isi = preg_replace('/href=\'/','',$isi);
        $isi = preg_replace('/href=/','',$isi);
        $regex = '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@';
        //echo $string;
        $isi= preg_replace($regex,'',$isi);
        $isi= preg_replace("/'/",'',$isi);*/
?>

<html>
  <head>
  </head>
  <body>
    <form type='hidden' name="form_data" id="form_data" action="<?php echo base_url('index.php/data/tambah_berita')?>" method="POST">
            <p><input type="hidden" name="judul" value='<?php echo $judul;?>'></input>
            </p>
            <p><input type="hidden" name="tanggal" value='<?php echo $tanggal?>'></input>
            </p><p><input type="hidden" name='isi' value='<?php echo $isi;?>'></input>
            </p><p><input type="hidden" name="penulis" value='<?php echo $penulis?>'></input>
            </p><p><input type="hidden" name="url" value='<?php echo $url?>'></input>
            <br/>
            <br/>
          </p><p><input type="submit" value="Submit" style="display:none"></input>
              </p>
        <!-- style="display:none"-->
    </form>
    <script type="text/javascript">
        window.onload=function(){
            var auto = setTimeout(function(){ autoRefresh(); }, 100);

            function submitform(){
              //alert('username');
              document.forms["form_data"].submit();
            }

            function autoRefresh(){
               clearTimeout(auto);
               auto = setTimeout(function(){ submitform(); autoRefresh(); }, 10000);
            }
        }
    </script>
  </body>
</html>
