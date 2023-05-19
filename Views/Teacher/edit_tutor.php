<?php session_start();
      $emailUser=$_SESSION['user'];
      include "../../Database/connectBS.php";
 ?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Profile</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

</head>
<body>
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT teacher.ID_teacher as ID_teacher, Image,Full_name,Email,Address,Password from picture_teacher,teacher
    where teacher.ID_teacher=picture_teacher.ID_teacher and  teacher.Email = '$emailUser' and teacher.ID_teacher=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result)
  ?>
 <link rel="stylesheet" href="../../Public/Styles/Teacher/edit_teacher.css">
<form method="post" action="./update_teacher.php" enctype="multipart/form-data">
    <div class="div_image">
        <label for="image"><b>Image:</b></label><br>
        <input type="file" id="image" name="image" value="<?php echo $row['Image'] ?>">
    </div>
    <br><br>
    <div class="div_title">
        <label for="title"><b>Name:</b></label><br>
        <input type="text" id="title" name="name" value="<?php echo $row['Full_name'] ?>" required>
    </div>
    <br><br>
    <div class="div_price">
        <label for="name"><b>Address:</b> </label><br>
        <input type="text" id="name" name="address" value="<?php echo $row['Address'] ?>" required>
    </div>
    <input type="hidden" id="" name="id" value="<?php echo $row['ID_teacher'] ?>" required>
    <br><br>
    <button type="submit" name="update" style="background: green;">Update</button>
    <button class="dong" type="button" style="background: red;">Cancel</button>


</form>
  <?php } ?>
</body>
<script>
    var btn = document.querySelector('.dong');
    btn.addEventListener('click', function(event) {
        event.preventDefault();
        location.href = "./teacher_profile.php";
    })
</script>
