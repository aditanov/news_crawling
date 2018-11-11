<?php 
/*
$ci = get_instance()->config; // CI_Loader instance

if ($ci->config['debug'] == true) {
    $this->output->enable_profiler(true);
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Informasi Nasional</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
    <link rel="icon" href="<?php echo base_url().'assets/images/logo_kominfo.png'?>" type="image/gif">
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">

    <!-- end Bootstrap Core CSS -->

    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/small-business.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dashboard_baru.css'?>" rel="stylesheet">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!--end Custom CSS-->

    <!--javascript-->
<!----><!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
-->
<script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

<!--
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
-->
    <script src="<?php echo base_url().'assets/js/jquery.awesomeCloud-0.2.js'?>"></script>
    <script src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
    <!--end javascript-->

    <script>
      webshims.setOptions('waitReady', false);
      webshims.setOptions('forms-ext', {types: 'date'});
      webshims.polyfill('forms forms-ext');
    </script>
    <script type="text/javascript"><!--
      google_ad_client = "ca-pub-2783044520727903";
      /* jQuery_demo */
      google_ad_slot = "2780937993";
      google_ad_width = 728;
      google_ad_height = 90;
      //-->
    </script>
    <!-- ********<script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
    -->

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>

</head>
<!-- ********************************* DATA GRAFIK 10 TOP ISSUE ****************************************************-->
<?php
/*
foreach($tema as $tema)
{
	echo $tema;
	}
echo $label;
echo $waktu;
*/
  /*$waktu = $namaLabel = $jam = $id_katakunci = "";
  $data0 = $data1 = $data2 = $data3 = $data4 = $data5 = $data6 = $data7 = $data8 = $data9 ="";
  //if(!isset($issue0) && !isset($issue1) && !isset($issue2) && !isset($issue3) && !isset($issue4) && !isset($issue5) && !isset($issue6) && !isset($issue7) && !isset($issue8) && !isset($issue9) && !isset($issue10) && !isset($issue11) && !isset($issue12))
  //{
  //  $namaLabel = ["-","-","-","-","-"];
  //  $waktu = $data0 = $data1 = $data2 = $data3 = $data4 = "[0,0,0,0,0,0,0,0,0,0,0,0,0]";
  //}
  //else {
    for($j=0;$j<13;$j++)
    {
      $n =0;
      foreach (${'issue'.$j} as $data) {
          ${'data'.$n} = " ".$data['jumlah']." ,".${'data'.$n};
          $n++;
          $jam = " '".$data['waktu']."' ,";
          if($j==0){
            $namaLabel = " '".$data['katakunci']."' ,".$namaLabel;
            $id_katakunci = " '".$data['id_katakunci']."' ,".$id_katakunci;
          }
      }
      $waktu = $jam."".$waktu;
    }
//   echo $data1;
    $waktu     = "[".substr($waktu,0,-1)."]";
    $namaLabel = "[".substr($namaLabel,0,-1)."]";
    $id_katakunci = "[".substr($id_katakunci,0,-1)."]";
    for($j=0;$j<10;$j++)
      ${'data'.$j} = "[".substr(${'data'.$j},0,-1)."]";
  //}
  
  //echo $namaLabel;
  //echo $waktu;
*/
?>
<!-- ********************************* DATA GRAFIK 10 TOP ISSUE ****************************************************-->
<!-- *********************************   DATA SEBARAN BERITA    ***************************************************-->
<?php
/*$data_sebaran_berita = "";
foreach ($sebaran_berita as $data)
{
  $data_sebaran_berita = "['".$data['lokasi']."', '".$data['jumlah_berita']."'],".$data_sebaran_berita;
}
$data_sebaran_berita = "[".substr($data_sebaran_berita,0,-1)."]";
*/
//$data_sebaran_berita="[[' PONOROGO ', '1'],[' LONDON ', '1'],[' LAS VEGAS ', '1'],[' MEDAN', '2'],[' SINGAPURA ', '1'],[' TEMANGGUNG ', '1'],[' YOGYAKARTA ', '1'],[' SYDNEY', '1'],[' PONTIANAK', '1'],[' GAYDON ', '1'],[' WASHINGTON DC ', '1'],[' UPPSALA ', '1'],[' JAKARTA ', '13'],[' GIRONA', '1'],[' KULONPROGO ', '1'],[' Jakarta ', '10'],[' SENTANI', '1'],[' KUNINGAN ', '1'],[' JAKARTA', '10'],[' BLORA ', '1'],[' FLORIDA ', '1'],[' SERDANG RAYA ', '1'],[' BERLIN ', '1'],[' SYDNEY ', '1'],[' BANDUNG', '1']]";?>
<!-- *********************************   DATA SEBARAN BERITA    ***************************************************-->
<!-- *********************************   MEDIA LIPUT PROGRAM PEMERITAH    ***************************************************-->
<?php
$data_media = NULL;
foreach ($media as $data)
{
	if($data['media'] != NULL){
  $data_media = "".$data_media.",['".$data['media']."', ".$data['total_muncul']."]";
	}
}
?>
<!-- *********************************  END MEDIA LIPUT PROGRAM PEMERITAH ****************************************-->
<body style="background-image: url("<?php echo base_url().'assets/images/background.png';?>")">
<!-- **************************************** MENU ***************************************************** -->
    <nav id=menu class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url().'assets/images/logo_kominfo.png'?>" alt="">
                </a>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url().'';?>"><b>HOME</b></a>
                    </li>
                    <li>
                       <a href="<?php echo base_url().'index.php/Data/sosmed'?>"><b>SOSMED</b></a>
                    </li>
                    <li>
                    	<a class="dropdown-toggle" data-toggle="dropdown"><b>SEARCH</b><span class="caret"></span></a>
          						<ul class="dropdown-menu" style="padding: 20px 10px 5px 10px; width:300px;">
          							<li>
          								<form action="<?php echo base_url('index.php/DataMCA/index');?>" method="get">
          									<div class="form-group">
          										<input type="text" class="form-control" id="inputEmail" placeholder="katakunci" name="q" required >
          									</div>
          									<div class="form-group">
          							      <input type="date" class="form-control" placeholder="Tanggal Awal" name="d" required>
          							    </div>
          									<div class="form-group">
          							      <input type="date" class="form-control" placeholder="Tanggal Akhir" name="d2">
          							    </div>
          								  <button type="submit" class="btn btn-primary">Search</button>
          								</form>
          							</li>
          						</ul>
                    </li>
                    <?php
                      if($status_login != "LOGIN"){
                    ?>
                    <li>
                        <a href="<?php echo base_url().'index.php/auth/logout'?>"><b><?php echo strtoupper($status_login); echo " (LOGOUT)";?></b></a>
                    </li>
                    <?php }else {?>
                    <li>
                        <a href="<?php echo base_url().'index.php/auth/login'?>"><b><?php echo strtoupper($status_login);?></b></a>
                    </li>
<?php
                    }?>
                </ul>
            </div>
        </div>
    </nav>
