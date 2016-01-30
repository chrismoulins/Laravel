@extends('app')

@section('content')

        <a href="{{action('ContentAreaController@index')}}">Go Back</a>
        <h1>{{$content_area->name}}</h1>
        <p>ID: {{$content_area->id}}</p>
        <p>Alias: {{$content_area->alias}}</p>
        <p>Description: {{$content_area->description}}</p>
        <p>Display Order: {{$content_area->display_order}}</p>
        <p>Created By: {{$content_area->createdByUser->name}}</p>
        <p>Created: {{ date('F d, Y', strtotime($content_area->created_at)) }}</p>
        <p>Modified By: {{$content_area->modifiedByUser->name}}</p>
        <p>Last Modified: {{ date('F d, Y', strtotime($content_area->updated_at)) }}</p>
        <hr />

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('contentarea.index') }}" class="btn btn-info">Back to all Content Areas</a>
                <a href="{{ route('contentarea.edit', $content_area->id) }}" class="btn btn-primary">Edit Content Area</a>
            </div>
            <div class="col-md-6 text-right">
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['contentarea.destroy', $content_area->id]
                ]) !!}
                {!! Form::submit('Delete Content Area', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
@endsection