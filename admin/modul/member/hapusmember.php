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
$mid=$_GET["id"];
$fme=$_GET["fotomember"];
$idad=$_SESSION["idadmin"];
$naad=$_SESSION["namaadmin"];
$mede=$_GET["id"];
$log="Menghapus Akun Member dengan ID: $mede";

$now=date("Y-m-d H:i:s");

$ambil=$koneksi->query("SELECT * FROM member WHERE idmember='$mid'");
$pecah=$ambil->fetch_assoc();

if (file_exists("../fotomember/".$fme))
{
	unlink('../fotomember/'.$fme);
	$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	$koneksi->query("DELETE FROM member WHERE idmember='$mid'");
}
else
{
	$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	$koneksi->query("DELETE FROM member WHERE idmember='$mid'");
}

echo "<script>alert('Akun Telah Dihapus');</script>";
echo "<script>location='media.php?halaman=dmember'</script>";
}
?>

<!-- //	while (file_exists("../fotomember/".$fme))
// {
// 	unlink('../fotomember/'.$fme);
// }
// $koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
// $koneksi->query("DELETE FROM member WHERE idmember='$mid'");
 -->