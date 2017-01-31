@extends('layouts.admin')

@section('content')
@if ( !empty( $content ) )
@include('admin.blocks.tabs')
<div id="tab_lt" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$content["name_lt"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $content["text_lt"] )!!}
        </div>
    </div>
</div>
<div id="tab_lv" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$content["name_lv"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $content["text_lv"] )!!}
        </div>
    </div>
</div>
<div id="tab_ee" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$content["name_ee"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $content["text_ee"] )!!}
        </div>
    </div>
</div>
<div id="tab_en" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$content["name_en"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $content["text_en"] )!!}
        </div>
    </div>
</div>
<div id="tab_ru" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$content["name_ru"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $content["text_ru"] )!!}
        </div>
    </div>
</div>
<div id="tab_pl" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$content["name_pl"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $content["text_pl"] )!!}
        </div>
    </div>
</div>
<div id="tab_generic" class="admin-tabs-item">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Created') }}:
        </div>
        <div class="col-md-5">
            {{$content["create"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Active') }}:
        </div>
        <div class="col-md-5">
            @if ( !empty( $content["active"] ))
                {{trans( 'admin.Active') }}
            @else
                {{trans( 'admin.Inactive') }}
            @endif
        </div>
    </div>
</div>
@else
    {{trans( 'admin.not found') }}
@endif

@endsection