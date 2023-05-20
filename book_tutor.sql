

--
-- Database: `book_tutor`


CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `full_name`, `password`, `email`, `image`) VALUES
(1, 'Admin', 'Kingdom@123?', 'kingdomAdmin@gmail.com', '../../Public/Images/Admin/handsome.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `content` varchar(250) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `content`, `id_student`, `id_teacher`) VALUES
(1, 'hi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `body` varchar(150) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_course`, `name`, `price`, `body`, `image`) VALUES
(2, 'Toán 7', 1500000, 'Học xong khóa này sẽ giỏi ngay                            /12/3/2023-04-29/2023-05-31', 'toan72.jpg'),
(7, 'Vật lý 8', 13000000, 'Hãy học cùng thầy nào                            /12/2/2023-05-12/2023-06-09', 'ly8nc.jpg'),
(10, 'Vật lý 8', 575675, 'Hãy học ngay                            /12/2/2023-05-01/2023-06-04', 'ly8nc.jpg'),
(11, 'Toán 7', 13000000, 'Học xong các em có thể đi làm luôn                            /12/2/2023-05-01/2023-05-26', 'toan72.jpg'),
(12, 'Sinh Học 9', 16000000, 'Cô sẽ giúp các em lên tầm cao mới                            /15/2/2023-05-07/2023-06-11', 'bgsinh9.jpg'),
(13, 'VậtLý 9', 17000000, 'Học với thầy thì chỉ có giỏi mà thôi                            /10/2/2023-05-01/2023-06-04', 'vatly91.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `payment_day` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `id_student`, `id_course`, `price`, `payment_day`) VALUES
(24, 16, 2, '1500000', '2023-05-19 22:21:08'),
(25, 15, 12, '16000000', '2023-05-19 22:27:58'),
(26, 15, 13, '17000000', '2023-05-19 22:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `picture_stu`
--

CREATE TABLE `picture_stu` (
  `id_student` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `picture_stu`
--

INSERT INTO `picture_stu` (`id_student`, `id_picture`, `image`) VALUES
(1, 1, 'du.jpg'),
(13, 3, 'huong.jpg'),
(15, 4, 'tuyen.jpg'),
(8, 6, 'luan.jpg'),
(16, 11, 'handsome.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `picture_teacher`
--

CREATE TABLE `picture_teacher` (
  `id_teacher` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `picture_teacher`
--

INSERT INTO `picture_teacher` (`id_teacher`, `id_picture`, `image`) VALUES
(1, 1, 'vien.jpg'),
(11, 4, 'tu.jpg'),
(14, 7, 'nai.jpg'),
(15, 8, 'thu.jpg'),
(16, 9, 'di.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_student` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `job_title` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `is_locked` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_student`, `full_name`, `email`, `password`, `job_title`, `address`, `is_locked`) VALUES
(1, 'A Du', 'du.a24@student.passerellesnumeriques.org', 'Du@1234?', 'student', 'Kon-Tum', 0),
(8, 'Luân Lê', 'luan.le24@student.passerellesnumeriques.org', 'Luan@123?', 'student', 'Bình Định-Quy Nhơn', 0),
(13, 'Phan Thị Thu Hương', 'huong.phan24@student.passerellesnumeriques.org', 'Huong@123?', 'student', 'Quảng Bình', 0),
(15, 'Cao Tuyến', 'tuyen.cao24@student.passerellesnumeriques.org', 'Tuyen@123?', 'student', 'Đakrong-Quảng Bình', 0),
(16, 'Phan Thanh Lực', 'luc.phan24@student.passerellesnumeriques.org', 'Luc@123?', 'student', 'Đakrong-Quảng Trị', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_teacher`
--

CREATE TABLE `student_teacher` (
  `id_student` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_teacher`
--

INSERT INTO `student_teacher` (`id_student`, `id_teacher`) VALUES
(16, 1),
(15, 15),
(15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id_teacher` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `job_title` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `full_name`, `email`, `password`, `job_title`, `address`) VALUES
(1, 'Nguyễn Thị Út Viên', 'vien.nguyen24@student.passerellesnumeriques.org', 'Vien@123?', 'teacher', 'Bình Định-Việt Nam'),
(11, 'A An Tứ', 'tu.a24@student.passerellesnumeriques.org', 'Tu@1234?', 'teacher', 'Kon-Tum'),
(14, 'Đặng Mùi Nái', 'nai.dang24@student.passerellesnumeriques.org', 'Nai@123?', 'teacher', 'Cao Bằng-Viêt Nam'),
(15, 'Phan Trần Anh Thư', 'thu.phan24@student.passerellesnumeriques.org', 'Thu@123?', 'teacher', 'Bình Thuận'),
(16, 'Hồ Văn Đi', 'di.ho24@student.passerellesnumeriques.org', 'Di@1234?', 'teacher', 'Hướng Hóa-Quảng Trị');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE `teacher_course` (
  `id_teacher` int(11) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_course`
--

INSERT INTO `teacher_course` (`id_teacher`, `id_course`) VALUES
(1, 2),
(11, 7),
(1, 10),
(14, 11),
(15, 12),
(16, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `ID_student` (`id_student`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `picture_stu`
--
ALTER TABLE `picture_stu`
  ADD PRIMARY KEY (`id_picture`),
  ADD KEY `ID_student` (`id_student`);

--
-- Indexes for table `picture_teacher`
--
ALTER TABLE `picture_teacher`
  ADD PRIMARY KEY (`id_picture`),
  ADD KEY `ID_teacher` (`id_teacher`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`);

--
-- Indexes for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD KEY `ID_teacher` (`id_teacher`),
  ADD KEY `ID_student` (`id_student`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indexes for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD KEY `ID_teacher` (`id_teacher`),
  ADD KEY `ID_course` (`id_course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `picture_stu`
--
ALTER TABLE `picture_stu`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `picture_teacher`
--
ALTER TABLE `picture_teacher`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `id_course` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`),
  ADD CONSTRAINT `id_student` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Constraints for table `picture_stu`
--
ALTER TABLE `picture_stu`
  ADD CONSTRAINT `picture_stu_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Constraints for table `picture_teacher`
--
ALTER TABLE `picture_teacher`
  ADD CONSTRAINT `picture_teacher_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`);

--
-- Constraints for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD CONSTRAINT `ID_teacher` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`),
  ADD CONSTRAINT `student_teacher_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Constraints for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD CONSTRAINT `teacher_course_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`),
  ADD CONSTRAINT `teacher_course_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
