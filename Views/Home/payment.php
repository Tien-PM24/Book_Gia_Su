<?php
include "./header.php";
include "../../Database/connectBS.php";
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql = "SELECT * FROM course WHERE id_course = $id";
    $result = mysqli_query ($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['payment'])){
    $emailUser=$_SESSION['user'];
    $sql1 = "SELECT id_student,email FROM student WHERE email = '$emailUser'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $id_student=$row1['id_student'];
    $id_course=$_POST['id_course'];
    $price=$_POST['price'];

    $sql2="SELECT teacher.id_teacher as id_teacher from teacher,course,teacher_course 
    where teacher.id_teacher=teacher_course.id_teacher and course.id_course=teacher_course.id_course
    and teacher_course.id_course=$id_course";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $id_teacher=$row2['id_teacher'];

    if($emailUser===$row1['email']){
        $sql3="INSERT into payment (id_course, id_student, price, payment_day) 
        Values (' $id_course','$id_student','$price',Now())";
        $result3 = mysqli_query($conn, $sql3);

        $sql4="INSERT into student_teacher(id_teacher,id_student)
        values ('$id_teacher','$id_student')
        ";
         $result4 = mysqli_query($conn, $sql4);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
<link rel="stylesheet" href="./Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Public/Styles/Teacher/payment.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4"><?php echo $row['name']; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img src="../../Public/Images/Course/<?php echo $row['image']; ?>" alt="" class="img-fluid" height="40">
            </div>
            <div class="col-md-6">
                <h4>Bạn có chắc chắn mua khóa hoạc này với giá: <?php echo number_format($row['price']); ?> vnd</h4>
                <form method="POST">
                    <input type="hidden" name="id_course" value="<?php echo $id; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    <button name="payment" type="submit" class="btn btn-primary">Đồng ý</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php include "./footer.php" ?>

<style>
    .img-fluid{
        width: 278px;
        height: 400px;
    }
</style>