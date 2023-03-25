<?php
    include "../../../../Database/Admin.class.php";
    $course=new Admin();
    $row=$course->Show_Course();

    ?>
    <!doctype html>
    <html lang="en">
      <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../../../Styles/course.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            img{
                width: 50px;
                height: 50px;
            }
        </style>
      </head>
      <body>
      <div class="fui-table-ui-basic-linh table-wrap">
    <table>
      <thead>
        <tr>
          <th>STT</th>
          <th>Course</th>
          <th>Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i=1;
        foreach ($row as $course) {
            ?>
        <tr>
          <td><?php echo $i ?></td>
          <td class="pcs"><?php echo $course['Name'] ?></td>
          <td class="cur"><?php echo $course['Price'] ?></td>
          <td class="per"><img src="<?php echo $course['Image'] ?>" alt=""></td>
          <td class="cur">Xóa</td>
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
     