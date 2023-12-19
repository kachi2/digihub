<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/'.$settings->fav)}}"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('/backend/vendors/bundle.css')}}" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('/backend/vendors/clockpicker/bootstrap-clockpicker.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/backend/vendors/datepicker/daterangepicker.css')}}">

    <!-- Vmap -->
    <link rel="stylesheet" href="{{asset('/backend/vendors/vmap/jqvmap.min.css')}}">

    <link rel="stylesheet" href="{{asset('/backend/css/app.min.css')}}" type="text/css">
</head>
<body class="form-membership">
 
<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="{{$settings->site_logo)}}" alt="image">
        <img class="logo-dark" src="{{$settings->site_logo)}}" alt="image">
    </div>
    <!-- ./ logo -->

    <h5>Register</h5>

    <!-- form -->
    <form method="post" action="{{route('register')}}"> 
        @csrf
        <div class="form-group">
            <label style="float:left" for="password"> Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Full Name" required="" autofocus="">
        </div>
        <div class="form-group">
            <label style="float:left" for="password"> Email</label>
            <input type="text" name="email" class="form-control" placeholder=" email" required="" autofocus="">
        </div>
        <div class="form-group">
            <label style="float:left" for="password"> Phone Number</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required="" autofocus="">
        </div>
        <div class="form-group">
            <label style="float:left" for="password"> Password</label>
            <input type="password" name="password" class="form-control"  id="password" placeholder="Password" required="">
        </div>
        <button class="btn btn-primary btn-block">Register</button>
        <hr>
        {{-- <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#" class="btn btn-facebook">
                    <i class="fa fa-facebook" style="color:#fff"> Login with Facebook</i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn  btn-twitter">
                    <i class="fa fa-twitter" style="color:#fff"> Login with Twiter</i>
                </a>
            </li>
        </ul> --}}
   
        <p class="text-muted">Already have an account?</p>
        <a href="{{route('login')}}" class="btn btn-outline-light btn-sm">Login Here!</a>
    </form>
    <!-- ./ form -->
</div>

<!-- Plugin scripts -->
<script src="{{asset('/backend/vendors/bundle.js')}}"></script>
<!-- Chartjs -->
<script src="{{asset('/backend/vendors/charts/chartjs/chart.min.js')}}"></script>
<!-- Apex chart -->
<script src="{{asset('/backend/vendors/charts/apex/apexcharts.min.js')}}"></script>
<!-- Circle progress -->
<script src="{{asset('/backend/vendors/circle-progress/circle-progress.min.js')}}"></script>
<!-- Peity -->
<script src="{{asset('/backend/vendors/charts/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('/backend/js/examples/charts/peity.js')}}"></script>

<script src="{{asset('/backend/vendors/prism/prism.js')}}"></script>
<script src="{{asset('/backend/js/examples/clockpicker.js')}}"></script>
<!-- Datepicker -->
<script src="{{asset('/backend/vendors/datepicker/daterangepicker.js')}}"></script>
<script src="{{asset('/backend/vendors/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<!-- Slick -->
<script src="{{asset('/backend/vendors/slick/slick.min.js')}}"></script>
<!-- Vamp -->
<script src="{{asset('/backend/vendors/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/backend/vendors/vmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('/backend/js/examples/vmap.js')}}"></script>
<!-- Dashboard scripts -->
<script src="{{asset('/backend/js/examples/dashboard.js')}}"></script>
<div class="colors"> <!-- To use theme colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>
<!-- App scripts -->
<script src="{{asset('/backend/js/app.min.js')}}"></script>
@yield('script')


</body>
</html>