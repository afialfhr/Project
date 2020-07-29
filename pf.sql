-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2020 pada 00.33
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pontsfish`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namaadmin` varchar(100) NOT NULL,
  `emailadmin` varchar(100) NOT NULL,
  `telefonadmin` varchar(100) NOT NULL,
  `fotoadmin` varchar(500) NOT NULL,
  `loginterakhir` datetime NOT NULL,
  `alamatadmin` text NOT NULL,
  `tladmin` date NOT NULL,
  `posisiadmin` enum('Admin Website','Admin Direksi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namaadmin`, `emailadmin`, `telefonadmin`, `fotoadmin`, `loginterakhir`, `alamatadmin`, `tladmin`, `posisiadmin`) VALUES
(1, 'fay', 'c8837b23ff8aaa8a2dde915473ce0991', 'alfahriz gustav', 'alfahrizgust@gmail.com', '082310709794', 'foto.jpg', '2020-01-09 10:58:56', 'jatiwaringin', '1999-06-06', 'Admin Direksi'),
(2, 'rara', 'd8830ed2c45610e528dff4cb229524e9', 'syafira', 'rara@gmail.com', '087876112413', '300266.jpg', '2019-12-29 13:29:53', 'Medan', '1997-07-07', 'Admin Website');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `idkurir` int(11) NOT NULL,
  `namakurir` varchar(100) NOT NULL,
  `telefonkurir` varchar(100) NOT NULL,
  `emailkurir` varchar(100) NOT NULL,
  `alamatkurir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`idkurir`, `namakurir`, `telefonkurir`, `emailkurir`, `alamatkurir`) VALUES
(1, 'JNE', '088672283684', 'jne@gmail.com', 'Jakarta Selatan'),
(2, 'Tiki', '081767823221', 'tiki@gmail.com', 'Bekasi Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `namadmin` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `idmember` int(11) NOT NULL,
  `namamember` varchar(100) NOT NULL,
  `telefonmember` varchar(100) NOT NULL,
  `jkmember` enum('Laki-Laki','Perempuan') NOT NULL,
  `tlmember` date NOT NULL,
  `alamatmember` text NOT NULL,
  `emailmember` varchar(100) NOT NULL,
  `fotomember` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pertanyaanlupa` varchar(250) NOT NULL,
  `jawabanlupa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`idmember`, `namamember`, `telefonmember`, `jkmember`, `tlmember`, `alamatmember`, `emailmember`, `fotomember`, `username`, `password`, `pertanyaanlupa`, `jawabanlupa`) VALUES
(1, 'Afi Al Fahriz', '082310709497', 'Laki-Laki', '1999-03-06', 'Jalan Mawar 3 No.14B Bintaro Pesanggrahan', 'afialfahriz.99@gmail.com', '1545079_894180553950116_32401761208460743_n.jpg', 'fay', 'c8837b23ff8aaa8a2dde915473ce0991', 'Warna Kesukaan', 'Biru'),
(2, 'Sandro Hamonangan', '098878981662', 'Laki-Laki', '1999-06-17', 'Jl. Bekasi, Pondok Gede', 'sandman@gmail.com', '_20170627_075625.JPG', 'sandman', '74be16979710d4c4e7c6647856088456', 'Aplikasi Kesukaan', 'ppt'),
(3, 'Syafira', '081344151664', 'Perempuan', '1997-07-07', 'Jl. Medan', 'rarasyaf@gmail.com', 'defaultprofil.png', 'rara', 'bd134207f74532a8b094676c4a2ca9ed', 'Buku Kesukaan', 'Novel'),
(4, 'Sandro', '081290704173', 'Laki-Laki', '1999-01-19', 'Perum Jatiwaringin', 'sandro@gmail.com', 'defaultprofil.png', 'sandro13', 'f1ecf1ffcd36cb7c156a0b9f1b8346c8', '', ''),
(5, 'Sandro', '081290704173', 'Laki-Laki', '2014-02-04', 'Jatirasa', 'sandro@gmail.com', 'defaultprofil.png', 'sandro13', 'f1ecf1ffcd36cb7c156a0b9f1b8346c8', '', ''),
(6, 'Sandro', '081290704173', 'Laki-Laki', '1999-01-19', 'Perumahan Jatiwaringin', 'sandro@gmail.com', 'defaultprofil.png', 'sandro13', 'f1ecf1ffcd36cb7c156a0b9f1b8346c8', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `idongkir` int(11) NOT NULL,
  `idkurir` int(11) NOT NULL,
  `namakurir` varchar(100) NOT NULL,
  `wilayah` varchar(250) NOT NULL,
  `tarif` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`idongkir`, `idkurir`, `namakurir`, `wilayah`, `tarif`, `waktu`) VALUES
(1, 1, 'JNE', 'Jabodetabek', 20000, 2),
(2, 1, 'JNE', 'Jawa Barat', 25000, 3),
(3, 2, 'Tiki', 'Jabodetabek', 18000, 2),
(4, 2, 'Tiki', 'Jawa Tengah', 23000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idpembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tlbayar` date NOT NULL,
  `buktibayar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `idpembelian`, `nama`, `bank`, `jumlah`, `tlbayar`, `buktibayar`) VALUES
(1, 1, 'afi', 'BCA', 296500, '2020-01-05', '20170926_143851.jpg'),
(2, 2, 'ana', 'bca', 21500, '2020-01-09', 'Screenshot (2).png'),
(3, 3, 'rara', 'mandiri', 66000, '2020-01-09', 'Screenshot (1).png'),
(4, 5, 'rudi', 'panin', 725000, '2020-01-09', '20150305_143000.jpg'),
(5, 4, 'wawan', 'mandiri', 97000, '2020-01-09', '20171026_153342.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `pemesan` varchar(100) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `idongkir` int(11) NOT NULL,
  `alamatkirim` text NOT NULL,
  `tlbeli` date NOT NULL,
  `totalharga` int(11) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Menunggu Pembayaran',
  `resi` varchar(100) NOT NULL,
  `kurir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `idmember`, `pemesan`, `telefon`, `idongkir`, `alamatkirim`, `tlbeli`, `totalharga`, `wilayah`, `tarif`, `catatan`, `status`, `resi`, `kurir`) VALUES
