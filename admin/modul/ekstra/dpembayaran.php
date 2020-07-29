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
	<h2>Data Promo</h2>

<?php
	if ($_SESSION["posisiadmin"]=='Admin Direksi')
		{ ?>
			<div align="right">
				<a href="media.php?halaman=dproduk" class="btn btn-theme03" title="Data Produk"><i class="fa fa-files-o"></i></a>
			</div>

			<table class="table table-bordered" id="datatables">
				<thead>
					<tr bgcolor="theme">
						<th>No.</th>
						<th>ID Promo</th>
						<th>ID Barang</th>
						<th>Nama Barang</th>
						<th>Harga Barang Normal</th>
						<th>Diskon</th>
						<th>Harga Barang Diskon</th>
						<th>Foto Barang</th>
						<th>Deskripsi Barang</th>
						<th>Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM promo"); ?>
					<?php while($promo=$ambil->fetch_assoc()){ ?>
					<tr bgcolor="white">
						<td><?php echo $nomor; ?>.</td>
						<td><?php echo $promo["idpromo"]; ?></td>
						<td><?php echo $promo["idproduk"]; ?></td>
						<td><?php echo $promo["namaproduk"]; ?></td>
						<td>Rp. <?php echo number_format($promo["harganormal"]); ?></td>
						<td><?php echo $promo["diskon"]; ?> %</td>
						<td>Rp. <?php echo number_format($promo["hargadiskon"]); ?></td>
						<td>
							<img src="../fotoproduk/<?php echo $promo["fotoproduk"]; ?>" width="150">
						</td>
						<td><?php echo $promo["deskripsiproduk"]; ?></td>
						<td>
							<a href="media.php?halaman=hapuspromo&id=<?php echo $promo['idpromo'] ?>" class="btn-danger btn" onclick="javascript: return confirm('Anda yakin ingin menghapus Promo ini?')" title="Hapus Promo"><i class="fa fa-eraser"></i></a><br><br>
							
							<a href="media.php?halaman=editpromo&id=<?php echo $promo['idpromo'] ?>" class="btn btn-warning" title="Edit Promo"><i class="fa fa-edit"></i></a>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
		<?php }

		else
			{ ?>
				<div align="right">
					<a href="media.php?halaman=dproduk" class="btn btn-theme03" title="Data Produk"><i class="fa fa-files-o"></i></a>
				</div>

				<table class="table table-bordered" id="datatables">
					<thead>
						<tr bgcolor="theme">
							<th>No.</th>
							<th>ID Promo</th>
							<th>ID Barang</th>
							<th>Nama Barang</th>
							<th>Harga Barang Normal (Rp.)</th>
							<th>Diskon</th>
							<th>Harga Barang Diskon (Rp.)</th>
							<th>Foto Barang</th>
							<th>Deskripsi Barang</th>
							<th>Opsi</th>
						</tr>
					</thead>

					<tbody>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT * FROM promo"); ?>
						<?php while($promo=$ambil->fetch_assoc()){ ?>
						<tr bgcolor="white">
							<td><?php echo $nomor; ?>.</td>
							<td><?php echo $promo["idpromo"]; ?></td>
							<td><?php echo $promo["idproduk"]; ?></td>
							<td><?php echo $promo["namaproduk"]; ?></td>
							<td><?php echo number_format($promo["harganormal"]); ?></td>
							<td><?php echo $promo["diskon"]; ?></td>
							<td><?php echo number_format($promo["hargadiskon"]); ?></td>
							<td>
								<img src="../fotoproduk/<?php echo $promo["fotoproduk"]; ?>" width="150">
							</td>
							<td><?php echo $promo["beratproduk"]; ?></td>
							<td><?php echo $promo["stokproduk"]; ?></td>
							<td><?php echo $promo["deskripsiproduk"]; ?></td>
							<td>
								<a href="media.php?halaman=hapuspromo&id=<?php echo $promo['idpromo'] ?>" class="btn-danger btn" onclick="javascript: return confirm('Anda yakin ingin menghapus Promo ini?')" title="Hapus Promo"><i class="fa fa-eraser"></i></a><br><br>
								
								<a href="media.php?halaman=editpromo&id=<?php echo $promo['idpromo'] ?>" class="btn btn-warning" title="Edit Promo"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php $nomor++; ?>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>

			<div>
				<a href="media.php?halaman=home" class="btn btn-theme" title="Kembali ke Home"><i class="fa fa-arrow-left"></i>
				</a>
			</div>
</body>
</html>
<?php } ?>