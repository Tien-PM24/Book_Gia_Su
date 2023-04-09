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
    include "./inc/header.php";
    //require_once './inc/slide.php';
    include "./src/core/connectDB.php";

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
        <img class="card-img-top" src="./Asset/Picture/Course/<?php echo $row["Image"] ?>" alt="">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row["Name"] ?></h5>
          <a href="#" class="btn btn-primary">Join</a>
         <!-- Button trigger modal -->
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
        Details
      </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img src="./Asset/images/english1.jpg" alt="" height="250">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Join</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<?php





   
            }
        }
    







    // create instance of ShowDB class and call getAllCourse() method
    $show = new ShowDB();
    $show->getAllCourse();

    require_once './inc/footer.php';
    ?>
</body>

</html>