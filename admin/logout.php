<?php
include '../config/koneksi.php';
session_start();

date_default_timezone_set("asia/jakarta");
$admin=$_SESSION["idadmin"];
$time=date("Y-m-d H:i:s");

$koneksi->query("UPDATE admin SET loginterakhir='$time' WHERE idadmin='$admin'");

session_destroy();
echo "<script>alert('Anda telah Log Out.')</script>";
echo "<script>location='login.php';</script>";
?>