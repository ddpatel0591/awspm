<?php
$conn = mysqli_connect("localhost","root","","AWS_NITIN");

    $sql = "select * from Stutas";

    $result = mysqli_query($conn, $sql);

    $stats = "";

        while($row = mysqli_fetch_assoc($result)){

            $stats .= '<option value="'.$row['id'].'">'.$row['Stutas'].'</option>';
    }
    echo $stats;

?>