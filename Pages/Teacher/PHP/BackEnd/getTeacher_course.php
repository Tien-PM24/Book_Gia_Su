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
        echo '<img src="' . $row['Image'] . '"width =350 height=200>';
        echo "<p class='pshow'><br><strong>Tên khóa học:</strong> " . $row["Name"] . "</p>";
        echo "<p class='pshow'><strong>Giá:</strong> " . $row["Price"] . "</p>";
        ?>
         <button class="Detail"<?php echo $row["ID_course"]?>>Detail</button> <button>Lern</button>
        <?php
    echo "</div>";
    }
} else {
    echo "Không có kết quả";
}
mysqli_close($conn);
?>
<style>
    #Form{
        display: none;
    }
</style>
<form action="" method="get" id="Form">
    <div>
        <label for="">Image</label>
        <input type="text" value="">
    </div>
    <div>
        <label for="">Title</label>
        <input type="text" value="">
    </div>
    <div>
        <label for="">Price</label>
        <input type="text" value="">
    </div>
</form>

<script>
    var detail=document.querySelectorAll("Detail");
    detail.addEventListener("click",function(event){
        var form=document.querySelector("#Form")
        form.style.display="block"
    })
</script>