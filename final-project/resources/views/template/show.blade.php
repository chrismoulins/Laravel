@extends('app')

@section('content')

        <h1>{{$template->name}}</h1>
        <p>ID: {{$template->id}}</p>
        <p>Alias: {{$template->alias}}</p>
        <p>Description: {{$template->description}}</p>
        <p>State: {{$template->active_state ? 'yes' : 'no'}}</p>
        <p>CSS Content: {{$template->css_content}}</p>
        <p>Created By: {{$template->createdByUser->name}}</p>
        <p>Created: {{ date('F d, Y', strtotime($template->created_at)) }}</p>
        <p>Last Modified: {{ date('F d, Y', strtotime($template->updated_at)) }}</p>
        <p>Modified By: {{$template->modifiedByUser->name}}</p>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('template.index') }}" class="btn btn-info">Back to all Templates</a>
                <a href="{{ route('template.edit', $template->id) }}" class="btn btn-primary">Edit Template</a>
            </div>
            <div class="col-md-6 text-right">
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['template.destroy', $template->id]
                ]) !!}
                {!! Form::submit('Delete Template', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
@endsection