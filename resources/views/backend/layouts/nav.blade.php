<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>
        <div class="navbar-brand">
            <a href="{{route('admin')}}"><img src="{{asset('backend/assets/images/logo.png')}}" alt="logo" class="img-responsive logo"></a>
        </div>
        
        <div class="navbar-right">           
            <div id="navbar-menu">
                <ul class="nav navbar-nav"> 
                    <li>
                        <a href="{{route('home')}}" target="_blank" class="icon-menu d-none d-sm-block"><i class="icon-home"></i></a>
                    </li>                                 
                    <li>
                        <a class="dropdown-item icon-menu" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="icon-login"></i>
                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>