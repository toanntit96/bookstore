-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2017 lúc 05:59 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci COMMENT='tác giả';

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`id_author`, `name`) VALUES
(1, 'Trần Đăng Khoa'),
(2, 'Trần Tiến'),
(3, 'Comeback Trần'),
(4, 'Văn Hiệp'),
(5, 'Hiệp Vũ Văn'),
(6, 'Tony buổi sáng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id_khuyenmai` int(11) NOT NULL,
  `noidung` int(11) NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id_khuyenmai`, `noidung`, `percent`) VALUES
(0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `sex` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `email`, `fullname`, `birthday`, `sex`, `level`) VALUES
(1, '14004095', 'e10adc3949ba59abbe56e057f20f883e', '14004095@gmail.com', 'Nguyễn Tấn Toàn', '1996/11/1', 'Nam', 1),
(2, 'tantoan96', 'e10adc3949ba59abbe56e057f20f883e', 'tantoan96@gmail.com', 'Nguyễn Tấn Trung', '1996/10/1', 'Nam', 1),
(3, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 'Admin', '1996/20/11', 'Nam', 0),
(4, 'tv1', 'e10adc3949ba59abbe56e057f20f883e', 'tv1@gmail.com', 'thành viên 1', '2017-06-01', 'Nam', 2),
(5, 'tv2', 'e10adc3949ba59abbe56e057f20f883e', 'tv2@gmail.com', 'Thành viên 2', '2017-06-02', 'Nu', 2),
(6, 'tv3', '25f9e794323b453885f5181f1b624d0b', 'tv3@gmail.com', 'Thành viên 3', '2017-06-02', 'Nữ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_phat_hanh`
--

CREATE TABLE `nha_phat_hanh` (
  `id_nhaphathanh` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_phat_hanh`
--

INSERT INTO `nha_phat_hanh` (`id_nhaphathanh`, `name`) VALUES
(1, 'NXB Kim Dong'),
(2, 'Bách Khoa'),
(3, 'NXB Giáo Dục'),
(4, 'First New'),
(5, 'Bách Khoa Hà Nội'),
(6, 'Tuổi trẻ'),
(7, 'Tony buổi sáng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id_order` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `thanhtoan` tinyint(1) NOT NULL,
  `dia_chi_nhan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` float NOT NULL,
  `ngay_upload` date NOT NULL,
  `id_nhaphathanh` int(11) NOT NULL,
  `id_theloai` int(11) NOT NULL,
  `TTGioiThieu` varchar(1500) COLLATE utf8_vietnamese_ci NOT NULL,
  `soluongnguoimua` int(11) NOT NULL,
  `id_khuyenmai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `id_author`, `name`, `image`, `so_luong`, `gia`, `ngay_upload`, `id_nhaphathanh`, `id_theloai`, `TTGioiThieu`, `soluongnguoimua`, `id_khuyenmai`) VALUES
(1, 1, 'Mật Mã', '1.png', 17, 17000, '2015-11-12', 1, 1, 'Cuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\n                        ', 10, 0),
(2, 2, 'Paris', '3.png', 17, 170000, '2015-11-12', 2, 3, 'Cuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\n                        ', 30, 0),
(3, 3, 'Quê Nội', '4.png', 17, 81000, '2015-11-12', 3, 3, 'Cuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....', 5, 0),
(4, 4, 'Cái Kết Đắng ', '5.png', 17, 71000, '2015-11-12', 4, 4, 'Cuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....', 8, 0),
(5, 5, 'Người tốt bụng', '12.png', 17, 65000, '2015-10-08', 5, 10, 'Chưa có mô tả\r\n                        ', 0, 0),
(6, 1, 'Listening2', '7.png', 17, 50000, '2015-11-12', 6, 6, 'Cuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....', 26, 0),
(7, 2, 'Bảy Bước Tới Mùa Hè', '8.png', 17, 20000, '2015-11-12', 1, 7, 'Cuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....', 40, 0),
(8, 3, 'Tư duy', '17.png', 17, 17000, '2015-11-12', 2, 2, 'Cuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\n                        \r\n                        ', 50, 0),
(9, 4, 'Huấn Luyện Kỹ Năng Bán Hàng', '11.png', 17, 19000, '2015-11-12', 3, 2, 'Cuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\nCuốn sách là tâm tư tình cảm của tác giả  muốn gửi đến người đọc dựa trên 1 câu truyện có thật về cuộc sống của những con người vùng nông thôn. Họ có những ước ao, họ có những khát khao....\r\n                        \r\n                        ', 0, 0),
(10, 1, 'Mẹ thơm một cái', '65.png', 30, 45000, '2017-06-02', 3, 3, 'Tác phẩm nói về tình yêu của người mẹ.............', 0, 0),
(11, 6, 'Trên đường băng', 'tony-buoi-sang.jpg', 50, 65000, '2017-06-02', 7, 11, 'Mỗi người phải đi trên...............', 0, 0),
(12, 6, 'Cafe cùng Tony', 'LnVNYDCi.jpg', 50, 55000, '2017-06-02', 7, 11, '................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................\r\n', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id_theloai` int(11) NOT NULL,
  `tenloai` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id_theloai`, `tenloai`) VALUES
(1, 'Sách ngoại ngữ'),
(2, 'Sách kinh tế'),
(3, 'Sách văn học trong nước'),
(4, 'Sách văn học nước ngoài'),
(5, 'Sách tin học - ngoại ngữ'),
(6, 'Sách chuyên ngành'),
(7, 'Sách giáo khoa giáo trình'),
(8, 'Sách tạp chí'),
(9, 'Sách thiếu nhi'),
(10, 'Sách tiểu thuyết'),
(11, 'Kỹ năng sống');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_khuyenmai`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Chỉ mục cho bảng `nha_phat_hanh`
--
ALTER TABLE `nha_phat_hanh`
  ADD PRIMARY KEY (`id_nhaphathanh`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id_order`,`id_member`),
  ADD KEY `fk_oder_member` (`id_member`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `fk_orderproduct_product` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_product_nhaphathanh` (`id_nhaphathanh`),
  ADD KEY `fk_product_author` (`id_author`),
  ADD KEY `fk_product_theloai` (`id_theloai`),
  ADD KEY `fk_product_khuyenmai` (`id_khuyenmai`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id_theloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id_khuyenmai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `nha_phat_hanh`
--
ALTER TABLE `nha_phat_hanh`
  MODIFY `id_nhaphathanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `oder`
--
ALTER TABLE `oder`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id_theloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `fk_oder_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `fk_orderproduct_order` FOREIGN KEY (`id_order`) REFERENCES `oder` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderproduct_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_author` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_khuyenmai` FOREIGN KEY (`id_khuyenmai`) REFERENCES `khuyenmai` (`id_khuyenmai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_nhaphathanh` FOREIGN KEY (`id_nhaphathanh`) REFERENCES `nha_phat_hanh` (`id_nhaphathanh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_theloai` FOREIGN KEY (`id_theloai`) REFERENCES `theloai` (`id_theloai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
