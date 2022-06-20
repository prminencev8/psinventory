@extends('frontend.layouts.master')

@section('content')

@if(count($banners)>0){{-- section same as notepad --}}
        <!-- Welcome Slides Area -->        
            <section class="welcome_area">
                <div class="welcome_slides owl-carousel">
                    <!-- Single Slide -->
                    @foreach($banners as $banner)
                        <div class="single_slide bg-img" style="background-image: url({{$banner->photo}});">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-12 col-md-6">
                                        <div class="welcome_slide_text">
                                            <h2 class="text-white" data-animation="fadeInUp"
                                                data-delay="300ms">{{$banner->title}}</h2>
                                            <h4 class="text-white" data-animation="fadeInUp"
                                                data-delay="600ms">{!! html_entity_decode($banner->description) !!}</h4>
                                            <a href="{{$banner->slug}}" class="btn btn-primary" data-animation="fadeInUp"
                                            data-delay="900ms">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach              
                </div>                
            </section>        
        <!-- Welcome Slides Area -->
@endif

@if(count($categories)>0)
        <!-- Top Catagory Area -->
        <div class="top_catagory_area section_padding_50 clearfix">
            <div class="container">
                <div class="row">
                    <!-- Single Catagory -->
                    @foreach($categories as $cat)
                        <div class="col-12 col-md-4">
                            <div class="single_catagory mt-50">
                                <a href="{{route('product.category',$cat->slug)}}">
                                    <img src="{{asset($cat->photo)}}" alt="{{$cat->title}}">
                                    <div class="single_cata_desc d-flex align-items-center justify-content-center">
                                        <div class="single_cata_desc_text">
                                            <h5>{{ucfirst($cat->title)}}</h5>
                                            <a href="{{route('product.category',$cat->slug)}}">Shop Now <i
                                                    class="icofont-rounded-double-right"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Top Catagory Area -->
@endif

@php
    $new_products=\App\Models\Product::where(['status'=>'active'])->orderBy('id','DESC')->limit('10')->get();/* checked ep16 124 */
@endphp

@if(count($new_products)>0){{-- checked ep42 741 --}}
 <!-- New Arrivals Area -->
    <section class="new_arrivals_area section_padding_50 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular_section_heading mb-50">
                        <h5>New Inventory</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($new_products as $nproduct)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        @include('frontend.layouts._single-product',['product'=>$nproduct])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
<!-- New Arrivals Area -->
@endif

{{-- <!-- Featured Products Area -->
<section class="featured_product_area">
    <div class="container">
        <div class="row">
            <!-- Featured Offer Area -->
            <div class="col-12 col-lg-6">
                <div class="featured_offer_area d-flex align-items-center"
                    style="background-image: url(img/bg-img/fea_offer.jpg);">
                    <div class="featured_offer_text">
                        <p>Summer 2018</p>
                        <h2>30% OFF</h2>
                        <h4>All kid’s items</h4>
                        <a href="#" class="btn btn-primary btn-sm mt-3">Shop Now</a>
                    </div>
                </div>
            </div>

            <!-- Featured Product Area -->
            <div class="col-12 col-lg-6">
                <div class="section_heading featured">
                    <h5>Featured Products</h5>
                </div>

                <!-- Featured Product Slides -->
                <div class="featured_product_slides owl-carousel">
                    <!-- Single Product -->
                    <div class="single-product-area">
                        <div class="product_image">
                            <!-- Product Image -->
                            <img class="normal_img" src="frontend/img/product-img/new-2.png" alt="">
                            <img class="hover_img" src="frontend/img/product-img/new-2-back.png" alt="">

                            <!-- Product Badge -->
                            <div class="product_badge">
                                <span>Sale</span>
                            </div>

                            <!-- Wishlist -->
                            <div class="product_wishlist">
                                <a href="wishlist.html"><i class="icofont-heart"></i></a>
                            </div>

                            <!-- Compare -->
                            <div class="product_compare">
                                <a href="compare.html"><i class="icofont-exchange"></i></a>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="product_description">
                            <!-- Add to cart -->
                            <div class="product_add_to_cart">
                                <a href="#"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                            </div>

                            <!-- Quick View -->
                            <div class="product_quick_view">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i
                                        class="icofont-eye-alt"></i> Quick View</a>
                            </div>

                            <a href="#">Flower Textured Dress</a>
                            <h6 class="product-price">$17 <span>$26</span></h6>
                            <div class="product_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-area">
                        <div class="product_image">
                            <!-- Product Image -->
                            <img class="normal_img" src="frontend/img/product-img/new-4.png" alt="">
                            <img class="hover_img" src="frontend/img/product-img/new-4-back.png" alt="">

                            <!-- Product Badge -->
                            <div class="product_badge">
                                <span>Sale</span>
                            </div>

                            <!-- Wishlist -->
                            <div class="product_wishlist">
                                <a href="wishlist.html"><i class="icofont-heart"></i></a>
                            </div>

                            <!-- Compare -->
                            <div class="product_compare">
                                <a href="compare.html"><i class="icofont-exchange"></i></a>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="product_description">
                            <!-- Add to cart -->
                            <div class="product_add_to_cart">
                                <a href="#"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                            </div>

                            <!-- Quick View -->
                            <div class="product_quick_view">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i
                                        class="icofont-eye-alt"></i> Quick View</a>
                            </div>

                            <a href="#">Box Shape Dress</a>
                            <h6 class="product-price">$21.25</h6>
                            <div class="product_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-area">
                        <div class="product_image">
                            <!-- Product Image -->
                            <img class="normal_img" src="frontend/img/product-img/new-7.png" alt="">
                            <img class="hover_img" src="frontend/img/product-img/new-7-back.png" alt="">

                            <!-- Product Badge -->
                            <div class="product_badge">
                                <span>Sale</span>
                            </div>

                            <!-- Wishlist -->
                            <div class="product_wishlist">
                                <a href="wishlist.html"><i class="icofont-heart"></i></a>
                            </div>

                            <!-- Compare -->
                            <div class="product_compare">
                                <a href="compare.html"><i class="icofont-exchange"></i></a>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="product_description">
                            <!-- Add to cart -->
                            <div class="product_add_to_cart">
                                <a href="#"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                            </div>

                            <!-- Quick View -->
                            <div class="product_quick_view">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i
                                        class="icofont-eye-alt"></i> Quick View</a>
                            </div>

                            <a href="#">Black Dress</a>
                            <h6 class="product-price">$41 <span>$44</span></h6>
                            <div class="product_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Products Area --> --}}

<!-- Popular Brands Area -->
{{-- <section class="popular_brands_area section_padding_50 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular_section_heading mb-50">
                    <h5>Popular Brands</h5>
                </div>
            </div>
            <div class="col-12">
                <div class="popular_brands_slide owl-carousel">
                    <div class="single_brands">
                        <img src="frontend/img/partner-img/1.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="frontend/img/partner-img/2.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="frontend/img/partner-img/3.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="frontend/img/partner-img/4.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="frontend/img/partner-img/5.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="frontend/img/partner-img/6.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Popular Brands Area -->
@endsection

@section('scripts')


@endsection