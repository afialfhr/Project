<?php
session_start();
include "../config/koneksi.php";
$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN member ON pembelian.idmember=member.idmember WHERE pembelian.idpembelian='$idpem'");
$detail=$ambil->fetch_assoc();

//mendapatkan id pelanggan yang beli
$idpelangganbeli=$detail["idmember"];

//mendapatkan id pelanggan yang login
$idpelangganlogin=$_SESSION["idmember"];

if ($idpelangganbeli!==$idpelangganlogin)
{
    echo "<script>alert('Akses Terbatas');</script>";
    echo "<script>location='kategori.php';</script>";
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
                    <h1>Nota Pembelian</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">...<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Nota Pembelian</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================ Nota Area =================-->
    <section class="checkout_area section_gap">
    <div class="container">
        <h1>Nota Pembelian</h1>
        <div class="row">
            <div class="col-md-4">
                <h3>Pemilik Akun</h3>
                <strong><?php echo $detail['namamember']; ?></strong>
                <ul>
            </div>
            <div class="col-md-4">
                <h3>Detail Pengiriman</h3>
                <strong>Pemesan: </strong><?php echo $detail['pemesan']; ?><br>
                <strong>Telefon: </strong><?php echo $detail['telefon']; ?><br>
                <strong>Alamat: </strong><?php echo $detail['alamatkirim']; ?><br>
                <strong>Area: </strong><?php echo $detail['wilayah']; ?><br>
                <strong>Catatan: </strong><?php echo $detail['catatan']; ?>
                <ul>
            </div>
            <div class="col-md-4">
                <h3>Detail Pemesanan</h3>
                <strong>Nomor Pembelian: </strong><?php echo $detail['idpembelian']; ?><br>
                <strong>Tanggal Pembelian: </strong><?php echo date("D, d-m-Y", strtotime($detail['tlbeli'])); ?><br>
                <strong>Ongkir: </strong>Rp. <?php echo number_format($detail['tarif']); ?><br>
                <strong>Tagihan: Rp. <?php echo number_format($detail['totalharga']); ?></strong>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr align="middle">
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>     
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $ambil=$koneksi->query("SELECT * FROM pempro WHERE idpembelian='$idpem'"); ?>
                <?php while ($pecah=$ambil->fetch_assoc()) { ?>
                <tr>
                    <td width="50"><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["namaproduk"]; ?></td>
                    <td width="100" align="middle"><?php echo $pecah["jumlah"]; ?></td>
                    <td width="150" align="right">Rp. <?php echo number_format($pecah["hargaproduk"]); ?></td>
                    <td width="150" align="right">Rp. <?php echo number_format($pecah["subharga"]); ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"><strong>Total Pembelian + Ongkos Kirim ke Wilayah <?php echo $detail["wilayah"]; ?> (Rp. <?php echo number_format($detail["tarif"]); ?>):</strong></td>
                    <td align="right"><strong>Rp. <?php echo number_format($detail['totalharga']); ?></strong></td>
                </tr>
            </tfoot>
        </table>

        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <p>
                        Silahkan lakukan pembayaran sebesar Rp. <?php echo number_format($detail['totalharga']); ?> ke: <br>
                        <strong>BANK MANDIRI 137-000102-3781 AN. Ponts Fish</strong><br>
                        atau ke:<br>
                        <strong>BANK BCA 104-000106-3441 AN. Ponts Fish</strong>
                    </p>
                </div>
                <a href="riwayatbelanja.php" class="btn btn-primary">User Order's Status</a> <font color="black"><strong><--- Bayar/periksa transaksi Lewat Sini.</strong></font>
            </div>
        </div>
    </div>
</section>
    <!--================ End Nota Area =================-->

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