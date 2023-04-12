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
        $sql = "SELECT course.ID_course as ID_course ,Name,Price,Image,Full_name
            FROM teacher_course
            Left JOIN course ON course.ID_course = teacher_course.ID_course
            Left JOIN teacher ON teacher.ID_teacher = teacher_course.ID_teacher";
        $stm = $this->Connect()->query($sql);
        $Course = array();
        while ($row = $stm->fetch()) {
            $Course[] = $row;
        }
        return $Course;
    }


    public function showStudent()
    {
        $sql_stu = "SELECT Full_name, Email, Job_title, Address,Image
            FROM student 
            LEFT JOIN picture_stu
            ON student.ID_student = picture_stu.ID_student
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
        $sqlTeach = "SELECT teacher.ID_teacher, teacher.Full_name, teacher.Email, teacher.Job_title, teacher.Address, picture_teacher.Image
            FROM teacher
            LEFT JOIN picture_teacher
            ON teacher.ID_teacher = picture_teacher.ID_teacher
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
        $pdo = $this->Connect();
        $pdo->beginTransaction();

        try {
            $pdo->query("set foreign_key_checks=0");
            // Xóa khóa ngoại trước
            $pdo->query("DELETE teacher, student_teacher, teacher_course, picture_teacher
            FROM teacher
            LEFT JOIN student_teacher ON teacher.ID_teacher = student_teacher.ID_teacher
            LEFT JOIN teacher_course ON teacher.ID_teacher = teacher_course.ID_teacher
            LEFT JOIN picture_teacher ON teacher.ID_teacher = picture_teacher.ID_teacher
            WHERE teacher.ID_teacher = $delete;");
            $pdo->commit();
        } catch (PDOException $e){
            $pdo->rollBack();
            echo "Erro: " . $e->getMessage();
        }
    }



    public function getOrder()
    {
        $sql = "SELECT distinct teacher.Full_name as Teacher, picture_teacher.Image as Image_teacher, student.Full_name as Student, picture_stu.Image as Image_student, Course.Name
        From student_teacher
        inner join student on student.ID_student =student_teacher.ID_student
        inner join teacher on teacher.ID_teacher=student_teacher.ID_teacher
        left join teacher_course on teacher_course.ID_teacher=student_teacher.ID_teacher
        left join course on course.ID_course=teacher_course.ID_course
        left join picture_stu on picture_stu.ID_student = student_teacher.ID_student
        left join picture_teacher on picture_teacher.ID_teacher=student_teacher.ID_teacher";

        $stm = $this->Connect()->query($sql);
        $Order = array();

        while ($row = $stm->fetch()) {
            $Order[] = $row;
        }
        return $Order;
    }

    public function updateProfile($image,$ID){

        $sql="UPDATE admin set Image=? where ID_Admin=?";
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
        $sql="SELECT * from admin where ID_admin=?";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute([$id]);
        $row=$stm->fetchAll();
        return $row;
    }

    // public function logIn($email,$pass){
    //     $sql="SELECT * from admin";
    //     $stm=$this->Connect()->query($sql);
    //     while ( $row=$stm->fetch()) {
    //         if ($email==$row["Email"] && $pass==$row["Password"]) {
    //             header("location:../Pages/Admin/Php/FrontEnd/Home.php");
    //          }
    //     }
    // }

    // function search($Name){
    //     $sql = "SELECT * from course where Name like(:name)"; // :name là tham số truyền vào giá trị của biến $Name
    //     $stm = $this->Connect()->prepare($sql);
    //     $stm->bindParam(':name', $Name); // bindParam một phương thức để gán giá trị cho tham số truy vấn // giá trị đầu tiên là truyền tham sô, thứ 2 là truyền giá trị tham số
    //     $stm->execute();

    //     $Search = array();
    
    //     while ($row=$stm->fetch()){
    //         $Search[] = $row;
    //     }
    //     return $Search;
    // }

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
