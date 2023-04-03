<?php
include "Database.class.php";
abstract class User extends Database{
    protected $Name;
    protected $Job_title;
    protected $Address;
    protected $Email;
    protected $Password;
   abstract public function setUser($Name,$Job_title,$Address,$Email,$Password);
   abstract  public function Search($A);
   abstract  public function Login($Name, $Job_title, $Address, $Email, $Password);
   abstract  public function Logout();
   abstract  public function Singin();
   abstract  public function Reset_passwork();
}
class Student extends User{
    public function setUser($Name, $Job_title, $Address, $Email, $Password)
    {
        $this->Name=$Name;
        $this->Job_title=$Job_title;
        $this->Address=$Address;
        // $this->Phone_number=$Phone_number;
        $this->Email=$Email;
        $this->Password=$Password;

    }
    public function Search($C){

    }
    public function Login($Name,$Job_title,$Email,$Password,$Address){
        $this->Name=$Name;
        $this->Job_title=$Job_title;
        $this->Address=$Address;
        // $this->Phone_number=$Phone_number;
        $this->Email=$Email;
        $this->Password=$Password;
        $sql="INSERT INTO student(Full_name,Email,Password,Job_title,Address) values (?,?,?,?,?)";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute([$Name,$Job_title,$Email,$Password,$Address]);
    }
    public function Logout(){

    }
    public function Singin(){

    }
    public function Reset_passwork(){

    }
}

class Teacher extends User{
    public function setUser($Name, $Job_title, $Address,  $Email, $Password)
    {
        $this->Name=$Name;
        $this->Job_title=$Job_title;
        $this->Address=$Address;
        // $this->Phone_number=$Phone_number;
        $this->Email=$Email;
        $this->Password=$Password;
    }
    public function Search($Name_Course){
        $sql="SELECT Name from course where Name like ? ";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute(["%$Name_Course%"]);
        $Ket_Qua=array();
        while ($row=$stm->fetch()) {
            $Ket_Qua[]=$row;
        }
        return $Ket_Qua;

    }

    public function Login($Name, $Job_title, $Email, $Password, $Address){
        $this->Name=$Name;
        $this->Job_title=$Job_title;
        $this->Address=$Address;
        // $this->Phone_number=$Phone_number;
        $this->Email=$Email;
        $this->Password=$Password;
        $sql="INSERT INTO teacher(Full_name,Email,Password,Job_title,Address) values (?,?,?,?,?)";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute([$Name,$Job_title,$Email,$Password,$Address]);
    }
    
    public function Logout(){

    }
    public function Singin(){

    }
    public function Reset_passwork(){

    }
    public function Insert_course($Name,$Price,$Body,$Image){
        $sql="INSERT INTO course(Name,Price,Body,Image) values (?,?,?,?)";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute([$Name,$Price,$Body,$Image]);
    }
    public function Update_course(){

    }
    public function Delete_course(){

    }
    public function Edit_course(){

    }
   }
