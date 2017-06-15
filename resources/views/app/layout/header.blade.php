<header>
  <nav class="navbar navbar-default" style="border: 0;">
    <div class="container">
      <div class="navbar-header" style="padding-bottom: 20px">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('img/logo.png') }}" alt="GreenCase">
          <h1 class="title-logo">GreenCase</h1>
        </a>
      </div><!-- / navbar-header -->
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
          @if (Auth::user('web'))
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user('web')->name }} <span class="caret"></span></a>

            <ul class="dropdown-menu pulse animated">
              <li><a href="{{ route('citizen.logout') }}">Logout</a></li>
            </ul>
          @else
            <!-- Always false if is bool, then is not admin -->
            <button onClick="javascript:window.location.href='{{ route('facebook.login') }}'" class="btn btn-facebook-filled btn-square"><i class="fa fa-facebook"></i> Inicio con Facebook</button>
          @endif
          </li>
        </ul>
      </div><!--/ nav-collapse -->
    </div><!-- / container -->
  </nav><!-- / navbar -->
</header>
