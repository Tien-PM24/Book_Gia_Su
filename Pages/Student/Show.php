<?php
session_start();

if (isset($_SESSION['user'])) $_SESSION['user'] = [];

$Email = "luc.phan24@student.passerellesnumeriques.org";

// $store_admin[]=[$Email];
$_SESSION['user'] = $Email;
$emailUser = $_SESSION['user']
?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Styles/Student/Show.css">
    <link rel="stylesheet" href="../../Styles/inc_styles/style_header.css">



</head>

<body>
    <header>
        <?php
        require_once "../../inc/header.php";
        ?>
    </header>

    <div class="fui-card-profile-1">
        <div class="background-wrap">
            <div class="card-image-cover">
                <img src="https://i.ibb.co/1M0TF14/art-2.jpg" alt="fashui" />
            </div>


            <?php

            include "./conncect.php";
            // Thực hiện truy vấn đến cơ sở dữ liệu
            $sql = "SELECT student.ID_student as ID_student, Image,Full_name,Email,Address from picture_stu,student
            where student.ID_student=picture_stu.ID_student and  student.Email = '$emailUser'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class='card-avatar'>
                    <img name="image" src="../../Asset/Picture/Student/<?php echo $row['Image'] ?>" alt="">
                </div>
                <div class="card-body">
                    <p name='email'><?php echo $row["Full_name"] ?></p>
                    <p name="email"><?php echo $row["Email"] ?></p>
                    <p name="address"><?php echo $row["Address"] ?></p>
                </div>
                <div class="card-button-wrap">
                    <button class="card-btn card-btn--secondary">
                        <a href="edit.php?ID_student=<?php echo $row['ID_student'] ?>">
                            Sửa
                        </a>
                    </button>
                    <button class="card-btn card-btn--primary">
                        Xóa
                    </button>
                </div>
            <?php
            }
            ?>
        </div>
        <?php

        ?>

        <?php

        ?>
        <?php


        $sql = "SELECT Image,Name,Price 
    from course,stu_course,student
    where course.ID_course=stu_course.ID_course 
    and student.ID_student=stu_course.ID_student
    and student.Email='$emailUser'";

        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <div class="grid-container">
                    <div class="card">
                        <img src="../../Asset/Picture/Course/<?php echo $row['Image'] ?>" />
                    </div>
                    <div class="card-content">
                        <p id="tx"><?php echo $row['Name'] ?></p>'
                    </div>
                    <div class="card-price">
                        <p id="tx"><?php echo $row['Price'] ?></p>'
                    </div>
                </div>
        <?php
            }
        }
        ?>


        <footer>
            <?php
            include "../../inc/footer.php";
            ?>
        </footer>
</body>

</html>