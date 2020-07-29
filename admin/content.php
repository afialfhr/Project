<?php 
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
    echo "<center><strong>Akses Terbatas. Silahkan Login Terlebih Dahulu!<strong></center><br>";
    echo "<center><strong><a href='login.php'>Login Disini...</a><strong></center><br>";
}
else
{
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
    <?php
    // home
    if ($_GET['halaman']=="home")
    {
        include 'home.php';
    }

    //admin
    elseif ($_GET['halaman']=="uadmin")
    {
        include 'modul/admin/uadmin.php';
    }
    elseif ($_GET['halaman']=="dadmin")
    {
        include 'modul/admin/dadmin.php';
    }
    elseif ($_GET['halaman']=="tambahadmin")
    {
        include 'modul/admin/tambahadmin.php';
    }
    elseif ($_GET['halaman']=="hapusadmin")
    {
      include 'modul/admin/hapusadmin.php';
    }
    elseif ($_GET['halaman']=="editadmin")
    {
      include 'modul/admin/editadmin.php';
    }
    elseif ($_GET['halaman']=="logadmin")
    {
      include 'modul/admin/log.php';
    }

    //produk
    elseif ($_GET['halaman']=="dproduk")
    {
      include 'modul/produk/dproduk.php';
    }
    elseif ($_GET['halaman']=="tambahproduk")
    {
      include 'modul/produk/tambahproduk.php';
    }
    elseif ($_GET['halaman']=="hapusproduk")
    {
      include 'modul/produk/hapusproduk.php';
    }
    elseif ($_GET['halaman']=="editproduk")
    {
      include 'modul/produk/editproduk.php';
    }

    //member
    elseif ($_GET['halaman']=="umember")
    {
      include 'modul/member/umember.php';
    }
    elseif ($_GET['halaman']=="dmember")
    {
      include 'modul/member/dmember.php';
    }
    elseif ($_GET['halaman']=="tambahmember")
    {
      include 'modul/member/tambahmember.php';
    }
    elseif ($_GET['halaman']=="hapusmember")
    {
      include 'modul/member/hapusmember.php';
    }
    elseif ($_GET['halaman']=="editmember")
    {
      include 'modul/member/editmember.php';
    }

    //kurir
    elseif ($_GET['halaman']=="dkurir")
    {
      include 'modul/kurir/dkurir.php';
    }
    elseif ($_GET['halaman']=="tambahkurir")
    {
      include 'modul/kurir/tambahkurir.php';
    }
    elseif ($_GET['halaman']=="hapuskurir")
    {
      include 'modul/kurir/hapuskurir.php';
    }
    elseif ($_GET['halaman']=="editkurir")
    {
      include 'modul/kurir/editkurir.php';
    }

    //ekstra
    elseif ($_GET['halaman']=="dulasan")
    {
      include 'modul/ekstra/dulasan.php';
    }
    elseif ($_GET['halaman']=="detkir")
    {
      include 'modul/ekstra/detkir.php';
    }
    elseif ($_GET['halaman']=="dpembelian")
    {
      include 'modul/ekstra/dpembelian.php';
    }
    elseif ($_GET['halaman']=="detpem")
    {
      include 'modul/ekstra/detpem.php';
    }
    elseif ($_GET['halaman']=="detbay")
    {
      include 'modul/ekstra/detbay.php';
    }
    elseif ($_GET['halaman']=="dpembayaran")
    {
      include 'modul/ekstra/dpembayaran.php';
    }
    elseif ($_GET['halaman']=="lihatpembayaran")
    {
      include 'modul/ekstra/lihatpembayaran.php';
    }
    elseif ($_GET['halaman']=="dongkir")
    {
      include 'modul/ekstra/dongkir.php';
    }
    elseif ($_GET['halaman']=="dpromo")
    {
      include 'modul/ekstra/dpromo.php';
    }
     elseif ($_GET['halaman']=="tambahpromo")
    {
      include 'modul/ekstra/tambahpromo.php';
    }
    elseif ($_GET['halaman']=="editpromo")
    {
      include 'modul/ekstra/editpromo.php';
    }
    elseif ($_GET['halaman']=="hapuspromo")
    {
      include 'modul/ekstra/hapuspromo.php';
    }

    //unregistered page
    else
    {
      include '404.html';
    }
    ?>
</body>
</html>
<?php } ?>