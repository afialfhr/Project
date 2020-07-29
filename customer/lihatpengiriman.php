<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION["username"]) AND !isset($_SESSION["password"]))
{
    echo "<script>alert('Akses Terbatas, silahkan Login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

$idpem=$_GET["id"];

$ambil=$koneksi->query("SELECT * FROM pembayaran
    LEFT JOIN pembelian ON pembayaran.idpembelian=pembelian.idpembelian LEFT JOIN member ON pembelian.idmember=member.idmember WHERE pembelian.idpembelian='$idpem'");
$detkir=$ambil->fetch_assoc();


//jika belum ada data pembayaran
if (empty($detkir))
{
	echo "<script>alert('Akses Terbatas - belum ada data pengiriman');</script>";
	echo "<script>location='riwayatbelanja.php';</script>";
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
                    <h1>Detail Pengiriman</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">...<span class="lnr lnr-arrow-right"></span></a>
                        <a href="riwayatbelanja.php">Order's Status<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Cek Pengiriman</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <section class="checkout_area section_gap">
        <div class="container">
            <h1>Cek Pengiriman</h1>
            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <p>
                        Akun: <strong><?php echo $detkir['namamember']; ?></strong><br>
                        Nomor Pembelian: <strong><?php echo $detkir['idpembelian']; ?></strong><br>
                        Tanggal: <strong><?php echo date("d-m-y", strtotime($detkir['tlbeli'])); ?></strong><br>
                        Total: <strong>Rp. <?php echo number_format($detkir['totalharga']); ?></strong><br>
                        Status Pembelian: <strong><?php echo $detkir['status']; ?></strong>
                    </p>
                </div>

                <div class="col-md-4">
                    <h3>Customer</h3>
                    <p>
                        Pemesan: <strong><?php echo $detkir['pemesan']; ?></strong><br>
                        Nomor Telefon: <strong><?php echo $detkir['telefon']; ?></strong><br>
                        Alamat Kirim: <strong><?php echo $detkir['alamatkirim']; ?></strong><br>
                        Daerah: <strong><?php echo $detkir['wilayah']; ?></strong><br>
                        Ongkos Kirim: <strong>Rp. <?php echo number_format($detkir['tarif']); ?></strong><br>
                        Catatan: <strong><?php echo $detkir['catatan']; ?></strong>
                    </p>
                </div>

                <div class="col-md-4">
                    <h3>Info Pengiriman</h3>
                    <p>
                        Nomor Resi:<br><font size="5"><strong><?php echo $detkir['resi']; ?></strong></font><br>
                        Kurir:<br><font size="3"><strong><?php echo $detkir['kurir']; ?></strong></font>
                    </p>
                </div>

                <table class="table table-bordered" id="datatables">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $nomor=1; ?>
                        <?php
                        $ambil=$koneksi->query("SELECT * FROM pempro JOIN produk ON pempro.idproduk=produk.idproduk WHERE pempro.idpembelian='$_GET[id]'"); ?>
                        <?php while ($pecah=$ambil->fetch_assoc())
                        { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["namaproduk"]; ?></td>
                            <td>Rp. <?php echo number_format($pecah["hargaproduk"]); ?>,-</td>
                            <td><?php echo $pecah["jumlah"]; ?></td>
                            <td>
                                Rp. <?php echo number_format($pecah["hargaproduk"]*$pecah["jumlah"]); ?>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="4">Total Pembelian + Ongkos Kirim ke Wilayah <?php echo $detkir["wilayah"]; ?> (Rp. <?php echo number_format($detkir["tarif"]); ?>) :</th>
                            <th>Rp. <?php echo number_format($detkir['totalharga']); ?></th>
                        </tr>
                    </tfoot>
                </table>
                <form method="POST">
                    <a href="riwayatbelanja.php" class="btn btn-primary">Kembali</a>
                    <button name="selesai" onclick="javascript: return confirm('Periksa Kembali barang yang datang sebelum menyelesaikan transaksi.')" class="btn btn-success">Konfirmasi Barang Sampai</button>
                </form>
            </div>
        </div>
    </section>

<?php if (isset($_POST["selesai"]))
{
    $status="Transaksi Selesai";

    $koneksi->query("UPDATE pembelian SET status='$status' WHERE idpembelian='$idpem'");

    echo "<script>alert('Transaksi selesai. Terima kasih sudah berbelanja :)');</script>";
    echo "<script>location='index.php'</script>";
}
?>


<?php include 'footer.php'; ?>

<!-- javascript -->
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
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