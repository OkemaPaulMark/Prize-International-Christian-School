<!-- Sidebar -->
<ul class="navbar-nav bg-emerald sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
<img src="assets/img/prize.png" alt="" style="height: 70px; width: auto; max-height: none; max-width: none;">
    <!-- <div class="sidebar-brand-text mx-3">Prize Int'l</div> -->
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
 <!-- Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="{{url('dashboard')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span>
  </a>
</li>

<!-- Manage Users -->
<li class="nav-item">
  <a class="nav-link" href="{{ route('users.index') }}">
    <i class="fas fa-users-cog"></i> <!-- Icon for user management -->
    <span>Manage Users</span>
  </a>
</li>



<!-- Manage Feedbacks -->
<li class="nav-item">
  <a class="nav-link" href="{{ route('feedbacks.index') }}">
    <i class="fas fa-comment-dots"></i> <!-- Icon for feedback -->
    <span>Manage Feedbacks</span>
  </a>
</li>

<!-- Add Newsletter -->
<li class="nav-item">
  <a class="nav-link" href="{{ route('newsletter.index') }}">
    <i class="fas fa-envelope-open-text"></i> <!-- Icon for newsletter -->
    <span>Add Newsletter</span>
  </a>
</li>

<!-- Manage Board Members -->
<li class="nav-item">
  <a class="nav-link" href="{{ route('boardmembers.index') }}">
    <i class="fas fa-chalkboard-teacher"></i> <!-- Icon for board/teaching roles -->
    <span>Manage Board Members</span>
  </a>
</li>

  </li>


  <style>
    .bg-emerald {
    background-color: #50C878 !important; /* Emerald Green */
    background-image: none !important; /* Remove Bootstrap's gradient if using 'bg-gradient-*' */
}

  </style>
</ul>



