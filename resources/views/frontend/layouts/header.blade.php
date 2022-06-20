    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-6">
                    <div class="welcome-note">
                        <span class="popover--text" data-toggle="popover"
                            data-content="">PSInventory<i
                                class="icofont-info-square"></i></span>
                        <span class="text"></span>
                    </div>
                </div>               
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="bigshop-main-menu">
        <div class="container">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar" id="bigshopNav">

                    <!-- Nav Brand -->
                    <a href="{{route('home')}}" class="nav-brand">{{-- <img src="{{asset('backend/assets/images/logo.png')}}" --}}</a>{{-- coded ep16 702 --}}

                    <!-- Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Close -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="{{route('home')}}">Home</a>                                    
                                </li>
                                <li><a href="{{route('shop')}}">Shop</a>                                    
                                </li>
                                <li><a href="{{route('merchant')}}">Merchant</a>                                    
                                </li>                                
                                <li><a href="contact.html">Coming Soon</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Hero Meta -->
                    <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                        <!-- Search -->
                        <div class="search-area">
                            <div class="search-btn"><i class="icofont-search"></i></div>
                            <!-- Form -->
                            <form action="{{route('search')}}" method="GET">
                                <div class="search-form d-flex">
                                    <input type="search" id="search_text" name="query" class="form-control" placeholder="Search" style="height: 42px;width: 300px;">
                                    <button type="submit" style="margin: 0;border-radius: 0 4px 4px 0;margin-right: -15px;" class="btn btn-primary">Search</button>
                                </div>
                            </form>                   
                        </div>

                        <!-- Wishlist -->
                        <div class="wishlist-area">
                            <a href="{{route('wishlist')}}" class="wishlist-btn"><i class="icofont-heart"></i></a>
                        </div>

                        <!-- Cart -->
                        <div class="cart-area">
                            <div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity" id="cart_counter">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</span>
                            </div>

                        <!-- Cart Dropdown Content --> {{-- 155 copy pasted --}}
                            <div class="cart-dropdown-content">
                                <ul class="cart-list">
                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{$item->model->photo}}" class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a>
                                                <p>{{$item->qty}} x - <span class="price">RM{{number_format($item->price,2)}}</span></p>
                                            </div>
                                        </div>
                                            <span class="dropdown-product-remove cart_delete" data-id="{{$item->rowId}}"><i class="icofont-bin"></i></span>
                                    </li>
                                    @endforeach                            
                                </ul>
                                
                                <div class="cart-pricing my-4">
                                    <ul>
                                        <li>
                                            <span>Total:</span>
                                            <span>RM{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                                        </li>
                                    {{--<li>--}}
                                            {{--<span>Shipping:</span>--}}
                                            {{--<span>$30.00</span>--}}
                                    {{--</li>--}}
                                    </ul>
                                </div>
                                <div class="cart-box d-flex">
                                    <a href="{{route('cart')}}" class="btn btn-success btn-sm">Cart</a>
                                    <a href="{{route('checkout1')}}" class="btn btn-primary btn-sm float-right">Checkout</a>
                                </div>
                            </div>
                        </div>

                        <!-- Account -->
                        <div class="account-area">
                            <div class="user-thumbnail">
                                @auth
                                    @if(auth()->user()->photo)
                                        <img src="{{auth()->user()->photo}}" alt="">
                                    @else
                                        <img src="{{Helper::userDefaultImage()}}" alt="">
                                    @endif
                                @else
                                    <img src="{{Helper::userDefaultImage()}}" alt="">
                                @endauth
                            </div>
                            <ul class="user-meta-dropdown">
                                @auth
                                    @php
                                        $first_name=explode(' ',auth()->user()->full_name);
                                    @endphp
                                <li class="user-title"><span>Hello,</span> {{$first_name[0]}} !</li>
                                    <li><a href="{{route('user.dashboard')}}">My Account</a></li>
                                    <li><a href="{{route('user.order')}}">Orders List</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="{{route('user.logout')}}"><i class="icofont-logout"></i> Logout</a></li>
                                @else
                                    <li><a href="{{route('user.auth')}}">Login & Register</a></li>                               
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
