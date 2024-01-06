<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
print_r($_POST);
$conn = mysqli_connect("localhost","root","","aws_pms");
  $sql = "SELECT task.task_id,task.task_title,projects.projectname,Reagister.First_name,task.description,task.dt,task.status FROM task
  LEFT JOIN projects ON task.project = projects.projectid
  LEFT JOIN Reagister ON task.employe = Reagister.id"; 
if($_SESSION['role'] == 0){
  $sql .= " WHERE task.employe = ".$_SESSION['id'];
}
$sql .= " ORDER BY task.status DESC";
$result = mysqli_query($conn, $sql);
$output1 = "";
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
   $p = "";
   $counter=1;
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
    }
    echo $output;
?>
    