<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Xác thực Email của bạn</h1>
        <form action="../../Views/Log/execute-email.php" method="post" class="form">
            <b><label for="">Email*</label></b> <br><br>
            <input type="email" class="email" name="confirmEmail">
            <div class="btn-confirm">
            <a href="../../index.php"><input type="button" value="Cancel" class="cancel"></a>
            <input type="submit" value="Confirm" class="confirm" name="confirm">
            </div>
        </form>
    </div>
</body>

<style>
    .container{
        margin-left: 550px;
        margin-top: 150px;
        border: none;
        width: 500px;
        height: 400px;
        border-radius: 8px;
        background-color: yellow;
    }
    h1{
        margin-left: 60px;
        padding-top: 30px;
    }
    .email{
        width: 400px;
        height: 40px;
        outline: none;
        border-radius: 8px;
        border: none;
        margin-left: 20px;
    }
    .form{
        margin-top: 50px;
        margin-left: 15px;
    }
    .btn-confirm{
        margin-top: 30px;
        padding-left: 100px;
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
        background-color: orangered;
       text-transform: uppercase;
    }

</style>
</html>