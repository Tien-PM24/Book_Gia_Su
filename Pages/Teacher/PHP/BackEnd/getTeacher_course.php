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
if (mysqli_num_rows($result) > 0) {
    // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='course'>";
        echo '<p class="pshow"><strong>Hình ảnh</strong><br><img src="' . $row['Image'] . '"width =100 height=100></p>';
        echo "<p class='pshow'><strong>Tên khóa học:</strong> " . $row["Name"] . "</p>";
        echo "<p class='pshow'><strong>Giá:</strong> " . $row["Price"] . "</p>";
        echo "<p class='pshow'><strong>Mô tả:</strong> " . $row["Body"] . "</p>";
        echo "</div>";
    }
} else {
    echo "Không có kết quả";
}
// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>