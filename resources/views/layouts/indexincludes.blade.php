<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.header.head')
</head>
<body>
    <div id="app">
        @include('user.header.header')
        <div id="main_block">
            <div class="row">
                <div class="col-md-12">
                    @if ( Session::has('status_msg'))
                    <div class="alert alert-success {{ Session::has('status_error') ? 'alert-danger' : '' }}">
                        @if ( Session::has('status_error'))
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @endif
                        {{Session::get('status_msg')}}
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
            @include('user.blocks.reviews')
            @include('user.menu.footer_menu')
            <footer class="row">
                @include('user.footer.footer')
            </footer>
        </div>
    </div>
    @include('user.blocks.js')
</body>
</html>
