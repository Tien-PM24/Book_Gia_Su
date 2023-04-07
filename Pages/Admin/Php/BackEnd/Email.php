<?php
    include '../../Email/PHPMailer-master/src/PHPMailer.php';
    include '../../Email/PHPMailer-master/src/SMTP.php';
    include '../../Email/PHPMailer-master/src/Exception.php';
    include "../../Email/vendor/autoload.php";
    // require_once 'vendor/autoload.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // SMTP server của bạn
    $mail->SMTPAuth = true;
    $mail->Username = 'phanthanhluc24@gmail.com';  // Tên đăng nhập SMTP
    $mail->Password = 'rhansgglxwylklzi';  // Mật khẩu SMTP
    $mail->SMTPSecure = 'tls';  // Loại mã hóa SSL hoặc TLS
    $mail->Port = 587;  // Cổng SMTP
    
    // Thiết lập thông tin email
    $mail->setFrom('phanthanhluc24@gmail.com', 'Phan Thanh Lực');  // Địa chỉ email gửi đi và tên người gửi
    if(isset($_POST['submit-email'])){
        $To_email=$_POST['to-email'];
        $Subject=$_POST['subject-email'];
        $Message=$_POST['message-email'];

        $mail->addAddress($To_email);  // Địa chỉ email người nhận
        $mail->Subject = $Subject;  // Tiêu đề email
        // $verification_code = rand(100000, 999999);  // Tạo mã xác nhận ngẫu nhiên
        $mail->Body = $Message; 
        // 'Mã xác thực ' . $verification_code;  // Nội dung email
        if (!$mail->send()) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        } else {
            echo "<script>alert('Email sent successfully.')</script>";
            header('location:../../../Admin/Php/FrontEnd/Home.php');
        }
    }

    ?>
