                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <!DOCTYPE html>
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
#div-edit-keyword{/*divnya*/
  background-color:rgba(108,176, 227, 0.4);
  position:absolute;
  margin-left:auto;
  margin-right:auto;
  margin-top:auto;
  margin-bottom:auto;
  left:0;
  right:0;
}

.table-edit-katakunci{
  margin-top: 15px;
  margin-bottom: 15px;
}
/* HALAMAN UTAMA*/
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
      <?php
        $text=$url=$data_input="";
          if ($id_katakunci_berita==0 && $tipe==0){//tema
            $text = $tema;
            $data_input = "tema";
            $url  = base_url().'index.php/C_kalangan_terbatas/db_edit_tema';
          }elseif($tipe==0){ //tema
            $text=$katakunci;
            $data_input = "katakunci";
            $url = base_url().'index.php/C_kalangan_terbatas/db_edit_katakunci';
          }elseif ($id_katakunci_berita==0 && $tipe==1){
            $text = $tema;
            $data_input = "person";
            $url  = base_url().'index.php/C_kalangan_terbatas/db_edit_person';
          }elseif($tipe==1){
            $text=$katakunci;
            $data_input = "alias";
            $url = base_url().'index.php/C_kalangan_terbatas/db_edit_alias';
          }
      ?>
      <div class="col-md-4" id="div-edit-keyword">
        <form action="<?php echo $url;?>" method="post">
          <input type="hidden" name="id_katakunci_berita" value="<?php echo $id_katakunci_berita;?>">
          <input type="hidden" name="id" value="<?php echo $id_tema;?>">
          <table class="table-edit-katakunci" width="100%">
            <tr>
              <td width="30%"><?php echo ucwords($data_input);?></td>
              <td width="70%"><input type="text" name="<?php echo $data_input;?>" value="<?php echo $text;?>" ></input></td>
            </tr>
            <tr><td colspan="2"><input type="submit" value="Edit"></input></td></tr>
          </table>
        </form>
      </div>
  <!-- ************************************* HALAMAN UTAMA *********************************************** -->
    </div><!--div row-->
  </div><!--div container-->
</body>
</html>
