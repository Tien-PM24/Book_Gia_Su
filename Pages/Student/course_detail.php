<!DOCTYPE html>
<link rel="stylesheet" href="../../Styles/Student/course_detail.css">
<html>
<head>
	<title>Chi tiết khóa học</title>
	<style>
		/* Thiết lập style cho trang web */
		
	</style>
</head>
<body>
	<div class="container">
		<?php
			// Kết nối tới database
			include './conncect.php';
				
			// Lấy thông tin của khóa học từ database dựa trên ID_course
            if (isset($_GET['id'])) {
                $id_course = $_GET['id'];
            } elseif (isset($_GET['ID'])) {
                $id_course = $_GET['ID'];
            } else {
                // Không có ID_course được truyền qua URL, xử lý lỗi tại đây
            }
            
			// $course_id = $_GET['course_id']; // Lấy ID_course từ URL
			$sql = "SELECT * FROM course WHERE ID_course = $id_course";
			$result = mysqli_query($conn, $sql);

			if ($result && mysqli_num_rows($result) > 0 ) {
			    // Hiển thị thông tin của khóa học
			    $row = mysqli_fetch_assoc($result);
			    echo '<h1>'.$row["Name"].'</h1>';
			    echo '<img id="image" src="'.$row['Image'].'"/>';
			    echo '<p>'.$row["Body"].'</p>';
			    echo '<p>Giá tiền: '.$row["Price"].'</p>';
			    echo '<a href="#">Mua khóa học</a>';
                
			} else {
			    echo "Không có kết quả";
			}

			mysqli_close($conn);
		?>
	</div>
</body>
</html>
