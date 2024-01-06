<?php
session_start();
include("include/header.php");
?>


<div style="width:400px; margin:0 auto;"class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
        
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="loginmodel" action="logincode.php" method="POST">
        <div class="input-group mb-3">
          <input type="username" id="username" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class = "error_failed" id="Username_error"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class = "error_failed" id="Password_error"></span>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="login_btn" name="login_btn" class="btn btn-primary btn-block">LogIn</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
    
        
        
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register Now</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

$(document).ready(function(){
$("#login_btn").click(function(){
  
  var username = $("#username").val();
  var password = $("#password").val();
  var is_error = '';
  if(username != '' && password != ''){
    $.ajax({
      url:"logincode.php",
      type: "POST",
      data: {username:username,password:password},
      success: function(data){
       if(data == "no"){
        alert("wrong data"); 
       }else{
        window.location.replace("index.php");
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
</body>
</html>
