<?php
    include '../../../../Database/conn.php';

    if(isset($_GET['delete_id'])){
        $id=$_GET['delete_id'];
        $sql1="SET foreign_key_checks=0";
        $sql="DELETE course, teacher_course, stu_course
        FROM course
        INNER JOIN teacher_course ON course.ID_course = teacher_course.ID_course
        INNER JOIN stu_course ON course.ID_course = stu_course.ID_course
        WHERE course.ID_course =$id";
        $stm=mysqli_query($ketnoi,$sql1);
        $stm1=mysqli_query($ketnoi,$sql);
        $sql1="SET foreign_key_checks=0";
        $sql="DELETE course, teacher_course
        FROM course
        INNER JOIN teacher_course ON course.ID_course = teacher_course.ID_course
        WHERE course.ID_course =$id";
        $stm=mysqli_query($ketnoi,$sql1);
        $stm1=mysqli_query($ketnoi,$sql);
        // header('location:../FrontEnd/service.php');
        header('location:../FrontEnd/service.php');
    }
?>