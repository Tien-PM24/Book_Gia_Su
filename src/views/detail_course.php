<?php include "../../src/core/connectDB.php"; ?>

<html>
    <head>
        <link rel="stylesheet" href="../../Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    </head>

    <style>
        .col-md-6 img {
            display: flex;
        }

    </style>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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

                        echo '<img src="../../Asset/Picture/Course/' . $row["image"] . '" alt="" width="350" class="img-fluid">';
                    ?>
                    <button class="btn btn-success" >Join</button>
                </div>
                <div class="col-md-6">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Number of students currently studying: <?php echo $showDetail->getNumberStudent($id); ?></p>
                    <p>Price this course: <?php  echo $row['price'];  ?></p>
                    <?php  $content = $row["body"]; 
                    $arrayBody = explode("/", $content) ;
                    $body = $arrayBody[0];
                    $number_student_book = $arrayBody[1];
                    $start_day = $arrayBody[3];
                    $end_day = $arrayBody[4];
                    $number_teach = $arrayBody[2]
                    ?>
                    <p>Describe: <?php  echo $body; ?></p>
                    <p>Number student book: <?php echo $number_student_book ?></p>
                    <p>Number teach on week: <?php echo $number_teach ?> </p>
                    <p>Day start: <?php echo $start_day ?></p>
                    <p>Day end: <?php echo $end_day ?></p>
                </div>
            </div>
        </div>
    </body>
</html>
