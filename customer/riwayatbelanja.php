<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION["username"]) AND !isset($_SESSION["password"]))
{
    echo "<script>alert('Akses Terbatas, silahkan Login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
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

<?php include 'header.php'; ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>User Order's Status</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">...<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">User Order's Status</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================ History Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <h3>User Order's Status: <?php echo $_SESSION["namamember"]; ?></h3>

            <font color="black">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Transaksi</th>
                        <th>Tagihan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php
                    $idm=$_SESSION["idmember"];
                    $ambil=$koneksi->query("SELECT * FROM pembelian WHERE idmember='$idm'");
                    while ($pecah=$ambil->fetch_assoc()) {  
                    ?>
                    <tr>
                        <td><?php echo "$nomor."; ?></td>
                        <td><?php echo $pecah["idpembelian"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["totalharga"]); ?></td>

                        <td><?php echo date("D, d-m-Y", strtotime($pecah['tlbeli'])); ?></td>
                        <td>
                            <?php echo $pecah["status"]; ?>
                            <br>
                            <?php if (!empty($pecah["resi"])): ?>
                                Resi: <strong><?php echo $pecah["resi"]; ?></strong>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="nota.php?id=<?php echo $pecah["idpembelian"] ?>" class="btn btn-info">Nota</a>

                            <?php if ($pecah["status"]=="Menunggu Pembayaran"): ?>
                            <a href="pembayaran.php?id=<?php echo $pecah['idpembelian']; ?>" class="btn btn-danger">
                                Input Pembayaran
                            </a>

                            <?php elseif ($pecah["status"]=="Pembayaran Berhasil"): ?>
                            <a href="lihatpembayaran.php?id=<?php echo $pecah["idpembelian"] ?>" class="btn btn-warning">
                                Lihat Pembayaran
                            </a>

                            <?php elseif ($pecah["status"]=="Transaksi Diproses"): ?>
                            <a href="lihatpengiriman.php?id=<?php echo $pecah["idpembelian"] ?>" class="btn btn-success">
                                Lihat Pengiriman
                            </a>

                            <?php else: ?>
                            <!-- <a href="lihatpengiriman.php?id=<?php echo $pecah["idpembelian"] ?>" class="btn btn-success">
                                Lihat Pengiriman
                            </a> -->
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </font>
        </div>
    </section>
    <!--================ End History Area =================-->

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