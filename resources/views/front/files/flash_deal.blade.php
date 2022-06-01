<section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                    <h3 class="">Flash Dead Products</h3>
                    <a class="show-all" href="shop-grid-right.html">
                        All Deals
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>
                <div class="row">
                    @foreach ($flash_deals as $flash_deal)

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{ route('product.detail',$flash_deal->slug) }}">
                                        <img src="{{ asset('assets/backend/image/product/small/'.$flash_deal->thumbnail)}}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="{{$flash_deal->end_date}}"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="{{ route('product.detail',$flash_deal->slug) }}">{{$flash_deal->name}}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                   
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>{{price_format($flash_deal->current_price)}}</span>
                                            @if ($flash_deal->previous_price>$flash_deal->current_price)
                                             <span class="old-price">{{price_format($flash_deal->previous_price)}}</span>
                                             @endif
                                        </div>
                                        <div class="add-cart">
                                            <a class="add add_to_cart_single" href="javascript:;" product_id="{{$flash_deal->id}}" data-action="{{ route('add_to_cart_single') }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>