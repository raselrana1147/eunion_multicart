<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/main.css?v=5.2')}}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/style/css/custom.css')}}">
    <link href="{{ asset('assets/frontend/style/css/toastr.css')}}" rel="stylesheet" type="text/css">
    @yield('ecommerce_css')
</head>

<body>
    <!-- Modal -->
      <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('assets/frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    
    @include('front.files.header')
    @include('front.files.mobile_header')
    <!--End header-->
    @section('ecommerce')
    @show
    @include('front.files.footer')
    <!-- Preloader Start -->
  
    <!-- Vendor JS-->
    <script src="{{ asset('assets/frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/slick.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/wow.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('assets/frontend/assets/js/main.js?v=5.2')}}"></script>
    <script src="{{ asset('assets/frontend/assets/js/shop.js?v=5.2')}}"></script>
     {{-- my script --}}
    <script src="{{ asset('assets/frontend/style/js/toastr.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/cart.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/wishlist.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/comparelist.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/common.js')}}"></script>

    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
 </script>
   <script>
       @if(Session::has('message'))
         var type="{{Session::get('alert-type','info')}}"
         switch(type){
             case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;
             case 'success':
                 toastr.success("{{ Session::get('message') }}");
                 break;
             case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                 break;
             case 'error':
                 toastr.error("{{ Session::get('message') }}");
                break;
         }
       @endif
 </script>
 @yield('ecommerce_js')
</body>

</html>