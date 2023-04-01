<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Styles/Student/Show.css"> 
    
</head>
<body>
    <header></header>
   
    <div class="fui-card-profile-1">
    <div class="background-wrap">
        <div class="card-image-cover">
            <img
                src="https://i.ibb.co/1M0TF14/art-2.jpg"
                alt="fashui"
            />
        </div>
   
        
        <?php
            // Kết nối đến cơ sở dữ liệu
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tutors";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }
            // Thực hiện truy vấn đến cơ sở dữ liệu
            $sql = "SELECT * FROM picture_student ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='card-avatar'>";
                    echo '<img src="'.$row['Image'] . '"/>';
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
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tutors";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }
            
            // Thực hiện truy vấn đến cơ sở dữ liệu
            $sql = "SELECT *FROM student";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) >0 ) {
                // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card-body">';
                    echo "<p>" . $row["Full_name"] . "</p>";
                    echo '<p>'.$row["Email"].'</p>';
                    echo '<p>'.$row["Address"].'</p>';
                    // echo '<p>'.$row["Job_title"].'</p>';
                }
               
            } else {
                echo "Không có kết quả";
            };
        ?>
        <div class="card-button-wrap">
            <button class="card-btn card-btn--secondary">
            Sửa
            </button>
            <button class="card-btn card-btn--primary">
            Xóa
            </button>
        </div>
    </div>
</div>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tutors";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }
    
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
            echo '<img src="'.$row['Image'] . '"/>';
            echo '<div class="card-content">';
            echo '<p>'.$row["Body"].'</p>';
            echo '<p>'.$row["Name"].'</p>';
            echo '<p>'.$row["Price"].'</p>';
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

    </footer>
</body>

</html>