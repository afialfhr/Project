<?php
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
	echo "<center><strong>Akses Terbatas. Silahkan Login Terlebih Dahulu!<strong></center><br>";
	echo "<center><strong><a href='login.php'>Login Disini...</a><strong></center><br>";
}
else
{
	?>
<h2><i class="fa fa-angle-right"></i> Welcome!</h2>
  <div class="row mt">
    <div class="col-lg-12">
      <h4>Selamat datang di administration, admin <strong><?php echo $_SESSION["namaadmin"]; ?></strong>. Selamat bekerja!</h4>
    </div>
  </div>
  <?php } ?>