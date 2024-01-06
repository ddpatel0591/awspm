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
      <form id="form3" action="add-project.php" method="POST">
      <div class="modal-body">
        
        <div class ="form-group">
            <label for="">Project Name</label>
            <input type="text" id="project" name="project" class="form-control" placeholder="Project Name">
            <option value=""></option>
        </div>
        </div>
      <div class="modal-footer">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Projects Bord</h3>
      <a href="" data-toggle="modal" data-target="#AdduserModal" class="btn btn-primary float-right">Add Task</a>
  </div>
<!-- /.card-header -->
<div class="card-body">
  <div id="example3" class="table table-bordered table-striped">
  </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function(){
      var form = $("#form1");
        $("#submit").click(function(){
        e.preventDefault();
          $.ajax({
          url: "add-project.php",
          type: "POST",
          data: ("#form1 input").serialize(),
            success: function(respons){
            alert("1");
            }
          });
        });
        function loadTable(page){
          $.ajax({
          url: "show-project.php",
          type: "POST",
            success: function(data){
            $("#example3").html(data);
            }
          });
        }
        loadTable();
      $(document).on("click","#pagination ul a", function(e){
        e.preventDefault();
          var page_no = $(this).attr('id');
          $.ajax({
          url: 'show-project.php',
          type: "POST",
          data : {page_no : page_no},
            success: function(datap){
              $("#example3").html(datap);
            }
          });
      }) 
      $(document).on("click",".btn-danger",function(){
        if(confirm('Are you sure you want to delete this Entry?')){
        var user_eid = $(this).data("id");
        var element = this;
          $.ajax({
          url: "delete-project.php",
          type: "POST",
          data: {id : user_eid},
            success: function(data){
              if(data = 1){
              $(element).closest("tr").fadeOut();
              }
            }
          })
        }
      });
      $(document).on("click",".btn-info", function(){
      var user_id = $(this).data("eid");
//alert(user_id); pending ---------------------------
        $.ajax({
        url: "edit-data.php",
        type : "POST",
        data: {user_eid: user_id},
          success: function(data){
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