<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
$conn = mysqli_connect("localhost","root","","aws_pms");
if(isset($_POST['selector_id'])){
  $task_id = $_POST['taskid'];
  $sql1 = "UPDATE task SET status = ".$_POST['selector_id']." WHERE task_id = ".$task_id;
  if(mysqli_query($conn, $sql1)){
    echo true;
  }else{
    echo false;
  }
  exit;
}else{

$limit = 5;
$page = '';
if(isset($_POST['page_no'])){
  $page = $_POST['page_no'];
}else{
  $page = 1;
}
  $offset = ($page - 1) * $limit;
  $sql = "SELECT task.task_id,task.task_title,projects.projectname,Reagister.First_name,task.description,task.dt,task.status FROM task
  LEFT JOIN projects ON task.project = projects.projectid
  LEFT JOIN Reagister ON task.employe = Reagister.id"; 
if($_SESSION['role'] == 0){
  $sql .= " WHERE task.employe = ".$_SESSION['id'];
}
$sql .= " ORDER BY task.status DESC LIMIT ".$offset.",".$limit."";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result)> 0){
    $output = '<table>
                <tr>
                <th>Id</th>
                <th>Task_Title</th>     
                <th>Project_name</th>
                <th width=5%>Employe_name</th>
                <th width=20%>Description</th>
                <th width=10%>Date/Time</th>
                <th>Stutas</th>';
                if($_SESSION['role'] == 1){ 
    $output .= '<th>Action</th>';
                }
   $output .= '</tr>';
    $counter=(($page-1)*$limit)+1;
    while($row = mysqli_fetch_assoc($result)){
      $status = $row['status'];
        $output .= "<tr>
        <td>".$counter."</td>
        <td>".$row['task_title']."</td>
        <td>".$row['projectname']."</td>
        <td>".$row['First_name']."</td>  
        <td>".$row['description']."</td>
        <td>".$row['dt']."</td><td>
              <select name='select' id='select'>
                <option value='0' ".(($status == 0) ? 'selected' : '').">Pending</option>
                <option value='2' ".(($status == 2) ? 'selected' : '').">Working</option>
                <option value='1' ".(($status == 1) ? 'selected' : '').">Complete</option>
              </select>
              <input type='hidden' id='task_id' value='".$row['task_id']."'>
        </td>";
        
        if($_SESSION['role'] == 1){ 
        $output .= "<td><button class='btn btn-info btn-sm' data-eid='".$row['task_id']."'>Edit</button>&nbsp;&nbsp;&nbsp;
                    <button class='btn btn-danger btn-sm' data-id=".$row['task_id'].">Delete</button></td>";
        }
        $output .= "</tr>";
        $counter++;

      }
      $output .= '</table>';

      $sql_totle = "SELECT * FROM task";
      $record = mysqli_query($conn, $sql_totle);
      $total_records = mysqli_num_rows($record);
      $total_pages = ceil($total_records/$limit);
      $output .= "<div id='pagination' class='card-footer clearfix'>";
      for($i=1; $i <= $total_pages; $i++){
      $output .= "<ul class='pagination pagination float-right'>
                    <a id=".$i." class='page-link' href='#'>".$i."</a>";
      }
    }
    $output .="<ul class='pagination pagination float-right'></div>";  
    echo $output;
  }
?>
    


    
                