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

$prid=$_GET[id];
$ambil=$koneksi->query("SELECT * FROM promo WHERE idpromo='$prid'");
$promo=$ambil->fetch_assoc();
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
			<h2>Edit Promo</h2>
			<div class="form-panel">
				<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>ID Produk</strong></strong></label>
						<div class="col-sm-10">
							<input type="text" name="idp" class="form-control" readonly value="<?php echo $promo['idproduk']; ?>" required>
						</div>
					</div><br><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Nama Produk</strong></strong></label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" readonly value="<?php echo $promo['namaproduk']; ?>" required>
						</div>
					</div><br><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Harga Normal (Rp.)</strong></label>
						<div class="col-sm-10">
							<input type="number" name="harganormal" class="form-control" readonly value="<?php echo $promo['harganormal']; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Diskon (%)</strong></label>
						<div class="col-sm-10">
							<input type="number" name="diskon" class="form-control" value="<?php echo $promo['diskon']; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Harga Diskon (Rp.)</strong></label>
						<div class="col-sm-10">
							<input type="number" name="hargadiskon" class="form-control" readonly value="<?php echo $promo['hargadiskon']; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
                  		<label class="col-md-2 control-label"><strong>Foto Produk</strong></label>
                  		<div class="col-md-10">
                  			<div class="fileupload fileupload-new" data-provides="fileupload">
                  				<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                  					<img src="../fotoproduk/<?php echo $promo["fotoproduk"]; ?>">
                  				</div>
                  				<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                  				</div>
                  				<input type="text" class="default" name="foto" readonly value="<?php echo $promo['fotoproduk']; ?>" required />
                  			</div>
                  		</div>
                  	</div>

					<div class="form-group last">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Deskripsi</strong></label>
						<div class="col-sm-10">
							<textarea type="text" name="deskripsi" class="form-control" required><?php echo $promo['deskripsiproduk']; ?></textarea>
						</div>
					</div><br><br><br><br><br><br><br><br><br><br><br><hr>

					<div align="right">
						<a href="media.php?halaman=dproduk" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</a>
						<button class="btn btn-theme04" name="save">Simpan <i class="fa fa-plus-square"></i></button>
					</div>
			</form>

<?php
if (isset($_POST['save']))
{
	$idp=$_POST["idp"];
	$nama=$_POST["nama"];
	$harganormal=$_POST["harganormal"];
	$diskon=$_POST["diskon"];
	$pembagi=100;
	$hargadiskon=$harganormal-(($harganormal/$pembagi)*$diskon);
	$foto=$_POST["foto"];
	$desc=$_POST["deskripsi"];
	$idad=$_SESSION["idadmin"];
	$naad=$_SESSION["namaadmin"];
	$log="Mengubah Promo pada Produk dengan ID: $idp";

	$now=date("Y-m-d H:i:s");

	if ($diskon > $pembagi)
	{
		echo "<script>alert('Maksimal Diskon 100%!');</script>";
		echo "<script>location='media.php?halaman=dpromo'</script>";
	}
	else
	{
		$koneksi->query("UPDATE promo set diskon='$diskon', hargadiskon='$hargadiskon', deskripsiproduk='$desc' WHERE idpromo='$prid'");
		$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	}

	echo "<script>alert('Promo Telah Diperbarui');</script>";
	echo "<script>location='media.php?halaman=dpromo'</script>";
}
?>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>