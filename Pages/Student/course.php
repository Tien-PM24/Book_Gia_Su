<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "book_tutor";
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 if (!$conn) {
     die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
 }
    $sql = "SELECT * FROM student JOIN course";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
     while($row = mysqli_fetch_assoc($result)) {
    echo "<div>";
    echo "<div>";
    echo '<div class="img-course"><img src="'.$row['Image'] .'"width =300px height=300px></div>';
    echo "<div>". $row["Name"] ."</div>";
    echo "</div>";
    echo "</div>";
    }
    } else {
    echo "Không có kết quả";
    }
    // Đóng kết nối đến cơ sở dữ liệu
    mysqli_close($conn);
?>