<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Styles/login_resgeter/regester.css">
  <!-- <link rel="stylesheet" href="logn_up.js"> -->
  <title>Document</title>
</head>

<?php
include './Database/conn.php';
if (isset($_POST["btn"])) {
  $taikhoan = $_POST["tk"];
  $matkhau = $_POST["mk"];
  $ten = $_POST["name"];
  $check_ma = "SELECT * FROM student where Email='$taikhoan'";
  $ketqua = mysqli_query($ketnoi, $check_ma);
  $dem = mysqli_num_rows($ketqua);
  if ($dem > 0) {
    echo "<script> alert('Tài khoản đã tôn tại') </script>";
  } else {
    $sql = "INSERT INTO student (Full_name, Email, Passwork) values ('$ten', '$taikhoan', '$matkhau')";
    if (mysqli_query($ketnoi, $sql)) {
      echo "Thêm dữ liệu thành công";
      header("location: login.php");
    } else {
      echo "Thêm dữ liệu thất bại";
    }
  }
}
?>


<body>
  <div class="container">
    <div class="overlay" id="overlay">
      <div class="sign-in" id="sign-in">
        <h1>BOOK GIA SƯ</h1>
        <p>Tạo tài khoản ngày để có thể book gia sư mà bạn yêu thích</p>
        <!-- <button class="switch-button" id="slide-right-button">ĐĂNG NHẬP</button> -->
        <img src="./Asset/Picture/Course/learn online.jpg" alt="lỗi">
      </div>

    </div>
    <div class="form">

      <div class="sign-up" id="sign-up-info">
        <h1>Tạo tài khoản</h1>
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
        <p class="small">hoặc sử dụng email của bạn để đăng ký:</p>
        <form id="sign-up-form" method="post" action="" enctype="multipart/form-data">
          <input type="text" name="name" placeholder="Tên" />
          <input type="email" name="tk" placeholder="Email" />
          <input type="password" name="mk" placeholder="Mật khẩu" />
          <br>
          <select name="select" class="option">
            <option>Học sinh</option>
            <option>Giáo viên</option>
          </select>
          <!-- <input type="email" name="select" placeholder="Email" /> -->
          <button class="control-button up" name="btn">ĐĂNG KÝ</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>