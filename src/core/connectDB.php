<?php
class ConnectDB {
    protected $connection;
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $nameDB = "book_tutor";


    function connect() {
        $this->connection = mysqli_connect("$this->hostname","$this->username","$this->password","$this->nameDB");
        if(!$this->connection){
            die ("Failed to connect with server");
        }
        mysqli_set_charset($this->connection, 'utf8');
    }
}

?>