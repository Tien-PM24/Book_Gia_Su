<?php 
include "../../../../Database/conn.php";
include "./headerTeacher.php";
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
    <link rel="stylesheet" href="../../../../Styles/inc_styles/style.css">
    <link rel="stylesheet" href="./style_course.css">
    <link rel="stylesheet" href="./style_teachers.css">
    <style>
        body{
            margin-top: 150px;
        }
    </style>
</head>
<body>
   
    <div class="container">
        <h2>Personal Profile</h2>
        <?php include '../BackEnd/get_teacher.php' ?>
    <?php include '../../../../inc/footer.php' ?>
</body>
<!-- <script>
    var item=document.querySelector('.itemProfile');
    item.style.background='white';
</script> -->