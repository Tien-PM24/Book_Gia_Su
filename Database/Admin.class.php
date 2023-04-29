<?php


include "Database.class.php";
class Admin extends DataBase
{
    private $fullName;
    private $Email;
    private $Password;
    private $Image;

    public function setAdmin($fullName, $Email, $Password, $Image)
    {
        $this->fullName = $fullName;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->Image = $Image;
    }

    public function showCourse()
    {
        $sql = "SELECT course.id_course as id_course ,name,price,image,full_name
            FROM teacher_course
            Left JOIN course ON course.id_course = teacher_course.id_course
            Left JOIN teacher ON teacher.id_teacher = teacher_course.id_teacher";
        $stm = $this->Connect()->query($sql);
        $Course = array();
        while ($row = $stm->fetch()) {
            $Course[] = $row;
        }
        return $Course;
    }


    public function showStudent()
    {
        $sql_stu = "SELECT full_name, email, job_title, address,image
            FROM student 
            LEFT JOIN picture_stu
            ON student.id_student = picture_stu.id_student
            ";
        $sql_student = $this->Connect()->query($sql_stu);
        $Student = array();


        while ($row = $sql_student->fetch()) {
            $Student[] = $row;
        }
        return $Student;
    }

    public function showTeacher()
    {
        $sqlTeach = "SELECT teacher.id_teacher, teacher.full_name, teacher.email, teacher.job_title, teacher.address, picture_teacher.image
            FROM teacher
            LEFT JOIN picture_teacher
            ON teacher.id_teacher = picture_teacher.id_teacher
            ";
        $sqlTeacher = $this->Connect()->query($sqlTeach);
        $Teacher = array();
        while ($row = $sqlTeacher->fetch()) {
            $Teacher[] = $row;
        }
        return $Teacher;
    }

    public function countTeacher()
    {
        $sql = "SELECT COUNT(*) AS count FROM teacher";
        $stm = $this->Connect()->query($sql);
        // $stmt->execute();
        $result = $stm->fetch();
        return $result['count'];
    }
    public function countStudent()
    {
        $sql = "SELECT COUNT(*) AS student from student";
        $stm = $this->Connect()->query($sql);
        $stm->execute();
        $row = $stm->fetch();
        return $row['student'];
    }
    public function countCourse()
    {
        $sql = "SELECT COUNT(*) AS course from course";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $row = $stm->fetch();
        return $row['course'];
    }

    public function countOrder()
    {
        $sql = "SELECT COUNT(*) AS count_order from student_teacher";
        $stm = $this->Connect()->query($sql);
        $row = $stm->fetch();
        return $row['count_order'];
    }


    public function deleteTeacher()
    {
        $delete = $_GET['delete'];
        // $sql1="";
        $sql2="set foreign_key_checks=0;
        DELETE teacher, student_teacher, teacher_course, picture_teacher
        FROM teacher
        LEFT JOIN student_teacher ON teacher.ID_teacher = student_teacher.ID_teacher
        LEFT JOIN teacher_course ON teacher.ID_teacher = teacher_course.ID_teacher
        LEFT JOIN picture_teacher ON teacher.ID_teacher = picture_teacher.ID_teacher
        WHERE teacher.ID_teacher = $delete";
        $pdo = $this->Connect();
        $pdo->exec($sql2);
        // $pdo = $this->Connect()->query();
        
        try {
            $pdo->query("set foreign_key_checks=0");
            // Xóa khóa ngoại trước
            $pdo->query("DELETE teacher, student_teacher, teacher_course, picture_teacher
            FROM teacher
            LEFT JOIN student_teacher ON teacher.id_teacher = student_teacher.id_teacher
            LEFT JOIN teacher_course ON teacher.id_teacher = teacher_course.id_teacher
            LEFT JOIN picture_teacher ON teacher.id_teacher = picture_teacher.id_teacher
            WHERE teacher.id_teacher = $delete;");
            $pdo->commit();
        } catch (PDOException $e){
            $pdo->rollBack();
            echo "Erro: " . $e->getMessage();
        }

    }



    public function getOrder()
    {
        $sql = "SELECT DISTINCT teacher.full_name as teacher,picture_teacher.image as image_teacher,student.full_name AS student,picture_stu.image as image_student,course.name as Course
        FROM student_teacher
        INNER JOIN student ON student.id_student = student_teacher.id_student
        INNER JOIN teacher ON teacher.id_teacher = student_teacher.id_teacher
        LEFT JOIN teacher_course ON teacher_course.id_teacher = student_teacher.id_teacher
        LEFT JOIN payment on payment.id_student=student.id_student
        LEFT JOIN course on payment.id_course=course.id_course
        left join picture_teacher on picture_teacher.id_teacher=student_teacher.id_teacher
        left join picture_stu on picture_stu.id_student = student_teacher.id_student";


        $stm = $this->Connect()->query($sql);
        $Order = array();

        while ($row = $stm->fetch()) {
            $Order[] = $row;
        }
        return $Order;
    }

    public function updateProfile($image,$ID){

        $sql="UPDATE admin set Image=? where id_admin=?";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute([$image,$ID]);
    }

    public function Profile(){
        $sql="SELECT * from admin";
        $stm=$this->Connect()->query($sql);
        $Admin=array();
        while ($row=$stm->fetch()) {
            $Admin[]=$row;
        }
        return $Admin;
    }
    public function editProfile($id){
        $sql="SELECT * from admin where id_admin=?";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute([$id]);
        $row=$stm->fetchAll();
        return $row;
    }

    function search($Name){
        $sql="SELECT * from course where Name like('%' ? '%')";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute([$Name]);
        $Search=array();

        while ($row=$stm->fetch()){
            $Search[]=$row;
        }
        return $Search;

    }
}

    
?>
