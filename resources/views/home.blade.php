@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    {{ trans('messages.welcome') }}<br />
                    <a href="{{ URL::route('login') }}">Login</a>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
