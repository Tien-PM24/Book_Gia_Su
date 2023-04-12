<?php
session_start();
$emailUser=$_SESSION['user'];
include "../../Database/conn.php";
$sql = "SELECT Image, Email from student,picture_stu
    where student.ID_student=picture_stu.ID_student
    and Email='$emailUser'";
$stm = mysqli_query($ketnoi, $sql);
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="../../Styles/Student/header.css">
<div class="container-header">
  <div class="logo">
    <a href="product.php"><img src="../../Asset/images/logo (1).png" alt="" height="100"></a>
  </div>
  <div class="nav-item">
    <nav>
      <ul class="menu">
        <li><a href="../../src/views/product.php">Home</a></li>
        <li class="profileColor"><a href="./Show.php">Profile</a></li>
        <li><a href="./Course.php">Courses</a></li>
        <li><a href="">Tutors</a></li>
        <li class="classColor"><a href="./class.php">Class</a></li>
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
    <?php
    while($row=mysqli_fetch_assoc($stm)){
        ?>
        <div class="personal-profile">
      <a href=""><img id="Image" src="../../Asset/Picture/Student/<?php echo $row['Image'] ?>" alt="" height="25"></a>
    </div>
    <?php
    }
    ?>
  </div>
</div>
<style>
.personal-profile a img{
  width: 50px;
  height: 50px;
  border-radius: 50px;
  object-fit: cover;
}
</style>