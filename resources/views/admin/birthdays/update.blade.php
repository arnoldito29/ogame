@extends('layouts.admin')

@section('content')
    @include('admin.birthdays.header')
    <div class="panel panel-default">
        <form action="{{route('birthdays.update', $birthday->id)}}" method="post">
            <input type="hidden" name="_method" value="patch">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $birthday->name)}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="birthday" name="birthday" value="{{old('birthday', $birthday->birthday)}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
