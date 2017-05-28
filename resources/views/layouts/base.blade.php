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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- css -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/css/nouislider.css') }}" rel="stylesheet">
    <!-- fonts -->
    <link href="{{ URL::asset('css/font.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/FontAwesome.otf') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/linear-icons.css') }}">
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
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="">
                    <h1 class="title-logo">GreenCase</h1>
                </a>
            </div><!-- / navbar-header -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        @if (Auth::guest())
                        @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                        <ul class="dropdown-menu pulse animated">
                            <li><a href="#">My Account</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
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
        @if (Auth::guest())
            @yield('content')
        @else
            @include('layouts.main')
            <!-- content here-->
            <div class="col-sm-8 col-md-9 content-area">
                @yield('content')
            </div>
            <!-- end content -->
        @endif
        </div><!-- / row -->
    </div><!-- / container -->
</section>
<!-- / content -->

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ URL::asset('js/scrolling-nav.js') }}"></script>
<script src="{{ URL::asset('js/nouislider.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.shuffle.min.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>

</body>
</html>