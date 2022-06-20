@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->
        
    <div class="checkout_steps_area">
        <a class="complated" href="checkout-2.html"><i class="icofont-check-circled"></i> Billing</a>
        <a class="complated" href="checkout-3.html"><i class="icofont-check-circled"></i> Shipping</a>
        <a class="complated" href="checkout-4.html"><i class="icofont-check-circled"></i> Payment</a>
        <a href="checkout-5.html"><i class="icofont-check-circled"></i> Review</a>
    </div>

    
    <!-- Checkout Area -->{{-- line 30-49 checked  --}}    
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-30">Review Your Order</h5>

                        <div class="cart-table">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-30">
                                    <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>                                        
                                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item){{-- checked ep26-27 11310 --}}
                                        <tr>
                                            <td>
                                                <img src="{{$item->model->photo}}" alt="Product">
                                            </td>
                                            <td>
                                                <a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a>{{-- checked ep26-27 11310 --}}
                                            </td>
                                            <td>RM{{number_format($item->price,2)}}</td>{{-- checked ep26-27 11310 --}}
                                            <td>
                                                {{$item->qty}}{{-- checked ep26-27 11310 --}}
                                            </td>
                                            <td>RM{{$item->subtotal()}}</td>{{-- checked ep26-27 11310 --}}
                                        </tr>
                                        @endforeach                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 ml-auto">
                    <div class="cart-total-area">
                        <h5 class="mb-3">Cart Totals</h5>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td>Sub Total</td>
                                    <td>RM{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td> {{-- checked ep26-27 11310 --}}
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>RM{{number_format(\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2)}}</td>{{-- checked ep26-27 11310 --}}
                                </tr>
                                <tr>
                                    <td>Total</td>{{-- modified value ep26-27 11736 --}}
                                    @if(\Illuminate\Support\Facades\Session::has('checkout'))
                                        <td>RM{{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2)}}</td>
                                    @else
                                        <td>RM{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout_pagination d-flex justify-content-end mt-3">
                            <a href="checkout-4.html" class="btn btn-primary mt-2 ml-2 d-none d-sm-inline-block">Go Back</a>
                            <a href="{{route('checkout.store')}}" class="btn btn-primary mt-2 ml-2">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End -->

@endsection

@section('scripts')
        
    <script>
        $('#customCheck1').on('change',function (e) { /* checked ep25 4536 */
            e.preventDefault();/* checked ep25 4536 */
            if(this.checked){/* checked ep25 4536 */
                $('#sfirst_name').val($('#first_name').val());/* checked ep25 4536 */
                $('#slast_name').val($('#last_name').val());/* checked ep25 4536 */
                $('#semail').val($('#email').val());/* checked ep25 4536 */
                $('#sphone').val($('#phone').val());/* checked ep25 4536 */
                $('#scountry').val($('#country').val());/* checked ep25 4536 */
                $('#scity').val($('#city').val());/* checked ep25 4536 */
                $('#spostcode').val($('#postcode').val());/* checked ep25 4536 */
                $('#sstate').val($('#state').val());/* checked ep25 4536 */
                $('#saddress').val($('#address').val());/* checked ep25 4536 */
            }
            else{
                $('#sfirst_name').val("");/* checked ep25 4536 */
                $('#slast_name').val("");/* checked ep25 4536 */
                $('#semail').val("");/* checked ep25 4536 */
                $('#sphone').val("");/* checked ep25 4536 */
                $('#scountry').val("");/* checked ep25 4536 */
                $('#scity').val("");/* checked ep25 4536 */
                $('#sstate').val("");/* checked ep25 4536 */
                $('#spostcode').val("")/* checked ep25 4536 */;
                $('#saddress').val("");/* checked ep25 4536 */
            }
        })
    </script>
        
@endsection