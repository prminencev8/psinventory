<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{asset('backend/assets/images/user.png')}}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="user-name"><strong>Admin{{-- {{ucfirst(auth('admin')->user()->full_name)}} --}}</strong></a>{{-- coded ep36 1520 --}}                   
            </div>
            
        </div>
        <nav class="sidebar-nav">
            <ul class="main-menu metismenu">
                
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-user"></i><span>User Management</span> </a>
                    <ul>
                        <li><a href="{{route('user.index')}}">All Users</a></li>
                        <li><a href="{{route('user.create')}}">Add User</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-user"></i><span>Merchant Stores</span> </a>
                    <ul>
                        <li><a href="{{route('merchant.index')}}">All Merchants</a></li>
                        {{-- <li><a href="{{route('user.create')}}">Add Merchant</a></li> --}}
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-picture"></i><span>Banner Management</span> </a>
                    <ul>
                        <li><a href="{{route('banner.index')}}">All Banners</a></li>
                        <li><a href="{{route('banner.create')}}">Add Banner</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-docs"></i><span>Category Management</span> </a>
                    <ul>
                        <li><a href="{{route('category.index')}}">All Categories</a></li>
                        <li><a href="{{route('category.create')}}">Add Category</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-handbag"></i><span>Brand Management</span> </a>
                    <ul>
                        <li><a href="{{route('brand.index')}}">All Brands</a></li>
                        <li><a href="{{route('brand.create')}}">Add Brand</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-briefcase"></i><span>Product Management</span> </a>
                    <ul>
                        <li><a href="{{route('product.index')}}">All Products</a></li>
                        <li><a href="{{route('product.create')}}">Add Product</a></li>
                    </ul>
                </li>                                                                                    
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-plane"></i><span>Shipping Management</span> </a>
                    <ul>
                        <li><a href="{{route('shipping.index')}}">All Shippings</a></li>
                        <li><a href="{{route('shipping.create')}}">Add Shipping</a></li>
                    </ul>
                </li>
                <li><a href="{{route('order.index')}}"><i class="icon-grid"></i>Order Management</a></li>                               
            </ul>
        </nav>                        
    </div>
</div>
