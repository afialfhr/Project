<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION["username"]) AND !isset($_SESSION["password"]))
{
    echo "<script>alert('Akses Terbatas, silahkan Login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

$idpem=$_GET["id"];

$ambil=$koneksi->query("SELECT * FROM pembayaran
	LEFT JOIN pembelian ON pembayaran.idpembelian=pembelian.idpembelian
	WHERE pembelian.idpembelian='$idpem'");
$detbay=$ambil->fetch_assoc();


//jika belum ada data pembayaran
if (empty($detbay))
{
	echo "<script>alert('Akses Terbatas - belum ada data pembayaran');</script>";
	echo "<script>location='riwayatbelanja.php';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">

    <!-- Author Meta -->
    <meta name="author" content="CodePixar">

    <!-- Meta Description -->
    <meta name="description" content="">

    <!-- Meta Keyword -->
    <meta name="keywords" content="">

    <!-- meta character set -->
    <meta charset="UTF-8">
    
    <!-- FONTAWESOME STYLES-->
    <link rel="stylesheet" href="fa/css/all.css">

    <!-- Site Title -->
    <title>Ponts Fish</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php include 'header.php'; ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Detail Pembayaran</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">...<span class="lnr lnr-arrow-right"></span></a>
                        <a href="riwayatbelanja.php">Order's Status<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Cek Pembayaran</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================ Pay Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <h2>Detail Pembayaran</h2>
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>Nama</th>
						<td><?php echo $detbay["nama"]; ?></td>
					</tr>
					<tr>
						<th>Bank</th>
						<td><?php echo $detbay["bank"]; ?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo date("d-m-Y", strtotime($detbay["tlbayar"])); ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($detbay["jumlah"]); ?> </td>
					</tr>
				</table>
			</div>
			<div class="col-md-4">
				<img class="img-responsive" src="../buktibayar/<?php echo $detbay["buktibayar"] ?>" width=500>
			</div>
		</div>
    </section>
    <!--================ End Pay Area =================-->

<?php include 'footer.php'; ?>

<!-- javascript -->
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>