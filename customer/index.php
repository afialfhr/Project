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
	
	<!-- FONTAWESOME STYLES-->
    <link rel="stylesheet" href="fa/css/all.css">

	<!-- Site Title -->
	<title>Ponts Fish</title>

	<!-- CSS -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php include "header.php"; ?>

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Cupang Hias Beta Red<br></h1>
									<p>ikan yang hidup di air apa aja
									</p>

									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="kategori.php"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Cek Produk</span>
									</div>
								</div>

							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img width="200" height="500" src="img/banner/cupang1.png" alt="">
								</div>
							</div>
						</div>

						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Ikan Gurame<br></h1>
									<p>Enak dimakan.
									</p>

									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="kategori.php"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Cek Produk</span>
									</div>
								</div>

							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img width="200" height="500" src="img/banner/gurame1.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<?php include "fitur.php"; ?>

	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Produk Tersedia</h1>
							<p>
								<font color="orange">
									Barang pada etalase, telah dipastikan ketersediaan stoknya.<br>
									<strong>Selamat Berbelanja!</strong>
								</font>
							</p>
						</div>
					</div>
				</div>

				<div class="row">
					<?php $ambil=$koneksi->query("SELECT * FROM produk ");
					while ($produk=$ambil->fetch_assoc())
					{ ?>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img width="200" height="200" src="../fotoproduk/<?php echo $produk['fotoproduk']; ?>">
							<div class="product-details">
								<h6><?php echo $produk['namaproduk']; ?></h6>
								<div class="price">
									<h6>Rp. <?php echo number_format($produk['hargaproduk']); ?></h6>
								</div>

								<div class="prd-bottom">
									<a href="beli.php?id=<?php echo $produk['idproduk'] ?>" class="social-info"><span class="ti-bag"></span><p class="hover-text">Bungkus</p></a>
									<a href="detpro.php?id=<?php echo $produk['idproduk'] ?>" class="social-info"><span class="lnr lnr-move"></span><p class="hover-text">Cek Produk</p></a>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Produk Diskon</h1>
							<p>
								<font color="orange" size="3">
								<strong>Produk terbaik dengan harga miring.</strong>
								</font>
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php $ambil=$koneksi->query("SELECT * FROM promo ");
					while ($promo=$ambil->fetch_assoc())
					{ ?>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img width="200" height="200" src="../fotoproduk/<?php echo $promo['fotoproduk']; ?>">
							<div class="product-details">
								<h6><?php echo $promo['namaproduk']; ?></h6>
								<div class="price">
									<h6>Rp. <?php echo number_format($promo['hargadiskon']); ?></h6>
									<h6 class="l-through">Rp. <?php echo number_format($promo['harganormal']); ?></h6>
								</div>

								<div class="prd-bottom">
									<a href="beli.php?idpr=<?php echo $produk['idproduk'] ?>" class="social-info"><span class="ti-bag"></span><p class="hover-text">Bungkus</p></a>
									<a href="detpro2.php?idpr=<?php echo $promo['idproduk'] ?>" class="social-info"><span class="lnr lnr-move"></span><p class="hover-text">Cek Produk</p></a>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<!-- end product Area -->

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
<script src="js/countdown.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>