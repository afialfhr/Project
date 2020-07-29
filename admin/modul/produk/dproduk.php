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
	<h2>Data Produk</h2>

<?php
	if ($_SESSION["posisiadmin"]=='Admin Direksi')
		{ ?>
			<div align="right">
				<a href="media.php?halaman=tambahproduk" class="btn btn-theme04" title="Tambah Produk"><i class="fa fa-plus-square"></i></a>
				<a href="media.php?halaman=dpromo" class="btn btn-theme03" title="Data Promo"><i class="fa fa-scissors"></i></a>
			</div>

			<table class="table table-bordered" id="datatables">
				<thead>
					<tr bgcolor="theme">
						<th>No.</th>
						<th>ID</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Foto</th>
						<th>Berat</th>
						<th>Stok</th>
						<th>Deskripsi</th>
						<th>Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
					<?php while($produk=$ambil->fetch_assoc()){ ?>
					<tr bgcolor="white">
						<td><?php echo $nomor; ?>.</td>
						<td><?php echo $produk["idproduk"]; ?></td>
						<td><?php echo $produk["namaproduk"]; ?></td>
						<td width="100">Rp. <?php echo number_format($produk["hargaproduk"]); ?></td>
						<td>
							<img src="../fotoproduk/<?php echo $produk["fotoproduk"]; ?>" width="150">
						</td>
						<td width="75"><?php echo $produk["beratproduk"]; ?> Gr.</td>
						<td><?php echo $produk["stokproduk"]; ?></td>
						<td><?php echo $produk["deskripsiproduk"]; ?></td>
						<td>
							<a href="media.php?halaman=hapusproduk&id=<?php echo $produk['idproduk'] ?>&fotoproduk=<?php echo $produk['fotoproduk'] ?>" class="btn-danger btn" onclick="javascript: return confirm('Anda yakin ingin menghapus item ini?')" title="Hapus Produk"><i class="fa fa-eraser"></i></a><br><br>
							
							<a href="media.php?halaman=editproduk&id=<?php echo $produk['idproduk'] ?>&fotoproduk=<?php echo $produk['fotoproduk'] ?>" class="btn btn-warning" title="Edit Produk"><i class="fa fa-edit"></i></a><br><br>
							
							<a href="media.php?halaman=tambahpromo&id=<?php echo $produk['idproduk'] ?>" class="btn btn-info" title="Beri Promo"><i class="fa fa-scissors"></i></a>
							
							<!-- <a href="media.php?halaman=tambahpromo&id=<?php echo $produk['idproduk'] ?>&namaproduk=<?php echo $produk['namaproduk'] ?>&hargaproduk=<?php echo $produk['hargaproduk'] ?>&fotoproduk=<?php echo $produk['fotoproduk'] ?>&deskripsiproduk=<?php echo $produk['deskripsiproduk'] ?>" class="btn btn-info" title="Beri Promo"><i class="fa fa-scissors"></i></a> -->

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
					<a href="media.php?halaman=tambahproduk" class="btn btn-theme04" title="Tambah Produk"><i class="fa fa-plus-square"></i></a>
					<a href="media.php?halaman=dpromo" class="btn btn-theme03" title="Data Promo"><i class="fa fa-scissors"></i></a>
				</div>
				
				<table class="table table-bordered" id="datatables">
					<thead>
						<tr bgcolor="theme">
							<th>No.</th>
							<th>ID</th>
							<th>Nama</th>
							<th>Harga</th>
							<th>Foto</th>
							<th>Berat</th>
							<th>Stok</th>
							<th>Deskripsi</th>
							<th>Opsi</th>
						</tr>
					</thead>

					<tbody>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
						<?php while($produk=$ambil->fetch_assoc()){ ?>
						<tr bgcolor="white">
							<td><?php echo $nomor; ?>.</td>
							<td><?php echo $produk["idproduk"]; ?></td>
							<td><?php echo $produk["namaproduk"]; ?></td>
							<td width="100">Rp. <?php echo number_format($produk["hargaproduk"]); ?></td>
							<td>
								<img src="../fotoproduk/<?php echo $produk["fotoproduk"]; ?>" width="150">
							</td>
							<td width="75"><?php echo $produk["beratproduk"]; ?> Gr.</td>
							<td><?php echo $produk["stokproduk"]; ?></td>
							<td><?php echo $produk["deskripsiproduk"]; ?></td>
							<td>
								<a href="media.php?halaman=editproduk&id=<?php echo $produk['idproduk'] ?>&fotoproduk=<?php echo $produk['fotoproduk'] ?>" class="btn btn-warning" title="Edit Produk"><i class="fa fa-edit"></i></a>
								
								<a href="media.php?halaman=tambahpromo&id=<?php echo $produk['idproduk'] ?>" class="btn btn-info" title="Beri Promo"><i class="fa fa-scissors"></i></a>
								
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