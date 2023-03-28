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
            $sql="SELECT Name,Price,Image,Full_name
            FROM teacher_course
            Left JOIN course ON course.ID_course = teacher_course.ID_course
            Left JOIN teacher ON teacher.ID_teacher = teacher_course.ID_teacher";
            $stm=$this->Ketnoi()->query($sql);
            $Course=array();

            while ($row=$stm->fetch()) {
               $Course[]=$row;
            }
            return $Course;
            
        }


        public function Show_Student(){
            // $sql="SELECT Full_name,Email,Job_Title,Address 
            // from student
            // UNION ALL
            // SELECT Full_name,Email,Job_Title,Address 
            // from teacher
            // ";

            $sql_stu="SELECT Full_name, Email, Job_title, Address,Image
            FROM student 
            LEFT JOIN picture_stu
            ON student.ID_student = picture_stu.ID_student
            ";
            $sql_student=$this->Ketnoi()->query($sql_stu);
            $Student=array();
           

            while ($row=$sql_student->fetch()) {
                $Student[]=$row;
            }
            return $Student;
            
        }

        public function Show_Teacher(){
            $sql_teach="SELECT teacher.ID_teacher, teacher.Full_name, teacher.Email, teacher.Job_title, teacher.Address, picture_teacher.Image
            FROM teacher
            LEFT JOIN picture_teacher
            ON teacher.ID_teacher = picture_teacher.ID_teacher
            ";
            $sql_teacher=$this->Ketnoi()->query($sql_teach);
            $Teacher=array();
            while ($row=$sql_teacher->fetch()){
            $Teacher[]=$row;
            }
            return $Teacher;
        }

        public function Count_Teacher(){
            $sql = "SELECT COUNT(*) AS count FROM teacher";
            $stmt = $this->Ketnoi()->query($sql);
            // $stmt->execute();
            $result = $stmt->fetch();
            return $result['count'];
        }
        public function Count_Student(){
            $sql="SELECT COUNT(*) AS student from student";
            $stm=$this->Ketnoi()->query($sql);
            $stm->execute();
            $row=$stm->fetch();
            return $row['student'];
        }
        public function Count_Course(){
            $sql="SELECT COUNT(*) AS course from course";
            $stm=$this->Ketnoi()->prepare($sql);
            $stm->execute();
            $row=$stm->fetch();
            return $row['course'];
        }

        public function Delete_teacher(){
            $delete=$_GET['delete'];
            $sql="DELETE teacher,teacher_course from teacher
            LEFT JOIN teacher_course on teacher.ID_teacher = teacher_course.ID_teacher
            where teacher.ID_teacher=$delete";
            $stm=$this->Ketnoi()->prepare($sql);
        }



        public function getOrder(){
            $sql="SELECT teacher.Full_name AS teacher_name,picture_teacher.image AS teacher_image, student.Full_name AS student_name,  picture_stu.image AS student_image
            FROM student_teacher
            INNER JOIN student ON student.ID_student = student_teacher.ID_student
            INNER JOIN teacher ON teacher.ID_teacher = student_teacher.ID_teacher
            LEFT JOIN picture_teacher ON picture_teacher.ID_teacher = teacher.ID_teacher
            LEFT JOIN picture_stu ON picture_stu.ID_student = student.ID_student";

            $stm=$this->Ketnoi()->query($sql);
            $Order=array();

            while($row=$stm->fetch()){
                $Order[]=$row;
            }
            return $Order;

        }
    }
    
?>