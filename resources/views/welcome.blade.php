@extends('layouts.customer')
@section('content')
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            @if (Session::has('message'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            <p>
                                <i class="fa fa-check-circle"></i>
                                {{ Session::get('message') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">

                        <div class="tns-outer" id="tns1-ow">
                            <div class="tns-controls" aria-label="Carousel Navigation" tabindex="0">
                                <button type="button" data-controls="prev" tabindex="-1" aria-controls="tns1"><i
                                        class="lni lni-chevron-left"></i></button>
                                <button type="button" data-controls="next" tabindex="-1" aria-controls="tns1"><i
                                        class="lni lni-chevron-right"></i></button>
                            </div>
                            <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide
                                <span class="current">4</span> of 2
                            </div>
                            <div id="tns1-mw" class="tns-ovh">
                                <div class="tns-inner" id="tns1-iw">
                                    <div
                                        class="hero-slider  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                        id="tns1"
                                        style="transform: translate3d(-50%, 0px, 0px); transition-duration: 0s;">
                                        <div class="single-slider tns-item tns-slide-cloned"
                                             style="background-image: url(images/hero/1.png);"
                                             aria-hidden="true" tabindex="-1">
                                            <div class="content">

                                                <div class="button">
                                                    <a href="{{ route('shop') }}" class="btn">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slider tns-item tns-slide-cloned"
                                             style="background-image: url(images/hero/2.png);"
                                             aria-hidden="true" tabindex="-1">
                                            <div class="content">

                                                <div class="button">
                                                    <a href="{{ route('shop') }}" class="btn">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-slider tns-item"
                                             style="background-image: url(images/hero/3.png);"
                                             id="tns1-item0" aria-hidden="true" tabindex="-1">
                                            <div class="content">

                                                <div class="button">
                                                    <a href="{{ route('shop') }}" class="btn">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-slider tns-item tns-slide-cloned"
                                             style="background-image: url(assets/images/hero/slider-bg1.jpg);"
                                             aria-hidden="true" tabindex="-1">
                                            <div class="content">

                                                <div class="button">
                                                    <a href="{{ route('shop') }}" class="btn">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slider tns-item tns-slide-cloned"
                                             style="background-image: url(images/hero/3.png);"
                                             aria-hidden="true" tabindex="-1">
                                            <div class="content">


                                                    <a href="{{ route('shop') }}" class="btn btn-outline-primary">Shop Now</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">

                            <div class="hero-small-banner"
                                 style="background-image: url('images/hero/dress.png');">
                                <div class="content">

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-6 col-12">

                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 50% off all online store items this week.</p>
                                    <a class="btn btn-outline-primary" href="{{ route('shop') }}">Shop Now</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 col-12">

                        <div class="single-category">
                            <h3 class="heading">{{ $category->name }}</h3>
                            <div class="py-3">
                                <a href="{{ route('category-details',$category->slug) }}" class="btn btn-warning">Shop
                                    Now</a>
                            </div>
                            <div class="images">
                                <img src="{{ $category->getFirstMediaUrl('image', 'preview') }}" alt="#">
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Product</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach (\App\Models\Product::limit(9)->get() as $product)
                    <livewire:trending-product-component :product="$product"/>
                @endforeach
            </div>
        </div>
    </section>
    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url('assets/images/banner/banner-1-bg.jpg')">
                        <div class="content">
                            <h2>Smart Watch 2.0</h2>
                            <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin"
                         style="background-image:url('assets/images/banner/banner-2-bg.jpg')">
                        <div class="content">
                            <h2>Smart Headphone</h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Free Shipping</h5>
                        <span>On order over $99</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 Support.</h5>
                        <span>Live Chat Or Call.</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->

    <!-- Start Footer Area -->
    <x-footer-component/>
    <!--/ End Footer Area -->
@endsection
