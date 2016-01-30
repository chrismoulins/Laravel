@extends('app')

@section('content')
    <a href="{{ route('user.create') }}" class="btn btn-info">Create new User</a>

    @foreach($users as $user)

        <h1><a href="{{action('UserController@show', $user->id)}}">{{$user->name}}</a></h1>
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
    @endforeach
@endsection