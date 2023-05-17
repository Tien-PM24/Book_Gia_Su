<?php
include "./header.php";
include "../Email/src/Exception.php";
include "../Email/src/SMTP.php";
include "../Email/src/PHPMailer.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php
$student = new Admin();
$row_stu = $student->showStudent();
if (isset($_GET['email'])) {
  $email = $_GET['email'];
  $student->lockAccount($email);
  echo "<script> swal.fire('Thành công', 'Tài khoản đã được khóa', 'success')</script>";
}
if (isset($_GET['open'])) {
  $email = $_GET['open'];
  $student->openAccount($email);
  echo "<script> swal.fire('Thành công', 'Tài khoản đã được mở', 'success')</script>";
}

if (isset($_GET['emailstu'])) {
  $email = $_GET['emailstu'];
  $student->wanrningStudent($email);
  // echo "<script> swal.fire('Thành công', 'Tài khoản đã được mở', 'success')</script>";
}

?>
</body>
</html>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../../Public/Styles/Admin/table.css">
  
</head>

<body>
  <div class="table_position">
    <table class="table table-bordered" style="width:1200px">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th style="width: 200px;" scope="col">Name</th>
          <th style="width: 400px;" scope="col">Email</th>
          <th style="width: 200px;" scope="col">Adress</th>
          <!-- <th scope="col">Job_Title</th> -->
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($row_stu as $student) {
        ?>
          <tr>
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $student['full_name'] ?></td>
            <td><?php echo $student['email'] ?></td>
            <td><?php echo $student['address'] ?></td>
            <td><img src="../../Public/Images/Student/<?php echo $student['image'] ?>" alt=""></td>
            <?php
            if ($student['is_locked'] === 1) {
            ?>
              <td class="d-flex">
                <a class="btn btn-success mr-2" href="./student.php?open=<?php echo $student['email'] ?>">OPEN</a>
                <a class="btn btn-warning " href="./student.php?emailstu=<?php echo $student['email'] ?>">Wanring</a>
              </td>

            <?php
            } else {
            ?>
              <td>
                <a class="btn btn-danger" href="./student.php?email=<?php echo $student['email'] ?>">LOCK</a>
                <a class="btn btn-warning ml-1" href="./student.php?emailstu=<?php echo $student['email'] ?>">Wanring</a>
              </td>
            <?php
            }
            ?>

          </tr>
        <?php
          $i++;
        }
        ?>
      </tbody>
    </table>
  </div>
  </tbody>
  </table>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
<script>
  var Home = document.querySelector(".__Menu_comment__");
  Home.style.background = "#FFA500";
</script>