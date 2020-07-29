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
$aid=$_GET["id"];
$fad=$_GET["fotoadmin"];
$idad=$_SESSION["idadmin"];
$naad=$_SESSION["namaadmin"];
$adde=$_GET["id"];
$log="Menghapus Akun Admin dengan ID: $adde";

$now=date("Y-m-d H:i:s");

$ambil=$koneksi->query("SELECT * FROM admin WHERE idadmin='$aid'");
$pecah=$ambil->fetch_assoc();

if (file_exists("../fotoadmin/".$fad))
{
	unlink('../fotoadmin/'.$fad);
	$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	$koneksi->query("DELETE FROM admin WHERE idadmin='$aid'");
}
else
{
	$koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
	$koneksi->query("DELETE FROM admin WHERE idadmin='$aid'");
}

echo "<script>alert('Akun Telah Dihapus');</script>";
echo "<script>location='media.php?halaman=dadmin'</script>";
}
?>
<!-- // while (file_exists("../fotoadmin/".$fad))
// {
// 	unlink('../fotoadmin/'.$fad);
// }
// $koneksi->query("INSERT INTO log (idadmin, namadmin, waktu, log) VALUES ('$idad', '$naad', '$now', '$log')");
// $koneksi->query("DELETE FROM admin WHERE idadmin='$aid'");
 -->