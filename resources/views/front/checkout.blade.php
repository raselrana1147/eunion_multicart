@extends('layouts.app')
@section('title',config('constant.company_name').' Checkout')
@section('ecommerce')
		<main class="main">
		    <div class="page-header breadcrumb-wrap">
		        <div class="container">
		            <div class="breadcrumb">
		                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
		                <span></span> Shop
		                <span></span> Checkout
		            </div>
		        </div>
		    </div>
		    <div class="container mb-80 mt-50">
		        <div class="row">
		            <div class="col-lg-8 mb-40">
		                <h1 class="heading-2 mb-10">Checkout</h1>
		                <div class="d-flex justify-content-between">
		                    <h6 class="text-body">There are <span class="text-brand">{{total_item()}}</span> products in your cart</h6>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-lg-7">
		                
		                <div class="row">
		                    <h4 class="mb-30">Billing Details</h4>
		                    <form action="{{ route('submit.checkout') }}" method="post">
		                    	@csrf
		                        <div class="row">
		                            <div class="form-group col-lg-6">
		                                <input type="text" required="" name="name" placeholder="Name *" value="{{Auth::user()->name}}">
		                            </div>
		                            <div class="form-group col-lg-6">
		                                <input type="email" required="" name="email" placeholder="Email *" value="{{Auth::user()->email}}">
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="form-group col-lg-6">
		                                <input type="text" name="phone" required="" placeholder="Phone *" value="{{Auth::user()->phone}}">
		                            </div>
		                            <div class="form-group col-lg-6">
		                                <input type="text" name="address" required="" placeholder="Address" value="{{Auth::user()->address}}">
		                            </div>
		                        </div>
		                    
		                        <div class="row">
		                            <div class="form-group col-lg-6">
		                                <input required="" type="text" name="zip_code" placeholder="Postcode / ZIP *" value="{{Auth::user()->zip_code}}">
		                            </div>
		                            <div class="form-group col-lg-6">
		                               <select name="city" required="">
		                               		<option value="">--Select options--</option>
       									   	<option value="Dhaka">Dhaka</option>
       									   	<option value="Mymensing">Mymensing</option>
       									   	<option value="Rajshahi">Rajshahi</option>
       									   	<option value="Rangpur">Rangpur</option>
       									   	<option value="Barishal">Barishal</option>
       									   	<option value="Khulna">Khulna</option>
       									   	<option value="Chittagong">Chittagong</option>
       									   	<option value="Sylhet">Sylhet</option>
		                               </select>
		                            </div>
		                        </div>
		                        
		                        <div class="form-group mb-30">
		                            <textarea rows="5" placeholder="Additional information (Optional)" name="note"></textarea>
		                        </div>
		                   
		                </div>
		            </div>

		            <div class="col-lg-5">
		                <div class="border p-40 cart-totals ml-30 mb-50">
		                    <div class="d-flex align-items-end justify-content-between mb-30">
		                        <h4>Your Order</h4>
		                        <h6 class="text-muted">Subtotal</h6>
		                    </div>
		                    <div class="divider-2 mb-30"></div>
		                    <div class="table-responsive order_table checkout">
		                        <table class="table no-border">
		                            <tbody>

		                            	@foreach (carts() as $cart)
		                            		
		                            	
		                                <tr>
		                                    <td class="image product-thumbnail"><img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail) }}" alt="#"></td>
		                                    <td>
		                                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{$cart->product->name}}</a></h6></span>
		                                        <div class="product-rate-cover">
		                                            <div class="product-rate d-inline-block">
		                                                <div class="product-rating" style="width:90%">
		                                                </div>
		                                            </div>
		                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
		                                        </div>
		                                    </td>
		                                    <td>
		                                        <h6 class="text-muted pl-20 pr-20">x {{$cart->quantity}}</h6>
		                                    </td>
		                                    <td>
		                                        <h4 class="text-brand">{{price_format($cart->product->current_price*$cart->quantity)}}</h4>
		                                    </td>
		                                </tr>
		                             @endforeach
		                             
		                            </tbody>
		                        </table>
		                    </div>
		                </div>
		                <div class="payment ml-30">
		                    
		                   
		                  
		                   <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></button>
		                </div>
		            </div>
		             </form>
		        </div>
		    </div>
		</main>
@endsection
