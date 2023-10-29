      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="bgcolor">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="/superAdminHomePage"><img src="{{ $navigationBarLogo }}" alt="logo" class="logo-image" /></a>
            <a class="navbar-brand brand-logo-mini" href="/superAdminHomePage"><img src="{{ $navigationBarLogo }}" alt="logo" class="mini-logo-image" /></a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/logout">
                <i class="mdi mdi-logout me-2 text-primary"></i> 
                <span>Sign Out</span> 
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="position: fixed;">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/superAdminHomePage">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pageList">
                <span class="menu-title">Edit Page</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/adminRegister">
                <span class="menu-title">Register New Admin</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/adminList">
                <span class="menu-title">Admin List</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <div class="preloader">
            <div class="spinner"></div>
            <div class="preloader-text">Loading...</div>
        </div>
        <script>
            const preloader = document.querySelector(".preloader");
            const preloaderDuration = 400;

            const hidePreloader = () => {
            setTimeout(() => {
            preloader.classList.add("hide");
            }, preloaderDuration);
            }
            window.addEventListener("load", hidePreloader);
        </script>