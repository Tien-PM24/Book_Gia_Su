<html>

<head>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
  <style>
    /* .card-img-top {
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
      padding-bottom: 100px;
      /* Chiều cao của footer */
    /* }

    #footer {
      position: absolute;
      bottom: 0%;
      width: 100%;
      min-height: 100px;
      Chiều cao của footer 
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px;
     } 

    /* .btn {
      display: flex;
      text-align: center;
      justify-content: center;
      align-items: center;
    }  */
    .container--gird {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr;
      gap: 15px;
    }

    .product-card {
      display: flex;
      flex-direction: column;
      width: 300px;
      background: #eae3e4;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-left: 20px;
      padding: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .background--teacher {
      background: #FE7A15;
    }

    .background--teacher--course {
      background: #D45769;
    }

    .product-card__image {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .background--course {
      background: #FA9284;
    }

    .product-card__info {
      flex: 1;
    }

    .product-card__name {
      font-size: 18px;
      margin-bottom: 5px;
    }

    .product-card__description {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .product-card__buttons {
      display: flex;
      justify-content: space-between;
    }

    .product-card__button {
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
    }

    .product-card__button--primary {
      background-color: #007bff;
      color: #fff;
      width: 140px;
      height: 40px;
    }

    .product-card__button--secondary {
      background-color: #6c757d;
      color: #fff;
      width: 140px;
      height: 40px;
    }

    .product-card__button--primary--teacher {
      display: flex;
      justify-content: center;
      text-align: center;
      align-items: center;
      background: #007bff;
      width: 300px;
      height: 40px;
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
          $conn1 = $this->connection;
          $sql1 = "SELECT image, full_name,teacher.id_teacher as Teacher from teacher,picture_teacher
          where teacher.id_teacher=picture_teacher.id_teacher";
          $result1 = $conn1->query($sql1);
      ?>

          <div class="container--gird">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="product-card">
                <img src="../../Asset/Picture/Course/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                <div class="product-card__info">
                  <h3 class="product-card__name"><?php echo $row["name"] ?></h3><br>
                  <!-- <p class="product-card__description">Product description goes here.</p> -->
                  <div class="product-card__buttons">
                    <a href=""><button class="product-card__button product-card__button--primary">Enroll Now</button></a>
                    <button class="product-card__button product-card__button--secondary">Course Information</button>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <!-- <div class="container" style="margin-top: 60px;">
            <h1>All Course</h1>
            <div class="row">
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="" alt="">
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                      <a href="#" class="btn btn-primary">Join</a><br>
                      <a href="#" class="btn btn-secondary">See more</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div> -->

          <div class="container--gird">
            <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
              <div class="product-card">
                <img src="../../Asset/Picture/Teacher/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                <div class="product-card__info">
                  <h3 class="product-card__name"><?php echo $row["full_name"] ?></h3><br>
                  <!-- <p class="product-card__description">Product description goes here.</p> -->
                  <div class="product-card__buttons">
                    <button class="product-card__button product-card__button--primary--teacher">Course Information</button>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <!-- <div class="container" style="margin-top: 60px;">
            <h1>All Teacher</h1>
            <div class="row">
             
                <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="" alt="">
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                      <a href="./detailTeacher.php?detai_teacher=" class="btn btn-primary">See More</a>
                    </div>
                  </div>
                </div>
             
            </div>
          </div> -->
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