@extends('app')

@section('content')
    <h1>Edit: {!! $user->name !!}</h1>
    @include ('errors.list')
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('user.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop