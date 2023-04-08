<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_tutor";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
$sql = "SELECT * FROM course";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo '<img src="'.$row['Image'] . '"width =350 height=200>';
        echo "<p class='pshow'><br><strong>Tên khóa học:</strong> " . $row["Name"] . "</p>";
        echo "<p class='pshow'><strong>Giá:</strong> " . $row["Price"] . "</p>";
        ?>
         <a class="Detail" href="../FrontEnd/detail_course.php?data_id=<?php echo $row["ID_course"]?>">Detail</a>
        <?php
    echo "</div>";
    }
} else {
    echo "Không có kết quả";
}

?>
   
<style>
    a.Detail{
        text-decoration: none;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 350px;
        height: 30px;
        border-radius: 8px;
        background: green;
        color: #000;
    }
</style>