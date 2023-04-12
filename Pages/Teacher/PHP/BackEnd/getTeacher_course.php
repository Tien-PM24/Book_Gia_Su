
<?php

    // session_start();
    // $emailUser = $_SESSION['user'];
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_tutor";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
$sql = "SELECT Image,Name,Price,course.ID_course as Course
from course,teacher,teacher_course
where teacher.ID_teacher=teacher_course.ID_teacher
and course.ID_course=teacher_course.ID_course
and teacher.Email='$emailUser'";
$result = mysqli_query($conn, $sql);
?>
    <div class="container">
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../../../../Asset/Picture/Course/<?php echo $row["Image"] ?>" alt="">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["Name"] ?></h5>
              <h5 class="card-title"><?php echo $row["Price"] ?></h5>
              <a href="../FrontEnd/detail_course.php?data_id=<?php echo $row['Course'] ?>" class="btn btn-primary" >Edit</a> 
              <a href="../BackEnd/delete.php?delete_id=<?php echo $row['Course'] ?>" class="btn btn-primary" >Delete</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

<?





?>
<link rel="stylesheet" href="../FrontEnd/style_course.css">
<style>
    a.Detail{
        text-decoration: none;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 350px;
        height: 30px;
        border-radius: 8px;
        background: green;
        color: #000;
    }

    
</style>

