<?php
session_start();
include "../config/koneksi.php";
$idp=$_GET["id"];

$ambil=$koneksi->query("SELECT * FROM produk WHERE idproduk='$idp'");
$detail=$ambil->fetch_assoc();
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

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Detail Produk</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="kategori.php">Product<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Detail Produk</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<img class="img-fluid" src="../fotoproduk/<?php echo $detail['fotoproduk']; ?>">
				</div>

				<div class="col-lg-5 offset-lg-1">
					<h1><strong><?php echo $detail['namaproduk']; ?></strong></h1>
					<font color="orange" size="5">
						<strong>Rp. <?php echo number_format($detail['hargaproduk']); ?></strong><br><br>
					</font>
					<font color="black" size="3">
						<strong>Kategori : </strong><?php echo $detail['kategoriproduk']; ?><br>
						<strong>Berat : </strong><?php echo $detail['beratproduk']; ?> Gram<br>
						<strong>Stok : </strong><?php echo $detail['stokproduk']; ?><br><hr>
					</font>

					<font color="black" size="3">
						<?php echo $detail['deskripsiproduk']; ?>
					</font><hr>
					<form method="POST">
						<div class="product_count">
							<label><strong>Jumlah:</strong></label>
							<input type="number" name="qty" min="1" maxlength="<?php echo $detail['stokproduk'] ?>"value="1" title="Jumlah">
						</div>

						<div class="card_area d-flex align-items-center">
							<button class="primary-btn" name="beli">
								<font color="black">Masukkan Keranjang</font>
							</button>
						</div>
					</form>
					<?php if (isset($_POST['beli']))
					{
						//mendapatkan jumlah yang diinputkan
						$qty=$_POST["qty"];
						$idp=$_GET["id"];

						//masukkan dalam keranjang belanja
						$_SESSION["keranjang"][$idp]=$qty;

					echo "<script>alert('Produk telah masuk dalam keranjang belanja!');</script>";
					echo "<script>location='keranjang.php'</script>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">Comments</a>
				</li>
				
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<font color="black" size="3">
						<p><?php echo $detail['deskripsiproduk']; ?></p>
					</font>
				</div>
				
				<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<?php
						$idp=$idp;
						$ambil=$koneksi->query("SELECT * FROM ulasan WHERE idproduk='$idp'");
						while ($ulas=$ambil->fetch_assoc())
						{ ?>
							<div class="col-lg-6">
								<div class="comment_list">
									<div class="review_item">
										<div class="media">
											<div class="d-flex">
												<img width="50" height="50" src="../fotomember/<?php echo $ulas['fotomember']; ?>">
											</div>

											<div class="media-body">
												<h4><?php echo $ulas['namamember']; ?></h4>
												<h5><?php echo date("D, d-m-Y/h:i A", strtotime($ulas['tu'])); ?></h5>
											</div>
										</div>
										<p><?php echo $ulas['ulasan']; ?></p>
									</div>
								</div>
							</div>
						<?php } ?>

						<div class="col-lg-6">
							<div class="review_box">
								<h4 align="middle">
									<font >
										Yuk, kirim Komentar dan Ulasanmu di sini.
									</font>
								</h4>
								<form method="POST">	
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="pesanulasan" rows="3" placeholder="Pesan/Ulasanmu"></textarea>
										</div>
									</div>
									<div class="col-md-12 form-group">
										<button name="kirim" class="btn primary-btn">Kirim</button>
									</div>
								</form>
								<?php if (isset($_POST['kirim']))
								{
									$idp=$idp;
									$nama=$_SESSION['namamember'];
									$foto=$_SESSION['fotomember'];
									date_default_timezone_set('Asia/Jakarta');
									$now=date("Y-m-d H:i:s");
									$namaproduk=$detail["namaproduk"];
									$pu=$_POST['pesanulasan'];

									$koneksi->query("INSERT INTO ulasan (idproduk, namamember, fotomember, tu, namaproduk, ulasan) VALUES ('$idp', '$nama', '$foto', '$now', '$namaproduk', '$pu')");
									echo "<script>alert('Ulasan Ditambahkan');</script>";
									echo "<script>location='kategori.php'</script>";
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

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
									<a href="detpro2.php?id=<?php echo $promo['idpromo'] ?>"><img src="../fotoproduk/<?php echo $promo['fotoproduk']; ?>" width="90" height="90"></a>
									<div class="desc">
										<a href="detpro2.php?id=<?php echo $promo['idpromo'] ?>" class="title"><?php echo $promo['namaproduk']; ?></a>
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

<?php include 'footer.php'; ?>

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