<header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><a href="{{ route('about_us') }}">About Us</a></li>
                                <li><a href="{{ route('customer.dashboard') }}">My Account</a></li>
                                <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                <li><a href="#">Order Tracking</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>100% Secure delivery without contacting the courier</li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <li>Need help? Call Us: <strong class="text-brand">{{config('constant.help_line')}}</strong></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ route('front.index') }}"><img src="{{ asset('assets/backend/image/logo.jpeg')}}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="{{ route('product.search') }}" method="POST">
                                @csrf
                                <select class="select-active" name="category_id">
                                    <option>All Categories</option>
                                    @foreach (categories() as $category)
                                       <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" placeholder="Search for items..." name="keyword" />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="search-location">
                                    <form action="#">
                                        <select class="select-active">
                                            <option>Your Location</option>
                                            <option>Alabama</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{ route('view.comparelist') }}">
                                        <img class="svgInject" alt="Nest" src="{{ asset('assets/frontend/assets/imgs/theme/icons/icon-compare.svg')}}" />
                                        <span class="pro-count blue total_comparelist">{{total_comparelist()}}</span>
                                    </a>
                                    <a href="{{ route('view.comparelist') }}"><span class="lable ml-0">Compare</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{ route('wishlist') }}">
                                        <img class="svgInject" alt="Nest" src="{{ asset('assets/frontend/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                        <span class="pro-count blue total_wishlist">{{total_wishlist()}}</span>
                                    </a>
                                    <a href="{{ route('wishlist') }}"><span class="lable">Wishlist</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ route('view.cart') }}">
                                        <img alt="Nest" src="{{ asset('assets/frontend/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                        <span class="pro-count blue cart-count">{{total_item()}}</span>
                                    </a>
                                    <a href="{{ route('view.cart') }}"><span class="lable">Cart</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 cart-item-added">
                                         @if (total_item()>0)  
                                        <ul>
                                           @foreach (carts() as $cart)
                                            
                                            <li class="cart_row">
                                                <div class="shopping-cart-img">
                                                    <a href="{{ route('product.detail',$cart->product->slug) }}"><img alt="Nest" src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail)}}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="{{ route('product.detail',$cart->product->slug) }}">{{$cart->product->name}}</a></h4>
                                                    <h4><span>{{$cart->quantity}} × </span>{{price_format($cart->product->current_price)}}</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="javascript:;"><i class="fi-rs-cross-small delete_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}"></i></a>
                                                </div>
                                            </li>
                                              
                                           @endforeach
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>{{price_format(sub_total())}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('view.cart') }}" class="outline">View cart</a>
                                                <a href="{{ route('checkout') }}">Checkout</a>
                                            </div>
                                        </div>
                                          @else
                                          <h4>Empty Cart</h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{ route('customer.dashboard') }}">
                                        <img class="svgInject" alt="Nest" src="{{ asset('assets/frontend/assets/imgs/theme/icons/icon-user.svg')}}" />
                                    </a>
                                    <a href="{{ route('customer.dashboard') }}"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>

                                          @auth()
                                        
                                        
                                              <li><a href="{{ route('customer.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a></li>
                                              <li>
                                                  <a href="javascript:;" onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();" href="page-login.html"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                              </li>
                                              @else

                                              <li>
                                                  <a href="{{ route('login') }}"><i class="fi fi-rs-lock mr-10"></i>Login</a>
                                              </li>
                                              
                                              <li>
                                                  <a href="{{ route('register') }}"><i class="fi fi-rs-user mr-10"></i>Create account</a>
                                              </li>
                                             
                                          @endauth

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{ route('front.index') }}"><img src="{{ asset('assets/frontend/assets/imgs/theme/logo.svg')}}" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading scrollable-category">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach (categories() as $category)
                                     
                                           @break($loop->index >4)
                                      
                                        <li>
                                            <a href="{{ route('product.category_product',$category->id) }}"> <img src="{{ $category->image !=null ? asset('assets/backend/image/category/small/'.$category->image) : default_image()}}" alt="" />{{$category->category_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="more_slide_open" style="display: none;">
                                    <div class="d-flex categori-dropdown-inner">
                                        <ul>
                                            @foreach (categories() as $category)
                                            @continue($loop->index <4)
                                           
                                            <li>
                                                <a href="{{ route('product.category_product',$category->id) }}"> <img src="{{ $category->image !=null ? asset('assets/backend/image/category/small/'.$category->image) : default_image()}}" alt="" />{{$category->category_name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                      
                                    </div>
                                </div>
                                <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    
                                  
                                    <li>
                                        <a  class="{{(Route::is('front.index')) ? 'active' : ''}}" href="{{ route('front.index') }}">Home</a>
                                    </li>

                                    <li>
                                        <a  class="{{Route::is('product.whole_sale') ? 'active' : ''}}"  href="{{ route('product.whole_sale') }}">Whole Sale Product</a>
                                    </li>
                                   
                                    <li>
                                        <a class="{{Route::is('about_us') ? 'active' : ''}}"  href="{{ route('about_us') }}">About us</a>
                                    </li>
                                    <li>
                                        <a class="{{Route::is('contact_us') ? 'active' : ''}}"  href="{{ route('contact_us') }}">Contact</a>
                                    </li>
                                    <li>
                                        <a class="{{Route::is('privacy_policy') ? 'active' : ''}}"  href="{{ route('privacy_policy') }}">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a class="{{Route::is('guide') ? 'active' : ''}}"  href="{{ route('guide') }}">Guide</a>
                                    </li> 

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-flex">
                        <img src="{{ asset('assets/frontend/assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline" />
                        <p>{{config('constant.help_line')}}<span>24/7 Support Center</span></p>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{ route('wishlist') }}">
                                    <img alt="Nest" src="{{ asset('assets/frontend/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                    <span class="pro-count white">{{total_wishlist()}}</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="#">
                                    <img alt="Nest" src="{{ asset('assets/frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count white cart-count">{{total_item()}}</span>
                                </a>
                                 
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 cart-item-added">
                                     @if (total_item()>0)
                                    <ul>
                                        @foreach (carts() as $cart)
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="{{ route('product.detail',$cart->product->slug) }}"><img alt="Nest" src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail)}}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="{{ route('product.detail',$cart->product->slug) }}">{{$cart->product->name}}</a></h4>
                                                <h3><span>{{$cart->quantity}} × </span>{{price_format($cart->product->current_price)}}</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="javascript:;"><i class="fi-rs-cross-small delete_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}"></i></a>
                                            </div>
                                        </li>
                                        
                                        @endforeach
                                    </ul>
                                   
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>{{price_format(sub_total())}}</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('view.cart') }}">View cart</a>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                   
                                </div>
                                @else
                                  <h4>Cart Empty</h4>
                                 @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>