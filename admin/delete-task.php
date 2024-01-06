<?php
$conn = mysqli_connect("localhost","root","","aws_pms");

$userid = $_POST['id'];

$sql = "delete from task where task_id  = '".$userid."'";
if(mysqli_query($conn, $sql)){
    echo  1;
}else{
    echo  0;
}