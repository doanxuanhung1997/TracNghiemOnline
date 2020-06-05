-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 10:41 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracnghiem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangdiem`
--

CREATE TABLE `bangdiem` (
  `idBangDiem` int(11) NOT NULL,
  `TenDeThi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idHocVien` int(11) NOT NULL,
  `DiemSo` float NOT NULL,
  `NgayLamBai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bangdiem`
--

INSERT INTO `bangdiem` (`idBangDiem`, `TenDeThi`, `idHocVien`, `DiemSo`, `NgayLamBai`, `created_at`, `updated_at`) VALUES
(11, 'Kỳ Thi THPT Tư Nghĩa 2019 Lần 2', 9, 0, '2019-03-24 17:00:00', '2019-03-24 17:00:00', '2019-03-24 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `idCauHoi` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `idChuDe` int(11) NOT NULL,
  `NoiDung` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhuongAnA` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhuongAnB` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhuongAnC` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhuongAnD` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DapAn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlHinh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayDuocTao` date NOT NULL,
  `idNguoiTao` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `ChuThich` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`idCauHoi`, `idMonHoc`, `idLevel`, `idChuDe`, `NoiDung`, `PhuongAnA`, `PhuongAnB`, `PhuongAnC`, `PhuongAnD`, `DapAn`, `urlHinh`, `NgayDuocTao`, `idNguoiTao`, `TrangThai`, `ChuThich`, `created_at`, `updated_at`) VALUES
