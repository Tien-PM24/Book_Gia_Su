
<?php
class connectDB {
    protected $conn;
    protected $hostname = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $nameDB = "book_tutor";
    
    public function __construct() {
        $this->conn = mysqli_connect("$this->hostname","$this->username","$this->password","$this->nameDB");
        if(!$this->conn){
            die ("Failed to connect with server");
        }
        mysqli_set_charset($this->conn, 'utf8');
    }
}

?>