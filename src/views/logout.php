<?php
  session_start();
  if (isset($_SESSION['username'])) {
    // Đã đăng nhập
    echo '<a href="./src/views/logout.php">Logout</a>';
    echo '<a href="./src/views/profile.php"><img src="./Asset/images/people.png" alt="" height="25"> </a>';
  } else {
    // Chưa đăng nhập
    echo '<a href="./src/views/login.php">Sign in</a>';
    echo '<a href="./src/views/login.php"><img src="./Asset/images/people.png" alt="" height="25"> </a>';
  }
?>