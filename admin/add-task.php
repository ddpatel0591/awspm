<?php

$conn = mysqli_connect("localhost","root","","aws_pms");

extract($_POST);
$dt = date("d M Y h:i:sa");

        if(isset($_POST['submit'])){
            $sql = "insert into task (task_title, description, project, employe, dt, status) value ('".$title."','".$description."','".$project."','".$employe."','".$dt."','".$status."')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo 1;
                header("location:index.php");
            }else{
               echo 0;
                header("location:task.php");
            }
           
        }

?>
