-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 04:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siawarak`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `pengampu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `alamat`, `jenis_kelamin`, `email`, `telp`, `photo`, `pengampu`) VALUES
(9, '196206061990072002', 'SUYATI, S.Pd.SD', 'Rt 04 Rw 08 Watuagung, Kec. Tambak, Kab. Banyumas', 'Laki-Laki', 'suyati12@gmail.com', '085292835213', '127.png', 'Kepala Sekolah'),
(10, '198103092006042001', 'SRI SUHARYATI, S.Pd', 'RT 01 RW 01 Watuagung, Kec. Tambak, Kab. Banyumas', 'Perempuan', 'sriyati@gmail.com', '087833254882', 'Hd_1280x800_Cool_3d_Blue_Rose_Desktop_Wallpapers_Backgrounds3.jpg', 'Kelas 4'),
(11, '195908011985031002', 'NOWO SUHENDRO,S.Pd', 'RT 05 RW 04 Prembun,Kec.Tambak, Kab. Banyumas', 'Laki-Laki', 'nowoshuhendro@gmail.com', '085324567832', 'saaaaaaaaaaaaaaaaaaaaaaaaaaaaa.jpg', 'Kelas 1'),
(13, '3302081312950001', 'AGUS LATIF AZIS FAUZI', 'Rt 01 Rw 03 Watuagung, kec. Tambak, Kab. Banyumas', 'Laki-Laki', 'azizfauzi13@gmail.com', '085678456086', 'sertifikat2.png', 'Kelas 3'),
(14, '196503072008012001', 'SITI SOFATI, S.Pd.SD', 'RT 07 RW 01 Gumelar Kidul, Kec. Tambak, Kab. Banyumas', 'Perempuan', 'sitisofatii@gmail.com', '085786756432', 'windows-11-flow-dark-mode-dark-background-pink-3840x2160-57472.jpg', 'Kelas 5'),
(15, '196206061990062002', 'DWI SETYANINGSIH, S.Pd', 'RT 01 RW 01 Kamulyan,Kec.Tambak, Kab. Banyumas', 'Perempuan', 'dwisetya@gmail.com', '085678456065', 'Black_and_Blue_Abstract_Wallpaper_PC_1254_HD_Wallpaper_Site5.jpg', 'Operator Sekolah'),
(17, '196206061990052001', 'ARIF ROHMAN HAKIM, S.Pd', 'Rt 04 Rw 08 Watuagung, kec. Tambak, Kab. Banyumas', 'Laki-Laki', 'arifhakim29@gmail.com', '087833254882', 'Black_and_Blue_Abstract_Wallpaper_PC_1254_HD_Wallpaper_Site6.jpg', 'Guru Mata Pelajaran Olahraga'),
(18, '3302080108830002', 'AGUS SETIONO', 'Rt 07 Rw 01Prembun, Kec. Tambak, Kab. Banyumas', 'Laki-Laki', 'agus29@gmail.com', '081345675324', 'saaaaaaaaaaaaaaaaaaaaaaaaaaaaa1.jpg', 'Kelas 2'),
(19, '12345678', 'JATMIKO, S.Pd.SD', 'dddqqwsq', 'Laki-Laki', 'sa@gmail.com', '0878675534', '', 'Kelas 6');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_mp` varchar(50) NOT NULL,
  `kode_kls` varchar(50) NOT NULL,
  `kode_smt` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `waktu_awal` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `kode_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_mp`, `kode_kls`, `kode_smt`, `hari`, `waktu_awal`, `waktu_akhir`, `kode_jadwal`) VALUES
('BI', 'K3', 'S001', 'Senin', '19:34:00', '18:34:00', 47),
('BI', 'K1', 'S001', 'Selasaasakamis dan minggu dan', '23:02:00', '04:02:00', 52),
('IPA', 'K1', 'S001', 'Senin testing', '00:00:00', '02:00:00', 53),
('BI', 'K1', 'S001', 'Selasaasakamis dan minggu manggu', '23:02:00', '04:02:00', 54),
('BI', 'K1', 'S001', 'Jumat', '01:00:00', '07:00:00', 55);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(3) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `nama_wali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `nama_wali`) VALUES
('K1', 'Kelas 1', 'NOWO SUHENDRO,S.Pd'),
('K2', 'Kelas 2', 'AGUS SETIONO'),
('K3', 'Kelas 3', 'AGUS LATIF AZIS FAUZI'),
('K4', 'Kelas 4', 'SUYATI, S.Pd.SD'),
('K5', 'Kelas 5', 'ARIF ROHMAN HAKIM, S.Pd'),
('K6', 'Kelas 6', 'JATMIKO, S.Pd.SD');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`) VALUES
('BI', 'Bahasa Indonesias'),
('IPA', 'Ilmu Alam'),
('IPS', 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `kode_mp` varchar(20) NOT NULL,
  `pertemuan` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `alpha` int(25) NOT NULL,
  `ijin` int(25) NOT NULL,
  `sakit` int(25) NOT NULL,
  `kode_semester` varchar(20) NOT NULL,
  `kode_ta` varchar(20) NOT NULL,
  `nis` int(50) NOT NULL,
  `hadir` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `kode_mp`, `pertemuan`, `tanggal`, `alpha`, `ijin`, `sakit`, `kode_semester`, `kode_ta`, `nis`, `hadir`) VALUES
(14, 'BI', 6123, '2023-03-24', 1, 0, 1, 'S001', 'Genapin aja lagi', 123456, 1),
(15, 'BI', 6, '2023-03-29', 1, 0, 0, 'S001', 'Genapin aja lagi', 123456, 2),
(16, 'BI', 10, '2023-03-29', 1, 0, 0, 'S001', 'Genapin aja lagi', 123456, 2);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `kode_semester` varchar(25) NOT NULL,
  `nama_semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`kode_semester`, `nama_semester`) VALUES
