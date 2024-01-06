<?php

$conn = mysqli_connect("localhost", "root", "", "aws_pms");

extract($_POST);

if (isset($project)) {
    if (isset($_POST['project_id']) && $_POST['project_id'] != "0") {
        $project_id = (int) $_POST['project_id'];
        $sql = "update projects set projectname = '" . $project . "' where projectid=" . $project_id;
    } else {
        $sql = "insert into projects (projectname) values ('" . $project . "')";
    }
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 1;
        header("location:project.php");
    } else {
        echo 0;
        header("location:project.php");
    }
}

?>