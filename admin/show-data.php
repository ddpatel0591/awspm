<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
$conn = mysqli_connect("localhost","root","","aws_pms");
$limit = 5;
$page = '';
if(isset($_POST['page_no'])){
  $page = $_POST['page_no'];
}else{
  $page = 1;
}
$offset = ($page - 1) * $limit;
$sql = "SELECT  * FROM Reagister";
if($_SESSION['role'] == 0){
  $sql .= " WHERE id = ".$_SESSION['id']."  LIMIT ".$offset.",".$limit."";
}
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result)> 0){
    $output .= '<table class="table table-bordered table-striped">
                <tr>
                <th>Id</th>
                <th>First_name</th>
                <th>Last_name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
                </tr>';
    $counter = (($page-1)*$limit)+1;
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
        <td>".$counter."</td>
        <td>".$row['First_name']."</td>
        <td>".$row['Last_name']."</td>
        <td>".$row['Username']."</td>
        <td>".$row['Password']."</td>
        <td>".$row['Role']."</td>
        <td>
        <button class='btn btn-info btn-sm' data-id='".$row['id']."'>Edit</button>&nbsp;&nbsp;&nbsp;
        <button class='btn btn-danger btn-sm' data-eid=".$row['id'].">Delete</button>
        </td>
      </tr>";
      $counter++;
    }
    $output .= '</table>';

    $sql_totle = "SELECT * FROM Reagister";
    $record = mysqli_query($conn, $sql_totle);
    $total_records = mysqli_num_rows($record);
    $total_pages = ceil($total_records/$limit);
    $output .= "<div id='pagination' class='card-footer clearfix'>";
    for($i=1; $i <= $total_pages; $i++){
    $output .= "<ul class='pagination pagination float-right'>
                  <a id=".$i." class='page-link' href='#'>".$i."</a>";
    }
    $output .="<ul class='pagination pagination float-right'></div>";  
    echo $output;
    
}
?>