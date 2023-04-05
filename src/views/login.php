<?php include "../../Database/conn.php" ?>
<html>
<<<<<<< HEAD
    <head>
        <link rel="stylesheet" href="../../styles/Log/login_form.css">
    </head>
    <body>

    <?php 
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
            
        <div class="container">
            <div class="login-left">
                <div class="login-header">
                    <h2>We're delighted to welcome you to<span> KingDom</span> </h2>
                    <p>Log in now to get a good-quality and affordable course</p>
                </div>
                <div class="login-form">
=======

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
                <form id="sign-up-form" method="post" action="" enctype="multipart/form-data">
>>>>>>> di_update2
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
<<<<<<< HEAD
                        <button type="submit" id="btn">SIGN IN</button>
=======
                        <button type="submit" name="btn">SIGN IN</button>
>>>>>>> di_update2
                    </div>
                </form>
                <div class="login-form-footer">
                    <a href="https://www.facebook.com">
                        <img src="https://www.verfvanniveau.nl/wp-content/uploads/2019/08/logo-social-fb-facebook-icon.png" alt="" width="30">Facebook login
                    </a>
                    <a href="#">
                        <img src="../../Asstet/images/GG.png" alt="" width="30">Google login
                    </a><br>
                </div>
<<<<<<< HEAD
                </div>       
            </div>
            <div class="login-right">
                <img class="img-right" src="https://unnombrex.neocities.org/Cobay/alumnos.gif" alt="">
=======
>>>>>>> di_update2
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
        if (!$mk || !$tk) {
            echo "<script> alert('Vui lòng nhập đây đủ thông tin') </script>";
            exit;
        }
        $sql = "SELECT * FROM student WHERE Email= '$tk' AND Password ='$mk'";
        $result = mysqli_query($ketnoi, $sql);

        if (mysqli_num_rows($result) != 1) {
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