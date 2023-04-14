
<?php
    include "../../../../Database/conn.php";
    if(isset($_POST['update'])){
        $Image=$_FILES['image']['name'];
        $Title=$_POST['title'];
        $Price=$_POST['price'];
        $id=$_POST['id'];
        if(!empty($Image)){
            $target_file='../../../../Asset/Picture/Course/';
            $file=$target_file.basename($Image);
    
            if($_FILES['image']['size']<500000){
                move_uploaded_file($_FILES['image']['tmp_name'],$file);
                $sql="UPDATE course set image='$Image',name='$Title',price=' $Price'where id_course='$id'";
                $stm=mysqli_query($ketnoi,$sql);
                header('location:../FrontEnd/service.php');
            } else{
                echo "<script>alert(''Ảnh quá tải)</script>";
        }
       
        }else{
            $sql="UPDATE course set name='$Title',price=' $Price'where id_course='$id'";
            $stm=mysqli_query($ketnoi,$sql);
            header('location:../FrontEnd/service.php');
        }
       


    }
?>
<img src="" alt="">