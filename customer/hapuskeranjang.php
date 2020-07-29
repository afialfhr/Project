<?php
session_start();

$idp=$_GET["id"];
unset($_SESSION["keranjang"][$idp]);

echo "<script>alert('Produk telah dihapus dari Keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>