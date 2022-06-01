@extends('layouts.app')
@section('title',config('constant.company_name').' Sing in')
@section('ecommerce')
   <main class="main pages">
       <div class="page-header breadcrumb-wrap">
           <div class="container">
               <div class="breadcrumb">
                   <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                   <span></span> Pages <span></span> My Account
               </div>
           </div>
       </div>
       <div class="page-content pt-150 pb-150">
           <div class="container">
               <div class="row">
                   <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                       <div class="row">
                           <div class="col-lg-6 pr-30 d-none d-lg-block">
                               <img class="border-radius-15" src="assets/imgs/page/login-1.png" alt="" />
                           </div>
                           <div class="col-lg-6 col-md-8">
                               <div class="login_wrap widget-taber-content background-white">
                                   <div class="padding_eight_all bg-white">
                                       <div class="heading_s1">
                                           <h1 class="mb-5">Login</h1>
                                           <p class="mb-30">Don't have an account? <a href="{{ route('register') }}">Create here</a></p>
                                       </div>
                                       <form action="{{ route('login') }}" method="post">
                                        @csrf
                                           <div class="form-group">
                                               <input type="email" name="email" placeholder="Email" required="" />
                                           </div>
                                           <div class="form-group">
                                               <input type="password" name="password" placeholder="Your password *" required="" />
                                           </div>
                                          
                                           <div class="login_footer form-group mb-50">
                                               
                                               <a class="text-muted" href="#">Forgot password?</a>
                                           </div>
                                           <div class="form-group">
                                               <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                           </div>

                                           <div class="form-group">
                                               <a href="{{ route('google.login') }}" class="btn btn-danger">Login with google</a>

                                                <a href="{{ route('facebook.login') }}" class="btn btn-info">Log in with facebook</a>
                                           </div>

                                          
                                       </form>
                                   </div>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </main>
@endsection
@section('ecommerce_js')
  <script src="{{ asset('assets/frontend/style/js/auth.js') }}"></script>
@endsection
