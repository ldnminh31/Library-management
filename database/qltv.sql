-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 06, 2022 lúc 06:19 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muonsach`
--

CREATE TABLE `muonsach` (
  `mathanhvien` int(10) DEFAULT NULL,
  `masach` int(10) DEFAULT NULL,
  `ngaymuon` date NOT NULL,
  `ngaytra` date DEFAULT NULL,
  `trangthai` varchar(50) NOT NULL,
  `soluong` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `muonsach`
--

INSERT INTO `muonsach` (`mathanhvien`, `masach`, `ngaymuon`, `ngaytra`, `trangthai`, `soluong`) VALUES
(1, 1, '2021-10-01', '2021-10-01', 'đã trả', 2),
(2, 2, '2021-11-01', '0000-00-00', 'chưa trả', 1),
(1, 10, '2022-02-02', '2022-03-03', 'đã trả', 1),
(5, 5, '2022-10-01', '2022-11-01', 'đã trả', 1),
(3, 9, '2022-10-01', '2022-11-01', 'đã trả', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `masach` int(10) NOT NULL,
  `tensach` varchar(100) NOT NULL,
  `tentacgia` varchar(100) NOT NULL,
  `theloai` varchar(100) NOT NULL,
  `mota` varchar(200) NOT NULL,
  `vitri` varchar(50) DEFAULT NULL,
  `soluong` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `tentacgia`, `theloai`, `mota`, `vitri`, `soluong`) VALUES
(1, 'Ra Bờ Suối Ngắm Hoa Kén Hồng', 'Nguyễn Nhật Ánh', 'truyện ngắn', 'Ra bờ suối ngắm hoa kèn hồng là tác phẩm trong trẻo, tràn đầy tình yêu thương mát lành', 'Kệ 3 tầng 0', 5),
(2, 'Khuất phục tử thần', 'Bo Parfet & Richard Buskin', 'phiêu lưu', '\"Khuất Phục Tử Thần\" không chỉ là hành trình chinh phục 7 ngọn núi cao nhất 7 lục địa.Đó là một hành trình thay đổi nhận thức và trưởng thành, đối mặt với những thiếu sót, hoàn thiện từng ngày, và cả ', 'Kệ 3 tầng 1', 10),
(3, 'Đàm đạo với Khổng Tử', 'Hồ Văn Phi', 'triết lý', '“Đàm đạo với Khổng Tử” gồm những câu chuyện đối đáp giữa tác giả Hồ Văn Phi và Khổng Tử xoay quanh các tư tưởng, triết lí của ông được người đời ngưỡng mộ.', 'Kệ 2 tầng 0', 4),
(4, 'Khi người ấy nói lời yêu, có rất nhiều điều bạn nên nghĩ', 'Minh Đào', 'tình yêu', 'Khi Người Ấy Nói Lời Yêu, Có Rất Nhiều Điều Bạn Nên Nghĩ (Tái Bản 2021)', 'Kệ 2 tầng 0', 0),
(5, 'Những đòn tâm lý thuyê phục', 'Robert B. Cialdini', 'tâm lý', '6 vũ khí ảnh hưởng hiệu quả được các chuyên gia thuyết phục hàng đầu sử dụng', 'Kệ 1 tầng 0', 1),
(6, 'Đàn ông bốc phốt đàn ông', 'Quỳnh Trang', 'Tâm lý và tình yêu', 'Cuốn sách như chiếc chìa khóa mở cửa trái tim “cánh mày râu” thông qua 7 chương được viết cô đọng và súc tích', 'Kệ 3 tầng 1', 2),
(7, 'How Psychology works?', 'Trần Trương Phúc Hạnh , Phương Hoài Nga', 'Tâm lý xã hội', 'Cuốn sách có cấu trúc khoa học, trình bày dễ hiểu, súc tích, thiết kế và minh họa đẹp mắt này sẽ mang đến cho bạn những hiểu biết về các học thuyết tâm lý và các phương pháp trị liệu, từ các vấn đề cá', 'Kệ 5 tầng 5', 3),
(8, 'The Best of Chicken Soup for the Soul', 'Jack Canfield, Mark Victor Hansen', 'cuộc sống', 'Bộ sách Chicken Soup for the Soul đã mang đến cho bạn đọc nhiều câu chuyện cảm động, những câu chuyện có thể tưới mát tâm hồn và giúp cuộc sống trở nên ý nghĩa hơn. ', 'Kệ 3 tầng 2', 2),
(9, 'Cuốn tiểu thuyết kinh dị được chờ đợi của tác giả Thomas Harris : Hannibal (TB)', 'Thomas Harris', 'kinh dị', 'Được xem là một trong những sự kiện văn chương được chờ đợi nhất, Hannibal mang người đọc vào cung điện ký ức của một kẻ ăn thịt người, tạo dựng nên một bức chân dung ớn lạnh của tội ác đang âm thầm s', 'Kệ 3 tầng 9', 1),
(10, 'Chó sủa nhầm cây', 'Eric Barker', 'hành trình khám phá', 'CHÓ SỦA NHẦM C Y - BARKING UP THE WRONG TREE - là quyển sách gây tiếng vang, liên tục nằm trong danh sách bestseller Amazon của tác giả kiêm chủ trang blog Barking up the wrong tree - Eric Barker. Xuy', 'Kệ 3 tầng 2', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `mathanhvien` int(10) NOT NULL,
  `hovaten` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ngaydangky` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`mathanhvien`, `hovaten`, `ngaysinh`, `sdt`, `email`, `ngaydangky`) VALUES
(1, 'Nguyễn Văn An', '1999-02-02', '070100123', 'nvan0202@gmail.com', '2022-01-04'),
(2, 'Lê Thị Diệu Hiền', '2002-05-05', '070100321', 'ltdhien2002@outlook.com', '2021-09-12'),
(3, 'Trần Ái Liên', '1995-03-10', '070707777', 'talien1995@outlook.com', '2022-09-12'),
(4, 'Phan Thị Huỳnh', '2001-10-12', '070777555', 'pthuynh2001@gmail.com', '2022-01-01'),
(5, 'Nguyễn Khánh Bom', '2001-02-05', '070888777', 'nkbomdungdung@gmail.com', '2022-01-01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`mathanhvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `masach` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `mathanhvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
