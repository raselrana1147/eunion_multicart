 <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class="">Daily Best Sells</h3>
                    <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                        </li>
                        
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h2 class="mb-100">Bring nature into your home</h2>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        @foreach ($best_sales as $best_sale)
                                           
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('product.detail',$best_sale->slug) }}">
                                                       <img class="default-img" src="{{ asset('assets/backend/image/product/small/'.$best_sale->thumbnail)}}" alt="" />
                                                       <img class="hover-img" src="{{ count($best_sale->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$best_sale->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$best_sale->thumbnail)}}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" product_id="{{$best_sale->id}}" data-action="{{ route('add_to_wishlist') }}" class="action-btn small hover-up add_to_wishlist" href="javascript:;"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up add_to_comparelist"  product_id="{{$best_sale->id}}" data-action="{{ route('add_to_comparelist') }}" href="javascript:;"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                  @if ($best_sale->previous_price>$best_sale->current_price)
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">{{"Save ".$best_sale->discount}} {{'%'}}</span>
                                                    </div>
                                                 @endif
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="{{ route('product.category_product',$best_sale->category_id) }}">{{$best_sale->category->category_name}}</a>
                                                </div>
                                                <h2><a href="{{ route('product.detail',$best_sale->slug) }}">{{$best_sale->name}}</a></h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <div class="product-price mt-10">
                                                    <span>{{price_format($best_sale->current_price)}}</span>

                                                   @if ($best_sale->previous_price>$best_sale->current_price)
                                                         <span class="old-price">{{price_format($best_sale->previous_price)}}</span>
                                                    @endif
                                                </div>
                                               
                                                <a class="btn w-100 hover-up add_to_cart_single" product_id="{{$best_sale->id}}" data-action="{{ route('add_to_cart_single') }}" href="javascript:;"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                            </div>
                                        </div>
                                          @endforeach
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>