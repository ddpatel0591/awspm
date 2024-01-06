<?php
session_start();

if(!isset($_SESSION['username'])){
  header("location:login.php");
}
$conn = mysqli_connect("localhost","root","","AWS_NITIN");

extract($_POST);
        
        if(isset($_POST['submit'])){
            $sql1 = "select username from Reagister where username = '".$username."'";
            $result1 = mysqli_query($conn, $sql1);
            if($row = mysqli_fetch_assoc($result1)> 0){
                header("location:register.php");
            }else{
                $sql = "insert into Reagister (First_name, Last_name, Username, Password, Role) value ('".$fname."','".$lname."','".$username."','".$psw."','".$role."')";
            $result = mysqli_query($conn, $sql);
            if($result){
               
                header("location:ragisterd.php");
            }else{
                
                header("location:ragisterd.php");
            }
           
        }
            }
            
    ?>