<?php
session_start();
include '../config/koneksi.php';

	$idp=$idp;
	$nama=$_SESSION['namamember'];
	$foto=$_SESSION['fotomember'];
	$now=date("Y-m-d H:i:s");
	$namaproduk=$detail["namaproduk"];
	$pu=$_POST['pesanulasan'];

if (isset($_POST['add']))
{
	$koneksi->query("INSERT INTO ulasan (idproduk, namamember, fotomember, tu, namaproduk, ulasan) VALUES ('$idp', '$nama', '$foto', '$now', '$namaproduk', '$pu')");
}
?>