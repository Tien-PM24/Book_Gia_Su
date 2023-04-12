<?php
session_start();
include "./conncect.php";
$emailUser = $_SESSION['user'];
if(isset($_GET['ID_student'])) {
  $id=$_GET['ID_student'];
  $sql = "SELECT student.ID_student as ID_student, Image,Full_name,Email,Address from picture_stu,student
            where student.ID_student=picture_stu.ID_student and  student.Email = '$emailUser' and student.ID_student=$id";
  $result = mysqli_query($conn, $sql);
  $row=mysqli_fetch_assoc($result);
  
  $fullname = $row['Full_name'];
  $email = $row['Email'];
  $address = $row['Address'];
  $avt=$row['Image'];

 

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
      SET Full_name='$fullname', Email='$email', Address='$address', Image='$avt'  
      where student.ID_student=picture_stu.ID_student 
      and  student.Email = '$emailUser'  and student.ID_student=$id";
      $result = mysqli_query($conn, $sql);
      header("location: Show.php");
    }
  }else{
    $sql = "UPDATE student,picture_stu 
    SET Full_name='$fullname', Email='$email', Address='$address'  
    where student.ID_student=picture_stu.ID_student 
    and  student.Email = '$emailUser'  and student.ID_student=$id";
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