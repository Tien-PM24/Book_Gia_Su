<?php
session_start();
$emailUser=$_SESSION['user'];
include "../../Database/connectBS.php";
?>

<link rel="stylesheet" href="../../Public/Styles/Student/header.css">
<?php
$sql = "SELECT image, email from teacher,picture_teacher
    where teacher.id_teacher=picture_teacher.id_teacher
    and email='$emailUser'";
$stm = mysqli_query($conn, $sql);

?>
<div class="container_menu_teacher">
    <div class="logo">
        <img src="../../Public/Images/Student/logo.png" alt="">
    </div>
    <div class="container__list__menu">
        <div class="item">
            <a href="../../Views/Home/index.php">
                <p>Home Page</p>
            </a>
        </div>
        <div class="item itemProfile">
            <a href="./teacher_profile.php">
                <p>Personal profile</p>
            </a>
        </div>
        <div class="item itemService">
            <a href="./add_course.php">
                <p>Tutoring services</p>
            </a>
        </div>
        <div class="item itemOder">
            <a href="./student_order.php">
                <p>Oder</p>
            </a>
        </div>
        
    </div>
    <?php
        while ($row = mysqli_fetch_assoc($stm)) {
        ?>
            <div class="profile">
                <img src="../../Public/Images/Teacher/<?php echo $row['image'] ?>" alt="">
            </div>
        <?php
        }
        ?>
</div>