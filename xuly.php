<?php
// include './Database/conn.php';
    if(isset($_POST['submit'])){
        $Name=$_POST['Name'];
        $Email=$_POST['Email'];
        $Address=$_POST['Address'];
        $Pass=$_POST['Passwork'];
        $Pass_Confirm=$_POST['Confirm'];

        if($Name ==""|| $Email =="" || $Address =="" || $Pass ==""){
            header("location:form.php");
        }else {
            echo $Name;
            echo $Email;
            echo $Address;
            echo $Pass;
            echo $Pass_Confirm;
        }
    }

?>