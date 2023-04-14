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
                    <button class="btn btn-success" >Comment</button>
                </div>
                <div class="col-md-6">
                    <?php
                        echo "<h3>Name: " . $row['name'] . "</h3>";
                        echo "<p>Price: " . $row['price'] . "</p>";
                        echo "<p>Description: " . $row['body'] . "</p>";

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
