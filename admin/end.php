<?php
//session_start();
// Assuming you've established a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aws_pms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['emp_id']) && isset($_POST['emp_name'])) {
    $id = $_POST['emp_id'];
    $name = $_POST['emp_name'];
    $time = new DateTime();
    date_default_timezone_set("Asia/Kolkata");  
     $time = date('H:i:s');
     $date = date('Y-m-d');
  
    // $sql = "UPDATE attendance SET end_date = $date , end_time = $time WHERE emp_id = '$id' , emp_name = '$name'";
    $sql=" UPDATE `attendance` SET `emp_id`=' $id ',`emp_name`='$name',`end_date`=' $date',`end_time`='$time' WHERE  $id";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

