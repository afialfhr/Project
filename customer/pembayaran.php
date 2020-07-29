<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION["username"]) AND !isset($_SESSION["password"]))
{
    echo "<script>alert('Akses Terbatas, silahkan Login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

//mendapatkan id pembelian dari url
$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembelian WHERE idpembelian='$idpem'");
$detpem=$ambil->fetch_assoc();

//mendapatkan id pelanggan yang beli
$idpelangganbeli=$detpem["idmember"];

//mendapatkan id pelanggan yang login
$idpelangganlogin=$_SESSION["idmember"];

if ($idpelangganbeli!==$idpelangganlogin)
{
	echo "<script>alert('Akses Terbatas');</script>";
	echo "<script>location='riwayatbelanja.php';</script>";
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
                    <h1>Konfirmasi Pembayaran</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">...<span class="lnr lnr-arrow-right"></span></a>
                        <a href="riwayatbelanja.php">Order's Status<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Konfirmasi Pembayaran</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================ Pay Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <h2>Konfirmasi Pembayaran</h2>
            <p>Kirim bukti pembayaran anda di sini!</p>
            
			<div class="alert alert-info">
				Total Tagihan Anda sebesar Rp. <strong><?php echo number_format($detpem["totalharga"]); ?></strong><br>
				Silahkan lakukan pembayaran Ke:<br>
				<strong>BANK MANDIRI 137-000102-3781 AN. Ponts Fish</strong><br>
				atau ke:<br>
				<strong>BANK BCA 104-000106-3441 AN. Ponts Fish</strong>
			</div>

			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Penyetor</label>
					<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Penyetor..." required>
				</div>
				<div class="form-group">
					<label>Bank</label>
					<input type="text" class="form-control" name="bank" placeholder="Masukkan Bank Setoran..." required>
				</div>
				<div class="form-group">
					<label>Tagihan (Rp.)</label>
					<input type="number" class="form-control" name="tagihan" placeholder="Masukkan Nominal yang dibayarkan..." min="1" required>
					<p class="text-danger">Harap isi sesuai dengan nominal yang tertera pada tagihan, hingga ke 3 digit terakhir!</p>
				</div>
				<div class="form-group">
					<label>Bukti Setoran</label>
					<input type="file" class="form-control" name="bukti" required>
					<p class="text-danger">Bukti harus berformat .JPG, tidak pecah, dan memiliki sudut pencahayaan yang baik saat difoto.<br>
					<strong>Pastikan kembali kejelasan data pada bukti. Foto yang buram akan memperlambat proses transaksi.</strong></p>
				</div>
				<button class="btn btn-primary" name="kirim">Kirim</button>
			</form>
        </div>

<?php
//jika ada tombol kirim
if (isset($_POST["kirim"]))
{
	//upload foto bukti
	$namabukti=$_FILES["bukti"]["name"];
	$lokasibukti=$_FILES["bukti"]["tmp_name"];

	//mengambil data tiap kolom
	$penyetor=$_POST["nama"];
	$bank=$_POST["bank"];
	$tagihan=$_POST["tagihan"];
	$now=date("Y-m-d");

	//simpan pembayaran
	$koneksi->query("INSERT INTO pembayaran (idpembelian, nama, bank, jumlah, tlbayar, buktibayar) VALUES ('$idpem', '$penyetor', '$bank', '$tagihan', '$now', '$namabukti')");
    move_uploaded_file($lokasibukti, "../buktibayar/".$namabukti);

	//update status pembayaran jika sudah bayar
	$tagihan=$koneksi->query("UPDATE pembelian SET status='Pembayaran Berhasil' WHERE idpembelian='$idpem'");

	echo "<script>alert('Pembayaran Berhasil. Silahkan menunggu, Pesanan anda sedang diproses!');</script>";
	echo "<script>location='riwayatbelanja.php'</script>";
}
?>
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