<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="title" content="m3digihub.com Find the perfect template gift, resume template & spreasheets, unique designs, and more… lots more">
    <meta name="description" content="Show off your brand identity with a custom creative logo design such as 2D logo design, 3D logo design online and offline for your business by our professional graphic designer within Lagos Nigeria.">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('images/'.$settings->fav)}}" rel="shortcut icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="https:://m3digihub.com ">
    <meta name="application-name" content="et the latest 2023 Excel Template to prepare your Nigerian Payroll. Calculate PAYE, Pensions, NHF and other employee deductions in 1 minute">
    <meta property="og:site_name" content="m3digihub.com">
    <meta property="og:image" content="{{asset('images/'.$settings->site_logo)}}">
    <meta name="twitter:description" content="https:://m3digihub.com Excel Templates and Software in Nigeria :: Browse 1000s of softwares and Excel Templates in Nigeria. Software Hub NG is your best plug to download productivity templates and business software for financial institutions, schools, small and emerging businesses, hospital et">
    <meta name="twitter:image" content="{{asset('images/'.$settings->site_logo)}}">
    <meta property="og:description" content="Excel Templates and Software in Nigeria :: Browse 1000s of softwares and Excel Templates in Nigeria. Software Hub NG is your best plug to download productivity templates and business software for financial institutions, schools, small and emerging businesses, hospital et">
    <meta name="keywords" content="get the latest 2023 Excel Template to prepare your Nigerian Payroll. Calculate PAYE, Pensions, NHF and other employee deductions in 1 minute ">
    <meta property="og:url" content="{{route('users.index')}}">
    <meta property="og:title" content="get the latest 2023 Excel Template to prepare your Nigerian Payroll. Calculate PAYE, Pensions, NHF and other employee deductions in 1 minute">
    <title> {{config('app.name')}} | @if(isset($title)) {{$title}} @endif </title>
    <link rel="stylesheet" href="{{asset('/frontend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/fonts/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/lightGallery/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/noUiSlider/nouislider.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/home-8.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('styles')
</head>
<body>
    <div class="ps-page">

@include('partials.header')
@include('partials.header_mobile')
@yield('content')


@include('partials.footer')
@include('partials.mobile_nav')
@include('partials.search_modal')
@include('partials.mobile_sidebar')
@include('partials.preloader')

<script src="{{asset('/frontend/plugins/jquery.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/popper.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/lightGallery/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/noUiSlider/nouislider.min.js')}}"></script>
    <script src="{{asset('/frontend/js/main.js')}}"></script>
    @yield('script')


    
    <script type="text/javascript">


let message = {!! json_encode(Session::get('msg')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};
//alert(msg);
toastr.options = {
        timeOut: 6000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 600
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}        
     </script>
     <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/66cf30fcea492f34bc0b053e/1i6clenk6';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>

