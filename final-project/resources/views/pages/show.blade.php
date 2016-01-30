@extends ('app')

@section('content')

    <h1>{{$page->name}}</h1>
    <p>ID: {{$page->id}}</p>
    <p>Alias: {{$page->alias}}</p>
    <p>Description: {{$page->description}}</p>
    <p>Modified By: {{$page->createdByUser->name}}</p>
    <p>Created: {{ date('F d, Y', strtotime($page->created_at)) }}</p>
    <p>Last Modified: {{ date('F d, Y H:i', strtotime($page->updated_at)) }}</p>
    <p>Modified By: {{$page->modifiedByUser->name}}</p>
    <hr />

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('pages.index') }}" class="btn btn-info">Back to all pages</a>
            <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary">Edit Page</a>
        </div>
        <div class="col-md-6 text-right">
            {!! Form::open([
            'method' => 'DELETE',
            'route' => ['pages.destroy', $page->id]
            ]) !!}
            {!! Form::submit('Delete Page', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection