<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "tutors";
     $conn = mysqli_connect($servername, $username, $password, $dbname);
    

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    // Kiểm tra xem người dùng đã submit form chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Lấy thông tin sinh viên từ form
        $student_id = $_POST["student_id"];
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $job_title = $_POST["job_title"];

        // Kiểm tra tính hợp lệ của dữ liệu nhập vào
        $errors = array();
        if (empty($full_name)) {
            $errors[] = "Họ tên không được để trống";
        }
        if (empty($email)) {
            $errors[] = "Email không được để trống";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không hợp lệ";
        }
        if (empty($password)) {
            $errors[] = "Mật khẩu không được để trống";
        }
        if (empty($job_title)) {
            $errors[] = "Chức danh không được để trống";
        }

        // Nếu dữ liệu nhập liệu hợp lệ, thực hiện cập nhật thông tin sinh viên
        if (empty($errors)) {

            // Tạo câu lệnh SQL để cập nhật thông tin sinh viên
            $sql = "UPDATE student SET Full_name='$full_name', Email='$email', Address='$address', Password='$password', Job_title='$job_title' WHERE ID_student=$student_id";

            // Thực hiện cập nhật thông tin trong database
            if (mysqli_query($conn, $sql)) {
                echo "Cập nhật thông tin sinh viên thành công";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        } else {
            // Nếu có lỗi, hiển thị thông báo lỗi cho người dùng
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }


// Lấy thông tin sinh viên từ database để hiển thị lên form
$student_id = $_GET["ID_student"];
$sql = "SELECT student.*, picture_student.Image 
FROM student 
LEFT JOIN picture_student ON student.ID_student = picture_student.ID_student 
WHERE student.ID_student = $student_id";
$result = mysqli_query($conn, $sql);

// Kiểm tra xem có dữ liệu hay không
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result); // lấy dữ liệu và gán vào biến $row
    echo "<div class='card-avatar'>";
    echo '<img src="'.$row['Image'] . '"/>';
    echo "1";
    echo "</div>";
    echo '<div class="card-body">';
    echo "<p>" . $row["Full_name"] . "</p>";
}


 ?>
       
