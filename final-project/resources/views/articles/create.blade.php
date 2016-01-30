@extends('app')

@section('content')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'#article_content' });</script>
        <h1>Create a New Article</h1>
        <hr/>
        @include ('errors.list')
        {!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}

        @include('articles.form', ['submitButtonText' => 'Add Article'])
        {!! Form::close() !!}

@stop