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
$pid=$_GET["id"];
$fpd=$_GET["fotoproduk"];
$idad=$_SESSION["idadmin"];
$naad=$_SESSION["namaadmin"];
$pdde=$_GET["id"];
$log="Menghapus Data Produk dengan ID: $pdde";

$now=date("Y-m-d H:i:s");

$ambil=$koneksi->query("SELECT * FROM produk WHERE idproduk='$pid'");
$produk=$ambil->fetch_assoc();

if (file_exists("../fotoproduk/".$fpd))
{
	unlink('../fotoproduk/'.$fpd);
	$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	$koneksi->query("DELETE FROM produk WHERE idproduk='$pid'");
}
else
{
	$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	$koneksi->query("DELETE FROM produk WHERE idproduk='$pid'");
}

echo "<script>alert('Produk Telah Dihapus');</script>";
echo "<script>location='media.php?halaman=dproduk'</script>";
}
?>

<!-- var_dump($_GET); -->