
<?php
    include "../../src/core/connectDB.php";

    class ShowDetail extends ConnectDB {
        public function getCourse ($id)  {
            $connection = $this-> connect();
            $sql = "SELECT * FROM course WHERE id = $id";
            $result = $connection->query($sql);
            $course = $result->fetch_assoc();
            $connection->close();
            return $course;
        }
    }
    $showDetail = new ShowDetail();

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$id) {
        echo "Vãi lol Chạy đéo được";
    }

    $id = $_GET['id'];

    $course = $showDetail->getCourse($id);
    echo '<img src="../../Asset/images/' . $course["Image"] . '" alt="">';
    echo "Name: " . $course['name'] . "<br>";
    echo "Price: " . $course['price'] . "<br>";
    echo "Description: " . $course['body'] . "<br>";
       
    
    
    $show = new ShowDetail();
    $show->getCourse ($id);
?>
