<?php
include("include/header.php");
?>


<div style="width:400px; margin:0 auto;" class="register-box">
  <div class="register-logo">
    <a href=""><b>Reagister</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      
      <form id="form" action="insert-data.php" method="post">
        <div class="input-group mb-3">
          <label class="input-group mb-3">First_Name</label>
          <input type="text" name="fname" id="fname" class="form-control" placeholder="First name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <label class="input-group mb-3">Last_Name</label>
          <input type="taxt" name="lname" id="lname" class="form-control" placeholder="Lastname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <label class="input-group mb-3">Username</label>
          <input type="taxt" name="username" id="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
              <span id="takan"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <label class="input-group mb-3">Password</label>
          <input type="password" name="psw" id="psw" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>User Role</label>
          <select class="form-control" id="role" name="role">
            <option value="0">Normal User</option>
            <option value="1">Admin</option>
            </select>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <p class="mb-0"><a href="login.php" class="text-center">Login Now</a></p>


          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
          $(document).ready(function() {
            var form = $("#form");
            $("#submit").click(function() {
              e.preventDefault();
              $.ajax({
                url: "insert-data.php",
                type: "POST",
                data: ("#form input").serialize(),
                success: function(data) {
                  alert("1");
                
                }
              });

            });

          });
        </script>
        <p class="mb-0">
          <a href="login.php" class="text-center">Login Now</a>
        </p>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  </body>

  </html>