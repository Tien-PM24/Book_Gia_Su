<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "book_tutor";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }
      
        $sql = "SELECT * FROM course";
        $result = mysqli_query($conn, $sql);

        $sql1 = "SELECT COUNT(ID_student) AS total_students FROM stu_course WHERE ID_course = 1;";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result) and $row1 = mysqli_fetch_assoc($result1)) {
                echo "<div class='course'>";
                echo '<p><strong>Hình ảnh</strong><br><img src="' . $row['Image'] . '"width =100 height=100></p>';
                echo "<p><strong>Tên khóa học:</strong> " . $row["Name"] . "</p>";
                echo "<p><strong>Giá:</strong> " . $row["Price"] . "</p>";
                echo "<p><strong>Mô tả:</strong> " . $row["Body"] . "</p>";
                echo "<p><strong>Số học sinh đăng ký:</strong><a href='student.php?id=" . $row["ID_course"] . "'> " . $row1["total_students"] . "</a></p>";
                echo "</div>";
            }
        } else {
            echo "Không có kết quả";
        }
        mysqli_close($conn);
?>