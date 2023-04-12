<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book tutor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./styles/inc_styles/style.css">
</head>
<body>
  <!-- header -->
  <header>
    <div class="container-header">
      <div class="logo">
        <a href="index.php"><img src="Asset/images/logo (1).png" alt="" height="100"></a>
      </div>
      <div class="nav-item">
        <nav>
          <ul class="menu">
            <li><a href="./index.php">Home</a></li>
            <li><a href="/Book_gia_su/tutor_page.php">Tutors</a></li>
            <li><a href="/Book_Gia_Su/course_page.php">Courses</a></li>
            <li><a href="#">Class</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
      <div class="search-item">
        <div class="search-item">
            <form class="example" action="./search.php" method="GET" style="margin:auto;max-width:300px">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
      </div>
      <div class="tap-right">
        <div class="personal-profile">
          <a href="./src/views/login.php">Sign in</a>
          <a href="./src/views/login.php"><img src="./Asset/images/people.png" alt="" height="25"> </a>
        </div>
      </div>
    </div>
  </header>
