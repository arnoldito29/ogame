@extends('layouts.admin')

@section('content')
    @include('admin.birthdays.header')
    <div class="panel panel-default">
        <a href="{{route('birthdays.create')}}" class="btn btn-success">Create</a>
    </div>
@endsection
