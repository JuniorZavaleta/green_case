@php
    $admin = Auth::guard('admin')->user();
    $is_admin = $admin != null;
    $user = $is_admin ? $admin : Auth::guard('web')->user();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="icon" href="http://kingstudio.ro/demos/incart/images/favicon.png">
    <!-- page title -->
    <title>GreenCase</title>
    <!-- bootstrap css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    @stack('extra-css')
    <style type="text/css">
        button.btn-facebook-filled { position: relative; top: 20px; }
        @media only screen and (max-width: 767px) {
            button.btn-facebook-filled { top: 0px; }
        }
    </style>
</head>

<body style="overflow: visible;">

<!-- header -->
<header>
    <nav class="navbar navbar-default">
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
                    @if ($user)
                        @if ($is_admin)
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user->email }} <span class="caret"></span></a>
                        @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user->name }} <span class="caret"></span></a>
                        @endif

                        <ul class="dropdown-menu pulse animated">
                            @if ($is_admin)
                            <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                            @else
                            <li><a href="{{ route('citizen.logout') }}">Logout</a></li>
                            @endif
                        </ul>
                    @elseif (is_bool(strpos(Route::current()->uri, 'admin')))
                        <!-- Always false if is bool, then is not admin -->
                        <button onClick="javascript:window.location.href='{{ route('facebook.login') }}'" class="btn btn-facebook-filled"><i class="fa fa-facebook"></i> Inicio con Facebook</button>
                    @endif
                    </li>
                </ul>
            </div><!--/ nav-collapse -->
        </div><!-- / container -->
    </nav><!-- / navbar -->
</header>
<!-- / header -->

<!-- content -->
<section id="content">
    <div class="container">
        <div class="row">
        @if (!$is_admin)
            @yield('content')
        @else
            @include('layouts.sidebar')
            <!-- content here-->
            <div class="col-sm-10 content-area">
                @yield('content')
            </div>
            <!-- end content -->
        @endif
        </div><!-- / row -->
    </div><!-- / container -->
</section>
<!-- / content -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/scrolling-nav.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.shuffle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@stack('extra-js')
</body>
</html>
