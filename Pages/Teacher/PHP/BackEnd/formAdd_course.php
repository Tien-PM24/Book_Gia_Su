

<?php
if (isset($_POST['btn'])) {
    $ten = $_POST['Name'];
    $gia = $_POST['Price'];
    $mota = $_POST['Body'];
    $fileha = $_FILES["Image"];
    $tenfile = $fileha["name"];
    if ($fileha == "") {
        echo "Vui lòng chọn ảnh!";
    } else {
        $connect = mysqli_connect("localhost", 'root', '', "book_tutor") or die("connect fail !");

        $sql = "insert into `Course`(Name,Price,Body,Image)
            values('$ten','$gia','$mota','../../../Asset/Picture/Course/$tenfile')";

        if (mysqli_query($connect, $sql)) {

            move_uploaded_file($fileha['tmp_name'], '../../../Asset/Picture/Course/' . $tenfile);
        } else {
            echo "Thêm thất bại!";
        }
    }
}
?>