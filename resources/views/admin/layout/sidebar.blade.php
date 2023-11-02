<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            
            <div class="nav-profile-text d-flex flex-column">
              <span class="font-weight-bold mb-2">{{Auth::guard('admin')->user()->name}}</span>
              <span class="text-secondary text-small">Project Manager</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.dashboard')}}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Category</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-nature-people menu-icon"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              
              <li class="nav-item"> <a class="nav-link" href="">Categories</a></li>
              <li class="nav-item"> <a class="nav-link" href="">Sub Categories</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="">
            <span class="menu-title">Icons</span>
            <i class="mdi mdi-contacts menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            <span class="menu-title">Forms</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            <span class="menu-title">Charts</span>
            <i class="mdi mdi-chart-bar menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            <span class="menu-title">Tables</span>
            <i class="mdi mdi-table-large menu-icon"></i>
          </a>
        </li>
        
   
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-home"></i>
            </span> @yield('title')
          </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                @yield('add-role')
              </li>
            </ul>
          </nav>
        </div>
        @yield('content')
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="container-fluid d-flex justify-content-between">
          <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Atul Pratap Singh 2023</span>
        </div>
      </footer>
     
    </div>
   
  </div>