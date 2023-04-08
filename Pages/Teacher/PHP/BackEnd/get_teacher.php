
<?php

//Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_tutor";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
} 
$sql = "SELECT * FROM teacher WHERE ID_teacher=4";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Duyệt qua các bản ghi của kết quả và show thông tin giáo viên
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="fui-card-profile-1">
        <div class="background-wrap">
        <div class="card-image-cover">
        <img
            src="https://haycafe.vn/wp-content/uploads/2021/12/Hinh-nen-Full-HD-1080-cho-may-tinh-dep.jpg"
            alt="fashui"
         />
        </div>
        <div class="card-avatar">
        <img src="../../../../Asset/Picture/Teacher/Teacher-4.png" alt="">
        </div>
        </div>
        <div class="card-body">
        <h2 class="card-name">'.$row['Full_name'].'</h2>
        <p class="card-desc">'.$row['Job_title'].'</p>
        <div class="card-button-wrap">
        <button class="card-btn card-btn--secondary" name="btn">
        <a href="../FrontEnd/edit_tutor.php?id='.$row['ID_teacher'].'" class="edit">Edit</a>
        </button>
         </div>
        </div>
        </div>';
    }
} else {
    echo "Không có kết quả";
}
// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
<style>
    .edit{
        text-decoration: none;
    }
</style>