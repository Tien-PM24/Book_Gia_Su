<?php
include "../../Database/connectBS.php";
include "./header.php";
if (isset($_GET['detai_teacher'])) {
    $id = $_GET['detai_teacher'];

    $sql = "SELECT image, full_name,job_title, email,address from teacher,picture_teacher
        where teacher.id_teacher=picture_teacher.id_teacher
        and teacher.id_teacher='$id'";

    $stm = mysqli_query($conn, $sql);


    while( $row = mysqli_fetch_assoc($stm)){
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../Public/Styles/Home/detail_teacher.css">
    <form action="./add_comment.php" method="post">
    <div class="teacher-detail">
        <div class="teacher-image">
            <img src="../../Public/Images/Teacher/<?php echo $row['image'] ?>" alt="Hình ảnh giáo viên">
        </div>
        <div class="teacher-info">
            <h1><?php echo $row['full_name'] ?></h1>
            <p>Chức vụ: <?php echo $row['job_title'] ?></p>
            <p>Địa chỉ: <?php echo $row['address'] ?></p>
            <p>Email: <?php echo $row['email'] ?></p>
            <input type="hidden" name="id_teacher" value="<?php echo $id ?>">

            <ul>
                <li><i class="fa-brands fa-facebook"></i></li>
                <li><i class="fa-brands fa-linkedin"></i></li>
            </ul>
        </div>
    </div>
<?php
 }

 $sql="SELECT image,name,price,course.id_course as Course
      from course,teacher,teacher_course
      where teacher.id_teacher=teacher_course.id_teacher
      and course.id_course=teacher_course.id_course
      and teacher.id_teacher='$id'";

 $stm=mysqli_query($conn,$sql);
 ?>
    <div class="container" style="margin-top: 60px;">
            <h1>All Course</h1>

              <div class="container--gird">
                    <?php while ($row = mysqli_fetch_assoc($stm)) { ?>
                      <div class="product-card">
                        <img src="../../Public/Images/Course/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                        <div class="product-card__info">
                          <h3 class="product-card__name"><?php echo $row["name"] ?></h3><br>
                          <div class="product-card__buttons">
                          <button type="button" class='product-card__button product-card__button--primary' onclick="location.href='./payment.php?id=<?php echo $row['Course'] ?>'">Book now</button>
                          <button type="button" class="product-card__button product-card__button--secondary" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='./detail_course.php?id=<?php echo $row['Course']; ?>'">
                              See More
                          </button>
                          </div>
                        </div>
                      </div>
                    <?php } ?>


            </div>
          </div>

<?php
$sql = "SELECT content, full_name FROM student,comment
where comment.id_student=student.id_student and comment.id_teacher =$id";
$stm = mysqli_query($conn,$sql);
 ?>


<div class="container1">
  <h2>Comment</h2>
  <?php while ($row = mysqli_fetch_assoc($stm)) { ?>
    <div class="comment">
      <div class="comment-name"><?php echo $row['full_name']; ?></div>
      <div class="comment-content"><?php echo $row['content']; ?></div>
    </div>
  <?php } ?>
</div>


        <div class="container-comment">
          <div class="row-comment">
            <div class="col-comment">
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

