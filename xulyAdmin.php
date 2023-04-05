  <?php
  session_start();
foreach ($row as $edit) {
    if(isset($_SESSION['admin']) && is_array($_SESSION['admin'])){
       for ($i=0; $i < $_SESSION['admin']; $i++) { 
            if($_SESSION['admin'][$i][0] == $edit['Email']){
                ?>
                <div class="__icon __Image" onclick="changeImage()">
                <a href="../FrontEnd/Edit_profile.php?edit=<?php echo $edit["ID_admin"] ?>"><img src="<?php echo $edit["Image"] ?>" alt="" ></a> 
                </div>
            <?php
            }
       }
    }
    
    }

?>