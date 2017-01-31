@extends('layouts.admin')

@section('content')

<div class="row">
    {{ Form::open(array('url' => 'admin/users/add', 'class'=> 'form-horizontal' )) }}
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">{{trans( 'admin.Name') }}:</label>
        <div class="col-sm-6">
            {{Form::text( 'name', '', ['id' => 'name', 'class' => 'form-control' ] )}}
        </div>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="surname">{{trans( 'admin.Surname') }}:</label>
        <div class="col-sm-6">
            {{Form::text( 'surname', '', ['id' => 'surname', 'class' => 'form-control' ] )}}
        </div>
        @if ($errors->has('surname'))
            <span class="help-block">
                <strong>{{ $errors->first('surname') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">{{trans( 'admin.Email') }}:</label>
        <div class="col-sm-6">
            {{Form::text( 'email', '', ['id' => 'email', 'class' => 'form-control' ] )}}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="password">{{trans( 'admin.Password') }}:</label>
        <div class="col-sm-6">
            {{Form::password( 'password', ['id' => 'password', 'class' => 'form-control' ] )}}
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            {{Form::submit( trans( 'admin.Submit'), ['class' => 'btn btn-primary' ] )}}
        </div>
    </div>
    {{ Form::close() }}
</div>

@endsection