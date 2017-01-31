@extends('layouts.admin')

@section('content')

<div class="row">
    <a href="{{url('admin/reviews/create' )}}" class="btn btn-primary">{{trans( 'admin.New') }}</a>
</div>
@if (count($reviews) > 0)
    <table class="table table-hover">
        <thead>
          <tr>
            <th>{{trans( 'admin.No') }}</th>
            <th>{{trans( 'admin.Name') }}</th>
            <th>{{trans( 'admin.Actions') }}</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($reviews as $key => $review)
        <tr data-id="{{$review->id}}">
            <td><a href="{{url('admin/reviews/' . $review->id )}}">{{$review->id}}</a></td>
            <td>{{$review->name_lt}}</td>
            <td>
                <a href="{{url('admin/reviews/' . $review->id )}}/edit" class="btn btn-primary">{{trans( 'admin.Edit') }}</a>
                <button type="button" data-action="review-active" data-id="{{$review->id}}" class="btn @if (!empty( $review->active ))btn-success @else btn-danger @endif">{{trans( 'admin.Active') }}</button>
                <button type="button" data-action="review-delete" data-id="{{$review->id}}" class="btn btn-danger">{{trans( 'admin.Delete') }}</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{trans( 'admin.list empty') }}
@endif

@endsection