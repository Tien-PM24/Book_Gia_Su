<?php
include "./header.php";
include "../../Database/connectBS.php";


?>
<body style="margin-top: 110px;">
    <?php
$sql = "SELECT image,name,payment.price 
from course,payment,student
where course.id_course=payment.id_course 
and student.id_student=payment.id_student
and student.email='$emailUser'";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)){
?>   
<div class="container--gird">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="product-card">
      <img src="../../Public/Images/Course/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
      <div class="product-card__info">
        <h3 class="product-card__name"><?php echo $row["name"] ?></h3><br>
        <div class="product-card__buttons">
        </div>
      </div>
    </div>
  
  <?php }}else{
    echo "<h1 class='text-center'>Bạn chưa đăng ký khóa học nào</h1>";
  }
  ?>


</body>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Public/Styles/Home/index.css">
  </head>
  <body>
      
    <script>
      var colorClass=document.querySelector('.classColor');
      colorClass.style.background="white";
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>