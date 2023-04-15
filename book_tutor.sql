-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 06:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(11) NOT NULL,
  `Full_name` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_admin`, `Full_name`, `Password`, `Email`, `Image`) VALUES
(2, 'A Tiến', '12345678', 'tien@gmail.com', '../../../../Asset/Picture/Admin/Screenshot 2023-02-26 180634.png');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID_comment` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL,
  `Content` varchar(250) NOT NULL,
  `ID_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID_course` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Price` float NOT NULL,
  `Body` varchar(150) NOT NULL,
  `Image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID_course`, `Name`, `Price`, `Body`, `Image`) VALUES
(1, 'Tiếng Anh 7', 100, 'Khóa học Tiếng Anh sẽ giúp bạn cải thiện kỹ năng ngôn ngữ và giao tiếp tiếng Anh một cách nhanh chóng và hiệu quả.', 'English7.jpg'),
(8, 'Địa Lý 12', 150, 'Khóa học để cải thiện C00', 'DiaLy12.jpg'),
(9, 'Tin Học 12', 200, 'Khóa học Thiết kế đồ họa cung cấp kiến thức và kỹ năng cần thiết để thiết kế các sản phẩm đồ họa chuyên nghiệp.', 'TinHoc12.jpg'),
(10, 'Vật Lý 11', 120, 'Khóa học Kinh doanh giúp bạn tìm hiểu về các nguyên tắc cơ bản của kinh doanh, từ quản lý tài chính đến tiếp thị và bán hàng.', 'VatLy11.jpg'),
(11, 'Sinh Học 12', 80, 'Khóa học Marketing giúp bạn hiểu rõ hơn về quảng cáo, tiếp thị và xây dựng thương hiệu trong thời đại kỹ thuật số.', 'Sinh12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `picture_stu`
--

CREATE TABLE `picture_stu` (
  `ID_student` int(11) NOT NULL,
  `ID_picture` int(11) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `picture_stu`
--

INSERT INTO `picture_stu` (`ID_student`, `ID_picture`, `Image`) VALUES
(4, 3, 'user.png'),
(11, 4, 'user.png'),
(9, 5, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `picture_teacher`
--

CREATE TABLE `picture_teacher` (
  `ID_teacher` int(11) NOT NULL,
  `ID_picture` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `picture_teacher`
--

INSERT INTO `picture_teacher` (`ID_teacher`, `ID_picture`, `images`) VALUES
(5, 4, 'Tutor2.jpg'),
(6, 5, 'tutor2.jpg'),
(7, 6, 'tutor3.jpg'),
(8, 7, 'tutor4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID_student` int(11) NOT NULL,
  `Full_name` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Job_title` varchar(150) NOT NULL,
  `Address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID_student`, `Full_name`, `Email`, `Password`, `Job_title`, `Address`) VALUES
(4, 'Nguyễn Thị Anh', 'nguyenthia@example.com', 'password123', 'Học sinh', 'Số 1 Đại Cồ Việt'),
(5, 'Trần Văn Bình', 'tranvanb@example.com', '123456', 'Học sinh', 'Số 2 Trần Duy Hưng'),
(6, 'Lê Thị Cảnh', 'lethic@example.com', 'password456', 'Học sinh', 'Số 3 Lê Duẩn'),
(7, 'Phạm Văn Dụ', 'phamvand@example.com', '654321', 'Học sinh', 'Số 4 Nguyễn Trãi'),
(8, 'Đỗ Thị Hà', 'dothie@example.com', 'password789', 'Học sinh', 'Số 5 Hàng Bài'),
(9, 'A TIEN', 'tien@gmail.com', 'Luc@123?', 'student', 'Kon Tum'),
(10, 'A TIẾN', 'tien.a24@gmail.com', '12345678sS!', 'student', 'Kon Tum'),
(11, 'A Tiến', 'tien.ok24@gmail.com', '12345678Pm*', 'student', 'Kon Tum');

-- --------------------------------------------------------

--
-- Table structure for table `student_teacher`
--

CREATE TABLE `student_teacher` (
  `ID_student` int(11) NOT NULL,
  `ID_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stu_course`
--

CREATE TABLE `stu_course` (
  `ID_course` int(11) NOT NULL,
  `ID_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `ID_teacher` int(11) NOT NULL,
  `Full_name` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Job_title` varchar(150) NOT NULL,
  `Address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID_teacher`, `Full_name`, `Email`, `Password`, `Job_title`, `Address`) VALUES
(5, 'Trần Thị Bích', 'tranthib@example.com', '123456', 'Giáo viên', 'Số 2 Trần Duy Hưng'),
(6, 'Lê Minh Cúc', 'leminhc@example.com', 'password456', 'Giáo viên', 'Số 3 Lê Duẩn'),
(7, 'Phạm Văn Dinh', 'phamvand@example.com', '654321', 'Giáo viên', 'Số 4 Nguyễn Trãi'),
(8, 'Đỗ Thị Em', 'dothie@example.com', 'password789', 'Giáo viên', 'Số 5 Hàng Bài');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE `teacher_course` (
  `ID_teacher` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_course`
