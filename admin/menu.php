<?php error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
    echo "<center><strong>Akses Terbatas. Silahkan Login Terlebih Dahulu!<strong></center><br>";
    echo "<center><strong><a href='login.php'>Login Disini...</a><strong></center><br>";
}
else
{
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
    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-user"></i>
            <span>User</span>
        </a>

        <ul class="sub"> <!-- untuk pengguna, isinya lebih ke privat akun -->
            <li><a href="?halaman=uadmin">Admin</a></li>
            <li><a href="?halaman=umember">Member</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-files-o"></i>
            <span>Data</span>
        </a>

        <ul class="sub">
            <li><a href="?halaman=dadmin">Admin</a></li>
            <li><a href="?halaman=dmember">Member</a></li>
            <li><a href="?halaman=dproduk">Produk</a></li>
            <li><a href="?halaman=dkurir">Kurir</a></li>
            <li><a href="?halaman=dpembelian">Pembelian</a></li>
            <li><a href="?halaman=dulasan">Ulasan</a></li>
            <li><a href="?halaman=dpromo">Promo</a></li>
            <li><a href="?halaman=dongkir">Ongkir</a></li>
            <li><a href="?halaman=dpembayaran">Pembayaran</a></li>
        </ul>
    </li>

<!--     <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-money"></i>
            <span>Transaksi</span>
        </a>
        
        <ul class="sub">
            <li><a href="?halaman=order">Order Masuk</a></li>
            <li><a href="?halaman=laporantransaksi">Laporan Transaksi</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-file"></i>
            <span>Laporan</span>
        </a>
    
        <ul class="sub">
            <li><a href="?halaman=pengunjung">Pengunjung</a></li>
            <li><a href="?halaman=pembelian">Pembelian</a></li>
            <li><a href="?halaman=transaksi-sukses">Transaksi Berhasil</a></li>
            <li><a href="?halaman=transaksi-gagal">Transaksi Bermasalah</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-comments-o"></i>
            <span>Chat</span>
        </a>
        
        <ul class="sub">
            <li><a href="?halaman=lobby">Lobby</a></li>
            <li><a href="?halaman=chat-room">Chat Room</a></li>
            <li><a href="?halaman=mail">Mail</a></li>
        </ul>
    </li> -->

    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-cogs"></i>
            <span>Modul Ekstra</span>
        </a>
        
        <ul class="sub">
            <li><a href="?halaman=customer-online">Customer Online</a></li>
            <li><a href="?halaman=rekening-bank">Rekening Bank</a></li>
            <li><a href="?halaman=link-terkait">Link Terkait</a></li>
            <li><a href="?halaman=panduan">Panduan</a></li>
        </ul>
    </li>

</body>
</html>
<?php } ?>