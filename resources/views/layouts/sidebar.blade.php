<aside class="aside">
  <div class="aside-inner">
    <nav data-sidebar-anyclick-close="" class="sidebar">
      <ul class="nav">
        <li class="nav-heading ">
          <span data-localize="sidebar.heading.HEADER">Menú</span>
        </li>
        <li class="active">
          <a href="{{ route('admin.complaint.index') }}" title="Lista de casos" data-toggle="collapse" class="" aria-expanded="true">
            <em class="icon-speedometer"></em>
            <span data-localize="sidebar.nav.DASHBOARD">Lista de casos</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.logout') }}" title="Logout">
            <em class="fa fa-sign-out"></em>
            <span data-localize="sidebar.nav.LOGOUT">Logout</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
