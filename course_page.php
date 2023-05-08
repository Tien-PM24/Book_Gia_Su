<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
  * {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}


.container--gird {
display: grid;
grid-template-columns: 1fr 1fr 1fr 1fr;
gap: 15px;
}

.product-card {
display: flex;
flex-direction: column;
width: 300px;
background: #eae3e4;
border: 1px solid #ccc;
border-radius: 5px;
margin-left: 20px;
padding: 10px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.background--teacher {
background: #FE7A15;
}

.background--teacher--course {
background: #D45769;
}

.product-card__image {
width: 100%;
height: 400px;
object-fit: cover;
border-radius: 5px;
margin-bottom: 10px;
}

.background--course {
background: #FA9284;
}

.product-card__info {
flex: 1;
}

.product-card__name {
font-size: 18px;
margin-bottom: 5px;
}

.product-card__description {
font-size: 14px;
margin-bottom: 10px;
}

.product-card__buttons {
display: flex;
justify-content: space-between;
}

.product-card__button {
padding: 5px 10px;
border: none;
border-radius: 5px;
font-size: 14px;
cursor: pointer;
}

.product-card__button--primary {
background-color: #007bff;
color: #fff;
width: 45%;
height: 40px;
}

.product-card__button--secondary {
background-color: #6c757d;
color: #fff;
width: 45%;
height: 40px;
}

.product-card__button--primary--teacher {
display: flex;
justify-content: center;
text-align: center;
align-items: center;
background: #007bff;
width: 300px;
height: 40px;
}

h1 {
    margin-left: 10px;
}

  .card {
    position: relative;
    overflow: hidden;
    margin-top: 30px;
    text-align: center;
  }

  .card .card-img-top {
    display: block;
    transition: transform 0.2s ease-in-out;
  }

  .card-img-top:hover {
    transition: .5s;
    transform: scale(1.1);
  }


  button:hover {
    color: #7ec9fa;
    box-shadow: 0 0 15px #0197fc;
    text-shadow: 0 0 15px #0197fc;
  }

  .col-md-3 img{
    width: 265px;
    height: 380px;
    object-fit: cover;
    transform-origin: bottom left;
  }

  a {
    text-decoration: none;
  }

  @media screen and (max-width: 1864px) {
    .col-md-3 img{
    width: 345px;
    height: 420px;
    object-fit: cover;
    transform-origin: bottom left;
    }

}

</style>
<body>
<?php
include "./src/core/connectDB.php";

class ShowDB extends connectDB
{
    public function getAllCourseByName()
    {
        $conn = $this->connection;
        $sql = "SELECT DISTINCT name FROM course";
        $nameResult = $conn->query($sql);

        while ($nameRow = mysqli_fetch_assoc($nameResult)) {
            $name = $nameRow['name'];
            ?>

            <div class="container">
            <h2>Các khóa học về <?php echo preg_replace('/\d+/', '', $name);?></h2>
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM course WHERE name='$name'";
                    
                    $result = $conn->query($sql);

                    ?>
        
                  <div class="container--gird">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                      <div class="product-card">
                        <img src="./Asset/Picture/Course/<?php echo $row["image"] ?>" alt="Product Image" class="product-card__image">
                        <div class="product-card__info">
                          <h3 class="product-card__name"><?php echo $row["name"] ?></h3><br>
                          <div class="product-card__buttons">
                          <button type="button" class='product-card__button product-card__button--primary' onclick="location.href='./payment.php?id=<?php echo $row['id_course']; ?>'">Book now</button>
                          <button type="button" class="product-card__button product-card__button--secondary" data-toggle="modal" data-target="#exampleModalCenter" onclick="location.href='./src/views/detail_course.php?id=<?php echo $row['id_course']; ?>'">
                              See More
                          </button>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                </div>
            </div>

        <?php }
    }
}

// create instance of ShowDB class and call getAllCourseByName() method
$show = new ShowDB();
$show->getAllCourseByName();
?>

</body>

</html>
