
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="assets/dist/img/AWS.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
      <span class="brand-text font-weight-light">Angle Web Solution</span>
    </a>
      
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img  src="assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username'];?></a>
        </div>
      </div>
      <?php
            if($_SESSION['role'] == 0){     
      ?>
          <a href="index.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;&nbsp;
            Dashboard
          </a>
          <?php     
            }
          ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Tasks
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="task.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view Task</p>
                </a>
              </ul>
              <?php
            if($_SESSION['role'] == 1){
            ?>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="project.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project</p>
                </a>
              </ul>
              </li>
              <?php
            }
          ?>
          <li class="nav-header">Settings</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p class="">Admin Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/LTE/LTE-service/admin/ragisterd.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>Ragisterd User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>Role For User</p>
            </a>
          </li>
          <td>
              <a href='logout.php' type="button" class="btn btn-block btn-outline-danger">Logout</a>
          </td>
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>