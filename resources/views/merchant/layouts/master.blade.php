<!doctype html>
<html lang="en">

<head>
    @include('merchant.layouts.head')
</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('backend/assets/images/loader.gif')}}" width="100" height="200" alt="Logo"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    @include('merchant.layouts.nav')

    @include('merchant.layouts.sidebar')


    @yield('content')
    
</div>

    @include('merchant.layouts.footer')
</body>
</html>
