<?php
session_start();

include "../../../../Database/conn.php";
$emailUser=$_SESSION['user'];
$sql = "SELECT image,name,price,course.id_course as course
    from course,teacher,teacher_course
    where teacher.id_teacher=teacher_course.id_teacher
    and course.id_course=teacher_course.id_course
    and teacher.email='$emailUser'";
$result = mysqli_query($ketnoi, $sql);

?>
<link rel="stylesheet" href="../../../../Styles/Teacher/comment.css">
<div class="container_comment">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="container_course">
            <img src="../../../../Asset/Picture/Course/<?php echo $row["image"]?>" alt="">
            <p><?php echo $row["name"]?></p>
        </div>
    <?php
    }
    ?>
    <div class="container_user_comment">
        <img src="" alt="">
        <p>Phan Thanh Lực</p>
    </div>
    <div class="container_conten_comment">
        <p>haha</p>
    </div>
</div>