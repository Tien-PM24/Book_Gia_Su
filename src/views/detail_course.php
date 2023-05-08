<?php include "../../src/core/connectDB.php"; ?>

<html>
    <head>
        <link rel="stylesheet" href="../../Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    </head>

    <style>
        .col-md-6 img {
            margin-left: 250px;
        }
        .col-md-6 button {
            margin-left: 300px;
            margin-top: 30px;
        }

    </style>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 left">
                    <?php
                        class ShowDetail extends ConnectDB {
                            public function getCourse($id) {
                                $connection = $this->connection;
                                $sql = "SELECT * FROM course WHERE id_course = $id";
                                $result = $connection->query($sql);
                                $row = mysqli_fetch_assoc($result);
                                return $row;
                            }

                            public function getNumberStudent($id) {
                                $connection = $this->connection;
                                $sql = "SELECT COUNT(DISTINCT id_student) as num_students
                                        FROM payment
                                        WHERE id_course = $id";
                                $result = $connection->query($sql);
                                $row = mysqli_fetch_assoc($result);
                                return $row['num_students'];    

                            }
                            
                        }

                        $id = isset($_GET['id']) ? $_GET['id'] : null;
                        if (!$id) {
                            exit;
                        }

                        $showDetail = new ShowDetail();
                        $row = $showDetail->getCourse($id);
                        ?>
                        
                       <img src="../../Asset/Picture/Course/<?php echo $row["image"] ?>" alt="" height="350" id="img-fluid">
                   
                    <br />
                    <button class="btn btn-success"  onclick="location.href='../../payment.php?id=<?php echo $row['id_course']; ?>'">Book now</button>
                </div>
                <div class="col-md-6">
                    <h3><?php echo $row['name']; ?></h3>
                    <b><p>Number of students currently studying:</b> <?php echo $showDetail->getNumberStudent($id); ?></p>
                    <b><p>Price this course:</b> <?php  echo $row['price'];  ?> vnđ</p>
                    <?php  $content = $row["body"]; 
                    $arrayBody = explode("/", $content) ;
                    $body = $arrayBody[0];
                    $number_student_book = $arrayBody[1];
                    $start_day = $arrayBody[3];
                    $end_day = $arrayBody[4];
                    $number_teach = $arrayBody[2]
                    ?>
                    <b><p>Describe:</b> <?php  echo $body; ?></p>
                    <b><p>Number student book:</b> <?php echo $number_student_book ?></p>
                    <b><p>Number teach on week:</b> <?php echo $number_teach ?> </p>
                    <b><p>Day start:</b> <?php echo $start_day ?></p>
                    <b><p>Day end:</b> <?php echo $end_day ?></p>
                </div>
            </div>
        </div>
    </body>
</html>