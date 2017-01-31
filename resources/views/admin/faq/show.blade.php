@extends('layouts.admin')

@section('content')
@if ( !empty( $faq ) )
@include('admin.blocks.tabs')
<div id="tab_lt" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$faq["name_lt"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $faq["text_lt"] )!!}
        </div>
    </div>
</div>
<div id="tab_lv" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$faq["name_lv"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $faq["text_lv"] )!!}
        </div>
    </div>
</div>
<div id="tab_ee" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$faq["name_ee"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $faq["text_ee"] )!!}
        </div>
    </div>
</div>
<div id="tab_en" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$faq["name_en"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $faq["text_en"] )!!}
        </div>
    </div>
</div>
<div id="tab_ru" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$faq["name_ru"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $faq["text_ru"] )!!}
        </div>
    </div>
</div>
<div id="tab_pl" class="admin-tabs-item hide">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Name') }}:
        </div>
        <div class="col-md-5">
            {{$faq["name_pl"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Text') }}:
        </div>
        <div class="col-md-5">
            {!!html_entity_decode( $faq["text_pl"] )!!}
        </div>
    </div>
</div>
<div id="tab_generic" class="admin-tabs-item">
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Created') }}:
        </div>
        <div class="col-md-5">
            {{$faq["create"]}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {{trans( 'admin.Active') }}:
        </div>
        <div class="col-md-5">
            @if ( !empty( $faq["active"] ))
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