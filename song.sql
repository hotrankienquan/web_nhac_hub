-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 06:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhac_buh_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `name_song` varchar(255) NOT NULL,
  `artists_names` varchar(255) NOT NULL,
  `performer` varchar(255) NOT NULL,
  `url_song` text NOT NULL,
  `image1` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `name_song`, `artists_names`, `performer`, `url_song`, `image1`, `date`) VALUES
(1, 'Thế Giới Trong Em', 'Hương Ly, LY.M', 'Hương Ly, LY.M', 'https://vnso-zn-23-tf-mp3-s1-zmp3.zmdcdn.me/be198314a2544b0a1245/7219521871484994668?authen=exp=1663822205~acl=/be198314a2544b0a1245/*~hmac=489d871a44be6a0bb8e2abab72f75082', '', '2022-09-21 03:27:20'),
(2, 'Em Lấy Chồng', 'Khắc Việt', 'Khắc Việt', 'https://vnso-zn-23-tf-mp3-s1-zmp3.zmdcdn.me/be198314a2544b0a1245/7219521871484994668?authen=exp=1663822205~acl=/be198314a2544b0a1245/*~hmac=489d871a44be6a0bb8e2abab72f75082', '', '2022-09-21 03:27:20'),
(4, 'Waiting For You', 'Mono', 'Mono', 'bleble', '', '2022-09-21 03:27:20'),
(9, 'Xin lỗi vì đã yêu nhau', 'Nguyễn Minh Cường', 'Hoài Lâm', 'https://stream.nixcdn.com/NhacCuaTui966/XinLoiViDaYeuNhau-HoaiLam-5524738.mp3?st=bQ-Krgbd6arOmdwzZb-IzQ&e=1663817393&download=true', 'xinloividayeunhau.jpg', '2022-09-21 03:37:13'),
(13, 'Người đến sau sẽ cho người tất cả', 'Aitai', 'Hoài Lâm', 'https://stream.nixcdn.com/NhacCuaTui1007/NguoiDenSauSeChoNguoiTatCa-HoaiLam-6843939.mp3?st=b0YWB79Lxd-KMiUjRuASbA&e=1663820888&download=true', 'hlam-nguoidensau.jpg', '2022-09-21 04:29:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
