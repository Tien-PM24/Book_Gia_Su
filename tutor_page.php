
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

</style>

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

        
                <div class="container--gird">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="product-card">
                        <img src="./Asset/Picture/Teacher/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                        <div class="product-card__info">
                        <h3 class="product-card__name"><?php echo $row["full_name"] ?></h3><br>
                        <div class="product-card__buttons">
                        <button class="btn btn-primary" onclick="location.href='./src/views/tutor_profile.php?id=<?php echo $row['id_teacher'];?>'">View profile</button>
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

    include "./inc/footer.php";
    ?> 
</body>
</html>
