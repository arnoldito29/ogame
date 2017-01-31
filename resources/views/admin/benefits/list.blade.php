@extends('layouts.admin')

@section('content')

<div class="row">
    <a href="{{url('admin/benefits/create' )}}" class="btn btn-primary">{{trans( 'admin.New') }}</a>
</div>
@if (count($benefits) > 0)
    <table class="table table-hover">
        <thead>
          <tr>
            <th>{{trans( 'admin.No') }}</th>
            <th>{{trans( 'admin.Text') }}</th>
            <th>{{trans( 'admin.Type') }}</th>
            <th>{{trans( 'admin.Actions') }}</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($benefits as $key => $benefit)
        <tr data-id="{{$benefit->id}}">
            <td><a href="{{url('admin/benefits/' . $benefit->id )}}">{{$benefit->id}}</a></td>
            <td>{{$benefit->text_lt}}</td>
            <td>{{$benefit->type}}</td>
            <td>
                <a href="{{url('admin/benefits/' . $benefit->id )}}/edit" class="btn btn-primary">{{trans( 'admin.Edit') }}</a>
                <button type="button" data-action="benefit-active" data-id="{{$benefit->id}}" class="btn @if (!empty( $benefit->active ))btn-success @else btn-danger @endif">{{trans( 'admin.Active') }}</button>
                <button type="button" data-action="benefit-delete" data-id="{{$benefit->id}}" class="btn btn-danger">{{trans( 'admin.Delete') }}</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{trans( 'admin.list empty') }}
@endif

@endsection