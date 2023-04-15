<?php
session_start();
$emailUser=$_SESSION['user'];
include "../../../../Database/conn.php";
include "./headerTeacher.php";

$sql="  SELECT DISTINCT student.full_name AS Student,course.name as Course
FROM student_teacher
INNER JOIN student ON student.id_student = student_teacher.id_student
INNER JOIN teacher ON teacher.id_teacher = student_teacher.id_teacher
LEFT JOIN teacher_course ON teacher_course.id_teacher = student_teacher.id_teacher
LEFT JOIN stu_course on stu_course.id_student=student.id_student
LEFT JOIN course on stu_course.id_course=course.id_course
WHERE teacher.email = '$emailUser'";


$stm=mysqli_query($ketnoi,$sql);
if(mysqli_num_rows($stm)){
?>
<table class="table table_botton">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Student Name</th>
      <th scope="col">Corse Name</th>
    </tr>
  </thead>
  <?php
    $i=1;
    while ($row=mysqli_fetch_assoc($stm)) {
       ?>
         <tbody>
        <td><?php echo $i ?></td>
        <td><?php echo $row['Student'] ?></td>
        <td><?php echo $row['Course'] ?></td>
        </tbody>
    <?php
    $i++;
    }
  }else{
    echo "<h1 class='text-center'>Khóa học của bạn chưa có học sinh đăng ký</h1>";
  }
    ?>
</table>

    
<style>
    .table_botton{
        margin-top: 120px;
    }
</style>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- <script>
      var item=document.querySelector('.itemOder');
      item.style.background="white";
    </script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>