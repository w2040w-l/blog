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
        <ul class='list-inline pull-right'>
            <li class=''>{{ $user->approves()->count() }} approves</li>
            <li class=''><a class='btn btn-default' href="/user/{{ $user->id }}/followers">{{ $user->followed()->count() }} followers</a></li>
            <li class=''><a class='btn btn-default' href="/user/{{ $user->id }}/followings">{{ $user->follower()->count() }} following</a></li>
            <li class=''><a class='btn btn-default' href="/user/{{ $user->id }}/watches">watching {{ $user->watches()->count() }} questions</a></li>
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
        <form class="form-inline" method="post" action="/user/{{ $user->id }}/follow">
            @csrf
            @if($user->hasFollowed(Auth::id()))
                @method("delete")
                <button type='submit' class='btn btn-primary btn' >unfollow</button>
            @else
                <button type='submit' class='btn btn-default btn' >follow</button>
            @endif
        </form>
        @if(Auth::user()->isroot == 1)
            <a href="/user/{{ $user->id }}/ban"class='btn btn-danger btn-inline' >ban</a>
        @endif
    @endif
@endsection
