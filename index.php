<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Styles/Log/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container">
        <div class="login-left">
            <div class="login-header">
                <h2>We're delighted to welcome you to<span> KingDom</span> </h2>
                <p>Log in now to get a good-quality and affordable course</p>
            </div>
            <div class="login-form">
                <form id="sign-up-form" method="post" action="" enctype="multipart/form-data">
                    <div class="login-form-content">
                        <div class="form-item">
                            <label for="email">Enter email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="form-item">
                            <label for="password">Enter password</label>
                            <input type="password" name="password" id="password">
                            <i class="toggle-password fas fa-eye"></i>
                        </div>
                        <div class="form-item">
                            <div class="checkbox">
                                <input type="checkbox" name="" id="rememberMecheckbox" checked>
                                <label for="rememberMecheckbox" class="checkboxLabel">Remenber me</label>
                            </div>
                        </div>
                        <button type="submit" name="btn">SIGN IN</button>
                    </div>
                </form>
                <div class="forget-password_and_create_newaccount">
                    <a id="forget-password" href="#">Forget password?</a>
                    <a id="create-account" href="./Views/Log/register.php">Create account?</a>
                </div>
                <div class="login-form-footer">
                    <a href="https://www.facebook.com">
                        <img src="https://www.verfvanniveau.nl/wp-content/uploads/2019/08/logo-social-fb-facebook-icon.png" alt="" width="30">Facebook login
                    </a>
                    <a href="#"><img src="./Asset/images/GG.png" alt="" width="30">Google login
                    </a>
                </div>
            </div>
        </div>
        <div class="login-right">
            <img class="img-right" src="https://unnombrex.neocities.org/Cobay/alumnos.gif" alt="">
        </div>
    </div>
    </div>
</body>
<?php
if (!isset($_SESSION['user'])) $_SESSION['user'] = [];
include "Database/connectBS.php";
error_reporting(0);
if (isset($_POST["btn"])) {
    $accout = $_POST["email"];
    $password = $_POST["password"];
    if ($password !="" && $accout !="") {
        $sqlstu = "SELECT * from student";
        $sqlteach = "SELECT * from teacher";
        $sqladmin = "SELECT * from admin";

        $stm1 = mysqli_query($conn, $sqlstu);
        $stm2 = mysqli_query($conn, $sqlteach);
        $stm3 = mysqli_query($conn, $sqladmin);
// Lọc qua bảng student
        while ($row = mysqli_fetch_assoc($stm1)) {
            if ($accout == $row['email'] && $password == $row['password']) {

                $_SESSION['user'] = $accout;
                $emailUser = $_SESSION['user'];
                if ($emailUser == $row['email']) {
                    $id = $row['id_student'];
                    $sql2 = "SELECT * FROM picture_stu WHERE id_student = '$id'";
                    $stm2 = mysqli_query($conn, $sql2);
                    $picture_stu = mysqli_fetch_assoc($stm2);
                    if (!$picture_stu) {

                        $sql1 = "INSERT INTO picture_stu (id_student, image) VALUES ('$id', 'icon.png')";
                        $stm3 = mysqli_query($conn, $sql1);
                    }
                    header("location:./Views/Home/index.php");
                    exit;
                }
            }
        }
// Lọc qua bảng teacher
        while ($row = mysqli_fetch_assoc($stm2)) {
            if ($accout == $row['email'] && $password == $row['password']) {
                $_SESSION['user'] = $accout;
                $emailUser = $_SESSION['user'];
                if ($emailUser == $row['email']) {
                    $id = $row['id_teacher'];
                    $sql2 = "SELECT * FROM picture_teacher WHERE id_teacher = '$id'";
                    $stm2 = mysqli_query($conn, $sql2);
                    $picture_stu = mysqli_fetch_assoc($stm2);
                    if (!$picture_stu) {
                        $sql1 = "INSERT INTO picture_teacher (id_teacher, image) VALUES ('$id', 'icon.png')";
                        $stm3 = mysqli_query($conn, $sql1);
                    }
                    header("location:./Views/Home/index.php");
                    exit;
                }
            }
        }
// Lọc qua bảng Admin
        while ($row = mysqli_fetch_assoc($stm3)) {
            if ($accout == $row['email'] && $password == $row['password']) {
                header("location:./Views/Admin/index.php");
                $_SESSION['user'] = $accout;
                $emailUser = $_SESSION['user'];
            }
        }
        // nếu tài khoản và mật khẩu không trùng với bất kỳ tài khoản nào trong cơ sở dữ liệu
        echo "<script>swal.fire('lỗi!','Sai tài khoản đăng nhập hoặc sai mật khẩu','error') </script>";
    } else {
        echo "<script>swal.fire('lỗi!','Vui lòng nhập đầy đủ thông tin','error') </script>";
    }
}
?>