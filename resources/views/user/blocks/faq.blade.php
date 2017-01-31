@extends('layouts.index')

@section('content')
@if (count($faq) > 0)
    <div class="row">
        @foreach ( $faq as $faq_item )
            @if ( !empty( $faq_item["_name_"] ) && !empty( $faq_item["_text_"] ) )
            <div rel="{{$faq_item["id"]}}" class="faq_item">
                <b>{{$faq_item["_name_"]}}</b>
            </div>
            <div class="hide" id="faq_{{$faq_item["id"]}}">
                {!!html_entity_decode( $faq_item["_text_"])!!}
            </div>
            @endif
        @endforeach
    </div>
@endif

@endsection