<html>
    <head>
        <link rel="stylesheet" href="../../styles/Log/login_form.css">
    </head>
    <body>
        <div class="container">
            <div class="login-left">
                <div class="login-header">
                    <h2>Chào mừng quý khách đến với <span>Web KingDom</span> </h2>
                    <p>Đăng nhập</p>
                </div>
                <div class="login-form">
                    <div class="login-form-content">
                        <div class="form-item">
                            <label for="email">Enter Email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="form-item">
                            <label for="password">Enter Password</label>
                            <input type="password" name="mk" id="password">
                            <i class="toggle-password fas fa-eye"></i>
                        </div>
                        <div class="form-item">
                            <div class="checkbox">
                                <input type="checkbox" name="" id="rememberMecheckbox" checked>
                                <label for="rememberMecheckbox" class="checkboxLabel">Remenber me</label>
                            </div>
                        </div>
                        <button type="submit" name ="btn">SIGN IN</button>
                    </div>
                    <div class="login-form-footer">
                    <a href="https://www.facebook.com">
                        <img src="https://www.verfvanniveau.nl/wp-content/uploads/2019/08/logo-social-fb-facebook-icon.png" alt="" width="30">Facebook login
                    </a>
                    <a href="#">
                        <img src="../../images/GG.png" alt="" width="30">Google login
                    </a><br>
                </div>
                </div>            
            </div>
            <div class="login-right">
                <img class="img-right" src="https://unnombrex.neocities.org/Cobay/alumnos.gif" alt="">
            </div>
        </div>

        <?php 
            include './Database/conn.php';
            if (isset($_POST["btn"])) {
            $tk = $_POST["email"];
            $mk = $_POST["mk"];
            if (!$mk || !$tk)
            {
                echo "Vui lòng nhập đầy đủ thông tin. <a href='login.php'>Trở lại</a>";
                exit;
            }
            $ketnoi = mysqli_connect("localhost", "root", "", "book_tutor") or die("connect fail!");
            $sql = "SELECT * FROM student WHERE Email= '$tk' AND Passwork ='$mk'";
            $result = mysqli_query($ketnoi, $sql);

            if (mysqli_num_rows($result) != 1){
                    echo "<script> alert('Sai tài khoản đăng nhập hoặc sai mật khẩu') </script>";
            }

            if (mysqli_num_rows($result) == 1) {
                header("Location: https://www.youtube.com/");
                exit();
            } 
            mysqli_close($ketnoi);
            }
        ?>

    </body>
</html>