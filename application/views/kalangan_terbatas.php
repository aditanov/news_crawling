
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

.heading-tema{
  width: 30%;
  float: left;
  margin: 0;
}

.heading-tema h1{
  font-weight : bold;
  color: rgba(108,176, 227, 0.9);
}

.daftar-tema{
  width: 70%;
  float: right;
  margin-top: 20px ;
}

.daftar-tema hr{
  width: 100%;
  height: 0.1em;
  background-color:rgba(108,176, 227, 0.5);
  margin: 2px;
}

.daftar-tema p, .daftar-tema p a, .daftar-tema p a:hover{
  margin: 0;
  padding-left: 5px;
  padding-right: 5px;
  text-decoration: none;
  color: black;
}
.daftar-tema p:hover{
  background-color:rgba(108,176, 227, 0.2);
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
    <div class="row">
  <!-- ************************************* HALAMAN UTAMA *********************************************** -->
  <!-- ***************************************** TEMA **************************************************** -->
      <div class="col-md-6" >
          <div class="heading-tema">
              <h1>Tema</h1>
          </div>
          <div  class="daftar-tema">
              <div style="text-align: right; margin-right: 5px;">
                <span>
                    <a title="Tambah Tema" style="text-decoration:none;"href="#popup_tema">&nbsp;&nbsp; Tambah Tema </a>
                </span>
              </div>
              <hr>
              <?php foreach ($list_tema as $dataTema): ?>
                <p><a title="lihat katakunci" href="<?php echo base_url().'index.php/C_kalangan_terbatas/lihatTema?ty=0&id='.$dataTema['id'];?>"><?php echo ucwords($dataTema['tema']);?></a></p>
                <hr>
              <?php endforeach; ?>
          </div>
      </div>
  <!-- ***************************************** TEMA **************************************************** -->
  <!-- ***************************************** PERSON **************************************************** -->
      <div class="col-md-6" >
          <div class="heading-tema">
              <h1>Person</h1>
          </div>
          <div  class="daftar-tema">
              <div style="text-align: right; margin-right: 5px;">
                <span>
                    <a title="Tambah Person" style="text-decoration:none;" href="#popup_person">&nbsp;&nbsp; Tambah Person </a>
                </span>
              </div>
              <hr>
              <?php foreach ($list_person as $dataPerson): ?>
                <p><a title="lihat katakunci" href="<?php echo base_url().'index.php/C_kalangan_terbatas/lihatTema?ty=1&id='.$dataPerson['id_person'];?>"><?php echo ucwords($dataPerson['person']);?></a></p>
                <hr>
              <?php endforeach; ?>
          </div>
      </div>
  <!-- ***************************************** PERSON **************************************************** -->
  <!-- ************************************* HALAMAN UTAMA *********************************************** -->
  <!--******************************************* POP UP ADD TEMA **************************************************-->
          <!-- The Modal -->
          <div id="popup_tema" class="modal_kalangan_terbatas">
            <!-- Modal content -->
            <div class="div_tambah_data">
              <a href="#close" title="Close" class="close">&times;</a>
              <br/>
              <form action="<?php echo base_url().'index.php/C_kalangan_terbatas/tambah_tema'?>" method="post" style="margin: 0 auto;">
                <table class="table_tambah_user" style="width:80%;" align= "center">
                    <tr>
                      <td align='left' width="30%">Tema</td>
                      <td><input type="text" name="tema" required></input></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input id="button_submit" type="submit" value="Tambah Tema"></input></td>
                    </tr>
                </table>
              </form>
            </div>
          </div>
  <!--******************************************* POP UP ADD TEMA **************************************************-->
  <!--******************************************* POP UP ADD PERSON **************************************************-->
          <!-- The Modal -->
          <div id="popup_person" class="modal_kalangan_terbatas">
            <!-- Modal content -->
            <div class="div_tambah_data">
              <a href="#close" title="Close" class="close">&times;</a>
              <br/>
              <form action="<?php echo base_url().'index.php/C_kalangan_terbatas/tambah_person'?>" method="post" style="margin: 0 auto;">
                <table class="table_tambah_user_PERSON" style="width:80%;" align= "center">
                    <tr>
                      <td align='left' width="30%">Person</td>
                      <td><input type="text" name="person" required></input></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input id="button_submit" type="submit" value="Tambah"></input></td>
                    </tr>
                </table>
              </form>
            </div>
          </div>
  <!--******************************************* POP UP ADD PERSON **************************************************-->
    </div><!--div row-->
  </div><!--div container-->
</body>
</html>
