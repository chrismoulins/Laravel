@extends('app')

@section('content')
    <a href="{{ route('template.create') }}" class="btn btn-info">Create new Template</a>

    @foreach($templates as $template)

        <h1><a href="{{action('TemplateController@show', $template->id)}}">{{$template->name}}</a></h1>
        <p>ID: {{$template->id}}</p>
        <p>Alias: {{$template->alias}}</p>
        <p>State: {{$template->active_state ? 'yes' : 'no'}}</p>
        <p>Created: {{ date('F d, Y', strtotime($template->created_at)) }}</p>
        <p>Last Modified: {{ date('F d, Y H:i', strtotime($template->updated_at)) }}</p>
        <p>Modified By: {{$template->modifiedByUser->name}}</p>
        <hr />
    @endforeach
@endsection