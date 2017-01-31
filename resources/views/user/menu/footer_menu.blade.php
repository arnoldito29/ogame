@if ( count( $footer_menu ) > 0 ) 
<ul class="footer__nav">
    @foreach ( $footer_menu as $key => $val )
        <li class="footer__nav-item">
            @if ( !empty( $val["_url_"] ) )
                <a href="{{URL::route('faq')}}" class="footer__nav-link">{{$val["_name_"]}}</a>
            @else
                <a href="{{ URL::route('contents',[ $val["_slug_"], $val["id"] ] ) }}" class="footer__nav-link">{{$val["_name_"]}}</a>
            @endif
        </li>
    @endforeach
</ul>
@endif