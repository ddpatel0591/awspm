<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
include("include/header.php");
include("include/topbar.php");
include("include/sidebar.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
<!-- Modal add user -->
<div class="modal fade" id="AdduserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
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
</div>
<?php
if(isset($_POST['status'])){
echo "<h4>".$_SESSION['status']."</h4>";
unset($_SESSION['status']);
}
?>
<?php
if($_SESSION['role'] == 1){
?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Ragisterd users</h3>
      <a href="" data-toggle="modal" data-target="#AdduserModal" class="btn btn-primary float-right">Add User</a>
  </div>
<?php
  }
?>
<!-- /.card-header -->
<div class="card-body">
<div id="example1" class="table table-bordered table-striped">
</div>

<!-- Modal Edit user -->
<div id="EdituserModal">
  
</div>

</div>    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function(){
    var form = $("#form");
      $("#submit").click(function(){
        e.preventDefault();

    $.ajax({
    url: "insert-data.php",
    type: "POST",
    data: ("#form input").serialize(),
    success: function(data){
    window.location.replace("ragisterd.php");
    }
  });
});
  function loadTable(page){                          
    $.ajax({
    url: "show-data.php",
    type: "POST",
      success: function(data){
      $("#example1").html(data);
      }
    });
  }
  loadTable();

  $(document).on("click","#pagination ul a", function(e){   
    e.preventDefault();
      var page_no = $(this).attr('id');
    $.ajax({
    url: "show-data.php",
    type: "POST",
    data: {page_no : page_no},
    success: function(data){
      $("#example1").html(data);
    }
    });
  });
  $(document).on("click",".btn-danger",function(){
    if(confirm('Are you sure you want to delete this Entry?')){
      var user_eid = $(this).data("eid");
      var element = this;
      $.ajax({
      url: "delete-data.php",
      type: "POST",
      data: {eid : user_eid},
        success: function(data){
          if(data = 1){
            $(element).closest("tr").fadeOut();
          }
        }
      })
    }
  });
  $(document).on("click",".btn-info", function(e){
    e.preventDefault();
    $("#EdituserModal").show();
    var user_id = $(this).data("id");
      $.ajax({
      url: "edit-data.php",
      type : "POST",
      data: {id : user_id},
        success: function(data){
          $("#EdituserModal").html(data);
        }
      });
    });
  });
</script>
    </div>
</div>
</div>
<?php
  include("include/footar.php");
?>