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
$idpembayaran=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembelian WHERE idpembelian='$idpembayaran'");
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
	<h2>Data Pembayaran</h2>

	<div class="row">
		<div class="col-md-4">
			<h3>Pembelian</h3>
			Nomor Pembelian: <strong><?php echo $detail['idpembelian']; ?></strong><br>
			Tanggal: <strong><?php echo $detail['tlbeli']; ?></strong><br>
			Total: <strong>Rp. <?php echo number_format($detail['totalharga']); ?></strong><br>
			Status Pembelian: <strong><?php echo $detail['status']; ?></strong><br>
			Resi Pengiriman: <strong><?php echo $detail['resi']; ?></strong>
		</div>

		<div class="col-md-4">
			<h3>Pemilik Akun</h3>
			<?php
			$idm=$detail["idmember"];
			$ambil=$koneksi->query("SELECT * FROM member WHERE idmember='$idm'");
			$detmem=$ambil->fetch_assoc(); ?>
			<strong><?php echo $detmem['namamember']; ?></strong><br><br>
			Nomor Telefon Pengguna:<br><strong><?php echo $detmem['telefonmember']; ?></strong><br>
			Email Pengguna: <br><strong><?php echo $detmem['emailmember']; ?></strong>
		</div>

	<div class="col-md-4">
		<h3>Pengiriman</h3>
			Pemesan: <strong><?php echo $detail['pemesan']; ?></strong><br>
			Nomor Telefon Pemesan: <strong><?php echo $detail['telefon']; ?></strong><br>
			Alamat Kirim: <br> <strong><?php echo $detail['alamatkirim']; ?>, <?php echo $detail['wilayah']; ?></strong><br>
			Ongkos Kirim: <strong>Rp. <?php echo number_format($detail['tarif']); ?></strong><br>
			Kurir: <strong><?php echo $detail['kurir']; ?></strong><br>
			Catatan: <strong><?php echo $detail['catatan']; ?></strong><br>
	</div>
</div>

<table class="table table-bordered" id="datatables">
	<thead>
		<tr bgcolor="theme">
			<th>No.</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>

	<tbody>
		<?php $nomor=1; ?>
		<?php
		$ambil=$koneksi->query("SELECT * FROM pempro JOIN produk ON pempro.idproduk=produk.idproduk WHERE pempro.idpembelian='$_GET[id]'"); ?>
		<?php while ($data=$ambil->fetch_assoc())
		{ ?>
		<tr bgcolor="white">
			<td><?php echo $nomor; ?></td>
			<td><?php echo $data["namaproduk"]; ?></td>
			<td>Rp. <?php echo number_format($data["hargaproduk"]); ?>,-</td>
			<td><?php echo $data["jumlah"]; ?></td>
			<td>
				Rp. <?php echo number_format($data["hargaproduk"]*$data["jumlah"]); ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>

	<tfoot>
		<tr bgcolor="white">
			<th colspan="4">Total Pembelian + Ongkos Kirim ke Wilayah <?php echo $detail["wilayah"]; ?> (Rp. <?php echo number_format($detail["tarif"]); ?>) :</th>
			<th>Rp. <?php echo number_format($detail['totalharga']); ?></th>
		</tr>
	</tfoot>
</table>

		<div>
			<a href="media.php?halaman=dpembelian" class="btn btn-theme" title="Kembali Data Pembelian"><i class="fa fa-arrow-left"></i>
			</a>
		</div>
</body>
</html>
<?php } ?>