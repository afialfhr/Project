<?php
session_start();
include "../config/koneksi.php";
$keyword=$_GET["keyword"];

$semuadata=array();
$ambil=$koneksi->query("SELECT * FROM produk WHERE namaproduk LIKE '%$keyword%' OR deskripsiproduk LIKE '%$keyword%'");
while ($produk=$ambil->fetch_assoc())
{
	$semuadata[]=$produk;
}
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
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body id="category">

<?php include 'header.php'; ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Kategori Ikan</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="kategori.php">Product</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Kategori Produk</div>
					<ul class="main-categories">
						<li class="main-nav-list">
							<a href="produkikanhias.php">Ikan Hias</a>
							<a href="produkikankonsumsi.php">Ikan Konsumsi</a>
						</li>
					</ul>
				</div>
				<div class="sidebar-filter mt-50">
				</div>
			</div>

			<div class="col-xl-9 col-lg-8 col-md-7">
				<h1>
					<font color="orange">
						Hasil Pencarian <?php echo $keyword; ?>
					</font>
				</h1>

				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
					<?php if (empty($semuadata)): ?>
						<div class="alert alert-danger">Keyword <strong>"<?php echo $keyword ?>"</strong> yang anda cari tidak tersedia!</div>
					<?php endif ?>

					<?php foreach ($semuadata as $key => $produk): ?>
					<!-- single product -->
							<div class="col-lg-3 col-md-6">
								<div class="single-product">
									<img height="150" width="150" src="../fotoproduk/<?php echo $produk['fotoproduk']; ?>">
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
						<?php endforeach ?>
					</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Produk Diskon</h1>
							<p>
								<font color="orange" size="3">
								<strong>Promo Mingguan, Ayo Diserbu!</strong>
								</font>
							</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<?php $ambil=$koneksi->query("SELECT * FROM promo "); ?>
						<?php while ($promo=$ambil->fetch_assoc()) { ?>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-20">
								<div class="single-related-product d-flex">
									<a href="detpro2.php?idpr=<?php echo $promo['idproduk'] ?>"><img src="../fotoproduk/<?php echo $promo['fotoproduk']; ?>" width="90" height="90"></a>
									<div class="desc">
										<a href="detpro2.php?idpr=<?php echo $promo['idproduk'] ?>" class="title"><?php echo $promo['namaproduk']; ?></a>
										<div class="price">
											<h6>Rp. <?php echo number_format($promo['hargadiskon']); ?></h6>
											<h6 class="l-through">Rp. <?php echo number_format($promo['harganormal']);?></h6>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

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