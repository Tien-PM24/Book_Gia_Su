<?php
?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Public/Styles/Student/profile.css">
   
</head>
<header>
        <?php
       include "./header.php";
       include "../../Database/connectBS.php";
        ?>
    </header>
<body style="margin-top: 100px;">
   
</body>
<div class="fui-card-profile-1">
    <div class="background-wrap">
        <div class="card-image-cover">
            <img
                src="https://i.ibb.co/1M0TF14/art-2.jpg"
                alt="fashui"
            />
        </div>
    <?php
        $sql = "SELECT student.id_student as id_student, image,full_name,email,address,job_title from picture_stu,student
        where student.id_student=picture_stu.id_student and  student.email = '$emailUser'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
 ?>
        <div class="card-avatar">
            <img
                src="../../Public/Images/Student/<?php echo $row['image'] ?>"
                alt=""
            />
        </div>
    </div>
    <div class="card-body">
        <h2 class="card-name"><?php echo $row["full_name"] ?></h2>
        <h2 class="card-desc"><?php echo $row["job_title"] ?></h2>
        <div class="card-button-wrap">
            <button class="card-btn card-btn--primary">
            <a href="./edit_profile.php?ID_student=<?php echo $row['id_student'] ?>">
                            Sửa
                        </a>
                
            </button>
        </div>
    </div>
</div>
<?php
        }
        ?>
</html>


