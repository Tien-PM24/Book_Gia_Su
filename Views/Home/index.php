
<?php include "../../Database/connectDB.php"; ?>
<html>
<head>
  <link rel="stylesheet" href="../../Public/Styles/Home/index.css">
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh;">
  <div id="wrapper">
    <?php include "./header.php"; ?>
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
                <img src="../../Public/Images/Course/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                <div class="product-card__info">
                  <h3 class="product-card__name"><?php echo $row["name"] ?></h3><br>
                  <div class="product-card__buttons">
                  <button type="button" class='product-card__button product-card__button--primary' onclick="location.href='./payment.php?id=<?php echo $row['id_course']; ?>'">Book now</button>
                  <button type="button" class="product-card__button product-card__button--secondary" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='./detail_course.php?id=<?php echo $row['id_course']; ?>'">
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
                <img src="../../Public/Images/Teacher/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                <div class="product-card__info">
                  <h3 class="product-card__name"><?php echo $row["full_name"] ?></h3><br>
                  <div class="product-card__buttons">
                  <button class="product-card__button product-card__button--primary--teacher" onclick="location.href='./detail_teacher.php?detai_teacher=<?php echo $row['Teacher'] ?>'">View Profile</button>
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

      include "./footer.php";
?>
   
</body>
<script>
  var home=document.querySelector('.home');
  home.style.borderBottom="4px solid orangered";
  home.style.borderRadius="2px"

</script>
</html>