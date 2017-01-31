@extends('layouts.admin')

@section('content')

@include('admin.blocks.tabs')
<div class="row">
    {{ Form::open(array('url' => 'admin/faq/add', 'class'=> 'form-horizontal' )) }}
    <div id="tab_lt" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name_lt">{{trans( 'admin.Name') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'name_lt', '', ['id' => 'name_lt', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('name_lt'))
                <span class="help-block">
                    <strong>{{ $errors->first('name_lt') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label for="text_lt">{{trans( 'admin.Text') }}:</label>
            {{ Form::textarea('text_lt', '', ['class' => 'ckeditor']) }}
        </div>
    </div>
    <div id="tab_lv" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name_lv">{{trans( 'admin.Name') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'name_lv', '', ['id' => 'name_lv', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('name_lv'))
                <span class="help-block">
                    <strong>{{ $errors->first('name_lv') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label for="text_lv">{{trans( 'admin.Text') }}:</label>
            {{ Form::textarea('text_lv', '', ['class' => 'ckeditor']) }}
        </div>
    </div>
    <div id="tab_ee" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name_ee">{{trans( 'admin.Name') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'name_ee', '', ['id' => 'name_ee', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('name_ee'))
                <span class="help-block">
                    <strong>{{ $errors->first('name_ee') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label for="text_ee">{{trans( 'admin.Text') }}:</label>
            {{ Form::textarea('text_ee', '', ['class' => 'ckeditor']) }}
        </div>
    </div>
    <div id="tab_en" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name_en">{{trans( 'admin.Name') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'name_en', '', ['id' => 'name_en', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('name_en'))
                <span class="help-block">
                    <strong>{{ $errors->first('name_en') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label for="text_en">{{trans( 'admin.Text') }}:</label>
            {{ Form::textarea('text_en', '', ['class' => 'ckeditor']) }}
        </div>
    </div>
    <div id="tab_ru" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name_ru">{{trans( 'admin.Name') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'name_ru', '', ['id' => 'name_ru', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('name_ru'))
                <span class="help-block">
                    <strong>{{ $errors->first('name_ru') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label for="text_ru">{{trans( 'admin.Text') }}:</label>
            {{ Form::textarea('text_ru', '', ['class' => 'ckeditor']) }}
        </div>
    </div>
    <div id="tab_pl" class="admin-tabs-item hide">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name_pl">{{trans( 'admin.Name') }}:</label>
            <div class="col-sm-6">
                {{Form::text( 'name_pl', '', ['id' => 'name_pl', 'class' => 'form-control' ] )}}
            </div>
            @if ($errors->has('name_pl'))
                <span class="help-block">
                    <strong>{{ $errors->first('name_pl') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <label for="text_pl">{{trans( 'admin.Text') }}:</label>
            {{ Form::textarea('text_pl', '', ['class' => 'ckeditor']) }}
        </div>
    </div>
    <div id="tab_generic" class="admin-tabs-item">
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