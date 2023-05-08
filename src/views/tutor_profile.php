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
* {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}


.container--gird {
display: grid;
grid-template-columns: 1fr 1fr 1fr 1fr;
gap: 15px;
}

.product-card {
display: flex;
flex-direction: column;
width: 300px;
background: #eae3e4;
border: 1px solid #ccc;
border-radius: 5px;
margin-left: 20px;
padding: 10px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.background--teacher {
background: #FE7A15;
}

.background--teacher--course {
background: #D45769;
}

.product-card__image {
width: 100%;
height: 400px;
object-fit: cover;
border-radius: 5px;
margin-bottom: 10px;
}

.background--course {
background: #FA9284;
}

.product-card__info {
flex: 1;
}

.product-card__name {
font-size: 18px;
margin-bottom: 5px;
}

.product-card__description {
font-size: 14px;
margin-bottom: 10px;
}

.product-card__buttons {
display: flex;
justify-content: space-between;
}

.product-card__button {
padding: 5px 10px;
border: none;
border-radius: 5px;
font-size: 14px;
cursor: pointer;
}

.product-card__button--primary {
background-color: #007bff;
color: #fff;
width: 45%;
height: 40px;
}

.product-card__button--secondary {
background-color: #6c757d;
color: #fff;
width: 45%;
height: 40px;
}

.product-card__button--primary--teacher {
display: flex;
justify-content: center;
text-align: center;
align-items: center;
background: #007bff;
width: 300px;
height: 40px;
}

h1 {
    margin-left: 10px;
}

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
            $sql = "SELECT teacher.full_name, teacher.address, teacher.job_title, course.name, course.image as img_course, picture_teacher.image, course.id_course, teacher.email
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
                    <p>Email: <?php echo $row["email"] ?></p>
                <?php endif; ?>
            </div>
        </div>
        <br />
        <br />
        <h3>Các khóa học của tôi</h3>
          <div class="container--gird">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="product-card">
                <img src="../../Asset/Picture/Course/<?php echo $row["img_course"] ?>" alt="Product Image" class="product-card__image">
                <div class="product-card__info">
                  <h3 class="product-card__name"><?php echo $row["name"] ?></h3><br>
                  <div class="product-card__buttons">
                    <Button>Đăng ký</Button>
                    <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='../../src/views/detail_course.php?id=<?php echo $course['id_course']; ?>'">
                                Details
                    </button>
                  </div>
                </div>
              </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>