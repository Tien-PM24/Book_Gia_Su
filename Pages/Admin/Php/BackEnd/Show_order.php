<?php
// include "../../../../Database/Admin.class.php";

$oder=new Admin();

$order=$oder->getOrder();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    img {
      width: 50px;
      height: 50px;
      border-radius: 50px;
      object-fit: cover;
    }

    .table_position {
      position: absolute;
      min-height: 3px;
      left: 20%;
      top: 20%;
    }
    table{
      width: 985px;
      color: #FFFF;
    }
  </style>
</head>

<body>
  <div class="table table-striped table-dark table_position" style="width:1000px">
    <table>
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Teacher</th>
          <th scope="col">Image</th>
          <th scope="col">Student</th>
          <th scope="col">Image</th>
          <th scope="col">Course</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($order as $oder){
        ?>
          <tr>
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $oder['teacher'] ?></td>
            <td><img src="../../../../Asset/Picture/Teacher/<?php echo $oder['image_teacher'] ?>" alt=""></td>
            <td><?php echo $oder['student'] ?></td>
            <td><img src="../../../../Asset/Picture/Student/<?php echo $oder['image_student'] ?>" alt=""></td>
            <td><?php echo $oder['name'] ?></td>
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