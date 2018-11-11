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
<!-- ********************************* DATA GRAFIK 10 TOP ISSUE ****************************************************-->
<!-- *********************************   DATA SEBARAN BERITA    ***************************************************-->

<!-- *********************************   DATA SEBARAN BERITA    ***************************************************-->
<body style="background-image: url("<?php echo base_url().'assets/images/background.png';?>")">
<!-- **************************************** MENU ***************************************************** -->
    <nav id=menu class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" style="background: rgb(0, 45, 113);">
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
	<br>
	<br>
	<br>
	<!-- **************************************** isinya ***************************************************** -->

 <div class="container">
 	
   
 	 
 	<?php if($media =="jpnn") {              
              ?>
              
 	
 	<!doctype html><html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="id-ID" itemscope="itemscope" itemtype="http://schema.org/WebPage" lang="id-ID" dir="ltr">
<head>
<!--Meta data-->
<title><?php $berita['judul'] ?></title>
<link rel="canonical" href="http://www.jpnn.com/news/pelaku-pembunuhan-pulomas-sulit-dijerat-hukuman-mati"/>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.jpnn.com/index.php?mib=rss"/>
<link rel="alternate" media="only screen and (max-width: 640px)" href="http://m.www.jpnn.com/news/pelaku-pembunuhan-pulomas-sulit-dijerat-hukuman-mati"/>
<link rel="shortcut icon" type="image/x-icon" href="http://www.jpnn.com/assets/img/favicon.ico">
<link rel="image_src" href="http://photo.jpgm.co.id/arsip/normal/2016/12/28/4cf5143a14f479019e69b609d67fb891.jpg"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1"/>
<meta name="keywords" content="Kasus Pembunuhan Sadis, pembunuhan pulomas" itemprop="keywords"/>
<meta name="news_keywords" content="Kasus Pembunuhan Sadis, pembunuhan pulomas" itemprop="keywords"/>
<meta name="description" content="JPNN.com - Pelaku pembunuhan enam orang di Pulomas Utara dinilai cerdik. Pelaku membiarkan korban" itemprop="description"/>
<meta name="thumbnailUrl" content="http://photo.jpgm.co.id/arsip/normal/2016/12/28/4cf5143a14f479019e69b609d67fb891.jpg" itemprop="thumbnailUrl"/>
<meta content="JPNN.com - Pelaku pembunuhan enam orang di Pulomas Utara dinilai cerdik. Pelaku membiarkan korban" itemprop="headline"/>
<meta content="http://www.jpnn.com/news/pelaku-pembunuhan-pulomas-sulit-dijerat-hukuman-mati" itemprop="url"/>
<meta name="author" content="JPNN"/>
<meta name="copyright" content="Copyright PT. Jawa Pos Grup Multimedia" itemprop="dateline"/>
<meta name="language" content="Indonesian"/>
<meta name="distribution" content="Global"/>
<meta name="rating" content="General"/>
<meta name="robots" content="index,follow"/>
<meta name="googlebot" content="index,follow"/>
<meta name="googlebot-news" content="index,follow"/>
<meta name="revisit-after" content="1 days"/>
<meta name="dc.title" content="JPNN"/>
<meta name="dc.creator.e-mail" content="webmaster@jpnn.com"/>
<meta name="dc.creator.name" content="JPNN"/>
<meta name="dc.creator.website" content="http://www.jpnn.com"/>
<meta name="tgn.name" content="Jakarta"/>
<meta name="tgn.nation" content="Indonesia"/>
<meta name="google-site-verification" content="onAtOKbk9QiuZzKE1hF3ZrqI34JQEO-w9fvW0fzgy1Q"/>
<meta name="msvalidate.01" content="914415EB85CAFB3C6392E4F3BCF6E50D"/>
<meta name="alexaVerifyID" content="tIRVEdgUmCkx0hjYhIsENyctuAQ"/>
<meta name="pubdate" content="2016-12-28T14-10-00Z" itemprop="datePublished"/>
<meta content="2016-12-28T14-10-00Z" itemprop="dateCreated"/>
<!-- Meta_FB -->
<meta property="fb:app_id" content="1581983495440517">
<meta property="fb:pages" content="53788620694"/>
<meta property="fb:admins" content="1393292659"/>
<meta property="article:author" content="https://www.facebook.com/jpnncom" itemprop="author"/>
<meta property="article:publisher" content="https://www.facebook.com/jpnncom"/>
<meta property="og:url" content="http://www.jpnn.com/news/pelaku-pembunuhan-pulomas-sulit-dijerat-hukuman-mati"/>
<meta property="og:title" content="Pelaku Pembunuhan Pulomas Sulit Dijerat Hukuman Mati?"/>
<meta property="og:description" content="JPNN.com - Pelaku pembunuhan enam orang di Pulomas Utara dinilai cerdik. Pelaku membiarkan korban"/>
<meta property="og:image" content="http://photo.jpgm.co.id/arsip/normal/2016/12/28/4cf5143a14f479019e69b609d67fb891.jpg">
<meta property="og:locale" content="id_ID"/>
<meta property="og:type" content="article"/>
<meta property="og:site_name" content="jpnn.com"/>
<meta property="og:ttl" content="345600"/>
<!--<meta name="Facebot" content="index,follow" />-->
<!--Meta_iOS-->
<meta property="al:ios:url" content="https://itunes.apple.com/id/app/jpnn/id1145240630?mt=8"/>
<meta property="al:ios:app_store_id" content="1145240630"/>
<meta property="al:ios:app_name" content="JPNN"/>
<!-- Meta_TwitterCard -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@jpnncom"/>
<meta name="twitter:creator" content="@jpnncom">
<meta name="twitter:title" content="Pelaku Pembunuhan Pulomas Sulit Dijerat Hukuman Mati?">
<meta name="twitter:description" content="JPNN.com - Pelaku pembunuhan enam orang di Pulomas Utara dinilai cerdik. Pelaku membiarkan korban">
<meta name="twitter:image" content="http://photo.jpgm.co.id/arsip/normal/2016/12/28/4cf5143a14f479019e69b609d67fb891.jpg"/>
<meta name="twitter:image:alt" content="JPNN.COM | News Portal Jawa Pos National Network"/>
<!-- Meta_G+ -->
<link rel="publisher" href="https://plus.google.com/105440276395813137928/posts"/>
<script type="text/javascript" async defer src="https://apis.google.com/js/platform.js?publisherid=105440276395813137928"></script>
<script type='application/ld+json'>{"@context":"http://schema.org","@type":"WebSite","url":"http://www.jpnn.com","name":"Jawa Pos National Network"}</script>
<!--Assets-->
<link type="text/css" rel="stylesheet" href="http://www.jpnn.com/carabiner/1482593639c93283ab2b8cb9cc33ea6436aef1e23c.css" media="screen"/>
<link type="text/css" rel="stylesheet" href="http://www.jpnn.com/carabiner/14794628043489f6b238036a3260ba85176ceb2f46.css" media="print"/>
<script type="text/javascript" src="http://www.jpnn.com/carabiner/1481730442899aa33a70122c3560787f524a66a736.js" charset="UTF-8"></script>
<!--Meta script-->
<!-- GA -->
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-5292658-1', 'auto');ga('send', 'pageview');</script>
<!-- Alexa -->
<script type="text/javascript">_atrk_opts = { atrk_acct:"dnkVg1aAQ700gc", domain:"jpnn.com",dynamic: true};(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();</script>
<noscript>
<img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=dnkVg1aAQ700gc" style="display:none" height="1" width="1" alt=""/>
</noscript>
<!-- FB -->
<div id="fb-root"></div>
<script>window.fbAsyncInit = function() {FB.init({appId:'1581983495440517',xfbml:true,version: 'v2.8'});FB.AppEvents.logPageView();};(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) {return;}js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/sdk.js";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<!-- Twitter -->
<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
</head>
<body>
<header>
<div class="logo-search-medsos">
	<div class="logo">
		<a href="http://www.jpnn.com/"><img src="http://www.jpnn.com/assets/img/logo-jpnn.png" alt="Logo JPNN" width="250" height="74"/></a>
	</div>
	<div class="search-date">
		<div class="date">Kamis, 29 Desember 2016 &mdash; 10:45 WIB</div>
		<div class="search">
			<form method="get" action="http://www.jpnn.com/search" id="jpnn-search-box">
				<input type="text" class="" placeholder="Pencarian Berita ..." title="Pencarian Berita JPNN.COM" name="q"><input type="hidden" name="sa" value="jpnn_search"><input type="hidden" name="tab" value="jpnn_search"><button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
	<div class="medsos">
		<a href="http://facebook.com/jpnncom" target="_blank" class="fb"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/jpnncom" target="_blank" class="tw"><i class="fa fa-twitter"></i></a><a href="https://plus.google.com/u/0/105440276395813137928/posts" target="_blank" class="gp"><i class="fa fa-google-plus"></i></a><a href="http://www.youtube.com/user/JPNNTV" target="_blank" class="yt"><i class="fa fa-youtube"></i></a><a href="http://pinterest.com/jpnncom/" target="_blank" class="pr"><i class="fa fa-pinterest"></i></a>
	</div>
</div>
<div class="nav-menu">
	<div class="width-px-1100 center">
		<ul class="menu-left">
			<li>
				<a rel="menu-nasional" href="http://www.jpnn.com/"><i class="fa fa-home"></i></a>
			</li>
			<li>
				<a href="http://www.jpnn.com/nasional" rel="menu-nasional" title="Nasional">Nasional</a>
			</li>
			<li>
				<a href="http://www.jpnn.com/politik" rel="menu-politik" title="Politik">Politik</a>
			</li>
			<li>
				<a href="http://www.jpnn.com/daerah" rel="menu-daerah" title="Daerah">Daerah</a>
			</li>
			<li>
				<a href="http://www.jpnn.com/ekonomi" rel="menu-ekonomi" title="Ekonomi">Ekonomi</a>
			</li>
			<li>
				<a href="http://www.jpnn.com/internasional" rel="menu-internasional" title="Internasional">Internasional</a>
			</li>
			<li>
				<a href="http://www.jpnn.com/olahraga" rel="menu-olahraga" title="Olahraga">Olahraga</a>
			</li>
			<li>
				<a href="http://www.jpnn.com/entertainment" rel="menu-entertainment" title="Entertainment">Entertainment</a>
			</li>
			<li>
				<a href="http://www.jpnn.com/lifestyle" rel="menu-lifestyle" title="Lifestyle">Lifestyle</a>
			</li>
			<li>
				<a href="http://www.jpnn.com/teknologi" rel="menu-teknologi" title="Teknologi">Teknologi</a>
			</li>
			<li>
				<a href="http://video.jpnn.com" rel="menu-video" title="Video">Video</a>
			</li>
			<li>
				<a href="http://foto.jpnn.com" rel="menu-foto" title="Foto">Foto</a>
			</li>
		</ul>
		<ul class="menu-right">
			<li>
				<a rel="menu-index" href="http://www.jpnn.com/indeks">INDEKS</a>
			</li>
			<li>
				<a rel="menu-expand" href="javascript:;" class="navicon x2 expand-menu">Menu <span class="lines"></span></a>
			</li>
		</ul>
	</div>
</div>
<div class="nav-menu-big">
	<div class="width-px-1100 center">
		<ul class="coloumn">
			<li>
				<h3><a href="http://www.jpnn.com/nasional" title="Nasional">Nasional</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/nasional/hukum">Hukum</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/nasional/humaniora">Humaniora</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/nasional/istana">Istana</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/nasional/kesehatan">Kesehatan</a>
					</li>
					<li>
						<ul style="display:none;">
							<li>
								<a href="http://www.jpnn.com/nasional/lingkungan">Lingkungan</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/nasional/politik">Politik</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/nasional/sosial">Sosial</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/nasional/tokoh">Tokoh</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/nasional/berita-bca">Berita BCA</a>
							</li>
						</ul>
						<a class="showfull" href="javascript:;">Show More +</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://www.jpnn.com/politik" title="Nasional">Politik</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/politik/legislatif">Legislatif</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/politik/parpol">Parpol</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/politik/pilpres">Pilpres</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/politik/pemilihan-umum">Pemilihan Umum</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/politik/pilkada">Pilkada</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://www.jpnn.com/daerah" title="Daerah">Daerah</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/daerah/aceh">Aceh</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/daerah/bali">Bali</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/daerah/kep.-bangka-belitung">Kep. Bangka Belitung</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/daerah/banten">Banten</a>
					</li>
					<li>
						<ul style="display: none;">
							<li>
								<a href="http://www.jpnn.com/daerah/papua-barat">Papua Barat</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/bengkulu">Bengkulu</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/dki-jakarta">DKI Jakarta</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/gorontalo">Gorontalo</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/jabar">Jabar</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/jambi">Jambi</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/jateng">Jateng</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/jatim">Jatim</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/jawa">Jawa</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/kalbar">Kalbar</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/kalsel">Kalsel</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/kaltara">Kaltara</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/kalteng">Kalteng</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/kaltim">Kaltim</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/kep.-riau">Kep. Riau</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/daerah/lampung">Lampung</a>
							</li>
						</ul>
						<a href="javascript:;" class="showfull">Show More +</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://www.jpnn.com/ekonomi" title="Ekonomi">Ekonomi</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/ekonomi/bisnis">Bisnis</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/ekonomi/industri">Industri</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/ekonomi/investasi">Investasi</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/ekonomi/makro">Makro</a>
					</li>
					<li>
						<ul style="display: none;">
							<li>
								<a href="http://www.jpnn.com/ekonomi/otomotif">Otomotif</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/ekonomi/pajak">Pajak</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/ekonomi/produk">Produk</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/ekonomi/properti">Properti</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/ekonomi/syariah">Syariah</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/ekonomi/ukm">UKM</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/ekonomi/valas">Valas</a>
							</li>
						</ul>
						<a href="javascript:;" class="showfull">Show More +</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://www.jpnn.com/internasional" title="Internasional">Internasional</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/internasional/afrika">Afrika</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/internasional/amerika">Amerika</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/internasional/asia">Asia</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/internasional/eropa">Eropa</a>
					</li>
					<li>
						<ul style="display: none;">
							<li>
								<a href="http://www.jpnn.com/internasional/global">Global</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/internasional/timur-tengah">Timur Tengah</a>
							</li>
						</ul>
						<a href="javascript:;" class="showfull">Show More +</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://www.jpnn.com/olahraga" title="Olahraga">Olahraga</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/olahraga/formula-1">Formula 1</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/olahraga/all-sport">All Sport</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/olahraga/basket">Basket</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/olahraga/bulutangkis">Bulutangkis</a>
					</li>
					<li>
						<ul style="display: none;">
							<li>
								<a href="http://www.jpnn.com/olahraga/tour-de-singkarak">Tour de Singkarak</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/piala-eropa">Piala Eropa</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/moto-gp">Moto GP</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/liga-indonesia">Liga Indonesia</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/liga-inggris">Liga Inggris</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/liga-italia">Liga Italia</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/liga-jerman">Liga Jerman</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/liga-spanyol">Liga Spanyol</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/olimpiade">Olimpiade</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/sepakbola">Sepakbola</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/olahraga/tenis">Tenis</a>
							</li>
						</ul>
						<a href="javascript:;" class="showfull">Show More +</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://www.jpnn.com/entertainment" title="Entertainment">Entertainment</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/entertainment/event">Event</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/entertainment/film">Film</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/entertainment/gosip">Gosip</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/entertainment/musik">Musik</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/entertainment/seleb">Seleb</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://www.jpnn.com/lifestyle" title="Lifestyle">Lifestyle</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/lifestyle/food">Food</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/lifestyle/hobi">Hobi</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/lifestyle/keluarga">Keluarga</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/lifestyle/kesehatan">Kesehatan</a>
					</li>
					<li>
						<ul class="display-none">
							<li>
								<a href="http://www.jpnn.com/lifestyle/komunitas">Komunitas</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/lifestyle/perempuan">Perempuan</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/lifestyle/sex">Sex</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/lifestyle/traveling">Traveling</a>
							</li>
						</ul>
						<a href="javascript:;" class="showfull">Show More +</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://www.jpnn.com/teknologi" title="Teknologi">Teknologi</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/teknologi/gadget">Gadget</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/teknologi/internet">Internet</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/teknologi/komputer">Komputer</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/teknologi/komunikasi">Komunikasi</a>
					</li>
					<li>
						<ul class="display-none">
							<li>
								<a href="http://www.jpnn.com/teknologi/sains">Sains</a>
							</li>
							<li>
								<a href="http://www.jpnn.com/teknologi/smart-techno">Smart Techno</a>
							</li>
						</ul>
						<a href="javascript:;" class="showfull">Show More +</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://video.jpnn.com" title="Video">Video</a></h3>
				<ul>
					<li>
						<a href="http://video.jpnn.com/215">Nasional</a>
					</li>
					<li>
						<a href="http://video.jpnn.com/212">Politik</a>
					</li>
					<li>
						<a href="http://video.jpnn.com/248">Ekonomi</a>
					</li>
					<li>
						<a href="http://video.jpnn.com/213">Olahraga</a>
					</li>
					<li>
						<ul class="display-none">
							<li>
								<a href="http://video.jpnn.com/214">Entertainment</a>
							</li>
							<li>
								<a href="http://video.jpnn.com/210">Internasional</a>
							</li>
							<li>
								<a href="http://video.jpnn.com/275">Lifestyle</a>
							</li>
							<li>
								<a href="http://video.jpnn.com/247">Teknologi</a>
							</li>
							<li>
								<a href="http://video.jpnn.com/278">Pendidikan</a>
							</li>
							<li>
								<a href="http://video.jpnn.com/307">Ramadan</a>
							</li>
						</ul>
						<a href="javascript:;" class="showfull">Show More +</a>
					</li>
				</ul>
			</li>
			<li>
				<h3><a href="http://foto.jpnn.com" title="Video">Foto</a></h3>
				<ul>
					<li>
						<a href="http://foto.jpnn.com/nasional">Nasional</a>
					</li>
					<li>
						<a href="http://foto.jpnn.com/daerah">Daerah</a>
					</li>
					<li>
						<a href="http://foto.jpnn.com/ekonomi">Ekonomi</a>
					</li>
					<li>
						<a href="http://foto.jpnn.com/internasional">Internasional</a>
					</li>
					<li>
						<ul class="display-none">
							<li>
								<a href="http://foto.jpnn.com/olahraga">Olahraga</a>
							</li>
							<li>
								<a href="http://foto.jpnn.com/entertainment">Entertainment</a>
							</li>
							<li>
								<a href="http://foto.jpnn.com/teknologi">Teknologi</a>
							</li>
							<li>
								<a href="http://foto.jpnn.com/lifestyle">Lifestyle</a>
							</li>
							<li>
								<a href="http://foto.jpnn.com/kriminal">Kriminal</a>
							</li>
							<li>
								<a href="http://foto.jpnn.com/pendidikan">Pendidikan</a>
							</li>
							<li>
								<a href="http://foto.jpnn.com/otomotif">Otomotif</a>
							</li>
							<li>
								<a href="http://foto.jpnn.com/indokartun">Indokartun</a>
							</li>
							<li>
								<a href="http://foto.jpnn.com/menpan">Menpan</a>
							</li>
						</ul>
						<a href="javascript:;" class="showfull">Show More +</a>
					</li>
				</ul>
			</li>
			<!--<li><h3><a href="<?/*= URL_JPNN*/?>/artikel" title="Artikel"> Artikel</a> </h3> <ul> <li><a href="<?/*= URL_JPNN*/?>/artikel/dr.-adhyaksa-dault">DR. Adhyaksa Dault</a></li> <li><a href="<?/*= URL_JPNN*/?>/artikel/kementerian-koperasi-dan--ukm">Kementerian Koperasi dan UKM</a></li> <li><a href="<?/*= URL_JPNN*/?>/artikel/tung-desem-waringin">Tung Desem Waringin</a></li> <li><a href="<?/*= URL_JPNN*/?>/artikel/don-kardono">Don Kardono</a></li> <li> <ul class="display-none"> <li><a href="<?/*= URL_JPNN*/?>/artikel/kemendagri">Kemendagri</a></li> <li><a href="<?/*= URL_JPNN*/?>/artikel/kemenpan-rb">Kemenpan RB</a></li> <li><a href="<?/*= URL_JPNN*/?>/artikel/opini-pakar">Opini Pakar</a></li> <li><a href="<?/*= URL_JPNN*/?>/artikel/surat-rakyat">Surat Rakyat</a></li> </ul> <a href="javascript:;" class="showfull">Show More +</a> </li> </ul> </li>-->
			<!--<li><h3><a href="<?/*= URL_JPNN*/?>/piala eropa" title="Piala Eropa">Piala Eropa</a> </h3> <ul> <li><a href="<?/*= URL_JPNN*/?>/piala eropa/kabar-euro">Kabar Euro</a></li> <li><a href="<?/*= URL_JPNN*/?>/piala eropa/pinggir-lapangan">Pinggir Lapangan</a></li> <li><a href="<?/*= URL_JPNN*/?>/piala eropa/sorot">Sorot</a></li> </ul> </li>-->
			<!--<li><h3><a href="<?/*= URL_JPNN*/?>/pemilu" title="Pemilu"> Pemilu</a> </h3> <ul> <li><a href="<?/*= URL_JPNN*/?>/pemilu/bawaslu">Bawaslu</a></li> <li><a href="<?/*= URL_JPNN*/?>/pemilu/berita-dkpp">Berita DKPP</a></li> <li><a href="<?/*= URL_JPNN*/?>/pemilu/kpu">KPU</a></li> </ul> </li>-->
			<!--<li><h3><a href="http://www.jpnn.com/piknik" title="Piknik">Piknik</a> </h3> <ul> <li><a href="http://www.jpnn.com/piknik/balinusra">BaliNusra</a></li> <li><a href="http://www.jpnn.com/piknik/internasional">Internasional</a></li> <li><a href="http://www.jpnn.com/piknik/jawa">Jawa</a></li> <li><a href="http://www.jpnn.com/piknik/kalimantan">Kalimantan</a></li> <li> <ul class="display-none"> <li><a href="http://www.jpnn.com/piknik/maluku">Maluku</a></li> <li><a href="http://www.jpnn.com/piknik/papua">Papua</a></li> <li><a href="http://www.jpnn.com/piknik/sulawesi">Sulawesi</a></li> <li><a href="http://www.jpnn.com/piknik/sumatera">Sumatera</a></li> </ul> <a href="javascript:;" class="showfull">Show More +</a> </li> </ul> </li>-->
			<!--<li><h3><a href="http://www.jpnn.com/ramadan" title="Ramadan">Ramadan</a> </h3> <ul> <li><a href="http://www.jpnn.com/ramadan/amalan-ramadan">Amalan Ramadan</a></li> <li><a href="http://www.jpnn.com/ramadan/berita-ramadan">Berita Ramadan</a></li> <li><a href="http://www.jpnn.com/ramadan/hikmah-ramadan">Hikmah Ramadan</a></li> <li><a href="http://www.jpnn.com/ramadan/kuliner">Kuliner</a></li> <li> <ul class="display-none"> <li><a href="http://www.jpnn.com/ramadan/mozaik-ramadan">Mozaik Ramadan</a></li> <li><a href="http://www.jpnn.com/ramadan/seputar-mudik">Seputar Mudik</a></li> <li><a href="http://www.jpnn.com/ramadan/tips-ramadan">Tips Ramadan</a></li> </ul> <a href="javascript:;" class="showfull">Show More +</a> </li> </ul> </li>-->
			<li>
				<h3><a href="javascript:;" title="More">More...</a></h3>
				<ul>
					<li>
						<a href="http://www.jpnn.com/kriminal" title="Kriminal">Kriminal</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/historiana" title="Historiana">Historiana</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/newhope" title="New Hope">New Hope</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/australia-plus" title="Australia Plus">Australia Plus</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/english" title="English">English</a>
					</li>
					<li>
						<a href="http://www.jpnn.com/indocartoon" title="IndoCartoon">IndoCartoon</a>
					</li>
					<!--<li><a href="<?/*= URL_JPNN*/?>/suara pembaca" title="Suara Pembaca"> Suara Pembaca</a></li>-->
					<!--<li><a href="<?/*= URL_JPNN*/?>/event/bri-peduli-nelayan-sadar-wisata">BRI Peduli Nelayan Sadar Wisata</a></li>-->
				</ul>
			</li>
		</ul>
	</div>
</div>
</header><section>
<div class="ads-large-leaderboard">
	<!-- /51205855/101 -->
	<div id='div-gpt-ad-1475645189744-2' style='height:90px; width:970px; margin:0 auto; overflow:hidden;'>
		<script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1475645189744-2'); });
            </script>
	</div>
</div>
<div class="clearfix doubleenter"></div>
<div id="content-utama" class="width-px-1100 center relative">
	<div class="section-left">
		<div class="artikel" style="width:900px">
			<div class="breadcrumb">
				<a href="<?php echo $berita['url'];?>" title="JPNN.COM">JPNN.COM</a> / <a href="<?php echo $berita['url'];?>" title=" RSS - JPNN.COM">Artikel</a> <?php echo $berita['judul'];?> <a href="" title=""<?php echo $berita['judul'];?></a>
			</div>
			<h1><?php echo $berita['judul'];?></h1>
			<div class="date"><?php echo $berita['waktu'];?></div>
			<div class="relative mar-10 mar-l mar-t mar-r">
				<div class="side-post">
					<div class="mar-15 mar-l mar-r">
						<div class="ads-skycraper">
							<!-- /51205855/r-160x600 -->
							<div id='div-gpt-ad-1475647253332-0' style='height:600px; width:160px;'>
								<script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1475647253332-0'); });
            </script>
							</div>
						</div>
						<div class="enter"></div>
					</div>
				</div>
				<div class="post">
					<div class="foto">
						<img src="<?php echo $berita['gambar'];?>" width="590" height="340" alt="Pelaku Pembunuhan Pulomas Sulit Dijerat Hukuman Mati? - JPNN.COM" title="<?php echo $berita['judul'];?> - JPNN.COM"/>
						<p>
						
						</p>
					</div>
					<p style="text-align: justify;">
						
						<?php echo $berita['isi'];?>
							</p>						<p>
					
					<?php echo $berita['penulis'];?>
													</p>
																	</div>
												
												<div class="doubleenter"></div>
											</div>
											<div class="terkait">
												<h3>Berita Terkait</h3>
												<ul>
													<li>
														<h2><a href="http://www.jpnn.com/news/pembunuhan-sadis-ada-sayatan-di-tangan-korban" title="Pembunuhan Sadis, Ada Sayatan di Tangan Korban - JPNN.COM">Pembunuhan Sadis, Ada Sayatan di Tangan Korban</a></h2>
													</li>
													<li>
														<h2><a href="http://www.jpnn.com/news/bawa-istri-dan-anak-tamasya-sebelum-nahas-di-rumah-dodi" title="Bawa Istri dan Anak Tamasya Sebelum Nahas di Rumah Dodi - JPNN.COM">Bawa Istri dan Anak Tamasya Sebelum Nahas di Rumah Dodi</a></h2>
													</li>
													<li>
														<h2><a href="http://www.jpnn.com/news/bunuh-ibu-hamil-heri-dihukum-20-tahun-bui" title="Bunuh Ibu Hamil, Heri Dihukum 20 Tahun Bui - JPNN.COM">Bunuh Ibu Hamil, Heri Dihukum 20 Tahun Bui</a></h2>
													</li>
													<li>
														<h2><a href="http://www.jpnn.com/news/ahok-komentari-kabar-kedekatan-jokowi-dan-dodi-triono" title="Ahok Komentari Kabar Kedekatan Jokowi dan Dodi Triono - JPNN.COM">Ahok Komentari Kabar Kedekatan Jokowi dan Dodi Triono</a></h2>
													</li>
													<li>
														<h2><a href="http://www.jpnn.com/news/spg-cantik-itu-menangis-di-warung-sebelum-terbunuh" title="SPG Cantik itu Menangis di Warung Sebelum Terbunuh - JPNN.COM">SPG Cantik itu Menangis di Warung Sebelum Terbunuh</a></h2>
													</li>
													<li>
														<h2><a href="http://www.jpnn.com/news/inilah-tampang-alfins-sinaga-sopir-komplotan-ramlan" title="Inilah Tampang Alfins Sinaga Sopir Komplotan Ramlan - JPNN.COM">Inilah Tampang Alfins Sinaga Sopir Komplotan Ramlan</a></h2>
													</li>
												</ul>
											</div>
											<div class="doubleenter"></div>
											<div class="tags">
												 TAGS <i class="fa fa-tags"></i> &nbsp; <a href="http://www.jpnn.com/tag/kasus-pembunuhan-sadis" title="Kasus Pembunuhan Sadis - JPNN.COM">Kasus Pembunuhan Sadis</a><a href="http://www.jpnn.com/tag/pembunuhan-pulomas" title="pembunuhan pulomas - JPNN.COM">pembunuhan pulomas</a>
											</div>
										</div>
										<div class="doubleenter"></div>
									</div>
									
									<div class="relative mar-10 mar-l mar-r">
										<fb:comments href="http://www.jpnn.com/news/pelaku-pembunuhan-pulomas-sulit-dijerat-hukuman-mati" width="780px"></fb:comments>
									</div>
								</div>
							</div>
							
							</div>
						</div>
						</section><footer>
						<div class="nav-menu">
							<div class="width-px-1100 center">
								<ul class="menu-left">
									<li>
										<a href="http://facebook.com/jpnncom" target="_blank" class="fb"><i class="fa fa-facebook"></i><span>Facebook</span></a>
									</li>
									<li>
										<a href="https://twitter.com/jpnncom" target="_blank" class="tw"><i class="fa fa-twitter"></i><span>Twitter</span></a>
									</li>
									<li>
										<a href="https://plus.google.com/u/0/105440276395813137928/posts" target="_blank" class="gp"><i class="fa fa-google-plus"></i><span>Google Plus</span></a>
									</li>
									<li>
										<a href="https://www.youtube.com/channel/UCHYuEi41c1RcoTf8NgJLdkg" target="_blank" class="yt"><i class="fa fa-youtube"></i><span>Youtube</span></a>
									</li>
									<li>
										<a href="http://pinterest.com/jpnncom/" target="_blank" class="pr"><i class="fa fa-pinterest"></i><span>Pinterest</span></a>
									</li>
									<li>
										<a href="http://www.jpnn.com/index.php?mib=rssfeed" class="rs"><i class="fa fa-rss"></i><span>RSS</span></a>
									</li>
								</ul>
								<ul class="menu-right">
									<li>
										<a href="javascript::" class="bt"><i class="fa fa-chevron-up"></i><span>Back to top</span></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="width-px-1100 center border-bottom pad-10 pad-l pad-r pad-t">
							<div class="content-left">
								<a href="http://www.jpnn.com"><img src="http://www.jpnn.com/assets/img/logo-jpnn-default.png" width="200" height="auto" alt="Logo JPNN" class="mar-10 mar-l mar-r mar-t"/></a>
								<p class="bold">PT. JPG Multimedia</p>
								<p>
									Graha Pena Jawa Pos Group Building, 11th floor
								</p>
								<p>
									Jl. Raya Kebayoran Lama 12 Jakarta Selatan
								</p>
								<p>
									Phone : +62 21 5369 9607
								</p>
								<p>
									Fax : +62 21 5365 1465
								</p>
							</div>
							<div class="content-right">
								<div class="title-site">JPNN Site</div>
								<ul class="list-site">
									<li>
										<a href="http://www.jpnn.com/nasional" rel="menu-nasional" title="Nasional">Nasional</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/politik" rel="menu-politik" title="Politik">Politik</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/daerah" rel="menu-daerah" title="Daerah">Daerah</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/ekonomi" rel="menu-ekonomi" title="Ekonomi">Ekonomi</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/internasional" rel="menu-internasional" title="Internasional">Internasional</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/olahraga" rel="menu-olahraga" title="Olahraga">Olahraga</a>
									</li>
								</ul>
								<ul class="list-site">
									<li>
										<a href="http://www.jpnn.com/entertainment" rel="menu-entertainment" title="Entertainment">Entertainment</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/lifestyle" rel="menu-lifestyle" title="Lifestyle">Lifestyle</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/teknologi" rel="menu-teknologi" title="Teknologi">Teknologi</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/kriminal" rel="menu-kriminal" title="Kriminal">Kriminal</a>
									</li>
									<li>
										<a href="http://video.jpnn.com" rel="menu-video" title="Video">Video</a>
									</li>
									<li>
										<a href="http://foto.jpnn.com" rel="menu-foto" title="Foto">Foto</a>
									</li>
								</ul>
								<ul class="list-site">
									<li>
										<a href="http://www.jpnn.com/historiana" rel="menu-historiana" title="Historiana">Historiana</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/newhope">New Hope</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/english" title="English">English</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/australia-plus">Australia Plus</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/donwori" title="Downwori">Donwori</a>
									</li>
									<li>
										<a href="http://www.jpnn.com/index.php?mib=rssfeed" title="Iklan">RSS</a>
									</li>
								</ul>
								<ul class="list-site">
									<li>
										<a href="http://www.jpnn.com/artikel" rel="menu-artikel" title="Artikel">Artikel</a>
									</li>
									<li>
										<a href="http://netizen.jpnn.com" title="Piala Eropa">Suara Netizen</a>
									</li>
									<li>
										<a href="http://blog.jpnn.com" title="Blog">Blog</a>
									</li>
									<li>
										<a href="http://forum.jpnn.com" title="Forum">Forum</a>
									</li>
									<li>
										<a href="https://play.google.com/store/apps/details?id=jpnn.newsreader">Android</a>
									</li>
									<!--<li><a href="http://m.jpnn.com/jpnn.jar">Blackberry</a></li>-->
								</ul>
							</div>
							<div class="clear"></div>
						</div>
						<div class="width-px-1100 center pad-10 pad-l pad-r">
							<div class="copy">Copyrights © 2016. All rights reserved.</div>
							<div class="priv">
								<!--<a href="<?/*= URL_JPNN*/?>/pages/sitemap">Peta Situs</a> |-->
								<a href="http://www.jpnn.com/pages/about">Tentang Kami</a> | <a href="http://www.jpnn.com/pages/info-iklan">Iklan</a> | <a href="http://www.jpnn.com/pages/karir">Karir</a>
								<!--| <a href="http://www.jpnn.com/pages/term-of-use">Term of Use</a> | <a href="<?/*= URL_JPNN*/?>/pages/kebijakan-pemberitaan">Kebijakan Pemberitaan</a> | <a href="<?/*= URL_JPNN*/?>/pages/privacy-policy">Privacy Policy</a>-->
							</div>
							<div class="clear"></div>
						</div>
						</footer>
						</body>
						</html>
 	  <?php }
 	  else{
 	  	
$data=file_get_contents($url);
echo $data;

 	  }
 	   ?>
 	 
              
 	<?php
//$url='http://www.jpnn.com/news/pelaku-pembunuhan-pulomas-sulit-dijerat-hukuman-mati';
//$data=file_get_contents($url);
//echo $data;
?>
 	
</div>
      <!-- /. container-->
  
</body>
<footer>
  <h5>&copy; kemenkominfo 2016</h5>
</footer>

</html>
