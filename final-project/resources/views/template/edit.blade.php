@extends('app')

@section('content')
    <h1>Edit: {!! $template->title !!}</h1>
    @include ('errors.list')
    {!! Form::model($template, ['method' => 'PATCH', 'action' => ['TemplateController@update', $template->id]]) !!}

    @include('template.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop