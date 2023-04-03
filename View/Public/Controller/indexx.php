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
	  <form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
		  <label for="">Full Name</label>
		  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
		</div>
		<div class="form-group">
		  <label for="">Password</label>
		  <input type="text" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
		</div>
		<div class="form-group">
		  <label for="">Email</label>
		  <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
		</div>
		<div class="form-group">
		  <label for="">Ảnh</label>
		  <input type="file" class="form-control-file" name="file" id="" placeholder="" aria-describedby="fileHelpId">
		</div>
		<button type="submit" name="submit" class="btn btn-primary">Đăng Nhập</button>
	  </form>
	
	
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

<?php
	include "../../../../Database/Admin.class.php";
	session_start();

	if(!isset($_SESSION['admin'])) $_SESSION['admin']=[];
	if(isset($_POST['submit'])){
		$Name=$_POST['name'];
		$Pass=$_POST['pass'];
		$Email=$_POST['email'];
		$File=$_FILES['file']['name'];
		$file='../../../../Asset/Admin/';
		$store_admin[]=[$Email];
		$_SESSION['admin']=$store_admin;
		print_r ($_SESSION['admin']);
	}

	

?>
