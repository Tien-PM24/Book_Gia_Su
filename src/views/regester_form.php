<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/Log/regester_form.css">
  <title>Regester account</title>
</head>

<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
$phonenumber = $_POST['phonenumber'];
$role = $_POST['role'];

// Validate form data
// ...

// Insert data into database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boo_tutor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO users (name, email, password, username, phonenumber, role) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $password, $username, $phonenumber, $role);

// Execute SQL statement
if ($stmt->execute()) {
  echo "Data inserted successfully";
} else {
  echo "Error inserting data: " . $conn->error;
}

// Close connection
$conn->close();
?>

?>
  <body>
    <div class="container">
      <div class="regester-left">
        <img class="img-right" src="../../Asset/images/regester.jpg" alt="">
      </div>
      <div class="regester-right">
        <form action="" method="post">
          <h1>Craeta your account to connect with us</h1>
          <div class="regester-form">
            <div class="form-left">
              <div class="form-item">
                  <label for="name">Enter Full Name</label>
                  <input type="text" name="name" id="name" >
              </div>
              <div class="form-item">
                <label for="email">Enter Email</label>
                <input type="text" name="email" id="email" >
              </div>
              <div class="form-item">
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password">
                <i class="toggle-password fas fa-eye"></i>
              </div>
            </div>
            <div class="form-right">
              <div class="form-item">
                <label for="user-name">Enter Username</label>
                <input type="text" name="username" id="username">
              </div>
              <div class="form-item">
                <label for="phone-number">Enter Phonenumber</label>
                <input type="text" name="phonenumber" id="phonenumber">
              </div>
              <div class="form-item">
                <label for="password">Confirm Password</label>
                <input type="password" name="" id="password">
                <i class="toggle-password fas fa-eye"></i>
              </div>
            </div>
          </div>
          <div class="role-user">
            <div>
              <h3>Please select your role:</h3>
            </div>
            <div class="radio-container">
              <input type="radio" id="student" name="role" value="student">
              <label for="student">Student</label>
            </div>
            <div class="radio-container">
              <input type="radio" id="tutor" name="role" value="tutor">
              <label for="tutor">Tutor</label>
            </div>
          </div>
          <button type="submit">REGESTER</button>
        </form>         
      </div>
    </div>
  </body>
</html>