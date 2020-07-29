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

$login=mysqli_query($koneksi, "SELECT * FROM member WHERE username='$user' and password='$pass'");
$akuncocok=mysqli_num_rows($login);
$ada=mysqli_fetch_array($login);

if ($akuncocok==1)
{
	//berhasil login
	session_start();
	$_SESSION[username]=$ada[username];
	$_SESSION[namamember]=$ada[namamember];
	$_SESSION[password]=$ada[password];
	$_SESSION[idmember]=$ada[idmember];
	$_SESSION[fotomember]=$ada[fotomember];

	$idlama=session_id();
	session_regenerate_id();
	$idbaru=session_id();

	// echo "<script>location='index.php'</script>";
	echo "<script>alert('Login Berhasil')</script>";
	header("location:index.php");

	if (!empty($reme))
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
	echo "<script>alert('Identitas akun anda salah, silahkan periksa kembali username dan password anda!')</script>";
	echo "<script>location='login.php'</script>";
}
?>

<?php include "header.php"; ?>
