@extends('layouts.app')
@section('title',config('constant.company_name').' User Guide')
@section('ecommerce')
	  <main class="main pages">
	      <div class="page-header breadcrumb-wrap">
	          <div class="container">
	              <div class="breadcrumb">
	                  <a href="{{ route('front.index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
	                  <span></span> Pages <span></span> Purchase Guide
	              </div>
	          </div>
	      </div>
	      <div class="page-content pt-50">
	          <div class="container">
	              <div class="row">
	                  <div class="col-xl-10 col-lg-12 m-auto">
	                      <div class="row">
	                          <div class="col-lg-9">
	                              <div class="single-page pr-30 mb-lg-0 mb-sm-5">
	                                  <div class="single-header style-2">
	                                      <h2>Purchase Guide</h2>
	                                      <div class="entry-meta meta-1 meta-3 font-xs mt-15 mb-15">
	                                          <span class="post-by">By <a href="#">Jonh</a></span>
	                                          <span class="post-on has-dot">9 April 2020</span>
	                                          <span class="time-reading has-dot">8 mins read</span>
	                                          <span class="hit-count has-dot">29k Views</span>
	                                      </div>
	                                  </div>
	                                  <figure class="border-radius-15 mb-30">
	                                      <img class="border-radius-15" src="{{ asset('assets/frontend/assets/imgs/page/guide-1.png') }}" alt="" />
	                                  </figure>
	                                  <div class="single-content mb-50">
	                                      <h3>1. Account Registering</h3>
	                                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla modi dolores neque omnis ipsa? Quia, nam voluptas! Aut, magnam molestias:</p>
	                                      <ul class="mb-30">
	                                          <li>Name (required)</li>
	                                          <li>Age (required)</li>
	                                          <li>Date of birth (required)</li>
	                                          <li>Passport/ ID no. (required)</li>
	                                          <li>Current career (required)</li>
	                                          <li>Mobile phone numbers (required)</li>
	                                          <li>Email address (required)</li>
	                                          <li>Hobbies &amp; interests (optional)</li>
	                                          <li>Social profiles (optional)</li>
	                                      </ul>
	                                      <h3>2. Select Product</h3>
	                                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit officia necessitatibus repellat placeat aut enim recusandae assumenda adipisci quisquam, deserunt iure veritatis cupiditate modi aspernatur accusantium, mollitia doloribus. Velit, iste.</p>
	                                      <h3>3. Confirm Order Content</h3>
	                                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero ut autem sed! Assumenda, nostrum non doloribus tenetur, pariatur veritatis harum natus ipsam maiores dolorem repudiandae laboriosam, cupiditate odio earum eum?</p>
	                                      <h3>4.Transaction Completed</h3>
	                                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam nesciunt nam aut magnam libero aspernatur eaque praesentium? Tempore labore quis neque? Magni.</p>
	                                      <h3>5. Accepted Credit Cards</h3>
	                                      <ul>
	                                          <li>Visa</li>
	                                          <li>Mastercards</li>
	                                          <li>American Express</li>
	                                          <li>Discover</li>
	                                      </ul>
	                                      <span>*Taxes are calculated by your local bank and location.</span>
	                                      <h3 class="mt-30">6. Download and Setup</h3>
	                                      <ul>
	                                          <li>Updated content on a regular basis</li>
	                                          <li>Secure &amp; hassle-free payment</li>
	                                          <li>1-click checkout</li>
	                                          <li>Easy access &amp; smart user dashboard</li>
	                                      </ul>
	                                  </div>
	                              </div>
	                          </div>
	                          <div class="col-lg-3 primary-sidebar sticky-sidebar">
	                              <div class="widget-area">
	                                  <div class="sidebar-widget-2 widget_search mb-50">
	                                      <div class="search-form">
	                                          <form action="#">
	                                              <input type="text" placeholder="Search…" />
	                                              <button type="submit"><i class="fi-rs-search"></i></button>
	                                          </form>
	                                      </div>
	                                  </div>
	                                  <div class="sidebar-widget widget-category-2 mb-30">
	                                      <h5 class="section-title style-1 mb-30">Category</h5>
	                                      <ul>
	                                        @foreach (categories() as $category)
                                        	@break($loop->index>5)
                                            <li>
                                                <a href="{{ route('product.category_product',$category->id) }}"> <img src="{{ asset('assets/backend/image/category/small/'.$category->image) }}" alt="" />{{$category->category_name}}</a><span class="count">{{count($category->products)}}</span>
                                            </li>
                                        	@endforeach
	                                      </ul>
	                                  </div>
	                                  <!-- Product sidebar Widget -->
	                                  <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
	                                      <h5 class="section-title style-1 mb-30">Trending Now</h5>
	                                      @foreach ($trendings as $trending)
	                                      	
	                                      <div class="single-post clearfix">
	                                          <div class="image">
	                                              <img src="{{ asset('assets/backend/image/product/small/'.$trending->thumbnail) }}" alt="#" />
	                                          </div>
	                                          <div class="content pt-10">
	                                              <h5><a href="{{ route('product.detail',$trending->slug) }}">{{$trending->name}}</a></h5>
	                                              <p class="price mb-0 mt-5">{{price_format($trending->current_price)}}</p>
	                                              <div class="product-rate">
	                                                  <div class="product-rating" style="width: 90%"></div>
	                                              </div>
	                                          </div>
	                                      </div>
	                                      @endforeach
	                                  <div class="banner-img wow fadeIn mb-40 animated d-lg-block d-none">
	                                      <img src="{{ asset('assets/frontend/assets/imgs/banner/banner-11.png')}}" alt="" />
	                                      <div class="banner-text">
	                                          <span>Oganic</span>
	                                          <h4>
	                                              Save 17% <br />
	                                              on <span class="text-brand">Oganic</span><br />
	                                              Juice
	                                          </h4>
	                                      </div>
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

