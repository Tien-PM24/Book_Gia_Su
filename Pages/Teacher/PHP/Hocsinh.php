<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Styles/inc_styles/style_header.css">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    table tr,
    th,
    td {
        border: 1px solid black;
        text-align: center;
    }

    td {
        width: 200px;
    }

    th {
        background-color: pink;
    }
</style>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="https://tse4.mm.bing.net/th?id=OIP.UIl5PdH-asehiLGe3yppwgHaEs&pid=Api&P=0" alt="" width="100"></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="Giasu.php">Gia sư</a></li>
                <li><a href="Khoahoc.php">Khóa học</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Học sinh đang theo học</h2>
        <table>
            <tr>
                <th>Tên sinh viên</th>
                <th>Email</th>
            </tr>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "book_tutor";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                }

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
            } ?>
        </table>
    </div>
</body>

</html>