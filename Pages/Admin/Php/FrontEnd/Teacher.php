<?php
  include "./Admin.php";
include_once "../BackEnd/Show_Teacher.php";


 
  if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    $student=new Admin();
    $student->deleteTeacher();
  }

?>
<script>
    var User = document.querySelector(".__menu_User__");
    User.style.background = "#ECC30B";
</script>
