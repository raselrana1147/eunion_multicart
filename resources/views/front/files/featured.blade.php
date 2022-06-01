   <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>Featured Products</h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                        </li>
                     
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach ($featureds as $featured)
                              
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.detail',$featured->slug) }}">
                                                <img class="default-img" src="{{ asset('assets/backend/image/product/small/'.$featured->thumbnail)}}" alt="" />
                                                <img class="hover-img" src="{{ count($featured->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$featured->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$featured->thumbnail)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlis" product_id="{{$featured->id}}" data-action="{{ route('add_to_wishlist') }}" class="action-btn add_to_wishlist" href="javascript:;"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn add_to_comparelist" product_id="{{$featured->id}}" data-action="{{ route('add_to_comparelist') }}" href="javascript:;"><i class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        @if ($featured->previous_price>$featured->current_price)
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">{{"Save ".$featured->discount}} {{'%'}}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ route('product.category_product',$featured->category_id) }}">{{$featured->category->category_name}}</a>
                                        </div>
                                        <h2><a href="{{ route('product.detail',$featured->slug) }}">{{$featured->name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0) </span>
                                        </div>
                                       
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{price_format($featured->current_price)}}</span>
                                                @if ($featured->previous_price>$featured->current_price)
                                                   <span class="old-price">{{price_format($featured->previous_price)}}</span>
                                                @endif
                                               
                                            </div>
                                            <div class="add-cart">
                                                <a class="add add_to_cart_single" product_id="{{$featured->id}}" data-action="{{ route('add_to_cart_single') }}" href="javascript:;"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- {!!$featured->galleries['0']['image']!!} --}}
                             @endforeach

                           
                            <!--end product card-->
                        </div>
                        <!--End product-grid-4-->
                    </div>
                   
                    <!--En tab seven-->
                </div>
                <!--End tab-content-->
            </div>
        </section>