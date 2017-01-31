@extends('layouts.admin')

@section('content')

@include('admin.blocks.tabs')
<div class="row">
    {{ Form::open(array('url' => 'admin/benefits/add', 'class'=> 'form-horizontal' )) }}
    <div id="tab_lt" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="text_lt">{{trans( 'admin.Text') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'text_lt', '', ['id' => 'text_lt', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('text_lt'))
                <span class="help-block">
                    <strong>{{ $errors->first('text_lt') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="tab_lv" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="text_lv">{{trans( 'admin.Text') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'text_lv', '', ['id' => 'text_lv', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('text_lv'))
                <span class="help-block">
                    <strong>{{ $errors->first('text_lv') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="tab_ee" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="text_ee">{{trans( 'admin.Text') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'text_ee', '', ['id' => 'text_ee', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('text_ee'))
                <span class="help-block">
                    <strong>{{ $errors->first('text_ee') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="tab_en" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="text_en">{{trans( 'admin.Text') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'text_en', '', ['id' => 'text_en', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('text_en'))
                <span class="help-block">
                    <strong>{{ $errors->first('text_en') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="tab_ru" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="text_ru">{{trans( 'admin.Text') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'text_ru', '', ['id' => 'text_ru', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('text_ru'))
                <span class="help-block">
                    <strong>{{ $errors->first('text_ru') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="tab_pl" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="text_pl">{{trans( 'admin.Text') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'text_pl', '', ['id' => 'text_pl', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('text_pl'))
                <span class="help-block">
                    <strong>{{ $errors->first('text_pl') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div id="tab_generic" class="admin-tabs-item">
        <div class="form-group">
            <label class="control-label col-sm-2" for="type">{{trans( 'admin.Type') }}:</label>
            <div class="col-sm-6">
                <label class="radio-inline">{{Form::radio( 'type', 'passanger' )}}{{trans( 'admin.Passanger') }}</label>
                <label class="radio-inline">{{Form::radio( 'type', 'driver', true )}}{{trans( 'admin.Driver') }}</label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="status">{{trans( 'admin.Status') }}:</label>
            <div class="col-sm-6">
                <label class="radio-inline">{{Form::radio( 'active', 1 )}}{{trans( 'admin.Active') }}</label>
                <label class="radio-inline">{{Form::radio( 'active', 0, true )}}{{trans( 'admin.Inactive') }}</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            {{Form::submit( trans( 'admin.Submit'), ['class' => 'btn btn-primary' ] )}}
        </div>
    </div>
    {{ Form::close() }}
</div>

@endsection