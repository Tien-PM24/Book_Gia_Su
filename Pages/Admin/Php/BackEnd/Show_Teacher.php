<?php
// include "../../../../Database/Admin.class.php";

$student = new Admin();
$row = $student->showTeacher();

?>
<style>
  *{
    font-family: Helvetica;
  }
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

  table {
    color: #FFFF;
  }
  .a{
    width: 200px;
  }
  .b{
    width: 300px;
  }
.c{
  width: 300px;
}
a i{
  text-decoration: none;
  color: orangered;
}
</style>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="table table-striped table-dark table_position" style="width:1000px">
    <table>
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Adress</th>
          <th scope="col">Job_Title</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($row as $student) {
        ?>
          <tr>
            <td> <?php echo $i ?></td>
            <td class="a"><?php echo $student['full_name'] ?></td>
            <td class="b"><?php echo $student['email'] ?></td>
            <td class="c"><?php echo $student['address'] ?></td>
            <td><?php echo $student['job_title'] ?></td>
            <td><img src="../../../../Asset/Picture/Teacher/<?php echo $student['image'] ?>" alt=""></td>
            <td><a href="../FrontEnd/Teacher.php?delete=<?php echo $student['id_teacher'] ?>"><i class="fa-solid fa-trash"></i></a></td>
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