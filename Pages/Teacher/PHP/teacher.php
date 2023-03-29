<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book tutor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../Styles/inc_styles/style_header.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "../../../inc/header.php"?>
<!--<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="https://tse4.mm.bing.net/th?id=OIP.UIl5PdH-asehiLGe3yppwgHaEs&pid=Api&P=0" alt="" width="100"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Trang chủ</a></li>
      <li><a href="teacher.php">Gia sư</a></li>
      <li><a href="course.php">Khóa học</a></li>
      <li><a href="#">Học sinh</a></li>
      <li><a href="#">Liên hệ</a></li>
      <a href="" class="personal-file"><img src="../../../images/people.png" alt="" width="50"></a>
    </ul>
  </div>
</nav>-->
    <div class="container">
     <h2>Thông tin cá nhân</h2>
        <?php
            // Kết nối đến cơ sở dữ liệu
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
                while($row = mysqli_fetch_assoc($result)) {
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
        <div class="course">
        <h2>Một số khóa học nổi bật</h2>
            <?php
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='course'>";
                    echo '<p><strong>Hình ảnh</strong><br><img src="'.$row['Image'] .'"width =100 height=100></p>';
                    echo "<p><strong>Tên khóa học:</strong> " . $row["Name"] . "</p>";
                    echo "<p><strong>Giá:</strong> " . $row["Price"] . "</p>";
                    echo "<p><strong>Mô tả:</strong> " . $row["Body"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "Không có kết quả";
            }
             // Đóng kết nối đến cơ sở dữ liệu
             mysqli_close($conn);
            ?>
    </div>
</div>

</body>
</html>
</body>
</html>