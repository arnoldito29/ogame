@extends('layouts.admin')

@section('content')

<div class="row">
    <a href="{{url('admin/contents/create' )}}" class="btn btn-primary">{{trans( 'admin.New') }}</a>
</div>
@if (count($contents) > 0)
    <table class="table table-hover">
        <thead>
          <tr>
            <th>{{trans( 'admin.No') }}</th>
            <th>{{trans( 'admin.Name') }}</th>
            <th>{{trans( 'admin.Module') }}</th>
            <th>{{trans( 'admin.Actions') }}</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($contents as $key => $content)
        <tr data-id="{{$content->id}}">
            <td><a href="{{url('admin/contents/' . $content->id )}}">{{$content->id}}</a></td>
            <td>{{$content->name_lt}}</td>
            <td>{{trans( 'select.'. $content->module )}}</td>
            <td>
                <a href="{{url('admin/contents/' . $content->id )}}/edit" class="btn btn-primary">{{trans( 'admin.Edit') }}</a>
                <button type="button" data-action="content-active" data-id="{{$content->id}}" class="btn @if (!empty( $content->active ))btn-success @else btn-danger @endif">{{trans( 'admin.Active') }}</button>
                <button type="button" data-action="content-delete" data-id="{{$content->id}}" class="btn btn-danger">{{trans( 'admin.Delete') }}</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{trans( 'admin.list empty') }}
@endif

@endsection