  <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($top_sales as $top_sale)
                               
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ route('product.detail',$top_sale->slug) }}"><img src="{{ asset('assets/backend/image/product/small/'.$top_sale->thumbnail)}}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ route('product.detail',$top_sale->slug) }}">{{$top_sale->name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                       {{price_format($top_sale->current_price)}}
                                        @if ($top_sale->previous_price>$top_sale->current_price)
                                            <span class="old-price">{{price_format($top_sale->previous_price)}}</span>
                                        @endif
                                    </div>
                                </div>
                            </article>
                            
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($trendings as $trending)

                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ route('product.detail',$top_sale->slug) }}"><img src="{{ asset('assets/backend/image/product/small/'.$trending->thumbnail)}}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ route('product.detail',$top_sale->slug) }}">{{$trending->name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price mt-10">
                                        <span>{{price_format($trending->current_price)}}</span>

                                       @if ($trending->previous_price>$trending->current_price)
                                             <span class="old-price">{{price_format($trending->previous_price)}}</span>
                                        @endif
                                    </div>
                                </div>
                            </article>
                          @endforeach
                          
                        </div>
                    </div>



                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated animated">New Arrival</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($new_arrivals as $new_arrival)
                               
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ route('product.detail',$new_arrival->slug) }}"><img src="{{ asset('assets/backend/image/product/small/'.$new_arrival->thumbnail)}}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ route('product.detail',$new_arrival->slug) }}">{{$new_arrival->name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>{{price_format($new_arrival->current_price)}}</span>
                                        @if ($new_arrival->previous_price>$new_arrival->current_price)
                                            <span class="old-price">{{price_format($new_arrival->previous_price)}}</span>
                                         @endif
                                    </div>
                                </div>
                            </article>
                           
                             @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated animated">Hot Selling</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($hot_sales as $hot_sale)
                               
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ route('product.detail',$hot_sale->slug) }}"><img src="{{ asset('assets/backend/image/product/small/'.$hot_sale->thumbnail)}}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ route('product.detail',$hot_sale->slug) }}">{{$hot_sale->name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>{{price_format($hot_sale->current_price)}}</span>
                                        @if ($hot_sale->previous_price>$hot_sale->current_price)
                                            <span class="old-price">{{price_format($hot_sale->previous_price)}}</span>
                                         @endif
                                    </div>
                                </div>
                            </article>
                          
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>