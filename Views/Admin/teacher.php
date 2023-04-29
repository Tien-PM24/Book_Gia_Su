<?php
  include "./header.php";
  if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    $student=new Admin();
    $student->deleteTeacher();
  }

?>
<?php
$student = new Admin();
$row = $student->showTeacher();

?>
<style>

</style>
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
            <td><img src="../../Public/Images/Teacher/<?php echo $student['image'] ?>" alt=""></td>
            <td><a href="./teacher.php?delete=<?php echo $student['id_teacher'] ?>"><i class="fa-solid fa-trash"></i></a></td>
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
    var User = document.querySelector(".__menu_User__");
    User.style.background = "#FFA500";
</script>