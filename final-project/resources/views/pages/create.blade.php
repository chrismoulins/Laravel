@extends('app')

@section('content')
    <h1>Create a New Page</h1>
    <hr/>
    @include ('errors.list')
    {!! Form::model($page = new \App\Page, ['url' => 'pages']) !!}

    @include('pages.form', ['submitButtonText' => 'Add Page'])
    {!! Form::close() !!}
@stop