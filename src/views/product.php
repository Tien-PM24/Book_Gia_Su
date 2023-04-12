<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .card-img-top {
      height: 300px;
      object-fit: cover;
    }
    body {
    height: 100%;
  }

  #wrapper {
    min-height: 100%;
    position: relative;
  }

  #content {
    padding-bottom: 100px; /* Chiều cao của footer */
  }

  #footer {
    position: absolute;
    bottom: 0%;
    width: 100%;
    min-height: 100px; /* Chiều cao của footer */
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
  }
  .btn{
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
  }
  </style>

  <?php
  include "../core/connectDB.php";
  ?>

<body style="display: flex; flex-direction: column; min-height: 100vh;">
  <div id="wrapper">
  <?php include "../../inc/header.php"; ?>
    <div id="content">
      <?php
      class ShowDB extends connectDB
      {
        public function getAllCourse()
        {
          error_reporting(0);
          $conn = $this->connection;
          $sql = "SELECT * FROM course";
          $result = $conn->query($sql);
          $conn1=$this->connection;
          $sql1="SELECT Image, Full_name,teacher.ID_teacher as Teacher from teacher,picture_teacher
          where teacher.ID_teacher=picture_teacher.ID_teacher";
           $result1 = $conn1->query($sql1);
      ?>
          <div class="container" style="margin-top: 60px;">
            <h1>All Course</h1>
            <div class="row">
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../../Asset/Picture/Course/<?php echo $row["Image"] ?>" alt="">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row["Name"] ?></h5>
                      <a href="#" class="btn btn-primary">Join</a><br>
                      <a href="#" class="btn btn-secondary">See more</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>

          <div class="container" style="margin-top: 60px;">
            <h1>All Teacher</h1>
            <div class="row">
              <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
                <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../../Asset/Picture/Teacher/<?php echo $row["Image"] ?>" alt="">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row["Full_name"] ?></h5>
                      <a href="./detailTeacher.php?detai_teacher=<?php echo $row['Teacher'] ?>" class="btn btn-primary">See More</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
      <?php
        }
      }
      $show = new ShowDB();
      $show->getAllCourse();
      ?>
    </div>
    <link rel="stylesheet" href="../../Styles/inc_styles/style_footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="footer_contact">
  <div class="content_footer">
    <div class="footer_left">
      <h3>Link Quick</h3>
      <p><a href="#">Home</a></p>
      <p><a href="#">Tutors</a></p>
      <p><a href="#">Courses</a></p>
      <p><a href="#">Class</a></p>
      <p><a href="#">Contact</a></p>
    </div>
    <div class="footer-right">
      <div class="right_content">
        <h3>Working hours</h3>
        <p>Monday: 8h00-21h00</p>
        <p>Tuesday: 8h00-21h00</p>
        <p>Wednesday: 8h00-21h00</p>
        <p>Thursday: 8h00-21h00</p>
        <p>Friday: 8h00-21h00</p>
      </div>
    </div>
    <div class="left_contact">
      <h3>Contact <span>KingDom</span></h3>
      <p><i class="fa-sharp fa-solid fa-location-dot"></i> 101b Le Huu Trac, Phuoc My, Son Tra, Đa Nang
      </p>
      <p><i class="fa-solid fa-envelope"></i> tientranplus2@gmail.com</p>
      <p><i class="fa-solid fa-phone"></i> (+84) 123 4567 889</p>
      <p><i class="fa-solid fa-phone"></i> (+84) 888 4567 809</p><br>
    </div>
  </div>

  <div class="contact_top">
    <a>Flow us:</a>
    <a href="#https://www.facebook.com"><i class="fa-brands fa-facebook" style="color:blue"></i> Facebook</a>
    <a href="#https://www.tiktok.com"><i class="fa-brands fa-tiktok"></i> Tiktok</a>
    <a href="#skype:yourusername?chat"><i class="fa-brands fa-skype"></i> Skype</a>
    <a href="#https://www.youtube.com"><i class="fa-brands fa-youtube"></i> Youtube</a>
  </div></br>
  <div class="footer_bottom">
    <p>Created By <span>KingDom </span>team</p>
    <p>students PNV24</p>
  </div><br>
</div>
  </div>
</body>

</html>