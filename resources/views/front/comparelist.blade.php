@extends('layouts.app')
@section('title',config('constant.company_name').' Compare List')
@section('ecommerce')
	<main class="main">
	    <div class="page-header breadcrumb-wrap">
	        <div class="container">
	            <div class="breadcrumb">
	                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
	                <span></span> Shop <span></span> Compare
	            </div>
	        </div>
	    </div>
	    <div class="container mb-80 mt-50">
	    	@if (total_comparelist()>0)
	    	
	        <div class="row">
	            <div class="col-xl-10 col-lg-12 m-auto">
	                <h1 class="heading-2 mb-10">Products Compare</h1>
	                <h6 class="text-body mb-40">There are <span class="text-brand">3</span> products to compare</h6>
	                <div class="table-responsive">
	                    <table class="table text-center table-compare">
	                        <tbody>
	                            <tr class="pr_image">
	                                <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
	                                @foreach ($comparelists as $comparelist)

	                                <td class="row_img"><img src="{{ asset('assets/backend/image/product/small/'.$comparelist->product->thumbnail) }}" alt="compare-img" /></td>
	                                @endforeach
	                               
	                            </tr>
	                            <tr class="pr_title">
	                                <td class="text-muted font-sm fw-600 font-heading">Name</td>
	                                @foreach ($comparelists as $comparelist)
	                                <td class="product_name">
	                                    <h6><a href="shop-product-full.html" class="text-heading">{{$comparelist->product->name}}</a></h6>
	                                </td>
	                                @endforeach
	                              
	                            </tr>
	                            <tr class="pr_price">
	                                <td class="text-muted font-sm fw-600 font-heading">Price</td>
	                                 @foreach ($comparelists as $comparelist)
	                                <td class="product_price">
	                                    <h4 class="price text-brand">{{price_format($comparelist->product->current_price)}}</h4>
	                                </td>
	                                @endforeach
	                            </tr>
	                            <tr class="pr_rating">
	                                <td class="text-muted font-sm fw-600 font-heading">Rating</td>
	                                 @foreach ($comparelists as $comparelist)
	                                <td>
	                                    <div class="rating_wrap">
	                                        <div class="product-rate d-inline-block">
	                                            <div class="product-rating" style="width: 90%"></div>
	                                        </div>
	                                        <span class="rating_num">(121)</span>
	                                    </div>
	                                </td>
	                               @endforeach
	                            </tr>
	                            <tr class="description">
	                                <td class="text-muted font-sm fw-600 font-heading">Short Description</td>
	                                 @foreach ($comparelists as $comparelist)
	                                <td class="row_text font-xs">
	                                    <p class="font-sm text-muted">{{$comparelist->product->title}}</p>
	                                </td>
	                               @endforeach
	                            </tr>
	                           
	                            <tr class="pr_add_to_cart">
	                                <td class="text-muted font-sm fw-600 font-heading">Buy now</td>
	                                @foreach ($comparelists as $comparelist)
	                                <td class="row_btn">
	                                    <button class="btn btn-sm add_to_cart_single" data-action="{{ route('add_to_cart_single') }}" product_id="{{$comparelist->product_id}}"><i class="fi-rs-shopping-bag mr-5 "></i>Add to cart</button>
	                                </td>
	                              @endforeach
	                            </tr>
	                            <tr class="pr_remove text-muted">
	                                <td class="text-muted font-md fw-600"></td>
	                                @foreach ($comparelists as $comparelist)
	                                <td class="row_remove">
	                                    <a href="{{ route('delete.comparelist',$comparelist->id) }}" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
	                                </td>
	                                 @endforeach
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	        @else
	        <h4>Comparelist Empty</h4>
	        @endif
	    </div>
	</main>

@endsection