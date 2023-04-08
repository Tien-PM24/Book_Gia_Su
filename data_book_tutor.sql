CREATE TABLE student (
ID INT AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(50),
Jobtitle	VARCHAR(50),	
Address	VARCHAR(255),	
Phone	VARCHAR(15),	
Email	VARCHAR(150),	
Password	VARCHAR(15)	
);

CREATE TABLE teacher (
ID INT AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(50),
Jobtitle	VARCHAR(50),	
Address	VARCHAR(255),	
Phone	VARCHAR(15),	
Email	VARCHAR(150),	
Password	VARCHAR(15)	
);

CREATE TABLE `admin` (
  `ID_admin` int(11) NOT NULL,
  `Full_name` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `comment` (
  `ID_comment` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL,
  `Content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `course` (
  `ID_course` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Price` float NOT NULL,
  `Body` varchar(150) NOT NULL,
  `Image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `teacher_course` (
  `ID_teacher` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `stu_course` (
  `ID_course` int(11) NOT NULL,
  `ID_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `stu_comment` (
  `ID_student` int(11) NOT NULL,
  `ID_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `student_teacher` (
  `ID_student` int(11) NOT NULL,
  `ID_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `picture_teacher` (
  `ID_teacher` int(11) NOT NULL,
  `ID_picture` int(11) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `picture_stu` (
  `ID_student` int(11) NOT NULL,
  `ID_picture` int(11) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;










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