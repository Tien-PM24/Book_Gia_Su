<?php
  include "./Admin.php";
include "../BackEnd/Show_Teacher.php";


  $student=new Admin();
  $student->Delete_teacher();


?>
<script>
    var User = document.querySelector(".__menu_User__");
    User.style.background = "red";
</script>