--

INSERT INTO `teacher_course` (`ID_teacher`, `ID_course`) VALUES
(5, 1),
(5, 9),
(5, 8),
(5, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_comment`),
  ADD KEY `ID_course` (`ID_course`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID_course`);

--
-- Indexes for table `picture_stu`
--
ALTER TABLE `picture_stu`
  ADD PRIMARY KEY (`ID_picture`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Indexes for table `picture_teacher`
--
ALTER TABLE `picture_teacher`
  ADD PRIMARY KEY (`ID_picture`),
  ADD KEY `ID_teacher` (`ID_teacher`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID_student`);

--
-- Indexes for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD KEY `ID_teacher` (`ID_teacher`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Indexes for table `stu_course`
--
ALTER TABLE `stu_course`
  ADD KEY `ID_course` (`ID_course`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID_teacher`);

--
-- Indexes for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD KEY `ID_teacher` (`ID_teacher`),
  ADD KEY `ID_course` (`ID_course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ID_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `picture_stu`
--
ALTER TABLE `picture_stu`
  MODIFY `ID_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `picture_teacher`
--
ALTER TABLE `picture_teacher`
  MODIFY `ID_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `ID_course` FOREIGN KEY (`ID_course`) REFERENCES `course` (`ID_course`),
  ADD CONSTRAINT `ID_student` FOREIGN KEY (`ID_student`) REFERENCES `student` (`ID_student`);

--
-- Constraints for table `picture_stu`
--
ALTER TABLE `picture_stu`
  ADD CONSTRAINT `picture_stu_ibfk_1` FOREIGN KEY (`ID_student`) REFERENCES `student` (`ID_student`);

--
-- Constraints for table `picture_teacher`
--
ALTER TABLE `picture_teacher`
  ADD CONSTRAINT `picture_teacher_ibfk_1` FOREIGN KEY (`ID_teacher`) REFERENCES `teacher` (`ID_teacher`);

--
-- Constraints for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD CONSTRAINT `ID_teacher` FOREIGN KEY (`ID_teacher`) REFERENCES `teacher` (`ID_teacher`),
  ADD CONSTRAINT `student_teacher_ibfk_1` FOREIGN KEY (`ID_student`) REFERENCES `student` (`ID_student`);

--
-- Constraints for table `stu_course`
--
ALTER TABLE `stu_course`
  ADD CONSTRAINT `stu_course_ibfk_1` FOREIGN KEY (`ID_course`) REFERENCES `course` (`ID_course`),
  ADD CONSTRAINT `stu_course_ibfk_2` FOREIGN KEY (`ID_student`) REFERENCES `student` (`ID_student`);

--
-- Constraints for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD CONSTRAINT `teacher_course_ibfk_1` FOREIGN KEY (`ID_teacher`) REFERENCES `teacher` (`ID_teacher`),
  ADD CONSTRAINT `teacher_course_ibfk_2` FOREIGN KEY (`ID_course`) REFERENCES `course` (`ID_course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
