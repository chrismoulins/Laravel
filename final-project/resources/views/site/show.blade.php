@extends ('site.nav')

@section('content')
    @if(!Auth::guest())
        @if(Auth::user()->is('author'))
             <a href="{{ route('site.create') }}" class="btn btn-info">Create new Article</a>
        @endif
    @endif
    @foreach($contentAreas as $contentArea)

        <div class="row" id="{{$contentArea->name}}">

            @foreach($articlesAll as $article)
                @if($article->content_area->id == $contentArea->id && ($article->article_page_id == $page->id ||  $article->all_pages==1))

                    <div class="col-md-6">

                            <h1>{{$article->title}}</h1>
                            <article>
                                {!! $article->article_content !!}

                            </article>
                        @if(!Auth::guest())
                            @if(Auth::user()->is('author'))
                                 <a href="{{ route('site.edit', $article->id) }}" class="btn btn-primary">Edit Article</a>
                            @endif
                        @endif
                    </div>

                @endif

            @endforeach
        </div>
    @endforeach

@endsection

