<?php session_start();
include "../Email/src/PHPMailer.php";
include "../Email/src/Exception.php";
include "../Email/src/SMTP.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../Public/Styles/Log/register.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>Regester account</title>
</head>

<body>

  <?php ini_set('display_errors', 0) ?>
  <div class="container">
    <div class="regester-left">
      <img class="img-right" src="../../Public/Images/Log/register.jpg" alt="">
    </div>
    <div class="regester-right">
      <form action="" method="post">
        <h1>Craeta your account to connect with us</h1>
        <div class="regester-form">
          <div class="form-left">
            <div class="form-item">
              <label for="name">Enter Full Name</label>
              <input type="text" name="name" id="name" value="<?php echo $_POST['name'] ?>">
            </div>
            <div class="form-item">
              <label for="email">Enter email</label>
              <input type="text" name="email" id="email" value="<?php echo $_POST['email'] ?>">
            </div>
            <div class="form-item">
              <label for="password">Enter password</label>
              <input type="password" name="password" id="password" value="<?php echo $_POST['password'] ?>">
              <i class="toggle-password fas fa-eye"></i>
            </div>
          </div>
          <div class="form-right">
            <div class="form-item">
              <label for="address">Enter address</label>
              <input type="text" name="address" id="address" value="<?php echo $_POST['address'] ?>">
            </div>
            <div class="form-item">
              <label for="password">Job Title</label>
              <select name="job_title" class="option" id="Job_title">
                <option value="student">Student</option>
                <option value="teacher">Tutor</option>
              </select>
              <i class="toggle-password fas fa-eye"></i>
            </div>
            <div class="form-item">
              <label for="password">Confirm password</label>
              <input type="password" name="Confirm_password" id="address"
                value="<?php echo $_POST['Confirm_password'] ?>">
              <i class="toggle-password fas fa-eye"></i>
            </div>
          </div>
        </div>
        <button type="submit" name="btn">REGESTER</button>

      </form>
    </div>
  </div>
</body>

</html>


<?php
include '../../Database/connectBS.php';
// global $conn;
if (isset($_POST["btn"])) {

  $email = $_POST["email"];

  $password = $_POST["password"];
  $Confirm_password = $_POST['Confirm_password'];
  $name = ucwords($_POST["name"]);
  $job_title = $_POST["job_title"];
  $address = $_POST["address"];

  $check_teacher_query = "SELECT * FROM teacher WHERE email='$email'";
  $result_teacher = mysqli_query($conn, $check_teacher_query);
  $count_teacher = mysqli_num_rows($result_teacher); //Sử dụng hàm mysqli_num_rows để đếm số hàng (số giáo viên) trong kết quả truy vấn

  $check_student_query = "SELECT * FROM student WHERE email='$email'";
  $result_student = mysqli_query($conn, $check_student_query);
  $count_student = mysqli_num_rows($result_student);

  if (empty($email) || empty($password) || empty($name) || empty($job_title) || empty($address)) { //empty: kiểm tra biến có rỗng hay không
    echo "<script> swal.fire('Lỗi!', 'Vui lòng điền đầy đủ thông tin.', 'error') </script>";
    return; //Thoát khỏi hàm và không thực hiện lệnh bên dưới
  }

  if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) { // preg_match: là một hàm trong PHP được sử dụng để kiểm tra xem một chuỗi có khớp với một biểu thức chính quy hay không
    echo "<script> swal.fire('Lỗi!','Mật khẩu phải có 8 ký tự và chứa hoa, thường', 'error') </script>";
    return;
  }

  //một biểu thức chính trong PHP được sử dụng để xác thực xem một chuỗi có khớp với định dạng của một địa chỉ email hợp lệ hay không
  elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) { //[a-zA-Z0-9._%+-] đại diện tên người dùng [a-zA-Z0-9.-] Điều này đại diện cho phần tên miền của địa chỉ email
    echo "<script> swal.fire('lỗi!','Địa chỉ email không hợp lệ','error') </script>";


  } elseif ($password !== $Confirm_password) {
    echo "<script> swal.fire('lỗi!','Xác thực mật khẩu không chính xác!','error') </script>";


  } elseif (isset($_POST["job_title"]) && $_POST["job_title"] == "teacher") {
    if ($count_teacher > 0) {
      // Notify user that the email already exists in the teacher table
      echo "<script> swal.fire('lỗi!','Tài khoản đã tồn tại!','error') </script>";
      return;
    }

    if (!isset($_SESSION['name']))
      $_SESSION['name'] = [];
    if (!isset($_SESSION['email']))
      $_SESSION['email'] = [];
    if (!isset($_SESSION['password']))
      $_SESSION['password'] = [];
    if (!isset($_SESSION['job_title']))
      $_SESSION['job_title'] = [];
    if (!isset($_SESSION['address']))
      $_SESSION['address'] = [];
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['job_title'] = $job_title;
    $_SESSION['address'] = $address;
    header("location:../../Views/Teacher/payment.php");

  } else {

    if ($count_student > 0) {
      // Notify user that the email already exists in the student table
      echo "<script> swal.fire('lỗi!','Tài khoản đã tồn tại!','error') </script>";
      return;
    }
    if (!isset($_SESSION['email']))
      $_SESSION['email'] = [];
    $_SESSION['email'] = $email;
    $userEmail = $_SESSION['email'];
    if (!isset($_SESSION['name']))
      $_SESSION['name'] = [];
    $_SESSION['name'] = $name;
    $name = $_SESSION['name'];
    $email = new PHPMailer\PHPMailer\PHPMailer();
    $email->CharSet = 'UTF-8';
    $email->Host = 'smtp.gmail.com';
    $email->isSMTP();
    $email->SMTPAuth = true;
    $email->Username = 'hovandideveloper@gmail.com';
    $email->Password = 'ckmfrvdobdwnebtc';
    $email->SMTPSecure = 'tls';
    $email->Port = '587';
    $email->setFrom('hovandideveloper@gmail.com', 'KingDom');
    $email->addAddress($userEmail);
    $email->Subject = "Chào bạn đã đến với trang web của chúng tôi";
    $email->Body = "Cảm ơn " . $name . " đã tin tưởng và chọn website của chúng tôi để học tập.";
    if (!$email->send()) {
      echo "fail";
    } else {
      $sql = "INSERT INTO student (full_name, email, password, job_title, address) values ('$name', '$userEmail', '$password','$job_title', '$address')";
      mysqli_query($conn, $sql);
    }

  }
  header('location:../../index.php');
} else {
  echo "Add failed data";
}

?>