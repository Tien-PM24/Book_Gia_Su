<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/login_resgeter/login.css">
    <title>Document</title>
</head>


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



<body>
    <div class="container">
        <div class="overlay" id="overlay">
          <div class="sign-in" id="sign-in">
            <h1>BOOK GIA SƯ</h1>
            <p>Nếu bạn chưa có tài khoản vui lòng hãy đăng ký.</p>
            <div class="conect">
              <a href="./regester.php"class="switch-button" id="slide-right-button">
                <p>ĐĂNG KÍ</p>
              </a>
            </div>           
            <!-- <button class="switch-button" id="slide-right-button">ĐĂNG KÍ</button> -->
          </div>
        </div>  

        <div class="form">
          <div class="sign-up" id="sign-up-info">
            <h1>Vui lòng đăng nhập</h1>
            <div class="social-media-buttons">
              <div class="icon">
                <svg viewBox="0 0 24 24">
                  <path fill="#000000" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
              </svg>
              </div>
              <div class="icon">
              <svg viewBox="0 0 24 24">
                  <path fill="#000000" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z" />
              </svg>
              </div>
              <div class="icon">
              <svg viewBox="0 0 24 24">
                <path fill="#000000" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" />
              </svg>
              </div>
            </div>
            <p class="small">hoặc sử dụng email của bạn để đăng nhập:</p>
            <form id="sign-up-form" action="#" method="post">
         
              <input name="email" type="email" placeholder="Email"/>
              <input name="mk" type="password" placeholder="Mật khẩu"/>
              <div class="forcuss">
                <a href=""> Quên mật khẩu</a>
              </div>
              <button class="control-button up" name="btn">ĐĂNG NHẬP</button>
            </form>
          </div>
        </div>
      </div>
</body>
</html>