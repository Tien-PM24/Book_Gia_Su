<?php
    class DataBase{
        protected function Connect(){
            $conn="mysql:host=localhost;dbname=book_tutor";
            $pdo=new PDO($conn,"root","");
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $pdo;
        }
    }
?>