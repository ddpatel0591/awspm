<?php
session_start();

$conn = mysqli_connect("localhost","root","","AWS_NITIN");

if(isset($_POST['username'])){
    $query = "SELECT id,role FROM Reagister WHERE Username = '".$_POST['username']."' AND Password = '".$_POST['password']."'";
    $result = mysqli_query($conn,$query); 
    if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        echo "yes";
    }else{
        echo "no";
    }
}
?>