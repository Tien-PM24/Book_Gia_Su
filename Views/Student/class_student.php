<?php
include "./header.php";
include "../../Database/connectBS.php";
?>
<link rel="stylesheet" href="../../Public/Styles/Home/index.css">

<body style="margin-top: 110px;">
  <?php
  $sql = "SELECT image,name,payment.price 
from course,payment,student
where course.id_course=payment.id_course 
and student.id_student=payment.id_student
and student.email='$emailUser'";

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)) {
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

    <?php }
    } else {
      echo "<h1 class='text-center'>Bạn chưa đăng ký khóa học nào</h1>";
    }
    ?>


</body>

<script>
  var profile = document.querySelector(".itemOder")
  profile.style.borderBottom = "4px solid orangered"
  profile.style.width = "70px"
  profile.style.marginLeft = "60px"
</script>
<style>
  .text-center{
    margin-left: 500px;
  }
</style>