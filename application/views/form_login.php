<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap Core CSS -->
    <link rel="icon" href="<?php echo base_url().'assets/images/logo_kominfo.png'?>" type="image/gif">
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/login.css'?>" rel="stylesheet">
  </head>
  <body style=" background-image: url('<?php echo base_url().'assets/images/background.png'?>');">
    <div class="container">
        <!-- Heading Row -->
        <div class="row">
          <div id="box-login" class="col-md-5">
<!--*************************************BAGIAN HEADER FORM******************************************************-->
              <div id="box-login-header" class="col-md-4">
                  <img src="<?php echo base_url().'assets/images/logo_kominfo2.png'?>" />
                  <h5>
                    Direktorat Pengolahan dan Penyediaan Informasi
                    <br/>Direktorat Jendral Informasi dan Komunikasi Publik
                    <br/>Kementerian Komunikasi dan Informatika
                  </h5>
              </div>
              <br/>
              <br/>
<!--*************************************BAGIAN HEADER FORM******************************************************-->
<!--*************************************BAGIAN FORM LOGIN ******************************************************-->
              <div class="clear"></div>
              <div class="box-login-form" style="">
                    <br/>
                    <form action="<?php echo base_url('index.php/Auth/validate');?>" method="post" style="">
                        <table>
                            <tr>
                                <td><input placeholder="Email" type="email" name="email"/></td>
                            </tr>
                            <tr>
                                <td><input placeholder="Password" type="password" name="password"></td>
                            </tr>
                                <?php
                                if($error!="")
                                  echo "<tr><td style='color:red; text-align:center'>".$error."</td></tr>";
                                ?>
                            <tr>
                                <td><input type="submit" value="Login"/></td>
                            </tr>
                        </table>
                    </form>
              </div>
<!--*************************************BAGIAN FORM LOGIN ******************************************************-->
          </div>
        </div>
    </div>

  </body>
</html>