('S001', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_lengkap` varchar(120) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_kelas` varchar(120) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_lengkap`, `alamat`, `telepon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nama_kelas`, `photo`) VALUES
(70, 123456, 'saya sayuri', 'hayo', '0931414324', 'Mana', '2023-02-04', 'Laki-Laki', 'Kelas 1', 'Hd_1280x800_Cool_3d_Blue_Rose_Desktop_Wallpapers_Backgrounds4.jpg'),
(71, 1234567, 'sayur sarimi', 'adsada', '09271313', 'jl rumah', '2023-02-05', 'Laki-Laki', 'Kelas 2', '9c013eaff6e7b639240fb23c55156df3e3ec1ec17.jpg'),
(72, 123456789, 'balon', 'd', '343', 'sad', '2023-03-06', 'Laki-Laki', 'Kelas 1', 'Dark_Blue_Backgrounds_Image2.jpg'),
(73, 2147483647, 'balonkuusd', 'dsdsa', '1234', 'good', '2023-03-17', 'Laki-Laki', 'Kelas 1', 'Screenshot_2022-10-20_0950454.png'),
(74, 432523523, 'fad', 'fadfa', '5252352', 'langit', '2023-02-02', 'Perempuan', 'Kelas 4', 'as.jpg'),
(75, 42343243, 'fasfas', 'fads', '5252', 'tanah', '2023-02-02', 'Laki-Laki', 'Kelas 3', 'WhatsApp_Image_2022-10-22_at_08_31_31.jpg'),
(76, 1213141516, 'Budi Santoso', 'Cilacap RT 03 Rw 05 Kecamatan Cilacap Kabupaten Banyumas', '086292835213', 'Cilacap', '2000-04-16', 'Laki-Laki', 'Kelas 2', 'Bambang.png'),
(77, 99, 'kupu kupu', 'manalagi ya', '999999999999', 'Mana jmp. 04/03', '2023-03-28', 'Perempuan', 'Kelas 3', 'sertifikat.png');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_thn_akad` int(11) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `kode_tahunakademik` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_thn_akad`, `tahun_akademik`, `kode_tahunakademik`, `status`) VALUES
(2, '2019/2020', 'Ganjil', 'Aktif'),
(4, '2023/2024', 'Genap', 'Aktif'),
(5, '1000', 'Genapin aja lagi', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_session`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'N', ''),
(6, 'maja', '0cc45c9b2fc35c72a5fae9a682d630e3', 'majadji12@gmail.com', 'user', 'N', 'd41d8cd98f00b204e9800998ecf8427e'),
(7, 'andrarizal', '6f08712cd08f4e4ebac5081a9f73eb77', 'suyati12@gmail.com', 'user', 'N', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'NOWO SUHENDRO,S.Pd', '0cc45c9b2fc35c72a5fae9a682d630e3', 'akumaja12345@gmail.com', 'user', 'N', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 'AGUS SETIONO', '0cc45c9b2fc35c72a5fae9a682d630e3', 'balonku@gmail.com', 'user', 'N', 'd41d8cd98f00b204e9800998ecf8427e'),
(10, 'AGUS LATIF AZIS FAUZI', '0cc45c9b2fc35c72a5fae9a682d630e3', 'balonku@gmail.coma', 'user', 'N', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `jadwal_ibfk_3` (`kode_kls`),
  ADD KEY `jadwal_ibfk_2` (`kode_mp`),
  ADD KEY `jadwal_ibfk_4` (`kode_smt`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`kode_semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_thn_akad`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_thn_akad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
