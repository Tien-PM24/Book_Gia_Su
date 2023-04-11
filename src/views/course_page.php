<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
  .card-img-top {
    height: 300px; 
    object-fit: cover; 
  }
</style>
<body>
    <?php
    //include "../../inc/header.php";
    include "../../src/core/connectDB.php";

    class ShowDB extends connectDB
    {
        public function getAllCourse()
        {
            error_reporting(0);
            $conn = $this->connection;
            $sql = "SELECT * FROM course";
            $result = $conn->query($sql);

            ?>
            <div class="container">
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="../../Asset/Picture/Course/<?php echo $row["Image"] ?>" alt="">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row["Name"] ?></h5>
          <a href="#" class="btn btn-primary">Join</a>
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='./src/views/detail_course.php?id=<?php echo $row['ID_course']; ?>'">
          Details
        </button>
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
</body>
</html>