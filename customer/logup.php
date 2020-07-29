<?php 
session_start();
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">

	<!-- Author Meta -->
	<meta name="author" content="CodePixar">

	<!-- Meta Description -->
	<meta name="description" content="">

	<!-- Meta Keyword -->
	<meta name="keywords" content="">

	<!-- meta character set -->
	<meta charset="UTF-8">

	<!-- Site Title -->
	<title>Ponts Fish</title>

	<!-- CSS -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php include "header.php"; ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Logup/Login</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Logup/Login</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log Up</h3>
						<form class="form-group" method="POST">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="namalengkap" placeholder="Nama Lengkap" title="Nama Lengkap" required>
							</div>

							<div class="col-md-12 form-group">
								<input type="number" class="form-control" name="nomortelefon" placeholder="Nomor Telefon" title="Nomor Telefon" required>
							</div>

							<div class="col-md-12 form-group">
								<select class="form-control" name="jk" title="Jenis Kelamin" required>
									<option>Jenis Kelamin</option>
									<option value="laki-laki">Laki-Laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
							</div><br>

							<div class="col-md-12 form-group">
								<input type="date" class="form-control" name="tl" placeholder="Tanggal Lahir" title="Tanggal Lahir" required>
							</div>

							<div class="col-md-12 form-group">
								<textarea type="text" class="form-control" name="alamat" placeholder="Alamat Tinggal" title="Alamat Tinggal" required></textarea>
							</div>

							<div class="col-md-12 form-group">
								<input type="email" class="form-control" name="email" placeholder="Alamat Email" title="Alamat Email" required>
							</div>

							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="username" placeholder="Username" title="Username" required>
							</div>

							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password" placeholder="Password" title="Password" required>
							</div>

							<div class="col-md-12 form-group">
								<button class="primary-btn" name="login">Log Up</button>
								<!-- <a href="#">Forgot Password?</a> -->
							</div>
						</form>

<?php
if (isset($_POST['login']))
{
	$nama=$_POST["namalengkap"];
	$telefon=$_POST["nomortelefon"];
	$jk=$_POST["jk"];
	$birth=date("Y-m-d", strtotime($_POST["tl"]));
	$alamat=$_POST["alamat"];
	$email=$_POST["email"];
	$foto="defaultprofil.png";
	$user=$_POST["username"];
	$pass=md5($_POST["password"]);

	$today=date("Y-m-d");
	$now=date("Y-m-d H:i:s");

	if ($birth > $today)
	{
		echo "<script>alert('Periksa Kembali Tanggal yang diinput!');</script>";
		echo "<script>location='login.php'</script>";
	}
	else
	{
	$koneksi->query("INSERT INTO member (namamember, telefonmember, jkmember, tlmember, alamatmember, emailmember, fotomember, username, password) VALUES ('$nama', '$telefon', '$jk', '$birth', '$alamat', '$email', '$foto', '$user', '$pass')");

	echo "<script>alert('Akun Anda Berhasil Dibuat');</script>";
	echo "<script>location='login.php'</script>";
	}
}
?>

					</div>
				</div>

				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Sudah Punya Akun?</h4>
							<p>Ayo Masuk dulu di sini.</p>
							<a class="primary-btn" href="login.php">Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
<?php include "footer.php"; ?>

<!-- javascript -->
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
 crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>