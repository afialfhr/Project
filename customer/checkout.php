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

<?php include 'header.php'; ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="keranjang.php">Keranjang Belanja<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================ Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="returning_customer">
                <?php if (!isset($_SESSION["username"]) AND !isset($_SESSION["password"]))
                { ?>
                    <div class="check_title">
                        <h2>Sudah Punya Akun? Yuk, Login dulu buat lanjut. <a href="login.php">Klik di sini.</a></h2>
                    </div>
                <?php } ?> 
            </div>
            
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>Rincian Keranjang Belanja</h1>
                        <font color="black">
                            <form class="row contact_form" method="POST">
                                <div class="col-md-6 form-group p_star">
                                    <?php echo "Pemilik Akun:"; ?>
                                    <input type="text" readonly value="<?php echo $_SESSION['namamember'] ?>" class="form-control">
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <?php echo "Pemesan:"; ?>
                                    <input type="text" class="form-control" name="pemesan" required placeholder="Nama pemesan...">
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <?php echo "Telefon:"; ?>
                                    <input type="number" class="form-control" name="telefon" required placeholder="Telefon yang dapat dihubungi kurir...">
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <?php echo "Catatan:"; ?>
                                    <input type="text" class="form-control" name="catatan" placeholder="Catatan khusus untuk kurir...">
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <?php echo "Area Pengiriman/Provinsi: "; ?>
                                    <select class="country_select" name="id_ongkir">
                                        <option>Pilih Paket Pengiriman:</option>
                                        <?php
                                        $ambil=$koneksi->query("SELECT * FROM ongkir");
                                        while ($perongkir=$ambil->fetch_assoc())
                                        { ?>
                                            <option value="<?php echo $perongkir['idongkir'] ?>">
                                            <?php echo $perongkir['namakurir'] ?> - 
                                            <?php echo $perongkir['wilayah'] ?> - 
                                            Rp. <?php echo number_format($perongkir['tarif']) ?>
                                            </option>
                                        <?php } ?>
                                    </select> 
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <?php echo "Alamat Lengkap Pengiriman:"; ?>
                                    <textarea type="text" class="form-control" name="alamat" placeholder="Nama Jalan, Nomor Rumah, RT/RW, Kelurahan, Kecamatan, Kabupaten, Provinsi, Kode Pos." required></textarea>
                                    <font color="red">*Mohon masukkan alamat sesuai format untuk mempermudah kurir menemukan alamatmu.</font>
                                </div>
                                <button onclick="javascript: return confirm('Pastikan Data yang terisi sudah benar sebelum melanjutkan!')" name="proses" class="primary-btn">Proses Pembayaran</button>
                            </form>
                        </font>
                    </div>

                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Pesananmu</h2>
                            <ul class="list">
                                <li><a>Produk <span>Total</span></a></li>
                                <?php $total=0;
                                foreach ($_SESSION['keranjang'] as $idproduk => $qty):
                                $ambil=$koneksi->query("SELECT * FROM produk WHERE idproduk='$idproduk'");
                                $cart=$ambil->fetch_assoc();
                                $subharga=$cart["hargaproduk"]*$qty;
                                ?>
                                <li><a><?php echo $cart["namaproduk"]; ?>(X<?php echo $qty; ?>)<span class="last">Rp. <?php echo number_format($subharga); ?></span></a></li>
                                <?php $total+=$subharga; ?>
                            <?php endforeach ?>
                            </ul>

                            <ul class="list list_2">
                                <li><a>Total<span>Rp. <?php echo number_format($total); ?></span></a></li>
                            </ul>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php if (isset($_POST['proses']))
{
    $idm=$_SESSION["idmember"];
    $pemesan=$_POST["pemesan"];
    $telefon=$_POST["telefon"];
    $note=$_POST["catatan"];
    $ido=$_POST["id_ongkir"];
    $alkir=$_POST["alamat"];
    $tlbeli=date("Y-m-d");

    $ambil=$koneksi->query("SELECT * FROM ongkir WHERE idongkir='$ido'");
    $arrongkir=$ambil->fetch_assoc();
    $wilayah=$arrongkir["wilayah"];
    $tarif=$arrongkir["tarif"];

    $totalharga=$total+$tarif;

    //menyimpan data ke tabel pembelian
    $koneksi->query("INSERT INTO pembelian (idmember, pemesan, telefon, idongkir, alamatkirim, tlbeli, totalharga, wilayah, tarif, catatan) VALUES ('$idm', '$pemesan', '$telefon', '$ido', '$alkir', '$tlbeli','$totalharga', '$wilayah', '$tarif', '$note')");

    //mendapatkan id pembelian terbaru
    $idpembelianterbaru=$koneksi->insert_id;

    foreach ($_SESSION["keranjang"] as $idproduk => $qty)
    {
        //mendapatkan data produk berdasarkan idproduk
        $ambil=$koneksi->query("SELECT * FROM produk WHERE idproduk='$idproduk'");
        $perproduk=$ambil->fetch_assoc();

        $idp=$perproduk["idproduk"];
        $nama=$perproduk["namaproduk"];
        $harga=$perproduk["hargaproduk"];
        $stok=$perproduk["stokproduk"];
        $upstok=$stok-$qty;
        $subharga=$perproduk["hargaproduk"]*$qty;

        $koneksi->query("INSERT INTO pempro (idpembelian, idproduk, namaproduk, jumlah, hargaproduk, subharga) VALUES ('$idpembelianterbaru', '$idp', '$nama', '$qty', '$harga', '$subharga')");

        //update stok
        $koneksi->query("UPDATE produk SET stokproduk='$upstok' WHERE idproduk='$idp'");
    }

    //mengkosongkan cart
    unset($_SESSION["keranjang"]);

    //tampilan dialihkan ke laman nota pembelian terbaru
    echo "<script>alert('Print Nota');</script>";
    echo "<script>location='nota.php?id=$idpembelianterbaru';</script>";
}
?>
    <!--================ End Checkout Area =================-->

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