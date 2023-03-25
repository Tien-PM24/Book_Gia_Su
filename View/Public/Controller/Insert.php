
<?php
    // include "../Model/Student.class.php";
    include "../Model/User.class.php";
    if(isset($_POST['submit'])){
        $Full_name=$_POST['name'];
        $Email=$_POST['Email'];
        $Password=$_POST['Password'];
        $Selection=$_POST['select'];
        $Address=$_POST['Address'];
        if($Full_name !="" && $Email !="" && $Password !="" && $Selection =="Student"){
                $stu=new Student();
                $stu->Login($Full_name,$Email,$Password,$Selection,$Address);
        }elseif($Full_name !="" && $Email !="" && $Password !="" && $Selection =="Teacher"){
            $teacher=new Teacher();
            $teacher->Login($Full_name,$Email,$Password,$Selection,$Address);
        }
        else{
            echo "<script> alert('Thêm không thành công') </script>";
        }
    }


?>