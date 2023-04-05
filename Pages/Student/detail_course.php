<?php

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tutors";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    // Lấy ID khóa học từ URL
    $course_id = $_GET["ID_course"];

    // Lấy thông tin khóa học từ cơ sở dữ liệu
    // $sql = "SELECT * FROM course WHERE ID_course = " . $course_id;
    $sql="SELECT course.*, student.*, student_course.*
    FROM course
    INNER JOIN student_course ON course.ID_course = student_course.ID_course
    INNER JOIN student ON student.ID_student = student_course.ID_student
    WHERE course.ID_course =" .$id_course;
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);

    // Hiển thị thông tin khóa học
    echo '<div class="course">';
    echo '<h1>' . $row["Name"] . '</h1>';
    // echo '<img src="' . $row["Image"] . '" alt="' . $row["Name"] . '">';
    echo '<p>' . $row["Body"] . '</p>';
    echo '<p>Giá: ' . number_format($row["Price"]) . ' VNĐ</p>';
    echo '<form method="post" action="buy_course.php">';
    echo '<input type="hidden" name="course_id" value="' . $row["ID_course"] . '">';
    echo '<button type="submit">Mua khóa học</button>';
    echo '</form>';
    echo '</div>';

    // Đóng kết nối
    mysqli_close($conn);
?>
