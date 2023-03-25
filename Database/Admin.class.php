<?php
include "Database.class.php";
    class Admin extends DataBase{
        private $Full_name;
        private $Email;
        private $Password;
        private $Image;

        public function setAdmin($Full_name,$Email,$Password,$Image)
        {
            $this->Full_name=$Full_name;
            $this->Email=$Email;
            $this->Password=$Password;
            $this->Image=$Image;
        }

        public function Show_Course(){
            $sql="SELECT * from course";
            $stm=$this->Ketnoi()->query($sql);
            $Course=array();

            while ($row=$stm->fetch()) {
               $Course[]=$row;
            }
            return $Course;
            
        }
    }

?>