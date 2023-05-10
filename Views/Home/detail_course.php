<?php include "../../Database/connectDB.php"; 
include "./header.php";
?>

<html>

<head>
    <link rel="stylesheet" href="../../Public/Styles/Home/detal.css">
</head>

<style>
    .col-md-6 img {
        margin-left: 250px;
    }

    .col-md-6 button {
        margin-left: 300px;
        margin-top: 30px;
        background: green;
        width: 100px;
        height: 45px;
        border-radius: 8px;
    }
    .content__mota{
        position: absolute;
        left: 35%;
        top: 15%;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 left">
                <?php
                class ShowDetail extends ConnectDB
                {
                    public function getCourse($id)
                    {
                        $connection = $this->connection;
                        $sql = "SELECT * FROM course WHERE id_course = $id";
                        $result = $connection->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        return $row;
                    }

                    public function getNumberStudent($id)
                    {
                        $connection = $this->connection;
                        $sql = "SELECT COUNT(DISTINCT id_student) as num_students
                                        FROM payment
                                        WHERE id_course = $id";
                        $result = $connection->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        return $row['num_students'];
                    }
                }

                $id = isset($_GET['id']) ? $_GET['id'] : null;
                if (!$id) {
                    exit;
                }

                $showDetail = new ShowDetail();
                $row = $showDetail->getCourse($id);
                ?>

                <img src="../../Public/Images/Course/<?php echo $row["image"] ?>" alt="" height="350" id="img-fluid">

                <br />
                <button class="btn btn-success" onclick="location.href='./payment.php?id=<?php echo $row['id_course']; ?>'">Book now</button>
            </div>
            <div class="content__mota">
                <h3><?php echo $row['name']; ?></h3> <br>
               
                <b>
                    <p>Giá của môn học:
                </b> <?php echo $row['price'];  ?> vnđ</p><br>
                <?php $content = $row["body"];
                $arrayBody = explode("/", $content);
                $body = $arrayBody[0];
                $number_student_book = $arrayBody[1];
                $start_day = $arrayBody[3];
                $end_day = $arrayBody[4];
                $number_teach = $arrayBody[2]
                ?>
                <b>
                    <p>Mô tả:
                </b> <?php echo $body; ?></p><br>
                <b>
                    <p>Số lượng có thể tham gia:
                </b> <?php echo $number_student_book ?></p><br>
                <b>
                    <p>Sô lượng học trong tuần:
                </b> <?php echo $number_teach ?> </p><br>
                <b>
                    <p>Ngày bắt đầu:
                </b> <?php echo $start_day ?></p><br>
                <b>
                    <p>Ngày kết thúc:
                </b> <?php echo $end_day ?></p><br>
                <b>
                    <p>Số lượng đã đăng ký học:
                </b> 
                <?php echo $showDetail->getNumberStudent($id); ?></p>
            </div>
        </div>
    </div>
</body>

</html>

<?php include "./footer.php" ?>