<!-- **************************************** MENU ***************************************************** -->
    <!-- Page Content -->
    <div class="container">
        <!-- Heading Row -->
        <div class="row">
<!--************************************ SEBARAN ISSUE ********************************************* -->
        <div class ="col-md-8" id="sebaran-berita">
            <div class="judul_sebaran_berita" >
                <h3 align="center"> Sebaran Berita</h3>
            </div>
            <div id="map" style="width:100%; height:90%"></div>
            <div id="divPopupMaps" class="modal">
               <div class="content-popup">
                  <span class="close">x</span>
                  <h3 id="wilayah"></h3>
                  <p id="berita">Tidak Ada Berita</p>
               </div>
            </div>
        </div>
<!--************************************ SEBARAN ISSUE ********************************************* -->
<!--************************************  TOP PERSON  ********************************************* -->
        <div  class="col-md-4">
            <h3 align="center">Top Person</h3>
           	<div class="dropdown">
           		<button class="dropbtn"><b>PERSON</b></button>
           		<div class="dropdown-content" style="z-index:999;"> <!--dropdown content-->
           		<?php foreach($persondropdown as $isi){?>
           	  		<a href="<?php echo base_url().'index.php/data/index?id_person='.$isi['id_person'].'&person='.$isi['person']?>"style="z-index:999;"><?php echo $isi['person']; ?></a>
           	  		 <?php }?>
           		</div>
          	</div>
            <div role="main">
            <div id="wordcloud2" class="wordcloud" style="border:none" style="border:1px solid black;">
            <?php
                	 $n=60;
                   for($l=0;count($person)>$l;$l++){?>
                    	 <span data-weight="<?php echo $n; ?>"><?php echo strtolower($person[$l]['penulis']);?></span>
              <?php $n=$n-3 ;} ?>
              </div>
            <script type="text/javascript">
            	$(document).ready(function(){
            		$("#wordcloud2").awesomeCloud({
            				"size" : {
              						    "grid" : 9,
                        			"factor" : 1
                        		 },
                    "options" : {
                    						"color" : "random-dark",
                    						"rotationRatio" : 0.35
                      					},
                    "font" : "'Times New Roman', Times, serif",
                    "shape" : "circle"
                });
              $("#wordcloud21").awesomeCloud({
              			"size" : {
              					     "grid" : 9,
                        		 "factor" : 1
                        		 },
                    "options" : {
                    						"color" : "random-dark",
                    						"rotationRatio" : 0.35
                      					},
                    "font" : "'Times New Roman', Times, serif",
                    "shape" : "circle"
                });
              });
          </script>

  	     </div>
	      </div>
