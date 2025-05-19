<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#hero" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/prize.png" alt="" style="height: 70px; width: auto; max-height: none; max-width: none;">

      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#newsletter">Newsletter</a></li>
          <li><a href="#team">Members</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @auth
    <!-- User Dropdown Menu -->
    <div class="dropdown">
        <a class="nav-link dropdown-toggle btn-getstarted" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-none d-lg-inline text-dark me-2">
                {{ Auth::user()->name }}
            </span>
            <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}" width="30" height="30">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <!-- <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user fa-sm me-2 text-gray-400"></i> Profile
                </a>
            </li> -->
            <!-- <li><hr class="dropdown-divider"></li> -->
            <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </form>
            </li>
        </ul>
    </div>
@else
    <a class="btn-getstarted" href="{{ route('login') }}">Sign In</a>
@endauth



    </div>
  </header>