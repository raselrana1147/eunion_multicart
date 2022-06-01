@extends('layouts.app')
@section('title',config('constant.company_name').' Ecommerce')
@section('ecommerce')
	<main class="main">
	    @include('front.files.slider')
	    <!--End hero slider-->
	    @include('front.files.category_section')
	    <!--End category slider-->
	    @include('front.files.banner')
	    <!--End banners-->
	    @include('front.files.featured')
	    <!--Products Tabs-->
	    @include('front.files.best_sale')
	    <!--End Best Sales-->
	    @include('front.files.flash_deal')
	    <!--End Deals-->
	    @include('front.files.type')
	    <!--End 4 columns-->
	</main>
@endsection

