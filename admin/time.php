<?php
session_start();
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
    $date = date('Y-m-d');
    $time= date('H:i:s');


    $sql = "INSERT INTO  attendance (emp_id, emp_name, str_date, str_time) VALUES ('$id', '$name','$date','$time')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

