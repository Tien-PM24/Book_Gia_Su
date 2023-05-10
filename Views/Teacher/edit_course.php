<?php

session_start();
$emailUser = $_SESSION['user'];
include "../../Database/connectBS.php";

if (isset($_GET['data_id'])) {
    $id = $_GET['data_id'];
    $sql = "SELECT * From course where id_course='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<?php
}
?>
<link rel="stylesheet" href="../../Public/Styles/Teacher/edit_course.css">
<form method="post" action="./update_course.php" enctype="multipart/form-data">
    <div class="div_image">
        <label for="image"><b>Image:</b></label><br>
        <input type="file" id="image" name="image" value="<?php echo $row['image'] ?>">
    </div>
    <br><br>
    <div class="div_title">
        <label for="title"><b>Title:</b></label><br>
        <input type="text" id="title" name="title" value="<?php echo $row['name'] ?>" required>
    </div>
    <br><br>
    <div class="div_price">
        <label for="name"><b>Price:</b> </label><br>
        <input type="text" id="name" name="price" value="<?php echo $row['price'] ?>" required>
    </div>
    <input type="hidden" id="" name="id" value="<?php echo $row['id_course'] ?>" required>
    <br><br>
    <button type="submit" name="update" style="background: green;">Update</button>
    <button class="dong" type="button" style="background: red;">Cancel</button>


</form>
<script>
    var btn = document.querySelector('.dong');
    btn.addEventListener('click', function(event) {
        event.preventDefault();
        location.href = "./add_course.php";
    })
</script>
