<?php
include "../../Database/conn.php";
if (isset($_GET['detai_teacher'])) {
    $id = $_GET['detai_teacher'];
<<<<<<< HEAD
    $sql = "SELECT  image, full_name,job_title, email,address from teacher,picture_teacher
        where teacher.id_teacher=picture_teacher.id_teacher
        and teacher.id_teacher='$id'";
=======
    $sql = "SELECT image, full_name,job_title, email,address from teacher,picture_teacher
        where teacher.id_teacher=picture_teacher.id_teacher
        and teacher.id_teacher='$id'";

>>>>>>> c3bd49e3b32c3f179354430524cf6a46c3cb5c61
    $stm = mysqli_query($ketnoi, $sql);


    while( $row = mysqli_fetch_assoc($stm)){
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../Styles/inc_styles/detai.css">
    <form action="addComment.php" method="post">
    <div class="teacher-detail">
        <div class="teacher-image">
            <img src="../../Asset/Picture/Teacher/<?php echo $row['image'] ?>" alt="Hình ảnh giáo viên">
        </div>
        <div class="teacher-info">
            <h1><?php echo $row['full_name'] ?></h1>
            <p>Chức vụ: <?php echo $row['job_title'] ?></p>
            <p>Địa chỉ: <?php echo $row['address'] ?></p>
            <p>Email: <?php echo $row['email'] ?></p>
<<<<<<< HEAD
            <input type="hidden" name="id_teacher" value="<?php echo $id ?>">
=======
>>>>>>> c3bd49e3b32c3f179354430524cf6a46c3cb5c61
            <ul>
                <li><i class="fa-brands fa-facebook"></i></li>
                <li><i class="fa-brands fa-linkedin"></i></li>
            </ul>
        </div>
    </div>
<?php
 }
<<<<<<< HEAD
 $sql="SELECT image,Name,Price,course.id_course as Course
=======
 $sql="SELECT Image,Name,Price,course.id_course as Course
>>>>>>> c3bd49e3b32c3f179354430524cf6a46c3cb5c61
 from course,teacher,teacher_course
 where teacher.id_teacher=teacher_course.id_teacher
 and course.id_course=teacher_course.id_course
 and teacher.id_teacher='$id'";

 $stm=mysqli_query($ketnoi,$sql);
 ?>
    <div class="container" style="margin-top: 60px;">
            <h1>All Teacher</h1>
            <div class="row">
              <?php while ($row = mysqli_fetch_assoc($stm)) { ?>
                <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../../Asset/Picture/Course/<?php echo $row["image"] ?>" alt="">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row["name"] ?></h5>
                      <a href="#=<?php echo $row['Course'] ?>" class="btn btn-primary">See More</a>
                      <a href="#=<?php echo $row['Course'] ?>" class="btn btn-primary">Learn Now</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>

<?php
$sql = "SELECT content, full_name FROM student,comment
where comment.id_student=student.id_student and comment.id_teacher =$id";
$stm = mysqli_query($ketnoi,$sql);
 ?>


<div class="container">
  <h2>Comment</h2>
  <?php while ($row = mysqli_fetch_assoc($stm)) { ?>
    <div class="comment">
      <div class="comment-name"><?php echo $row['full_name']; ?></div>
      <div class="comment-content"><?php echo $row['content']; ?></div>
    </div>
  <?php } ?>
</div>


        <div class="container">
          <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                  <textarea class="form-control" id="comment" rows="3" placeholder="Enter comment text" name="comment-content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="btn">Post a comment</button>
              </form>
            </div>
          </div>
        </div>
    <?php

 }

?>
</body>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
</html>
<style>
    .card-body a{
        display: flex;
        text-align: center;
        justify-content: center;
        align-items: center;
    }
    .card-img-top {
      height: 300px;
      object-fit: cover;
    }
    .container {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
  }
  h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }
  .comment-name {
    font-weight: bold;
    margin-bottom: 5px;
  }
  .comment-content {
    margin-bottom: 10px;
  }
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>