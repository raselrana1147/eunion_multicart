@extends('layouts.app')
@section('title',config('constant.company_name').' Sing up')
@section('ecommerce')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('front.index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a href="{{ route('register') }}">Login</a></p>
                                        </div>
                                        <form  id="submit_singin" data-action="{{ route('register') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="name" placeholder="Name" />
                                                 <span class="valids error_name" style="color: red;"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="email" placeholder="Email" />
                                                 <span class="valids error_email" style="color: red;"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" placeholder="Phone" />
                                                 <span class="valids error_phone" style="color: red;"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Password" />
                                                 <span class="valids error_password" style="color: red;"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" placeholder="Confirm password" />
                                               
                                            </div>
                                          
                                           
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Register</button>
                                            </div>
                                         
                                        </form>
                                    </div>
                                </div>
                            </div>
                           <div class="col-lg-6 pr-30 d-none d-lg-block">
                               <div class="card-login mt-115">
                                <a href="{{ route('google.login') }}" class="social-login google-login">
                                    <img src="{{ asset('assets/frontend/assets/imgs/theme/icons/logo-google.svg') }}" alt="" />
                                    <span>Continue with Google</span>
                                </a>
                                   <a href="{{ route('facebook.login') }}" class="social-login facebook-login">
                                       <img src="{{ asset('assets/frontend/assets/imgs/theme/icons/logo-facebook.svg')}}" alt="" />
                                       <span>Continue with Facebook</span>
                                   </a>
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
