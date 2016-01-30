@extends('app')

@section('content')
    <h1>Edit: {!! $content_area->title !!}</h1>
    @include ('errors.list')
    {!! Form::model($content_area, ['method' => 'PATCH', 'action' => ['ContentAreaController@update', $content_area->id]]) !!}

    @include('content_area.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop