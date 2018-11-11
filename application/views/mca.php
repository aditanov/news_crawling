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
    <script type="text/javascript" src="http://www.chartjs.org/assets/Chart.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url().'assets/js/Chart.HorizontalBar.js'?>"></script>


<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>



</head>
<!-- ********************************* DATA GRAFIK 10 TOP ISSUE ****************************************************-->
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
          							      <input type="date" class="form-control" placeholder="Tanggal Awal" name="d">
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
    <div class="row" >
  <!-- ************************************* HALAMAN UTAMA *********************************************** -->
  <!-- **************************************** GRAFIK *************************************************** -->
      <div class="col-md-7">
        <?php// echo base_url().'index.php/DataMCA/index?q='.substr(substr(str_replace("'",'',$namaLabel3),0,-1),1).'&d=0&d2=0';?>
        <form action="<?php echo base_url('index.php/DataMCA/index?q='.$katakunci);?>" method="get">
          									<div class="form-group">

          										<input type="date" data-date-inline-picker="false" name="d"></input>
          										<input type="hidden" value='<?php echo $katakunci?>' name="q"></input>
          										<input type="hidden" name="d2"></input>

          							    </div>
          								  <button type="submit" class="btn btn-primary">Ganti Tanggal</button>
          								</form>


        <?php foreach ($list_berita as $dataBerita): ?>
        <hr>
          <table width="100%">
              <tr>
                <td rowspan="3" width="30%"><img src="<?php echo $dataBerita->gambar;?>" alt="Gambar" width="95%"></td>
                <td width="70%"><h3><a href="<?php echo base_url().'index.php/data/lihat_isiberita?url='.$dataBerita->url;?>" style="color:black;"><?php echo $dataBerita->judul;?></a></h3></td>
              </tr>
              <tr>
                <td><p style="color:rgb(164,164,164);"><?php echo $dataBerita->waktu;?></p> </td>
              </tr>
              <tr>
                <td><p>
                  <?php
                    //preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,25}/", $dataBerita->isi, $isi_berita);
                    $text = strip_tags($dataBerita->isi); $limit = 20;
                    if (str_word_count($text, 0) > $limit) {
                      $words = str_word_count($text, 2);
                      $pos = array_keys($words);
                      $text = substr($text, 0, $pos[$limit]) . '...';
                    }
                    //$isi_berita = current(explode('.', $dataBerita['isi']))."...";
                    echo $text;//$isi_berita[0]."...<br/><br/>";
                  ?>
                </p></td>
              </tr>
          </table>
        <hr>
        <?php endforeach; ?>
        <br/>

        <?php echo $this->pagination->create_links();?>
      </div>
<div class="col-md-5" style="text-align:center">
        <h4>Sebaran media</h4>
        <?php
          //************************************* DATA SEBARAN MEDIA **********************************************
          $data_media = $label_media = "";
          foreach ($data_grafik_sebaran_media as $sebaran_media)
          {
            $label_media = "'".$sebaran_media['media']."',".$label_media;
            $data_media = $sebaran_media['total'].",".$data_media;
          }
          $label_media = "[".substr($label_media,0,-1)."]";
          $data_media = "[".substr($data_media,0,-1)."]";
          //************************************* DATA SEBARAN MEDIA **********************************************
        ?>
          <canvas id="canvas" height="300%"></canvas>
          <script>
            var barChartData = {
                labels : <?php echo $label_media;?>,
                datasets : [
                  {
                    fillColor : "rgba(35, 63, 252, 0.78)",
                    strokeColor : "rgba(35, 63, 252, 0.93)",
                    data : <?php echo $data_media; ?>
          }
        ]
      }
    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);

    </script>
      </div>
<!--********************************* GRAFIK SEBARAN MEDIA *******************************************************-->    </div><!--div row-->


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

</html>