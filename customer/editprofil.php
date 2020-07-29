<?php
session_start();
include "../config/koneksi.php";
$idm=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM member WHERE idmember='$idm'");
$member=$ambil->fetch_assoc();

//mendapatkan id pelanggan yang Login
$idpelangganlogin=$member["idmember"];

//mendapatkan id pelanggan yang Login Session
$idpelangganlogins=$_SESSION["idmember"];

if ($idpelangganlogin!==$idpelangganlogins)
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
                    <h1>Edit Profilmu</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">...<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Edit Profil</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================ Edit Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h2>Profilmu Saat ini</h2>
                        <form class="form-group" method="POST">
                            <div class="col-md-12 form-group">
                                <p>Foto Profilmu Saat ini:</p>
                                <img src="../fotomember/<?php echo $member["fotomember"]; ?>"><br><br>
                                <input type="text" class="form-control" value="<?php echo $member["fotomember"]; ?>" readonly title="Foto Profil">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Nama Lengkap:</p>
                                <input type="text" class="form-control" value="<?php echo $member["namamember"]; ?>" readonly title="Nama Lengkap">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Nomor Telefon:</p>
                                <input type="number" class="form-control" value="<?php echo $member["telefonmember"]; ?>" readonly title="Nomor Telefon">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Jenis Kelamin:</p>
                                <select class="form-control" title="Jenis Kelamin">
                                    <?php if ($member["jkmember"]=='Laki-Laki')
                                    { ?>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    <?php }
                                    else
                                    { ?>
                                        <option value="perempuan">Perempuan</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                    <?php } ?>
                                </select>
                            </div><br><br>

                            <div class="col-md-12 form-group">
                                <p>Tanggal Lahir:</p>
                                <input type="date" class="form-control" value="<?php echo $member["tlmember"]; ?>" readonly title="Tanggal Lahir">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Alamat Tinggal:</p>
                                <textarea type="text" class="form-control" readonly title="Alamat Tinggal"><?php echo $member["alamatmember"]; ?></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Alamat Email:</p>
                                <input type="email" class="form-control" value="<?php echo $member["emailmember"]; ?>" readonly title="Alamat Email">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Username:</p>
                                <input type="text" class="form-control" value="<?php echo $member["username"]; ?>" readonly title="Username">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Password:</p>
                                <input type="text" class="form-control" value="<?php echo $member["password"] ?>" readonly title="Password">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Pertanyaan Lupa Password:</p>
                                <textarea type="text" class="form-control" readonly title="Pertanyaan Lupa Password"><?php echo $member["pertanyaanlupa"]; ?></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Jawaban Lupa Password::</p>
                                <textarea type="text" class="form-control" readonly title="Jawaban Lupa Password"><?php echo $member["jawabanlupa"]; ?></textarea>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h2>Profil Barumu</h2>
                        <form class="form-group" method="POST" enctype="multipart/form-data">
                            <div class="col-md-12 form-group">
                                <p>Foto Profil:</p>
                                <input type="file" class="form-control" name="foto" title="Foto Profil">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Nama Lengkap:</p>
                                <input type="text" class="form-control" name="nama" value="<?php echo $member["namamember"]; ?>" title="Nama Lengkap">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Nomor Telefon:</p>
                                <input type="number" class="form-control" name="telefon" value="<?php echo $member["telefonmember"]; ?>" title="Nomor Telefon">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Jenis Kelamin:</p>
                                <select class="form-control" name="jk" title="Jenis Kelamin">
                                    <?php if ($member["jkmember"]=='Laki-Laki')
                                    { ?>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    <?php }
                                    else
                                    { ?>
                                        <option value="perempuan">Perempuan</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                    <?php } ?>
                                </select>
                            </div><br><br>

                            <div class="col-md-12 form-group">
                                <p>Tanggal Lahir:</p>
                                <input type="date" class="form-control" name="tl" value="<?php echo $member["tlmember"]; ?>" title="Tanggal Lahir">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Alamat Tinggal:</p>
                                <textarea type="text" class="form-control" name="alamat" title="Alamat Tinggal"><?php echo $member["alamatmember"]; ?></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Alamat Email:</p>
                                <input type="email" class="form-control" name="email" value="<?php echo $member["emailmember"]; ?>" title="Alamat Email">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Username:</p>
                                <input type="text" class="form-control" name="username" value="<?php echo $member["username"]; ?>" title="Username">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Password:</p>
                                <input type="text" class="form-control" name="password" value="<?php echo $member["password"] ?>" title="Password">
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Pertanyaan Lupa Password:</p>
                                <textarea type="text" class="form-control" name="pla" title="Pertanyaan Lupa Password"><?php echo $member["pertanyaanlupa"]; ?></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <p>Jawaban Lupa Password::</p>
                                <textarea type="text" class="form-control" name="jla" title="Jawaban Lupa Password"><?php echo $member["jawabanlupa"]; ?></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <button class="primary-btn" name="upd">Perbarui Profil</button>
                                <!-- <a href="#">Forgot Password?</a> -->
                            </div>
                        </form>
<?php
if (isset($_POST['upd']))
{
    $nama=$_POST["nama"];
    $telefon=$_POST["telefon"];
    $jk=$_POST["jk"];
    $birth=date("Y-m-d", strtotime($_POST["tl"]));
    $alamat=$_POST["alamat"];
    $email=$_POST["email"];
    $foto=$_FILES["foto"]["name"];
    $usern=$_POST["username"];
    $pass=md5($_POST["password"]);
    $pla=$_POST["pla"];
    $jla=$_POST["jla"];


    $fotolokasi=$_FILES["foto"]["tmp_name"];
    $today=date("Y-m-d");
    $now=date("Y-m-d H:i:s");

    if ($birth > $today)
    {
        echo "<script>alert('Periksa Kembali Tanggal yang diinput!');</script>";
        echo "<script>location='editprofil.php'</script>";
    }
    else
        if (!empty($fotolokasi))
        {
            move_uploaded_file($fotolokasi, "../fotomember/$foto");
            $koneksi->query("UPDATE member SET namamember='$nama', telefonmember='$telefon', jkmember='$jk', tlmember='$birth', alamatmember='$alamat', emailmember='$email', fotomember='$foto', username='$usern', password='$pass', pertanyaanlupa='$pla', jawabanlupa='$jla' WHERE idmember='$idm'");
        }
        else
        {
            $koneksi->query("UPDATE member SET namamember='$nama', telefonmember='$telefon', jkmember='$jk', tlmember='$birth', alamatmember='$alamat', emailmember='$email', username='$usern', password='$pass', pertanyaanlupa='$pla', jawabanlupa='$jla' WHERE idmember='$idm'");
        }
            echo "<script>alert('Profil telah Diperbarui');</script>";
            echo "<script>location='index.php';</script>";
}
?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Edit Area =================-->

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