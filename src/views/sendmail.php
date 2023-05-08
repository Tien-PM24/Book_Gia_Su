<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php
include "../../Pages/Admin/Email/PHPMailer-master/src/PHPMailer.php";
include "../../Pages/Admin/Email/PHPMailer-master/src/Exception.php";
include "../../Pages/Admin/Email/PHPMailer-master/src/SMTP.php";
$email = new PHPMailer\PHPMailer\PHPMailer();
$email -> CharSet ='UTF-8';
$email -> Host = 'smtp.gmail.com';
$email -> isSMTP();
$email -> SMTPAuth = true;
$email -> Username ='hovandideveloper@gmail.com';
$email -> Password ='ckmfrvdobdwnebtc';
$email -> SMTPSecure ='tls';
$email -> Port ='587';
$email -> setFrom('hovandideveloper@gmail.com', 'KingDom');

if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
  for ($i = 0; $i < sizeof($_SESSION['user']); $i++) {
    $name = $_SESSION['user'][$i][0];
    $email = $_SESSION['user'][$i][1];
  $email ->addAddress($email);
  $email ->Subject = "welcome to KingDom";
  $email ->Body = "Thank you ".$name." for trusting our website";
  // header("location: ../../index.php");

  }
}
?>

</body>
</html>
