@extends ('app')

@section('content')

        <h1>{{$article->title}}</h1>
        <p>ID: {{$article->id}}</p>
        <p>Alias: {{$article->alias}}</p>
        <p>Description: {{$article->description}}</p>
        <p>All Pages: {{$article->all_pages}}</p>
        <p>Pages: {{$article->page->name}}</p>
        <p>Content Area: {{$article->content_area->name}}</p>
        <p>Created By: {{$article->createdByUser->name}}</p>
        <p>Created: {{ date('F d, Y', strtotime($article->created_at)) }}</p>
        <p>Modified By: {{$article->modifiedByUser->name}}</p>
        <p>Last Modified: {{ date('F d, Y H:i', strtotime($article->updated_at)) }}</p>
        <p>{{$article->article_content}}</p>

        <hr />

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('articles.index') }}" class="btn btn-info">Back to all articles</a>
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit Article</a>
            </div>
            <div class="col-md-6 text-right">
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['articles.destroy', $article->id]
                ]) !!}
                {!! Form::submit('Delete Article', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>

@endsection