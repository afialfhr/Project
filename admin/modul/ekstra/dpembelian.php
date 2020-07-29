<?php 
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
	echo "<center><strong>Akses Terbatas. Silahkan Login Terlebih Dahulu!<strong></center><br>";
	echo "<center><strong><a href='../../login.php'>Login Disini...</a><strong></center><br>";
}
else
{
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Ponts Fish - Admin</title>

	<!-- Favicons -->
	<link href="img/favicon.png" rel="icon">
	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- DataTables -->
	<link rel="stylesheet" href="assets/DataTables/datatables.min.css">

	<!-- Bootstrap core CSS -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!--external css-->
	<link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
	<link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css"/>

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-responsive.css" rel="stylesheet">
	<script src="lib/chart-master/Chart.js"></script>
</head>

<body>
	<h2>Data Pembelian</h2>
		<table class="table table-bordered" id="datatables">
			<thead>
				<tr bgcolor="theme">
					<th>No.</th>
					<th>ID Pembelian</th>
					<th>Pemesan</th>
					<th>Tanggal Pembelian</th>
					<th>Total Harga</th>
					<th>Status Pembayaran</th>
					<th>Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php $nomor=1; ?>
				<?php $ambil=$koneksi->query("SELECT * FROM pembelian"); ?>
				<?php while($pembelian=$ambil->fetch_assoc()){ ?>
				<tr bgcolor="white">
					<td><?php echo $nomor; ?>.</td>
					<td><?php echo $pembelian["idpembelian"]; ?></td>
					<td><?php echo $pembelian["pemesan"]; ?></td>
					<td><?php echo date("d-M-y", strtotime($pembelian["tlbeli"])); ?></td>
					<td>Rp. <?php echo number_format($pembelian["totalharga"]); ?></td>
					<td><?php echo $pembelian["status"]; ?></td>
					<td>
						<?php if ($pembelian["status"]=="Menunggu Pembayaran"): ?>
							<a href="media.php?halaman=detpem&id=<?php echo $pembelian['idpembelian'] ?>" class="btn-info btn" title="Detail Pembelian">Detail <i class="fa fa-info-circle"></i></a>

						<?php elseif ($pembelian["status"]=="Pembayaran Berhasil"): ?>
							<a href="media.php?halaman=detpem&id=<?php echo $pembelian['idpembelian'] ?>" class="btn-info btn" title="Detail Pembelian">Detail <i class="fa fa-info-circle"></i></a>
							<a href="media.php?halaman=detbay&id=<?php echo $pembelian['idpembelian'] ?>&ido=<?php echo $pembelian['idongkir'] ?>" class="btn-danger btn" title="Detail Pembayaran">Cek Pembayaran <i class="#"></i></a>
			
						<?php elseif ($pembelian["status"]=="Transaksi Diproses"): ?>
							<a href="media.php?halaman=detpem&id=<?php echo $pembelian['idpembelian'] ?>" class="btn-info btn" title="Detail Pembelian">Detail <i class="fa fa-info-circle"></i></a>
							<a href="media.php?halaman=detkir&id=<?php echo $pembelian['idpembelian'] ?>" class="btn-warning btn" title="Detail Pengiriman">Cek Pengiriman <i class="#"></i></a>

							<?php else: ?>
							<a href="media.php?halaman=detpem&id=<?php echo $pembelian['idpembelian'] ?>" class="btn-success btn" title="Detail Pembelian">Detail <i class="fa fa-info-circle"></i></a>
							
						<?php endif ?>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>

		<div>
			<a href="media.php?halaman=home" class="btn btn-theme" title="Kembali ke Home"><i class="fa fa-arrow-left"></i>
			</a>
		</div>
</body>
</html>
<?php } ?>