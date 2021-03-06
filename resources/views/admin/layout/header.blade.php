<header class="topnavbar-wrapper">
  <nav role="navigation" class="navbar topnavbar">
    <div class="navbar-header">
      <a href="{{ route('admin.complaint.index') }}" class="navbar-brand">
        <div class="brand-logo">
          <img style="width: 30%" src="{{ asset('img/logo.png') }}" alt="App Logo" class="img-responsive">
        </div>
        <div class="brand-logo-collapsed">
          <img src="{{ asset('img/logo.png') }}" alt="App Logo" class="img-responsive">
        </div>
      </a>
    </div>
    <div class="nav-wrapper">
      <ul class="nav navbar-nav">
        <li>
          <a href="#" data-trigger-resize="" data-toggle-state="aside-collapsed" class="hidden-xs">
            <em class="fa fa-navicon"></em>
          </a>
          <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
            <em class="fa fa-navicon"></em>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>