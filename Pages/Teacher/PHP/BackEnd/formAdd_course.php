<?php 
    session_start();
    $emailUser=$_SESSION['user'];
?>

<?php
if (isset($_POST['btn'])) {
    $ten = $_POST['Name'];
    $gia = $_POST['Price'];
    $mota = $_POST['Body'];
    $quantity=$_POST['Quantity'];
    $time=$_POST['Time'];
    $star=$_POST['Starday'];
    $end=$_POST['Enday'];
    $courseBody=$mota."/".$quantity."/".$time."/"
    .$star."/".$end;
    $fileha = $_FILES["Image"];
    $tenfile = $fileha["name"];
    if ($fileha == "") {
        echo "Vui lòng chọn ảnh!";
    } else {
        $connect = mysqli_connect("localhost", 'root', '', "book_tutor") or die("connect fail !");
        $target_file="../../../../Asset/Picture/Course/";
        $file=$target_file.basename($tenfile);
        $sql = "INSERT into `course`(name,price,body,image)
            values('$ten','$gia','$courseBody','$tenfile')";

        if (mysqli_query($connect, $sql)) {
            move_uploaded_file($_FILES['Image']['tmp_name'],$file);
            $id_course=mysqli_insert_id($connect);
            $sql1="SELECT id_teacher from teacher where email='$emailUser'";
            $stm1=mysqli_query($connect,$sql1);
            $row1=mysqli_fetch_assoc($stm1);
            $row=$row1['id_teacher'];
            $sql2="INSERT into teacher_course (id_teacher,id_course) values ('$row','$id_course')";
            $stm2=mysqli_query($connect,$sql2);
            header('location:../FrontEnd/service.php');

        } else {
            echo "Thêm thất bại!";
        }
    }
}
?>
