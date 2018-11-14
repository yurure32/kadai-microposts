@extends('layouts.app')

@section('content')
    <h1>プロフィール編集画面</h1>
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

        {!! Form::label('name', '名前') !!}
        {!! Form::text('name') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}
@endsection