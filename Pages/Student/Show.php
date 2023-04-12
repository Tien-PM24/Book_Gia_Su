<?php
    // session_start();
    // $emailUser = $_SESSION['user'];
  
// $store_admin[]=[$Email];

?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Styles/Student/Show.css">
   
</head>
<header>
        <?php
       include "./header.php";
       include "./conncect.php";
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
        $sql = "SELECT student.ID_student as ID_student, Image,Full_name,Email,Address,Job_title from picture_stu,student
        where student.ID_student=picture_stu.ID_student and  student.Email = '$emailUser'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
 ?>
        <div class="card-avatar">
            <img
                src="../../Asset/Picture/Student/<?php echo $row['Image'] ?>"
                alt="fashui"
            />
        </div>
    </div>
    <div class="card-body">
        <h2 class="card-name"><?php echo $row["Full_name"] ?></h2>
        <h2 class="card-desc"><?php echo $row["Job_title"] ?></h2>
        <div class="card-button-wrap">
            <button class="card-btn card-btn--secondary">
                Button
            </button>
            <button class="card-btn card-btn--primary">
            <a href="edit.php?ID_student=<?php echo $row['ID_student'] ?>">
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

<script>
   var profile=document.querySelector('.profileColor');
   profile.style.background="white";
</script>
