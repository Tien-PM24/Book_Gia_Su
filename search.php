<?php include "./src/core/connectDB.php"; ?>

<html>
<head>
    <link rel="stylesheet" href="./Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>

<style>
    .card img {
    height:380px; 
    width:254px;
    object-fit: cover;
    }

</style>

<body>
    <div class="container">
        <div class="row">
            <?php
            class ShowCourse extends ConnectDB {
                public function getAllCourse($search) {
                    $connection = $this->connection;

                    if (!empty($search)) {
                        $sql = "SELECT * FROM course WHERE Name LIKE '%$search%' OR Body LIKE '%$search%' OR Price LIKE '%$search%'";
                        $result = $connection->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="col-md-3">';
                                echo '<div class="card">';
                                echo '<img src="./Asset/Picture/Course/' . $row["Image"] . '" alt="">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $row["Name"] . '</h5>';
                                echo '<button class="btn btn-primary mr-5">Enjoy </button>';
                                echo '<a href="./src/views/detail_course.php?id=' . $row["ID_course"] . '" class="btn btn-primary">Detail</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="col-md-12">';
                            echo '<div class="alert alert-danger" role="alert">No result found</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="col-md-12">';
                        echo '<div class="alert alert-danger" role="alert">Please enter a search keyword</div>';
                        echo '</div>';
                    }
                }
            }

            $search = isset($_GET['search']) ? $_GET['search'] : '';

            $showCourse = new ShowCourse();
            $showCourse->getAllCourse($search);
            ?>
        </div>
    </div>
</body>
</html>
