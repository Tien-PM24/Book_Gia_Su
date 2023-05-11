<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="../../Public/Styles/Home/index.css">
<link rel="stylesheet" href="./Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../Public/Styles/Teacher/payment.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

</html>
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

    $sql3="SELECT id_student from payment where id_student=$id_student";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);

    if($id_student===$row3['id_student']){
        echo "<script>swal.fire('Lỗi','Đã đã đăng ký khóa học này','error')</script>";
        
    }else if($emailUser===$row1['email']){
        $sql3="INSERT into payment (id_course, id_student, price, payment_day) 
        Values (' $id_course','$id_student','$price',Now())";
        $result3 = mysqli_query($conn, $sql3);

        $sql4="INSERT into student_teacher(id_teacher,id_student)
        values ('$id_teacher','$id_student')
        ";
         $result4 = mysqli_query($conn, $sql4);

         echo "<script>swal.fire('Thành công','Đã đã đăng ký thành công khóa học này','success')</script>";
    }else{
        echo "<script>swal.fire('Lỗi','Vì bạn là giáo viên nên bạn không thể đăng ký','error')<>";
    }
}
?>
<body>
    <div class="product-card">
        <h1 class="my-4"><?php echo $row['name']; ?></h1>
        <div class="product-card__info">
            <div class="col-md-6">
                <img src="../../Public/Images/Course/<?php echo $row['image']; ?>" alt="" class="img-fluid" height="40">
            </div>
            <div class="product-card__name">
                <h4>Bạn có chắc chắn mua khóa hoạc này với giá: <?php echo number_format($row['price']); ?> vnd</h4>
                <form method="POST">
                    <input type="hidden" name="id_course" value="<?php echo $id; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    <button name="payment" type="submit" class="product-card__button product-card__button--primary--teacher">Đồng ý</button>
                </form>
            </div>
        </div>
    </div>
</body>


<?php include "./footer.php" ?>

<style>
    .img-fluid{
        width: 100%;
height: 400px;
object-fit: cover;
border-radius: 5px;
    }

    .agree{
        width: 150px;
        height: 60px;
        border-radius: 10px;
    }

</style>