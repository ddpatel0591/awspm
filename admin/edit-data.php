<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
$conn = mysqli_connect("localhost","root","","aws_pms");
$userid = $_POST['id'];

$sql = "SELECT * FROM Reagister WHERE id = '".$userid."'";
$result = mysqli_query($conn, $sql);
$output = '';
if(mysqli_num_rows($result)> 0){
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<div class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content" id="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form" action="insert-data.php" method="POST">
            <div class="modal-body">
            <div class ="form-group">
                  <input type="hidden" id="task_id" name="task_id" class="form-control">
              </div>
              <div class ="form-group">
                  <label for="">First_Name</label>
                  <input type="text" id="fname" name="fname" class="form-control" placeholder="First_Name">
              </div>
              <div class ="form-group">
                  <label for="">Last_Name</label>
                  <input type="text" id="lname" name="lname" class="form-control" placeholder="Last_Name">
              </div>
              <div class ="form-group">
                  <label for="">Username</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="Username">
              </div>
              <div class ="form-group">
                  <label for="">Password</label>
                  <input id="psw" name="psw" class="form-control" rows="5" cols="50">
              </div>
                  <label>User Role</label>
                      <select id="project" class="form-control" name="User Role" >
                      <option value="0">User Role</option>
                  </select>
                  <br>
                  <div class="col-4">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Register</button>
                </div>     
            </div>
      </form>
          </div>
        </div>
      </div>';
    }
    echo $output;
}

?>