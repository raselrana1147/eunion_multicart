@extends('layouts.app')
@section('title',config('constant.company_name').' Dashboard')
@section('ecommerce_css')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/style/css/datatable.css') }}">
@endsection
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
	                <div class="col-lg-10 m-auto">
	                    <div class="row">
	                        <div class="col-md-3">
	                            <div class="dashboard-menu">
	                               @include('front.profile.sidebar')
	                            </div>
	                        </div>
	                        <div class="col-md-9">
	                            <div class="tab-content account dashboard-content pl-50">
	                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
	                                    <div class="card">
	                                        <div class="card-header">
	                                            <h3 class="mb-0">Hello {{$user->name}}!</h3>
	                                        </div>
	                                        <div class="card-body">
	                                            Welcome to dashbaord
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
	                                    <div class="card">
	                                        <div class="card-header">
	                                            <h3 class="mb-0">Your Orders</h3>
	                                        </div>
	                                        <div class="card-body">
	                                            <div class="table-responsive">
	                                            	@if (count($orders)>0)
	                                            	
	                                                <table id="item_table" class="table" >
	                                                    <thead>
	                                                        <tr>
	                                                            <th>Order</th>
	                                                            <th>Date</th>
	                                                            <th>Status</th>
	                                                            <th>Total</th>
	                                                            <th>Actions</th>
	                                                        </tr>
	                                                    </thead>
	                                                    <tbody>
	                                                    	@foreach ($orders as $order)
	                                                        <tr>
	                                                            <td>#{{$order->order_number}}</td>
	                                                            <td>{{date('M d, Y', strtotime($order->created))}}</td>
	                                                            <td>{{$order->status}}</td>
	                                                            <td>{{price_format($order->grand_total)}}</td>
	                                                            <td><a href="#" class="btn-small d-block">View</a></td>
	                                                        </tr>
	                                                       
	                                                       @endforeach
	                                                    </tbody>
	                                                </table>
	                                                @else
	                                                <p>No order found</p>
	                                                @endif
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
	                                    <div class="card">
	                                        <div class="card-header">
	                                            <h3 class="mb-0">Orders tracking</h3>
	                                        </div>
	                                        <div class="card-body contact-from-area">
	                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
	                                            <div class="row">
	                                                <div class="col-lg-8">
	                                                    <form class="contact-form-style mt-30 mb-50" action="#" method="post">
	                                                        <div class="input-style mb-20">
	                                                            <label>Order ID</label>
	                                                            <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
	                                                        </div>
	                                                        <div class="input-style mb-20">
	                                                            <label>Billing email</label>
	                                                            <input name="billing-email" placeholder="Email you used during checkout" type="email" />
	                                                        </div>
	                                                        <button class="submit submit-auto-width" type="submit">Track</button>
	                                                    </form>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
	                                	 <div class="card">
	                                	 <div class="card-header">
	                                		<h3 class="mb-0">Change password</h3>
	                                	 </div>
	                                	 <div class="card-body contact-from-area">
	                                    <div class="row">
	                                    <form id="change_password" class="register-form outer-top-xs" role="form" method="post" data-action="{{ route('customer.change_password') }}">
	                                    	@csrf
	                                         <div class="row">
	                                             <div class="form-group col-md-6">
	                                                 <label>Old Password <span class="required">*</span></label>
	                                                 <input type="password" class="form-control" name="old_password"  />
	                                                 <span class="valids error_old_pass" style="color: red;"></span>
	                                             </div>
	                                             <div class="form-group col-md-6">
	                                                 <label>New Password <span class="required">*</span></label>
	                                                 <input type="password" class="form-control" name="password" />
	                                                 <span class="valids error_new_pass" style="color: red;"></span>
	                                             </div>
	                                             <div class="form-group col-md-12">
	                                                 <label>Confirm password <span class="required">*</span></label>
	                                                 <input type="password" class="form-control" name="password_confirmation"  />
	                                             </div>
	                                             
	                                             <div class="col-md-12">
	                                                 <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
	                                             </div>
	                                         </div>
	                                     </form>
	                                    </div>
	                                </div>
	                                </div>
	                            </div>




	                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
	                                    <div class="card">
	                                        <div class="card-header">
	                                            <h5>Account Details</h5>
	                                        </div>
	                                        <div class="card-body">
	                                            <p>Already have an account? <a href="page-login.html">Log in instead!</a></p>
	                                            <form id="update_profile" method="POST" name="enq" data-action="{{ route('customer.profile_update') }}" enctype="multipart/form-data">
	                                            	@csrf
											       <input type="hidden" name="id" value="{{$user->id}}">
	                                                <div class="row">
	                                                	 
	                                                	<div class="">
	                                                	   <div class="text-center">
	                                                	      <img id="profile_image_path" src="{{$user->avatar !=null ? asset('assets/frontend/image/profile/'.$user->avatar) :default_image()}}"  class="profile_image" alt="customer image"><br>
	                                                	      <button type="button" class="btn btn-primary btn-sm upload_button" role="button"><i class="fi-rs-upload"></i> Upload</button>
	                                                	   </div>
	                                                	   <input type="file" id="image_path" name="avatar" class="get_image" style="display: none">
	                                                	</div>
	                                               
	                                                    <div class="form-group col-md-6">
	                                                        <label>Name <span class="required">*</span></label>
	                                                        <input  class="form-control" name="name" type="text" value="{{$user->name}}"/>
	                                                        <span class="valids error_name" style="color: red;"></span>
	                                                    </div>
	                                                    
	                                                    
	                                                    <div class="form-group col-md-12">
	                                                        <label>Email <span class="required">*</span></label>
	                                                        <input class="form-control" name="email" type="text" value="{{$user->email}}"/>
	                                                        <span class="valids error_email" style="color: red;"></span>
	                                                    </div>

	                                                    <div class="form-group col-md-12">
	                                                        <label>Phone <span class="required">*</span></label>
	                                                        <input class="form-control" name="phone" type="text" value="{{$user->phone}}" />
	                                                        <span class="valids error_" style="color: red;"></span>
	                                                    </div>

	                                                    <div class="form-group col-md-12">
	                                                        <label>Address <span class="required">(Optional)</span></label>
	                                                       <textarea name="address">{{$user->address}}</textarea>
	                                                    </div>
	                                                   
	                                                   
	                                                    <div class="col-md-12">
	                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
	                                                    </div>
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
	        </div>
	    </div>
	</main>
@endsection

@section('ecommerce_js')
<script src="{{ asset('assets/frontend/style/js/profile.js') }}"></script>
<script src="{{ asset('assets/frontend/style/js/datatable.js') }}"></script>
<script>
	$(document).ready( function () {
	    $('#item_table').DataTable();
	} );
</script>

@endsection