
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
echo '<div class="fui-card-profile-1">
<div class="background-wrap">
    <div class="card-image-cover">
        <img
            src="../../../../Asstet/images/background-teacher.jpg"
            alt="fashui"
        />
    </div>
    <div class="card-avatar">
        <img
            src="https://i.ibb.co/KzDrSb7/avatar-2.jpg"
            alt="fashui"
        />
    </div>
</div>
<div class="card-body">
    <h2 class="card-name">Cameron Williamson</h2>
    <p class="card-desc">Web Development</p>
    <div class="card-button-wrap">
        <button class="card-btn card-btn--secondary">
            Edit
        </button>
        <button class="card-btn card-btn--primary">
            Button
        </button>
    </div>
</div>
</div>';
// Thực hiện truy vấn đến cơ sở dữ liệu
// $sql = "SELECT * FROM teacher";
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
    
//     while ($row = mysqli_fetch_assoc($result)) {

//         echo '<div class="fui-card-profile-1">
//     <div class="background-wrap">
//         <div class="card-image-cover">
//             <img
//                 src="https://i.ibb.co/1M0TF14/art-2.jpg"
//                 alt="fashui"
//             />
//         </div>
//         <div class="card-avatar">
//             <img
//                 src="https://i.ibb.co/KzDrSb7/avatar-2.jpg"
//                 alt="fashui"
//             />
//         </div>
//     </div>
//     <div class="card-body">
//         <h2 class="card-name">Cameron Williamson</h2>
//         <p class="card-desc">Web Development</p>
//         <div class="card-button-wrap">
//             <button class="card-btn card-btn--secondary">
//                 Button
//             </button>
//             <button class="card-btn card-btn--primary">
//                 Button
//             </button>
//         </div>
//     </div>
// </div>';
//     }
// } else {
//     echo "Không có kết quả";
// };
?>