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
    
        <!-- Checkout Step Area -->
        <div class="checkout_steps_area">
            <a class="active" href="checkout-2.html"><i class="icofont-check-circled"></i> Billing</a>
            <a href="checkout-3.html"><i class="icofont-check-circled"></i> Shipping</a>
            <a href="checkout-4.html"><i class="icofont-check-circled"></i> Payment</a>
            <a href="checkout-5.html"><i class="icofont-check-circled"></i> Review</a>
        </div>
    
        <!-- Checkout Area -->
        <div class="checkout_area section_padding_100">
            <div class="container">
                <div class="row">{{-- checked ep28 222 --}}
                    <div class="col-12">{{-- checked ep28 222 --}}
                        @if($errors->any()){{-- checked ep28 222 --}}
                            <div class="alert alert-danger">{{-- checked ep28 241 --}}
                                <ul>{{-- checked ep28 222 --}}
                                    @foreach($errors->all() as $error){{-- checked ep28 222 --}}
                                        <li>{{$error}}</li>{{-- checked ep28 222 --}}
                                    @endforeach{{-- checked ep28 222 --}}
                                </ul>{{-- checked ep28 222 --}}
                            </div>{{-- checked ep28 222 --}}
                        @endif{{-- checked ep28 222 --}}
                    </div>{{-- checked ep28 222 --}}
                </div>{{-- checked ep28 222 --}}
                <div class="row">
                    <form action="{{route('checkout1.store')}}" method="post">
                     @csrf
                        <div class="col-12">
                            <div class="checkout_details_area clearfix">
                                <h5 class="mb-4">Billing Details</h5>                                                                
                                    <div class="row">
                                        @php
                                            $name=explode(' ',$user->full_name);
                                        @endphp
                                        <div class="col-md-6 mb-3">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" placeholder="" value="{{$name[0]}}" required name="first_name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" placeholder="" value="{{$name[1]}}" name="last_name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email_address">Email Address</label>
                                            <input type="email" class="form-control" id="email" placeholder=""  name="email" value="{{$user->email}}" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="number" class="form-control" id="phone" min="0" value="{{$user->phone}}" name="phone">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}" placeholder="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="street_address">Street address</label>
                                            <input type="text" class="form-control" id="address" placeholder="" value="{{$user->address}}" name="address">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="city">Town/City</label>
                                            <input type="text" class="form-control" id="city" name="city"  placeholder="" value="{{$user->city}}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" placeholder="" value="{{$user->state}}" name="state">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="postcode">Postcode/Zip</label>
                                            <input type="text" class="form-control" id="postcode" placeholder="" value="{{$user->postcode}}" name="postcode">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="order-notes">Order Notes</label>
                                            <textarea class="form-control" id="order-notes" cols="30" rows="10" name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>                   
                                    </div>
        
                                    <!-- Different Shipping Address -->
                                    <div class="different-address mt-50">
                                        <div class="ship-different-title mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Ship to a same address?</label>
                                            </div>
                                        </div>
                                        <div class="row shipping_input_field">
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="sfirst_name" placeholder="First Name" value="{{$name[0]}}" required name="sfirst_name">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="slast_name" placeholder="Last Name" value="{{$name[1]}}" name="slast_name" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email_address">Email Address</label>
                                                <input type="email" class="form-control" id="semail" placeholder="Email Address"  name="semail" value="{{$user->email}}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phone_number">Phone Number</label>
                                                <input type="number" class="form-control" id="sphone" min="0" value="{{$user->phone}}" name="sphone" placeholder="Phone number">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="scountry" name="scountry" value="{{$user->scountry}}" placeholder="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="street_address">Street address</label>
                                                <input type="text" class="form-control" id="saddress" placeholder="Street Address" value="{{$user->saddress}}" name="saddress">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="city">Town/City</label>
                                                <input type="text" class="form-control" id="scity" name="scity"  placeholder="Town/City" value="{{$user->scity}}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" id="sstate" placeholder="State" value="{{$user->sstate}}" name="sstate">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="postcode">Postcode/Zip</label>
                                                <input type="text" class="form-control" id="spostcode" placeholder="Postcode / Zip" value="{{$user->spostcode}}" name="spostcode">
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                        <input type="hidden" name="sub_total" value="{{(float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())}}">{{-- checked ep28 1445 --}}
                        <input type="hidden" name="total_amount" value="{{(float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())}}">{{-- checked ep28 1445 --}}
        
                        <div class="col-12">
                            <div class="checkout_pagination d-flex justify-content-end mt-50">
                                <a href="{{route('cart')}}" class="btn btn-primary mt-2 ml-2">Go Back</a>
                                <button type="submit" class="btn btn-primary mt-2 ml-2">Continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Checkout Area -->

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