@extends('layouts.admin')

@section('content')
@if ( !empty( $benefit ) )
@include('admin.blocks.tabs')
<div id="tab_lt" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $benefit["text_lt"] )!!}
        </div>
    </div>
</div>
<div id="tab_lv" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $benefit["text_lv"] )!!}
        </div>
    </div>
</div>
<div id="tab_ee" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $benefit["text_ee"] )!!}
        </div>
    </div>
</div>
<div id="tab_en" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $benefit["text_en"] )!!}
        </div>
    </div>
</div>
<div id="tab_ru" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $benefit["text_ru"] )!!}
        </div>
    </div>
</div>
<div id="tab_pl" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $benefit["text_pl"] )!!}
        </div>
    </div>
</div>
<div id="tab_generic" class="admin-tabs-item">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Created') }}:
        </div>
        <div class="col-md-5">
            {{$benefit["create"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Active') }}:
        </div>
        <div class="col-md-5">
            @if ( !empty( $benefit["active"] ))
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