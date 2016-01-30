@extends('app')

@section('content')
    <h1>Create a New User</h1>
    <hr/>
    @include ('errors.list')
    {!! Form::model($user = new \App\User, ['url' => 'user']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('user.form', ['submitButtonText' => 'Add User'])
    {!! Form::close() !!}


@stop