<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Informasi Nasional</title>
    <!-- Bootstrap Core CSS -->
    <link rel="icon" href="<?php echo base_url().'assets/images/logo_kominfo.png'?>" type="image/gif">
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/small-business.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dashboard.css'?>" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>

<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>



</head>
<!-- ********************************* DATA GRAFIK 10 TOP ISSUE ****************************************************-->
<?php
  $waktu = $namaLabel = $jam = $id_katakunci = "";
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
    $waktu     = "[".substr($waktu,0,-1)."]";
    $namaLabel = "[".substr($namaLabel,0,-1)."]";
    $id_katakunci = "[".substr($id_katakunci,0,-1)."]";
    for($j=0;$j<10;$j++)
      ${'data'.$j} = "[".substr(${'data'.$j},0,-1)."]";
  //}
?>
<!-- ********************************* DATA GRAFIK 10 TOP ISSUE ****************************************************-->
<!-- *********************************   DATA SEBARAN BERITA    ***************************************************-->
<?php
$data_sebaran_berita = "";
foreach ($sebaran_berita as $data)
{
  $data_sebaran_berita = "['".$data['lokasi']."', '".$data['jumlah_berita']."'],".$data_sebaran_berita;
}
$data_sebaran_berita = "[".substr($data_sebaran_berita,0,-1)."]";
?>

<!-- *********************************   DATA SEBARAN BERITA    ***************************************************-->
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
        <div class="col-md-12" id="sebaran-berita">
            <div class="judul_sebaran_berita" >
                <h3 align="center"> Sebaran Berita</h3>
            </div>
            <div id="map"></div>
            <div id="divPopupMaps" class="modal">
               <div class="content-popup">
                  <span class="close">x</span>
                  <h3 id="wilayah"></h3>
                  <p id="berita">Tidak Ada Berita</p>
               </div>
            </div>
        </div>
<!--************************************ SEBARAN ISSUE ********************************************* -->
<!-- ************************************* TOP ISSUE ************************************************-->
            <div style="background-color:rgb(218, 218, 218)" class="col-md-8">
              <div>
                <h3>TOP ISSUES ONLINE MEDIA </h3>
                <br/>
                <!--download dan liat mca-->
                <div class="div-dropdown-download-grafik">
                    <div class="dropdown">
                      <button class="dropbtn"><b>
                      Lihat Berita
                      </b></button>
                      <div class="dropdown-content"> <!--dropdown content-->
                      <?php
                        $namaLabel2 = $namaLabel3 = substr($namaLabel,1); //hapus kurung array di awal
                        $id_katakunci2 = $id_katakunci3 = substr($id_katakunci,1); //hapus kurung array di awal

                        while (strpos($namaLabel2,']')!= FALSE) {
                          if(strpos($namaLabel2,',')!= FALSE)
                          {
                            $namaLabel3 = current(explode(',', strtolower($namaLabel2))).',';
                            $id_katakunci3 = current(explode(',', strtolower($id_katakunci2))).',';
                          }
                          else
                          {
                            $namaLabel3 = current(explode(']', strtolower($namaLabel2))).']';
                            $id_katakunci3 = current(explode(']', strtolower($id_katakunci2))).']';
                          }
                          $namaLabel2 = str_replace($namaLabel3,'',strtolower($namaLabel2));
                          $id_katakunci2 = str_replace($id_katakunci3,'',strtolower($id_katakunci2));
                          $id_katakunci3 = str_replace("'",'',$id_katakunci3);
                        ?>
                        <a href="<?php echo base_url().'index.php/DataMCA/index?id='.substr(str_replace("'",'',$id_katakunci3),0,-1).'&q='.substr(substr(str_replace("'",'',$namaLabel3),0,-1),1).'&d=0&d2=';?>"><?php echo substr(str_replace("'",'',$namaLabel3),0,-1);?></a>
                        <?php } ?>
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
                    <button onclick="location.href='<?php echo $download_grafik;?>';" class="btn-download-grafik" style="float:right; "><b>Download Data</b></button>
                </div>
                <!--download dan liat mca-->
                <canvas style="border-top-style: none;" class="diagram-top-issue" id="grafik-top-issue"><br/></canvas>
              <br/>
              </div>
            </div>
