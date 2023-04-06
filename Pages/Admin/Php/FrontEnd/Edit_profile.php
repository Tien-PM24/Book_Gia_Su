<?php
include "./Admin.php";

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $avatar=new Admin();
   $row=$avatar->editProfile($id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../Styles/Admin/profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="container_wrap">
        <div class="fui-card-profile-1">
            <div class="background-wrap">
                <div class="card-image-cover">
                    <img src="https://i.ibb.co/1M0TF14/art-2.jpg" alt="fashui" />
                </div>
                <?php 
                    foreach ($row as $avatar) {
                        ?>
                        <div class="card-avatar">
                        <img id="avatar" src="<?php echo $avatar['Image'] ?>" alt="fashui" />
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="card-body">
                <h2 class="card-name">Cameron Williamson</h2>
                <p class="card-desc">Web Development</p>
            <?php
                  foreach ($row as $avatar) {
                    ?>
                <div class="card-button-wrap">
                   <a href="../BackEnd/Executeprofile.php?edit=<?php echo $avatar['ID_admin']?>"><button class="card-btn card-btn--secondary">
                        Edit
                    </button></a> 
                    <button type="submit" name="update" class="card-btn card-btn--primary">
                        Update
                    </button>
                </div>
                <?php
                  }
            ?>
            </div>
        </div>
    </div>
</body>
<script src="../../JS/editProfile.js"></script>
</html>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>