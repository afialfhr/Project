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
$kid=$_GET["id"];
$idad=$_SESSION["idadmin"];
$naad=$_SESSION["namaadmin"];
$kude=$_GET["id"];
$log="Menghapus Data Kurir dengan ID: $kude";

$now=date("Y-m-d H:i:s");

$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
$koneksi->query("DELETE FROM kurir WHERE idkurir='$kid'");

echo "<script>alert('Kurir Telah Dihapus');</script>";
echo "<script>location='media.php?halaman=dkurir'</script>";
}
?>