(1, 1, 'afi', '082310709497', 1, 'bekasi', '2020-01-05', 296500, 'Jabodetabek', 20000, '', 'Transaksi Diproses', 'sfpfddhdkfd', 'JNE'),
(2, 1, 'ana', '081334431776', 3, 'adasasd', '2020-01-09', 21500, 'Jabodetabek', 18000, 'a', 'Transaksi Diproses', 'asem', 'Tiki'),
(3, 1, 'putri', '1', 3, 'bintaro', '2020-01-09', 66000, 'Jabodetabek', 18000, 'taruh di teras', 'Transaksi Diproses', 'ahdhsggd', 'Tiki'),
(4, 1, 're', '3', 2, 'bandung', '2020-01-09', 97000, 'Jawa Barat', 25000, 'a', 'Transaksi Selesai', '75333534426', 'JNE'),
(5, 1, 'rudi', '5653', 2, 'banten', '2020-01-09', 725000, 'Jawa Barat', 25000, '', 'Pembayaran Berhasil', '', ''),
(6, 1, 'wawan', '74573', 2, 'curug', '2020-01-09', 375000, 'Jawa Barat', 25000, '', 'Menunggu Pembayaran', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pempro`
--

CREATE TABLE `pempro` (
  `idpempro` int(11) NOT NULL,
  `idpembelian` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaproduk` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pempro`
--

INSERT INTO `pempro` (`idpempro`, `idpembelian`, `idproduk`, `namaproduk`, `jumlah`, `hargaproduk`, `subharga`) VALUES
(1, 1, 1, 'Ikan Mas', 20, 2500, 50000),
(2, 1, 2, 'Ikan Lele', 51, 3500, 178500),
(3, 1, 4, 'Ikan Gurame', 2, 24000, 48000),
(4, 2, 2, 'Ikan Lele', 1, 3500, 3500),
(5, 3, 4, 'Ikan Gurame', 2, 24000, 48000),
(6, 4, 4, 'Ikan Gurame', 3, 24000, 72000),
(7, 5, 2, 'Ikan Lele', 200, 3500, 700000),
(8, 6, 2, 'Ikan Lele', 100, 3500, 350000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `fotoproduk` varchar(500) NOT NULL,
  `namaproduk` varchar(250) NOT NULL,
  `kategoriproduk` enum('Ikan Hias','Ikan Konsumsi') NOT NULL,
  `hargaproduk` int(11) NOT NULL,
  `beratproduk` int(11) NOT NULL,
  `stokproduk` varchar(50) NOT NULL,
  `deskripsiproduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `fotoproduk`, `namaproduk`, `kategoriproduk`, `hargaproduk`, `beratproduk`, `stokproduk`, `deskripsiproduk`) VALUES
