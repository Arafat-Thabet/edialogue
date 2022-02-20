<nav class="navbar navbar-expand fixed-top bo-top-header">
    <div class="container-fluid">
        <div class="bo-left-navbar navbar">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <div class="flex items-center">
                        <div class="user-data">
                            <img src="{{asset('img/avatar.png')}}">
                        </div>
                        <div class="welcome-user">
                        <h4>{{__('Welcome')}}</h4>
                            <span class="user-name">{{auth()->user()->name}}</span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link not-ico" href="{{route('profile')}}" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('img/icon-settings.png')}}" class="icon-img">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="bo-right-sidebar">
    <div class="right-sidebar-wrapper">
        <div class="mobile-toggle">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#"><img src="{{asset('img/ficon.png')}}"></a>
        </div>
        <div class="right-sidebar-spacer navbar-collapse collapse" id="navbarSupportedContent" >
            <div class="sidebar-logo">
            <a href="{{ route('dashboard') }}"><img src="{{asset('img/logo-dash.png')}}" class="side-logo"></a>
            </div>
            <div class="right-sidebar-scroll">
                <div class="right-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="active">
                            <a href="{{ route('dashboard') }}"><i class="fa fa-home menu-icon"></i> {{__('Edialogue')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}"><i class="fa fa-cog menu-icon"></i> {{__('Account Settings')}}</a>
                        </li>
                        @if(is_admin())
                        <li> <a  href="{{route('add_member')}}"> <i class="fa fa-plus-circle menu-icon"></i> {{ __('Add new member') }}</a></li>
                        <li> <a  href="{{route('members_list')}}"> <i class="fa fa-users menu-icon"></i> {{ __('Members List') }}</a>   </li>

                        @endif
                        <li>
                            <form  action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="btn logout-btn" >{{__('Log Out')}}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>