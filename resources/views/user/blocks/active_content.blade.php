@extends('layouts.index')

@section('content')
<h2>{{$content["_name_"]}}</h2>
<div>{!!html_entity_decode( $content["_text_"] )!!}</div>
@endsection