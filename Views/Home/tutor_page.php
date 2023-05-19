<?php include "./header.php"; ?>
<?php include "../../Database/connectDB.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Pages</title>
    <link rel="stylesheet" href="../../Public/Styles/Home/index.css">
</head>

<body>
    <?php
    class ShowTutor extends ConnectDB
    {
        function getAllTutor()
        {
            //error_reporting(0);
            $conn = $this->connection;
            $sql = "SELECT DISTINCT teacher.id_teacher,teacher.full_name, picture_teacher.image
                    FROM teacher, teacher_course, picture_teacher 
                    WHERE teacher.id_teacher = teacher_course.id_teacher 
                    AND teacher.id_teacher = picture_teacher.id_teacher;
                    ";
            $result = $conn->query($sql);
    ?>


            <div class="container--gird">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="product-card">
                        <img src="../../Public/Images/Teacher/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                        <div class="product-card__info">
                            <h3 class="product-card__name"><?php echo $row["full_name"] ?></h3><br>
                            <div class="product-card__buttons">
                                <button class="product-card__button product-card__button--primary--teacher" onclick="location.href='./detail_teacher.php?detai_teacher=<?php echo $row['id_teacher']; ?>'">View profile</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            </div>
    <?php
        }
    }

    $showTutor = new ShowTutor();
    $showTutor->getAllTutor();

    include "./footer.php";
    ?>
</body>
<script>
    var tutor = document.querySelector('.tutor_page');
    tutor.style.borderBottom = "4px solid orangered";
    tutor.style.borderRadius = "2px"
</script>

</html>