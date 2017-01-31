@extends('layouts.admin')

@section('content')

<div class="row">
    <a href="{{url('admin/faq/create' )}}" class="btn btn-primary">{{trans( 'admin.New') }}</a>
</div>
@if (count($faq) > 0)
    <table class="table table-hover">
        <thead>
          <tr>
            <th>{{trans( 'admin.No') }}</th>
            <th>{{trans( 'admin.Name') }}</th>
            <th>{{trans( 'admin.Actions') }}</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($faq as $key => $faq_item)
        <tr data-id="{{$faq_item->id}}">
            <td><a href="{{url('admin/faq/' . $faq_item->id )}}">{{$faq_item->id}}</a></td>
            <td>{{$faq_item->name_lt}}</td>
            <td>
                <a href="{{url('admin/faq/' . $faq_item->id )}}/edit" class="btn btn-primary">{{trans( 'admin.Edit') }}</a>
                <button type="button" data-action="faq-active" data-id="{{$faq_item->id}}" class="btn @if (!empty( $faq_item->active ))btn-success @else btn-danger @endif">{{trans( 'admin.Active') }}</button>
                <button type="button" data-action="faq-delete" data-id="{{$faq_item->id}}" class="btn btn-danger">{{trans( 'admin.Delete') }}</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{trans( 'admin.list empty') }}
@endif

@endsection