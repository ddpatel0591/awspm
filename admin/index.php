<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
include("include/sidebar.php");
include("include/header.php");
include("include/topbar.php");

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="task.php" class="nav-link active">
                            <i class="fa fa-list-ul"></i>&nbsp;&nbsp;
                            Task
                        </a>
                        <a href="ragisterd.php" class="nav-link active">
                            <i class='far fa-address-book'></i>&nbsp;&nbsp;
                            User
                        </a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section>
        <div>
        
            <input type="hidden" id= "emp_id" name="emp_id" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" id= "emp_name" name="emp_name" value="<?php echo $_SESSION['username']; ?>">

            <button type="submit" name="submit" class="day_st">Day Start</button>  
            <button type="submit" name="submit" class="day_en">Day End</button>   

        </div>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php
include("include/footar.php");

?>
<script>

$(document).ready(function(){
$(".day_st").click(function()


{
  
  var emp_id = $("#emp_id").val();
  //alert (emp_id);
  var emp_name = $("#emp_name").val();
  var is_error = '';
  if(emp_id != '' && emp_name != ''){
    $.ajax({
      url:"time.php",
      type: "POST",
      data: {emp_id:emp_id,emp_name:emp_name},
      success: function(data){
       if(data == "no"){
        alert("wrong data"); 
       }else{
        // window.location.replace("task.php");
       }
      }
    });
    return false;
  }else{
    alert("all filed are required");
  }
  return false;
});
});

</script>
<script>

$(document).ready(function(){
$(".day_en").click(function()


{
  
  var emp_id = $("#emp_id").val();
  //alert (emp_id);
  var emp_name = $("#emp_name").val();
  var is_error = '';
  if(emp_id != '' && emp_name != ''){
    $.ajax({
      url:"end.php",
      type: "POST",
      data: {emp_id:emp_id,emp_name:emp_name},
      success: function(data){
       if(data == "no"){
        alert("wrong data"); 
       }else{
        // window.location.replace("task.php");
       }
      }
    });
    return false;
  }else{
    alert("all filed are required");
  }
  return false;
});
});

</script>