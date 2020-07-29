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

$pid=$_GET[id];
$ambil=$koneksi->query("SELECT * FROM produk WHERE idproduk='$pid'");
$produk=$ambil->fetch_assoc();
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
			<h2>Edit Produk</h2>
			<div class="form-panel">
				<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Nama Produk</strong></strong></label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" value="<?php echo $produk['namaproduk']; ?>" required>
						</div>
					</div><br><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Harga (Rp.)</strong></label>
						<div class="col-sm-10">
							<input type="number" name="harga" class="form-control" value="<?php echo $produk['hargaproduk']; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
                  		<label class="col-md-2 control-label"><strong>Foto Produk</strong></label>
                  		<div class="col-md-10">
                  			<div class="fileupload fileupload-new" data-provides="fileupload">
                  				<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                  					<img src="../fotoproduk/<?php echo $produk["fotoproduk"]; ?>">
                  				</div>
                  				<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                  				</div>

                  				<div>
                  					<span class="btn btn-theme02 btn-file">
                  						<span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image
                  						</span>
                  						<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                  						<input type="file" class="default" name="foto" value="<?php echo $produk['fotoproduk']; ?>" required />
                  					</span><!-- 
                  					<a class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a> -->
                  				</div>
                  			</div>
                  		</div>
                  	</div><br><br><br><br><br><br><br><br><br><br>

                  	<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Berat (Gr.)</strong></label>
						<div class="col-sm-10">
							<input type="number" name="berat" class="form-control" value="<?php echo $produk['beratproduk']; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Stok</strong></label>
						<div class="col-sm-10">
							<input type="number" name="stok" class="form-control" value="<?php echo $produk['stokproduk']; ?>" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Deskripsi</strong></label>
						<div class="col-sm-10">
							<textarea type="text" name="deskripsi" class="form-control" required><?php echo $produk['deskripsiproduk']; ?></textarea>
						</div>
					</div><br><br><hr>

				<div align="right">
					<a href="media.php?halaman=dproduk" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</a>
					<button class="btn btn-theme04" name="save">Simpan <i class="fa fa-plus-square"></i></button>
				</div>
			</form>

<?php
if (isset($_POST['save']))
{
	$nama=$_POST["nama"];
	$harga=$_POST["harga"];
	$foto=$_FILES["foto"]["name"];
	$berat=$_POST["berat"];
	$stok=$_POST["stok"];
	$desc=$_POST["deskripsi"];
	$idad=$_SESSION["idadmin"];
	$naad=$_SESSION["namaadmin"];
	$poed=$_GET["id"];
	$log="Mengubah Data Produk dengan ID: $poed";

	$fotolokasi=$_FILES["foto"]["tmp_name"];
	$now=date("Y-m-d H:i:s");

	if (!empty($fotolokasi))
	{
		move_uploaded_file($fotolokasi, "../fotoproduk/$foto");
		$koneksi->query("UPDATE produk SET fotoproduk='$foto', namaproduk='$nama', hargaproduk='$harga', beratproduk='$berat', stokproduk='$stok', deskripsiproduk='$desc' WHERE idproduk='$pid'");
		$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	}
	else
	{
		$koneksi->query("UPDATE produk SET namaproduk='$nama', hargaproduk='$harga', beratproduk='$berat', stokproduk='$stok', deskripsiproduk='$desc' WHERE idproduk='$_GET[id]'");
		$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	}
			echo "<script>alert('Data Produk telah Diperbarui');</script>";
			echo "<script>location='media.php?halaman=dproduk';</script>";
}
?>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>