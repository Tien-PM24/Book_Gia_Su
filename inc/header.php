<?php session_start(); 
 $emailUser = $_SESSION['user'];
  include "../../Database/conn.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book tutor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <script src="./Asset/bootstrap-4.0.0-dist/js/jquery.min.js"></script>
  <script src="./Asset/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
  <link rel="stylesheet" href="../../Styles/inc_styles/style.css">
  <!-- <link rel="stylesheet" href="../../Styles/inc_styles/style.css"> -->
</head>
<body>
  <!-- header -->
  <header>
    <div class="container-header">
      <div class="logo">
        <a href="product.php"><img src="../../Asset/images/logo (1).png" alt="" height="100"></a>
      </div>
      <div class="nav-item">
        <nav>
          <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tutors</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">Class</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
      <div class="search-item">
        <div class="search-item">
            <form class="example" action="" style="margin:auto;max-width:300px">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
      </div>
      <div class="tap-right">

      <div class="personal-profile">
        <?php
            $sql1="SELECT Image, Email from student,picture_stu
            where student.ID_student=picture_stu.ID_student
            and Email='$emailUser'";
            $stm1=mysqli_query($ketnoi,$sql1);
            $sql2="SELECT Image, Email from teacher,picture_teacher
            where teacher.ID_teacher=picture_teacher.ID_teacher
            and Email='$emailUser'";
            $stm2=mysqli_query($ketnoi,$sql2);
            while($row=mysqli_fetch_assoc($stm1)){
              if($row){
                echo "<img id='Image' src='../../Asset/Picture/Student/" . $row['Image'] . "' height='25'>";
              }else{
                echo "<img id='Image' src='../../Asset/Picture/Student/user.png' height='25'>";
              }
              
            }
            while($row=mysqli_fetch_assoc($stm2)){
              if($row){
                echo "<img id='Image' src='../../Asset/Picture/Teacher/" . $row['Image'] . "' height='25'>";
              }else{
                echo "<img id='Image' src='../../Asset/Picture/Teacher/user.png' height='25'>";
              }
             
          }
        ?>
         
        </div>
      </div>
    </div>
  </header>


  <script>
  var img = document.querySelector("#Image");
  img.addEventListener('click', function(event) {
    event.preventDefault();
    <?php
      $emailUser = $_SESSION['user'];
      $sql_student = "SELECT student.Email as Email, picture_stu.Image as Image
                      FROM student, picture_stu
                      WHERE student.ID_student = picture_stu.ID_student
                      AND student.Email = '$emailUser'";
      $sql_teacher = "SELECT teacher.Email as Email, picture_teacher.Image as Image
                      FROM teacher, picture_teacher
                      WHERE teacher.ID_teacher = picture_teacher.ID_teacher
                      AND teacher.Email = '$emailUser'";
      $stm_student = mysqli_query($ketnoi, $sql_student);
      $row_student = mysqli_fetch_assoc($stm_student);
      $stm_teacher = mysqli_query($ketnoi, $sql_teacher);
      $row_teacher = mysqli_fetch_assoc($stm_teacher);
      if ($row_student) {
        $imageFolder = "";
       
        echo "window.location.href = '../../Pages/Student/Show.php';";
      } else if ($row_teacher) {
        $imageFolder = "../Asset/Picture/Teacher/{$row_teacher['Image']}";
        echo "window.location.href = '../../Pages/Teacher/PHP/FrontEnd/profile.php';";
      } else {
        echo "alert('Không tìm thấy hình ảnh của người dùng!');";
      }

      
    ?>
  });
</script>







<style>
  #Image{
    width: 50px;
    height: 50px;
    border-radius: 50px;
  }
</style>