<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>
        <?php
        include "./inc/header.php";
        //require_once './inc/slide.php';
        include "./src/core/connectDB.php";

       class ShowDB extends connectDB {
            public function getAllCourse() {
                error_reporting(0);
                $conn = $this->connection;
                $sql = "SELECT * FROM course";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<div class='row'>";
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='col-md-3'>";
                        echo "<div class='card'>";
                        echo "<img src='" . $row["img"] . "' class='card-img-top' alt='" . $row["name"] . "'>";
                        echo "<div class='card-body'>";
                        echo "<a href='#' class='btn btn-primary'>Enjoy</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
            
                        $count++;
                        if ($count == 4) {
                        echo "</div><div class='row'>";
                        $count = 0;
                        }
                    }

                    echo "</div>";
                } else {
                    echo "Không có sản phẩm.";
                }
                
                $conn->close();
            }
        }

        // create instance of ShowDB class and call getAllCourse() method
        $show = new ShowDB();
        $show->getAllCourse();

        require_once './inc/footer.php';
        ?>
    </body>
</html>

