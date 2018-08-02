-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 05:50 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dc_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ctdh_sp_id` int(10) UNSIGNED NOT NULL,
  `ctdh_dh_id` int(10) UNSIGNED NOT NULL,
  `ctdh_so_luong` int(11) NOT NULL,
  `ctdh_gia_ban` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuocphivanchuyen`
--

CREATE TABLE `cuocphivanchuyen` (
  `cpvc_id` int(10) UNSIGNED NOT NULL,
  `cpvc_thanh_pho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpvc_gia_cuoc` double NOT NULL,
  `tp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuocphivanchuyen`
--

INSERT INTO `cuocphivanchuyen` (`cpvc_id`, `cpvc_thanh_pho`, `cpvc_gia_cuoc`, `tp_id`) VALUES
(2, 'Vụng Tàu', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `dmsp_id` int(10) UNSIGNED NOT NULL,
  `dmsp_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`dmsp_id`, `dmsp_ten`, `parent`, `trang_thai`) VALUES
(1, 'aaaa', 1, 'Bật');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuctintuc`
--

CREATE TABLE `danhmuctintuc` (
  `dmtt_id` int(10) UNSIGNED NOT NULL,
  `dmtt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diachigiaohang`
--

CREATE TABLE `diachigiaohang` (
  `dcgh_stt` int(10) UNSIGNED NOT NULL,
  `dcgh_kh_id` int(10) UNSIGNED NOT NULL,
  `dcgh_dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `dh_id` int(10) UNSIGNED NOT NULL,
  `dh_kh_id` int(10) UNSIGNED NOT NULL,
  `dh_pgg_id` int(10) UNSIGNED NOT NULL,
  `dh_ltt_id` int(10) UNSIGNED NOT NULL,
  `dh_nv_id` int(10) UNSIGNED NOT NULL,
  `dh_tinh_trang_id` int(10) UNSIGNED NOT NULL,
  `dh_cpvc_id` int(10) UNSIGNED NOT NULL,
  `dh_tong_tien` double NOT NULL,
  `dh_ngay_dat_hang` date NOT NULL,
  `dh_ngay_giao_hang` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`dh_id`, `dh_kh_id`, `dh_pgg_id`, `dh_ltt_id`, `dh_nv_id`, `dh_tinh_trang_id`, `dh_cpvc_id`, `dh_tong_tien`, `dh_ngay_dat_hang`, `dh_ngay_giao_hang`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 2, 10000, '2018-08-20', '2018-08-22', '2018-08-15 17:00:00', '2018-08-02 03:02:44'),
(3, 1, 1, 1, 1, 1, 2, 1000000, '2018-08-21', '2018-08-14', '2018-08-25 17:00:00', '2018-08-02 03:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `donhangdoi_tra`
--

CREATE TABLE `donhangdoi_tra` (
  `dhdt_id` int(10) UNSIGNED NOT NULL,
  `dhdt_kh_id` int(10) UNSIGNED NOT NULL,
  `dhdt_dh_id` int(10) UNSIGNED NOT NULL,
  `dhdt_ngay_doi_tra` datetime NOT NULL,
  `dhdt_thao_tac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dhdt_ly_do` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dhdt_tinh_trang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donvitinh`
--

CREATE TABLE `donvitinh` (
  `donvitinh_id` int(10) UNSIGNED NOT NULL,
  `donvitinh_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvitinh`
--

INSERT INTO `donvitinh` (`donvitinh_id`, `donvitinh_ten`, `chu_thich`) VALUES
(1, 'diện tích', 'dài * rộng');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `kh_id` int(10) UNSIGNED NOT NULL,
  `kh_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_ngay_sinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_gioi_tinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_sdt` int(11) NOT NULL,
  `kh_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`kh_id`, `kh_ten`, `kh_ngay_sinh`, `kh_gioi_tinh`, `kh_sdt`, `kh_email`, `created_at`, `updated_at`) VALUES
(1, 'Cường', '20/10/1997', 'Nam', 9119, 'abc@gmail.com', '2018-08-19 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khohang`
--

CREATE TABLE `khohang` (
  `khohang_id` int(10) UNSIGNED NOT NULL,
  `khohang_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khohang`
--

INSERT INTO `khohang` (`khohang_id`, `khohang_ten`, `tinh_trang`) VALUES
(1, 'Tp Hồ Chí Minh', 'Bật');

-- --------------------------------------------------------

--
-- Table structure for table `loaikhuyenmai`
--

CREATE TABLE `loaikhuyenmai` (
  `km_id` int(10) UNSIGNED NOT NULL,
  `km_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `km_gia` double NOT NULL,
  `km_ngay_bat_dau` datetime NOT NULL,
  `km_ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaikhuyenmai`
--

INSERT INTO `loaikhuyenmai` (`km_id`, `km_ten`, `km_gia`, `km_ngay_bat_dau`, `km_ngay_ket_thuc`, `trang_thai`) VALUES
(1, 'Voucher 1', 100000, '2018-08-20 00:00:00', '2018-08-22 00:00:00', 'Bật'),
(2, 'Voucher2', 200000, '2018-08-28 00:00:00', '2018-09-28 00:00:00', 'Bật');

-- --------------------------------------------------------

--
-- Table structure for table `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `lnd_id` int(10) UNSIGNED NOT NULL,
  `lnd_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loainguoidung`
--

INSERT INTO `loainguoidung` (`lnd_id`, `lnd_ten`) VALUES
(1, 'abc'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `lnv_id` int(10) UNSIGNED NOT NULL,
  `lnv_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lnv_luong_co_ban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loainhanvien`
--

INSERT INTO `loainhanvien` (`lnv_id`, `lnv_ten`, `lnv_luong_co_ban`) VALUES
(1, 'nhân viên bán hàng', 5000000),
(2, 'admin', 7000000);

-- --------------------------------------------------------

--
-- Table structure for table `loaithanhtoan`
--

CREATE TABLE `loaithanhtoan` (
  `ltt_id` int(10) UNSIGNED NOT NULL,
  `ltt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ltt_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaithanhtoan`
--

INSERT INTO `loaithanhtoan` (`ltt_id`, `ltt_ten`, `ltt_hinh_anh`, `trang_thai`) VALUES
(1, 'ATM', 'aaaa', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `loaithue`
--

CREATE TABLE `loaithue` (
  `loai_thue_id` int(10) UNSIGNED NOT NULL,
  `loai_thue_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaithue`
--

INSERT INTO `loaithue` (`loai_thue_id`, `loai_thue_ten`, `chu_thich`, `trang_thai`) VALUES
(1, 'Thuế bán hàng', '5%', 'Bật');

-- --------------------------------------------------------

--
-- Table structure for table `mucthue`
--

CREATE TABLE `mucthue` (
  `mt_id` int(10) UNSIGNED NOT NULL,
  `mt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mt_muc_thue_percent` int(11) NOT NULL,
  `mt_loai_thue` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mucthue`
--

INSERT INTO `mucthue` (`mt_id`, `mt_ten`, `mt_muc_thue_percent`, `mt_loai_thue`, `created_at`, `updated_at`) VALUES
(1, 'Thuế bán hàng', 12, 1, '2018-08-20 17:00:00', '2018-08-02 01:56:31'),
(2, 'Thuế bán hàng', 5, 1, '2018-08-14 17:00:00', '2018-08-02 01:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nd_id` int(10) UNSIGNED NOT NULL,
  `nd_lnd__id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lnd_sdt` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`nd_id`, `nd_lnd__id`, `name`, `email`, `password`, `lnd_sdt`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nguyễn Văn A', 'abc@gmail.com', '0.123456', 123456789, '2018-08-08 17:00:00', '2018-08-02 01:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nv_id` int(10) UNSIGNED NOT NULL,
  `nv_lnv_id` int(10) UNSIGNED NOT NULL,
  `nv_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv_sdt` int(11) NOT NULL,
  `nv_dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv_so_ngay_nghi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`nv_id`, `nv_lnv_id`, `nv_ten`, `nv_sdt`, `nv_dia_chi`, `nv_email`, `nv_so_ngay_nghi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nguyễn Văn Aa', 919212312, 'Đường 3/2 Quận 11', 'abc@gmail.com', 20, '2018-08-13 17:00:00', '2018-08-02 01:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `nsx_id` int(10) UNSIGNED NOT NULL,
  `nsx_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nsx_dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nsx_sdt` int(11) NOT NULL,
  `nsx_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`nsx_id`, `nsx_ten`, `nsx_dia_chi`, `nsx_sdt`, `nsx_hinh_anh`, `trang_thai`) VALUES
(1, 'Châu Phú Cường', 'Quận 11', 91231456, 'asd', 'Bật');

-- --------------------------------------------------------

--
-- Table structure for table `phieugiamgia`
--

CREATE TABLE `phieugiamgia` (
  `pgg_id` int(10) UNSIGNED NOT NULL,
  `pgg_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pgg_giam_gia_percent` double NOT NULL,
  `pgg_ngay_bat_dau` datetime NOT NULL,
  `pgg_ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieugiamgia`
--

INSERT INTO `phieugiamgia` (`pgg_id`, `pgg_ten`, `pgg_giam_gia_percent`, `pgg_ngay_bat_dau`, `pgg_ngay_ket_thuc`, `trang_thai`) VALUES
(1, 'Giảm giá 5% điện thoại', 5, '2018-08-21 01:21:00', '2018-08-30 02:02:00', 'Bật'),
(2, 'Giảm giá 10% điện thoại', 10, '2018-08-21 00:21:00', '0012-02-11 14:01:00', 'Bật');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_id` int(10) UNSIGNED NOT NULL,
  `sp_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sp_so_luong_ton_kho` int(11) NOT NULL,
  `sp_gia_niem_yet` double NOT NULL,
  `sp_gia_ban` double NOT NULL,
  `sp_mo_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sp_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sp_don_vi_tinh_id` int(10) UNSIGNED NOT NULL,
  `sp_danh_muc_id` int(10) UNSIGNED NOT NULL,
  `sp_nsx_id` int(10) UNSIGNED NOT NULL,
  `sp_kho_hang_id` int(10) UNSIGNED NOT NULL,
  `sp_muc_thue_id` int(10) UNSIGNED NOT NULL,
  `sp_khuyen_mai_id` int(10) UNSIGNED NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`sp_id`, `sp_ten`, `sp_so_luong_ton_kho`, `sp_gia_niem_yet`, `sp_gia_ban`, `sp_mo_ta`, `sp_hinh_anh`, `sp_don_vi_tinh_id`, `sp_danh_muc_id`, `sp_nsx_id`, `sp_kho_hang_id`, `sp_muc_thue_id`, `sp_khuyen_mai_id`, `trang_thai`, `created_at`, `updated_at`) VALUES
(2, 'aaaaaaaa', 1000, 1000000, 1000000, 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 1, 1, 1, 1, 1, 1, 'Yes', '2018-08-08 17:00:00', '2018-08-02 03:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `thanhpho`
--

CREATE TABLE `thanhpho` (
  `tp_id` int(11) NOT NULL,
  `tp_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhpho`
--

INSERT INTO `thanhpho` (`tp_id`, `tp_name`) VALUES
(1, 'TP Hồ Chí Minh'),
(2, 'Vũng Tàu'),
(3, 'Bà Rịa');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangdonhang`
--

CREATE TABLE `tinhtrangdonhang` (
  `tinh_trang_id` int(10) UNSIGNED NOT NULL,
  `tinh_trang_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhtrangdonhang`
--

INSERT INTO `tinhtrangdonhang` (`tinh_trang_id`, `tinh_trang_ten`) VALUES
(1, 'abc'),
(2, 'Trả hàng');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `tt_id` int(10) UNSIGNED NOT NULL,
  `tt_ltt_id` int(10) UNSIGNED NOT NULL,
  `tt_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tt_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tt_mo_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tt_noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ctdh_sp_id`,`ctdh_dh_id`),
  ADD KEY `chitietdonhang_ctdh_dh_id_foreign` (`ctdh_dh_id`);

--
-- Indexes for table `cuocphivanchuyen`
--
ALTER TABLE `cuocphivanchuyen`
  ADD PRIMARY KEY (`cpvc_id`),
  ADD KEY `tp_id` (`tp_id`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`dmsp_id`);

--
-- Indexes for table `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  ADD PRIMARY KEY (`dmtt_id`);

--
-- Indexes for table `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  ADD PRIMARY KEY (`dcgh_stt`),
  ADD KEY `diachigiaohang_dcgh_kh_id_foreign` (`dcgh_kh_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`dh_id`),
  ADD KEY `donhang_dh_kh_id_foreign` (`dh_kh_id`),
  ADD KEY `donhang_dh_cpvc_id_foreign` (`dh_cpvc_id`),
  ADD KEY `donhang_dh_pgg_id_foreign` (`dh_pgg_id`),
  ADD KEY `donhang_dh_ltt_id_foreign` (`dh_ltt_id`),
  ADD KEY `donhang_dh_nv_id_foreign` (`dh_nv_id`),
  ADD KEY `donhang_dh_tinh_trang_id_foreign` (`dh_tinh_trang_id`);

--
-- Indexes for table `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  ADD PRIMARY KEY (`dhdt_id`),
  ADD KEY `donhangdoi_tra_dhdt_kh_id_foreign` (`dhdt_kh_id`),
  ADD KEY `donhangdoi_tra_dhdt_dh_id_foreign` (`dhdt_dh_id`),
  ADD KEY `donhangdoi_tra_dhdt_tinh_trang_id_foreign` (`dhdt_tinh_trang_id`);

--
-- Indexes for table `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`donvitinh_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_id`);

--
-- Indexes for table `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`khohang_id`);

--
-- Indexes for table `loaikhuyenmai`
--
ALTER TABLE `loaikhuyenmai`
  ADD PRIMARY KEY (`km_id`);

--
-- Indexes for table `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`lnd_id`);

--
-- Indexes for table `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`lnv_id`);

--
-- Indexes for table `loaithanhtoan`
--
ALTER TABLE `loaithanhtoan`
  ADD PRIMARY KEY (`ltt_id`);

--
-- Indexes for table `loaithue`
--
ALTER TABLE `loaithue`
  ADD PRIMARY KEY (`loai_thue_id`);

--
-- Indexes for table `mucthue`
--
ALTER TABLE `mucthue`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `mucthue_mt_loai_thue_foreign` (`mt_loai_thue`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nd_id`),
  ADD KEY `nguoidung_nd_lnd__id_foreign` (`nd_lnd__id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nv_id`),
  ADD KEY `nhanvien_nv_lnv_id_foreign` (`nv_lnv_id`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`nsx_id`);

--
-- Indexes for table `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  ADD PRIMARY KEY (`pgg_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `sanpham_sp_don_vi_tinh_id_foreign` (`sp_don_vi_tinh_id`),
  ADD KEY `sanpham_sp_danh_muc_id_foreign` (`sp_danh_muc_id`),
  ADD KEY `sanpham_sp_nsx_id_foreign` (`sp_nsx_id`),
  ADD KEY `sanpham_sp_kho_hang_id_foreign` (`sp_kho_hang_id`),
  ADD KEY `sanpham_sp_muc_thue_id_foreign` (`sp_muc_thue_id`),
  ADD KEY `sanpham_sp_khuyen_mai_id_foreign` (`sp_khuyen_mai_id`);

--
-- Indexes for table `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indexes for table `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  ADD PRIMARY KEY (`tinh_trang_id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`tt_id`),
  ADD KEY `tintuc_tt_ltt_id_foreign` (`tt_ltt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuocphivanchuyen`
--
ALTER TABLE `cuocphivanchuyen`
  MODIFY `cpvc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `dmsp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  MODIFY `dmtt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  MODIFY `dcgh_stt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `dh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  MODIFY `dhdt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `donvitinh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `kh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khohang`
--
ALTER TABLE `khohang`
  MODIFY `khohang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loaikhuyenmai`
--
ALTER TABLE `loaikhuyenmai`
  MODIFY `km_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `lnd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loainhanvien`
--
ALTER TABLE `loainhanvien`
  MODIFY `lnv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaithanhtoan`
--
ALTER TABLE `loaithanhtoan`
  MODIFY `ltt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loaithue`
--
ALTER TABLE `loaithue`
  MODIFY `loai_thue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mucthue`
--
ALTER TABLE `mucthue`
  MODIFY `mt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `nd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `nsx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  MODIFY `pgg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `tinh_trang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ctdh_dh_id_foreign` FOREIGN KEY (`ctdh_dh_id`) REFERENCES `donhang` (`dh_id`),
  ADD CONSTRAINT `chitietdonhang_ctdh_sp_id_foreign` FOREIGN KEY (`ctdh_sp_id`) REFERENCES `sanpham` (`sp_id`);

--
-- Constraints for table `cuocphivanchuyen`
--
ALTER TABLE `cuocphivanchuyen`
  ADD CONSTRAINT `cuocphivanchuyen_ibfk_1` FOREIGN KEY (`tp_id`) REFERENCES `thanhpho` (`tp_id`);

--
-- Constraints for table `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  ADD CONSTRAINT `diachigiaohang_dcgh_kh_id_foreign` FOREIGN KEY (`dcgh_kh_id`) REFERENCES `khachhang` (`kh_id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_dh_cpvc_id_foreign` FOREIGN KEY (`dh_cpvc_id`) REFERENCES `cuocphivanchuyen` (`cpvc_id`),
  ADD CONSTRAINT `donhang_dh_kh_id_foreign` FOREIGN KEY (`dh_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `donhang_dh_ltt_id_foreign` FOREIGN KEY (`dh_ltt_id`) REFERENCES `loaithanhtoan` (`ltt_id`),
  ADD CONSTRAINT `donhang_dh_nv_id_foreign` FOREIGN KEY (`dh_nv_id`) REFERENCES `nhanvien` (`nv_id`),
  ADD CONSTRAINT `donhang_dh_pgg_id_foreign` FOREIGN KEY (`dh_pgg_id`) REFERENCES `phieugiamgia` (`pgg_id`),
  ADD CONSTRAINT `donhang_dh_tinh_trang_id_foreign` FOREIGN KEY (`dh_tinh_trang_id`) REFERENCES `tinhtrangdonhang` (`tinh_trang_id`);

--
-- Constraints for table `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  ADD CONSTRAINT `donhangdoi_tra_dhdt_dh_id_foreign` FOREIGN KEY (`dhdt_dh_id`) REFERENCES `donhang` (`dh_id`),
  ADD CONSTRAINT `donhangdoi_tra_dhdt_kh_id_foreign` FOREIGN KEY (`dhdt_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `donhangdoi_tra_dhdt_tinh_trang_id_foreign` FOREIGN KEY (`dhdt_tinh_trang_id`) REFERENCES `tinhtrangdonhang` (`tinh_trang_id`);

--
-- Constraints for table `mucthue`
--
ALTER TABLE `mucthue`
  ADD CONSTRAINT `mucthue_mt_loai_thue_foreign` FOREIGN KEY (`mt_loai_thue`) REFERENCES `loaithue` (`loai_thue_id`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_nd_lnd__id_foreign` FOREIGN KEY (`nd_lnd__id`) REFERENCES `loainguoidung` (`lnd_id`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_nv_lnv_id_foreign` FOREIGN KEY (`nv_lnv_id`) REFERENCES `loainhanvien` (`lnv_id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_sp_danh_muc_id_foreign` FOREIGN KEY (`sp_danh_muc_id`) REFERENCES `danhmucsanpham` (`dmsp_id`),
  ADD CONSTRAINT `sanpham_sp_don_vi_tinh_id_foreign` FOREIGN KEY (`sp_don_vi_tinh_id`) REFERENCES `donvitinh` (`donvitinh_id`),
  ADD CONSTRAINT `sanpham_sp_kho_hang_id_foreign` FOREIGN KEY (`sp_kho_hang_id`) REFERENCES `khohang` (`khohang_id`),
  ADD CONSTRAINT `sanpham_sp_khuyen_mai_id_foreign` FOREIGN KEY (`sp_khuyen_mai_id`) REFERENCES `loaikhuyenmai` (`km_id`),
  ADD CONSTRAINT `sanpham_sp_muc_thue_id_foreign` FOREIGN KEY (`sp_muc_thue_id`) REFERENCES `mucthue` (`mt_id`),
  ADD CONSTRAINT `sanpham_sp_nsx_id_foreign` FOREIGN KEY (`sp_nsx_id`) REFERENCES `nhasanxuat` (`nsx_id`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_tt_ltt_id_foreign` FOREIGN KEY (`tt_ltt_id`) REFERENCES `danhmuctintuc` (`dmtt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
