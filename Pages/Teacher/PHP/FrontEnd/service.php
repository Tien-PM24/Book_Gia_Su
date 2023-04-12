<?php
include "./headerTeacher.php";
include "../../../../Database/conn.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Service</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <h2>My Course</h2>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Add</button><br><br>
        <div class="grid-container">
            <?php include '../BackEnd/getTeacher_course.php' ?>
        </div>
    </div>
    <br>
    <div class="container">
        <!-- Modal -->
        <form method="post" action="../BackEnd/formAdd_course.php" enctype="multipart/form-data">
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #FFCC66;">
                        <div class="col-xs-2">
							<button type="button" class="close " data-dismiss="modal">&times;</button>
						</div>
						<div class="col-xs-10">
							<h4 class="modal-title" style="font-size: 30px; color:aliceblue; text-align:right;">Thêm khóa học mới</h4>
						</div>
                        </div>
                        <div class="modal-body">
                            <input class="inputthem" type="text" name="Name" placeholder="Nhập tên khóa học" required><br><br>
                            <input class="inputthem" type="text" name="Price" placeholder="Nhập giá tiền" required><br><br>
                            <input class="inputthem" type="text" name="Body" placeholder="Nhập mô tả khóa học" required><br><br>
                            Chọn hình ảnh: <input type="file" name="Image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="submit" name="btn" class="btn btn-warning">Done</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
       
    </div>
   
  
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
<style>
    body{
        margin-top: 100px;
    }
</style>
<!-- <script>
    var item=document.querySelector('.itemService');
    item.style.background='white';
</script> -->