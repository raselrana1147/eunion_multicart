@extends('layouts.app')
@section('title',config('constant.company_name').' View Cart')
@section('ecommerce')
		<main class="main">
		    <div class="page-header breadcrumb-wrap">
		        <div class="container">
		            <div class="breadcrumb">
		                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
		                <span></span> Shop
		                <span></span> Cart
		            </div>
		        </div>
		    </div>
		    <div class="container mb-80 mt-50 cart_section">
		    	@if (total_item()>0)
		    	
		        <div class="row">
		            <div class="col-lg-8 mb-40">
		                <h1 class="heading-2 mb-10">Your Cart</h1>
		                <div class="d-flex justify-content-between">
		                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
		                    <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-lg-8">
		                <div class="table-responsive shopping-summery">
		                    <table class="table table-wishlist">
		                        <thead>
		                            <tr class="main-heading">
		                                <th class="custome-checkbox start pl-30"> #Serial </th>
		                                <th scope="col" colspan="2">Product</th>
		                                <th scope="col">Unit Price</th>
		                                <th scope="col">Quantity</th>
		                                <th scope="col">Subtotal</th>
		                                <th scope="col" class="end">Remove</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            
		                            @foreach (carts() as $cart)
		                            	
		                            <tr class="cart_row{{$cart->id}}">
		                                <td class="custome-checkbox pl-30">{{$loop->index+1}}</td>
		                                <td class="image product-thumbnail"><img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail) }}" alt="#"></td>
		                                <td class="product-des product-name">
		                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="{{ route('product.detail',$cart->product->slug) }}">{{$cart->product->name}}</a></h6>
		                                    <div class="product-rate-cover">
		                                        <div class="product-rate d-inline-block">
		                                            <div class="product-rating" style="width:90%">
		                                            </div>
		                                        </div>
		                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
		                                    </div>
		                                </td>
		                                <td class="price" data-title="Price">
		                                    <h4 class="text-body">{{price_format($cart->product->current_price)}}</h4>
		                                </td>
		                                <td class="text-center detail-info" data-title="Stock" >
		                                    <div class="detail-extralink mr-15">
		                                        <input type="number" name="quantity" value="{{$cart->quantity}}" class="form-control cart-product-quantity update_cart{{$cart->id}}" style="width:100px" min="{{$cart->product->sale_type=='whole' ? $cart->product->whole_sale_quantity : 1}}" cart_id="{{$cart->id}}" data-action="{{ route('cart.update') }}">
		                                    </div>
		                                </td>
		                                <td class="price" data-title="Price">
		                                    <h4 class="text-brand each_cart_price{{$cart->id}}">{{price_format($cart->product->current_price*$cart->quantity)}}</h4>
		                                </td>
		                                <td class="action text-center " data-title="Remove"><a href="#" class="text-body"><i class="fi-rs-trash delete_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}"></i></a></td>
		                            </tr>

		                            @endforeach
		                        </tbody>
		                    </table>
		                </div>
		                <div class="divider-2 mb-30"></div>
		                <div class="cart-action d-flex justify-content-between">
		                    <a href="{{ route('front.index') }}" class="btn" ><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
		                </div>
		                <div class="row mt-50">
		                    
		                    <div class="col-lg-5">
		                        <div class="p-40">
		                            <h4 class="mb-10">Apply Coupon</h4>
		                            <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
		                            <form id="apply_coupon" data-action="{{ route('apply_coupon') }}" method="POST">
		                            	@csrf
		                                <div class="d-flex justify-content-between">
		                                    <input class="font-medium mr-15 coupon" name="coupon_code" placeholder="Enter Your Coupon" required="">
		                                    <button class="btn" type="submit"><i class="fi-rs-label mr-10"></i>Apply</button>
		                                </div>
		                            </form>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="border p-md-4 cart-totals ml-30">
		                    <div class="table-responsive">
		                        <table class="table no-border">
		                            <tbody>
		                                <tr>
		                                    <td class="cart_total_label">
		                                        <h6 class="text-muted">Subtotal</h6>
		                                    </td>
		                                    <td class="cart_total_amount">
		                                        <h4 class="text-brand text-end sub_total">{{price_format(sub_total())}}</h4>
		                                    </td>
		                                </tr>
		                                <tr>
		                                    <td scope="col" colspan="2">
		                                        <div class="divider-2 mt-10 mb-10"></div>
		                                    </td>
		                                </tr>
		                                <tr>
		                                    <td class="cart_total_label">
		                                        <h6 class="text-muted">Shipping</h6>
		                                    </td>
		                                    <td class="cart_total_amount">
		                                        <h5 class="text-heading text-end ">{{price_format(shipping_charge())}}</h4></td> </tr> <tr>
		                                    <td class="cart_total_label">
		                                        <h6 class="text-muted">Tax</h6>
		                                    </td>
		                                    <td class="cart_total_amount">
		                                        <h5 class="text-heading text-end">{{price_format(tax())}}</h4></td> </tr> <tr>
		                                    <td scope="col" colspan="2">
		                                        <div class="divider-2 mt-10 mb-10"></div>
		                                    </td>
		                                </tr>
		                                <tr>
		                                    <td class="cart_total_label">
		                                        <h6 class="text-muted">Grand Total</h6>
		                                    </td>
		                                    <td class="cart_total_amount">
		                                        <h4 class="text-brand text-end grand_total">{{price_format(grand_total())}}</h4>
		                                    </td>
		                                </tr>
		                            </tbody>
		                        </table>
		                    </div>
		                    <a href="{{ route('checkout') }}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
		                </div>
		            </div>
		        </div>
		        	@else
		        	<h4 class="text-center">Empty Cart</h4>
		    	@endif
		    </div>
		</main>

@endsection