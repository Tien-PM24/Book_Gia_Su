<?php
//Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_tutor";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Thực hiện truy vấn đến cơ sở dữ liệu
$sql = "SELECT * FROM teacher";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='teacher'>";
        echo "<p><strong>Họ và tên:</strong> " . $row["Full_name"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["Email"] . "</p>";
        echo "<p><strong>Password:</strong> " . $row["Password"] . "</p>";
        echo "<p><strong>Vị trí:</strong> " . $row["Job_title"] . "</p>";
        echo "</div>";
    }
} else {
    echo "Không có kết quả";
};
?>