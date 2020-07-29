<?php
session_start();
include '../config/koneksi.php';

//mencegah sql ijection
function anti_injection($data)
{
	$filter=mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTE))));
	return $filter;
}

$user=$_POST["username"];
$pass=md5($_POST["password"]);
$reme=$_POST["rememberme"];

$login=mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user' and password='$pass'");
$akuncocok=mysqli_num_rows($login);
$ada=mysqli_fetch_array($login);

if ($akuncocok==1)
{
	//berhasil login
	session_start();
	$_SESSION[username]=$ada[username];
	$_SESSION[namaadmin]=$ada[namaadmin];
	$_SESSION[password]=$ada[password];
	$_SESSION[idadmin]=$ada[idadmin];
	$_SESSION[fotoadmin]=$ada[fotoadmin];
	$_SESSION[posisiadmin]=$ada[posisiadmin];

	$idlama=session_id();
	session_regenerate_id();
	$idbaru=session_id();

	echo "<script>alert('Login Berhasil'); window.location=media.php</script>";
	header("location:media.php?halaman=home");

	if (!empty($_POST['rememberme']))
	{
	//set cookie 5 hari (detik)
		setcookie ('username', $user, time()+432000);
	}
	else
	{
		if(isset($_COOKIE["username"]))
	 	{
	 		setcookie ("username","");
	 	}
	 }
}
else
{
	echo "<script>alert('Identitas akun anda salah, silahkan periksa kembali username dan password anda!'); window.location=login.php</script>";
	header('location:login.php');
}
?>