@include('user.header.head')

<body>

@if ( !empty( $home_page ) )
    @include('user.blocks.index.header_landing')
@else
    @include('user.blocks.index.header')
@endif
@include('user.blocks.index.how')

@include('user.blocks.index.travel')

@include('user.blocks.index.reviews')

@include('user.blocks.modals')

@include('user.footer.footer')

<div id="fb-root"></div>
@include('user.blocks.js')
</body>

</html>