<!--************************************ END TOP PERSON  ********************************************* -->

<!-- ******************************* PROGRAM PRIORITAS PEMERINTAH ***********************************************-->

      <div  class="col-md-8" style="align:center;">
          <br/>
          <h4 align="center"><b>Program Prioritas Pemerintah</b></h4>
          <div class="col-md-6" style="align:center">
            <div id="piechart" style="width:100%; height:400px;"></div>
          </div>
          <div class="col-md-6" style="align:center">
            <div id="chart_div" style="width:100%; height:400px;"></div>
          </div>
      </div>
    <!-- ************************************end diagram pie program prioritas **************************************************-->

<!-- ********************************* TOP NEWS *************************************************-->
      <div id="div-top-news" class="col-md-4">
        <br/>
        <h4><b>Berita Terkini</b></h4>
        <ul class="ul-top-news">
            <hr/>
            <?php foreach($listberita as $list ) {
            	if($list['gambar'] == NULL){
            		$list['gambar'] = base_url().'index.php/assets/images/gambar_berita_null.png';
            	}
              //preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,20}/", $list['isi'], $isi_berita);
              $text = strip_tags($list['isi']); $limit = 20;
              if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos = array_keys($words);
                $text = substr($text, 0, $pos[$limit]) . '...';
              }
            ?>
              <li><a title="<?php echo $list['judul']?>" href="<?php echo base_url().'index.php/data/lihat_isiberita?url='.$list['url']?>" >
                  <table width="100%">
                    <tr><td width="40%"><img class="img-top-news" alt="gambar" src="<?php echo $list['gambar'];?>"</td>
                        <td style="vertical-align:top"><p class="jdl-hot-news" ><strong><?php echo $list['judul'];?></strong></p><p  class="time-hot-news"><?php echo $list['waktu'];?></p></td>
                    </tr>
                    <tr>
                        <td class="paragraph-hot-news" colspan="2"><?php echo $text;//$isi_berita[0]."...";?></td>
                    </tr>
                  </table>
                  </a>
                </li><hr>
                <?php } ?>
              </ul>
          </div>
          </div>
<!-- ************************************end TOP NEWS **************************************************-->

