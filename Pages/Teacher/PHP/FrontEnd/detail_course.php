<?php

session_start();
$emailUser = $_SESSION['user'];
include "../../../../Database/conn.php";

if (isset($_GET['data_id'])) {
    $id = $_GET['data_id'];
    $sql = "SELECT * From course where ID_course='$id'";
    $result = mysqli_query($ketnoi, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<?php
}
?>
<link rel="stylesheet" href="../../../../Styles/Teacher/edit.css">
<form method="post" action="../BackEnd/update.php" enctype="multipart/form-data">
    <div class="div_image">
        <label for="image"><b>Image:</b></label><br>
        <input type="file" id="image" name="image" value="<?php echo $row['Image'] ?>">
    </div>
    <br><br>
    <div class="div_title">
        <label for="title"><b>Title:</b></label><br>
        <input type="text" id="title" name="title" value="<?php echo $row['Name'] ?>" required>
    </div>
    <br><br>
    <div class="div_price">
        <label for="name"><b>Price:</b> </label><br>
        <input type="text" id="name" name="price" value="<?php echo $row['Price'] ?>" required>
    </div>
    <input type="hidden" id="" name="id" value="<?php echo $row['ID_course'] ?>" required>
    <br><br>
    <button type="submit" name="update" style="background: green;">Update</button>
    <button class="dong" type="button" style="background: red;">Cancel</button>


</form>
<script>
    var btn = document.querySelector('.dong');
    btn.addEventListener('click', function(event) {
        event.preventDefault();
        location.href = "../FrontEnd/service.php";
    })
</script>

