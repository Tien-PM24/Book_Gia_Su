-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 05, 2023 lúc 03:44 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_tutor`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(11) NOT NULL,
  `Full_name` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID_admin`, `Full_name`, `Password`, `Email`, `Image`) VALUES
(1, 'Phan Thanh Lực', 'Luc@123?', 'phanthanhluc24@gmail.com', '../../../../Asset/Admin/handsome.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `ID_comment` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL,
  `Content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `ID_course` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Price` float NOT NULL,
  `Body` varchar(150) NOT NULL,
  `Image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`ID_course`, `Name`, `Price`, `Body`, `Image`) VALUES
(3, 'Vật lý 7', 2.3, 'Giáo viên: Hồ Văn ĐI', '../../../../Asset/Picture/Course/py.png'),
(5, 'Tiếng Anh', 4.45, 'Giáo viên: A Tiến', '../../../../Asset/Picture/Course/html.png'),
(6, 'Hóa Học', 345.987, 'Giáo Viên: A Thi', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `picture_stu`
--

CREATE TABLE `picture_stu` (
  `ID_student` int(11) NOT NULL,
  `ID_picture` int(11) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `picture_teacher`
--

CREATE TABLE `picture_teacher` (
  `ID_teacher` int(11) NOT NULL,
  `ID_picture` int(11) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `picture_teacher`
--

INSERT INTO `picture_teacher` (`ID_teacher`, `ID_picture`, `Image`) VALUES
(2, 1, '../../../../Asset/Picture/Teacher/luc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
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
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`ID_student`, `Full_name`, `Email`, `Password`, `Job_title`, `Address`) VALUES
(1, 'Phan Thanh Lực', 'luc.phan24@student.passerellesnumeriques.org', 'Luc@123?', 'Student', 'Đakrong-Quảng Trị'),
(2, 'Đinh Ngọc Sơn', 'son.dinh24@student.passerellesnumeriques.org', '24232345346', 'Student', 'Quảng Trạch-Quảng Bình'),
(3, 'Nguyễn Văn Biên', 'bien.nguyen24@student.passerellesnumeriques.org', 'BienyeuBich', 'Student', 'Đakrong-Quảng Trị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_teacher`
--

CREATE TABLE `student_teacher` (
  `ID_student` int(11) NOT NULL,
  `ID_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `student_teacher`
--

INSERT INTO `student_teacher` (`ID_student`, `ID_teacher`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stu_comment`
--

CREATE TABLE `stu_comment` (
  `ID_student` int(11) NOT NULL,
  `ID_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stu_course`
--

CREATE TABLE `stu_course` (
  `ID_course` int(11) NOT NULL,
  `ID_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
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
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`ID_teacher`, `Full_name`, `Email`, `Password`, `Job_title`, `Address`) VALUES
(1, 'Võ Thị Thúy Hà', 'ha.vo24@student.passerellesnumeriques.org', 'hayeutrung', 'Teacher', 'Quảng Trạch-Quảng Bình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher_course`
--

CREATE TABLE `teacher_course` (
  `ID_teacher` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher_course`
--

INSERT INTO `teacher_course` (`ID_teacher`, `ID_course`) VALUES
(1, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_comment`),
  ADD KEY `ID_course` (`ID_course`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID_course`);

--
-- Chỉ mục cho bảng `picture_stu`
--
ALTER TABLE `picture_stu`
  ADD PRIMARY KEY (`ID_picture`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Chỉ mục cho bảng `picture_teacher`
--
ALTER TABLE `picture_teacher`
  ADD PRIMARY KEY (`ID_picture`),
  ADD KEY `ID_teacher` (`ID_teacher`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID_student`);

--
-- Chỉ mục cho bảng `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD KEY `ID_teacher` (`ID_teacher`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Chỉ mục cho bảng `stu_comment`
--
ALTER TABLE `stu_comment`
  ADD KEY `ID_comment` (`ID_comment`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Chỉ mục cho bảng `stu_course`
--
ALTER TABLE `stu_course`
  ADD KEY `ID_course` (`ID_course`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID_teacher`);

--
-- Chỉ mục cho bảng `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD KEY `ID_teacher` (`ID_teacher`),
  ADD KEY `ID_course` (`ID_course`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `ID_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `picture_stu`
--
ALTER TABLE `picture_stu`
  MODIFY `ID_picture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `picture_teacher`
--
ALTER TABLE `picture_teacher`
  MODIFY `ID_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `ID_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `ID_course` FOREIGN KEY (`ID_course`) REFERENCES `course` (`ID_course`);

--
-- Các ràng buộc cho bảng `picture_stu`
--
ALTER TABLE `picture_stu`
  ADD CONSTRAINT `picture_stu_ibfk_1` FOREIGN KEY (`ID_student`) REFERENCES `student` (`ID_student`);

--
-- Các ràng buộc cho bảng `picture_teacher`
--
ALTER TABLE `picture_teacher`
  ADD CONSTRAINT `picture_teacher_ibfk_1` FOREIGN KEY (`ID_teacher`) REFERENCES `teacher` (`ID_teacher`);

--
-- Các ràng buộc cho bảng `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD CONSTRAINT `ID_teacher` FOREIGN KEY (`ID_teacher`) REFERENCES `teacher` (`ID_teacher`),
  ADD CONSTRAINT `student_teacher_ibfk_1` FOREIGN KEY (`ID_student`) REFERENCES `student` (`ID_student`);

--
-- Các ràng buộc cho bảng `stu_comment`
--
ALTER TABLE `stu_comment`
  ADD CONSTRAINT `ID_comment` FOREIGN KEY (`ID_comment`) REFERENCES `comment` (`ID_comment`),
  ADD CONSTRAINT `stu_comment_ibfk_1` FOREIGN KEY (`ID_student`) REFERENCES `student` (`ID_student`);

--
-- Các ràng buộc cho bảng `stu_course`
--
ALTER TABLE `stu_course`
  ADD CONSTRAINT `stu_course_ibfk_1` FOREIGN KEY (`ID_course`) REFERENCES `course` (`ID_course`),
  ADD CONSTRAINT `stu_course_ibfk_2` FOREIGN KEY (`ID_student`) REFERENCES `student` (`ID_student`);

--
-- Các ràng buộc cho bảng `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD CONSTRAINT `teacher_course_ibfk_1` FOREIGN KEY (`ID_teacher`) REFERENCES `teacher` (`ID_teacher`),
  ADD CONSTRAINT `teacher_course_ibfk_2` FOREIGN KEY (`ID_course`) REFERENCES `course` (`ID_course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
INSERT INTO teacher (Full_name, Email, Password, Job_title, Address)
VALUES 
('Nguyễn Văn Nhật', 'nguyenvana@example.com', 'password123', 'Giáo viên', 'Số 1 Đại Cồ Việt'),
('Trần Thị Bích', 'tranthib@example.com', '123456', 'Giáo viên', 'Số 2 Trần Duy Hưng'),
('Lê Minh Cúc', 'leminhc@example.com', 'password456', 'Giáo viên', 'Số 3 Lê Duẩn'),
('Phạm Văn Dinh', 'phamvand@example.com', '654321', 'Giáo viên', 'Số 4 Nguyễn Trãi'),
('Đỗ Thị Em', 'dothie@example.com', 'password789', 'Giáo viên', 'Số 5 Hàng Bài');



INSERT INTO student (Full_name, Email, Password, Job_title, Address)
VALUES 
('Nguyễn Thị Anh', 'nguyenthia@example.com', 'password123', 'Học sinh', 'Số 1 Đại Cồ Việt'),
('Trần Văn Bình', 'tranvanb@example.com', '123456', 'Học sinh', 'Số 2 Trần Duy Hưng'),
('Lê Thị Cảnh', 'lethic@example.com', 'password456', 'Học sinh', 'Số 3 Lê Duẩn'),
('Phạm Văn Dụ', 'phamvand@example.com', '654321', 'Học sinh', 'Số 4 Nguyễn Trãi'),
('Đỗ Thị Hà', 'dothie@example.com', 'password789', 'Học sinh', 'Số 5 Hàng Bài');

INSERT INTO course (Name, Price, Body, Image)
VALUES 
('Tiếng Anh', 100, 'Khóa học Tiếng Anh sẽ giúp bạn cải thiện kỹ năng ngôn ngữ và giao tiếp tiếng Anh một cách nhanh chóng và hiệu quả.', '../../../../Asset/Picture/Course/Sach-1.png'),
('Hóa Học', 150, 'Khóa học Lập trình giúp bạn tìm hiểu và làm quen với các ngôn ngữ lập trình phổ biến như Java, Python, C++ và các công cụ lập trình hiện đại.', '../../../../Asset/Picture/Course/Sach-2.png'),
('Vật Lý', 200, 'Khóa học Thiết kế đồ họa cung cấp kiến thức và kỹ năng cần thiết để thiết kế các sản phẩm đồ họa chuyên nghiệp.', '../../../../Asset/Picture/Course/Sach-3.png'),
('Ngữ Văn', 120, 'Khóa học Kinh doanh giúp bạn tìm hiểu về các nguyên tắc cơ bản của kinh doanh, từ quản lý tài chính đến tiếp thị và bán hàng.', '../../../../Asset/Picture/Course/Sach-4.png'),
('Tin Học', 80, 'Khóa học Marketing giúp bạn hiểu rõ hơn về quảng cáo, tiếp thị và xây dựng thương hiệu trong thời đại kỹ thuật số.', '../../../../Asset/Picture/Course/Sach-5.png');
--  Chèn 3 bảng đó trước sau đó lấy ID bỏ vô mấy bảng dưới
INSERT INTO picture_stu (ID_student,Image)
VALUES
(1,'../../../../Asset/Picture/Student/Hoc-Sinh-1'),
(2,'../../../../Asset/Picture/Student/Hoc-Sinh-2'),
(3,'../../../../Asset/Picture/Student/Hoc-Sinh-3'),
(4,'../../../../Asset/Picture/Student/Hoc-Sinh-4'),
(5,'../../../../Asset/Picture/Student/Hoc-Sinh-5');
-- Mọi người thay lại ID cho đúng theo thứ tự của bảng mình nhé. Vì mỗi Database có bạn xóa nhiều nên Lực sẽ cho tự điền.
INSERT INTO picture_teacher(ID_teacher,Image)
VALUES
(1,'../../../../Asset/Picture/Teacher/Teacher-1'),
(2,'../../../../Asset/Picture/Teacher/Teacher-2'),
(3,'../../../../Asset/Picture/Teacher/Teacher-3'),
(4,'../../../../Asset/Picture/Teacher/Teacher-4'),
(5,'../../../../Asset/Picture/Teacher/Teacher-5');
-- Mọi người thay lại ID cho đúng theo thứ tự của bảng mình nhé. Vì mỗi Database có bạn xóa nhiều nên Lực sẽ cho tự điền.
INSERT INTO comment (ID_course, content)
VALUES 
(1, 'Khóa học rất tuyệt vời!'), 
(2, 'Nội dung khóa học rất hữu ích'),
(3, 'Giảng viên rất tận tâm và nhiệt tình'),
(4, 'Khóa học không hợp lý với giá tiền'),
(5, 'Nội dung khóa học hơi khó hiểu đôi chút');
-- Mọi người thay lại ID cho đúng theo thứ tự của bảng mình nhé. Vì mỗi Database có bạn xóa nhiều nên Lực sẽ cho tự điền.

INSERT INTO teacher_course(ID_teacher,ID_course)
VALUES
(1,1),
(1,1),
(1,1),
(1,1),
(1,1);
-- Mọi người thay lại ID cho đúng theo thứ tự của bảng mình nhé. Vì mỗi Database có bạn xóa nhiều nên Lực sẽ cho tự điền.
INSERT INTO student_teacher(ID_student,ID_teacher)
VALUES
(1,1),
(1,1),
(1,1),
(1,1),
(1,1);
-- Mọi người thay lại ID cho đúng theo thứ tự của bảng mình nhé. Vì mỗi Database có bạn xóa nhiều nên Lực sẽ cho tự điền.

INSERT INTO stu_course(ID_course,ID_student)
VALUES
(1,1),
(1,1),
(1,1),
(1,1),
(1,1);
-- Mọi người thay lại ID cho đúng theo thứ tự của bảng mình nhé. Vì mỗi Database có bạn xóa nhiều nên Lực sẽ cho tự điền.
INSERT INTO stu_comment(ID_student,ID_comment)
VALUES
(1,1),
(1,1),
(1,1),
(1,1),
(1,1);

-- Mọi người thay lại ID cho đúng theo thứ tự của bảng mình nhé. Vì mỗi Database có bạn xóa nhiều nên Lực sẽ cho tự điền.