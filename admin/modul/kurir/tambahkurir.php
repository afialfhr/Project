<?php 
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
	echo "<center><strong>Akses Terbatas. Silahkan Login Terlebih Dahulu!<strong></center><br>";
	echo "<center><strong><a href='../../login.php'>Login Disini...</a><strong></center><br>";
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
	<title>Mutiara Botol - Admin</title>

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
	<div class="row mt">
		<div class="col-lg-12">
			<h2>Tambah Kurir</h2>
			<div class="form-panel">
				<form method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Nama Perusahaan</strong></strong></label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" required>
						</div>
					</div><br><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Nomor Telefon Perusahaan</strong></label>
						<div class="col-sm-10">
							<input type="number" name="telefon" class="form-control" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Alamat Email Perusahaan</strong></label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Alamat Pusat Perusahaan</strong></label>
						<div class="col-sm-10">
							<textarea type="text" name="alamat" class="form-control" required></textarea>
						</div>
					</div><br><br><hr>

					<div align="right">
						<a href="media.php?halaman=dkurir" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</a>
						<button class="btn btn-theme04" name="save">Tambah <i class="fa fa-plus-square"></i></button>
					</div>
				</form>

<?php
if (isset($_POST['save']))
{
	$nama=$_POST["nama"];
	$telefon=$_POST["telefon"];
	$email=$_POST["email"];
	$alamat=$_POST["alamat"];
	$idad=$_SESSION["idadmin"];
	$naad=$_SESSION["namaadmin"];
	$log="Menambahkan Data Kurir dengan Nama: $nama";

	$now=date("Y-m-d H:i:s");

	$koneksi->query("INSERT INTO kurir (namakurir, telefonkurir, emailkurir, alamatkurir) VALUES ('$nama', '$telefon', '$email', '$alamat')");
	$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");

	echo "<script>alert('Data Kurir baru Berhasil Disimpan');</script>";
	echo "<script>location='media.php?halaman=dkurir'</script>";
}
?>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>