<?php
include "../config/koneksi.php";
if (!isset($_SESSION["username"]) AND !isset($_SESSION["password"]))
{ ?>

<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">

				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="index.php"><img width="70" height="50" src="img/brand.jpg" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="kategori.php">Product</a></li>
						<li class="nav-item"><a class="nav-link" href="login.php">Login/Logup</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="keranjang.php" class="cart"><span class="ti-bag" title="Keranjang Belanja"></span></a>
						</li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search" title="Search"></span></button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="search_input" id="search_input_box">
		<div class="container">
			<form action="pencarian.php" class="d-flex justify-content-between">
				<input name="keyword" type="text" class="form-control" id="search_input" placeholder="Temukan produk yang kamu cari di sini...">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>
<?php
}
else
{ ?>
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">

				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="index.php"><img width="70" height="50" src="img/brand.jpg" alt=""></a>
				<font color="black">Hi, <?php echo $_SESSION["namamember"]; ?>! Semoga Harimu Menyenangkan.</font>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="kategori.php">Product</a></li>
						<li class="nav-item"><a class="nav-link" href="riwayatbelanja.php">Order's Status</a></li>

						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							 aria-expanded="false">Account</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="editprofil.php?id=<?php echo $_SESSION["idmember"] ?>">Setting</a></li>
								<li class="nav-item"><a class="nav-link" href="logout.php"  onclick="javascript: return confirm('Yakin mau Log Out?')">Log Out</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="keranjang.php" class="cart"><span class="ti-bag" title="Keranjang Belanja"></span></a>
						</li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search" title="Search"></span></button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="search_input" id="search_input_box">
		<div class="container">
			<form action="pencarian.php" class="d-flex justify-content-between">
				<input name="keyword" type="text" class="form-control" id="search_input" placeholder="Temukan produk yang kamu cari di sini...">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>
<?php } ?>