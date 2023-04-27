<?php
include "./src/core/connectDB.php";

class Course {
    public function getCourse($id) {
        $connection = ConnectDB::getConnection();
        $sql = "SELECT * FROM course WHERE ID_course = $id";
        $result = $connection->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    exit;
}

$course = new Course();
$row = $course->getCourse($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $course_id = $_POST['course_id'];
    $price = $_POST['price'];

    // Thêm thông tin thanh toán vào database
    $connection = ConnectDB::getConnection();
    $sql = "INSERT INTO payment (name, email, phone, address, course_id, price) VALUES ('$name', '$email', '$phone', '$address', $course_id, $price)";
    $result = $connection->query($sql);

    // Chuyển hướng tới trang cảm ơn
    header("Location: thank_you.php");
    exit;
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
</head>
<body>
    <div class="container">
        <h1 class="my-4"><?php echo $row['Name']; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img src="./Asset/Picture/Course/<?php echo $row['Image']; ?>" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p><?php echo $row['Body']; ?></p>
                <h4>Price: <?php echo number_format($row['Price']); ?> VND</h4>
                <form method="POST">
                    <input type="hidden" name="course_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['Price']; ?>">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>