<?php

$conn = mysqli_connect("localhost","root","","aws_pms");

    $sql = "select * from projects";

    $result = mysqli_query($conn, $sql);

    $project = "";

        while($row = mysqli_fetch_assoc($result)){

            $project .= '<option value="'.$row['projectid'].'">'.$row['projectname'].'</option>';
    }
    echo $project;

?>