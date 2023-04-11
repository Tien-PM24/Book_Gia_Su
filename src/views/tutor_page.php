<?php include "../../src/core/connectDB.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Pages</title>
</head>
<body>
    <?php
    class ShowTutor extends ConnectDB {
        function getAllTutor () {
            error_reporting(0);
            $conn = $this->connection;
            $sql = "SELECT * FROM teacher";
            $result = $conn->query($sql);
            
            ?> 
            <div class="container">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <?php echo $row["Full_name"] ?>
                            </div>
                            <div class="card-body">
                                <p>Email: <?php echo $row["Email"] ?></p>
                                <p>Job Title: <?php echo $row["Jobtittle"] ?></p>
                                <p>Address: <?php echo $row["Address"] ?></p>
                            </div>
                        </div>
                        <button>View</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
    }

    $showTutor = new ShowTutor();
    $showTutor->getAllTutor();
    ?>
    
</body>
</html>
