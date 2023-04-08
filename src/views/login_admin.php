<?php 
include "../../Database/conn.php";
ini_set('display_errors' ,0);
$errors=[];
if(isset($_POST["btn"])):
    $email =$_POST["email"];
    $password =$_POST["password"];
    if(empty($email)){
        $errors["email"]="Can nhap email";
    }else{
        $sql = "SELECT Email FROM admin WHERE Email='$email';";
        $result = mysqli_query($ketnoi, $sql);
        $res=mysqli_fetch_assoc($result);
        if(!$res){
            $errors['email']="Tài khoản không tồn tại";
        }
    }
    if(empty($password)){
        $errors["password"]="Cần nhập mật khẩu";
    }else{
        $sql = "SELECT Password FROM admin WHERE Email='$email';";
        $result = mysqli_query($ketnoi, $sql);
        $res=mysqli_fetch_assoc($result);
        if($errors["email"]==""){
           if($res["Password"]!=$password){
                $errors["password"]="Bạn đã nhập sai mật khẩu";
            } 
        }


        
    }
    if($errors["email"]=="" and $errors["password"]==""){
        header("location:../../Pages/Admin/Php/FrontEnd/Home.php");
    }
endif;

?>

<html>
<head>
    <link rel="stylesheet" href="../../styles/Log/login_form.css">
</head>
<body>
    <div class="container">
        <div class="login-left">
            <div class="login-header">
                <span>Admin</span> 
                <p>Login </p>
            </div>

            <div class="login-form">
                <form id="sign-up-form" method="post" action="">
                    <div class="login-form-content">

                    <div class="form-item">
                        <label for="email">Enter Email</label>
                        <input type="text" name="email" id="email" 
                        value="<?php if(isset($_POST["btn"])):$e=$_POST['password']; echo $e ; endif;?>"/><br>
                        <small style="color:red;">
                            <?php if(isset($_POST["btn"])){
                                        echo $errors["email"]; 
                            }?>
                        </small>
                    </div>
                            <div class="form-item">
                            <label for="password">Enter Password</label>
                            <input type="password" name="password" id="password" value="<?php if(isset($_POST["btn"])): $p= $_POST['password']; echo $p; endif;?>"/><br>
                            <small style="color:red;">
                            <?php if(isset($_POST["btn"])){
                                        echo $errors["password"]; 
                            }?>
                            </small>
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
                <div class="login-form-footer">
                    <a href="https://www.facebook.com">
                        <img src="https://www.verfvanniveau.nl/wp-content/uploads/2019/08/logo-social-fb-facebook-icon.png" alt="" width="30">Facebook login
                    </a>
                    <a href="#">
                        <img src="../../Asset/images/GG.png" alt="" width="30">Google login
                        <!-- <img src="../../../images/GG.png" alt="" width="30">Google login -->
                    </a><br>
                </div>
            </div>

        </div>
        <div class="login-right">
            <img class="img-right" src="https://unnombrex.neocities.org/Cobay/alumnos.gif" alt="">
        </div>
    </div>
</body>
</html>
