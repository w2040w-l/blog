@extends('layouts.base')
@section('title', 'activities of '.$user->username)
@section('appheader', "")
@section('main')

    <h3>{{ $user->username }}</h3>
    @if($user->status == -1)
        <div class='alert'>
            this user have been banned
        </div>
    @endif
    <div class='row'>
        <div class="col-md-offset-2 col-md-8">{{ $user->intro }}</div>
        </br>
        <ul class='list-inline float-right'>
            <li class='list-inline-item'>{{ $user->approves()->count() }} approves</li>
            <follow-show ref='followShow' ifollow={{ $user->followed()->count() }} iuid={{ $user->id }}></follow-show>
            <li class='list-inline-item'><a class='btn btn-default' href="/user/{{ $user->id }}/followings">{{ $user->follower()->count() }} following</a></li>
            <li class='list-inline-item'><a class='btn btn-default' href="/user/{{ $user->id }}/watches">watching {{ $user->watches()->count() }} questions</a></li>
        </ul>
    </div>

    <div class='row'>
        @if($type == 'answers')
            <a class='btn btn-primary' href='/user/{{ $user->id }}/answers'>answers</a>
        @else
            <a class='btn btn-default' href='/user/{{ $user->id }}/answers'>answers</a>
        @endif
        @if($type == 'questions')
            <a class='btn btn-primary' href='/user/{{ $user->id }}/questions'>questions</a>
        @else
            <a class='btn btn-default' href='/user/{{ $user->id }}/questions'>questions</a>
        @endif
        @if($type == 'activties')
            <a class='btn btn-primary' href='/user/{{ $user->id }}/activties'>activties</a>
        @else
            <a class='btn btn-default' href='/user/{{ $user->id }}/activties'>activties</a>
        @endif
    </div>

    @if(Auth::check())
        <follow-button ifollow={{ $user->followed()->count() }} iuid={{ $user->id }} ihave={{ $user->hasFollowed(Auth::id())?1:0 }}></follow-button>
        @if(Auth::user()->isroot == 1)
            <a href="/user/{{ $user->id }}/ban"class='btn btn-danger btn-inline' >ban</a>
        @endif
    @endif
@endsection
