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
<!-- **************************************** MENU ***************************************************** -->
    <div class="container">
        <!-- Heading Row -->
        <div class="row">
          <div class ="col-md-3" id="sebaran-berita">
              <?php foreach ($topik as $topik_twitter): ?>
                  <li style="list-style-type: none;padding: 0;
                  margin: 0;">
                  <a href="<?php echo base_url().'index.php/data/sosmed?id='.$topik_twitter['id'].'&q='.$topik_twitter['nama_query']?>" style="text-decoration: none;">
                    <?php echo $topik_twitter['nama'];?>
                  </a>
                </li><hr width="100%" style="margin: 3px;">
              <?php endforeach; ?>
          </div>
          <div class="col-md-9">

            <?php foreach ($sosmed as $data_sosmed): ?>
              <table style="border-collapse: collapse; width: 100%;">
                  <tr>
                    <td rowspan="3" width="10%" height="0.5em"><img width="100%"alt="gambar" src="<?php echo $data_sosmed['gambar'];?>"/></td>
                    <td width="90%"><b><?php echo $data_sosmed['nama'];?></b></td>
                  </tr>
                  <tr>
                    <td ><?php echo $data_sosmed['waktu'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $data_sosmed['isi'];?></td>
                  </tr style="border-bottom: 1px solid #ddd;">
              </table>
              <hr width="100%">
            <?php endforeach; ?>

          </div>
        </div>
    </div>
</body>
</html>

<?php
/*
 foreach($sosmed as $tweet) { ?>
        <hr/>
        <h3><img alt="foto profil" src="<?php echo $tweet->gambar?>"/><?php echo $tweet->nama;?></h3>
        <p><?php echo $tweet->tanggal." ".$tweet->jam;?></p>
        <p><?php echo $tweet->isi;?></p>
       <hr/>

<?php }


*/?>
