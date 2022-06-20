@extends('frontend.layouts.master')

@section('content')
        <!-- Breadcumb Area -->
        <div class="breadcumb_area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h5>Product Details</h5>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcumb Area -->
    
        <!-- Single Product Details Area --> {{-- for the main product title --}}
        <section class="single_product_details_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
    
                                <!-- Carousel Inner -->
                                <div class="carousel-inner">
                                    @php
                                        $photos=explode(',',$product->photo);   
                                    @endphp
                                    @foreach($photos as $key=>$photo)
                                        <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                            <a class="gallery_img" href="{{$photo}}" title="{{$product->title}}">
                                                <img class="d-block w-100" src="{{asset($photo)}}" alt="{{$product->title}}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
    
                                <!-- Carosel Indicators -->
                                <ol class="carousel-indicators">
                                    @php
                                        $photos=explode(',',$product->photo);   
                                    @endphp
                                    @foreach($photos as $key=>$photo)
                                    <li class="{{$key==0 ? 'active' : ''}}" data-target="#product_details_slider" data-slide-to="{{$key}}" style="background-image: url({{$photo}});">
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product Description -->
                    <div class="col-12 col-lg-6">
                        <div class="single_product_desc">
                            <h4 class="title mb-2">{{$product->title}}</h4>{{-- checked ep16 2335 --}}                          
                            <h4 class="price mb-4">RM{{number_format($product->price,2)}}</h4>{{-- checked ep16 2335 --}}    
    
                            <!-- Overview -->
                        <div class="short_overview mb-4">
                            <h6>Overview</h6>
                            <p>{!! html_entity_decode($product->summary) !!}</p>{{-- checked ep16 2447 --}}   
                        </div>
    
                            <!-- Size Option -->{{-- copy pasted ep33 2806 --}} {{-- part tok sik habis nya lmao --}}
                            {{-- @if(count($product->attributes)>0)
                                <div class="widget p-0 size mb-3">
                                    <h6 class="widget-title">Size</h6>
                                    <div class="widget-desc" style="display: block;width: 45%;">
                                        @php
                                            $product_attr=\App\Models\ProductAttribute::where('product_id',$product->id)->get();
                                        @endphp
                                        <select name="size" id="size">
                                            <option value="">Select size</option>
                                            @foreach($product_attr as $size)
                                                <option value="{{$size->size}}">{{$size->size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                             @endif --}}
    
                            <!-- Add to Cart Form -->
                            <form class="cart clearfix my-5 d-flex flex-wrap align-items-center">
                                <div class="quantity">
                                    <input data-id="{{$product->id}}" type="number" class="qty-text form-control" id="qty2" step="1" min="1" max="12"
                                        name="quantity" value="1">
                                </div>
                                <button type="button" name="addtocart" data-product_id="{{$product->id}}" data-quantity="1" data-price="{{$product->price}}" id="add_to_cart_button_details_{{$product->id}}" value="5"
                                        class="add_to_cart_button_details btn btn-primary mt-1 mt-md-0 ml-1 ml-md-3">Add to cart
                                </button>
                            </form>
    
                            {{-- <!-- Others Info -->
                            <div class="others_info_area mb-3 d-flex flex-wrap">
                                <a class="add_to_wishlist" href="wishlist.html"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
                                <a class="add_to_compare" href="compare.html"><i class="fa fa-th" aria-hidden="true"></i> COMPARE</a>
                                <a class="share_with_friend" href="#"><i class="fa fa-share" aria-hidden="true"></i> SHARE WITH FRIEND</a>
                            </div>      --}}                       
                        </div>
                    </div>
                </div>
            </div>

            {{-- Down Tab and Tab Content --}}
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_details_tab section_padding_100_0 clearfix">
                            <!-- Tabs -->                           
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab"
                                   role="tab">Description</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span
                                        class="text-muted">({{\App\Models\ProductReview::where('product_id',$product->id)->count()}})</span></a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#refund" class="nav-link" data-toggle="tab" role="tab">Return &amp; Cancellation</a>
                            </li>
                        </ul>
                            <!-- Tab Content of description, additional info and refund policy -->
                            <div class="tab-content">
                                {{-- DESCRIPTION --}}
                                <div role="tabpanel" class="tab-pane fade show active" id="description">
                                    <div class="description_area">
                                        <h5>Description</h5>
                                        {!! html_entity_decode($product->description) !!}{{-- checked ep16 2549 --}}
                                    </div>
                                </div>
    
                                {{-- ADDITIONAL INFO --}}
                                {{-- coded ep33 2550 --}}
                                <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                    <div class="additional_info_area">
                                        <h5>Additional Info</h5>
                                        {!! html_entity_decode($product->additional_info) !!}
                                    </div>
                                </div>
                                
                                {{-- REFUND POLICY --}}
                                {{-- coded ep33 2550 --}}
                                <div role="tabpanel" class="tab-pane fade" id="refund">
                                    <div class="refund_area">
                                        <h6>Return Policy</h6>
                                        {!! html_entity_decode($product->return_cancellation) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Product Details Area End -->
    
        <!-- Related Products Area -->{{-- ctart in ep17 --}}
        <section class="you_may_like_area section_padding_0_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading new_arrivals">
                            <h5>You May Also Like</h5>
                        </div>
                    </div>
                </div>
                @if(count($product->rel_prods)>0){{-- checked ep17 431 --}}
                <div class="row">
                    <div class="col-12">
                        <div class="you_make_like_slider owl-carousel">
                            @foreach($product->rel_prods as $item){{-- checked ep17 431 --}}
                            @if($item->id !=$product->id){{-- checked ep17 740 --}}
                            <!-- Single Product -->
                            <div class="single-product-area">
                                <div class="product_image">
                                    <!-- Product Image -->
                                    @php
                                    $photo=explode(',',$item->photo);  
                                    @endphp
                                    <img class="normal_img" src="{{asset($photo[0])}}" alt="{{$item->title}}">{{-- checked ep17 531 --}}                                
                                        
                                    <!-- Wishlist -->
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$product->id}}" id="add_to_wishlist_{{$product->id}}"><i class="icofont-heart"></i></a>
                                    </div>                                 
                                </div>
    
                                <!-- Product Description -->
                                <div class="product_description">
                                    <!-- Add to cart -->
                                    <div class="product_add_to_cart">
                                        <a href="javascript:void(0);" data-quantity="1" data-price="{{$product->price}}" data-product-id="{{$product->id}}" class="add_to_cart" id="add_to_cart{{$product->id}}"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                    </div>
    
                                    {{-- <!-- Quick View -->
                                    <div class="product_quick_view">
                                        <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                                    </div> --}}
    
                                    <p class="brand_name">{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>
                                    <a href="{{route('product.detail',$item->slug)}}">{{ucfirst($item->title)}}</a>
                                    <h6 class="product-price">RM{{number_format($item->price,2)}}</h6>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- Related Products Area -->
@endsection

@section('styles')
    <style>
        .nice-select {
            float: none;
        }

        .widget.size .widget-desc li {
            display: block;
        }

        .nice-select.open .list {
            width: 100%;
        }
    </style>
@endsection

@section('scripts')
<script>
    $('#size').change(function () {
        var size=$(this).val();
        $('.add_to_cart_button_details').attr('data-size',size);
        var product_id = <?php echo $product->id ?>;

        if(product_id !=null){
            $.ajax({
                url:'/get-product-price/'+product_id,
                data:{
                    size:size,
                },
                type:'GET',
                success:function (response) {
                    if(response.status){
                        var data=response.data;
                        $('#original_price').html('$'+data['original_price']);
                        $('#offer_price').html('$'+data['offer_price']);
                        $('#add_to_cart_button_details_{{$product->id}}').attr('data-price',data['offer_price']);
                    }
                }
            });
        }

    })
</script>
@endsection
