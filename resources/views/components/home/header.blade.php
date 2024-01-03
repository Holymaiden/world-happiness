<div class="page-main-header">
    <div class="main-header-right">
        <div class="main-header-left text-center">
            <div class="logo-wrapper"><a href="{{ route('home') }}"><img src="{{ asset('logo-tran.png') }}" alt=""
                        style="width:80px;height:25px"></a></div>
        </div>
        <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
            </div>
        </div>
        <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar"> </i></div>
        <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">
                <li>

                </li>
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li> <a href="{{ route('login') }}"> <span class="media user-header"><img class="img-fluid"
                                src="{{ route('home') }}/assets/images/dashboard/user.png" alt=""></span></a>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>
