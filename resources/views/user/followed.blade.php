@extends('user.user_base')
@section('main')
    @parent
    @foreach($follows as $follower)
        <div class='bg-info'>
            <a href="/user/{{ $follower->followed->id }}">
                <h3>{{ $follower->followed->username }}</h3></a>
        </div>
    @endforeach
@endsection
