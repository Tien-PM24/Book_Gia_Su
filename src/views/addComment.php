<?php 
include "../../Database/conn.php";
session_start();
  $emailUser=$_SESSION['user'];
if(isset($_POST['btn'])){
  $tutor_id = $_POST['id_teacher'];
  $content = $_POST["comment-content"];
  if (!empty($content)) {
    $sql1="SELECT id_student as ID from student where email='$emailUser'";
    $stm=mysqli_query($ketnoi,$sql1);
    $row=mysqli_fetch_assoc($stm);
    $id_student=$row['ID'];
    $sql = "INSERT INTO comment (id_teacher, content, id_student) values ('$tutor_id', '$content', ' $id_student')"; 
    $stm1=mysqli_query($ketnoi,$sql);
    header("location: detailTeacher.php?detai_teacher=$tutor_id");
  } 
}
?>