<?php
session_start();
//get id dari url
$idp=$_GET['id'];

//jika sudah ada, +1
if (isset($_SESSION['keranjang'][$idp]))
{
    $_SESSION['keranjang'][$idp]+=1;
}

//jika belum ada, add cart 1
else
{
    $_SESSION['keranjang'][$idp]=1;
}

//berpindah ke halaman keranjang
echo "<script>alert('Produk Telah Masuk ke Keranjang Belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>