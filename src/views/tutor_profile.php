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
            $sql = "SELECT teacher.Full_name, teacher.Address, teacher.Job_title, course.Name, course.Image, picture_teacher.images, course.ID_course
                    FROM teacher
                    INNER JOIN teacher_course ON teacher.ID_teacher = teacher_course.ID_teacher
                    INNER JOIN course ON course.ID_course = teacher_course.ID_course
                    INNER JOIN picture_teacher ON teacher.ID_teacher = picture_teacher.ID_teacher
                    WHERE teacher.ID_teacher = '$id';";
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
                        <img src="../../Asset/Picture/Teacher/<?php echo $row["images"]?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6" >
                <?php if ($row): ?>
                    <p>Full name: <?php echo $row["Full_name"] ?></p>
                    <p>Address: <?php echo $row["Address"] ?></p>
                    <p>Job title: <?php echo $row["Job_title"] ?></p>
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
                        <img src="../../Asset/Picture/Course/<?php echo $course["Image"] ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $course["Name"] ?></h5>
                        <a href="#" class="btn btn-primary">Join</a>
                        <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='../../src/views/detail_course.php?id=<?php echo $course['ID_course']; ?>'">
                            Details
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>