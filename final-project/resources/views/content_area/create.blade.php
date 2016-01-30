@extends('app')

@section('content')
    <h1>Create a New Content Area</h1>
    <hr/>
    @include ('errors.list')
    {!! Form::model($contentarea = new \App\ContentArea, ['url' => 'contentarea']) !!}

    @include('content_area.form', ['submitButtonText' => 'Add Content Area'])
    {!! Form::close() !!}
    
@stop