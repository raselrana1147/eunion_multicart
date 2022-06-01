 <section class="home-slider position-relative mb-30">
            <div class="container">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                     @foreach ($sliders as $slider)
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('assets/backend/image/slider/large/'.$slider->image)}})">
                            <div class="slider-content">
                                @if (!is_null($slider->title_1))
                                   <h1 class="display-2 mb-40">{{$slider->title_1}}</h1>
                                @endif
                               @if (!is_null($slider->title_2))
                                <p class="mb-65">{{$slider->title_2}}</p>
                                @endif
                                 @if (!is_null($slider->url))
                                <a href="{{$slider->url}}" class="btn">{{$slider->button_title}}</a><br><br>
                                @endif
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
        </section>