<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../Styles/inc_styles/style_header.css">
    <link rel="stylesheet" href="./style_course.css">
</head>
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
                <li><a href="teacher.php">Học sinh</a></li>
                <li><a href="#">Liên hệ</a></li>
                <a href="" class="personal-file"><img src="../../../images/people.png" alt="" width="50"></a>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Thông tin cá nhân</h2>
            <?php include '../BackEnd/get_teacher.php' ?>
        <h2>Khóa học của tôi</h2>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Add</button><br><br>
        <div class="grid-container">
            <?php include '../BackEnd/getTeacher_course.php' ?>
        </div>
    </div>
    <br>
    <div class="container">
        <!-- Modal -->
        <form method="post" enctype="multipart/form-data">
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #BC8F8F;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="font-size: 30px; color:aliceblue;">Thêm khóa học mới</h4>
                        </div>
                        <div class="modal-body">
                            <input class="inputthem" type="text" name="Name" placeholder="Nhập tên khóa học" required><br><br>
                            <input class="inputthem" type="text" name="Price" placeholder="Nhập giá tiền" required><br><br>
                            <input class="inputthem" type="text" name="Body" placeholder="Nhập mô tả khóa học" required><br><br>
                            Chọn hình ảnh: <input type="file" name="Image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="submit" name="btn" class="btn btn-warning">Done</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include '../BackEnd/formAdd_course.php' ?>
    </div>
</body>
</html>
</body>
</html>