@extends ('app')

@section('content')
        <a href="{{ route('articles.create') }}" class="btn btn-info">Create new Article</a>
        @foreach($articles as $article)

            <h1><a href="{{url('/articles', $article->id)}}">{{$article->title}}</a></h1>
            <p>ID: {{$article->id}}</p>
            <p>Alias: {{$article->alias}}</p>
            <p>All Pages: {{$article->all_pages ? 'yes' : 'no'}}</p>
            <p>Pages: {{$article->page->name}}</p>
            <p>Content Area: {{$article->content_area->name}}</p>
            <p>Last Modified: {{ date('F d, Y H:i', strtotime($article->updated_at)) }}</p>
            <p>Modified By: {{$article->modifiedByUser->name}}</p>
            <hr />
        @endforeach
@endsection
