@extends('layouts.admin')

@section('content')
    @include('admin.birthdays.header')
    <div class="panel panel-default">
        <a href="{{route('birthdays.create')}}" class="btn btn-success">Create</a>
        <table class="table table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Years</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @if ($list->count() > 0)
                    @foreach($list as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->getYears()}}</td>
                            <td>
                                <a href="{{route('birthdays.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                <a data-url="{{route('birthdays.destroy', $item->id)}}" class="btn btn-danger delete-item">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Įrašų nerasta</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
