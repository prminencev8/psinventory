<!-- Single Product -->
    <div class="single-product-area mb-30">
            <div class="product_image">
                @php
                 $photo=explode(',',$product->photo);   
                @endphp                                       
                 <!-- Product Image -->
                <img class="normal_img" src="{{asset($photo[0])}}" alt="">
                                                       
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

                <p class="brand_name">{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>{{-- coded ep15 2351 but with $item --}}
                <a href="{{route('product.detail',$product->slug)}}">{{ucfirst($product->title)}}</a>{{-- coded ep16 916 but with $item --}}
                <h6 class="product-price">RM{{number_format($product->price,2)}}</h6>{{-- coded ep15 2351 but with $item --}}
            </div>                                                                                                        
    </div>                                    
