<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../../../Styles/inc_styles/style_header.css">
<link rel="stylesheet" href="./style_student.css">

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="../../../images/logo (1).png" alt="" width="100"></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="teacher.php">Gia sư</a></li>
                <li><a href="course.php">Khóa học</a></li>
                <li><a href="#">Liên hệ</a></li>
                <a href="" class="personal-file"><img src="../../../images/people.png" alt="" width="50"></a>
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
            <?php include '../BackEnd/get_student.php' ?>
        </table>
    </div>
</body>

</html>