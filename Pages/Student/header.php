<?php
session_start();
$emailUser=$_SESSION['user'];
include "../../Database/conn.php";
$sql = "SELECT image, email from student,picture_stu
    where student.id_student=picture_stu.id_student
    and email='$emailUser'";
$stm = mysqli_query($ketnoi, $sql);
?>

<link rel="stylesheet" href="../../styles/Student/header.css">


<div class="container_menu_teacher">
    <div class="logo">
        <img src="../../../../Asset/images/logo (1).png" alt="">
    </div>
    <div class="container__list__menu">
        <div class="item">
            <a href="../../src/views/product.php">
                <p>Home Page</p>
            </a>
        </div>
        <div class="item itemProfile">
            <a href="../../Pages/Student/Show.php">
                <p>Profile</p>
            </a>
        </div>
        <div class="item itemOder">
            <a href="../../Pages/Student/class.php">
                <p>Class</p>
            </a>
        </div>
        
    </div>
    <?php
        while ($row = mysqli_fetch_assoc($stm)) {
        ?>
            <div class="profile">
              <a href=""><img id="Image" src="../../Asset/Picture/Student/<?php echo $row['image'] ?>" alt="" height="25"></a>
            </div>
        <?php
        }
        ?>
</div>