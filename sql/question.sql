-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 04:34 AM
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
-- Database: `question`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer`
--

CREATE TABLE `tb_answer` (
  `id_answer` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_answer`
--

INSERT INTO `tb_answer` (`id_answer`, `id_question`, `answer`, `type`) VALUES
(1, 1, 'Khi bắt đầu chương trình chạy', 0),
(2, 1, 'Khi click chuột', 0),
(3, 1, 'Khi kết thúc một chương trình', 1),
(4, 1, 'Khi di chuyển chuột qua', 0),
(5, 2, 'Khi một đối tượng trong form mất focus', 1),
(6, 2, 'Khi một đối tượng trong form có focus', 0),
(7, 2, '  Khi di chuyển con chuột qua form', 0),
(8, 2, 'Khi click chuột vào nút lệnh', 0),
(9, 3, 'Khi một đối tượng trong form mất focus', 0),
(10, 3, 'Khi một đối tượng trong form có focus', 0),
(11, 3, 'Khi di chuyển con chuột qua một đối tượng trong form', 1),
(12, 3, 'Khi click chuột vào nút lệnh', 0),
(13, 4, 'Khi một đối tượng trong form mất focus', 0),
(14, 4, 'Khi một đối tượng trong form có focus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_faculty`
--

CREATE TABLE `tb_faculty` (
  `id_faculty` int(11) NOT NULL,
  `faculty_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_faculty`
--

INSERT INTO `tb_faculty` (`id_faculty`, `faculty_name`) VALUES
(1, 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pack_subject`
--

CREATE TABLE `tb_pack_subject` (
  `id_pack_subject` int(11) NOT NULL,
  `name_pack_subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_faculty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_pack_subject`
--

INSERT INTO `tb_pack_subject` (`id_pack_subject`, `name_pack_subject`, `id_faculty`) VALUES
(1, 'Kỹ thuật phần mềm', 1),
(2, 'Hệ thống thông tin', 1),
(3, 'Khoa học máy tính', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `id_question` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `level` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`id_question`, `content`, `level`, `id_subject`) VALUES
(1, 'Trong Javascript sự kiện OnUnload thực hiện khi nào?', '1', 1),
(2, 'Trong Javascript sự kiện Onblur thực hiện khi nào?', '1', 1),
(3, 'Trong Javascript sự kiện OnMouseOver thực hiện khi nào?', '1', 1),
(4, 'Trong Javascript sự kiện Onclick thực hiện khi nào?', '1', 1),
(40, '1+1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subject`
--

CREATE TABLE `tb_subject` (
  `id_subject` int(11) NOT NULL,
  `name_subject` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `id_pack_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_subject`
--

INSERT INTO `tb_subject` (`id_subject`, `name_subject`, `year`, `id_pack_subject`) VALUES
(1, 'Kỹ thuật lập trình', '2018', 1),
(2, 'Lập trình Web', '2018', 1),
(3, 'kỹ thuật lập trình', '2018', 1),
(4, 'Đồ án', '2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_teaching`
--

CREATE TABLE `tb_teaching` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_teaching`
--

INSERT INTO `tb_teaching` (`id`, `id_user`, `id_subject`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pack_subject` int(11) NOT NULL,
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `address`, `phone`, `gender`, `id_pack_subject`, `account`, `password`) VALUES
(2, 'Nguyễn Văn A', 'An Hòa, Ninh Kiều', '0774141425', 'Nam', 1, 'admin', '123456'),
(3, 'Nguyễn Thị B', 'An Hòa, Ninh Kiều', '077457667', 'Nữ', 3, 'dat123', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `td_exam`
--

CREATE TABLE `td_exam` (
  `id` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `td_exam`
--

INSERT INTO `td_exam` (`id`, `id_exam`, `id_subject`, `id_question`) VALUES
(1, 123, 1, 1),
(2, 123, 1, 2),
(3, 123, 1, 3),
(4, 123, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `tb_faculty`
--
ALTER TABLE `tb_faculty`
  ADD PRIMARY KEY (`id_faculty`);

--
-- Indexes for table `tb_pack_subject`
--
ALTER TABLE `tb_pack_subject`
  ADD PRIMARY KEY (`id_pack_subject`),
  ADD KEY `id_faculty` (`id_faculty`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `tb_subject`
--
ALTER TABLE `tb_subject`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_pack_subject` (`id_pack_subject`);

--
-- Indexes for table `tb_teaching`
--
ALTER TABLE `tb_teaching`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_faculty` (`id_pack_subject`);

--
-- Indexes for table `td_exam`
--
ALTER TABLE `td_exam`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_question` (`id_question`),
  ADD KEY `id_subject` (`id_subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_answer`
--
ALTER TABLE `tb_answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_faculty`
--
ALTER TABLE `tb_faculty`
  MODIFY `id_faculty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pack_subject`
--
ALTER TABLE `tb_pack_subject`
  MODIFY `id_pack_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_subject`
--
ALTER TABLE `tb_subject`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_teaching`
--
ALTER TABLE `tb_teaching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `td_exam`
--
ALTER TABLE `td_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD CONSTRAINT `tb_answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `tb_question` (`id_question`);

--
-- Constraints for table `tb_pack_subject`
--
ALTER TABLE `tb_pack_subject`
  ADD CONSTRAINT `tb_pack_subject_ibfk_1` FOREIGN KEY (`id_faculty`) REFERENCES `tb_faculty` (`id_faculty`);

--
-- Constraints for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD CONSTRAINT `tb_question_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `tb_subject` (`id_subject`);

--
-- Constraints for table `tb_subject`
--
ALTER TABLE `tb_subject`
  ADD CONSTRAINT `tb_subject_ibfk_1` FOREIGN KEY (`id_pack_subject`) REFERENCES `tb_pack_subject` (`id_pack_subject`);

--
-- Constraints for table `tb_teaching`
--
ALTER TABLE `tb_teaching`
  ADD CONSTRAINT `tb_teaching_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_teaching_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `tb_subject` (`id_subject`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_pack_subject`) REFERENCES `tb_pack_subject` (`id_pack_subject`);

--
-- Constraints for table `td_exam`
--
ALTER TABLE `td_exam`
  ADD CONSTRAINT `td_exam_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `tb_question` (`id_question`),
  ADD CONSTRAINT `td_exam_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `tb_subject` (`id_subject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
