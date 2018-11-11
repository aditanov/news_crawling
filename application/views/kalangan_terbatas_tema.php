
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
/*  HALAMAN UTAMA  */
#table-list-katakunci{/*divnya*/
  height: 50px;
  position:absolute;
  margin-left:auto;
  margin-right:auto;
  margin-top:auto;
  margin-bottom:auto;
  left:0;
  right:0;
}
/*JUDUL TEMA*/
#table-list-katakunci hr{
  background-color: rgb(108,176, 227);
  height: 0.15em;
  width: 100%;
  margin-top: 0;
  margin-bottom: 0;
}

#table-list-katakunci h3{
  margin-left: 10px;
  margin-right: 10px;
  margin bottom: 0;
}
/*JUDUL TEMA*/

/*BUTTON DIATAS TABLE*/
.button-view-katakunci{
  text-align: right;
  margin-right: 5px;
}
.button-view-katakunci  span a {
  text-decoration: none;
}

/*BUTTON DIATAS TABLE*/
/*TABLE KATAKUNCI*/
.table-katakunci{
  border-collapse: collapse;
}
.table-katakunci td{
  margin-left: 10px;
  border-bottom: 1px solid #ddd;
}

.table-katakunci tr:hover{
  background-color: rgba(108,176, 227, 0.2);
}

.table-katakunci tr td a{
  text-decoration: none;
  color: black;
}
/*TABEL KATA KUNCI*/
/*  HALAMAN UTAMA  */
/*tambah user*/
input[type=email] , input[type=text] , input[type=password], select, input[type=number]{
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

input[type=email]:focus, input[type=text]:focus , input[type=password]:focus , select:focus, input[type=number]:focus {
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

/**************************************** POP UP KALANGAN TERBATAS ****************************************/
  .modal_kalangan_terbatas {

        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.5);
        z-index: 99999;
        opacity:0;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
    }

    .modal_kalangan_terbatas:target {
        opacity:1;
        pointer-events: auto;
    }

    .modal_kalangan_terbatas > div {
        width: 40%;
        position: relative;
        margin: 15% auto;
        padding: 5px 15px 20px 15px;
        border-radius: 0;
        background: #FFF;
    }

    .close {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
    }

    .close:hover { background: #00d9ff; }
/**************************************** POP UP KALANGAN TERBATAS ****************************************/

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
                          <li><a href="<?php echo base_url().'index.php/C_kalangan_terbatas/kalangan_terbatas'?>"><b><?php echo ucwords($email);?></b></a></li>
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
    <div class="row" >
  <!-- ************************************* HALAMAN UTAMA *********************************************** -->
      <div class="col-md-8" id="table-list-katakunci">
          <h3><?php echo ucwords($tema);?></h3>
          <hr>
          <div class="button-view-katakunci">
            <span>
                <a href="#popup_add">
                  &nbsp;&nbsp; <?php if($tipe == 0) echo "Tambah Katakunci"; elseif($tipe ==1) echo "Tambah Alias Person";?>
                </a>
            </span>
            <span>
                <a href="<?php echo base_url().'index.php/C_kalangan_terbatas/edit?ty='.$tipe.'&q1=0&q2='.$id_tema?>">
                  &nbsp;&nbsp; <?php if($tipe==0) echo "Edit Tema"; elseif($tipe==1) echo "Edit Person";?>
                </a>
            </span>
            <span>
              <?php if($tipe == 0){?>
                <a href="<?php echo base_url().'index.php/C_kalangan_terbatas/hapus_tema?ty='.$tipe.'&id='.$id_tema?>">
                  &nbsp;&nbsp; Hapus Tema
                </a>
              <?php }elseif($tipe == 1){?>
                <a href="<?php echo base_url().'index.php/C_kalangan_terbatas/hapus_person?ty='.$tipe.'&id='.$id_tema?>">
                  &nbsp;&nbsp; Hapus Person
                </a>
              <?php } ?>
            </span>
          </div>
          <br/>
          <table>
            <table class="table-katakunci" width="90%" style="margin: 0 auto">
              <tr style="background-color:rgba(108,176, 227, 0.9)">
                <td width="75%"><b><?php if($tipe==0) echo "Katakunci"; elseif($tipe==1) echo "Alias Person";?></b></td>
                <td width="10%"></td>
                <td width="5%"></td>
                <td width="10%"></td>
              </tr>

              <?php
               if($tipe == 0){
               foreach ($listKatakunci as $data_katakunci): ?>
                <tr>
                  <td><?php echo $data_katakunci['katakunci'];?></td>
                  <td align="center" title="Edit Katakunci"><a href="<?php echo base_url().'index.php/C_kalangan_terbatas/edit?ty=0&q1='.$data_katakunci['id_katakunci_berita'].'&q2='.$id_tema?>">edit</td>
                  <td align="center">|</td>
                  <td align="center" title="Hapus Katakunci"><a href="<?php echo base_url().'index.php/C_kalangan_terbatas/hapus_keyword?id_keyword='.$data_katakunci['id_katakunci_berita'].'&id_tema='.$id_tema?>">hapus</a></td>
                </tr>
              <?php endforeach;
              }elseif ($tipe ==1) {
              foreach ($listKatakunci as $data_aliasperson):?>
                <tr>
                  <td><?php echo $data_aliasperson['alias_person'];?></td>
                  <td align="center" title="Edit Katakunci"><a href="<?php echo base_url().'index.php/C_kalangan_terbatas/edit?ty=1&q1='.$data_aliasperson['id_alias_person'].'&q2='.$id_tema?>">edit</td>
                  <td align="center">|</td>
                  <td align="center" title="Hapus Katakunci"><a href="<?php echo base_url().'index.php/C_kalangan_terbatas/hapus_alias?id_alias='.$data_aliasperson['id_alias_person'].'&id_person='.$id_tema?>">hapus</a></td>
                </tr>
              <?php
              endforeach;
              }
              ?>
          </table>

      </div>
  <!-- ************************************* HALAMAN UTAMA *********************************************** -->
  <!--******************************************* POP UP ADD **************************************************-->
          <!-- The Modal -->
          <div id="popup_add" class="modal_kalangan_terbatas">
            <!-- Modal content -->
            <div class="kalangan_terbatas_tambah_data">
              <a href="#close" title="Close" class="close">&times;</a>
              <br/>
              <form action="<?php echo base_url().'index.php/C_kalangan_terbatas/tambah_keyword'?>" method="post" style="margin: 0 auto;">
                <table class="table_tambah_user" style="width:80%;" align= "center">
                    <input type="hidden" name="ty" value="<?php echo $tipe;?>"></input>
                    <input type="hidden" name="id" value="<?php echo $id_tema?>"></input>
                    <tr>
                      <td align='left' width="30%">Banyaknya<?php if($tipe == 0) echo " Katakunci";
                          elseif ($tipe == 1) echo " Alias";?></td>
                      <td><input type="number" min="1" max="50" name="jumlah" required></input></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input id="button_submit" type="submit" value="Tambah Data"></input></td>
                    </tr>
                </table>
              </form>
            </div>
          </div>
  <!--******************************************* POP UP ADD  **************************************************-->
    </div><!--div row-->
  </div><!--div container-->
</body>
</html>
