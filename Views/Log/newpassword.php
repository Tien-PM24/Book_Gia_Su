<?php  session_start();
$email=$_SESSION['emails'];
include "../../Database/connectBS.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>New pass</title>
</head>
<body>
    <div class="container">
        <form action="./newpassword.php" method="post" class="form">
            <br>
            <div class="div">
                <b><label for="">New password</label></b> <br><br>
                <input type="password" name="pass">
            </div><br>
            <div class="div">
                <b><label for="">Confirm Password</label></b> <br><br>
                <input type="password" name="password">
            </div><br>
            <input type="submit" value="Save" class="btn" name="btn">
        </form>
    </div>

<?php
    if (isset($_POST['btn'])) {
        $sql1="SELECT * from teacher where email='$email'";
        $sql="SELECT * from student where email='$email'";
        $stm=mysqli_query($conn,$sql1);
        $stm1=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($stm);
        $row1=mysqli_fetch_assoc($stm1);
        $pass=$_POST['password'];
        $password=$_POST['pass'];


        if ($pass!="" && $password!="" && strlen($pass)>=8) {
            if($pass==$password){
                if($row){
                    $update="UPDATE teacher
                    set password='$pass' where email='$email'
                    ";
        
                    $stm=mysqli_query($conn,$update);
                    header("location:../../index.php");
                }
                if($row1){
                    $update="UPDATE student
                    set password='$pass' where email='$email'
                    ";
                    $stm=mysqli_query($conn,$update);
                    header("location:../../index.php");
                }
            }
        }
        else{
            echo "<script>swal.fire('Lỗi','Vui lòng nhập đúng mật khẩu','error')</script>";
        }
        
    }
?>
<style>
    .container{
        border: none;
        margin-left: 550px;
        margin-top: 150px;
        width: 500px;
        height: 300px;
        background-color: yellow;
        border-radius: 8px;
    }
    .form{
        margin-top: 30px;
        margin-left: 35px;
    }
    .div input{
        width: 400px;
        height: 40px;
        outline: none;
        border: none;
        border-radius: 2px;
    }
    .btn{
        margin-left: 140px;
        width: 80px;
        height: 40px;
        justify-content: center;
        text-align: center;
        align-items: center;
        border-radius: 4px;
        background-color: orangered;
        border: none;
    }
</style>
</html>
</body>