@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Cart</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Cart Area -->
    <div class="cart_area section_padding_100_70 clearfix">
        <div class="container">
            <div class="row justify-content-between" id="cart_list">
                @include('frontend.layouts._cart-lists')
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection

@section('scripts')

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

<script>
    $(document).on('click','.qty-text',function () { /* checked ep23.2 238*/
        var id=$(this).data('id'); /* checked ep23.2 238*/

        var spinner=$(this),input=spinner.closest("div.quantity").find('input[type="number"]'); /* checked ep23.2 337*/


        if(input.val()==1){ /* checked ep23.2 748*/
            return false; /* checked ep23.2 748*/
        }
        if(input.val()!=1){ /* checked ep23.2 748*/
            var newVal=parseFloat(input.val()); /* checked ep23.2 748*/
            $('#qty-input-'+id).val(newVal); /* checked ep23.2 748*/
        }

        var productQuantity=$("#update-cart-"+id).data('product-quantity'); /* checked ep23.2 930*/
        update_cart(id,productQuantity) /* checked */

    });
    function update_cart(id,productQuantity) { /* checked */
        var rowId=id;/* checked */
        var product_qty=$('#qty-input-'+rowId).val();/* checked */
        var token="{{csrf_token()}}";/* checked */
        var path="{{route('cart.update')}}";/* checked */

        $.ajax({/* checked */
            url:path,/* checked */
            type:"POST",/* checked */
            data:{/* checked */
                _token:token,/* checked */
                product_qty:product_qty,/* checked */
                rowId:rowId,/* checked */
                productQuantity:productQuantity,/* checked */
            },
            success:function (data) {/* checked */
                console.log(data);/* checked */
                if(data['status']){/* checked */
                    $('body #header-ajax').html(data['header']);/* checked ep23.2 2419*/
                    $('body #cart_counter').html(data['cart_count']); /* checked ep23.2 2419*/
                    $('body #cart_list').html(data['cart_list']); /* checked ep23.2 2419*/
                    swal({/* checked ep23.2 2419*/
                        title: "Good job!",/* checked ep23.2 2419*/
                        text: data['message'],/* checked ep23.2 2419*/
                        icon: "success",/* checked ep23.2 2419*/
                        button: "OK!",/* checked ep23.2 2419*/
                    });
                }
                else{/* checked ep23.2 2636*/
                    alert(data['message']);/* checked ep23.2 2636*/
                }
            }
        })
    }
</script>
@endsection