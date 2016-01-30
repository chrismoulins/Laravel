@extends('app')

@section('content')
    <a href="{{ route('contentarea.create') }}" class="btn btn-info">Create new Content Area</a>
    @foreach($content_areas as $content_area)

            <h1><a href="{{action('ContentAreaController@show', $content_area->id)}}">{{$content_area->name}}</a></h1>
            <p>ID: {{$content_area->id}}</p>
            <p>Alias: {{$content_area->alias}}</p>
            <p>Description: {{$content_area->description}}</p>
            <p>Display Order: {{$content_area->display_order}}</p>
            <p>Created: {{ date('F d, Y', strtotime($content_area->created_at)) }}</p>
            <p>Last Modified: {{ date('F d, Y', strtotime($content_area->updated_at)) }}</p>
            <p>Modified By: {{$content_area->modifiedByUser->name}}</p>

        <hr />
    @endforeach
@endsection