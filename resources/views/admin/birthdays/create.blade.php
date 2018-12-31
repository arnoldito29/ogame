@extends('layouts.admin')

@section('content')
    @include('admin.birthdays.header')
    <div class="panel panel-default">
        <form action="{{route('birthdays.store')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="birthday" name="birthday" value="{{old('birthday')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
