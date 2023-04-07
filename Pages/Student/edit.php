<?php
include "./conncect.php";

if(isset($_POST['update'])) {
  $id = $_POST['id'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $avt=$_POST['avt'];

  $sql = "UPDATE student SET Full_name='$fullname', Email='$email', Address='$address', Image='$avt' WHERE ID_student='$id'";
  $result = mysqli_query($conn, $sql);
  header("location: Show.php");
}

if(isset($_GET['ID_student'])) {
  $id = $_GET['ID_student'];
  $sql = "SELECT * FROM student WHERE ID_student=$id";
  $result = mysqli_query($conn, $sql);

  if($row=mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['Full_name'];
    $email = $row['Email'];
    $address = $row['Address'];
    // $avt=$row['Image'];
  } else {
    echo "Không tìm thấy học sinh";
    exit();
  }
} else {
  echo "Không tìm thấy học sinh";
  exit();
}
?>

<form method="POST" >
  <div>
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" value="<?php echo $id; ?>" readonly>
  </div>
  <div>
    <label for="fullname">Họ và tên:</label>
    <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required>
  </div>
  <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
  </div>
  <div>
    <label for="address">Địa chỉ:</label>
    <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
  </div>
  <!-- <div>
    <label for="avt">Ảnh đại diện:</label>
    <span><img src="<?php echo $avt; ?>" width="100px"; height="120px"></span>
    <input type="file" id="" name="avt" value="<?php echo $avt; ?>" required>
  </div> -->
  <button type="submit" name="update">Cập nhật</button>
</form>

<?php
mysqli_close($conn);
?>
