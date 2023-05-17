<?php include "./header.php" ?>
<html>
<head>
  <link rel="stylesheet" href="../../Public/Styles/Home/index.css">
</head>
<body>
  <?php
  include "../../Database/connectDB.php";

  class ShowDB extends connectDB
  {
    public function getAllCourseByName()
    {
      $conn = $this->connection;
      $sql = "SELECT DISTINCT REGEXP_REPLACE(name, '[0-9]', '') AS subject FROM course;";
      $nameResult = $conn->query($sql);

      while ($nameRow = mysqli_fetch_assoc($nameResult)) {
        $name = $nameRow['subject'];
  ?>

        <div class="container">
          <h2>Các khóa học về <?php echo $name; ?></h2>
          <div class="row">
            <?php
            $sql = "SELECT course.id_course, course.name, course.price, course.body, course.image FROM course WHERE course.name LIKE '$name%'";

            $result = $conn->query($sql);

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
          </div>
        </div>
    <?php }
    }
  }
  $show = new ShowDB();
  $show->getAllCourseByName();
    ?>
</body>
<script>
  var course_page=document.querySelector(".course_page");
  course_page.style.borderBottom="2px solid black"
</script>
</html>
<?php include "./footer.php" ?>