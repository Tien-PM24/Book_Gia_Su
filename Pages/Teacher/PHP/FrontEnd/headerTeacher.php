<?php
session_start();
$emailUser=$_SESSION['user'];
include "../../../../Database/conn.php";
?>

<link rel="stylesheet" href="../../../../Styles/Teacher/header.css">
<?php
$sql = "SELECT image, email from teacher,picture_teacher
    where teacher.id_teacher=picture_teacher.id_teacher
    and email='$emailUser'";
$stm = mysqli_query($ketnoi, $sql);

?>
<div class="container_menu_teacher">
    <div class="logo">
        <img src="../../../../Asset/images/logo (1).png" alt="">
    </div>
    <div class="container__list__menu">
        <div class="item">
            <a href="../../../../src/views/product.php">
                <p>Home Page</p>
            </a>
        </div>
        <div class="item itemProfile">
            <a href="./profile.php">
                <p>Personal profile</p>
            </a>
        </div>
        <div class="item itemService">
            <a href="./service.php">
                <p>Tutoring services</p>
            </a>
        </div>
        <div class="item itemOder">
            <a href="./oder.php">
                <p>Oder</p>
            </a>
        </div>
        
    </div>
    <?php
        while ($row = mysqli_fetch_assoc($stm)) {
        ?>
            <div class="profile">
                <img src="../../../../Asset/Picture/Teacher/<?php echo $row['image'] ?>" alt="">
            </div>
        <?php
        }
        ?>
</div>