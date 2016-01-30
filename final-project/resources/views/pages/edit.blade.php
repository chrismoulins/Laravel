@extends('app')

@section('content')


    <h1>Edit: {!! $page->title !!}</h1>
    @include ('errors.list')
    {!! Form::model($page, ['method' => 'PATCH', 'action' => ['PageController@update', $page->id]]) !!}

    @include('pages.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop