<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../Styles/Log/regester_form.css" />
  <title>Regester account</title>
</head>


<?php ini_set('display_errors' ,0) ?>

<body>
  <div class="container">
    <div class="regester-left">
      <img class="img-right" src="../../Asset/images/regester.jpg" alt="" />
    </div>
    <form id="sign-up-form" method="post" action="" enctype="multipart/form-data">
    <div class="regester-right">
      <h1>Regester</h1>
      <p>craeta your account</p>
      
        <div class="regester-form">
          <div class="form-left">
            <div class="form-item">
              <label for="name">Enter Full Name</label>
              <input type="text" name="name" id="name" value="<?php echo $_POST['name'] ?>" />
            </div>
            <div class="form-item">
              <label for="email">Enter Email</label>
              <input type="text" name="email" id="email" value="<?php echo $_POST['email'] ?>"/>
            </div>
            <div class="form-item">
              <label for="password">Enter Password</label>
              <input type="password" name="password" id="password" value="<?php echo $_POST['password'] ?>" />
              <i class="toggle-password fas fa-eye"></i>
            </div>
          </div>
          <div class="form-right">
            <div class="form-item">
              <label for="user-name">Enter Job_title</label>
              <input type="text" name="Job_title" id="username" value="<?php echo $_POST['Job_title'] ?>" />
            </div>
            <div class="form-item">
              <label for="password">Enter Address</label>
              <input type="address" name="address" id="password" value="<?php echo $_POST['address'] ?>" />
              <i class="toggle-password fas fa-eye"></i>
            </div>
            <div class="form-item">
              <label for="phone-number">Enter phoneNumber</label>
              <input type="text" name="phonenumber" id="phonenumber" value="<?php echo $_POST['phonenumber'] ?>" />
            </div>
          </div>
        </div>
      <!-- <div class="role-user" name="user_type">
        <div class="radio-containe">
          <h3>Please select your role:</h3>
        </div>
        <div class="radio-container">
          <input type="radio" id="student" name="role" value="student" />
          <label for="student">Student</label>
        </div>
        <div class="radio-container">
          <input type="radio" id="tutor" name="role" value="tutor" />
          <label for="tutor">Tutor</label>
        </div>
      </div> -->
      <select name="user_type" class="option">
            <option value="student" >Học sinh</option>
            <option value="teacher">Giáo viên</option>
          </select>

      <button type="submit" name="btn">REGESTER</button>
    </div>
  </form>
  </div>
</body>

<?php
include '../../Database/conn.php';
$sql = "";
if (isset($_POST["btn"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $name = $_POST["name"];
  $Job_title = $_POST["Job_title"];
  $address = $_POST["address"];
  $check_email = "SELECT * FROM teacher WHERE Email='$email' UNION SELECT * FROM student WHERE Email='$email'";
  $result = mysqli_query($ketnoi, $check_email);
  $count = mysqli_num_rows($result);
  if (empty($email) || empty($password) || empty($name) || empty($Job_title) || empty($address)) { //empty: kiểm tra biến có rỗng hay không
    echo "<script> alert('Vui lòng nhập đầy đủ thông tin') </script>";
    return; //Thoát khỏi hàm và không thực hiện lệnh bên dưới
  }

  if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) { // preg_match: là một hàm trong PHP được sử dụng để kiểm tra xem một chuỗi có khớp với một biểu thức chính quy hay không
    echo "<script> alert('Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm ít nhất một chữ cái viết hoa, một chữ cái thường, một số và một ký tự đặc biệt') </script>";
    return;
  }

  if ($count > 0) {
    echo "<script> alert('Tài khoản đã tồn tại') </script>";
    //một biểu thức chính trong PHP được sử dụng để xác thực xem một chuỗi có khớp với định dạng của một địa chỉ email hợp lệ hay không
  } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) { //[a-zA-Z0-9._%+-] đại diện tên người dùng [a-zA-Z0-9.-] Điều này đại diện cho phần tên miền của địa chỉ email
    echo "<script> alert('Địa chỉ email không hợp lệ') </script>";
  } elseif (isset($_POST["user_type"]) && $_POST["user_type"] == "teacher") {
    $sql = "INSERT INTO teacher (Full_name, Email, Password, Job_title, Address) values (UPPER('$name'), '$email', '$password','$Job_title', '$address')";
  } else {
    $sql = "INSERT INTO student (Full_name, Email, Password, Job_title, Address) values (UPPER('$name'), '$email', '$password','$Job_title', '$address')";
  }
  if (!empty($sql)) { //Điều này sẽ đảm bảo rằng truy vấn chỉ được thực thi nếu $sql không trống và sẽ ngăn thông báo lỗi xảy ra. tại vì nếu $sql trống thì sẽ báo lỗi
    if (mysqli_query($ketnoi, $sql)) {
      header('location: login.php');
    } else {
      echo "Thêm dữ liệu thất bại";
    }
  }
}
?>



</html>