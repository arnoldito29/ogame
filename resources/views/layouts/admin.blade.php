<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        {{ config('app.admin_name', 'BananaCar') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ URL::route('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                @include('admin.top_title')
                                @include('admin.top_menu')
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main_block">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.main_menu')
                </div>
                <div class="col-md-9">
                    @include('admin.blocks.navigation')
                    @if ( Session::has('status_msg'))
                    <div class="alert alert-success {{ Session::has('status_error') ? 'alert-danger' : '' }}">
                        @if ( Session::has('status_error'))
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @endif
                        {{Session::get('status_msg')}}
                    </div>
                    @endif
                    @yield('content')
                    @if (!empty($paging))
                        @include('admin.paging', ['paginq' => $paging ])
                    @endif
                </div>
            </div>
            <footer class="row">
                @include('admin.footer')
            </footer>
        </div>
    </div>
    @include('admin.js')
</body>
</html>
