<?php include "../../src/core/connectDB.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Profile tutor</title>
</head>

<style> 
.col-md-6 img{
    width: 265px;
    height: 380px;
    object-fit: cover;
    transform-origin: bottom left;
}

.col-md-3 img{
    width: 265px;
    height: 380px;
    object-fit: cover;
    transform-origin: bottom left;
}

.personal-profile {
    display: flex;
    justify-content: center;
}
</style>

<body>
    <?php
    class ShowProfile extends ConnectDB {
        public function getTutor($id) {
            $conn = $this->connection;
            $sql = "SELECT teacher.full_name, teacher.address, teacher.job_title, course.name, course.image, picture_teacher.image, course.id_course
                    FROM teacher
                    INNER JOIN teacher_course ON teacher.id_teacher = teacher_course.id_teacher
                    INNER JOIN course ON course.id_course = teacher_course.id_course
                    INNER JOIN picture_teacher ON teacher.id_teacher = picture_teacher.id_teacher
                    WHERE teacher.id_teacher = '$id';";
            $result = $conn->query($sql);
            return $result;
        }
    }
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$id) {
        exit;
    }
    $showProfile = new ShowProfile();
    $result = $showProfile->getTutor($id);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if ($row = $result->fetch_assoc()) : ?>
                    <div class="personal-profile">
                        <img src="../../Asset/Picture/Teacher/<?php echo $row["image"]?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6" >
                <?php if ($row): ?>
                    <p>Full name: <?php echo $row["full_name"] ?></p>
                    <p>Address: <?php echo $row["address"] ?></p>
                    <p>Job title: <?php echo $row["job_title"] ?></p>
                <?php endif; ?>
            </div>
        </div>
        <h3>Các khóa học của tôi</h3>
        <div class="row">
            <?php
            $courses = array();
            while ($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
            foreach ($courses as $course) : ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="../../Asset/Picture/Course/<?php echo $course["image"] ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $course["name"] ?></h5>
                        <a href="#" class="btn btn-primary">Join</a>
                        <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='../../src/views/detail_course.php?id=<?php echo $course['id_course']; ?>'">
                            Details
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>