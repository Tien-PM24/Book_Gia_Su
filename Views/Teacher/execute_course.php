<?php 
    session_start();
    $emailUser=$_SESSION['user'];
    include "../../Database/connectBS.php";
?>
<?php
if (isset($_POST['btn'])) {
    $name_course = $_POST['Name'];
    $price = $_POST['Price'];
    $describe = $_POST['Body'];
    $quantity=$_POST['Quantity'];
    $time=$_POST['Time'];
    $start_day=$_POST['Starday'];
    $end_day=$_POST['Enday'];
    $courseBody=$describe."/".$quantity."/".$time."/"
    .$start_day."/".$end_day;
    $image = $_FILES["Image"]["name"];
    if ($image == "") {
        echo "Vui lòng chọn ảnh!";
    } else {
        $target_file="../../Public/Images/Course/";
        $file=$target_file.basename($image);
        $sql = "INSERT into `course`(name,price,body,image)
        values('$name_course','$price','$courseBody','$image')";

        if (mysqli_query($conn, $sql)) {
            move_uploaded_file($_FILES['Image']['tmp_name'],$file);
            $id_course=mysqli_insert_id($conn);
            $sql1="SELECT id_teacher from teacher where email='$emailUser'";
            $stm1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_assoc($stm1);
            $row=$row1['id_teacher'];
            $sql2="INSERT into teacher_course (id_teacher,id_course) values ('$row','$id_course')";
            $stm2=mysqli_query($conn,$sql2);
            header('location:./add_course.php');
        } else {
            echo "Thêm thất bại!";
        }
    }
}
?>