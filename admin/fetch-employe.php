<?php

$conn = mysqli_connect("localhost","root","","AWS_NITIN");

    $sql = "select * from Reagister";

    $result = mysqli_query($conn, $sql);

    $projects = "";

        while($row = mysqli_fetch_assoc($result)){

            $projects .= '<option value='.$row['id'].'>'.$row['First_name'].'</option>';
    }
    echo $projects;

?>