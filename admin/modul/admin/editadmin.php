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

$aid=$_GET[id];
$ambil=$koneksi->query("SELECT * FROM admin WHERE idadmin='$aid'");
$admin=$ambil->fetch_assoc();
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
			<h2>Edit Admin</h2>
			<div class="form-panel">
				<form method="POST" enctype="multipart/form-data">

					
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Nama Lengkap</strong></strong></label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" value="<?php echo $admin["namaadmin"]; ?>" required>
						</div>
					</div><br><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Nomor Telefon</strong></label>
						<div class="col-sm-10">
							<input type="number" name="telefon" class="form-control" value="<?php echo $admin["telefonadmin"]; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
                  		<label class="col-sm-2 col-sm-2 control-label"><strong>Tanggal Lahir</strong></label>
                  		<div class="col-sm-10">
                  			<input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" name="tl" value="<?php echo date("d-M-Y", strtotime($admin["tladmin"])); ?>" required>
                  		</div>
                  	</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Alamat Email</strong></label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" value="<?php echo $admin["emailadmin"]; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Alamat Tinggal</strong></label>
						<div class="col-sm-10">
							<textarea type="text" name="alamat" class="form-control" required><?php echo $admin["alamatadmin"]; ?></textarea>
						</div>
					</div><br><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Username</strong></label>
						<div class="col-sm-10">
							<input type="text" name="username" class="form-control" value="<?php echo $admin["username"]; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Password</strong></label>
						<div class="col-sm-10">
							<input type="text" name="password" class="form-control" value="<?php echo $admin["password"]; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Posisi Admin</strong></label>
						<div class="col-sm-10">
							<select class="form-control" name="pa" required>
								<?php if ($admin["posisiadmin"]=='Admin Website')
								{ ?>
									<option value="Admin Website">Admin Website</option>
									<option value="Admin Direksi">Admin Direksi</option>
								<?php }
								else
								{ ?>
									<option value="Admin Direksi">Admin Direksi</option>
									<option value="Admin Website">Admin Website</option>
								<?php } ?>
							</select>
						</div>
					</div><br><br>

					<div class="form-group last">
                  		<label class="col-md-2 control-label"><strong>Foto Admin</strong></label>
                  		<div class="col-md-10">
                  			<div class="fileupload fileupload-new" data-provides="fileupload">
                  				<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                  					<img src="../fotoadmin/<?php echo $admin["fotoadmin"]; ?>">
                  				</div>
                  				<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                  				</div>

                  				<div>
                  					<span class="btn btn-theme02 btn-file">
                  						<span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image
                  						</span>
                  						<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                  						<input type="file" class="default" name="foto" value="<?php echo $admin["fotoadmin"]; ?>" required />
                  					</span>
                  				</div>
                  			</div>
                  		</div>
                  	</div><br><br><br><br><br><br><br><br><br><br><hr>

					<div align="right">
						<a href="media.php?halaman=dadmin" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</a>
						<button class="btn btn-theme04" name="save">Simpan <i class="fa fa-plus-square"></i></button>
					</div>
				</form>

<?php
if (isset($_POST['save']))
{
	$nama=$_POST["nama"];
	$telefon=$_POST["telefon"];
	$birth=date("Y-m-d", strtotime($_POST["tl"]));
	$email=$_POST["email"];
	$alamat=$_POST["alamat"];
	$usern=$_POST["username"];
	$pass=$_POST["password"];
	$foto=$_FILES["foto"]["name"];
	$pa=$_POST["pa"];
	$idad=$_SESSION["idadmin"];
	$naad=$_SESSION["namaadmin"];
	$aded=$_GET["id"];
	$log="Mengubah Data Akun Admin dengan ID: $aded";

	$fotolokasi=$_FILES["foto"]["tmp_name"];
	$today=date("Y-m-d");
	$now=date("Y-m-d H:i:s");

	if ($birth > $today)
	{
		echo "<script>alert('Periksa Kembali Tanggal yang diinput!');</script>";
		echo "<script>location='media.php?halaman=editadmin'</script>";
	}
	else
		if (!empty($fotolokasi))
		{
			move_uploaded_file($fotolokasi, "../fotoadmin/$foto");
			$koneksi->query("UPDATE admin SET namaadmin='$nama', telefonadmin='$telefon', tladmin='$birth', emailadmin='$email', alamatadmin='$alamat', username='$usern', password=md5('$pass'), fotoadmin='$foto', posisiadmin='$pa' WHERE idadmin='$aid'");
			$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
		}
		else
		{
			$koneksi->query("UPDATE admin SET namaadmin='$nama', telefonadmin='$telefon', tladmin='$birth', emailadmin='$email', alamatadmin='$alamat', username='$usern', password=md5('$pass'), posisiadmin='$pa' WHERE idadmin='$_GET[id]'");
			$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
		}
			echo "<script>alert('Data Akun telah Diperbarui');</script>";
			echo "<script>location='media.php?halaman=dadmin';</script>";
}
?>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>