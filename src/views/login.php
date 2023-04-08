<html>
    <head>
        <link rel="stylesheet" href="../../styles/Log/login_form.css">
    </head>
</html>
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
                            <label for="email">Enter Email</label>
                            <input type="text" name="email" id="email"  value="<?php echo $_POST['email'] ?>">
                        </div>
                        <div class="form-item">
                            <label for="password">Enter Password</label>
                            <input type="password" name="password" id="password"  value="<?php echo $_POST['password'] ?>">
                            <i class="toggle-password fas fa-eye"></i>
                        </div>
                        <div class="form-item">
                            <div class="checkbox">
                                <input type="checkbox" name="" id="rememberMecheckbox" checked>
                                <label for="rememberMecheckbox" class="checkboxLabel">Remenber me</label>
                            </div>
                        <button type="submit" name="btn">SIGN IN</button>
                    </div>
                </form>
                <div class="forget-password_and_create_newaccount">
                    <a id="forget-password" href="#">Forget password?</a>
                    <a id="create-account" href="../../src/views/regester_form.php">Create account?</a>
                </div>
                <div class="login-form-footer">
                    <a href="https://www.facebook.com">
                        <img src="https://www.verfvanniveau.nl/wp-content/uploads/2019/08/logo-social-fb-facebook-icon.png" alt="" width="30">Facebook login
                    </a>
                    <a href="#">
                        <img src="../../Asset/images/GG.png" alt="" width="30">Google login
                </div>
            </div>
        </div>
    </div>

    <?php
    include './Database/conn.php'; 
    if (isset($_POST["btn"])) {
        $accout = $_POST["email"];
        $password = $_POST["password"];
        if (!$password || !$accout) {
            echo "<script> alert('Vui lòng nhập đây đủ thông tin') </script>";
            exit;
        }
        // lệnh undo cho phép để kết hợp kết quả truy vấn từ hai bảng student và teacher
        // user_type để phân biệt giữa tài khoản học sinh và giáo viên
        $sql = "SELECT * FROM (SELECT 'student' AS user_type, Email, Password, Full_name, Address, Job_title FROM student UNION SELECT 'teacher' AS user_type, Email, Password, Full_name, Address, Job_title FROM teacher) 
        AS users WHERE Email = '$accout' AND Password = '$password'";
        $result = mysqli_query($ketnoi, $sql);

        if (mysqli_num_rows($result) != 1) {
            echo "<script> alert('Sai tài khoản đăng nhập hoặc sai mật khẩu') </script>";
        }

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if ($user['user_type'] == 'student') {
                header("Location: https://www.youtube.com/");
                exit();
            } elseif ($user['user_type'] == 'teacher') {
                header("Location: https://www.google.com/");
                exit();
            }
        }

        mysqli_close($ketnoi);
    }
    ?>