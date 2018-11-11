<!DOCTYPE html>
<html>
<title>Social Media</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url().'assets/css/twit.css'?>" rel="stylesheet">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="#" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a></li>
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a href="#">One new friend request</a>
      <a href="#">John Doe posted on your wall</a>
      <a href="#">Jane likes your post</a>
    </div>
  </li>
  <li class="w3-hide-small w3-right"><a href="#" class="w3-padding-large w3-hover-white" title="My Account"><img src="/w3images/avatar2.png" class="w3-circle" style="height:25px;width:25px" alt="Analisis Twitter"></a></li>
 </ul>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="#">Link 1</a></li>
    <li><a class="w3-padding-large" href="#">Link 2</a></li>
    <li><a class="w3-padding-large" href="#">Link 3</a></li>
    <li><a class="w3-padding-large" href="#">My Profile</a></li>
  </ul>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">



      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">

<!-- **************************************** BUAT AKUN ***************************************************** -->



<?php foreach($akun as $akun1) { ?>


					 <div class="w3-btn-block w3-theme-l1 w3-left-align">
          <a href="tamp?url=<?php echo $akun1->id_akun;?>"><?php echo $akun1->akun;?></a>
        </div>
          <div id="Demo1" class="w3-accordion-content w3-container">
          </div>


<?php } ?>

         <div class="w3-btn-block w3-theme-l1 w3-left-align">
          <a href="twit">ALL Akun</a>
        </div>

         <div id="Demo3" class="w3-accordion-content w3-container">
         <div class="w3-row-padding">

         <br>
<!-- **************************************** BUAT AKUN ***************************************************** -->



         </div>
          </div>
        </div>
      </div>
      <br>



    <!-- End Left Column -->
    </div>

    <!------------------------------------------------ ISI TWEET ---------------------------------------->
    <div class="w3-col m7">

   <?php
 foreach($sosmed as $tweet) { ?>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="<?php echo $tweet->gambar?>" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity"><?php echo $tweet->tanggal." ".$tweet->jam;?></span>
        <h4><?php echo $tweet->nama;?></h4><br>
        <hr class="w3-clear">
        <p><?php echo $tweet->isi;?></p>
      </div>
<?php }
?>


    <!---------------------------------------------- End ISI TWEET ------------------------------>
    </div>



  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">

</footer>


<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>
