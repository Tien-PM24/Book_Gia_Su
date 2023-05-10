<?php
    class DataBase{
        protected function Connect(){
            $conn="mysql:host=localhost;dbname=book_tutor";
            $pdo=new PDO($conn,"root","");
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $pdo;
        }
    }

    class ConnectDB {
        protected $connection;
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $nameDB = "book_tutor";
    
    
        public function __construct() {
            $this->connection = mysqli_connect("$this->hostname","$this->username","$this->password","$this->nameDB");
            if(!$this->connection){
                die ("Failed to connect with server");
            }
            mysqli_set_charset($this->connection, 'utf8');
        }
    }
?>