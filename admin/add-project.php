<?php

$conn = mysqli_connect("localhost","root","","AWS_NITIN");

extract($_POST);

        if(isset($_POST['submit'])){
            $sql = "insert into projects (projectname) values ('".$project."')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo 1;
                header("location:project.php");
            }else{
               echo 0;
                header("location:project.php");
            }
           
        }

?>