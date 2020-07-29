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
	<h2>Daftar Ulasan</h2>

	<table class="table table-bordered" id="datatables" >
		<thead>
			<tr bgcolor="theme">
						<th>No.</th>
						<th>ID Barang</th>
						<th>ID Pembelian</th>
						<th>Nama Pembeli</th>
						<th>Nama Produk</th>
						<th>Ulasan</th>
					</tr>
				</thead>

				<tbody>
					<?php $no=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM ulasan"); ?>
					<?php while($ulas=$ambil->fetch_assoc()){ ?>
					<tr bgcolor="white">
						<td><strong><?php echo $no; ?>.</strong></td>
						<td><strong><?php echo $ulas["idproduk"]; ?></strong></td>
						<td><strong><?php echo $ulas["idpembelian"]; ?></strong></td>
						<td><strong><?php echo $ulas["namamember"]; ?></strong></td>
						<td><strong><?php echo $ulas["namaproduk"]; ?></strong></td>
						<td><strong><?php echo $ulas["ulasan"]; ?></strong></td>
					</tr>
					<?php } ?>
					<?php $no++; ?>
				</tbody>
			</table>

			<div>
				<a href="media.php?halaman=home" class="btn btn-theme" title="Kembali ke Home"><i class="fa fa-arrow-left"></i>
				</a>
			</div>
</body>
</html>
<?php } ?>