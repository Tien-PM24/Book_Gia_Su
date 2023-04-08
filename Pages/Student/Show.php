<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../../Styles/Student/Show.css"> -->
    <link rel="stylesheet" href="../../Styles/inc_styles/style_header.css">
    <link rel="stylesheet" href="../../Styles/Student/Show.css">
    
    
    
</head>
<body>
     <header>
    <?php
    //  require_once "../../inc/header.php";
    ?>
    </header>
   
    <div class="fui-card-profile-1">
    <div class="background-wrap">
        <div class="card-image-cover">
            <img
                src="https://i.ibb.co/1M0TF14/art-2.jpg"
                alt="fashui"
            />
        </div>
   
        
        <?php
           
            include "./conncect.php";
            // Thực hiện truy vấn đến cơ sở dữ liệu
            $sql = "SELECT * FROM picture_student ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='card-avatar'>";
                    echo '<img name="image" src="'.$row['Image'] . '"/>';
                    echo "</div>";
                
                }
            } else {
                echo "Không có kết quả";
            };
?>
    </div>
           
    
<br>
<br>
    
    <?php
           include "./conncect.php";
            // Thực hiện truy vấn đến cơ sở dữ liệu
            $sql = "SELECT *FROM student";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) >0 ) {
                // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card-body">';
                    echo "<p name='email'>" . $row["Full_name"] . "</p>";
                    echo '<p name="email">'.$row["Email"].'</p>';
                    echo '<p name="address">'.$row["Address"].'</p>';
                    // echo '<p>'.$row["Job_title"].'</p>';

        ?>
        <div class="card-button-wrap">
        
            <button class="card-btn card-btn--secondary" >
            <a style="text-decoration: none;" href="edit.php?ID_student=<?php echo $row['ID_student']?>">
                Sửa
                  </a>
            </button>
      
            <button class="card-btn card-btn--primary">
            Xóa
            </button>
            </div>
        </div>
    </div>
<?php
    }
                
    } else {
        echo "Không có kết quả";
    };
?>
<?php

   include "./conncect.php";
    // Thực hiện truy vấn đến cơ sở dữ liệu
    $sql = "SELECT course.*, student.*, student_course.*
            FROM course
            INNER JOIN student_course ON course.ID_course = student_course.ID_course
            INNER JOIN student ON student.ID_student = student_course.ID_student";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0 ) {
        // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="grid-container">';
            echo '<div class="card">';
            echo '<a href="course_detail.php?id=' . $row["ID_course"] . '"><img style="border-radius: 20px;" src="'.$row['Image'] . '"/></a>';
            
            // echo '<img src="'.$row['Image'] . '"/>';
            echo '<div class="card-content" >';
            // echo '<p>'.$row["Body"].'</p>';
            echo '<p id="tx">'.$row["Name"].'</p>';
            // echo '<p>'.$row["Price"].'</p>';
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
       
    } else {
        echo "Không có kết quả";
    }
    
    mysqli_close($conn);
?>

        
    <footer>
        <?php
        // include "../../inc/footer.php";
        ?>
    </footer>
</body>

</html>