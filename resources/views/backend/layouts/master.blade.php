<!doctype html>
<html lang="en">

<head>
    @include('backend.layouts.head')
</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('backend/assets/images/loader.gif')}}" width="100" height="200" alt="Loader"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    @include('backend.layouts.nav')

    @include('backend.layouts.sidebar')

    @yield('content')
    
</div>

    @include('backend.layouts.footer')

</body>
</html>