<!-- ************************************* TOP ISSUE DIAGRAM GRAFIK ************************************************-->
            <br/>
            <div class="col-md-12" style="background-color:rgb(218, 218, 218); z-index:0;">
              <h3 align="center"><b>Top Issue Online Media</b></h3>
              <hr width="100%" style="margin:3px; height:1px;">
              <!--******************************* GRAFIK TOP ISSUE **********************************-->
              <div class="col-md-8">
                <div>
                  <br/>
                  <!--download dan liat mca-->
                  <div class="div-dropdown-download-grafik2">
                      <div class="dropdown2">
                        <button class="dropbtn2"><b>
                        Lihat Berita
                        </b></button>
                        <div class="dropdown-content2"> <!--dropdown content-->
                        <?php
                        $n=0;
                         foreach($tema as $tema )
												{
                         ?>
                          <a href="<?php echo base_url().'index.php/DataMCA/index?id='.$id_tema[$n].'&q='.$tema.'&d=0&d2=';?>"><?php echo $tema;?></a>
                          <?php 
                          $n++;
                          } ?>
                        </div>
                      </div>
                      <?php
                        $download_grafik = "";
  //                      echo "<a href=".base_url()."index.php/Export_excel/export>".$hak_akses."</a>";
                        if($status_login != "LOGIN" && $hak_akses == 2)
                          $download_grafik = base_url().'index.php/Export_excel/export';
                        else
                          $download_grafik = base_url().'index.php/printpdf';
                      ?>
                      <button onclick="location.href='<?php echo $download_grafik;?>';" class="btn-download-grafik2" style="float: left;"><b>Download Data</b></button>
                  </div>
                  <!--download dan liat mca-->
                  <canvas style="border-top-style: none;" class="diagram-top-issue" id="grafik-top-issue"><br/></canvas>
                <br/>
                </div>
            </div>
  <!--*******************************end GRAFIK TOP ISSUE **********************************-->

  <!--******************************** WORDCLOUD TOP ISSUE KATA JUDUL *********************************-->
    <!-- <div id="div-top-news" class="col-md-4" style="float:left; background-color:rgb(218, 218, 218); z-index:-3;">-->
        <div class="col-md-4">
              <br/>
           	  <div class="dropdown">
           	  	<button class="dropbtn"><b>Kata Kunci Isu</b></button>
           	  	<div class="dropdown-content"> <!--dropdown content-->
												<?php 
                  	  		$c=0;
                         foreach($id_tema as $id_tema ){?>
                          <a href="<?php echo base_url().'index.php/data/index?id_tema='.$id_tema.'&tema='.$Tema_wordcloud[$c];?>"><?php echo $Tema_wordcloud[$c];?></a>
                          <?php 
                          $c++;
                          } ?>
           	  		</div>
          	 </div>
          <div role="main">
            <div id="wordcloud21" class="wordcloud2">
              	 <?php
              	 $n=60;
              	 foreach($isuWordcloud as $kata){?>
              	 <span data-weight="<?php echo $n; ?>" ><?php echo strtolower($kata);?></span>
              <?php
              if($n<=0){
              	break;
              }
              $n-=3 ;} ?>
            </div>
	      </div>
        <br/>
    </div>
  <!--******************************** END WORDCLOUD TOP ISSUE *********************************-->

<!-- /.row -->
    </div>
    </div>
         <!-- /. container-->
    <br/>
</body>
<footer>
  <h5>&copy; kemenkominfo 2016</h5>
</footer>

<script type="text/javascript">
//********************************************* DIAGRAM ISSUE *********************************************
   var data_label = <?php echo $label; ?>;
   var border_Color = ['rgba(128, 0, 64, 0.5)','rgba(128, 0, 0, 0.5)','rgba(0, 128, 0, 0.5)','rgba(255, 0, 255, 0.5)','rgba(0,255, 255, 0.5)','rgba(255, 128, 0, 0.5)','rgba(128, 0, 255, 0.5)','rgba(0, 255, 255, 0.5)','rgba(255, 0, 0, 0.5)','rgba(0, 128, 255, 0.5)'];
   var background_Color = ['rgba(128, 0, 64, 0.5)','rgba(128, 0, 0, 0.5)','rgba(0, 128, 0, 0.5)','rgba(255, 0, 255, 0.5)','rgba(0,255, 255, 0.5)','rgba(255, 128, 0, 0.5)','rgba(128, 0, 255, 0.5)','rgba(0, 255, 255, 0.5)','rgba(255, 0, 0, 0.5)','rgba(0, 128, 255, 0.5)'];
   var config = {
           type: 'line',
           data: {
               labels: <?php echo $waktu; ?>,
               datasets: [
                 <?php
                    for($i=0;count($issue)>$i;$i++)
                    {
                  ?>
                      {
                        label: data_label[<?php echo $i;?>],
                        data: <?php echo $issue[$i];?>,
                        borderColor: border_Color[<?php echo $i;?>],
                        backgroundColor: background_Color[<?php echo $i;?>],
                        fill: false,
                        cubicInterpolationMode: 'monotone'
                      }
                  <?php
                      if($i<9){
                  ?>
                        ,
                  <?php
                      }//tutup if
                    }//tutup for
                 ?>
             ]
           },
           options: {
               responsive: true,
               tooltips: {
                   mode: 'label'
               },
               hover: {
                   mode: 'dataset'
               },
               scales: {
                   xAxes: [{
                       display: true,
                       scaleLabel: {
                           display: true,
                           labelString: 'Waktu'
                       }
                   }],
                   yAxes: [{
                       display: true,
                       scaleLabel: {
                           display: true,
                           labelString: 'Jumlah Berita'
                       },
                       ticks: {
                           suggestedMin: 0,
                           suggestedMax: 15
                       }
                   }]
               }
           }
       };
