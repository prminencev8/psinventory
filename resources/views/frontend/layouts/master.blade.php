<!doctype html>
<html lang="en">

<head>
    @include('frontend.layouts.head')
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Header Area -->
    <header class="header_area" id="header-ajax">
    @include('frontend.layouts.header')
    </header>
    <!-- Header Area End -->
    
        
    @yield('content')

    <!-- Footer Area -->
    @include('frontend.layouts.footer')
    <!-- Footer Area -->

    @include('frontend.layouts.script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function () {/* checked ep31 3205 */
            var path="{{route('autosearch')}}";/* checked ep31 3205 */
            $('#search_text').autocomplete({/* checked ep31 3205 */
                source:function (request,response) {/* checked ep31 3205 */
                    $.ajax({/* checked ep31 3205 */
                        url:path,/* checked ep31 3205 */
                        dataType:"JSON",/* checked ep31 3205 */
                        data:{/* checked ep31 3205 */
                            term:request.term/* checked ep31 3205 */
                        },
                        success:function (data) {/* checked ep31 3205 */
                            response(data);/* checked ep31 3205 */
                        }
                    });
                },
                minLength:1,/* checked ep31 3624 */
            });
    
        });
    </script>

    <script>
        $(document).on('click','.cart_delete',function(e){
            e.preventDefault();
            var cart_id=$(this).data('id');
            var token="{{csrf_token()}}";
            var path="{{route('cart.delete')}}";
    
            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    cart_id:cart_id,
                    _token:token,
                },
                success:function (data) {
                    console.log(data);
    
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

    {{--Add to cart--}} 
    <script>
        $(document).on('click','.add_to_cart',function(e){
            e.preventDefault();
            var product_id=$(this).data('product-id');
            var product_qty=$(this).data('quantity');
            var product_price = $(this).data('price');/* copy pasted not same previously*/
            var token="{{csrf_token()}}";
            var path="{{route('cart.store')}}";

            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    product_id:product_id,
                    product_qty:product_qty,
                    product_price: product_price,/* copy pasted not same previously*/
                    _token:token,
                },
                beforeSend:function () {
                    $('#add_to_cart'+product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading....');
                },
                complete:function () {
                    $('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus"></i> Add to Cart');
                },
                success:function (data) {
                    console.log(data);

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
        $(document).on('click','.add_to_wishlist',function(e){ 
            e.preventDefault();
            var product_id=$(this).data('id');
            var product_qty=$(this).data('quantity');

            var token="{{csrf_token()}}";
            var path="{{route('wishlist.store')}}";

            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{ 
                    product_id:product_id, 
                    product_qty:product_qty, 
                    _token:token, 
                },
                beforeSend:function () { 
                    $('#add_to_wishlist_'+product_id).html('<i class="fa fa-spinner fa-spin"></i>'); 
                },
                complete:function () { 
                    $('#add_to_wishlist_'+product_id).html('<i class="fas fa-heart"></i> Add to Cart'); 
                },
                success:function (data) { 
                    console.log(data); 

                    if(data['status']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                    }
                    else if(data['present']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "warning",
                            button: "OK!",
                        });
                    }
                    else{
                        swal({
                            title: "Sorry!",
                            text: "You can't add that product",
                            icon: "error",
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


</body>

</html>