@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @include('modules.status')
            You are logged in!
        </div>
    </div>
@endsection
