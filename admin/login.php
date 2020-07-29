<?php
session_start();
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Ponts Fish - Admin</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- DataTables -->
  <link rel="stylesheet" href="assets/DataTables/datatables.min.css">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css"/>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
</head>

<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="cekloginadmin.php" method="POST">
        <h2 class="form-login-heading">Log In</h2>
        <div class="login-wrap">
          
          <input type="text" class="form-control" placeholder="Username" autofocus name="username" value="<?php if(isset($_COOKIE["username"]))
          {
            echo $_COOKIE["username"];
          } ?>"><br>

          <input type="password" class="form-control" placeholder="Password" name="password">

          <div align="right">
            <label class="checkbox">
              <input type="checkbox" name="rememberme" value="TRUE" id="rememberme"<?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?> /> Remember me
            </label>
          </div>

          <button class="btn btn-theme btn-block" type="submit" name="login"><i class="fa fa-lock"></i> SIGN IN</button>
        </div>

        <font color="red">
            <strong>*Pendaftaran hanya dapat dilakukan oleh direksi!</strong>
        </font>

      </form>
    </div>
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>

  <!-- BACKGROUND LOGIN -->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>

  <script>
    // background pas login
    $.backstretch("img/tes.jpg",
    {
      speed: 500
    });
  </script>
</body>
</html>