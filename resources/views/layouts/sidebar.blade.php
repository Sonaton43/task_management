<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{Route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if (Auth::User()->role == "manager")
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#users" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Teammates</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="users" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{Route('user.index')}}">
                <i class="bi bi-circle"></i><span>Teammates</span>
              </a>
              <a href="{{Route('user.create')}}">
                <i class="bi bi-circle"></i><span>Create Teammates</span>
              </a>
            </li>
          </ul>
        </li><!-- End Users Nav -->
      @endif

      @if (Auth::User()->role == "manager")
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#projects" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="projects" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{Route('project.index')}}">
                <i class="bi bi-circle"></i><span>Projects</span>
              </a>
              <a href="{{Route('project.create')}}">
                <i class="bi bi-circle"></i><span>Create Projects</span>
              </a>
            </li>
          </ul>
        </li><!-- End Projects Nav -->
      @endif

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#task" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Tasks</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="task" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{Route('tasks.index')}}">
                <i class="bi bi-circle"></i><span>Tasks</span>
              </a>
              @if (Auth::User()->role == "manager")
                <a href="{{Route('tasks.create')}}">
                  <i class="bi bi-circle"></i><span>Create Tasks</span>
                </a>
              @endif
            </li>
          </ul>
        </li><!-- End Task Nav -->
      
      


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{Route('profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->