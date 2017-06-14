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
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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

<body class="-text aside-float">

<!-- header -->
@include('app.layout.header')
<div class="wrapper">
  <div class="content-wrapper">
    <!-- content -->
    @yield('content')
    <!-- end content -->
  </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/scrolling-nav.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.shuffle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@stack('extra-js')
@stack('modal')
</body>
</html>
