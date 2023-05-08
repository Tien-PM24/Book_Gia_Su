<?php session_start();
include "../../Pages/Admin/Email/src/PHPMailer.php";
include "../../Pages/Admin/Email/src/Exception.php";
include "../../Pages/Admin/Email/src/SMTP.php";
?>
<?php

include '../../Database/conn.php';
if (isset($_POST['btn'])) {
  $name= $_SESSION['name'];
  $userEmail=  $_SESSION['email']  ;
  $password=  $_SESSION['password'] ;
  $job_title=  $_SESSION['job_title'] ; 
  $address= $_SESSION['address'] ;

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
    $email->Subject = "welcome to KingDom";
    $email->Body = "Thank you " . $name . " for trusting our website";
    if (!$email->send()){
      echo "fail";
    }
    else{
      $sql = "INSERT INTO teacher (full_name, email, password, job_title, address) values ('$name', '$userEmail', '$password','$job_title', '$address')";
      mysqli_query($ketnoi,$sql);
      header("location:../../index.php");

      }
  }
  

?>