//********************************************* DIAGRAM ISSUE *********************************************
       window.onload = function() {
//*************************************** LOAD DIAGRAM ISSUE **********************************************
           var ctx = document.getElementById("grafik-top-issue").getContext("2d");
           window.myLine = new Chart(ctx, config);
      };
//*************************************** LOAD DIAGRAM ISSUE **********************************************

//***************************************** SEBARAN ISSUE *************************************************
       function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: -13.21, lng: 120.85}
        });
        var geocoder = new google.maps.Geocoder();
        var lokasi_berita = <?php echo $data_sebaran_berita;?>;
        var id_map = <?php echo $data_id_berita;?>;
        //var lokasi_berita = [["Jakarta", "berita 1"],["Bandung", "berita 2"], ["Bali", "berita 3"],["Jakarta","berita 4"],["bandung","berita 5"],["Jakarta","berita 6"],["Aceh","berita 7"],["Papua", "berita 8"]];
        for(var i=0; i<lokasi_berita.length ; i++){
          var lokasi        =lokasi_berita[i][0];
          var berita        = lokasi_berita[i][1];
          var jumlah_berita = lokasi_berita[i][1];
          var aidi          = id_map[i];
          //**** cek lokasi yang sama******
          //berita = "berita : ".concat(berita,"<br/>");
          berita = "berita : ".concat(berita);
          for(var j=0; j<lokasi_berita.length; j++){
            if(lokasi.toLowerCase() == lokasi_berita[j][0].toLowerCase() && i!==j){
              berita = berita.concat("berita : ",lokasi_berita[j][1],"<br/>");
              lokasi_berita = lokasi_berita.slice(0); //delete element array of berita
              lokasi_berita.splice(j, 1);
            }
          }
          //*** cek lokasi yang sama
          geocodeAddress(geocoder, map, lokasi, berita, jumlah_berita,aidi);
        }
      }
      function geocodeAddress(geocoder, resultsMap,lokasi, berita, jumlah_berita,aidi) {
        var address = lokasi;
        var aidi_berita = aidi;
        var sizeIcon = jumlah_berita;
        var sizeIcon = 0;
        if      (jumlah_berita>= 5  && jumlah_berita < 10) sizeIcon = 1;
        else if (jumlah_berita>= 10 && jumlah_berita < 15) sizeIcon = 2;
        else if (jumlah_berita>= 15 && jumlah_berita < 20) sizeIcon = 3;
        else if (jumlah_berita>= 20 && jumlah_berita < 25) sizeIcon = 4;
        else if (jumlah_berita>= 25 && jumlah_berita < 30) sizeIcon = 5;
        else if (jumlah_berita>= 30 && jumlah_berita < 35) sizeIcon = 6;
        else if (jumlah_berita>= 35 && jumlah_berita < 40) sizeIcon = 7;
        else if (jumlah_berita>= 40 && jumlah_berita < 45) sizeIcon = 8;
        else if (jumlah_berita>= 45 && jumlah_berita < 50) sizeIcon = 9;
        else if (jumlah_berita>= 50 && jumlah_berita < 55) sizeIcon =10;
        else if (jumlah_berita>= 55 && jumlah_berita < 60) sizeIcon =11;
        else if (jumlah_berita>= 60 && jumlah_berita < 65) sizeIcon =12;
        else if (jumlah_berita>= 65 && jumlah_berita < 70) sizeIcon =13;
        else if (jumlah_berita>= 70 && jumlah_berita < 75) sizeIcon =14;
        else if (jumlah_berita>= 75 && jumlah_berita < 80) sizeIcon =15;
        else if (jumlah_berita>= 80 && jumlah_berita < 85) sizeIcon =16;
        else if (jumlah_berita>= 85 && jumlah_berita < 90) sizeIcon =17;
        else if (jumlah_berita>= 90 && jumlah_berita < 95) sizeIcon =18;
        else if (jumlah_berita>= 95 && jumlah_berita <100) sizeIcon =19;
        else if (jumlah_berita>=100 && jumlah_berita <105) sizeIcon =20;
        else if (jumlah_berita>=105 && jumlah_berita <110) sizeIcon =21;
        else if (jumlah_berita>=110 && jumlah_berita <115) sizeIcon =22;
        else if (jumlah_berita>=115 && jumlah_berita <120) sizeIcon =23;
        else if (jumlah_berita>=120 && jumlah_berita <125) sizeIcon =24;
        else if (jumlah_berita>=125 && jumlah_berita <130) sizeIcon =25;
        else if (jumlah_berita>=130 && jumlah_berita <135) sizeIcon =26;
        else if (jumlah_berita>=135 && jumlah_berita <140) sizeIcon =27;
        else if (jumlah_berita>=140 && jumlah_berita <145) sizeIcon =28;
        else if (jumlah_berita>=145 && jumlah_berita <150) sizeIcon =29;
        else if (jumlah_berita>=150 && jumlah_berita <155) sizeIcon =30;

        var images = {
                          url: '<?php echo base_url().'assets/images/14.png';?>',
                          scaledSize: new google.maps.Size(27+sizeIcon, 25+sizeIcon), // scaled size
                          //origin: new google.maps.Point(0,0), // origin
                          //anchor: new google.maps.Point(0, 0) // anchor
                      }
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              icon: images,
              position: results[0].geometry.location,
              title : address.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();})+"\n"+berita
            });
            //*tambahan
            google.maps.event.addListener(marker,'click',function(){
              //pop_up(berita,address);
              //    next_page(berita,address);

                  window.location= window.location.origin+"/SiMONA/index.php/data/maps_list_berita?l="+aidi_berita;
                  var infowindow = new google.maps.InfoWindow({
                    content:berita
                  });
                  infowindow.open(resultsMap,marker);
            });
            //tambahan
          } else {
///            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
      function pop_up(berita,lokasi){
        document.getElementById("wilayah").innerHTML = lokasi;
        document.getElementById("berita").innerHTML = berita;
        var modal = document.getElementById('divPopupMaps');
        var span = document.getElementsByClassName("close")[0];
        modal.style.display = "block";
        span.onclick = function() {
            modal.style.display = "none";
        }//modal.style.display = "none";
      }
  //    function next_page(berita,lokasi)
  //    {
//        window.location = "<?php //echo base_url().index.php/data/list_berita?>";
  //    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVXVArgrimhTTCTDqJtQZ1uEXH2bn0_Bg&callback=initMap"></script>
<!-- ****<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVXVArgrimhTTCTDqJtQZ1uEXH2bn0_Bg&callback=initMap"></script>
-->

<!--***************************************** end SEBARAN ISSUE *************************************************-->


<!--********************************** KALENDER SEARCH ***********************************************-->
    <script type="text/javascript">
			$(function () {
				$('#datepicker').datetimepicker({
					format: 'DD MMMM YYYY',
				});
			});
		</script>
<!--********************************** end KALENDER SEARCH ***********************************************-->

<!--********************************** PIE CHART PROGRAM PEMERINTAH ***********************************************-->
<script src="<?php echo base_url().'assets/js/loader.js'?>"></script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
       
          <?php for($z=0;count($p_prioritas)>$z;$z++){ ?>
          ['<?php echo $p_prioritas[$z]['tema_program'];?>',<?php echo ($p_prioritas[$z]['hasil']/$total)*100;?>],
         <?php } ?>
  
        ]);

      var options = {
        legend: 'none',
        pieSliceText: 'label',
         colors: ['#CD5C5C', '#ffcc00', '#ff6633', '#D2691E', '#B8860B', '#ff9966', '#BDB76B', '#ffcc99', '#c0c0c0', '#008B8B'],
     title: 'Diagram berita yang memuat Program Prioritas Pemeritah',
        pieStartAngle: 100,
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>


		<script>
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStacked);

      function drawStacked() {
        var data = google.visualization.arrayToDataTable([
          ['Media', 'Jumlah ']<?php echo $data_media; ?>]);

        var options = {
          title: 'Media Liput Program Prioritas',
          chartArea: {width: '70%'},
          isStacked: true,
          hAxis: {
            title: 'Jumlah berita',
            minValue: 0,
          },
          vAxis: {
            title: 'Media'
          }
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<!--********************************** end PIE CHART PROGRAM PEMERINTAH ***********************************************-->
</html>
