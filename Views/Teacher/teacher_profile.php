<?php 
include "../../Database/connectBS.php";
include "./header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teacher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="../../../../Styles/inc_styles/style.css"> -->
    <!-- <link rel="stylesheet" href="./style_course.css"> -->
    <link rel="stylesheet" href="../../Public/Styles/Teacher/teacher.css">
    <link rel="stylesheet" href="../../Public//Styles/Student/header.css">

    <style>
        body{
            margin-top: 150px;
        }
    </style>
</head>
<body>
   
    <div class="container">
        <h2>Personal Profile</h2>
        <?php
        $sql = "SELECT distinct teacher.id_teacher as Teacher, teacher.email as Email,
        full_name,job_title, picture_teacher.image as Image
        FROM teacher, picture_teacher
        WHERE teacher.id_teacher = picture_teacher.id_teacher
        AND teacher.email = '$emailUser'";
        $result = mysqli_query($conn, $sql);
        // if (mysqli_num_rows($result) > 0) {
            // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
            while ($row = mysqli_fetch_array($result)) {
            ?>
               <div class="fui-card-profile-1">
                <div class="background-wrap">
                <div class="card-image-cover">
                <img
                    src="https://haycafe.vn/wp-content/uploads/2021/12/Hinh-nen-Full-HD-1080-cho-may-tinh-dep.jpg"
                    alt="fashui"
                 />
                </div>
                <div class="card-avatar">
                <img src="../../Public/Images/Teacher/<?php echo $row['Image'] ?>" alt="">
                </div>
                </div>
                <div class="card-body">
                <h2 class="card-name"><?php echo $row['full_name']  ?></h2>
                <p class="card-desc"><?php echo $row['job_title']  ?></p>
                <div class="card-button-wrap">
                <button class="card-btn card-btn--secondary" name="btn">
                <a href="./edit_tutor.php?id=<?php echo $row['Teacher'] ?>" class="edit">Edit</a>
                </button>
                 </div>
                </div>
                </div>
                <?php
            }
        
        // Đóng kết nối đến cơ sở dữ liệu
        mysqli_close($conn);
        ?>
</body>
<?php

?>
<style>
    .edit{
        text-decoration: none;
    }
</style>