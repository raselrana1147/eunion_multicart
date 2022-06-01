@extends('layouts.app')
@section('title',config('constant.company_name').' Product Detail')
@section('ecommerce')
	<main class="main">
	    <div class="page-header breadcrumb-wrap">
	        <div class="container">
	            <div class="breadcrumb">
	                <a href="{{ route('front.index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
	                <span></span> <a href="shop-grid-right.html">{{$product->category->category_name}}</a> <span></span>
	            </div>
	        </div>
	    </div>
	    <div class="container mb-30">
	        <div class="row">
	            <div class="col-xl-11 col-lg-12 m-auto">
	                <div class="row">
	                    <div class="col-xl-9">
	                        <div class="product-detail accordion-detail">
	                            <div class="row mb-50 mt-30">
	                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
	                                    <div class="detail-gallery">
	                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
	                                        <!-- MAIN SLIDES -->
	                                        <div class="product-image-slider">
	                                        	 <figure class="border-radius-10">
	                                        	     <img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" alt="product image" />
	                                        	 </figure>
	                                        	@if (count($product->galleries)>0)
	                                        	@foreach ($product->galleries as $gallery)
	                                        		
		                                            <figure class="border-radius-10">
		                                                <img src="{{ asset('assets/backend/image/gallery/small/'.$gallery->image) }}" alt="product image" />
		                                            </figure>
	                                            @endforeach
	                                            @endif
	                                        </div>
	                                        <!-- THUMBNAILS -->
	                                        <div class="slider-nav-thumbnails">
	                                        	<div><img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" alt="product image" /></div>
	                                        	@if (count($product->galleries)>0)
	                                        	 @foreach ($product->galleries as $gallery)
	                                                 <div><img src="{{ asset('assets/backend/image/gallery/small/'.$gallery->image) }}" alt="product image" /></div>
	                                              @endforeach
	                                             @endif
	                                        </div>
	                                    </div>
	                                    <!-- End Gallery -->
	                                </div>
	                                <div class="col-md-6 col-sm-12 col-xs-12">
	                                    <div class="detail-info pr-30 pl-30">
	                                        <span class="stock-status out-stock"> Sale on </span>
	                                        <h2 class="title-detail">{{$product->name}}</h2>
	                                        <div class="product-detail-rating">
	                                            <div class="product-rate-cover text-end">
	                                                <div class="product-rate d-inline-block">
	                                                    <div class="product-rating" style="width: 90%"></div>
	                                                </div>
	                                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
	                                            </div>
	                                        </div>
	                                        <div class="clearfix product-price-cover">
	                                            <div class="product-price primary-color float-left">
	                                                <span class="current-price text-brand">{{price_format($product->current_price)}}</span>
	                                                
	                                                <span>
	                                                	@if ($product->discount>0)
	                                                       <span class="save-price font-md color3 ml-15">{{$product->discount.' % off'}}</span>
	                                                     @endif
	                                                    @if ($product->previous_price>$product->current_price)
	                                                      {{price_format($product->previous_price)}}
	                                                    @endif
	                                                </span>
	                                               
	                                            </div>
	                                        </div>
	                                        <div class="short-desc mb-30">
	                                            <p class="font-lg">{{$product->title}}</p>
	                                        </div>
	                                        <form id="submit_cart_form" data-action="{{ route('add_to_cart') }}" method="POST">
	                                        	@csrf
	                                        	<input type="hidden" name="product_id" value="{{$product->id}}">
		                                        <div class="detail-extralink mb-50">
		                                            <div class="detail-qty border radius">
		                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
		                                                <input type="number" name="quantity" class="qty-val" value="{{$product->sale_type=='whole' ? $product->whole_sale_quantity : 1}}" min="{{$product->sale_type=='whole' ? $product->whole_sale_quantity : 1}}" >
		                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
		                                            </div>
		                                            <div class="product-extra-link2">
		                                                <button type="submit" class="button button-add-to-cart "><i class="fi-rs-shopping-cart"></i>Add to cart</button>

		                                                <a aria-label="Add To Wishlist" product_id="{{$product->id}}" data-action="{{ route('add_to_wishlist') }}" class="action-btn hover-up add_to_wishlist" href="javascript:;"><i class="fi-rs-heart"></i></a>
		                                                <a aria-label="Compare" product_id="{{$product->id}}" data-action="{{ route('add_to_comparelist') }}" class="action-btn hover-up add_to_comparelist" href="javascript:;"><i class="fi-rs-shuffle"></i></a>
		                                            </div>
		                                        </div>
	                                        </form>
	                                        <div class="font-xs">
	                                            <ul class="mr-50 float-start">
	                                                <li class="mb-5">Avaibility: <span class="text-brand">{{'In stock'}}</span></li>
	                                                <li class="mb-5">Sale type:<span class="text-brand"> {{$product->sale_type}}</span></li>

	                                            </ul>
	                                            <ul class="float-start">
	                                                <li>Model: <span class="text-brand">{{$product->model}}</span></li>
	                                                <li>Brand: <span class="text-brand">{{$product->brand->brand_name}}</span></li>
	                                            </ul>
	                                        </div>
	                                    </div>
	                                    <!-- Detail Info -->
	                                </div>
	                            </div>
	                            <div class="product-info">
	                                <div class="tab-style3">
	                                    <ul class="nav nav-tabs text-uppercase">
	                                        <li class="nav-item">
	                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
	                                        </li>
	                                        <li class="nav-item">
	                                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Specification</a>
	                                        </li>
	                                        <li class="nav-item">
	                                            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Return Policy</a>
	                                        </li>
	                                        <li class="nav-item">
	                                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
	                                        </li>
	                                    </ul>
	                                    <div class="tab-content shop_info_tab entry-main-content">
	                                        <div class="tab-pane fade show active" id="Description">
	                                            <div class="">
	                                              {!! $product->description !!}
	                                            </div>
	                                        </div>
	                                        <div class="tab-pane fade" id="Additional-info">
	                                           {!! $product->specification!!}
	                                        </div>
	                                        <div class="tab-pane fade" id="Vendor-info">
	                                          {!! $product->return_policy !!}
	                                        </div>
	                                        <div class="tab-pane fade" id="Reviews">
	                                            <!--Comments-->
	                                            <div class="comments-area">
	                                                <div class="row">
	                                                    <div class="col-lg-8">
	                                                        <h4 class="mb-30">Customer questions & answers</h4>
	                                                        <div class="comment-list">
	                                                            <div class="single-comment justify-content-between d-flex mb-30">
	                                                                <div class="user justify-content-between d-flex">
	                                                                    <div class="thumb text-center">
	                                                                        <img src="assets/imgs/blog/author-2.png" alt="" />
	                                                                        <a href="#" class="font-heading text-brand">Sienna</a>
	                                                                    </div>
	                                                                    <div class="desc">
	                                                                        <div class="d-flex justify-content-between mb-10">
	                                                                            <div class="d-flex align-items-center">
	                                                                                <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
	                                                                            </div>
	                                                                            <div class="product-rate d-inline-block">
	                                                                                <div class="product-rating" style="width: 100%"></div>
	                                                                            </div>
	                                                                        </div>
	                                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
	                                                                    </div>
	                                                                </div>
	                                                            </div>
	                                                            
	                                                            
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-lg-4">
	                                                        <h4 class="mb-30">Customer reviews</h4>
	                                                        <div class="d-flex mb-30">
	                                                            <div class="product-rate d-inline-block mr-15">
	                                                                <div class="product-rating" style="width: 90%"></div>
	                                                            </div>
	                                                            <h6>4.8 out of 5</h6>
	                                                        </div>
	                                                        <div class="progress">
	                                                            <span>5 star</span>
	                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
	                                                        </div>
	                                                        <div class="progress">
	                                                            <span>4 star</span>
	                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
	                                                        </div>
	                                                        <div class="progress">
	                                                            <span>3 star</span>
	                                                            <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
	                                                        </div>
	                                                        <div class="progress">
	                                                            <span>2 star</span>
	                                                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
	                                                        </div>
	                                                        <div class="progress mb-30">
	                                                            <span>1 star</span>
	                                                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
	                                                        </div>
	                                                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <!--comment form-->
	                                            <div class="comment-form">
	                                                <h4 class="mb-15">Add a review</h4>
	                                                <div class="product-rate d-inline-block mb-30"></div>
	                                                <div class="row">
	                                                    <div class="col-lg-8 col-md-12">
	                                                        <form class="form-contact comment_form" action="#" id="commentForm">
	                                                            <div class="row">
	                                                                <div class="col-12">
	                                                                    <div class="form-group">
	                                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
	                                                                    </div>
	                                                                </div>
	                                                                <div class="col-sm-6">
	                                                                    <div class="form-group">
	                                                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
	                                                                    </div>
	                                                                </div>
	                                                                <div class="col-sm-6">
	                                                                    <div class="form-group">
	                                                                        <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
	                                                                    </div>
	                                                                </div>
	                                                                <div class="col-12">
	                                                                    <div class="form-group">
	                                                                        <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
	                                                                    </div>
	                                                                </div>
	                                                            </div>
	                                                            <div class="form-group">
	                                                                <button type="submit" class="button button-contactForm">Submit Review</button>
	                                                            </div>
	                                                        </form>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row mt-60">
	                                <div class="col-12">
	                                    <h2 class="section-title style-1 mb-30">Related products</h2>
	                                </div>
	                                <div class="col-12">
	                                    <div class="row related-products">

	                                    	@foreach ($recommendeds as $recommended)
	                                    	
	                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
	                                            <div class="product-cart-wrap hover-up">
	                                                <div class="product-img-action-wrap">
	                                                    <div class="product-img product-img-zoom">
	                                                        <a href="{{ route('product.detail',$recommended->slug) }}" tabindex="0">
	                                                            <img class="default-img" src="{{ asset('assets/backend/image/product/small/'.$recommended->thumbnail) }}" alt="" />
	                                                            <img class="hover-img" src="{{ count($recommended->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$recommended->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$recommended->thumbnail)}}" alt="" />
	                                                        </a>
	                                                    </div>
	                                                    <div class="product-action-1">
	                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
	                                                        <a aria-label="Add To Wishlist" product_id="{{$recommended->id}}" data-action="{{ route('add_to_wishlist') }}" class="action-btn small hover-up add_to_wishlist" href="javascript.voie:;" tabindex="0"><i class="fi-rs-heart"></i></a>
	                                                        <a aria-label="Compare" product_id="{{$recommended->id}}" data-action="{{ route('add_to_comparelist') }}" class="action-btn small hover-up add_to_comparelist" href="javascript:;" tabindex="0"><i class="fi-rs-shuffle"></i></a>
	                                                    </div>
	                                                    
	                                                </div>
	                                                <div class="product-content-wrap">
	                                                    <h2><a href="{{ route('product.detail',$product->slug) }}" tabindex="0">{{$recommended->name}}</a></h2>
	                                                    <div class="rating-result" title="90%">
	                                                        <span> </span>
	                                                    </div>
	                                                    <div class="product-price">
	                                                       <span>{{price_format($recommended->current_price)}}</span>
	                                                        @if ($recommended->previous_price>$recommended->current_price)
	                                                        <span class="old-price">{{price_format($recommended->previous_price)}}</span>
	                                                        @endif
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        	{{-- expr --}}
	                                        @endforeach
	                                       
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                   @include('front.files.sidebar')
	                </div>
	            </div>
	        </div>
	    </div>
	</main>
@endsection

