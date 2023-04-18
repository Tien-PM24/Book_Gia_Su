<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_tutor";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

$sql = "SELECT image,name,price,course.id_course as Course
        from course,teacher,teacher_course
        where teacher.id_teacher=teacher_course.id_teacher
        and course.id_course=teacher_course.id_course
        and teacher.email='$emailUser'";
$result = mysqli_query($conn, $sql);
?>
    <div class="container" id="iteam_course">
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-3">
          <div class="card" >
            <img class="card-img-top" src="../../../../Asset/Picture/Course/<?php echo $row["image"] ?>" alt="">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["name"] ?></h5>
              <h5 class="card-title"><?php echo $row["price"] ?></h5>
              <a href="../FrontEnd/detail_course.php?data_id=<?php echo $row['Course'] ?>" class="btn btn-primary ml-3" >Edit</a> 
              <a href="../BackEnd/delete.php?delete_id=<?php echo $row['Course'] ?>" class="btn btn-primary ml-3" >Delete</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

<?





?>
<link rel="stylesheet" href="../FrontEnd/style_course.css">