<!-- ************************************* TOP ISSUE ************************************************-->
<!-- ************************************ TOP NEWS **************************************************-->
          <div id="div-top-news" class="col-md-4">
              <br/>
              <h4><b>Top News</b></h4>
              <ul class="ul-top-news">
              <hr/>
              <?php foreach($listberita as $list ) {
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
<!-- ************************************ diagram program prioritas **************************************************-->
        </div>
        

          <h3 align="center">Program Prioritas Pemerintah</h3><!-- ************************************ TOP NEWS **************************************************-->
          <div id="div-top-news" class="col-md-4">
    
    <div id="piechart" style="width: 400px; height: 400px;"></div>          
<!-- ************************************ diagram pie program prioritas **************************************************-->
        </div>
        
        
<!-- ************************************ list program pemerintah **************************************************-->
          <div style="width:750px;background-color:rgb(255, 255, 255); justify-content:space-between; margin: 50px 2px 2px 0px;" class="col-md-8 ">
<div style=" justify-content: space-between;float:center;">
	
	<ul class="nav nav-pills" role="tablist" style="spacing: 20; align="center"">
<?php for($y=0;$y<17;$y++){ ?>
  <li style="background-color: #87CEFA; float:right; margin: 2px 2px 2px 2px;"><a href="#"><?php echo $program[$y];?><span class="badge"><?php echo substr(($hitungtema[$y]/$total)*100,0,4);echo '%';?></span></a></li>
<?php } ?>


</ul>
<!-- ************************************ list program pemerintah **************************************************-->
       </div>
        </div>
<!-- /.row -->
        <div class="row">
<!-- *********************************** TOP PERSON *************************************************-->
        <div class="col-md-12" style="background-color:white; margin: 0 auto;">
          <h3 align="center">Top Persons</h3>
          <div style="text-align : center; line-height: 30 px">
          <?php foreach ($topPerson as $data){ ?>
              <span style="margin-left: 10px;">
                  <a href="#topPerson" style="text-decoration: none;">&nbsp; <?php echo str_replace(" ","_",$data['person']);?></a>
                  <span style="background-color: #C1C1C1; font-size: 11 px; margin-left: 5 px; border-radius: 5px;"><font color="white">&nbsp;<?php echo $data['total'];?>&nbsp;</font></span>
              </span>
          <?php  } ?>
          </div>
          <br/>
        </div>
<!-- *********************************** TOP PERSON *************************************************-->
    </div> <!--/.div-->

    </div>



    </div>
      <!-- /. container-->
    <br/>
    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
<footer>
  <h5>&copy; kemenkominfo 2016</h5>
</footer>
<script>
//********************************************* DIAGRAM ISSUE *********************************************
   var data_label = <?php echo $namaLabel?>;
   var border_Color = ['rgba(128, 0, 64, 0.5)','rgba(128, 0, 0, 0.5)','rgba(0, 128, 0, 0.5)','rgba(255, 0, 255, 0.5)','rgba(0,255, 255, 0.5)','rgba(255, 128, 0, 0.5)','rgba(128, 0, 255, 0.5)','rgba(0, 255, 255, 0.5)','rgba(255, 0, 0, 0.5)','rgba(0, 128, 255, 0.5)'];
   var background_Color = ['rgba(128, 0, 64, 0.5)','rgba(128, 0, 0, 0.5)','rgba(0, 128, 0, 0.5)','rgba(255, 0, 255, 0.5)','rgba(0,255, 255, 0.5)','rgba(255, 128, 0, 0.5)','rgba(128, 0, 255, 0.5)','rgba(0, 255, 255, 0.5)','rgba(255, 0, 0, 0.5)','rgba(0, 128, 255, 0.5)'];
   var config = {
           type: 'line',
           data: {
               labels: <?php echo $waktu; ?>,
               datasets: [
                 <?php
                    for($i=0;$i<10;$i++)
                    {
                  ?>
                      {
                        label: data_label[<?php echo $i;?>],
                        data: <?php echo ${'data'.$i};?>,
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
                           labelString: 'Time'
                       }
                   }],
                   yAxes: [{
                       display: true,
                       scaleLabel: {
                           display: true,
                           labelString: 'Rating'
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
        //var lokasi_berita = [["Jakarta", "berita 1"],["Bandung", "berita 2"], ["Bali", "berita 3"],["Jakarta","berita 4"],["bandung","berita 5"],["Jakarta","berita 6"],["Aceh","berita 7"],["Papua", "berita 8"]];
        for(var i=0; i<lokasi_berita.length ; i++){
          var lokasi        =lokasi_berita[i][0];
          var berita        = lokasi_berita[i][1];
          var jumlah_berita = lokasi_berita[i][1];
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
          geocodeAddress(geocoder, map, lokasi, berita, jumlah_berita);
        }
      }
      function geocodeAddress(geocoder, resultsMap,lokasi, berita, jumlah_berita) {
        var address = lokasi;
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

                  window.location= window.location.origin+"/SiMONA/index.php/data/maps_list_berita?l="+address;
                  var infowindow = new google.maps.InfoWindow({
                    content:berita
                  });
                  infowindow.open(resultsMap,marker);

            });
            //tambahan
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
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
//***************************************** SEBARAN ISSUE *************************************************
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVXVArgrimhTTCTDqJtQZ1uEXH2bn0_Bg&callback=initMap">
</script>

<script type="text/javascript">
			$(function () {

				$('#datepicker').datetimepicker({
					format: 'DD MMMM YYYY',
				});

			});
		</script>
		
		
		<script type="text/javascript" src="<?php echo base_url().'assets/js/loader.js'?>"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          
          <?php for($z=0;$z<17;$z++){ ?>
          ['<?php echo $program[$z];?>',<?php echo ($hitungtema[$z]/$total)*100;?>],
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
		
		
</html>