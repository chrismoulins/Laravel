@extends ('app')

@section('content')
    <a href="{{ route('pages.create') }}" class="btn btn-info">Create new Page</a>
    @foreach($pages as $page)

        <h1><a href="{{url('/pages', $page->id)}}">{{$page->name}}</a></h1>
        <p>ID: {{$page->id}}</p>
        <p>Alias: {{$page->alias}}</p>
        <p>Created: {{ date('F d, Y', strtotime($page->created_at)) }}</p>
        <p>Last Modified: {{ date('F d, Y H:i', strtotime($page->updated_at)) }}</p>
        <p>Modified By: {{$page->modifiedByUser->name}}</p>
        <hr />
    @endforeach

@endsection