<?php
    session_start();
    $emailUser=$_SESSION['user'];
    include "../../Database/connectBS.php";

    if (isset($_POST['update'])) {
        $full_name = $_POST['name'];
        $file = $_FILES['image']['name'];
        $address=$_POST['address'];
        $id=$_POST['id'];
        if(!empty($file)){
            $target_dir="../../Public/Images/Teacher/";
            $file_image=$target_dir.basename( $file);
            if($_FILES['image']['size']<500000){
                move_uploaded_file($_FILES['image']['tmp_name'],$file_image);
                $sql = "UPDATE teacher,picture_teacher 
                SET full_name='$full_name', address='$address', image='$file'  
                where teacher.id_teacher=picture_teacher.id_teacher 
                and  teacher.Email = '$emailUser'  and teacher.id_teacher=$id";
                $stm=mysqli_query($conn,$sql);
                header("location:./teacher_profile.php");
            }
        }else{
            $sql = "UPDATE teacher,picture_teacher 
                SET Full_name='$full_name',Address='$address'  
                where teacher.id_teacher=picture_teacher.id_teacher 
                and  teacher.Email = '$emailUser'  and teacher.id_teacher=$id";
                $stm=mysqli_query($conn,$sql);
                header("location:./teacher_profile.php");
        }
    }