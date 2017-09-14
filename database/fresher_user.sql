-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 14, 2017 lúc 11:57 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fresher_user`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `privilege` tinyint(4) NOT NULL,
  `user_email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_time_created` datetime NOT NULL,
  `user_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `pass`, `status`, `privilege`, `user_email`, `user_img`, `user_time_created`, `user_time_updated`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '150542257721193021_2006704162910010_4108612890131014460_n.jpg', '2015-07-21 01:20:30', '2017-09-15 03:56:59'),
(2, 'User 1', '25d55ad283aa400af464c76d713c07ad', 0, 1, 'thieufit@gmail.com', '1505420062Untitled.png', '2015-06-10 05:30:08', '2017-09-15 03:14:31'),
(3, 'User 2', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-06-03 10:07:37', '2017-09-15 03:14:31'),
(4, 'User 3', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-06-16 02:16:12', '2017-09-15 03:14:31'),
(5, 'User 4', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-06-16 09:29:17', '2017-09-15 03:14:31'),
(8, 'User 5', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-06-16 11:22:32', '2017-09-15 03:14:31'),
(9, 'User 6', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-06-17 07:23:40', '2017-09-15 03:14:31'),
(10, 'User 7', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-06-17 08:21:16', '2017-09-15 03:14:31'),
(11, 'User 8', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-06-17 08:27:20', '2017-09-15 03:14:31'),
(28, 'User 9', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-07-02 10:22:31', '2017-09-15 03:14:31'),
(29, 'User 10', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-07-02 11:09:03', '2015-07-02 11:09:20'),
(30, 'User 11222222', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2015-07-02 02:22:38', '2017-09-15 03:13:17'),
(31, 'User 12', '25d55ad283aa400af464c76d713c07ad', 1, 0, 'thieufit@gmail.com', '', '2015-07-08 02:26:03', '2015-07-08 02:26:45'),
(32, 'User 13', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-07-09 03:46:21', '2015-07-09 03:46:21'),
(33, 'User 14', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-07-10 02:05:18', '2015-07-10 02:05:33'),
(34, 'User 15', '25d55ad283aa400af464c76d713c07ad', 1, 0, 'thieufit@gmail.com', '', '2015-07-10 02:54:42', '2015-07-10 02:54:54'),
(44, 'User 16', '25d55ad283aa400af464c76d713c07ad', 1, 0, 'thieufit@gmail.com', '', '2015-07-14 11:55:13', '2015-07-14 11:55:13'),
(45, 'User 17', '25d55ad283aa400af464c76d713c07ad', 0, 0, 'thieufit@gmail.com', '', '2015-07-14 02:34:51', '2015-07-14 02:40:37'),
(46, 'User 18', '25d55ad283aa400af464c76d713c07ad', 1, 0, 'thieufit@gmail.com', '', '2015-07-15 08:45:58', '2015-07-15 08:53:36'),
(47, 'User 19', '25d55ad283aa400af464c76d713c07ad', 1, 0, 'thieufit@gmail.com', '', '2015-07-15 09:12:58', '2015-07-15 09:12:58'),
(48, 'User 20', '25d55ad283aa400af464c76d713c07ad', 1, 0, 'thieufit@gmail.com', '', '2015-07-15 09:26:15', '2015-07-15 09:26:15'),
(49, 'User 21', '25d55ad283aa400af464c76d713c07ad', 1, 0, 'thieufit@gmail.com', '', '2015-07-19 10:51:41', '2015-07-19 10:56:30'),
(50, 'User 22', '25d55ad283aa400af464c76d713c07ad', 0, 1, 'thieufit@gmail.com', '', '2015-07-19 11:08:59', '2015-07-20 08:55:29'),
(51, 'User 23', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2015-07-20 09:53:18', '2015-07-20 09:53:18'),
(52, 'User 24', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2015-07-20 10:32:23', '2015-07-20 10:32:23'),
(53, 'User 25', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2015-07-20 02:59:57', '2015-07-20 06:27:04'),
(54, 'User 26', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2015-07-20 06:25:03', '2015-07-20 06:26:30'),
(55, 'User 27', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2015-07-20 11:07:44', '2015-07-20 11:08:05'),
(56, 'User 28', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2015-07-21 12:32:37', '2015-07-21 12:33:23'),
(57, 'User 29', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2017-02-27 11:57:03', '2017-02-27 11:59:16'),
(58, 'User 30', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2017-02-27 11:59:49', '2017-02-27 12:00:05'),
(59, 'User 31', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'thieufit@gmail.com', '', '2017-02-27 12:01:00', '2017-02-27 12:02:01'),
(60, 'User 32', '25d55ad283aa400af464c76d713c07ad', 0, 1, 'thieufit@gmail.com', '', '2017-02-27 01:50:36', '2017-02-27 01:58:13'),
(61, '21321312321', '6bea48a16e16d87e144291f918c61d42', 1, 1, '21321312312@gmail.com', '150542010021193021_2006704162910010_4108612890131014460_n.jpg', '2017-09-15 03:15:00', '2017-09-15 03:15:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
