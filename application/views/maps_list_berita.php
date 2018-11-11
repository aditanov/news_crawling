<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Sistem Informasi Nasional</title>
  <!-- Bootstrap Core CSS -->
  <link rel="icon" href="<?php echo base_url().'assets/images/logo_kominfo.png'?>" type="image/gif">
  <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url().'assets/css/small-business.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/dashboard.css'?>" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'?>">
  <link href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>" rel="stylesheet">
  <script src="<?php echo base_url().'assets/js/jquery-1.7.2.min.js'?>" type="text/javascript"></script>
  <script  src="<?php echo base_url().'assets/js/bootstrap.min.js'?>" type="text/javascript">>  </script>
  <script src="<?php echo base_url().'assets/js/jQuery.js'?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'assets/js/moment.js'?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>" type="text/javascript">></script>

</head>
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
                          <a href="<?php echo base_url().''?>"><b>HOME</b></a>
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
              										  <input type="text" class="form-control" id="inputEmail" placeholder="katakunci" name="q" required></input>
              									</div>
              									<div class="form-group">
              								      <input placeholder="Tanggal Awal (dd-mm-yyyy)" class="form-control" type="date" onfocus="(this.type='date')" name="d" required></input>
              									</div>
              									<div class="form-group">
              											<input placeholder="Tanggal Akhir (dd-mm-yyyy)" class="form-control" type="date" onfocus="(this.type='date')" name="d2" required></input>
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
<!--************************************* LIST BERITA *************************************************** -->
        <?php foreach ($berita as $dataBerita): 
        if($dataBerita['gambar'] == NULL){
            		$dataBerita['gambar'] = base_url().'assets/images/gambar_berita_null.png';
            	}?>
           	
            <hr>
              <table width="100%">
                  <tr>
                    <td rowspan="3" width="30%"><img alt="gambar" src="<?php echo $dataBerita['gambar'];?>" width="95%"></td>
                     <td width="70%"><h3><a href="<?php echo base_url().'index.php/data/lihat_isiberita?url='.$dataBerita['url'];?>" style="color:black;"><?php echo $dataBerita['judul'];?></a></h3></td>
                  </tr>
                  <tr>
                    <td><p style="color:rgb(164,164,164);"><?php echo $dataBerita['waktu'];?></p></td>
                  </tr>
                  <tr>
                    <td><p>
                      <?php
                        //preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,35}/", $dataBerita['isi'], $isi_berita);
                        $text = strip_tags($dataBerita['isi']); $limit = 20;
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
        <br>
        <?php echo $this->pagination->create_links();?>

<!--************************************* LIST BERITA *************************************************** -->
        </div>
    </div>
</body>
</html>