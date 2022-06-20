@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Product Category</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>{{-- coded ep16 814 --}}
                        <li class="breadcrumb-item active">{{$categories->title}}</li>{{-- coded ep16 814 --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <section class="shop_grid_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shop Top Sidebar -->
                    <div class="shop_top_sidebar_area d-flex flex-wrap align-items-center justify-content-between">
                        <div class="view_area d-flex">
                                           
                        </div>                        
                        <select id="sortBy" class="small right">
                            <option selected>Default Sort</option>
                            <option value="priceAsc" {{old('sortBy')=='priceAsc' ? 'selected' : ''}}>Price - Lower To Higher</option>
                            <option value="priceDesc" {{old('sortBy')=='priceDesc' ? 'selected' : ''}}>Price - Higher To Lower</option>
                            <option value="titleAsc" {{old('sortBy')=='titleAsc' ? 'selected' : ''}}>Alphabetical Ascending</option>
                            <option value="titleDesc" {{old('sortBy')=='titleDesc' ? 'selected' : ''}}>Alphabetical Descending</option>                            
                        </select>
                    </div>

                    <div class="shop_grid_product_area">
                        <div class="row" id="product-data">
                            @foreach($products as $product)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                @include('frontend.layouts._single-product',['product'=>$product])
                                </div>
                            @endforeach
                        </div>
                    </div>                                                                                                                                                                                                                                    
                    
                    <div class="ajax-load text-center" style="display: none">
                        <img src="{{asset('frontend/img/loader.gif')}}" style="width: 6%;">
                   </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script>            
        $('#sortBy').change(function () {
            var sort=$('#sortBy').val();

            window.location="{{url(''.$route.'')}}/{{$categories->slug}}?sort="+sort;
        });
    </script>

        {{-- loadmoredata --}}
        {{-- <script>
            function loadmoreData(page) {
                $.ajax({
                    url:'?page='+page,
                    type:'get',
                    beforeSend:function () {
                        $('.ajax-load').show();
                    },
                })
                .done(function(data){
                    if(data.html==''){
                        $('.ajax-load').html('No more product available');
                        return;
                    }
                    else{
                        $('.ajax-load').hide();
                        $('#product-data').append(data.html);
                    }
                })
                .fail(function () {
                    alert('Something went wrong! please try again');
                });
            }

            var page=1;
            $(window).scroll(function () {
                if($(window).scrollTop() +$(window).height()+120>=$(document).height()){
                    page ++;
                    loadmoreData(page);
                }
            })
        </script> --}}

    {{--Add to cart--}} 
    <script>
        $(document).on('click','.add_to_cart',function(e){/* checked ep22 1020 */
            e.preventDefault();/* checked ep22 1020 */
            var product_id=$(this).data('product-id');/* checked ep22 1020 */ 
            var product_qty=$(this).data('quantity');/* checked ep22 1020 */
            
            var token="{{csrf_token()}}";/* checked ep22 1020 */
            var path="{{route('cart.store')}}";/* checked ep22 1020 */

            $.ajax({/* checked ep22 1020 */
                url:path,/* checked ep22 1020 */
                type:"POST",/* checked ep22 1020 */
                dataType:"JSON",/* checked ep22 1020 */
                data:{/* checked ep22 1020 */
                    product_id:product_id,/* checked ep22 1020 */
                    product_qty:product_qty,/* checked ep22 1020 */
                    _token:token,/* checked ep22 1020 */
                },/* checked ep22 1020 */
                beforeSend:function () {/* checked ep22 1020 */
                    $('#add_to_cart'+product_id).html('<i class="icon-heart"></i> Loading....');/* checked ep22 1020 */
                },
                
                complete:function () {
                    $('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus"></i> Add to Cart');
                },
                success:function (data) {
                    console.log(data);
                }

                    if(data['status']){
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    }
                },
                error:function (err) {
                    console.log(err);
                }
            });
        });
    </script>

    {{--Add to wishlist--}}
    <script>
        $(document).on('click','.add_to_wishlist',function(e){ /* checked ep24 730 */
            e.preventDefault();/* checked ep24 730 */
            var product_id=$(this).data('id');/* checked ep24 1103 */
            var product_qty=$(this).data('quantity');/* checked ep24 730 */

            var token="{{csrf_token()}}";/* checked ep24 730 */
            var path="{{route('wishlist.store')}}";/* checked ep24 730 */

            $.ajax({/* checked ep24 730 */
                url:path,/* checked ep24 730 */
                type:"POST",/* checked ep24 730 */
                dataType:"JSON",/* checked ep24 730 */
                data:{/* checked ep24 730 */
                    product_id:product_id,/* checked ep24 730 */
                    product_qty:product_qty,/* checked ep24 730 */
                    _token:token,/* checked ep24 730 */
                },
                beforeSend:function () {/* checked ep24 730 */
                    $('#add_to_wishlist_'+product_id).html('<i class="fa fa-spinner fa-spin"></i>');/* checked ep24 730 */
                },
                complete:function () {/* checked ep24 730 */
                    $('#add_to_wishlist_'+product_id).html('<i class="fas fa-heart"></i>');/* checked ep24 730 */
                },
                success:function (data) {/* checked ep24 730 */
                    console.log(data);/* checked ep24 730 */

                    if(data['status']){/* checked ep24 2216 */
                        $('body #header-ajax').html(data['header']);/* checked ep24 2216 */
                        $('body #wishlist_counter').html(data['wishlist_count']);/* checked ep24 2216 */
                        swal({/* checked ep24 2216 */
                            title: "Good job!",/* checked ep24 2216 */
                            text: data['message'],/* checked ep24 2216 */
                            icon: "success",/* checked ep24 2216 */
                            button: "OK!",/* checked ep24 2216 */
                        });
                    }
                    else if(data['present']){/* checked ep24 2216 */
                        $('body #header-ajax').html(data['header']);/* checked ep24 2216 */
                        $('body #wishlist_counter').html(data['wishlist_count']);/* checked ep24 2216 */
                        swal({/* checked ep24 2216 */
                            title: "Opps!",/* checked ep24 2216 */
                            text: data['message'],/* checked ep24 2216 */
                            icon: "warning",/* checked ep24 2216 */
                            button: "OK!",/* checked ep24 2216 */
                        });
                    }
                    else{
                        swal({
                            title: "Sorry!",/* checked ep24 2216 */
                            text: "You can't add that product",/* checked ep24 2216 */
                            icon: "error",/* checked ep24 2216 */
                            button: "OK!",/* checked ep24 2216 */
                        });
                    }
                },
                error:function (err) {/* checked ep24 730 */
                    console.log(err);/* checked ep24 730 */
                }
            });
        });
    </script>
@endsection
