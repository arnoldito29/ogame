@extends('layouts.admin')

@section('content')
@if ( !empty( $user ) )
<div class="row">
    <div class="col-md-2">
        {{trans( 'admin.Name') }}:
    </div>
    <div class="col-md-5">
        {{$user["name"]}}
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        {{trans( 'admin.Email') }}:
    </div>
    <div class="col-md-5">
        {{$user["email"]}}
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        {{trans( 'admin.Last active') }}:
    </div>
    <div class="col-md-5">
        {{$user["last_active"]}}
    </div>
</div>
@else
    {{trans( 'admin.not found') }}
@endif

@endsection