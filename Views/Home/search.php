<?php include "../../Database/connectDB.php"; 
include "./header.php";
?>

<html>

<head>
    <!doctype html>
    <html lang="en">
    <link rel="stylesheet" href="../../Public/Styles/Home/index.css">
</html>
</head>

<style>

</style>

<body>

    <div class="container">
        <div class="row">
            <?php
            class ShowCourse extends ConnectDB
            {
                public function getAllCourse($search)
                {
                    $connection = $this->connection;

                    if (!empty($search)) {
                        $sql = "SELECT * FROM course WHERE Name LIKE '%$search%' OR Body LIKE '%$search%' OR Price LIKE '%$search%'";
                        $result = $connection->query($sql);

                        if ($result->num_rows > 0) {
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
                <?php
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