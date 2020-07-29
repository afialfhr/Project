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
	<h2>Data Admin</h2>

<?php
	if ($_SESSION["posisiadmin"]=='Admin Direksi')
		{ ?>
			<div align="right">
				<a href="media.php?halaman=tambahadmin" class="btn btn-theme04" title="Tambah Admin"><i class="fa fa-plus-square"></i></a>
				<a href="media.php?halaman=logadmin" class="btn btn-theme03" title="Log Admin"><i class="fa fa-file"></i></a>
			</div>

			<table class="table table-bordered" id="datatables" >
				<thead>
					<tr bgcolor="theme">
						<th>ID</th>
						<th>Nama</th>
						<th>Telefon</th>
						<th>Tanggal Lahir</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>Username</th>
						<th>Password</th>
						<th>Login Terakhir</th>
						<th>Foto Admin</th>
						<th>Posisi</th>
						<th>Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
					<?php while($admin=$ambil->fetch_assoc()){ ?>
					<tr bgcolor="white">
						<td><strong><?php echo $admin["idadmin"]; ?></strong></td>
						<td><strong><?php echo $admin["namaadmin"]; ?></strong></td>
						<td><strong><?php echo $admin["telefonadmin"]; ?></strong></td>
						<td><strong><?php echo date("d-M-Y", strtotime($admin["tladmin"])); ?></strong></td>
						<td><strong><?php echo $admin["emailadmin"]; ?></strong></td>
						<td><strong><?php echo $admin["alamatadmin"]; ?></strong></td>
						<td><strong><?php echo $admin["username"]; ?></strong></td>
						<td><strong><?php echo $admin["password"]; ?></strong></td>
						<td><strong><?php echo $admin["loginterakhir"]; ?></strong></td>
						<td>
							<img src="../fotoadmin/<?php echo $admin["fotoadmin"]; ?>" width="100px">
						</td>
						<td><strong><?php echo $admin["posisiadmin"]; ?></strong></td>
						<td>
							<a href="media.php?halaman=hapusadmin&id=<?php echo $admin['idadmin'] ?>&fotoadmin=<?php echo $admin['fotoadmin'] ?>" class="btn-danger btn" onclick="javascript: return confirm('Anda yakin ingin menghapus item ini?')" title="Hapus Admin"><i class="fa fa-eraser"></i>
							</a><br><br>
							<a href="media.php?halaman=editadmin&id=<?php echo $admin['idadmin'] ?>&fotoadmin=<?php echo $admin['fotoadmin'] ?>" class="btn btn-warning" title="Edit Admin"><i class="fa fa-edit"></i>
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php }

		else
			{ ?>
				<table class="table table-bordered" id="datatables" >
					<thead>
						<tr bgcolor="theme">
							<th>ID</th>
							<th>Nama</th>
							<th>Telefon</th>
							<th>Tanggal Lahir</th>
							<th>Email</th>
							<th>Alamat</th>
							<th>Username</th>
							<th>Password</th>
							<th>Login Terakhir</th>
							<th>Fotoadmin</th>
							<th>Posisi</th>
						</tr>
					</thead>

					<tbody>
						<?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
						<?php while($admin=$ambil->fetch_assoc()){ ?>
						<tr bgcolor="white">
							<td><strong><?php echo $admin["idadmin"]; ?></strong></td>
							<td><strong><?php echo $admin["namaadmin"]; ?></strong></td>
							<td><strong><?php echo $admin["telefonadmin"]; ?></strong></td>
							<td><strong><?php echo date("d-M-Y", strtotime($admin["tladmin"])); ?></strong></td>
							<td><strong><?php echo $admin["emailadmin"]; ?></strong></td>
							<td><strong><?php echo $admin["alamatadmin"]; ?></strong></td>
							<td><strong><?php echo $admin["username"]; ?></strong></td>
							<td><strong><?php echo $admin["password"]; ?></strong></td>
							<td><strong><?php echo $admin["loginterakhir"]; ?></strong></td>
							<td>
								<img src="../fotoadmin/<?php echo $admin["fotoadmin"]; ?>" width="100">
							</td>
							<td><strong><?php echo $admin["posisiadmin"]; ?></strong></td>
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