(1, 'ikanmas1.jpg', 'Ikan Mas', 'Ikan Hias', 2500, 30, '100', 'Ikan Mas Umur 3 bulan, sehat, lincah. Bisa dipelihara atau dibuat pakan.'),
(2, 'ikanlele1.jpg', 'Ikan Lele', 'Ikan Konsumsi', 3500, 150, '200', 'Ikan Lele Umur 2 bulan, sehat, dagingnya gurih. Cocok untuk menu masakan.'),
(3, 'cupang1.jpg', 'Ikan Cupang', 'Ikan Hias', 50000, 25, '5', 'Ikan Cupang Beta Red lebar'),
(4, 'gurame1.jpg', 'Ikan Gurame', 'Ikan Konsumsi', 24000, 700, '10', 'Gurame Air Tawar Besar, enak untuk dimasak bersama keluarga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `idpromo` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `namaproduk` varchar(250) NOT NULL,
  `harganormal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `hargadiskon` int(11) NOT NULL,
  `fotoproduk` varchar(500) NOT NULL,
  `deskripsiproduk` text NOT NULL,
  `kategoriproduk` enum('Ikan Hias','Ikan Konsumsi') NOT NULL,
  `beratproduk` int(11) NOT NULL,
  `stokproduk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`idpromo`, `idproduk`, `namaproduk`, `harganormal`, `diskon`, `hargadiskon`, `fotoproduk`, `deskripsiproduk`, `kategoriproduk`, `beratproduk`, `stokproduk`) VALUES
(1, 1, 'Ikan Mas', 2500, 30, 1750, 'ikanmas1.jpg', 'Ikan Mas Umur 3 bulan, sehat, lincah. Bisa dipelihara atau dibuat pakan.', 'Ikan Hias', 30, '<20'),
(2, 3, 'Ikan Cupang', 50000, 10, 45000, 'cupang1.jpg', 'Ikan Cupang Beta Red lebar', 'Ikan Hias', 25, '<2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `idulasan` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `namamember` varchar(100) NOT NULL,
  `fotomember` varchar(500) NOT NULL,
  `tu` datetime NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `ulasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`idulasan`, `idproduk`, `namamember`, `fotomember`, `tu`, `namaproduk`, `ulasan`) VALUES
(1, 1, 'fay', '1545079_894180553950116_32401761208460743_n.jpg', '2020-01-04 15:58:55', 'Ikan Mas', 'warna ikannya bagus. top deh'),
(2, 1, 'fay', 'defaultprofil.png', '2020-01-04 20:21:13', 'Ikan Mas', 'warna ikannya bagus. top deh'),
(10, 2, 'Afi Al Fahriz', '1545079_894180553950116_32401761208460743_n.jpg', '2020-01-04 21:42:43', 'Ikan Lele', 'a'),
(12, 1, 'Afi Al Fahriz', '1545079_894180553950116_32401761208460743_n.jpg', '2020-01-04 21:43:16', 'Ikan Mas', 'a'),
(13, 2, 'Afi Al Fahriz', '1545079_894180553950116_32401761208460743_n.jpg', '2020-01-04 21:45:02', 'Ikan Lele', 'b'),
(14, 2, 'Afi Al Fahriz', '1545079_894180553950116_32401761208460743_n.jpg', '2020-01-04 21:45:06', 'Ikan Lele', 'b'),
(15, 1, 'Afi Al Fahriz', '1545079_894180553950116_32401761208460743_n.jpg', '2020-01-04 21:45:49', 'Ikan Mas', 'mantul'),
(22, 2, 'Afi Al Fahriz', '1545079_894180553950116_32401761208460743_n.jpg', '2020-01-04 22:13:12', 'Ikan Lele', 'c'),
(23, 2, 'Afi Al Fahriz', '1545079_894180553950116_32401761208460743_n.jpg', '2020-01-05 04:16:12', 'Ikan Lele', 'uwu lele');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`idkurir`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`idongkir`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`);

--
-- Indeks untuk tabel `pempro`
--
ALTER TABLE `pempro`
  ADD PRIMARY KEY (`idpempro`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`idpromo`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`idulasan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `idkurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `idongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pempro`
--
ALTER TABLE `pempro`
  MODIFY `idpempro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `idpromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `idulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
