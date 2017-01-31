@include('user.header.head')

<body>

@include('user.blocks.index.header')

@yield('content')

@include('user.blocks.modals')

@include('user.footer.footer')

<div id="fb-root"></div>
@include('user.blocks.js')
</body>

</html>