<?php
    include "../Model/User.class.php";

    if(isset($_POST['submit'])){
        $Title=$_POST['Title'];
        $Price=$_POST['Price'];
        $Body=$_POST['detail'];
        $Image=$_FILES['Image']['name'];

        $target_dir="";
        $ok_upload=1;
        $target_file=$target_dir. basename($_FILES['Image']['name']);
       
        $check=getimagesize($_FILES['Image']['tmp_name']);
        if($check !== false){
            $ok_upload=1;
        }else{
            echo "File is not an image  <br>";
            $ok_upload=0;
        }

        if(file_exists($target_file)){
            echo "File đã tồn tại <br>";
            $ok_upload=0;
        }

        if($_FILES['Image']['size']>500000){
            echo "Kích thước file quá tải <br>";
            $ok_upload=0;
        }
        if($ok_upload==0){
            echo "Xin lỗi không thể tải file của bạn";
        }else{
            if( move_uploaded_file($_FILES['Image']['tmp_name'],$target_file)){
                $insr_course=new Teacher();
                $insr_course->Insert_course($Title,$Price,$Body,$target_file);
                // header("location:../View/Show_Course.php");
                echo "<script>window.location.href='../View/Show_Course.php';</script>";
                   }else{
                    echo "Upload không thành công";
                   }
                  
        }
        // if($Title !="" && $Price !="" && $Body!="" && $Image!=""){
          
        // }else{
        //     echo "<script>alert('Ảnh của bạn quá tải')</script>";
        // }
        
    }


?>
