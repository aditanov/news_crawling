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
    <link href="<?php echo base_url().'assets/css/admin.css'?>" rel="stylesheet">
<style>
  .table-user{
    border-collapse: collapse;
  }
  .table-user td{
    border-bottom: 1px solid #ddd;
  }
  .admin-button span a {
    text-decoration: none;
  }
  .otorisasi {
    text-decoration: none;
    color: black;
  }

  .otorisasi:hover{
    text-decoration: none;
    background-color: yellow;
  }

  .row-table:hover{
    background-color: rgba(108,176, 227, 0.2);
  }
  .hapus, .hapus:hover{
    text-decoration: none;
    color: black;
  }
  /*modal*/
  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 250px; /* Location of the box */
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color:  rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.admin-tambah-data {
  border-radius: 0px;
  background-color: #fefefe;
  margin: 0 auto;
  padding: 10px;
  border: 1px solid #888;
  width: 60%;
}

/* The Close Button */
.keluar{
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.keluar:hover, .keluar:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

/*tambah user*/
input[type=email] , input[type=text] , input[type=password], select{
    width: 100%;
    margin: 2px 0;
    padding-top: 0;
    padding-bottom: 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    width:100%;
    height:2em;
}

input[type=email]:focus, input[type=text]:focus , input[type=password]:focus , select:focus {
    border: 3px solid rgb(0, 72, 138);
}

input[type=submit] {
    width:100%;
    height: 2em;
    background: rgb(0, 32, 79);
    background: -webkit-linear-gradient(rgb(0, 32, 79), rgb(0, 53, 130));
    background: -o-linear-gradient(rgb(0, 32, 79), rgb(0, 53, 130));
    background: -o-linear-gradient(rgb(0, 32, 79), rgb(0, 53, 130));
    background: linear-gradient(rgb(0, 32, 79), rgb(0, 53, 130));
    border: 1px solid rgb(5, 5, 5);
    color: rgb(130, 130, 130);
    padding: 1px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 2px;
    cursor: pointer;
}

input[type=submit]:hover{
  color: white;
  background: rgb(0, 32, 79);
}

.table_tambah_user tr td {
  height: 2.1em;
}

/*Ganti password*/
.dropdown-menu{
  border-radius: 0;
}
.dropdown-menu form li {
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 5px;
  padding-bottom: 5px
}
  </style>
</head>
<body>
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
                          <a href="<?php echo base_url().'index.php/Data/index'?>"><b>HOME</b></a>
                      </li>
                      <li class="dropdownn">
                        <a data-toggle="dropdown" href=""><b><?php echo strtoupper($username);?></b></a>
                        <ul class="dropdown-menu" >
                          <li><a href="<?php echo base_url().'index.php/C_admin/admin'?>"><b><?php echo ucwords($email);?></b></a></li>
                          <li><a href="<?php echo base_url().'index.php/auth/logout'?>"><b>Logout</b></a></li>
                        </ul>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
  <!-- **************************************** MENU ***************************************************** -->
  <div class="container">
    <!-- Heading Row -->
    <div class="row">
  <!-- ************************************* HALAMAN UTAMA *********************************************** -->
      <div class="col-md-12" style="text-align:right">
        <div class="admin-button" style="margin: 0 auto;text-align : right; width:90%;">
          <span>
              <div class="dropdown">
              <a data-toggle="dropdown" style="text-decoration:none;" href="">&nbsp; ganti password</a>
              <ul class="dropdown-menu" >
                <form action="<?php echo base_url().'index.php/C_admin/ganti_password'?>" method="post">
                  <li><input type="password" name="password_lama" placeholder="Password" required></input></li>
                  <li><input type="password" id="password" name="password" placeholder="Password Baru" required></input></li>
                  <li><input type="password" id="password2" name="password2" onchange="cekPassword();" placeholder="Ulangi Password Baru" required></input></li>
                  <li><span id="pesan" align="center"></span></li>
                  <li><input type="submit" id="button_submit" value="Ganti Password"></li>
                </form>
              </ul>
            </div>
          </span>
          <span >
              <a href="javascript:a()">&nbsp; tambah user </a>
          </span>
          <span >
              <a href="#topPerson">&nbsp; cari user  </a>
          </span>
        </div>
<!--******************************************* POP UP ADD USER **************************************************-->
        <!-- The Modal -->
        <div id="admin-popup" class="modal">
          <!-- Modal content -->
          <div class="admin-tambah-data">
            <span class="keluar">&times;</span>
            <br/>
            <form action="<?php echo base_url().'index.php/C_admin/tambah_user'?>" method="post" style="margin: 0 auto;">
              <table class="table_tambah_user" style="width:80%;" align= "center">
                  <tr>
                    <td align='left' width="30%">Email</td>
                    <td><input type="email" name="email" required></input></td>
                  </tr>
                  <tr>
                    <td align='left'>Nama</td>
                    <td><input type="text" name="nama" required></input></td>
                  </tr>
                  <tr>
                    <td align='left'>Katasandi</td>
                    <td><input id="password" type="password" name="password" required></input></td>
                  </tr>
                  <tr>
                    <td align='left'>Ulangi Katasandi</td>
                    <td><input id="password2" type="password" name="password2" onchange="cekPassword();" required></input></td>
                  </tr>
                  <tr>
                    <td align='left'>keterangan</td>
                    <td>
                      <select name="otorisasi" required>
                          <option name="otorisasi" value="">Pilih otorisasi</option>
                        <?php foreach ($listHak_Akses as $data_hak_akses): ?>
                          <option name="otorisasi" value="<?php echo $data_hak_akses['id_hak_akses'];?>"><?php echo $data_hak_akses['keterangan'];?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" colspan="2"> <span id="pesan"></span></td>
                  </tr>
                  <tr>
                    <td colspan="2"><input id="button_submit" type="submit" value="tambah data"></input></td>
                  </tr>
              </table>
            </form>
          </div>
        </div>
<!--******************************************* POP UP ADD USER **************************************************-->
      </div>
      <div id="table-responsive" class="col-md-12" style="background-color:white; text-align:center">
          <table class="table-user" width="90%" style="margin: 0 auto">
            <tr style="background-color:rgba(108,176, 227, 0.9)">
              <td width="40%"><b>Email</b></td>
              <td width="20%"><b>Nama</b></td>
              <td width="30%"><b>Otorisasi</b></td>
              <td width="10%"></td>
            </tr>
            <?php foreach ($listUser as $data_user) {?>
              <tr class="row-table">
                <td align="left"><?php echo $data_user['email'];?></td>
                <td align="left"><?php echo $data_user['username'];?></td>

                <?php $link = base_url().'index.php/C_admin/update?email='.$data_user['email'].'&otorisasi=';
                      if(strtolower($data_user['keterangan'])=='admin')
                        $Otorisasi = "<span style='background-color:rgb(91,211,3);color:white;'>&nbsp; admin &nbsp;</span> |<a class='otorisasi' title='aktifkan' href='".$link."2'>&nbsp; kalangan terbatas &nbsp;</a> |<a class='otorisasi' title='aktifkan' href='".$link."3'>&nbsp; publik &nbsp;</a>";
                      elseif(strtolower($data_user['keterangan'])=='kalangan terbatas')
                        $Otorisasi = "<a class='otorisasi' title='aktifkan' href='".$link."1'>&nbsp; admin &nbsp;</a> |<span style='background-color:rgb(91,211,3); color:white;'>&nbsp; kalangan terbatas &nbsp;</span> |<a class='otorisasi' title='aktifkan' href='".$link."3'>&nbsp; publik &nbsp;</a>";
                      else
                        $Otorisasi = "<a class='otorisasi' title='aktifkan' href='".$link."1'>&nbsp; admin &nbsp;</a> |<a class='otorisasi' title='aktifkan' href='".$link."2'>&nbsp; kalangan terbatas &nbsp;</a> |<span style='background-color:rgb(91,211,3); color:white;'>&nbsp; publik &nbsp;</span>";
                ?>
                <td><?php echo $Otorisasi;?></td>
                <td ><a class="hapus" href="<?php echo base_url().'index.php/C_admin/hapus_user?id='.$data_user['email'];?>">Hapus</a></td>
              </tr>
            <?php } ?>
          <table>
      </div>
      <br/><br/>
  <!-- ************************************* HALAMAN UTAMA *********************************************** -->
    </div><!--div row-->
  </div><!--div container-->
<script>
//****************************************** POP UP ADD USER ********************************************
  // Get the modal
  var modal = document.getElementById('admin-popup');
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("keluar")[0];
  // When the user clicks the button, open the modal
  function a() {
      modal.style.display = "block";
  }
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
//******************************************* POP UP ADD USER ***************************************************
  //password dan re-password
  function cekPassword()
  {
    var password = $('#password').val();
    var password2 = $('#password2').val();
    if(password == password2){
      $('#pesan').html('');
      $('#button_submit').prop('disabled',false);
    }
    else{
       $('#pesan').html('Katasandi tidak sama').css('color','red');
       $('#button_submit').prop('disabled',true);
    }
  }
  </script>
</body>
</html>
