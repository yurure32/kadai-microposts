@extends('layouts.app')

@section('content')
    <h1>プロフィール編集画面</h1>
    <!--@if (session('s3url'))-->
    <!--<h1>いまアップロードしたファイル</h1>-->
    <!--<img src="{{ session('s3url') }}">-->
    <!--@endif-->
    
    <!--{!! Form::open(['url' => '/upload', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}-->

    <!--<div class="form-group">-->
    <!--{!! Form::label('myfile', 'Upload a file') !!}-->
    <!--{!! Form::file('myfile', null) !!}-->
    <!--</div>-->
    
    <!--<div class="form-group">-->
    <!--{!! Form::submit('Upload') !!}-->
    <!--</div>-->
    
    <!--{!! Form::close() !!}-->
    
    {!! Form::model($user, ['route' => ['upload.update', $user->id], 'method' => 'put', 'files' => true]) !!}
        <div class="form-group">
        {!! Form::label('myfile', 'Upload a file') !!}
        {!! Form::file('myfile', null) !!}
        </div>
        
        <!--<div class="form-group">-->
        <!--{!! Form::submit('Upload') !!}-->
        <!--</div>-->
        
        <!--{!! Form::hidden('s3url', 's3url') !!}-->
        {!! Form::label('name', '名前') !!}
        {!! Form::text('name') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}
@endsection