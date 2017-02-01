@include('user.header.head')

<body>

@if ( !empty( $home_page ) )
    @include('user.blocks.index.header_landing')
@else
    @include('user.blocks.index.header')
@endif

@include('user.blocks.modals')

@include('user.footer.footer')

<div id="fb-root"></div>
@include('user.blocks.js')
</body>

</html>