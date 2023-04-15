
<?php include "./src/core/connectDB.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/Teacher/tutor.css">
    <title>Tutor Pages</title>
</head>

<body>
    <?php
    class ShowTutor extends ConnectDB {
        function getAllTutor () {
            //error_reporting(0);
            $conn = $this->connection;
            $sql = "SELECT DISTINCT teacher.id_teacher,teacher.full_name, picture_teacher.image
                    FROM teacher, teacher_course, picture_teacher 
                    WHERE teacher.id_teacher = teacher_course.id_teacher 
                    AND teacher.id_teacher = picture_teacher.id_teacher;
                    ";
            $result = $conn->query($sql);
            ?> 
            <div class="container">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-img">
                                <img src="./Asset/Picture/Teacher/<?php echo $row["image"] ?> " alt="" /> 
                            </div><br><br>
                            <div class="information">
                                <p><?php echo $row["full_name"] ?></p>
                            </div>
                            <button class="btn btn-primary" onclick="location.href='./src/views/tutor_profile.php?id=<?php echo $row['id_teacher'];?>'">View profile</button>
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

    include "./inc/footer.php";
    ?> 
</body>
</html>
