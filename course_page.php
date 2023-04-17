

<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
  .card {
    position: relative;
    overflow: hidden;
    margin-top: 30px;
    text-align: center;
  }

  .card .card-img-top {
    display: block;
    transition: transform 0.2s ease-in-out;
  }

  .card-img-top:hover {
    transition: .5s;
    transform: scale(1.1);
  }


  button:hover {
    color: #7ec9fa;
    box-shadow: 0 0 15px #0197fc;
    text-shadow: 0 0 15px #0197fc;
  }

  .col-md-3 img{
    width: 265px;
    height: 380px;
    object-fit: cover;
    transform-origin: bottom left;
  }

  a {
    text-decoration: none;
  }

  @media screen and (max-width: 1864px) {
    .col-md-3 img{
    width: 345px;
    height: 420px;
    object-fit: cover;
    transform-origin: bottom left;
    }

}

</style>
<body>
<?php
include "./src/core/connectDB.php";

class ShowDB extends connectDB
{
    public function getAllCourseByName()
    {
        $conn = $this->connection;
        $sql = "SELECT DISTINCT name FROM course";
        $nameResult = $conn->query($sql);

        while ($nameRow = mysqli_fetch_assoc($nameResult)) {
            $name = $nameRow['name'];
            ?>

            <div class="container">
            <h2>Các khóa học về <?php echo preg_replace('/\d+/', '', $name);?></h2>
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM course WHERE name='$name'";
                    
                    $result = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="./Asset/Picture/Course/<?php echo $row["image"] ?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["name"] ?></h5>
                                    <button type="button" class='btn btn-success ml-3' onclick="location.href='./payment.php?id=<?php echo $row['id_course']; ?>'">Book</button>
                                    <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='./src/views/detail_course.php?id=<?php echo $row['id_course']; ?>'">
                                        Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        <?php }
    }
}

// create instance of ShowDB class and call getAllCourseByName() method
$show = new ShowDB();
$show->getAllCourseByName();
?>

</body>

</html>