(19, 1, 1, 16, '<p>Tìm m để phương trình sau có đúng 3 nghiệm :</p>', '<p>2&lt;m&lt;3</p>', '<p>m&gt;3</p>', '<p>m=2</p>', '<p>m=3</p>', 'B', 'Z0Gw_1.jpg', '2018-12-22', 4, 1, 'a b c d e f g h', '2018-12-21 23:18:30', '2018-12-21 23:18:30'),
(20, 1, 1, 16, '<p>32.4<sup>x</sup>-18.2<sup>x</sup>+1&lt;0</p>', '<p>1&lt;x&lt;4</p>', '<p>1/16&lt;x&lt;1/2</p>', '<p>2&lt;x&lt;4</p>', '<p>-4&lt;x&lt;-1</p>', 'D', '', '2018-12-22', 4, 1, 'aaaaaa ffffg', '2018-12-21 23:22:53', '2018-12-21 23:22:53'),
(21, 1, 1, 16, '<p>Giải phương trình sau&nbsp; 5<sup>x-1</sup>+5.0,2<sup>x-2</sup>=26</p>', '<p>4</p>', '<p>2</p>', '<p>1</p>', '<p>3</p>', 'A', '', '2018-12-22', 4, 1, '1 2  3 4 5 6  7', '2018-12-22 06:26:15', '2018-12-21 23:26:15'),
(22, 1, 2, 16, '<p>Phương trình 3<sup>1+x</sup>&nbsp;+ 3<sup>1-x</sup>=10</p>', '<p>Có hai nghiệm âm</p>', '<p>Vô nghiệm</p>', '<p>Có hai nghiệm dương</p>', '<p>Có một nghiệm âm và một nghiệm dương</p>', 'D', '', '2018-12-22', 4, 1, 'a v b n h', '2018-12-21 23:28:47', '2018-12-21 23:28:47'),
(23, 1, 3, 16, '<p>Nghiệm của phương trình log<sub>4</sub>(log<sub>2</sub>x)+log<sub>2</sub>(log<sub>4</sub>x)=2 là:</p>', '<p>x=2</p>', '<p>x=4</p>', '<p>x=8</p>', '<p>x=16</p>', 'D', '', '2018-12-22', 4, 1, 'a b v c d e', '2018-12-21 23:30:32', '2018-12-21 23:30:32'),
(24, 1, 2, 16, '<p>Nếu a=log<sub>30</sub>3 và b=log<sub>30</sub>5 thì:</p>', '<p>log<sub>30</sub>1350=2a+b+2</p>', '<p>log<sub>30</sub>1350=a +2b+1</p>', '<p>log<sub>30</sub>​1350=2a +b+1</p>', '<p>log<sub>30</sub>​1350=a +2b+2</p>', 'C', '', '2018-12-22', 4, 1, 'vi a b c c d', '2018-12-21 23:33:24', '2018-12-21 23:33:24'),
(25, 1, 2, 17, '<p>Tính đạo hàm của hàm số sau: f(x)=x<sup>x</sup></p>', '<p>f\'(x)=x<sup>x-1</sup>(x+lnx)</p>', '<p>f\'(x)=x<sup>x</sup>(lnx+1)</p>', '<p>f\'(x)=x<sup>x</sup></p>', '<p>f\'(x)=xlnx</p>', 'B', '', '2018-12-22', 4, 1, 'a b c d è', '2018-12-21 23:36:38', '2018-12-21 23:36:38'),
(26, 1, 1, 16, '<p>Phương trình log<sub>3</sub>(3x-2)=3 có nghiệm là:</p>', '<p>11/3</p>', '<p>25/3</p>', '<p>29/3</p>', '<p>87</p>', 'C', '', '2018-12-22', 4, 1, '1 2 3 4 5 6', '2018-12-21 23:38:20', '2018-12-21 23:38:20'),
(27, 1, 1, 15, '<p>Tập nghiệm của bất phương trình 32.4<sup>x</sup>-18.2<sup>x</sup>+1&lt;0 là tập con của tập:</p>', '<p>(-5;-2)</p>', '<p>(-4;0)</p>', '<p>(1;4)</p>', '<p>(-3;1)</p>', 'A', '', '2018-12-22', 4, 1, 'vi a b c d e f g h', '2018-12-21 23:41:37', '2018-12-21 23:41:37'),
(28, 1, 3, 16, '<p>Giải bất phương trình : ln(x+1)&lt;x</p>', '<p>Vô nghiệm</p>', '<p>x&gt;0</p>', '<p>0&lt;x&lt;1</p>', '<p>x&gt;2</p>', 'B', '', '2018-12-22', 4, 1, 'a b c d e f', '2018-12-21 23:43:35', '2018-12-21 23:43:35'),
(29, 1, 3, 17, '<p>Tìm giá trị nhỏ nhất của hàm số: f(x)=2<sup>x-1</sup>+2<sup>3-x</sup></p>', '<p>4</p>', '<p>6</p>', '<p>-4</p>', '<p>Không có đáp án</p>', 'A', '', '2018-12-22', 4, 1, 'vì a b c d e f', '2018-12-21 23:45:37', '2018-12-21 23:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdethi`
--

CREATE TABLE `chitietdethi` (
  `idDeThi` int(11) NOT NULL,
  `idCauHoi` int(11) NOT NULL,
  `DapAn` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdethi`
--

INSERT INTO `chitietdethi` (`idDeThi`, `idCauHoi`, `DapAn`, `created_at`, `updated_at`) VALUES
(24, 19, 'B', '2018-12-22 00:00:25', '2018-12-22 00:00:25'),
(24, 20, 'D', '2018-12-22 00:00:25', '2018-12-22 00:00:25'),
(24, 21, 'A', '2018-12-22 00:00:25', '2018-12-22 00:00:25'),
(24, 22, 'D', '2018-12-22 00:00:25', '2018-12-22 00:00:25'),
(24, 23, 'D', '2018-12-22 00:00:25', '2018-12-22 00:00:25'),
(24, 24, 'C', '2019-03-24 23:05:05', '2019-03-24 23:05:05'),
(24, 25, 'B', '2019-03-24 23:05:05', '2019-03-24 23:05:05'),
(24, 26, 'C', '2019-03-24 23:05:05', '2019-03-24 23:05:05'),
(24, 27, 'A', '2019-03-24 23:05:06', '2019-03-24 23:05:06'),
(24, 28, 'B', '2019-03-24 23:05:06', '2019-03-24 23:05:06'),
(24, 29, 'A', '2019-03-24 23:05:06', '2019-03-24 23:05:06'),
(25, 19, 'B', '2018-12-22 00:01:01', '2018-12-22 00:01:01'),
(25, 20, 'D', '2018-12-22 00:01:02', '2018-12-22 00:01:02'),
(25, 21, 'A', '2018-12-22 00:01:02', '2018-12-22 00:01:02'),
(25, 26, 'C', '2018-12-22 00:01:02', '2018-12-22 00:01:02'),
(25, 27, 'A', '2018-12-22 00:01:02', '2018-12-22 00:01:02'),
(31, 21, 'A', '2019-03-24 23:05:52', '2019-03-24 23:05:52'),
(31, 23, 'D', '2019-03-24 23:05:52', '2019-03-24 23:05:52'),
(31, 24, 'C', '2019-03-24 23:05:52', '2019-03-24 23:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `chude`
--

CREATE TABLE `chude` (
  `idChuDe` int(11) NOT NULL,
  `TenChuDe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMonHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chude`
--

INSERT INTO `chude` (`idChuDe`, `TenChuDe`, `idMonHoc`) VALUES
(15, 'Ứng dụng đạo hàm để khảo sát và vẽ đồ thị của hàm số', 1),
(16, 'Hàm số lũy thừa, hàm số mũ và hàm số logarit', 1),
(17, 'Nguyên hàm – Tích phân và ứng dụng', 1),
(18, 'Số phức', 1),
(19, 'Khối đa diện', 1),
(20, 'Mặt nón, mặt trụ, mặt cầu', 1),
(21, 'Phương pháp tọa độ trong không gian', 1),
(22, 'DAO ĐỘNG CƠ', 2),
(23, 'SÓNG CƠ HỌC', 2),
(24, 'DÒNG ĐIỆN XOAY CHIỀU', 2),
(25, 'DAO ĐỘNG ĐIỆN TỪ', 2),
(26, 'SÓNG ÁNH SÁNG', 2),
(27, 'LƯỢNG TỬ ÁNH SÁNG', 2),
(28, 'HẠT NHÂN NGUYÊN TỬ - SỰ PHÓNG XẠ', 2),
(29, 'Điện Phân', 3),
(30, 'Hidrocacbon No', 3),
(31, 'Hidrocacbon Không No', 3),
(32, 'ẫn Xuất Halogen – Phenol – Ancol', 3),
(33, 'Andehit – Xeton – Axit Cacboxylic', 3),
(34, 'Este – Lipit – Chất Giặt Rửa', 3),
(35, 'Cacbohidrat', 3),
(36, 'Amin – Amino Axit – Protein', 3),
(37, 'Đại Cương Về Kim Loại', 3),
(38, 'Di truyền học cấp độ phân tử', 4),
(39, 'Di truyền học cấp độ tế bào', 4),
(40, 'Biến dị', 4),
(41, 'Tính quy luật của hiện tượng di truyền', 4),
(42, 'Di truyền học quần thể', 4),
(43, 'Di truyền học người', 4),
(44, 'Di truyền học ứng dụng', 4),
(45, 'Tiến hóa sinh học', 4),
(46, 'Sinh thái học', 4),
(47, 'Các thì (tenses)', 5),
(48, 'Sự hoà hợp giữa chủ ngữ và động từ (subject – verb agreement)', 5),
(49, 'Danh động từ và động từ nguyên thể (gerund and infinitive)', 5),
(50, 'Câu giả định (subjunctive)', 5),
(51, 'Câu bị động (passive voice)', 5),
(52, 'Câu gián tiếp (reported speech)', 5),
(53, 'Mệnh đề quan hệ (relative clauses)', 5),
(54, 'Comparison', 5),
(55, 'Liên từ (conjunctions)', 5),
(56, 'Mạo từ (articles)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `dethi`
--

CREATE TABLE `dethi` (
  `idDeThi` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `TenDeThi` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThoiGian` int(11) NOT NULL,
  `SoLuongCau` int(11) NOT NULL,
  `SoLanThi` int(11) NOT NULL,
  `NgayDuocTao` date NOT NULL,
  `idNguoiTao` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dethi`
--

INSERT INTO `dethi` (`idDeThi`, `idMonHoc`, `TenDeThi`, `ThoiGian`, `SoLuongCau`, `SoLanThi`, `NgayDuocTao`, `idNguoiTao`, `TrangThai`, `created_at`, `updated_at`) VALUES
(23, 4, 'Đề Thi Sinh Học quốc gia', 60, 4, 4, '2018-10-03', 2, 1, '2019-03-25 05:55:54', '0000-00-00 00:00:00'),
(24, 1, 'Kỳ Thi Tốt Nghiệp THPT Tư Nghĩa 2', 10, 11, 1, '2018-12-22', 4, 1, '2019-03-25 06:05:06', '2019-03-24 23:05:06'),
(25, 1, 'Kỳ Thi Tốt Nghiệp THPT Năm 2018-2019 Lần 1', 10, 5, 1, '2018-12-22', 4, 0, '2019-03-25 05:51:27', '2019-03-24 22:51:27'),
(26, 4, 'Đề thi sinh học 2018', 60, 4, 4, '2018-10-18', 4, 1, '2019-03-25 05:58:41', '0000-00-00 00:00:00'),
(27, 3, 'Kỳ Thi THPT Tư Nghĩa 2019 Lần 2', 60, 4, 5, '2018-10-03', 4, 1, '2019-03-25 06:03:20', '2019-03-24 23:03:20'),
(28, 3, 'Đề thi Hóa Học quốc gia 2018', 60, 4, 4, '2018-10-16', 4, 1, '2019-03-25 05:58:49', '0000-00-00 00:00:00'),
(29, 2, 'Kỳ Thi THPT Tư Nghĩa 2 Năm 2019 Lần2', 60, 4, 4, '2018-10-03', 4, 1, '2019-03-25 05:51:58', '2019-03-24 22:51:58'),
(30, 5, 'Đề Thi Anh THPT Tư Nghĩa 2019', 60, 4, 4, '2018-10-15', 4, 1, '2019-03-25 05:58:14', '2019-03-24 22:52:48'),
(31, 1, 'Đề Thi Toán 2018', 60, 43, 4, '2018-10-03', 4, 1, '2019-03-25 06:05:53', '2019-03-24 23:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `giangday`
--

CREATE TABLE `giangday` (
  `idGiangVienHT` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giangday`
--

INSERT INTO `giangday` (`idGiangVienHT`, `idMonHoc`) VALUES
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `idLevel` int(11) NOT NULL,
  `NameLevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`idLevel`, `NameLevel`) VALUES
(1, 'Dễ'),
(2, 'Trung Bình'),
(3, 'Khó');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `idMonHoc` int(11) NOT NULL,
  `TenMonHoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`idMonHoc`, `TenMonHoc`) VALUES
(1, 'Toán'),
(2, 'Vật Lý'),
(3, 'Hóa Học'),
(4, 'Sinh Học'),
(5, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `tailieu`
--

CREATE TABLE `tailieu` (
  `idTaiLieu` int(11) NOT NULL,
  `TenTaiLieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlFile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `idGiangVien` int(11) NOT NULL,
  `NgayDang` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tailieu`
--

INSERT INTO `tailieu` (`idTaiLieu`, `TenTaiLieu`, `Type`, `urlFile`, `idMonHoc`, `idGiangVien`, `NgayDang`, `created_at`, `updated_at`) VALUES
(1, 'De Thi THPT Tư Nghĩa 2 Năm 2018-2019 Lần 1', 'pdf', 'oOjI_BT_BJT.pdf', 1, 4, '2018-11-14', '2018-12-22 07:11:31', '0000-00-00 00:00:00'),
(2, 'De Thi THPT Tư Nghĩa 2 Năm 2018-2019 Lần 2', 'docx', 'j5T8_Toán Cao Cấp.docx', 1, 4, '2018-12-13', '2018-12-22 07:11:41', '2018-12-12 18:50:00'),
(3, 'De Thi THPT Tư Nghĩa 2 Năm 2018-2019 Lần 3', 'pdf', 'rNjP_VeTauTet.pdf', 1, 4, '2018-12-22', '2018-12-22 07:11:48', '2018-12-22 00:04:21'),
(4, 'De Thi THPT Tư Nghĩa 2 Năm 2018-2019 Lần 4', 'pdf', 'UIvv_VeTauTet2.pdf', 1, 4, '2018-12-22', '2018-12-22 00:12:27', '2018-12-22 00:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `idThongBao` int(11) NOT NULL,
  `TieuDe` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idNguoiGui` int(11) NOT NULL,
  `NgayDang` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`idThongBao`, `TieuDe`, `NoiDung`, `idNguoiGui`, `NgayDang`, `created_at`, `updated_at`) VALUES
(6, 'Đề Thi Mới Ngày 12/22/2018', '<p>thong bao de thi mới</p>', 4, '2018-12-22', '2018-12-22 00:06:16', '2018-12-22 00:06:16'),
(7, 'De Thi Mới Ngày 12/23/2018', '<p>De Thi Mới Ngày 12/23/2018&nbsp;De Thi Mới Ngày 12/23/2018&nbsp;De Thi Mới Ngày 12/23/2018&nbsp;De Thi Mới Ngày 12/23/2018</p>', 4, '2018-12-22', '2018-12-22 00:07:00', '2018-12-22 00:07:00'),
(8, 'De Thi Mới Ngày 12/25/2018', '<p>De Thi Mới Ngày 12/23/2018&nbsp;De Thi Mới Ngày 12/23/2018&nbsp;De Thi Mới Ngày 12/23/2018 De Thi Mới Ngày 12/23/2018</p>', 4, '2018-12-22', '2018-12-22 00:07:15', '2018-12-22 00:07:15'),
(9, 'De Thi Mới Ngày 12/28/2018', '<p>De Thi Mới Ngày 12/28/2018&nbsp;De Thi Mới Ngày 12/28/2018&nbsp;De Thi Mới Ngày 12/28/2018&nbsp;De Thi Mới Ngày 12/28/2018</p>', 4, '2018-12-22', '2018-12-22 00:07:36', '2018-12-22 00:07:36'),
(10, 'nghỉ học toàn trường', '<p>Cho tất cả anh em nghỉ học</p>', 4, '2019-03-25', '2019-03-24 23:10:17', '2019-03-24 23:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `idTinTuc` int(11) NOT NULL,
  `TieuDe` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TomTat` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayTao` date NOT NULL,
  `AnHien` int(11) NOT NULL,
  `idGiangVien` int(11) NOT NULL,
  `urlHinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`idTinTuc`, `TieuDe`, `TomTat`, `NoiDung`, `NgayTao`, `AnHien`, `idGiangVien`, `urlHinh`, `created_at`, `updated_at`) VALUES
(1, 'Tư vấn tuyển sinh cho học sinh tại Thái Bình.', 'Tham dự hội nghị tập huấn có hơn 80 học viên đến từ các Trung tâm giáo dục nghề nghiệp trong tỉnh.Các học viên được giảng viên Phòng Dạy nghề (Sở Lao động, Thương binh và Xã hội tỉnh Thái Bình) phổ biến một số văn bản về giáo dục nghề nghiệp.', '<p>Tham dự hội nghị tập huấn có hơn 80 học viên đến từ các Trung tâm giáo dục nghề nghiệp trong tỉnh. Các học viên được giảng viên Phòng Dạy nghề (Sở Lao động, Thương binh và Xã hội tỉnh Thái Bình) phổ biến một số văn bản về giáo dục nghề nghiệp. Các văn bản gồm: Luật Giáo dục nghề nghiệp; Nghị định 48/2015 quy định chi tiết một số điều của Luật Giáo dục nghề nghiệp; Nghị định 143 của Chính phủ quy định điều kiện đầu tư và hoạt động trong lĩnh vực giáo dục nghề nghiệp; Ngoài ra, các học viên còn được tư vấn các ngành, nghề, các lĩnh vực về lao động và việc làm người lao động đang có nhu cầu. Hơn 80 học viên của tình Thái Bình được tư vấn tuyển sinh và phổ biến Luật Giáo dục nghề nghiệp (Ảnh: Báo Thái Bình) Các học viên cũng được triển khai các quyết định của Thủ tướng Chính phủ về đề án đào tạo nghề cho lao động nông thôn đến năm 2020, chương trình mục tiêu quốc gia xây dựng nông thôn mới giai đoạn 2016-2020; Các quyết định, thông tư của Bộ Lao động,Thương binh và Xã hội.</p>', '2018-12-12', 1, 4, 'tZVb_tu-van-tuyen-sinh-huong-nghiep-hoc-phi-la-dieu-can-can-nhac-khi-chon-nghe-1.jpg', '2018-12-12 20:11:36', '2018-12-12 13:11:36'),
(2, 'Cam kết việc làm cho học sinh, sinh viên tốt nghiệp đào tạo nghề', 'Qua tìm hiểu, để tạo việc làm cho học sinh, sinh viên sau học nghề, nhiều trường cao đẳng, trung cấp đặc biệt chú trọng phối hợp, liên kết với các doanh nghiệp trên địa bàn.\r\n\r\nViệc liên kết với doanh nghiệp nhằm tạo môi trường cho học sinh, sinh viên thực tập và doanh nghiệp tiếp nhận vào làm việc khi học sinh, sinh viên hoàn thành chương trình học, tốt nghiệp trường nghề.', 'Qua tìm hiểu, để tạo việc làm cho học sinh, sinh viên sau học nghề, nhiều trường cao đẳng, trung cấp đặc biệt chú trọng phối hợp, liên kết với các doanh nghiệp trên địa bàn.\r\n\r\nViệc liên kết với doanh nghiệp nhằm tạo môi trường cho học sinh, sinh viên thực tập và doanh nghiệp tiếp nhận vào làm việc khi học sinh, sinh viên hoàn thành chương trình học, tốt nghiệp trường nghề.\r\n\r\nViệc liên kết với doanh nghiệp càng có ý nghĩa hơn khi từ năm 2016, các cơ sở giáo dục nghề nghiệp thực hiện tự chủ trong tuyển sinh, cạnh tranh gay gắt với khối giáo dục đại học và ngay với chính các trường trong hệ thống giáo dục nghề nghiệp.\r\n\r\n\r\nTỷ lệ học sinh, sinh viên tốt nghiệp có việc làm tại Trường trung cấp Bách khoa Hải Phòng đạt từ 90% trở lên. Ảnh: vnu.edu.vn.\r\nÔng Lã Đình Kế, Hiệu trưởng Trường trung cấp Kỹ thuật Nghiệp vụ Hải Phòng cho biết: “Nhà trường phối hợp với khoảng 20 doanh nghiệp trong và ngoài thành phố, tổ chức ký kết tiếp nhận lao động qua đào tạo vào làm việc. Việc này giúp nhà trường', '2018-11-01', 1, 4, '', '2018-12-12 19:45:34', '0000-00-00 00:00:00'),
(3, 'Hơn 20.000 thí sinh Hải Phòng hoàn tất thủ tục, sẵn sàng dự thi', '(GDVN) - Chiều nay (24/6) hơn 20.000 thí sinh của Hải Phòng đã hoàn tất thủ tục tham dự kỳ thi Trung học phổ thông Quốc gia năm 2018.', 'Theo thông tin từ Sở Giáo dục và Đào tạo Hải Phòng, kỳ thi Trung học phổ thông Quốc gia năm nay, toàn thành phố có hơn 20.000 thí sinh đăng ký dự thi.\r\n\r\nTrong đó có 17.914 thí sinh Trung học phổ thông, 776 thí sinh tự do và 1.411 thí sinh Trung tâm Giáo dục thường xuyên.\r\n\r\n\r\nCác sinh viên tình nguyện hướng dẫn các thi sinh tìm phòng thi để làm thủ tục.\r\nĐể phục vụ kỳ thi Trung học phổ thông Quốc gia năm 2018 diễn ra an toàn, nghiêm túc, ngành giáo dục Hải Phòng đã bố trí 42 điểm thi, phân bố tại các quận, huyện trên địa bàn, với 857 phòng thi.\r\n\r\nĐồng thời bố trí 1.025 cán bộ coi thi được điều động từ 5 trường đại học gồm: Đại học Nội vụ, Đại học Hàng hải Việt Nam, Đại học Hải Phòng, Đại học Dân lập Hải Phòng, Đại học Y Dược Hải Phòng và 1.090 cán bộ, giáo viên các trường Trung học phổ thông trên địa bàn.\r\n\r\nGhi nhận tại một số điểm thi như: Trường Trung học phổ thông Ngô Quyền, Hồng Bàng, An Lão… cho thấy, công tác chuẩn bị cho kỳ thi năm nay diễn ra khá chu đáo.\r\n\r\n\r\nCác thí sinh trao đổi thông tin trước khi vào làm thủ tục thi tại Trường Trung học phổ thông Ngô Quyền (Hải Phòng).\r\nCác cán bộ coi thi và nhân viên kỳ thi đều thực hiện đầy đủ, nghiêm túc các quy định của hội đồng thi.\r\n\r\nCác đội tình nguyện của nhiều trường đại học tích cực hướng dẫn các thí sinh làm thủ tục, tham gia điều tiết giao thông tại hầu hết các điểm thi.\r\n\r\nĐến khoảng 16 giờ cùng ngày, các thí sinh cơ bản làm xong các thủ tục dự thi và ra về, chuẩn bị cho môn thi đầu tiên sẽ diễn ra vào sáng mai (25/6).', '2018-11-01', 1, 4, '', '2018-12-12 19:38:57', '0000-00-00 00:00:00'),
(4, 'Vì đồng tiền sai trái, những hiệu trưởng này đã vướng vòng lao lý', 'GDVN) - Tìm cách biển thủ công quỹ, thông đồng với kế toán lập hồ sơ khống bòn rút tiền nhà nước… không ít hiệu trưởng phải vào nhà giam vì những đồng tiền sai trái.', 'Như Báo điện tử Giáo dục Việt Nam đã đưa, ngày 21/6, thông tin từ Cơ quan Cảnh sát điều tra Công an tỉnh Thái Bình, đơn vị đã khởi tố vụ án, khởi tố bị can, bắt tạm giam đối với Nguyễn Thị Hương (54 tuổi, Hiệu trưởng Trường mầm non Hoa Hồng, Thành phố Thái Bình, Thái Bình) để điều tra, làm rõ hành vi “Vi phạm quy định về kế toán gây hậu quả nghiêm trọng”, quy định tại khoản 2, điều 221, Bộ luật Hình sự.\r\n\r\nĐây không phải lần đầu tiên một Hiệu trường của một trường học công lập bị bắt vì liên quan đến việc thu chi tài chính trong trường học.\r\n\r\nKhông ít vị Hiệu trưởng đã vướng phải vòng lao lý bởi xa rời lý tưởng giáo dục và không cưỡng lại sự cám dỗ của đồng tiền.\r\n\r\nTrước đó, ngày 10/5/2018, Cơ quan Cảnh sát điều tra Công an thành phố Hải Phòng đã chính thức thông báo việc ra Quyết định khởi tố bị can, triển khai Lệnh bắt bị can để tạm giam đối với Lê Thị Thu Thủy, nguyên Hiệu trưởng trường Tiểu học Đặng Cương (Đặng Cương, An Dương, Hải Phòng)\r\n\r\nBị can Lê Thị Thu Thủy đã có hành vi: Lợi dụng chức vụ là Hiệu trưởng trường tiểu học Đặng Cương, từ năm học 2015-2016 đến đầu năm học 2016-2017.\r\n\r\nTrong những năm học này, Lê Thị Thu Thủy tổ chức thu nhiều khoản đóng góp của cha mẹ học sinh mà chưa được phê duyệt của cơ quan quản lý cấp trên; không nộp vào tài khoản tiền gửi của Trường tại Kho bạc mà tự chi tiền mặt vào các hoạt động trái mục đích thu, không công khai, minh bạch theo quy định của Bộ Giáo dục và Đào tạo, vụ lợi cá nhân và gây thất thoát số tiền lớn phạm vào Điều 281 Bộ luật hình sự năm 1999 nay là Điều 356 Bộ luật hình sự 2015.\r\n\r\nNgày 29/12/2017, cơ quan cảnh sát điều tra, công an thành phố Đà Nắng đã tiến hành bắt tạm giam bà Ngô Thị Hòa, nguyên Hiệu trường trường mầm non Tuổi Ngọc (phường Hòa Minh, quận Liên Chiểu, Đà Nẵng).\r\n\r\nBà Hòa bị bắt để làm rõ hành vi: \"lợi dụng chức vụ quyền hạn trong khi thi hành công vụ\".\r\n\r\nNhư Báo điện tử Giáo dục Việt Nam thông tin, kết quả thanh tra của cơ quan chức năng cho thấy, tổng số tiền sai phạm của nhà trường lên đến 628,8 triệu đồng.\r\n\r\n\r\nĐường vào tù của các hiệu trưởng sai phạm sẽ là bài học cho những người đang rời xa lý tưởng người thầy (Ảnh tổng hợp từ internet)\r\nVào tháng 12/2017, cơ quan công an thành phố Đà Nẵng đã tiến hành bắt tạm giam bà Ngô Thị Hòa , nguyên Hiệu trường trường mầm non Tuổi Ngọc (phường Hòa Minh, quận Liên Chiểu, Đà Nẵng).\r\n\r\nTheo kết quả thanh tra của các cơ quan chức năng, tổng số tiền sai phạm của nhà trường lên đến 628,8 triệu đồng.\r\n\r\nTrong đó, bà Hòa lấy sử dụng cho mục đích cá nhân là 199,9 triệu đồng, số tiền còn lại sử dụng chi hoạt động nhà trường không đúng mục đích.\r\n\r\nCũng trong tháng 10/2017, Phòng Cảnh sát điều tra tội phạm kinh tế và chức vụ (PC46, Công an tỉnh Hưng Yên) đã tống đạt quyết định khởi tố vụ án, bắt tạm giam bà Nguyễn Thị Quyên, nguyên hiệu trưởng Trường Tiểu học xã Lệ Xá, huyện Tiên Lữ, do nghi vấn có hành vi lợi dụng chức vụ, quyền hạn trong khi thi hành công vụ; mua trái phép hóa đơn giá trị gia tăng.\r\n\r\nVào tháng 11/2017 Cơ quan cảnh sát điều tra, công an huyện Trạm Tấu (Yên Bái) đã ra quyết định khởi tố vụ án, khởi tố bị can và ra lệnh tạm giam đối với  Hiệu trưởng  là ông Nguyễn Đăng Vinh và Phó Hiệu trưởng  là ông Vũ Đức Tuyến trường Phổ thông dân tộc bán trú ở xã Bản Công, huyện Trạm Tấu, tỉnh Yên Bái về tội tham ô tài sản.\r\n\r\nSau khi điều tra xác định ông Vinh và ông Tuyến đã bán 6 tấn gạo của học sinh để chi tiêu cá nhân.\r\n\r\nTổng số tiền bán gạo là 42 triệu đồng. Sau khi bị bắt để điều tra xử lý, hai người này đã nộp lại 38 triệu đồng\r\n\r\nSự việc được phát hiện vào ngày 10/ 11/2017. Việc bán gạo của 2 bị can đang diễn ra ở trường phổ thông dân tộc bán trú xã Bản Công thì bị cơ quan chức năng bắt quả tang.\r\n\r\nNgày 29/01/2016, Công an huyện Kon Chro, tỉnh Gia Lai đã bắt tạm giam 4 tháng đối với ông Trần Quốc Khải, nguyên hiệu trưởng Trường tiểu học và trung học cơ sở Cao Bá Quát về hành vi tham ô tài sản.\r\n\r\nTừ năm học 2010 đến năm học 2015, ông Trần Quốc Khải cùng một số nhân viên lập hồ sơ, chứng từ khống để biển thủ 137/980 triệu đồng tiền trợ cấp dành cho học sinh bán trú ở vùng đặc biệt khó khăn.\r\n\r\nBáo điện tử Giáo dục Việt Nam đã có nhiều bài viết liên quan đến vấn đề lạm thu trong trường học đã diễn ra nhiều năm nay và cho tới giờ chưa có bất kỳ một biện pháp thực sự nào hiệu quả để chặn đứng tình trạng này.\r\n\r\nNhiều nơi, phụ huynh đã phản ứng đến mức yêu cầu đình chỉ chức vụ của Hiệu trưởng, do quá bức xúc với nhiều khoản tiền phải nộp vào đầu năm học.', '2018-11-01', 1, 5, '', '2018-12-12 19:39:04', '0000-00-00 00:00:00'),
(5, 'Hà Nội: Tổ chức giải vô địch tranh biện mở rộng lần thứ hai', 'Giải vô địch tranh biện Hà Nội mở rộng – HN-VSDC lần 2 tiếp tục được tổ chức vào ngày 12 và 13-1-2019 tại trường Phổ thông liên cấp Olympia. Đây là giải đấu tranh biện chính thức đầu tiên dành cho học sinh phổ thông được UBND TP Hà Nội cho phép tổ chức và Sở GD&ĐT Hà Nội trực tiếp chỉ đạo thực hiện.', '<p style=\"text-align:justify\">Theo Sở GD&amp;ĐT Hà Nội: Tiếp nối thành công của lần thứ nhất tổ chức năm 2017, đây là lần thứ 2 cuộc thi được tổ chức, dành cho các bạn học sinh là công dân Việt Nam và học sinh quốc tế (đang sinh sống và học tập tại Việt Nam) trong độ tuổi từ 14 đến 19 tuổi (tính đến ngày 1-7-2019) đến từ các trường THCS và THPT trong cả nước.</p>\r\n\r\n<p style=\"text-align:justify\">Giải đấu được tổ chức theo thể thức VSDC (Vietnam School Debating Championship), thiết kế riêng cho học sinh phổ thông dựa trên luật của Giải vô địch tranh biện thế giới các trường phổ thông (WSDC) và mở rộng cho học sinh Việt Nam trên toàn quốc nên có tên là: Giải vô địch tranh biện Hà Nội mở rộng VSDC, viết tắt là HN-VSDC.</p>\r\n\r\n<p style=\"text-align:justify\">Các chủ đề tranh biện của HN-VSDC như: Môi trường, kinh tế, xã hội, giáo dục… là những đề tài mở và mang tính thời sự toàn cầu, chắc chắn sẽ tạo những trận đấu hấp dẫn, kịch tính với ý kiến, quan điểm mới từ các đội dự thi. Tham gia HN-VSDC, học sinh không những được thử sức mình ở một cuộc thi tranh biện chuyên nghiệp, uy tín mà có cơ hội trở thành thành viên của đội tuyển Việt Nam tham dự Giải vô địch tranh biện thế giới 2019 (WSDC) tại Sri Lanka.</p>\r\n\r\n<p style=\"text-align:justify\">Bên cạnh đó, học sinh còn được rèn luyện khả năng tranh biện tự tin, trung thực, cởi mở đón nhận những quan điểm khác biệt và trau dồi tư duy phản biện sắc sảo. Đây là những kỹ năng đặc biệt quan trọng góp phần tạo nên sự thành công của học sinh trong quá trình hội nhập ở thế kỉ 21.</p>\r\n\r\n<p style=\"text-align:justify\">Giải HN-VSDC lần thứ 2 diễn ra vào tháng 1-2019 nhằm góp phần nâng cao phong trào học và sử dụng tiếng Anh trong các nhà trường, phát huy kỹ năng trình bày trước đám đông, kỹ năng tranh biện bằng tiếng Anh cho học sinh, hướng tới xây dựng xã hội, học tập, xây dựng thế hệ học sinh Việt Nam tự tin, không ngừng học hỏi và phát huy khả năng, tư duy phản biện...</p>\r\n\r\n<p style=\"text-align:justify\">Thí sinh tham gia HN-VSDC 2019 sẽ trải qua 7 vòng đấu, Ban tổ chức lựa chọn những thí sinh tiềm năng với niềm đam mê tranh biện để đại diện Việt Nam tham gia Giải tranh biện quốc tế WSDC 2019 được tổ chức tại Sri Lanka, dự kiến diễn ra vào tháng 7-2019.</p>', '2018-12-12', 1, 4, 'Z9jR_2002_tranh-bien-VFRG.jpg', '2018-12-12 13:00:02', '2018-12-12 13:00:02'),
(6, 'Cô giáo ở Hà Nội bị tố cho học sinh tát bạn 50 cái bị kỷ luật ra sao?', 'Hiệu trưởng Trường Tiểu học Quang Trung cho biết, cô giáo bị \"tố\" cho học sinh tát bạn 50 cái mắc sai phạm do bộc phát, thiếu kinh nghiệm. Tuy nhiên đã là sai phạm thì sẽ bị xử lý nghiêm.', '<p>Chiều 12.12, thông tin với PV Lao Động về việc xử lý giáo viên N.H.T (<a href=\"https://laodong.vn/giao-duc/dau-la-su-that-viec-giao-vien-ha-noi-bi-to-yeu-cau-hoc-sinh-tat-ban-645496.ldo\" rel=\"external\" style=\"background-color: transparent; box-sizing: border-box; outline: 0px; color: rgb(0, 0, 0); text-decoration-line: none; transition: color 0.1s linear 0s;\" target=\"_blank\" title=\"Trường Tiểu học Quang Trung\">Trường Tiểu học Quang Trung</a>, quận Đống Đa, Hà Nội) bị tố cho học sinh tát bạn 50 cái, bà Lê Anh Vân - Hiệu trưởng nhà trường - cho biết, hiện nay nhà trường vẫn đang tích cực phối hợp với đoàn thanh tra để xác minh sự việc.</p>\r\n\r\n<p>“Từ ngày 6.12, thời điểm UBND quận Đống Đa thành lập đoàn thanh tra để xác minh việc giáo viên của trường cho học sinh tát bạn, đến nay vẫn chưa có kết quả cuối cùng. Chúng tôi vẫn đang phối hợp với đoàn thanh tra, khi nào có kết quả sẽ thông tin tới cơ quan chức năng và công luận”- bà Vân cho biết.</p>\r\n\r\n<p>Trước đó, theo chỉ đạo của UBND quận Đống Đa, Trường Tiểu học Quang Trung đã tổ chức họp báo để thông tin trước&nbsp; với báo chí về diễn biến sự việc giáo viên của trường bị tố cho học sinh tát bạn. Trong buổi họp báo, bà Lê Anh Vân cho biết, với tư cách một hiệu trưởng, bà thấy đây là sự việc đáng tiếc . Bà gửi lời xin lỗi đến học sinh và cho biết sẽ xử lý nghiêm minh với hành vi sai trái của cô giáo.</p>\r\n\r\n<p>“Chúng tôi sẽ cố gắng hơn nữa để đáp ứng lại kì vọng xã hội\" - bà Vân nói.</p>\r\n\r\n<p>Cũng theo bà Anh Vân, trong quá trình xác minh, giáo viên không nói cho học sinh tát bạn bao nhiêu cái. Giáo viên sai phạm là do bộc phát, thiếu kinh nghiệm. Việc xác minh sự việc rất khó vì các em học sinh còn khá nhỏ, phải thông qua phụ huynh hay người giám hộ.</p>\r\n\r\n<p>Tuy nhiên tinh thần là sẽ xử lý nghiêm sai phạm của giáo viên. Sai phạm đến đâu sẽ xử lý đến đó dù giáo viên là con của lãnh đạo nào.</p>', '2018-12-12', 1, 4, 'T5M4_Giao-Vien-Tat-Hoc-Si.jpg', '2018-12-12 13:02:34', '2018-12-12 13:02:34'),
(7, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'sdssadsdddasdasdsadsadsadsad', '<p>dsgfgfsdfacdsgbtyesdcvcrdcvbghytrfdcvbghrfdvbnbhmrtefcvcbgnhjrdfvbgh</p>', '2019-03-25', 0, 4, '', '2019-03-25 06:18:25', '2019-03-24 23:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `typeaccount`
--

CREATE TABLE `typeaccount` (
  `idtype` int(11) NOT NULL,
  `tentype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeaccount`
--

INSERT INTO `typeaccount` (`idtype`, `tentype`) VALUES
(1, 'Admin'),
(2, 'Giảng Viên'),
(3, 'Học Viên');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtype` int(10) UNSIGNED NOT NULL,
  `HoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `urlHinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `idtype`, `HoTen`, `NgaySinh`, `GioiTinh`, `urlHinh`, `DiaChi`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(2, 'MinhKe', 'bYs33@gmail.com', '$2y$10$l4b.cObJBDDPSEe1jK5zL.UJwRHUEhxEw3UKdYVCqMKM8nwj3FEdW', 1, 'Phạm Minh Kế', '2018-11-08', 1, 'Ke.jpg', 'Quảng Ngãi', 'PG9cmZpRJC8GW59tnbL5BFyKDKAWbCylVpHTT971x5mXw0mHsfqXOUYuUDf1', NULL, '2018-11-10 11:10:00', NULL),
(4, 'truonghuong', 'truonghuong@gmail.com', '$2y$10$Gw1/CaSwYrwzg6gbiM5hEOilGgj1nn9s5FRu/CX4GZLomESJCxk6C', 2, 'Trương Hường', '1997-03-19', 1, 'Huong.jpg', 'Quảng Bình', 'JqNX044U8EMgLJmJQVr2vuSmRZQuSsF8IHr0y3Rmml0PuDJQc8P5ByNF3JRD', '2018-11-06 03:57:16', '2018-12-21 06:01:56', NULL),
(5, 'giangvien1', 'dddaadsd@gmail.com', '$2y$10$FR2lUTnfJXZzLt7jONs50ecps5sF/c0dkxxYO8.ovmJWv2aJfjVa.', 2, 'Phan Thị Hải Yến', '2018-11-10', 0, 'HaiYen.jpg', 'Quảng Bình', 'rmbfINubhTGXE048z4H40etBHHHXZERhhMpu1dgSLIiLUQqmRM9va7onpoLF', '2018-11-08 10:25:17', '2018-12-12 06:58:18', NULL),
(6, 'giangvien2', 'dgfsdssd@gmail.com', '$2y$10$KTmaNaUwHCJdoWYlw63TFedzrjn0oj5LLB3Jwi0yXM6sOfmJB9QQC', 2, 'Đặng Thanh Nhàn', '2018-11-15', 1, 'nhàn.jpg', 'Tây Ninh', NULL, '2018-11-08 10:26:02', '2018-11-10 23:51:04', NULL),
(7, 'giangvien3', 'truonghsdauong@gmail.com', '$2y$10$57Ntj7ym79SwCJHWwxlTd.IET.sNcxNiBgLMT8sPS32k8coLSiAfa', 2, 'Trương Nguyệt', '2018-11-21', 0, 'Nguyet.jpg', 'Huế', '2dOtZis0UM0fiOA3Vjr3wHZgcRHmZiH7UeNcMtIILRaDRts8rcQMsTEz07iJ', '2018-11-08 10:26:47', '2018-12-13 00:42:01', NULL),
(8, 'xuanhung', 'xuanhung@gmail.com', '$2y$10$vHTpXRlkd1yMDaaXf0SYx.dxSeXmdT6ovvrC6qsbnzKAk5anG6bmC', 1, 'Doan Xuan Hung', '1997-09-30', 1, 'XuanHung.jpg', 'Quảng Bình', 'lUUtlx89vRMN2IGDWv71FIX0e4Ze1qMbLszqCfy0vh8BDyMFHGWq6mv8AsUG', '2018-11-08 19:24:11', '2018-12-12 22:54:27', NULL),
(9, 'hoaithuong', 'hoaithuong@gmail.com', '$2y$10$DAdR63IW0yaPGAi4GYfVYu.dZBW9ijVVr6clOgKEfXjdBhQc0SMIm', 3, 'Hoàng Thị Hoài Thương', '2018-11-16', 0, 'xiu.jpg', 'Quảng Bình', 'k91KakQrDzeDvIO1hPHima5eVqkISmumdHOW7WBXCx1KyQ2fFGO7wXsH0I2q', '2018-11-10 10:52:47', '2018-12-12 18:55:37', NULL),
(10, 'thanhluat', 'thanhluat95@gmail.com', '$2y$10$BlGYlzJv5.tDJZTup2grkuuQs8jsnEOPOn.q.dh8Bf4ool.fMIcTa', 3, 'Phạm Thanh Luật', '2018-11-15', 1, 'Som.jpg', 'Quảng Bình', NULL, '2018-11-11 00:37:27', '2018-11-11 00:37:27', NULL),
(12, 'hoangnam', 'midndsadhadske97@gmail.com', '$2y$10$vOo/cPSzGqcF5nz10bnDTeSRWJC5oT0M/o7tUwUnrlqWX4/WJrdvW', 3, 'Hoàng Nhật Nam', '2018-11-07', 1, 'Nho.jpg', 'Quảng Bình', NULL, '2018-11-11 00:39:18', '2018-11-11 00:39:18', NULL),
(13, 'sinhvien2', 'dsadsa@gmail.com', '$2y$10$4j3AfoSYhln5U9NAV/y9uexuZFH8N3uqhVjLs2MrPm6XLAy4I3x2a', 3, 'Sinh Viên 2', '2018-11-14', 0, 'user1.jpg', 'Hà Nội', 'm8eD9OsQ56KSyBJCUTVnV6ORrI0p2qrdTYz44FaTLxLxYIdPZY4KXYHiGMBp', '2018-11-11 00:46:01', '2018-11-11 00:46:01', NULL),
(14, 'sinhvien3', 'dgfsssssaaad@gmail.com', '$2y$10$/Yz6fH1A.zRi6PATudEa6.MOe7OWCpym/nn8m6YB1Z34BBwOVHdbS', 3, 'Sinh Viên 3', '2018-11-28', 1, 'user1.jpg', 'Hồ Chí Minh', NULL, '2018-11-11 00:47:17', '2018-11-11 00:47:17', NULL),
(15, 'giangvien4', 'aadsadvaaa@gmail.com', '$2y$10$lVfRoDrn/VSiTJURcxb25.jCWJMwrwFkiSnKTIYRENhczK9Th921K', 2, 'Giảng Viên 4', '2018-11-13', 1, 'user1.jpg', 'Quảng Ngãi', NULL, '2018-11-11 00:48:33', '2018-11-11 00:48:33', NULL),
(20, 'hocvien1', 'minhke97@gmail.com', '$2y$10$jdV0rR2JvjOzM6yC1WcB2O2Th8gdvtxKbEW7yJpOEFh3isHKEUkGO', 3, 'Bạch Văn Thương', '1997-05-10', 1, 'user1.jpg', '', '1DepWIjzamyE0mzwgXDcusEgAGPg2wYRINpnaTJjk6eOkCj8nFF2HYbBrAP5', '2018-12-22 00:09:15', '2018-12-22 00:09:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD PRIMARY KEY (`idBangDiem`);

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`idCauHoi`),
  ADD KEY `idMonHoc` (`idMonHoc`),
  ADD KEY `idLevel` (`idLevel`),
  ADD KEY `idChuDe` (`idChuDe`),
  ADD KEY `idNguoiTao` (`idNguoiTao`);

--
-- Indexes for table `chitietdethi`
--
ALTER TABLE `chitietdethi`
  ADD PRIMARY KEY (`idDeThi`,`idCauHoi`);

--
-- Indexes for table `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`idChuDe`),
  ADD KEY `idMonHoc` (`idMonHoc`);

--
-- Indexes for table `dethi`
--
ALTER TABLE `dethi`
  ADD PRIMARY KEY (`idDeThi`),
  ADD KEY `idNguoiTao` (`idNguoiTao`,`idMonHoc`),
  ADD KEY `idMonHoc` (`idMonHoc`);

--
-- Indexes for table `giangday`
--
ALTER TABLE `giangday`
  ADD PRIMARY KEY (`idGiangVienHT`,`idMonHoc`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`idLevel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`idMonHoc`);

--
-- Indexes for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD PRIMARY KEY (`idTaiLieu`),
  ADD KEY `idMonHoc` (`idMonHoc`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`idThongBao`),
  ADD KEY `idNguoiGui` (`idNguoiGui`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`idTinTuc`),
  ADD KEY `idGiangVien` (`idGiangVien`);

--
-- Indexes for table `typeaccount`
--
ALTER TABLE `typeaccount`
  ADD PRIMARY KEY (`idtype`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangdiem`
--
ALTER TABLE `bangdiem`
  MODIFY `idBangDiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `idCauHoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `chude`
--
ALTER TABLE `chude`
  MODIFY `idChuDe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `dethi`
--
ALTER TABLE `dethi`
  MODIFY `idDeThi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `idLevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `idMonHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tailieu`
--
ALTER TABLE `tailieu`
  MODIFY `idTaiLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `idThongBao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `idTinTuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `typeaccount`
--
ALTER TABLE `typeaccount`
  MODIFY `idtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`idNguoiTao`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cauhoi_ibfk_2` FOREIGN KEY (`idMonHoc`) REFERENCES `monhoc` (`idMonHoc`),
  ADD CONSTRAINT `cauhoi_ibfk_3` FOREIGN KEY (`idChuDe`) REFERENCES `chude` (`idChuDe`),
  ADD CONSTRAINT `cauhoi_ibfk_4` FOREIGN KEY (`idLevel`) REFERENCES `level` (`idLevel`);

--
-- Constraints for table `chude`
--
ALTER TABLE `chude`
  ADD CONSTRAINT `chude_ibfk_1` FOREIGN KEY (`idMonHoc`) REFERENCES `monhoc` (`idMonHoc`);

--
-- Constraints for table `dethi`
--
ALTER TABLE `dethi`
  ADD CONSTRAINT `dethi_ibfk_1` FOREIGN KEY (`idMonHoc`) REFERENCES `monhoc` (`idMonHoc`),
  ADD CONSTRAINT `dethi_ibfk_2` FOREIGN KEY (`idNguoiTao`) REFERENCES `users` (`id`);

--
-- Constraints for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `tailieu_ibfk_1` FOREIGN KEY (`idMonHoc`) REFERENCES `monhoc` (`idMonHoc`) ON UPDATE CASCADE;

--
-- Constraints for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`idNguoiGui`) REFERENCES `users` (`id`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`idGiangVien`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
