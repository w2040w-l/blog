@extends('layouts.base')
@section('title', 'index')
@section('main')
    <ul class='list-inline'>
        @if($sort == 'top')
            <li class="list-inline-item"><a class='btn btn-primary' href='/index/top'>
                {{ __('message.highest_voted') }}</a></li>
        @else
            <li class="list-inline-item"><a class='btn btn-default' href='/index/top' dusk='highest'>
                {{ __('message.highest_voted') }}</a></li>
            @endif
        @if($sort == 'now')
            <li class="list-inline-item"><a class='btn btn-primary' href='/index/now'>
                {{ __('message.newest_voted') }}</a></li>
        @else
            <li class="list-inline-item"><a class='btn btn-default' href='/index/now'>
                {{ __('message.newest_voted') }}</a></li>
        @endif
        @if($sort == 'watch')
            <li class="list-inline-item"><a class='btn btn-primary' href='/index/following'>
                {{ __('message.following_answers') }}</a></li>
        @else
            <li class="list-inline-item"><a class='btn btn-default' href='/index/following'>
                {{ __('message.following_answers') }}</a></li>
        @endif
    </ul>

    @foreach($answers as $answer)
        @component('component.answer-title', ['answer' => $answer])
        @endcomponent
    @endforeach
    {{ $answers->links() }}
@endsection
