<?php

include "../../../../Database/Admin.class.php";
include "../FrontEnd/Email.php";
$edit = new Admin();
$row = $edit->Profile();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../../../../Styles/Admin/admin.css">
</head>

<body>
    <section>
        <div class="container__tap__bar">
            <div class="__modol">
                Modern
            </div>
            <i class="fa-solid fa-bars"></i>
            <div class="__modol__icon">
                <div class="__icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="__icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="__icon">
                    <i class="fa-regular fa-bell"></i>
                </div>
                <?php
                foreach ($row as $edit) {
                ?>
                    <div class="__icon __Image" onclick="changeImage()">
                    <a href="../FrontEnd/Edit_profile.php?edit=<?php echo $edit["ID_admin"] ?>"><img src="<?php echo $edit["Image"] ?>" alt="" ></a> 
                    </div>
                <?php
                }

                ?>
                <div class="__icon">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container__menu_icon">
            <div class="__menu_grid_1">
                <?php
                foreach ($row as $edit) {
                    ?>
                    <div class="__menu_icon __Profile" onclick="changeImage()">
                   <a href="../FrontEnd/Edit_profile.php?edit=<?php echo $edit["ID_admin"] ?>"><img src="<?php echo $edit["Image"] ?>" alt="" ></a> 
                    <br>
                    <h5><?php echo $edit["Full_name"] ?></h5>
                   
                    </div>
                    <?php
                }
               ?>
                <div class="__menu_icon __menu__ _menu_home__" onclick="changeHome()">
                    <i class="fa-solid fa-house"></i>
                    <p>HOME</p>
                </div>
                <div class="__menu_icon __menu__ __menu_User__" onclick="changeTeacher()">
                    <i class="fa-solid fa-users"></i>
                    <p>TEACHER</p>
                </div>
                <div class="__menu_icon __menu__ __Menu_comment__" onclick="changeStudent()">
                    <i class="fa-regular fa-comment"></i>
                    <p>STUDENT</p>
                </div>
                <div class="__menu_icon __menu__ __menu_course__" onclick="changeCourse()">
                    <i class="fa-solid fa-book"></i>
                    <p>COURSES</p>
                </div>
                <div class="__menu_icon __menu__ __menu_Order__" onclick="changeOder()">
                    <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                    <p>ORDERS</p>
                </div>
                <div class="__menu_icon __menu__ __menu_search__" onclick="changeSearch()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <p>SEARCH</p>
                </div>
            </div>
            <div class="container__show_detail">
                <div class="__detail_home_">
                    <p>DASHBOARD</p>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="../../JS/Admin.js"></script>
<script src="../../JS/form.js"></script>
<script src="../../JS/email.js"></script>
</html>