@extends('layouts.app')
@section('title',config('constant.company_name').' Order Completion')
@section('ecommerce_css')
	
@endsection
@section('ecommerce')
		   <div class="invoice invoice-content invoice-1">
		       <div class="back-top-home hover-up mt-30 ml-30">
		           <a class="hover-up" href="index.html"><i class="fi-rs-home mr-5"></i> Homepage</a>
		       </div>
		       <div class="container">
		           <div class="row">
		               <div class="col-lg-12">
		                   <div class="invoice-inner">
		                       <div class="invoice-info" id="invoice_wrapper">
		                           <div class="invoice-header">
		                               <div class="row">
		                                   <div class="col-sm-6">
		                                       <div class="invoice-name">
		                                           <div class="logo">
		                                               <a href="index.html"><img src="{{ asset('assets/frontend/assets/imgs/theme/logo-light.svg') }}" alt="logo" /></a>
		                                           </div>
		                                       </div>
		                                   </div>
		                                   <div class="col-sm-6">
		                                       <div class="invoice-numb">
		                                           <h6 class="text-end mb-10 mt-20">Date: {{date('d M Y'), strtotime($order->created_at)}}</h6>
		                                           <h6 class="text-end invoice-header-1">Invoice No: #{{$order->order_number}}</h6>
		                                       </div>
		                                   </div>
		                               </div>
		                           </div>
		                           <div class="invoice-top">
		                               <div class="row">
		                                   <div class="col-lg-9 col-md-6">
		                                       <div class="invoice-number">
		                                           <h4 class="invoice-title-1 mb-10">Invoice From</h4>
		                                           <p class="invoice-addr-1">
		                                               <strong>E-union</strong> <br />
		                                               {{config('constant.company_email')}} <br />
		                                               {{config('constant.company_address')}}
		                                           </p>
		                                       </div>
		                                   </div>
		                                   <div class="col-lg-3 col-md-6">
		                                       <div class="invoice-number">
		                                           <h4 class="invoice-title-1 mb-10">Bill To</h4>
		                                           <p class="invoice-addr-1">
		                                               <strong>{{$order->billing->customer_name}}</strong> <br />
		                                               {{$order->billing->customer_email}} <br />
		                                               {{$order->billing->city}} <br />
		                                               {{$order->billing->zip_code}} <br />
		                                               {{$order->billing->customer_address}}
		                                           </p>
		                                       </div>
		                                   </div>
		                               </div>
		                               <div class="row mt-2">
		                                   <div class="col-lg-9 col-md-6">
		                                       <h4 class="invoice-title-1 mb-10">Due Date:</h4>
		                                       <p class="invoice-from-1">{{date('d M Y'), strtotime($order->created_at)}}</p>
		                                   </div>
		                                   <div class="col-lg-3 col-md-6">
		                                       <h4 class="invoice-title-1 mb-10">Payment Method</h4>
		                                       <p class="invoice-from-1">Nagad</p>
		                                       <p class="invoice-from-1">Transaction: {{$order->order_id}}</p>
		                                   </div>
		                               </div>
		                           </div>
		                           <div class="invoice-center">
		                               <div class="table-responsive">
		                                   <table class="table table-striped invoice-table">
		                                       <thead class="bg-active">
		                                           <tr>
		                                               <th>Item name</th>
		                                               <th class="text-center">Unit Price</th>
		                                               <th class="text-center">Quantity</th>
		                                               <th class="text-right">Amount</th>
		                                           </tr>
		                                       </thead>
		                                       <tbody>

		                                       	@foreach ($orders as $item)
		                                       		
		                                           <tr>
		                                               <td>
		                                                   <div class="item-desc-1">
		                                                       <span>{{$item->product->name}}</span>
		                                                       <img src="{{ asset('assets/backend/image/product/small/'.$item->product->thumbnail) }}" width="60" height="60">
		                                                   </div>
		                                               </td>
		                                               <td class="text-center">{{price_format($item->product->current_price)}}</td>
		                                               <td class="text-center">{{$item->product_quantity}}</td>
		                                               <td class="text-right">{{price_format($item->product->current_price*$item->product_quantity)}}</td>
		                                           </tr>
		                                          	@endforeach
		                                         
		                                           <tr>
		                                               <td colspan="3" class="text-end f-w-600">SubTotal</td>
		                                               <td class="text-right">{{price_format($order->amount)}}</td>
		                                           </tr>
		                                           <tr>
		                                               <td colspan="3" class="text-end f-w-600">Tax</td>
		                                               <td class="text-right">{{price_format($order->tax)}}</td>
		                                           </tr>

		                                           <tr>
		                                               <td colspan="3" class="text-end f-w-600">Shipping Charge</td>
		                                               <td class="text-right">{{price_format($order->shipping_charge)}}</td>
		                                           </tr>
		                                           <tr>
		                                               <td colspan="3" class="text-end f-w-600">Grand Total</td>
		                                               <td class="text-right f-w-600">{{price_format($order->grand_total)}}</td>
		                                           </tr>
		                                       </tbody>
		                                   </table>
		                               </div>
		                           </div>
		                           <div class="invoice-bottom">
		                               <div class="row">
		                                   <div class="col-sm-6">
		                                       <div>

		                                           <h3 class="invoice-title-1">Order Note</h3>
		                                           <ul class="important-notes-list-1">
		                                               <li>{{$order->note}}</li>
		                                               
		                                           </ul>
		                                       </div>
		                                   </div>
		                                   <div class="col-sm-6 col-offsite">
		                                       <div class="text-end">
		                                           <p class="mb-0 text-13">Thank you for your business</p>
		                                           <p><strong>AliThemes JSC</strong></p>
		                                           <div class="mobile-social-icon mt-50 print-hide">
		                                               <h6>Follow Us</h6>
		                                               @foreach (social_link() as $link)
		                                               
		                                               <a href="{{$link->link}}" target="_blank">
		                                                 	<img src="{{ asset('assets/backend/image/social/'.$link->image) }}" alt="" />
		                                               </a>
		                                               
		                                               
		                                               @endforeach
		                                           </div>
		                                       </div>
		                                   </div>
		                               </div>
		                           </div>
		                       </div>
		                       <div class="invoice-btn-section clearfix d-print-none">

		                           <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img src="assets/imgs/theme/icons/icon-print.svg" alt="" /> Print </a>
		                           
		                       </div>
		                   </div>
		               </div>
		           </div>
		       </div>
		   </div>
@endsection
@section('ecommerce_js')
@endsection