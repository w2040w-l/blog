@extends('layouts.base')
@section('title', 'index')
@section('main')
    <ul class='list-inline'>
        @if($sort == 'top')
            <li class="list-inline-item"><a class='btn btn-primary' href='/index/top'>highest voted answers</a></li>
        @else
            <li class="list-inline-item"><a class='btn btn-default' href='/index/top'>highest voted answers</a></li>
        @endif
        @if($sort == 'now')
            <li class="list-inline-item"><a class='btn btn-primary' href='/index/now'>newest answers</a></li>
        @else
            <li class="list-inline-item"><a class='btn btn-default' href='/index/now'>newest answers</a></li>
        @endif
        @if($sort == 'watch')
            <li class="list-inline-item"><a class='btn btn-primary' href='/index/following'>following answers</a></li>
        @else
            <li class="list-inline-item"><a class='btn btn-default' href='/index/following'>following answers</a></li>
        @endif
    </ul>

    @foreach($answers as $answer)
        @component('component.answer-title', ['answer' => $answer])
        @endcomponent
    @endforeach
@endsection
