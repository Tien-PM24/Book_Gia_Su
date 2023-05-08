<?php include "../core/connectDB.php"; ?>
<html>
<head>
  <link rel="stylesheet" href="../../styles/product.css">
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh;">
  <div id="wrapper">
    <?php include "../../inc/header.php"; ?>
    <div id="content">
    <h2>All our courses</h2>
      <?php
      class ShowDB extends connectDB
      {
        public function getAllCourse()
        {
          error_reporting(0);
          $conn = $this->connection;
          $sql = "SELECT * FROM course";
          $result = $conn->query($sql);
          $conn1 = $this->connection;
          $sql1 = "SELECT DISTINCT teacher.id_teacher as Teacher,teacher.full_name, picture_teacher.image
                          FROM teacher, teacher_course, picture_teacher 
                          WHERE teacher.id_teacher = teacher_course.id_teacher 
                          AND teacher.id_teacher = picture_teacher.id_teacher";
          $result1 = $conn1->query($sql1);
      ?>
        
          <div class="container--gird">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="product-card">
                <img src="../../Asset/Picture/Course/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                <div class="product-card__info">
                  <h3 class="product-card__name"><?php echo $row["name"] ?></h3><br>
                  <div class="product-card__buttons">
                  <button type="button" class='product-card__button product-card__button--primary'  
                  <button type="button" class="product-card__button product-card__button--secondary" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='../../src/views/detail_course.php?id=<?php echo $row['id_course']; ?>'">
                      See More
                  </button>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <h2>All our teachers</h2>
          <div class="container--gird">
            <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
              <div class="product-card">
                <img src="../../Asset/Picture/Teacher/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                <div class="product-card__info">
                  <h3 class="product-card__name"><?php echo $row["full_name"] ?></h3><br>
                  <div class="product-card__buttons">
                  <button class="product-card__button product-card__button--primary--teacher" onclick="location.href='./detailTeacher.php?detai_teacher=<?php echo $row['Teacher'] ?>'">View Profile</button>
                  </div>
                </div>
              </div>
            <?php } ?>
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