    <?php
    session_start();
    $emailUser = $_SESSION['user'];

    include "./src/core/connectDB.php";

        class Payment extends ConnectDB {
            public function getPayment($id) {
                $conn = $this->connection;
                $sql = "SELECT * FROM course WHERE id_course = $id";
                $result = mysqli_query ($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
    
            public function getTeacher($id) {
                $conn = $this->connection;
                $sql4 = "SELECT DISTINCT teacher.id_teacher
                FROM teacher,teacher_course,course
                WHERE teacher.id_teacher=teacher_course.id_teacher
                AND course.id_course=teacher_course.id_course
                AND course.id_course=$id";
                $result4 = mysqli_query ($conn,$sql4);
                $row4 = mysqli_fetch_assoc($result4);
                $id_teacher = $row4['id_teacher'];
                return $id_teacher;
            }    
    
            public function bookCourse($id_course, $email_user, $price) {
                $conn = $this->connection;
                $sql1 = "SELECT id_student FROM student WHERE email = '$email_user'";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $id_student = $row1['id_student'];
            
                $sql2 = "SELECT id_student FROM payment WHERE id_student = '$id_student' AND id_course = '$id_course'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                if ($row2) {
                    echo "<script>
                            alert('You have already booked this course!');
                            window.location.href = './course_page.php';
                        </script>";
                } else {
                    $sql3 = "INSERT INTO payment (id_course, id_student, price, payment_date) 
                            VALUES ('$id_course', '$id_student', '$price', NOW())";
                    $result3 = mysqli_query($conn, $sql3);


            
                    if ($result3 === TRUE) {
                        echo "<script>
                                alert('You booked this course successfully!');
                                window.location.href = './course_page.php';
                            </script>";
                    } else {
                        echo "Error: " . $sql3 . "<br>" . $conn->error;
                    }
            
                    $id_teacher = $this->getTeacher();
                    $sql4 = "INSERT INTO student_teacher VALUES ('$id_student','$id_teacher')";
                    $result4 = mysqli_query($conn, $sql4);
                }
            }    
            
        }
    
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            exit;
        }
        $payment = new Payment();
        $row = $payment->getPayment($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_course = $_POST['id_course'];
            $email_user = $_SESSION['user'];
            $price = $_POST['price'];
    
            $payment->bookCourse($id_course, $email_user, $price);
        }
        ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Page</title>
        <link rel="stylesheet" href="./Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./styles/payment.css">
    </head>
    <body>
        <div class="container">
            <h1 class="my-4"><?php echo $row['name']; ?></h1>
            <div class="row">
                <div class="col-md-6">
                    <img src="./Asset/Picture/Course/<?php echo $row['image']; ?>" alt="" class="img-fluid" height="40">
                </div>
                <div class="col-md-6">
                    <h4>Bạn có chắc chắn mua khóa hoạc này với giá: <?php echo number_format($row['price']); ?> vnd</h4>
                    <form method="POST">
                        <input type="hidden" name="id_course" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                        <button type="submit" class="btn btn-primary">Đồng ý</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
