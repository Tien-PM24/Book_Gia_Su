<?php
include "../../Database/conn.php";
if (isset($_GET['detai_teacher'])) {
  $id = $_GET['detai_teacher'];
  $sql = "SELECT Image, Full_name,Job_title, Email,Address from teacher,picture_teacher
        where teacher.ID_teacher=picture_teacher.ID_teacher
        and teacher.ID_teacher='$id'";

  $stm = mysqli_query($ketnoi, $sql);
  while ($row = mysqli_fetch_assoc($stm)) {
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../Styles/inc_styles/detai.css">
    <form action="" method="post">
      <div class="teacher-detail">
        <div class="teacher-image">
          <img src="../../Asset/Picture/Teacher/<?php echo $row['Image'] ?>" alt="Hình ảnh giáo viên">
        </div>
        <div class="teacher-info">
          <h1><?php echo $row['Full_name'] ?></h1>
          <p>Chức vụ: <?php echo $row['Job_title'] ?></p>
          <p>Địa chỉ: <?php echo $row['Address'] ?></p>
          <p>Email: <?php echo $row['Email'] ?></p>
          <input type="hidden" name="id_course" value="<?php echo $id ?>">
          <ul>
            <li><i class="fa-brands fa-facebook"></i></li>
            <li><i class="fa-brands fa-linkedin"></i></li>
          </ul>
        </div>
      </div>
    <?php
  }



  $sql = "SELECT Image,Name,Price,course.ID_course as Course
 from course,teacher,teacher_course
 where teacher.ID_teacher=teacher_course.ID_teacher
 and course.ID_course=teacher_course.ID_course
 and teacher.ID_teacher='$id'";

  $stm = mysqli_query($ketnoi, $sql);
    ?>
    <div class="container" style="margin-top: 60px;">
      <h1>All Course</h1>
      <div class="row">
        <?php while ($row = mysqli_fetch_assoc($stm)) { ?>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="../../Asset/Picture/Course/<?php echo $row["Image"] ?>" alt="">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row["Name"] ?></h5>
                <a href="#=<?php echo $row['Course'] ?>" class="btn btn-primary">See More</a>
                <a href="#=<?php echo $row['Course'] ?>" class="btn btn-primary">Learn Now</a>
              </div>
            </div>
          </div>
        <?php } ?>



      </div>
    </div>

    <button type="submit" name="submit">ID</button>
    </form>
  <?php
  if (isset($_POST['submit'])) {
    $id = $_POST['id_course'];
    echo "<script>alert('$id')</script>";
  }
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
    .card-body a {
      display: flex;
      text-align: center;
      justify-content: center;
      align-items: center;
    }

    .card-img-top {
      height: 300px;
      object-fit: cover;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  </html>