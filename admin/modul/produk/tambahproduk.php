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
	<div class="row mt">
		<div class="col-lg-12">
			<h2>Tambah Produk</h2>
			<div class="form-panel">
				<form method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Nama Produk</strong></strong></label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" required>
						</div>
					</div><br><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Harga (Rp.)</strong></label>
						<div class="col-sm-10">
							<input type="number" name="harga" class="form-control" required>
						</div>
					</div><br><br>

					<div class="form-group">
                  		<label class="col-md-2 control-label"><strong>Foto Produk</strong></label>
                  		<div class="col-md-10">
                  			<div class="fileupload fileupload-new" data-provides="fileupload">
                  				<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                  					<img src=""/>
                  				</div>
                  				<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                  				</div>

                  				<div>
                  					<span class="btn btn-theme02 btn-file">
                  						<span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image
                  						</span>
                  						<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                  						<input type="file" class="default" name="foto" required />
                  					</span><!-- 
                  					<a class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a> -->
                  				</div>
                  			</div>
                  		</div>
                  	</div><br><br><br><br><br><br><br><br><br><br>

                  	<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Berat (Gr.)</strong></label>
						<div class="col-sm-10">
							<input type="number" name="berat" class="form-control" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Stok</strong></label>
						<div class="col-sm-10">
							<input type="number" name="stok" class="form-control" required>
						</div>
					</div><br><br>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"><strong>Deskripsi</strong></label>
						<div class="col-sm-10">
							<textarea type="text" name="deskripsi" class="form-control" required></textarea>
						</div>
					</div><br><br><br><hr>

					<div align="right">
						<a href="media.php?halaman=dproduk" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Kembali</a>
						<button class="btn btn-theme04" name="save">Tambah <i class="fa fa-plus-square"></i></button>
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
	$log="Menambahkan Data Produk dengan Nama: $nama";

	$fotolokasi=$_FILES["foto"]["tmp_name"];
	$now=date("Y-m-d H:i:s");

	$koneksi->query("INSERT INTO produk (fotoproduk, namaproduk, hargaproduk, beratproduk, stokproduk, deskripsiproduk) VALUES ('$foto', '$nama', '$harga', '$berat', '$stok', '$desc')");
		move_uploaded_file($fotolokasi, "../fotoproduk/".$foto);
	$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");

	echo "<script>alert('Data Produk baru Berhasil Disimpan');</script>";
	echo "<script>location='media.php?halaman=dproduk'</script>";
}
?>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>