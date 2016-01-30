@extends('app')

@section('content')
    <h1>Create a New Template</h1>
    <hr/>
    @include ('errors.list')
    {!! Form::model($template = new \App\Template, ['url' => 'template']) !!}

    @include('template.form', ['submitButtonText' => 'Add Template'])
    {!! Form::close() !!}


@stop