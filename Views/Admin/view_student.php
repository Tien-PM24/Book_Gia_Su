<?php
include "./header.php";
// include "../../Database/Admin.class.php";
if (isset($_GET['view'])) {
    $email = $_GET['view'];
    $student = new Admin();
    $view = $student->viewOrder($email);
?>
<div class="table_position">
<table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th style="width:200px">Full name</th>
                <th style="width:450px">Email</th>
                <th style="width:200px">Address</th>
                <th style="width:200px">Course name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($view as $student) {
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $student['student'] ?></td>
                    <td><?php echo $student['email'] ?></td>
                    <td><?php echo $student['address'] ?></td>
                    <td><?php echo $student['Course'] ?></td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
   
  
    <script>
        var User = document.querySelector(".__menu_User__");
        User.style.background = "#FFA500";
    </script>

<?php
}
?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Public/Styles/Admin/table.css">
</head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
