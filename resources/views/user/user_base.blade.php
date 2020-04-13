@extends('layouts.base')
@section('title', 'activities of '.$user->username)
@section('appheader', "")
@section('main')

    <div class='card'>
        <div class='card-header'>
            <h3>{{ $user->username }}</h3>
            @if($user->status == -1)
                <div class='alert'>
                    {{ __('message.user_banned') }}
                </div>
            @endif
            <div class=''>
                <div class="col-md-offset-2 col-md-8">{{ $user->intro }}</div>
                </br>
                <ul class='list-inline float-right'>
                    <li class='list-inline-item'>{{ $user->approves()->count() }} {{ __('message.approves') }}</li>
                    <follow-show ref='followShow' ifollow={{ $user->followed()->count() }} iuid={{ $user->id }}></follow-show>
                    <following-show ref='followingShow' ifollow={{ $user->follower()->count() }} iuid={{ $user->id }}></following-show>
                    <li class='list-inline-item'><a class='btn btn-default' href="/user/{{ $user->id }}/watches">
                        {{ __('message.watching') }} {{ $user->watches()->count() }} {{ __('message.questions') }}</a></li>
                </ul>
            </div>

            @if(Auth::check())
                <follow-button ifollow={{ $user->followed()->count() }} iuid={{ $user->id }}
                ihave={{ $user->hasFollowed(Auth::id())?1:0 }}></follow-button>
                @if(Auth::user()->isroot == 1)
                    <a href="/user/{{ $user->id }}/ban"class='btn btn-danger btn-inline' >{{ __('message.ban') }}</a>
                @endif
            @endif
        </div>
    </div>

    <div class=''>
        @if($type == 'answers')
            <a class='btn btn-primary' href='/user/{{ $user->id }}/answers'>{{ __('message.answers') }}</a>
        @else
            <a class='btn btn-default' href='/user/{{ $user->id }}/answers'>{{ __('message.answers') }}</a>
        @endif
        @if($type == 'questions')
            <a class='btn btn-primary' href='/user/{{ $user->id }}/questions'>{{ __('message.questions') }}</a>
        @else
            <a class='btn btn-default' href='/user/{{ $user->id }}/questions'>{{ __('message.questions') }}</a>
        @endif
        @if($type == 'activties')
            <a class='btn btn-primary' href='/user/{{ $user->id }}/activties'>{{ __('message.activities') }}</a>
        @else
            <a class='btn btn-default' href='/user/{{ $user->id }}/activties'>{{ __('message.activities') }}</a>
        @endif
    </div>

@endsection
