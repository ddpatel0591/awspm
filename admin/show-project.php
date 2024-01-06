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
$sql = "SELECT * FROM projects LIMIT ".$offset.",".$limit."";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result)> 0){
    $output = '<table class="table table-bordered table-striped">
                <tr>
                <th>Id</th>
                <th>projectname</th>
                <th>Action</th>
                </tr>';
                
    $counter= (($page - 1)* $limit)+1;
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
        <td>".$counter."</td>
        <td class='projectname'>".$row['projectname']."</td>
        <td>
        <button data-toggle='modal' data-target='#AdduserModal' class='btn btn-info btn-sm' data-eid='".$row['projectid']."'>Edit</button>&nbsp;&nbsp;&nbsp;
        <button class='btn btn-danger btn-sm' data-id=".$row['projectid'].">Delete</button>
        </td>
      </tr>";
      $counter++;
     
    }
    $output .= '</table>';

    $sql_totle = "SELECT * FROM projects";
    $record = mysqli_query($conn, $sql_totle);
    $totle_record = mysqli_num_rows($record);
    $totle_page = ceil($totle_record/$limit);

    $output .= "<div id='pagination' class='card-footer clearfix'>";
    for($i=1; $i <= $totle_page; $i++){
      $output .= "<ul class='pagination pagination float-right'>
      <a id=".$i." class='page-link' href='#'>".$i."</a>";
    }
    $output .= "<div'>";
    echo $output;
}
?>