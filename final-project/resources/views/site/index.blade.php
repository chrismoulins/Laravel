@extends ('site.nav')

@section('content')
    @if(!Auth::guest())
        @if(Auth::user()->is('author'))
            <a href="{{ route('site.create') }}" class="btn btn-info">Create new Article</a>
        @endif
    @endif
    @foreach($articlesAll as $article)

        <h1>{{$article->title}}</h1>
       <article>
           {!! $article->article_content !!}

       </article>

        <hr />
    @endforeach



@endsection

