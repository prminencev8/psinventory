@extends('frontend.layouts.master')

@section('content')

        <!-- Breadcumb Area -->
        <div class="breadcumb_area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h5>Wishlist</h5>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Wishlist</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcumb Area -->
    
        <!-- Wishlist Table Area -->
        <div class="wishlist-table section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cart-table wishlist-table">
                            <div class="table-responsive" id="wishlist_list">
                                @include('frontend.layouts._wishlist')                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Table Area -->

@endsection

@section('scripts')

    <script>
        $('.move-to-cart').on('click',function (e) { /* checked ep24 3210 */

            e.preventDefault();/* checked ep24 3210 */
            var rowId=$(this).data('id');/* checked ep24 3210 */
            var token="{{csrf_token()}}";/* checked ep24 3210 */
            var path="{{route('wishlist.move.cart')}}";/* checked ep24 3210 */

            $.ajax({/* checked ep24 3210 */
                url:path,/* checked ep24 3210 */
                type:"POST",/* checked ep24 3210 */
                data:{/* checked ep24 3210 */
                    _token:token,/* checked ep24 3210 */
                    rowId:rowId,/* checked ep24 3210 */
                },
                beforeSend:function(){/* checked ep24 3210 */
                    $(this).html('<i class="fas fa-spinner fa-spin"></i> Moving to Cart..');/* checked ep24 3210 */
                },
                success:function (data) {/* checked ep24 4219 */
                    if(data['status']){/* checked ep24 4219 */
                        $('body #cart_counter').html(data['cart_count']);/* checked ep24 4219 */
                        $('body #wishlist_list').html(data['wishlist_list']);/* checked ep24 4437 */
                        $('body #header-ajax').html(data['header']);/* checked ep24 4453 */
                        swal({/* checked ep24 4437 */
                            title: "Success!",/* checked ep24 4437 */
                            text: data['message'],/* checked ep24 4437 */
                            icon: "success",/* checked ep24 4437 */
                            button: "OK!",/* checked ep24 4437 */
                        });
                    }
                    else{/* checked ep24 4437 */
                        swal({/* checked ep24 4437 */
                            title: "Opps!",/* checked ep24 4437 */
                            text: data['message'],/* checked ep24 4437 */
                            icon: "Something went wrong",/* checked ep24 4437 */
                            button: "OK!",/* checked ep24 4437 */
                        });
                    }
                },
                error:function (err) {/* checked ep24 4548 */
                    swal({/* checked ep24 4548 */
                        title: "Error!",/* checked ep24 4548 */
                        text: "Some error",/* checked ep24 4548 */
                        icon: "error",/* checked ep24 4548 */
                        button: "OK!",/* checked ep24 4548 */
                    });
                }
            })
        })
    </script>

    <script>
        $('.delete_wishlist').on('click',function (e) {

            e.preventDefault();
            var rowId=$(this).data('id');
            var token="{{csrf_token()}}";
            var path="{{route('wishlist.delete')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    rowId:rowId,
                },
                success:function (data) {
                    if(data['status']){
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #header-ajax').html(data['header']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    }
                    else{
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "Something went wrong",
                            button: "OK!",
                        });
                    }
                },
                error:function (err) {
                    swal({
                        title: "Error!",
                        text: "Some error",
                        icon: "error",
                        button: "OK!",
                    });
                }
            })

        })
    </script>

@endsection