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
$idpembelian=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembayaran WHERE idpembelian='$idpembelian'");
$detail=$ambil->fetch_assoc();
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
	<h2>Detail Pembayaran</h2>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama Pemesan</th>
				<td><?php echo $detail["nama"]; ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $detail["bank"]; ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($detail["jumlah"]); ?></td>
			</tr>
			<tr>
				<th>Tanggal Pembayaran</th>
				<td><?php echo date("d-m-Y", strtotime($detail["tlbayar"])); ?></td>
			</tr>

			<tr>
				<?php
				$ido=$_GET["ido"];
				$ambil=$koneksi->query("SELECT * FROM ongkir WHERE idongkir='$ido'");
				$detail=$ambil->fetch_assoc();
				?>
				<th>Jasa Pengiriman</th>
				<td><?php echo $detail["namakurir"]; ?> - <?php echo $detail["wilayah"]; ?> - Rp. <?php echo number_format($detail["tarif"]); ?></td>
			</tr>
		</table>
		<hr>
		<form method="POST">
			<div class="form-group">
				<div class="col-md-12">
					<label>Kurir</label>
					<select class="form-control" name="kurir">
						<option>-Pilih Kurir-</option>
						<option value="JNE">JNE</option>
						<option value="Tiki">Tiki</option>
					</select>	
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-12">
					<label>Nomor Resi</label>
					<input type="text" class="form-control" name="resi" placeholder="Masukkan Resi Pengiriman...">
				</div>
			</div><br><br><br><br><br><br><br>

			<div>
				<a href="media.php?halaman=dpembelian" class="btn btn-info"><i class="#" title="Kembali ke Data Pembelian"></i> Kembali</a>
				<button title="Proses Pengiriman" onclick="javascript: return confirm('Pastikan data sudah sesuai!')" name="proses" class="btn btn-primary">Proses</button>
			</div>
		</form>

<?php

$idpembelian=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembayaran WHERE idpembelian='$idpembelian'");
$detail=$ambil->fetch_assoc();

if (isset($_POST["proses"]))
	$resi=$_POST["resi"];
	$kurir=$_POST["kurir"];
	$status="Transaksi Diproses";
{
	if (empty($_POST["resi"]) AND $_POST["kurir"]=="")
	{
		echo "<script>alert('Silahkan isi Nomor Resi dan pilih jenis kurir sesuai dengan permintaan customer sebelum melanjutkan proses!');</script>";
	}

	elseif (empty($_POST["resi"]))
	{
		echo "<script>alert('Silahkan isi Nomor Resi Pengiriman sebelum melanjutkan proses!');</script>";
	}

	elseif (empty($_POST["kurir"]) OR $_POST["kurir"]=="")
	{
		echo "<script>alert('Silahkan pilih Jasa Pengiriman kurir sesuai dengan resi sebelum melanjutkan proses!');</script>";
	}

	else
	{
		$ambil=$koneksi->query("UPDATE pembelian SET status='$status', resi='$resi', kurir='$kurir' WHERE idpembelian='$idpembelian'");

		echo "<script>alert('Data Pembelian telah diperbarui');</script>";
		echo "<script>location='media.php?halaman=dpembelian';</script>";
	}
}
?>
	</div>

	<div class="col-md-6">
		<?php
		$idpembelian=$_GET["id"];
		$ambil=$koneksi->query("SELECT * FROM pembayaran WHERE idpembelian='$idpembelian'");
		$detail=$ambil->fetch_assoc();
		?>
		<img src="../buktibayar/<?php echo $detail['buktibayar'] ?>" width="475">
	</div>
</div>

</form>

<?php } ?>