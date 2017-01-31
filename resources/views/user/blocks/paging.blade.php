@if (count($paging) > 0)
<div>
    <a class="btn btn-primary" href="{{url( $paging[0]["url"])}}?{{http_build_query(['page' => $paging[0]["previous"]])}}">@lang('admin.previous_link')</a>
    @foreach ($paging as $key => $page)
        @if ( $key != 0 )
            @if ( !empty( $page["active"] ) )
                <button class="btn btn-success">{{$page["page"]}}</button>
            @else
                <a class="btn btn-default" href="{{url( $paging[0]["url"])}}?{{http_build_query(['page' => $page["page"]])}}">{{$page["page"]}}</a>
            @endif
        @endif
    @endforeach
    <a class="btn btn-primary" href="{{url( $paging[0]["url"])}}?{{http_build_query(['page' => $paging[0]["next"]])}}">@lang('admin.next_link')</a>
</div>
@endif