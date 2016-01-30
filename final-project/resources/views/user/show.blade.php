@extends('app')

@section('content')

        <h1>{{$user->name}}</h1>
        <p>ID: {{$user->id}}</p>
        <p>Name: {{$user->email}}</p>
        <p>Password: {{$user->password}}</p>
        <p>Created: {{ date('F d, Y', strtotime($user->created_at)) }}</p>
        <p>Last Modified: {{ date('F d, Y H:i', strtotime($user->updated_at)) }}</p>
        <p>Roles</p>
        <ul>
            @foreach($user->roles as $roles)
                <li>{{$roles->display_name}}</li>
            @endforeach
        </ul>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('user.index') }}" class="btn btn-info">Back to all Users</a>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
            </div>
            <div class="col-md-6 text-right">
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['user.destroy', $user->id]
                ]) !!}
                {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
@endsection