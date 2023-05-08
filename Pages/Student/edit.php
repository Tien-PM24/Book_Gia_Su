<?php
session_start();
include "./conncect.php";
$emailUser = $_SESSION['user'];
if(isset($_GET['ID_student'])) {
  $id=$_GET['ID_student'];
  $sql = "SELECT student.id_student as id_student, image,full_name,email,address from picture_stu,student
            where student.id_student=picture_stu.id_student and  student.email = '$emailUser' and student.id_student=$id";
  $result = mysqli_query($conn, $sql);
  $row=mysqli_fetch_assoc($result);
  
  $fullname = $row['full_name'];
  $email = $row['email'];
  $address = $row['address'];
  $avt=$row['image'];

 

}


if(isset($_POST['update'])) {
  $id = $_GET['ID_student'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $avt=$_FILES['avt']['name'];
  if(!empty($avt)){
    $taget_dir="../../Asset/Picture/Student/";
    $taget_file=$taget_dir.basename($avt);
    if($_FILES['avt']['size']<500000){
      move_uploaded_file($_FILES['avt']['tmp_name'],$taget_file);
      $sql = "UPDATE student,picture_stu 
      SET full_name='$fullname', email='$email', address='$address', image='$avt'  
      where student.id_student=picture_stu.id_student 
      and  student.email = '$emailUser'  and student.id_student=$id";
      $result = mysqli_query($conn, $sql);
      header("location: Show.php");
    }
  }else{
    $sql = "UPDATE student,picture_stu 
    SET full_name='$fullname', email='$email', address='$address'  
    where student.id_student=picture_stu.id_student 
    and  student.email = '$emailUser'  and student.id_student=$id";
    $result = mysqli_query($conn, $sql);
    header("location: Show.php");
  }
  
}

?>
<link rel="stylesheet" href="../../Styles/Student/edit.css">
<form method="post" enctype="multipart/form-data">
  <div>
    <label for="fullname">Họ và tên:</label>
    <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
  </div>
  <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" >
  </div>
  <div>
    <label for="address">Địa chỉ:</label>
    <input type="text" id="address" name="address" value="<?php echo $address; ?>" >
  </div>
  <div>
    <label for="avt">Ảnh đại diện:</label>
    <span><img src="../../Asset/Picture/Student/<?php echo $avt; ?>" width="100px"; height="120px"></span>
    <input type="file" id="" name="avt" value="<?php echo $avt; ?>" >
  </div>
  <button type="submit" name="update">Cập nhật</button>
</form>

<?php
mysqli_close($conn);
?>