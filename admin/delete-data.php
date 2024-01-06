<?php
$conn = mysqli_connect("localhost","root","","AWS_NITIN");

$userid = $_POST['eid'];

$sql = "delete from Reagister where id = '".$userid."'";
if(mysqli_query($conn, $sql)){
    echo  1;
}else{
    echo  0;
}