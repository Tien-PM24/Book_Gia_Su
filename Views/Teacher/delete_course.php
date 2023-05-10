<?php
    include '../../Database/connectBS.php';

    if(isset($_GET['delete_id'])){
        $id=$_GET['delete_id'];
        $sql1="SET foreign_key_checks=0";
        $sql="DELETE course, teacher_course, payment
        FROM course
        INNER JOIN teacher_course ON course.id_course = teacher_course.id_course
        INNER JOIN payment ON course.id_course = payment.id_course
        WHERE course.id_course =$id";
        $stm=mysqli_query($conn,$sql1);
        $stm1=mysqli_query($conn,$sql);
        $sql1="SET foreign_key_checks=0";
        $sql="DELETE course, teacher_course
        FROM course
        INNER JOIN teacher_course ON course.id_course = teacher_course.id_course
        WHERE course.id_course =$id";
        $stm=mysqli_query($conn,$sql1);
        $stm1=mysqli_query($conn,$sql);
        // header('location:../FrontEnd/service.php');
        header('location:./add_course.php');
    }
?>