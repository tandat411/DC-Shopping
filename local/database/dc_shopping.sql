-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2018 lúc 09:53 AM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dc_shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
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
-- Cấu trúc bảng cho bảng `cuocphivanchuyen`
--

CREATE TABLE `cuocphivanchuyen` (
  `cpvc_id` int(10) UNSIGNED NOT NULL,
  `cpvc_thanh_pho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpvc_gia_cuoc` double NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `dmsp_id` int(10) UNSIGNED NOT NULL,
  `dmsp_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuctintuc`
--

CREATE TABLE `danhmuctintuc` (
  `dmtt_id` int(10) UNSIGNED NOT NULL,
  `dmtt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachigiaohang`
--

CREATE TABLE `diachigiaohang` (
  `dcgh_stt` int(10) UNSIGNED NOT NULL,
  `dcgh_kh_id` int(10) UNSIGNED NOT NULL,
  `dcgh_dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangdoi_tra`
--

CREATE TABLE `donhangdoi_tra` (
  `dhdt_id` int(10) UNSIGNED NOT NULL,
  `dhdt_kh_id` int(10) UNSIGNED NOT NULL,
  `dhdt_dh_id` int(10) UNSIGNED NOT NULL,
  `dhdt_ngay_doi/tra` datetime NOT NULL,
  `dhdt_thao_tac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dhdt_ly_do` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dhdt_tinh_trang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `donvitinh_id` int(10) UNSIGNED NOT NULL,
  `donvitinh_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khohang`
--

CREATE TABLE `khohang` (
  `khohang_id` int(10) UNSIGNED NOT NULL,
  `khohang_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhuyenmai`
--

CREATE TABLE `loaikhuyenmai` (
  `km_id` int(10) UNSIGNED NOT NULL,
  `km_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `km_gia` double NOT NULL,
  `km_ngay_bat_dau` datetime NOT NULL,
  `km_ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `lnd_id` int(10) UNSIGNED NOT NULL,
  `lnd_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `lnv_id` int(10) UNSIGNED NOT NULL,
  `lnv_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lnv_luong_co_ban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithanhtoan`
--

CREATE TABLE `loaithanhtoan` (
  `ltt_id` int(10) UNSIGNED NOT NULL,
  `ltt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ltt_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithue`
--

CREATE TABLE `loaithue` (
  `loai_thue_id` int(10) UNSIGNED NOT NULL,
  `loai_thue_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mucthue`
--

CREATE TABLE `mucthue` (
  `mt_id` int(10) UNSIGNED NOT NULL,
  `mt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mt_muc_thue(%)` int(11) NOT NULL,
  `mt_loai_thue` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `nsx_id` int(10) UNSIGNED NOT NULL,
  `nsx_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nsx_dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nsx_sdt` int(11) NOT NULL,
  `nsx_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieugiamgia`
--

CREATE TABLE `phieugiamgia` (
  `pgg_id` int(10) UNSIGNED NOT NULL,
  `pgg_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pgg_giam_gia(%)` double NOT NULL,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrangdonhang`
--

CREATE TABLE `tinhtrangdonhang` (
  `tinh_trang_id` int(10) UNSIGNED NOT NULL,
  `tinh_trang_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ctdh_sp_id`,`ctdh_dh_id`),
  ADD KEY `chitietdonhang_ctdh_dh_id_foreign` (`ctdh_dh_id`);

--
-- Chỉ mục cho bảng `cuocphivanchuyen`
--
ALTER TABLE `cuocphivanchuyen`
  ADD PRIMARY KEY (`cpvc_id`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`dmsp_id`);

--
-- Chỉ mục cho bảng `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  ADD PRIMARY KEY (`dmtt_id`);

--
-- Chỉ mục cho bảng `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  ADD PRIMARY KEY (`dcgh_stt`),
  ADD KEY `diachigiaohang_dcgh_kh_id_foreign` (`dcgh_kh_id`);

--
-- Chỉ mục cho bảng `donhang`
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
-- Chỉ mục cho bảng `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  ADD PRIMARY KEY (`dhdt_id`),
  ADD KEY `donhangdoi_tra_dhdt_kh_id_foreign` (`dhdt_kh_id`),
  ADD KEY `donhangdoi_tra_dhdt_dh_id_foreign` (`dhdt_dh_id`),
  ADD KEY `donhangdoi_tra_dhdt_tinh_trang_id_foreign` (`dhdt_tinh_trang_id`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`donvitinh_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_id`);

--
-- Chỉ mục cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`khohang_id`);

--
-- Chỉ mục cho bảng `loaikhuyenmai`
--
ALTER TABLE `loaikhuyenmai`
  ADD PRIMARY KEY (`km_id`);

--
-- Chỉ mục cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`lnd_id`);

--
-- Chỉ mục cho bảng `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`lnv_id`);

--
-- Chỉ mục cho bảng `loaithanhtoan`
--
ALTER TABLE `loaithanhtoan`
  ADD PRIMARY KEY (`ltt_id`);

--
-- Chỉ mục cho bảng `loaithue`
--
ALTER TABLE `loaithue`
  ADD PRIMARY KEY (`loai_thue_id`);

--
-- Chỉ mục cho bảng `mucthue`
--
ALTER TABLE `mucthue`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `mucthue_mt_loai_thue_foreign` (`mt_loai_thue`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nd_id`),
  ADD KEY `nguoidung_nd_lnd__id_foreign` (`nd_lnd__id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nv_id`),
  ADD KEY `nhanvien_nv_lnv_id_foreign` (`nv_lnv_id`);

--
-- Chỉ mục cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`nsx_id`);

--
-- Chỉ mục cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  ADD PRIMARY KEY (`pgg_id`);

--
-- Chỉ mục cho bảng `sanpham`
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
-- Chỉ mục cho bảng `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  ADD PRIMARY KEY (`tinh_trang_id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`tt_id`),
  ADD KEY `tintuc_tt_ltt_id_foreign` (`tt_ltt_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cuocphivanchuyen`
--
ALTER TABLE `cuocphivanchuyen`
  MODIFY `cpvc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `dmsp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  MODIFY `dmtt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  MODIFY `dcgh_stt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `dh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  MODIFY `dhdt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `donvitinh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `kh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khohang`
--
ALTER TABLE `khohang`
  MODIFY `khohang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaikhuyenmai`
--
ALTER TABLE `loaikhuyenmai`
  MODIFY `km_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `lnd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loainhanvien`
--
ALTER TABLE `loainhanvien`
  MODIFY `lnv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaithanhtoan`
--
ALTER TABLE `loaithanhtoan`
  MODIFY `ltt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaithue`
--
ALTER TABLE `loaithue`
  MODIFY `loai_thue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mucthue`
--
ALTER TABLE `mucthue`
  MODIFY `mt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `nd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `nsx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  MODIFY `pgg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `tinh_trang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ctdh_dh_id_foreign` FOREIGN KEY (`ctdh_dh_id`) REFERENCES `donhang` (`dh_id`),
  ADD CONSTRAINT `chitietdonhang_ctdh_sp_id_foreign` FOREIGN KEY (`ctdh_sp_id`) REFERENCES `sanpham` (`sp_id`);

--
-- Các ràng buộc cho bảng `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  ADD CONSTRAINT `diachigiaohang_dcgh_kh_id_foreign` FOREIGN KEY (`dcgh_kh_id`) REFERENCES `khachhang` (`kh_id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_dh_cpvc_id_foreign` FOREIGN KEY (`dh_cpvc_id`) REFERENCES `cuocphivanchuyen` (`cpvc_id`),
  ADD CONSTRAINT `donhang_dh_kh_id_foreign` FOREIGN KEY (`dh_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `donhang_dh_ltt_id_foreign` FOREIGN KEY (`dh_ltt_id`) REFERENCES `loaithanhtoan` (`ltt_id`),
  ADD CONSTRAINT `donhang_dh_nv_id_foreign` FOREIGN KEY (`dh_nv_id`) REFERENCES `nhanvien` (`nv_id`),
  ADD CONSTRAINT `donhang_dh_pgg_id_foreign` FOREIGN KEY (`dh_pgg_id`) REFERENCES `phieugiamgia` (`pgg_id`),
  ADD CONSTRAINT `donhang_dh_tinh_trang_id_foreign` FOREIGN KEY (`dh_tinh_trang_id`) REFERENCES `tinhtrangdonhang` (`tinh_trang_id`);

--
-- Các ràng buộc cho bảng `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  ADD CONSTRAINT `donhangdoi_tra_dhdt_dh_id_foreign` FOREIGN KEY (`dhdt_dh_id`) REFERENCES `donhang` (`dh_id`),
  ADD CONSTRAINT `donhangdoi_tra_dhdt_kh_id_foreign` FOREIGN KEY (`dhdt_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `donhangdoi_tra_dhdt_tinh_trang_id_foreign` FOREIGN KEY (`dhdt_tinh_trang_id`) REFERENCES `tinhtrangdonhang` (`tinh_trang_id`);

--
-- Các ràng buộc cho bảng `mucthue`
--
ALTER TABLE `mucthue`
  ADD CONSTRAINT `mucthue_mt_loai_thue_foreign` FOREIGN KEY (`mt_loai_thue`) REFERENCES `loaithue` (`loai_thue_id`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_nd_lnd__id_foreign` FOREIGN KEY (`nd_lnd__id`) REFERENCES `loainguoidung` (`lnd_id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_nv_lnv_id_foreign` FOREIGN KEY (`nv_lnv_id`) REFERENCES `loainhanvien` (`lnv_id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_sp_danh_muc_id_foreign` FOREIGN KEY (`sp_danh_muc_id`) REFERENCES `danhmucsanpham` (`dmsp_id`),
  ADD CONSTRAINT `sanpham_sp_don_vi_tinh_id_foreign` FOREIGN KEY (`sp_don_vi_tinh_id`) REFERENCES `donvitinh` (`donvitinh_id`),
  ADD CONSTRAINT `sanpham_sp_kho_hang_id_foreign` FOREIGN KEY (`sp_kho_hang_id`) REFERENCES `khohang` (`khohang_id`),
  ADD CONSTRAINT `sanpham_sp_khuyen_mai_id_foreign` FOREIGN KEY (`sp_khuyen_mai_id`) REFERENCES `loaikhuyenmai` (`km_id`),
  ADD CONSTRAINT `sanpham_sp_muc_thue_id_foreign` FOREIGN KEY (`sp_muc_thue_id`) REFERENCES `mucthue` (`mt_id`),
  ADD CONSTRAINT `sanpham_sp_nsx_id_foreign` FOREIGN KEY (`sp_nsx_id`) REFERENCES `nhasanxuat` (`nsx_id`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_tt_ltt_id_foreign` FOREIGN KEY (`tt_ltt_id`) REFERENCES `danhmuctintuc` (`dmtt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
