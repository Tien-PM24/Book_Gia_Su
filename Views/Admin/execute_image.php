
<?php
include '../../Database/Admin.class.php';
    if(isset($_POST['Update'])){
        $Image=$_FILES['avatar']['name'];
        $ID=$_POST['id_avatar'];
        $taget_dir="../../Public/Images/Admin/";
        $ok_upload=1;
        $taget_file=$taget_dir.basename($Image);

        $check=getimagesize($_FILES['avatar']['tmp_name']);
        if($check !=false){
            $ok_upload=1;
        }else{
            $ok_upload=0;
        }

        if($_FILES['avatar']['size']>500000){
            $ok_upload=0;
        }else{
            $ok_upload=1;
        }

        if($ok_upload==0){
            echo "<script>alert('Ảnh của bạn quá lớn')</script>";
        }else{
            if(move_uploaded_file($_FILES['avatar']['tmp_name'],$taget_file)){
                $edit=new Admin();
                $edit->updateProfile($taget_dir.$Image,$ID);
                echo "<script>alert('Thành công')</script>";
                header("location:./edit_profile.php");
            }else{
                echo "<script>alert('Không thành công')</script>";
            }
        }
    }

?>