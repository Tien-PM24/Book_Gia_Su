<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body>
  <form action="xuly.php" method="post" id="mySubmit">
    <div class="form-group">
      <label for="">Your Name</label>
      <input type="text" name="Name" id="Name" class="form-control" placeholder="" aria-describedby="helpId" oninput="Check_Name()">
      <span class="erro_name" style="color: red;"></span>
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="Email" id="Email" class="form-control" placeholder="" aria-describedby="helpId" oninput="Check_Email()">
      <div class="erro_email" style="color: red;"></div>
    </div>
    <div class="form-group">
      <label for="">Address</label>
      <input type="text" name="Address" id="Address" class="form-control" placeholder="" aria-describedby="helpId" oninput="Check_Address()">
      <div class="erro_address" style="color: red;"></div>
    </div>
    <div class="form-group">
      <label for="">Position</label>
      <select class="form-control" name="position" id="">
        <option>Student</option>
        <option>Teacher</option>
      </select>
    </div>
    <div class="form-group">
      <label for="">Passwork</label>
      <input type="text" name="Passwork" id="Passwork" class="form-control" placeholder="" aria-describedby="helpId" oninput="Check_Passwork()">
      <div class="erro_password" style="color: red;"></div>
    </div>
    <div class="form-group">
      <label for="">Confirm</label>
      <input type="text" name="Confirm" id="Confirm" class="form-control" placeholder="" aria-describedby="helpId" oninput="Check_Confirm()">
      <div class="erro_confirm"></div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="./form.js"></script>

</html>