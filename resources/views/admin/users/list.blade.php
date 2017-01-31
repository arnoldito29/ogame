@extends('layouts.admin')

@section('content')

<div class="row">
    <a href="{{url('admin/users/create' )}}" class="btn btn-primary">{{trans( 'admin.New') }}</a>
</div>
@if (count($users) > 0)
    <table class="table table-hover">
        <thead>
          <tr>
            <th>{{trans( 'admin.No') }}</th>
            <th>{{trans( 'admin.Name') }}</th>
            <th>{{trans( 'admin.Email') }}</th>
            <th>{{trans( 'admin.Actions') }}</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $key => $user)
        <tr data-id="{{$user->id}}">
            <td><a href="{{url('admin/users/' . $user->id )}}">{{$user->id}}</a></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{url('admin/users/' . $user->id )}}/edit" class="btn btn-primary">{{trans( 'admin.Edit') }}</a>
                <button type="button" data-action="user-delete" data-id="{{$user->id}}" class="btn btn-danger">{{trans( 'admin.Delete') }}</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{trans( 'admin.list empty') }}
@endif

@endsection