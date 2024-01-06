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
      <form id="form2" action="add-task.php" method="POST">
      <div class="modal-body">
      <div class ="form-group">
            <input type="hidden" id="task_id" name="task_id" class="form-control">
        </div>
        <div class ="form-group">
            <label for="">task title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Title">
        </div>
        <div class ="form-group">
            <label for="">description</label>
            <textarea id="description" name="description" class="form-control" rows="5" cols="50"></textarea>
            
        </div>
        
            <label>Project</label>
                <select id="project" class="form-control" name="project" >
                <option value="0">Select Project</option>
            </select>
            <label>Employe</label>
                <select id="employe" class="form-control" name="employe" >
                <option value="0">select employe</option>
             </select>
             
             
      </div>
      <div class="modal-footer">add
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
            <?php
            if($_SESSION['role'] == 1){
            ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Task Bord</h3>
                <a href="" data-toggle="modal" data-target="#AdduserModal" class="btn btn-primary float-right">Add Task</a>
              </div>
             <?php
            }
             ?>
              <!-- /.card-header -->
              <div id="example2" class="table table-bordered table-striped">
          </div>
              
          
 <!------------------------------------------ Jquery--------------------------------------------------->         
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
          $(document).ready(function(){
            var form = $("#form1");
              $("#submit").click(function(){
                e.preventDefault();
//add task --------------------------------------------
                $.ajax({
                url: "add-task.php",
                type: "POST",
                data: ("#form1 input").serialize(),
                success: function(respons){
                alert("1");
                }
              });
            });
// show task ------------------------------------------           
            function loadTable(page){
              var task_id = $("#task_id").val();
                $.ajax({
                url: "show-task.php",
                type: "POST",
                data: {task_id:task_id},
                success: function(data){
                console.log(data);
                  $("#example2").html(data);
                }
              });
            }
            loadTable();
// pageination code---------------------------------------
            $(document).on("click","#pagination ul a", function(e){
              e.preventDefault();
                var page_no = $(this).attr('id');
              $.ajax({
              url: "show-task.php",
              type: "POST",
              data: {page_no : page_no},
                success: function(data){
                  $("#example2").html(data);
                }
              });
            });
// delete task -------------------------------------------                  
            $(document).on("click",".btn-danger",function(){
              if(confirm('Are you sure you want to delete this Entry?')){
                  var user_eid = $(this).data("id");
                  var element = this;
              $.ajax({
              url: "delete-task.php",
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

            function openEditModal() {
              // Make an asynchronous request to edit-data.php
              $.ajax({
                  url: 'edit-data.php',
                  method: 'GET',
                  success: function(data) {
                      // Populate the modal content with the data received
                      $('#modalContent').html(data);
                      // Display the modal and overlay
                      $('#myModal, #overlay').css('display', 'block');
                  },
                  error: function() {
                      alert('Error loading data from edit-data.php');
                  }
              });
          }

          function closeModal() {
              $('#myModal, #overlay').css('display', 'none');
          }
// fetch dynemic project in task form -------------------             
              $.ajax({
              url: "fetch-project.php",
              type: "POST",
              success: function(datas){
                $("#project").append(datas);
                }
              })
// fetch dynemic employe in task form -------------------                   
              $.ajax({
              url: "fetch-employe.php",
              type: "POST", 
              success: function(datas1){
                $("#employe").append(datas1);
                }
              });
// dropdown in task form ----------------------------------              
            $(document).on("change", "#select", function(){
                var $this = $(this);
                var selector= $this.val();
                var selector_txt= $this.find("option:selected").text();
                var task_id = $this.parents("tr").find("#task_id").val();
              $.ajax({
              url: "show-task.php",
              type: "POST",
              data: {selector_id: selector,taskid: task_id},
              success: function(datas){
                  if(datas == true){
                    alert("Status Updated to "+selector_txt);
                  }else{
                    alert("Status not Updated, try again!!!");
                  }
                }
              });
            })

          });
        </script>
                       
                       
    </div>
</div>
</div>
<?php
include("include/footar.php");
?>