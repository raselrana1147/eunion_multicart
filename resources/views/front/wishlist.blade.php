@extends('layouts.app')
@section('title',config('constant.company_name').'Product Wishlist')
@section('ecommerce')
	<main class="main">
	    <div class="page-header breadcrumb-wrap">
	        <div class="container">
	            <div class="breadcrumb">
	                <a href="{{ route('front.index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
	                <span></span> Wishlist Product <span>
	            </div>
	        </div>
	    </div>
	    <div class="container mb-30 mt-50 wishlist_section">
	       @if (total_wishlist())
	       	 <div class="row">
	            <div class="col-xl-10 col-lg-12 m-auto">
	                <div class="mb-50">
	                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
	                    <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6>
	                </div>
	                <div class="table-responsive shopping-summery">
	                    <table class="table table-wishlist">
	                        <thead>
	                            <tr class="main-heading">
	                                <th class="custome-checkbox start pl-30">
	                                    #Serial
	                                </th>
	                                <th scope="col" colspan="2">Product</th>
	                                <th scope="col">Price</th>
	                                <th scope="col">Action</th>
	                                <th scope="col" class="end">Remove</th>
	                            </tr>
	                        </thead>
	                        <tbody>


	                        	@foreach ($wishlists as $wishlist)
	                        	
	                            <tr class="pt-30 wishlist_row{{$wishlist->id}}">
	                                <td class="custome-checkbox pl-30">
	                                    {{$loop->index+1}}
	                                </td>
	                                <td class="image product-thumbnail pt-40"><img src="{{ asset('assets/backend/image/product/small/'.$wishlist->product->thumbnail) }}" alt="#" /></td>
	                                <td class="product-des product-name">
	                                    <h6><a class="product-name mb-10" href="{{ route('product.detail',$wishlist->product->slug) }}">{{$wishlist->product->name}}</a></h6>
	                                    <div class="product-rate-cover">
	                                        <div class="product-rate d-inline-block">
	                                            <div class="product-rating" style="width: 90%"></div>
	                                        </div>
	                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
	                                    </div>
	                                </td>
	                                <td class="price" data-title="Price">
	                                    <h3 class="text-brand">{{price_format($wishlist->product->current_price)}}</h3>
	                                </td>
	                               
	                                <td class="text-right" data-title="Cart">
	                                    <button class="btn btn-sm add_to_cart_single" product_id="{{$wishlist->product_id}}" data-action="{{ route('add_to_cart_single') }}">Add to cart</button>
	                                </td>
	                                <td class="action text-center" data-title="Remove">
	                                    <a href="javascript:;" class="text-body"><i class="fi-rs-trash delete_wishlist" wishlist_id="{{$wishlist->id}}" data-action="{{ route('wishlist.delete') }}"></i></a>
	                                </td>
	                            </tr>
	                       
	                         	{{-- expr --}}
	                         @endforeach
	                           
	                       
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	        @else
	        <h4>wishlist empty</h4>
	       @endif
	    </div>
	</main>
@endsection