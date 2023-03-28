<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../Styles/inc_styles/style_header.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"> <img src="../../../images/logo (1).png" alt="" width="50"></a>
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
    </nav>
    <div class="container">
        <h2>Một số khóa học nổi bật</h2>
        <?php
        if(isset($_GET['id'])){
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
            // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
            while ($row = mysqli_fetch_assoc($result) and $row1 = mysqli_fetch_assoc($result1)) {
                echo "<div class='course'>";
                echo '<p><strong>Hình ảnh</strong><br><img src="' . $row['Image'] . '"width =100 height=100></p>';
                echo "<p><strong>Tên khóa học:</strong> " . $row["Name"] . "</p>";
                echo "<p><strong>Giá:</strong> " . $row["Price"] . "</p>";
                echo "<p><strong>Mô tả:</strong> " . $row["Body"] . "</p>";
                echo "<p><strong>Số học sinh đăng ký:</strong><a href='Hocsinh.php?id=" . $row["ID_course"] . "'> " . $row1["total_students"] . "</a></p>";
                echo "<button type='button' class='btn btn-danger' name='btn'>Add</button>";
                echo "</div>";
            }
        } else {
            echo "Không có kết quả";
        }
        // Đóng kết nối đến cơ sở dữ liệu
        mysqli_close($conn);
    }?>
    </div>
   
</body>

</html>