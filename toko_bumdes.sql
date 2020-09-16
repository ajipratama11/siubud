-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Sep 2020 pada 07.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_bumdes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `no_tlp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `no_tlp`) VALUES
(1, 'aji', 'aji', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(32) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `id_kategori`, `harga_jual`, `stok`, `keterangan`) VALUES
('RJ0001', 'Pensil', 'KB0002', 3500, 40, 'kaskasasas'),
('RJ0002', 'Penghapus', 'KB0002', 1500, 13, 'asasas'),
('RJ0003', 'Pulpen', 'KB0002', 2000, 25, 'asas'),
('RJ0004', 'Teh Gelas', 'KB0004', 2000, 17, 'asas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_besar`
--

CREATE TABLE `buku_besar` (
  `id_bukubesar` int(11) NOT NULL,
  `kode_transaksi` varchar(12) NOT NULL,
  `tipe` enum('penjualan','pembelian','kas') NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(10) NOT NULL,
  `jenis` enum('debit','kredit') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_besar`
--

INSERT INTO `buku_besar` (`id_bukubesar`, `kode_transaksi`, `tipe`, `tanggal`, `nominal`, `jenis`, `keterangan`) VALUES
(1, 'KS0002', 'kas', '2020-09-10', 100000, 'kredit', 'Baik baik aja'),
(2, 'KS0003', 'kas', '2020-09-09', 20000, 'debit', 'as'),
(3, 'PB0006', 'pembelian', '2020-09-10', 8000, 'kredit', 'dada'),
(4, 'PB0007', 'pembelian', '2020-08-01', 100000, 'kredit', ''),
(5, 'PJ0005', 'penjualan', '2020-08-01', 200000, 'debit', ''),
(6, 'PB0008', 'pembelian', '2020-10-14', 17500, 'kredit', ''),
(7, 'PB0009', 'pembelian', '2020-09-16', 12000, 'kredit', 'kk'),
(8, 'PB0010', 'pembelian', '2020-09-17', 28000, 'kredit', 'dada'),
(9, 'PJ0006', 'penjualan', '2020-10-15', 3500, 'debit', 'dada'),
(10, 'PJ0007', 'penjualan', '2020-10-10', 3500, 'debit', 'dada'),
(11, 'PJ0008', 'penjualan', '2020-10-16', 8500, 'debit', 'dada'),
(12, 'PJ0009', 'penjualan', '2020-09-16', 14500, 'debit', 'dada'),
(13, 'PJ0010', 'penjualan', '2020-10-19', 38500, 'debit', 'dada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail` int(5) NOT NULL,
  `kode_pembelian` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `harga_satuan` int(50) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail`, `kode_pembelian`, `kode_barang`, `qty`, `harga_satuan`, `keterangan`) VALUES
(11, 'PB0001', 'RJ0004', 2, 1000, 'baik'),
(12, 'PB0001', 'RJ0003', 3, 1400, 'baik'),
(13, 'PB0002', 'RJ0001', 5, 1000, 'baik'),
(14, 'PB0003', 'RJ0003', 10, 1000, 'baik'),
(16, 'PB0004', 'RJ0001', 2, 1000, 'baik'),
(17, 'PB0005', 'RJ0001', 2, 2000, 'baik'),
(18, 'PB0006', 'RJ0001', 2, 1000, 'baik'),
(19, 'PB0006', 'RJ0003', 3, 2000, 'baik'),
(20, 'PB0007', 'RJ0002', 10, 10000, ''),
(21, 'PB0008', 'RJ0001', 2, 2000, 'baik'),
(22, 'PB0008', 'RJ0003', 9, 1500, 'baik'),
(23, 'PB0009', 'RJ0002', 9, 1000, 'baik'),
(24, 'PB0009', 'RJ0003', 2, 1500, 'baik'),
(25, 'PB0010', 'RJ0001', 14, 2000, 'baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(50) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `harga_satuan` int(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `kode_penjualan`, `kode_barang`, `qty`, `harga_satuan`, `keterangan`) VALUES
(1, 'PJ0001', 'RJ0003', 2, 2000, 'baik'),
(2, 'PJ0001', 'RJ0003', 2, 2000, 'baik'),
(3, 'PJ0002', 'RJ0001', 2, 2500, 'baik'),
(4, 'PJ0002', 'RJ0003', 2, 2000, 'baik'),
(5, 'PJ0003', 'RJ0002', 2, 1500, 'baik'),
(6, 'PJ0003', 'RJ0004', 2, 2000, 'baik'),
(7, 'PJ0004', 'RJ0001', 2, 2500, 'baik'),
(8, 'PJ0004', 'RJ0004', 5, 2000, 'baik'),
(9, 'PJ0005', 'RJ0001', 20, 10000, ''),
(10, 'PJ0006', 'RJ0001', 1, 3500, 'baik'),
(11, 'PJ0007', 'RJ0003', 1, 2000, 'baik'),
(12, 'PJ0007', 'RJ0002', 1, 1500, 'baik'),
(13, 'PJ0008', 'RJ0001', 2, 3500, 'baik'),
(14, 'PJ0008', 'RJ0002', 1, 1500, 'baik'),
(15, 'PJ0009', 'RJ0002', 3, 1500, 'baik'),
(16, 'PJ0009', 'RJ0003', 5, 2000, 'baik'),
(17, 'PJ0010', 'RJ0001', 9, 3500, 'baik'),
(18, 'PJ0010', 'RJ0002', 2, 1500, 'baik'),
(19, 'PJ0010', 'RJ0003', 2, 2000, 'baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `kode_kas` varchar(9) NOT NULL,
  `tanggal_kas` date NOT NULL,
  `nominal` int(10) NOT NULL,
  `jenis` enum('debit','kredit') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`kode_kas`, `tanggal_kas`, `nominal`, `jenis`, `keterangan`) VALUES
('KS0001', '2020-09-10', 100000, 'kredit', 'Baik baik aja'),
('KS0002', '2020-09-10', 100000, 'kredit', 'Baik baik aja'),
('KS0003', '2020-09-09', 20000, 'kredit', 'as');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KB0001', 'Aksesoris'),
('KB0002', 'ATK'),
('KB0004', 'Minuman'),
('KB0005', 'Makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` varchar(50) NOT NULL,
  `tanggal_pembelian` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `id_admin` int(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `tanggal_pembelian`, `total`, `id_admin`, `keterangan`) VALUES
('PB0001', '2020/09/10', 6200, 1, ''),
('PB0002', '2020/09/22', 5000, 1, ''),
('PB0003', '2020/09/29', 20000, 1, ''),
('PB0004', '2020/10/16', 2000, 1, 'dadaadadad'),
('PB0005', '2020/10/10', 4000, 1, ''),
('PB0006', '2020/10/10', 8000, 1, 'dada'),
('PB0007', '2020/10/01', 100000, 1, ''),
('PB0008', '2020/10/14', 17500, 1, ''),
('PB0009', '2020/09/16', 12000, 1, 'kk'),
('PB0010', '2020/09/17', 28000, 1, 'dada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` varchar(30) NOT NULL,
  `tanggal_penjualan` varchar(35) NOT NULL,
  `nama_pembeli` varchar(35) NOT NULL,
  `total_qty` int(35) NOT NULL,
  `total_penjualan` int(50) NOT NULL,
  `total_bayar` int(50) NOT NULL,
  `potongan` int(11) NOT NULL,
  `id_admin` int(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `tanggal_penjualan`, `nama_pembeli`, `total_qty`, `total_penjualan`, `total_bayar`, `potongan`, `id_admin`, `keterangan`) VALUES
('PJ0001', '2020/09/16', 'Aji ', 4, 8000, 8000, 2000, 1, ''),
('PJ0002', '2020/10/01', 'Aji ', 4, 9000, 8000, 2000, 1, ''),
('PJ0003', '2020/09/16', 'Aji ', 4, 7000, 8000, 2000, 1, ''),
('PJ0004', '2020/09/22', 'Mega Silvia', 7, 15000, 20000, 2000, 1, ''),
('PJ0005', '2020/09/01', 'aji', 20, 200000, 200000, 0, 1, ''),
('PJ0006', '2020/10/15', 'Aji ', 1, 3500, 10000, 1000, 1, 'dada'),
('PJ0007', '2020/10/10', 'Mega Silvia', 2, 3500, 5000, 0, 1, 'dada'),
('PJ0008', '2020/10/16', 'Aji ', 3, 8500, 10000, 2000, 1, 'dada'),
('PJ0009', '2020/09/16', 'Aji ', 8, 14500, 20000, 3000, 1, 'dada'),
('PJ0010', '2020/10/19', 'Aji ', 13, 38500, 50000, 5000, 1, 'dada');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `buku_besar`
--
ALTER TABLE `buku_besar`
  ADD PRIMARY KEY (`id_bukubesar`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`kode_kas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku_besar`
--
ALTER TABLE `buku_besar`
  MODIFY `id_bukubesar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
