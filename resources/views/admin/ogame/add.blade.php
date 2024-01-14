@extends('layouts.admin')

@section('content')
    @include('admin.ogame.header')
    <div class="panel panel-default">
        <form action="{{route('ogame.store')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="{{old('url')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="data" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="20" cols="50" name="data" id="data"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10">
                    <select name="type" id="type">
                        <option>Type</option>
                        <option value="1">Total</option>
                        <option value="2">Economy</option>
                        <option value="3">Research</option>
                        <option value="4">Military</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
