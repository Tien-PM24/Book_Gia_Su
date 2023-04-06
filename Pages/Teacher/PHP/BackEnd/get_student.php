<?php
if (isset($_GET['id'])) {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "book_tutor";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }
    $id = $_GET['id'];
    $sql = "SELECT Full_name, Email from stu_course,student where student.ID_student = stu_course.ID_student and ID_course= '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
        while ($row = mysqli_fetch_assoc($result)) {
            echo  "<tr>";
            echo "<td>" . $row['Full_name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "Không có kết quả";
    }
    // Đóng kết nối đến cơ sở dữ liệu
    mysqli_close($conn);
}
?>