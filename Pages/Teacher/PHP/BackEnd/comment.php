<?php
session_start();

include "../../../../Database/conn.php";
$emailUser=$_SESSION['user'];
$sql = "SELECT Image,Name,Price,course.ID_course as Course
    from course,teacher,teacher_course
    where teacher.ID_teacher=teacher_course.ID_teacher
    and course.ID_course=teacher_course.ID_course
    and teacher.Email='$emailUser'";
$result = mysqli_query($ketnoi, $sql);

?>
<link rel="stylesheet" href="../../../../Styles/Teacher/comment.css">
<div class="container_comment">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="container_course">
            <img src="../../../../Asset/Picture/Course/<?php echo $row["Image"]?>" alt="">
            <p><?php echo $row["Name"]?></p>
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