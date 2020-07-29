<?php
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
	echo "<center><strong>Akses Terbatas. Silahkan Login Terlebih Dahulu!<strong></center><br>";
	echo "<center><strong><a href='../../login.php'>Login Disini...</a><strong></center><br>";
}
else
{
include '../config/koneksi.php';
$prid=$_GET["id"];
$idad=$_SESSION["idadmin"];
$naad=$_SESSION["namaadmin"];
$kude=$_GET["id"];
$log="Menghapus Promo dengan ID: $kude";

$now=date("Y-m-d H:i:s");

$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
$koneksi->query("DELETE FROM promo WHERE idpromo='$prid'");

echo "<script>alert('Promo Telah Dihapus');</script>";
echo "<script>location='media.php?halaman=dpromo'</script>";
}
?>