-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 02:17 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siubud`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(10) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `tanggal_publish` date NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pertanian'),
(2, 'Perikanan'),
(3, 'Kerajinan'),
(4, 'Peternakan');

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int(11) NOT NULL,
  `nama_umkm` varchar(35) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `deskripsi` text NOT NULL,
  `profil` varchar(128) NOT NULL,
  `sampul` varchar(128) NOT NULL,
  `images` varchar(128) NOT NULL,
  `nama_pemilik` varchar(25) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `whatsapp` varchar(14) NOT NULL,
  `fb` varchar(35) NOT NULL,
  `instagram` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id_umkm`, `nama_umkm`, `id_kategori`, `deskripsi`, `profil`, `sampul`, `images`, `nama_pemilik`, `no_hp`, `whatsapp`, `fb`, `instagram`) VALUES
(1, 'UMKM Ikan Gabus', 2, 'Yang berdiri sejak tahun 2011. Pemilik usaha ini bernama Pak Wawan. Produk yang dijual yaitu benih ikan gabus. Usaha ini masuk kedalam kelompok ikan di Desa Kraton dan sudah memiliki badan hukum terkait perijinan usaha serta sertifikat budidaya.\r\nIkan gabus merupakan ikan jenis air tawar yang banyak beredar di Indonesia. Ikan dengan nama latin Channa striata ini memang dikenal memiliki berbagai manfaat untuk pengobatan.\r\nIkan gabus merupakan sumber protein dan vitamin A. Ikan ini juga mengandung asam arakidonat yang tinggi dan asam dokosaheksaenoat (DHA).\r\nPenjualan benih ikan gabus ini sudah menjangkau berbagai wilayah di seluruh Indonesia. Harga benih yaitu 300 – 400 rupiah per ekor.\r\nSistem penjualan yang dilakukan yaitu melalui majalah trubus, pengepul dan via WhatsApp.\r\n', 'gabus2.jpeg', 'gabus2.jpeg', 'gabus1.jpeg|gabus2.jpeg', 'Bapak Wawan', '6285210853778 ', '6285210853778 ', '', ''),
(2, 'UMKM Batik', 3, 'Yang berdiri sejak tahun 2010. Pemilik usaha ini bernama Bapak Subur. \r\nBatik yang dijual yaitu berupa batik tulis , batik cap dan batik sablon. Motif batik yang digunakan yaitu sesuai pemesanan dari pelanggan, biasanya seperti motif pisang, mahameru, kopi, dll.\r\nHarga batik ini yaitu mulai dari 200 rb. Penjualan batik ini dilakukan sesuai pemesanan dari konsumen. Biasanya konsumen memesan batik ini untuk acara resmi dan digunakan sebagai seragam dinas. Penjualan batik sudah mencapai kota Jember, Probolinggo dan dinas-dinas sekitar Kabupaten Lumajang. \r\nPenjualan biasanya dilakukan melalui sosial media seperti facebook dan via WhatsApp.\r\n', 'batik1.jpeg', 'batik3.jpeg', 'batik1.jpeg|batik2.jpeg|batik3.jpeg', 'Ibu Dartik', '6285232288248', '6285232288248', 'https://www.facebook.com/profile.ph', ''),
(3, 'UMKM Bunga', 1, 'Yang berdiri sejak tahun 2019. Pemilik usaha ini bernama Bapak Gatut herman. \r\nBunga yang dijual yaitu berbagai macam jenis bunga aglonema. Aglonema adalah jenis tanaman hias daun yang cukup populer. Daya tarik utama tanaman ini terletak pada keindahan daun-daun yang berwarna dan punya motif yang variatif. Sebab tanaman ini bisa hidup meski dengan cahaya matahari yang minim, maka dari itu sangat cocok bila anda memeliharanya di dalam rumah (indoor).\r\nKehadiran tanaman ini di dalam ruangan juga dapat memberi impresi keanggunan yang menyejukkan bagi orang-orang yang memandangnya.\r\nKeindahan sosok tanaman ini membuat popularitasnya tidak hanya dikenal di kawasan Indonesia atau Asia Tenggara saja, melainkan belahan bumi yang lainnya.\r\nSistem penjualan bunga ini sudah mencapai wilayah Kota Malang dan Jakarta. Harga bunga aglonema ini bermacam-macam sesuai jenis bunganya. \r\nPenjualan biasanya dilakukan melalui sosial media seperti via Instagram dan via WhatsApp.\r\n', 'bunga1.jpeg', 'bunga2.jpeg', 'bunga1.jpeg|bunga2.jpeg|bunga3.jpeg', 'Bapak Gatut', '6285259196778', '6285259196778', '', 'https://www.instagra'),
(4, 'UMKM Ternak Bebek', 4, 'Yang berdiri sejak tahun 2005. Pemilik usaha ini bernama Bapak Gatut herman. \r\nUsaha ini adalah usaha dalam penjualan telur bebek. Jenis bebeknya yaitu bebek peking. Bebek peking merupakan bebek pedaging yang berasal dari negeri Tirai bambu China.\r\nHarga telur bebek yang dijual yaitu 2500 per biji.\r\nPenjualan biasanya dilakukan melalui relasi dan via WhatsApp. \r\n', 'bebek1.jpeg', 'bebek2.jpeg', 'bebek1.jpeg|bebek2.jpeg|bebek3.jpeg', 'Bapak Gatut', '6285259196778', '6285259196778', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
