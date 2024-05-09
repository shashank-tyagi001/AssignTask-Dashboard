 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href={{route('register')}} class="nav-link">
                  <i class="far fa-square nav-icon"></i>
                  <p>User Registration</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Projects
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{route('project')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Project</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('projectList')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Project List</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Employees
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{route('employee')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Employee</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('employeeList')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Employee List</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                   Assign Employees
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{route('assignEmp')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Assign Employee</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('empList')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Assign Employee List</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                   Assign Task
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{route('assignTask')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Assign Task</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('taskList')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Assign Task List</p>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item">
                <a href={{route('showReports')}} class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                   Daily Reports
                  </p>
                </a>
              </li>




      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
