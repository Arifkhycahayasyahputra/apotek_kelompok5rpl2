-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2025 at 12:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_kece`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `tanggal_pembuatan` date DEFAULT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `harga_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `gambar`, `jenis_obat`, `tanggal_pembuatan`, `tanggal_kadaluarsa`, `jumlah_stok`, `harga_obat`) VALUES
(1, 'microlax', 'https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,f_auto,q_auto:best,w_1024/v1635494994/n7lvcbm4zw6ugkcchuns.jpg', 'cair', '2023-10-01', '2026-10-02', 137, 'Rp15.000'),
(2, 'oskadon', 'https://singingdove.com/wp-content/uploads/2010/08/oskadon.jpg', 'tablet', '2023-10-04', '2027-10-02', 200, 'Rp25.000'),
(3, 'paramek', 'https://www.konimex.com/0_repository/images/20200811022726packshot-paramex-sakitkepala-web-10082020.png', 'tablet', '2023-10-05', '2026-10-05', 100, 'Rp20.000'),
(4, 'betadine', 'https://pyfa.co.id/wp-content/uploads/2024/05/betadine-15ml-600x600.jpg\r\n', 'cair', '2025-10-01', '2025-10-02', 400, 'Rp27.000'),
(5, 'promaag', 'https://kalbeinternational.com/wp-content/uploads/2017/10/Promag-Tablet.png', 'tablet', '2023-10-09', '2025-10-09', 44, 'Rp40.000'),
(6, 'sanmol', 'https://img.mbizmarket.co.id/products/thumbs/500x500/2023/10/12/a0f8d02f643f0321082a7aa012cc868b.jpg', 'cair', '2022-10-12', '2025-10-01', 200, 'Rp15.000'),
(7, 'panadol', 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/11/11024002/Panadol-Extra-10-Kaplet-2.jpg', 'tablet', '2023-10-18', '2025-10-09', 300, 'Rp24.000'),
(9, 'paracetamol', 'https://mypharma.imgix.net/assets/site/ddcparacetamol500mg_A.png?auto=format&crop=focalpoint&domain=mypharma.imgix.net&fit=crop&fp-x=0.5&fp-y=0.5&h=600&ixlib=php-3.3.1&q=82&w=600&s=f79968c5654cf5a9590d600e0e775ec2', ' tablet', '2020-10-02', '2025-10-02', 250, 'Rp.30.000'),
(10, 'bodrex', 'https://www.jagel.id/api/listimage/v/Bodrex-Extra-0-5595bea30c9ee4a5.jpg', 'tablet', '2024-10-22', '2025-10-02', 44, 'Rp30.000');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `total_pembelian` text NOT NULL,
  `tanggal_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_pembelian`, `id_user`, `id_obat`, `total_pembelian`, `tanggal_pembelian`) VALUES
(3, 8, 4, '10', '2025-11-20'),
(4, 1, 1, '10', '2025-11-13'),
(10, 3, 1, '10', '2025-11-13'),
(14, 6, 1, '10', '2025-11-22'),
(15, 3, 10, '3', '2025-11-23'),
(18, 3, 1, '6', '2025-11-23'),
(19, 6, 1, '7', '2025-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','pembeli') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `password`, `role`) VALUES
(1, 'arifkhy', 'laki-laki', '2009-06-23', 'parongpon', '$2y$10$1WwRDtsh9LLtCsvRnOBCCOcUpJhZi1SBJX9QFb8eoguU0A6I6J92i', 'admin'),
(2, 'nizar', 'laki-laki', '2000-10-08', 'kbb barat mantao', '$2y$10$k7CuM2YdqGeHwrtFyHdafOSocW7oPCJKdN7aY9oYFsy3JTE59esp2', 'petugas'),
(3, 'yapsa', 'perempuan', '2008-10-22', 'sangkuriang cimahi', '$2y$10$RPoxTeknc6v.bvYoRrPgGuTjQlDRwQeQQ2Dsja7HeOea8Hd6rEtne', 'pembeli'),
(5, 'pajri', 'laki-laki', '2008-10-05', 'batujajar', '$2y$10$O6MAE8YnOyIF7LM.ndLThuqS/hMjIpxX5qlZsS1ivvMuKYDGlsAke', 'pembeli'),
(6, 'uje', 'laki-laki', '2015-08-17', 'altereti', '$2y$10$/rCZZMfbwJemeH38q8ys..8UJ6THPYKrngi2Eb1ymn/vWxTI5Cmvu', 'pembeli'),
(8, 'adi', 'laki-laki', '2009-06-23', 'santiong', '$2y$10$mFoU4QKVA5IoWoZRARHEc.Vqqa77i2.kyU.2q0gVEEaPbU9k8934q', 'pembeli'),
(10, 'dick', 'laki-laki', '2015-08-17', 'santiong2', '$2y$10$MwpvOsRNsbM77L8COZihxub3cIvF1OG2yISsDwt48NqhEdSI/7j3i', 'pembeli'),
(22, 'babang', 'laki-laki', '2025-11-21', 'babangsssss', '$2y$10$.5ezQIn002m9SyAvxJa.2u6OoRkoUwdcj3kh.cu73xws7vxssnz2e', 'admin'),
(28, 'iki', 'laki-laki', '2025-11-12', 'santiuong', '$2y$10$KMUNepDWRsSh60e2SL7lSOra2M2czl4r2hA4L2DagE6qO.U6KU4S.', 'petugas'),
(29, 'steven', 'perempuan', '2025-11-06', 'brazil', '$2y$10$1G73ACtxgSBhb6hElzbXZulHvW3CWnAQHu8iV9s6CsWSb8i1pWGXW', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_obat` (`id_obat`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
