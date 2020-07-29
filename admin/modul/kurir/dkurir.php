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
	<h2>Data Perusahaan Kurir</h2>

<?php
	if ($_SESSION["posisiadmin"]=='Admin Direksi')
		{ ?>
			<div align="right">
				<a href="media.php?halaman=tambahkurir" class="btn btn-theme04" title="Tambah Kurir"><i class="fa fa-plus-square"></i></a>
			</div>

			<table class="table table-bordered" id="datatables">
				<thead>
					<tr bgcolor="theme">
						<th>ID</th>
						<th>Nama Perusahaan</th>
						<th>Telefon Perusahaan</th>
						<th>Email Perusahaan</th>
						<th>Alamat Perusahaan</th>
						<th>Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php $ambil=$koneksi->query("SELECT * FROM kurir"); ?>
					<?php while($kurir=$ambil->fetch_assoc()){ ?>
					<tr bgcolor="white">
						<td><strong><?php echo $kurir["idkurir"]; ?></strong></td>
						<td><strong><?php echo $kurir["namakurir"]; ?></strong></td>
						<td><strong><?php echo $kurir["telefonkurir"]; ?></strong></td>
						<td><strong><?php echo $kurir["emailkurir"]; ?></strong></td>
						<td><strong><?php echo $kurir["alamatkurir"]; ?></strong></td>
						<td>
							<a href="media.php?halaman=hapuskurir&id=<?php echo $kurir['idkurir'] ?>" class="btn-danger btn" onclick="javascript: return confirm('Anda yakin ingin menghapus item ini?')" title="Hapus Kurir"><i class="fa fa-eraser"></i></a>
							<a href="media.php?halaman=editkurir&id=<?php echo $kurir['idkurir'] ?>" class="btn btn-warning" title="Edit Kurir"><i class="fa fa-edit"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php }

		else
			{ ?>
				<div align="right">
					<a href="media.php?halaman=tambahkurir" class="btn btn-theme04" title="Tambah Kurir"><i class="fa fa-plus-square"></i></a>
				</div>

				<table class="table table-bordered" id="datatables">
					<thead>
						<tr bgcolor="theme">
							<th>ID</th>
							<th>Nama Perusahaan</th>
							<th>Telefon Perusahaan</th>
							<th>Email Perusahaan</th>
							<th>Alamat Perusahaan</th>
							<th>Opsi</th>
						</tr>
					</thead>

					<tbody>
						<?php $ambil=$koneksi->query("SELECT * FROM kurir"); ?>
						<?php while($kurir=$ambil->fetch_assoc()){ ?>
						<tr bgcolor="white">
							<td><strong><?php echo $kurir["idkurir"]; ?></strong></td>
							<td><strong><?php echo $kurir["namakurir"]; ?></strong></td>
							<td><strong><?php echo $kurir["telefonkurir"]; ?></strong></td>
							<td><strong><?php echo $kurir["emailkurir"]; ?></strong></td>
							<td><strong><?php echo $kurir["alamatkurir"]; ?></strong></td>
							<td>
								<a href="media.php?halaman=editkurir&id=<?php echo $kurir['idkurir'] ?>" class="btn btn-warning" title="Edit Kurir"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
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