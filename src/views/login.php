
<?php 
    session_start();
    if (!isset($_SESSION['user'])) $_SESSION['user']=[];

include "../../Database/conn.php" ;

error_reporting(0);

    // include './Database/conn.php'; 

    if (isset($_POST["btn"])) {
        $accout = $_POST["email"];
        $password = $_POST["password"];
        if (!$password || !$accout) {
            echo "<script> alert('Vui lòng nhập đây đủ thông tin') </script>";
            exit;
        }


        $sqlstu="SELECT * from student";
        $sqlteach="SELECT * from teacher";
        $sqladmin="SELECT * from admin";

        $stm1=mysqli_query($ketnoi,$sqlstu);
        $stm2=mysqli_query($ketnoi,$sqlteach);
        $stm3=mysqli_query($ketnoi,$sqladmin);

        while($row=mysqli_fetch_assoc($stm1)){
            if ($accout==$row['Email']) {
                header("location:../../index.php");
                $_SESSION['user'] = $accout;
                $emailUser = $_SESSION['user'];
            }
        }
        while($row=mysqli_fetch_assoc($stm2)){
            if ($accout==$row['Email']) {
                header("location:../../index.php");
                $_SESSION['user'] = $accout;
                $emailUser = $_SESSION['user'];
            }
        }
        while($row=mysqli_fetch_assoc($stm3)){
            if ($accout==$row['Email']) {
                header("location:../../index.php");
                                $_SESSION['user'] = $accout;
                                $emailUser = $_SESSION['user'];
            }
        }



    
    }
    ?>
    <!-- <img src="../../index.php" alt=""> -->

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


   