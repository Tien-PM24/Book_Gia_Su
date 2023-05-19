<?php
session_start();
$emailUser=$_SESSION['user'];
include "../../Database/connectBS.php";
$sql = "SELECT image, email from student,picture_stu
    where student.id_student=picture_stu.id_student
    and email='$emailUser'";
$stm = mysqli_query($conn, $sql);
?>

<link rel="stylesheet" href="../../Public/Styles/Student/header.css">


<div class="container_menu_teacher">
    <div class="logo">
        <img src="../../Public/Images/Student/logo.png" alt="">
    </div>
    <div class="container__list__menu">
        <div class="item ">
            <a href="../../Views/Home/index.php">
                <p>Home</p>
            </a>
        </div>
        <div class="item itemProfile">
            <a href="./student_profile.php">
                <p>Profile</p>
            </a>
        </div>
        <div class="item itemOder">
            <a href="./class_student.php">
                <p>Class</p>
            </a>
        </div>
        
    </div>
    <?php
        while ($row = mysqli_fetch_assoc($stm)) {
        ?>
            <div class="profile">
              <a href=""><img id="Image" src="../../Public/Images/Student/<?php echo $row['image'] ?>" alt="" height="25"></a>
            </div>
        <?php
        }
        ?>
</div>