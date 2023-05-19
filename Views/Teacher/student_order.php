<?php
session_start();
$emailUser = $_SESSION['user'];
include "../../Database/connectBS.php";
include "./header.php";

$sql = "  SELECT DISTINCT student.full_name AS Student,course.name as Course,picture_stu.image as image
FROM student_teacher
INNER JOIN student ON student.id_student = student_teacher.id_student
INNER JOIN teacher ON teacher.id_teacher = student_teacher.id_teacher
LEFT JOIN teacher_course ON teacher_course.id_teacher = student_teacher.id_teacher
LEFT JOIN payment on payment.id_student=student.id_student
LEFT JOIN course on payment.id_course=course.id_course
LEFT JOIN picture_stu on picture_stu.id_student=student.id_student
WHERE teacher.email = '$emailUser'";



$stm = mysqli_query($conn, $sql);
if (mysqli_num_rows($stm)>0) {
?>
  <div class="container--gird">
    <?php while ($row = mysqli_fetch_assoc($stm)) { ?>
      <div class="product-card">
        <img src="../../Public/Images/Student/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
        <div class="product-card__info">
          <h3 class="product-card__name"><?php echo $row["Student"] ?></h3><br>
          <h3 class="product-card__name"><?php echo $row["Course"] ?></h3><br>
          <div class="product-card__buttons">
          </div>
        </div>
      </div>
  <?php }
  } else {
    echo "<h1 class='text-center'>Khóa học của bạn chưa có học sinh đăng ký</h1>";
  }
  ?>

  <link rel="stylesheet" href="../../Public/Styles/Home/index.css">

  <style>
    .text-center{
      margin-top: 80px;
      margin-left: 450px;
    }
  </style>

  <script>
    var profile=document.querySelector(".itemOder")
    profile.style.borderBottom="4px solid orangered"
    profile.style.width="60px"
  </script>
