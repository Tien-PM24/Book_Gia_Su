<form action="" method="post">
    <label for="">Email</label>
    <input type="email" name="email" id="">

    <button type="submit" name="gui">Gửi</button>
</form>
<?php
include "./Email.php";
if(isset($_POST['gui'])){
    $email=$_POST['email'];
    $mail->addAddress($email);  // Địa chỉ email người nhận
    $mail->Subject = 'Mã Xác thực';  // Tiêu đề email
    $verification_code = rand(100000, 999999);  // Tạo mã xác nhận ngẫu nhiên
    $mail->Body = 'Mã xác thực ' . $verification_code;  // Nội dung email
    
    // Gửi email
    if (!$mail->send()) {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    } else {
        echo 'Email sent successfully.';
        echo $verification_code;
    }
    

}


?>

