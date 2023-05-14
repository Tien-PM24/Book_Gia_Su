<?php 
session_start();
$email=$_SESSION['emails'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Enter your cod</h1>
        <form action="./entercode.php" method="post" class="form">
            <b><label for="">Code</label></b>
            <input type="number" class="email" name="code">
            <!-- <input type="hidden" class="email" name="confirmEmail" value="<?php  ?>"> -->
            <div class="btn-confirm">
            <a href="../../index.php"><input type="button" value="Cancel" class="cancel"></a>
            <input type="submit" value="Confirm" class="confirm" name="confirs">
            <a href="./execute-email.php?confirm=<?php echo $email ?>">gui lai ma</a>
            </div>
        </form>
    </div>
</body>
<?php
    if (isset($_POST['confirs'])) {
        $code=$_POST['code'];
        $verification_code=$_SESSION['code'];
        // echo $code;
        // echo $verification_code;
        if($verification_code==$code){
            header("location:./newpassword.php");
        }else{
            echo "<script>swal.fire('Lỗi!','Xác thực không chính xác','error')</script>";
        }
    }
?>
<style>
    .container{
        margin-left: 600px;
        margin-top: 150px;
        border: 1px solid;
        width: 400px;
        height: 300px;
        border-radius: 8px;
        background-color: yellow;
    }
    h1{
        margin-left: 40px;
    }
    .email{
        width: 350px;
        height: 30px;
        outline: none;
        border-radius: 2px;
        border: none;
    }
    .form{
        margin-top: 50px;
        margin-left: 15px;
    }
    .btn-confirm{
        margin-top: 30px;
        padding-left: 30px;
    }
    .btn-confirm input{
        width: 100px;
        height: 40px;
        border-radius: 8px;
        border: none;
       
    }
    .cancel{
        background-color: red;
        text-transform: uppercase;
        color: wheat;
    }
    .confirm{
        background-color: green;
       text-transform: uppercase;
    }
    .send{
        background-color:orangered;
       text-transform: uppercase;
    }

</style>
</html>
