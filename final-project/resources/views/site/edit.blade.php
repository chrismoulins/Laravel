@extends('site.nav')

@section('content')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'#article_content' });</script>
    <h1>Edit: {!! $article->title !!}</h1>
    @include ('errors.list')
    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['SiteController@update', $article->id]]) !!}

    @include('site.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop