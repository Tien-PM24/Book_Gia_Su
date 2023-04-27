<?php
// Kết nối đến database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutors";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Lấy thông tin học sinh từ session hoặc biến POST
$id_student = $_SESSION['ID_student']; // Thay thế bằng biến tương ứng nếu sử dụng biến POST

// Lấy thông tin khóa học từ biến POST
$id_course = $_POST['ID_course'];

// Lấy thông tin giáo viên dạy từ bảng teacher
$sql_teacher = "SELECT name FROM teacher WHERE id_teacher = (SELECT id_teacher FROM course WHERE id_course = $id_course)";
$result_teacher = mysqli_query($conn, $sql_teacher);
$row_teacher = mysqli_fetch_assoc($result_teacher);
$teacher_name = $row_teacher['name'];

// Thêm thông tin vào bảng student_course
$sql_insert = "INSERT INTO student_course (id_student, id_course, teacher_name) VALUES ($id_student, $id_course, '$teacher_name')";
$result_insert = mysqli_query($conn, $sql_insert);

if ($result_insert) {
    echo "Mua khóa học thành công!";
} else {
    echo "Mua khóa học thất bại!";
}

mysqli_close($conn);
?>
